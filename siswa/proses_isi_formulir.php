<?php
session_start();
require_once "../config.php";

// Pastikan siswa sudah login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: isi_formulir.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];

// Cek apakah formulir sudah pernah dikirim
$cek = mysqli_prepare($koneksi, "SELECT id FROM pendaftaran WHERE user_id = ?");
mysqli_stmt_bind_param($cek, "i", $id_user);
mysqli_stmt_execute($cek);
$hasil_cek = mysqli_stmt_get_result($cek);

if (mysqli_num_rows($hasil_cek) > 0) {
    die("Formulir sudah pernah dikirim. Silakan hubungi pihak sekolah untuk perubahan data.");
}

// Ambil data formulir
$nisn = trim($_POST['nisn'] ?? '');
$nik = trim($_POST['nik'] ?? '');
$tempat_lahir = trim($_POST['tempat_lahir'] ?? '');
$tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$alamat = trim($_POST['alamat'] ?? '');
$nama_ayah = trim($_POST['nama_ayah'] ?? '');
$nama_ibu = trim($_POST['nama_ibu'] ?? '');
$no_hp_ortu = trim($_POST['no_hp_ortu'] ?? '');

// Validasi data wajib
if (
    !preg_match('/^[0-9]{10}$/', $nisn) ||
    !preg_match('/^[0-9]{16}$/', $nik) ||
    !in_array($jenis_kelamin, ['L', 'P'], true) ||
    $tempat_lahir === '' ||
    $tanggal_lahir === '' ||
    $alamat === '' ||
    $nama_ayah === '' ||
    $nama_ibu === '' ||
    $no_hp_ortu === ''
) {
    die("Data formulir tidak lengkap atau tidak valid. Silakan kembali dan periksa isian.");
}

// Validasi tanggal
$tanggal = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
if (!$tanggal || $tanggal->format('Y-m-d') !== $tanggal_lahir) {
    die("Tanggal lahir tidak valid.");
}

// Siapkan folder upload
$folder_upload = "../uploads/";

if (!is_dir($folder_upload)) {
    if (!mkdir($folder_upload, 0755, true)) {
        die("Folder upload gagal dibuat.");
    }
}

// Proses dokumen
$daftar_dokumen = [
    'file_kk',
    'file_akta',
    'file_ijazah',
    'file_foto'
];

$file_tersimpan = [];

foreach ($daftar_dokumen as $field) {
    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        die("Dokumen " . htmlspecialchars($field) . " wajib diunggah.");
    }

    $file = $_FILES[$field];

    if ($file['size'] > 2 * 1024 * 1024) {
        die("Ukuran setiap dokumen maksimal 2 MB.");
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $format_diizinkan = [
        'application/pdf' => 'pdf',
        'image/jpeg' => 'jpg',
        'image/png' => 'png'
    ];

    if (!isset($format_diizinkan[$mime])) {
        die("Format dokumen tidak diizinkan.");
    }

    $nama_file = bin2hex(random_bytes(16)) . '.' . $format_diizinkan[$mime];
    $tujuan = $folder_upload . $nama_file;

    if (!move_uploaded_file($file['tmp_name'], $tujuan)) {
        die("Gagal mengunggah dokumen.");
    }

    $file_tersimpan[$field] = $nama_file;
}

// Buat nomor pendaftaran
$no_pendaftaran = "PSB-" . date("Ymd") . "-" . strtoupper(bin2hex(random_bytes(3)));

// Simpan ke database
$query = "INSERT INTO pendaftaran (
    user_id, no_pendaftaran, nisn, nik, tempat_lahir,
    tanggal_lahir, jenis_kelamin, alamat, nama_ayah,
    nama_ibu, no_hp_ortu, file_kk, file_akta,
    file_ijazah, file_foto
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param(
    $stmt,
    "issssssssssssss",
    $id_user,
    $no_pendaftaran,
    $nisn,
    $nik,
    $tempat_lahir,
    $tanggal_lahir,
    $jenis_kelamin,
    $alamat,
    $nama_ayah,
    $nama_ibu,
    $no_hp_ortu,
    $file_tersimpan['file_kk'],
    $file_tersimpan['file_akta'],
    $file_tersimpan['file_ijazah'],
    $file_tersimpan['file_foto']
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Formulir berhasil dikirim!');
        window.location.href = 'dashboard.php';
    </script>";
    exit;
} else {
    echo "Gagal menyimpan formulir: " . htmlspecialchars(mysqli_error($koneksi));
}
<?php
session_start();
require_once "../config.php";

// Pastikan pengguna sudah login sebagai siswa
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../login.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];
$nama = $_SESSION['nama_lengkap'] ?? 'Siswa';

// Cek apakah siswa sudah mengisi formulir
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE user_id = $id_user");
$data = mysqli_fetch_assoc($query);

$status_formulir = $data ? "Sudah mengisi" : "Belum mengisi";
$status_berkas = $data ? $data['status_berkas'] : "-";
$status_kelulusan = $data ? $data['status_kelulusan'] : "-";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="dashboard.php">
            SDI Plus Nusantara
        </a>
        <a href="../logout.php" class="btn btn-outline-danger btn-sm">
            Logout
        </a>
    </div>
</nav>

<main class="container py-5">

    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Siswa</h2>
        <p class="text-secondary mb-0">
            Selamat datang, <?= htmlspecialchars($nama); ?>!
        </p>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold">Informasi Pendaftaran</h5>
            <p class="text-secondary">
                Pantau proses pendaftaran santri baru melalui halaman ini.
            </p>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <small class="text-secondary">Formulir</small>
                        <h6 class="fw-bold mt-2"><?= $status_formulir; ?></h6>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <small class="text-secondary">Verifikasi Berkas</small>
                        <h6 class="fw-bold mt-2">
                            <?= htmlspecialchars($status_berkas); ?>
                        </h6>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <small class="text-secondary">Kelulusan</small>
                        <h6 class="fw-bold mt-2">
                            <?= htmlspecialchars($status_kelulusan); ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h5 class="fw-bold">Menu Pendaftaran</h5>
            <p class="text-secondary">
                Lengkapi biodata dan dokumen persyaratan pendaftaran.
            </p>

            <a href="isi_formulir.php" class="btn btn-primary">
                Isi Formulir Pendaftaran
            </a>
        </div>
    </div>

</main>

</body>
</html>
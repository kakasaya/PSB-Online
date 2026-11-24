<?php
session_start();
require_once "../config.php";

// Pastikan siswa sudah login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../login.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];
$nama = $_SESSION['nama_lengkap'] ?? '';

$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE user_id = $id_user");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">

<nav class="navbar bg-white border-bottom">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand fw-bold text-primary">
            SDI Plus Nusantara
        </a>
        <a href="../logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
</nav>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="mb-4">
                <h2 class="fw-bold">Formulir Biodata Calon Santri</h2>
                <p class="text-secondary">
                    Silakan lengkapi biodata dan unggah dokumen persyaratan.
                </p>
            </div>

            <?php if ($data): ?>
                <div class="alert alert-info">
                    Kamu sudah pernah mengirim formulir.
                    Status berkas:
                    <strong><?= htmlspecialchars($data['status_berkas']); ?></strong>.
                    Hubungi pihak sekolah jika perlu melakukan perubahan.
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form action="proses_isi_formulir.php" method="POST" enctype="multipart/form-data">

                        <h5 class="fw-bold mb-3">A. Data Calon Santri</h5>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control"
                                value="<?= htmlspecialchars($nama); ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" name="nisn" class="form-control"
                                maxlength="10" pattern="[0-9]{10}" required
                                value="<?= htmlspecialchars($data['nisn'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control"
                                maxlength="16" pattern="[0-9]{16}" required
                                value="<?= htmlspecialchars($data['nik'] ?? ''); ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir"
                                    class="form-control" required
                                    value="<?= htmlspecialchars($data['tempat_lahir'] ?? ''); ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control" required
                                    value="<?= htmlspecialchars($data['tanggal_lahir'] ?? ''); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" <?= ($data['jenis_kelamin'] ?? '') == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?= ($data['jenis_kelamin'] ?? '') == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control"
                                rows="3" required><?= htmlspecialchars($data['alamat'] ?? ''); ?></textarea>
                        </div>

                        <hr>

                        <h5 class="fw-bold mb-3">B. Data Orang Tua</h5>

                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah"
                                class="form-control" required
                                value="<?= htmlspecialchars($data['nama_ayah'] ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu"
                                class="form-control" required
                                value="<?= htmlspecialchars($data['nama_ibu'] ?? ''); ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nomor HP Orang Tua</label>
                            <input type="tel" name="no_hp_ortu"
                                class="form-control" required
                                value="<?= htmlspecialchars($data['no_hp_ortu'] ?? ''); ?>">
                        </div>

                        <hr>

                        <h5 class="fw-bold mb-3">C. Dokumen Persyaratan</h5>
                        <p class="text-secondary small">
                            Format PDF, JPG, atau PNG. Maksimal 2 MB per file.
                        </p>

                        <?php
                        $dokumen = [
                            'file_kk' => 'Kartu Keluarga',
                            'file_akta' => 'Akta Kelahiran',
                            'file_ijazah' => 'Ijazah',
                            'file_foto' => 'Pas Foto'
                        ];
                        ?>

                        <?php foreach ($dokumen as $field => $label): ?>
                            <div class="mb-3">
                                <label class="form-label"><?= $label; ?></label>
                                <input type="file" name="<?= $field; ?>"
                                    class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    <?= empty($data[$field]) ? 'required' : ''; ?>>
                                <?php if (!empty($data[$field])): ?>
                                    <div class="form-text">Dokumen sebelumnya sudah diunggah.</div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="dashboard.php" class="btn btn-outline-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Kirim Formulir
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

</body>
</html>
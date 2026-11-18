<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Kelulusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php">SDI Plus Nusantara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavigasi" aria-controls="menuNavigasi" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavigasi">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="cek_kelulusan.php">Cek Kelulusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="btn btn-primary btn-sm ms-lg-2" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="text-center mb-4">
                    <span class="badge text-bg-primary-subtle text-primary mb-2">Informasi Seleksi</span>
                    <h1 class="h2 fw-bold">Cek Kelulusan</h1>
                    <p class="text-body-secondary">Masukkan data pendaftaran untuk melihat status seleksi.</p>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form action="cek_kelulusan.php" method="get">
                            <div class="mb-3">
                                <label for="nomor-pendaftaran" class="form-label">Nomor pendaftaran</label>
                                <input type="text" class="form-control" id="nomor-pendaftaran" name="nomor_pendaftaran" placeholder="Contoh: PSB-2026-001" required>
                            </div>
                            <div class="mb-4">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" inputmode="numeric" placeholder="Masukkan NISN" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cek Status Kelulusan</button>
                        </form>
                    </div>
                </div>
                <p class="text-center text-body-secondary small mt-3 mb-0">
                    Pastikan nomor pendaftaran dan NISN yang dimasukkan sudah benar.
                </p>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
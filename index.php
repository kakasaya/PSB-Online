<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="cek_kelulusan.php">Cek Kelulusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="btn btn-primary btn-sm ms-lg-2" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="container py-5">
            <div class="row align-items-center g-4 py-lg-5">
                <div class="col-lg-7">
                    <span class="badge text-bg-primary-subtle text-primary mb-3">Penerimaan Santri Baru</span>
                    <h1 class="display-5 fw-bold">Langkah awal menuju masa depan yang berilmu.</h1>
                    <p class="lead text-body-secondary mt-3">
                        Selamat datang di layanan Penerimaan Peserta Didik Baru Online SDI Plus Nusantara.
                        Daftarkan diri, lengkapi data, dan ikuti informasi seleksi dengan mudah.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a class="btn btn-primary btn-lg" href="register.php">Daftar Sekarang</a>
                        <a class="btn btn-outline-primary btn-lg" href="cek_kelulusan.php">Cek Kelulusan</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h4 mb-3">Alur pendaftaran</h2>
                            <div class="d-flex gap-3 mb-3">
                                <span class="badge rounded-pill text-bg-primary align-self-start">1</span>
                                <div>
                                    <h3 class="h6 mb-1">Isi formulir (registrasi)</h3>
                                    <p class="text-body-secondary mb-0">Lengkapi data diri pada halaman pendaftaran.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mb-3">
                                <span class="badge rounded-pill text-bg-primary align-self-start">2</span>
                                <div>
                                    <h3 class="h6 mb-1">Masuk ke akun</h3>
                                    <p class="text-body-secondary mb-0">Gunakan username dan kata sandi untuk melanjutkan.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mb-3">
                                <span class="badge rounded-pill text-bg-primary align-self-start">3</span>
                                <div>
                                    <h3 class="h6 mb-1">Cek hasil seleksi</h3>
                                    <p class="text-body-secondary mb-0">Lihat informasi kelulusan melalui menu cek kelulusan.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mb-3">
                                <span class="badge rounded-pill text-bg-primary align-self-start">4</span>
                                <div>
                                    <h3 class="h6 mb-1">Lengkapi Biodata</h3>
                                    <p class="text-body-secondary mb-0">Lengkapi informasi biodata Anda setelah masuk ke akun.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <span class="badge rounded-pill text-bg-primary align-self-start">5</span>
                                <div>
                                    <h3 class="h6 mb-1">Pengumuman Kelulusan</h3>
                                    <p class="text-body-secondary mb-0">Lihat pengumuman kelulusan melalui menu pengumuman.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white border-top border-bottom">
            <div class="container py-5">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-9">
                        <span class="badge text-bg-primary-subtle text-primary mb-3">Mengenal Kami</span>
                        <h2 class="display-6 fw-bold">SDI Plus Nusantara</h2>
                        <p class="lead text-body-secondary mt-3">
                            Kami percaya pendidikan adalah bekal untuk menjalani kehidupan dengan baik.
                            SDI Plus Nusantara berkomitmen mempersiapkan murid agar tumbuh menjadi pribadi
                            yang berilmu, berakhlak mulia, dan dapat memberi manfaat bagi sesama
                            di dunia maupun di akhirat.
                        </p>
                    </div>
                </div>
                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&amp;fit=crop&amp;w=900&amp;q=80" class="card-img-top" alt="Murid belajar bersama di ruang kelas" loading="lazy" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4 text-center">
                                <h3 class="h5">Berilmu</h3>
                                <p class="text-body-secondary mb-0">Menumbuhkan semangat belajar dan menggunakan ilmu untuk kebaikan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary">
                            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&amp;fit=crop&amp;w=900&amp;q=80" class="card-img-top" alt="Anak-anak berkumpul dan membangun kebersamaan" loading="lazy" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4 text-center">
                                <h3 class="h5">Berakhlak</h3>
                                <p class="text-body-secondary mb-0">Membiasakan sikap santun, jujur, peduli, dan bertanggung jawab.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary">
                            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&amp;fit=crop&amp;w=900&amp;q=80" class="card-img-top" alt="Relawan bekerja sama membantu masyarakat" loading="lazy" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4 text-center">
                                <h3 class="h5">Bermanfaat</h3>
                                <p class="text-body-secondary mb-0">Mendorong murid untuk membawa kebaikan bagi keluarga, masyarakat, dan kehidupan akhirat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white border-top">
            <div class="container py-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h2 class="h5 mb-1">Sudah mendaftar?</h2>
                    <p class="text-body-secondary mb-0">Masuk untuk melanjutkan proses penerimaan santri baru.</p>
                </div>
                <a class="btn btn-outline-primary" href="login.php">Masuk ke Akun</a>
            </div>
        </section>
    </main>

    <footer class="container py-4 text-center text-body-secondary">
        <small>&copy; SDI Plus Nusantara PSB Online 2026/2027</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
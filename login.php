<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <li class="nav-item"><a class="nav-link" href="cek_kelulusan.php">Cek Kelulusan</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="btn btn-primary btn-sm ms-lg-2" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="card shadow-sm border-0 w-100" style="max-width: 420px;">
            <div class="card-body p-4 p-md-5">
                <h1 class="h3 text-center mb-2">Masuk</h1>
                <p class="text-body-secondary text-center mb-4">Silakan masuk ke akun PSB Online SDI Plus Nusantara Anda.</p>

                <form action="proses_login.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['pesan-gagal'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" 
                            role="alert">';
                        echo $_SESSION['pesan-gagal'];
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" 
                            aria-label="Close"></button>';
                        echo '</div>';
                        unset($_SESSION['pesan-gagal']);
                    } ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="email" class="form-control" id="username" name="username" autocomplete="username" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
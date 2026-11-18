<?php
session_start();
require 'config.php';

$email = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) === 1) {
    // User found, verify password
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        // Password is correct, start session
        $_SESSION['username'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['pesan-sukses'] = "Login berhasil. Selamat datang, " . $user['nama_lengkap'] . "!";

        if ($_SESSION['role'] == 'guru') {
            header("Location: guru/dashboard.php");
        } else if ($_SESSION['role'] == 'siswa') {
            header("Location: siswa/dashboard.php");
        } else {
            $_SESSION['pesan-gagal'] = "Role tidak ditemukan!";
            header("Location: login.php");
        }
        exit();
    } else {
        $_SESSION['pesan-gagal'] = "Password salah!";
        header("Location: login.php");
        exit();
    }
} else {
    // User not found
    $_SESSION['pesan-gagal'] = "Pengguna Tidak ditemukan!";
    header("Location: login.php");
    exit();
}

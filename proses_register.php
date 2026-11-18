<?php
session_start();
require 'config.php';

$nama_lengkap = $_POST['nama'];
$email = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO users (nama_lengkap, email, password, role) VALUES ('$nama_lengkap', '$email', '" . password_hash($password, PASSWORD_DEFAULT) . "', 'siswa')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Data berhasil disimpan. Silakan masuk ke akun Anda.";
} else {
    echo "Error: Terjadi kesalahan saat menyimpan data.";
}

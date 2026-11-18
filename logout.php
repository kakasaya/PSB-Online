<?php
session_start(); // memulai sesi
session_unset(); // menghapus semua variabel sesi
session_destroy(); // menghancurkan sesi
header("Location: login.php"); // mengarahkan ke halaman login
exit();

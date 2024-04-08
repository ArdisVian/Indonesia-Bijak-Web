<?php
session_start(); // Mulai sesi

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Tampilkan tombol jika pengguna sudah login
    echo '<a href="coblos.php" class="cta btn btn-primary">Tentukan Pilihanmu</a>';
} else {
    // Tampilkan pesan atau arahkan pengguna untuk login jika belum login
    echo '<p>Silakan login untuk menggunakan fitur ini.</p>';
    echo '<a href="login.php" class="btn btn-primary">Login</a>';
}
?>
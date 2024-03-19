<?php
// Mulai sesi
session_start();

// Unset atau hapus session yang menyimpan informasi login
unset($_SESSION['username']);

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: login.php");
exit;
?>
<?php
// Panggil file koneksi ke database (misalnya, koneksi.php)
require_once "koneksi.php";

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$errors = [];

// Tangani data yang dikirimkan dari form pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lakukan validasi data
    // Misalnya, pastikan tidak ada field yang kosong, panjang username dan password minimal tertentu, dll.

    // Contoh validasi sederhana: pastikan semua field diisi
    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = "Semua field harus diisi.";
    } else {
        // Jika data valid, lakukan penyisipan data ke dalam database
        // Misalnya, gunakan prepared statement untuk mencegah serangan SQL Injection
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            // Jika pendaftaran berhasil, beri pesan sukses kepada pengguna
            $success_message = "Pendaftaran berhasil. Silakan login untuk melanjutkan.";
        } else {
            // Jika terjadi kesalahan saat menyisipkan data ke database, tambahkan pesan kesalahan
            $errors[] = "Gagal melakukan pendaftaran. Silakan coba lagi.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Indonesia Bijak</title>
    <!-- Tautkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tautkan CSS tambahan jika diperlukan -->
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li>
                            <?php echo $error; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php if (isset($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <!-- Tautkan script JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
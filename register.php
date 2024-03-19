<?php
// Include file koneksi.php
include "koneksi.php";

// Inisialisasi variabel
$username = "";
$password = "";
$full_name = "";
$confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";

// Check jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi username
    if (empty (trim($_POST["username"]))) {
        $username_error = "Username tidak boleh kosong";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validasi password
    if (empty (trim($_POST["password"]))) {
        $password_error = "Password tidak boleh kosong";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_error = "Password minimal terdiri dari 6 karakter";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validasi konfirmasi password
    if (empty (trim($_POST["confirm_password"]))) {
        $confirm_password_error = "Konfirmasi password tidak boleh kosong";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty ($password_error) && ($password != $confirm_password)) {
            $confirm_password_error = "Password yang dikonfirmasi tidak sesuai";
        }
    }

    // Jika tidak terdapat error, masukkan data ke database
    if (empty ($username_error) && empty ($password_error) && empty ($confirm_password_error)) {
        // Prepare statement untuk memasukkan data
        $sql = "INSERT INTO user (username, password, full_name) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variabel ke statement sebagai parameter
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_full_name);

            // Set parameter
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
            $param_full_name = $_POST["full_name"];

            // Execute statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect ke halaman login setelah berhasil mendaftar
                header("location: login.php");
            } else {
                echo "Terjadi kesalahan. Silakan coba lagi nanti.";
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        }
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="error">
                    <?php echo $username_error; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="error">
                    <?php echo $password_error; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"
                    value="<?php echo $confirm_password; ?>">
                <span class="error">
                    <?php echo $confirm_password_error; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" value="<?php echo $full_name; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            <p>Sudah memiliki akun? <a href="login.php">Login disini</a>.</p>
        </form>
    </div>
</body>

</html>
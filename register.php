<?php
// Include file koneksi.php
include "koneksi.php";

// Inisialisasi variabel
$nik = $username = $password = $nama = $email = $confirm_password = "";
$nik_error = $username_error = $password_error = $confirm_password_error = $email_error = "";

// Check jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi NIK
    if (empty(trim($_POST["nik"]))) {
        $nik_error = "NIK tidak boleh kosong";
    } else {
        $nik = trim($_POST["nik"]);
        // Periksa apakah NIK sudah ada di database
        $sql_check_nik = "SELECT id FROM user WHERE nik = ?";
        if ($stmt_check_nik = mysqli_prepare($conn, $sql_check_nik)) {
            mysqli_stmt_bind_param($stmt_check_nik, "s", $param_nik);
            $param_nik = $nik;
            if (mysqli_stmt_execute($stmt_check_nik)) {
                mysqli_stmt_store_result($stmt_check_nik);
                if (mysqli_stmt_num_rows($stmt_check_nik) > 0) {
                    $nik_error = "NIK sudah digunakan";
                }
            } else {
                echo "Terjadi kesalahan. Silakan coba lagi nanti.";
            }
            mysqli_stmt_close($stmt_check_nik);
        }
    }

    // Validasi username
    if (empty(trim($_POST["username"]))) {
        $username_error = "Username tidak boleh kosong";
    } else {
        $username = trim($_POST["username"]);
        // Periksa apakah username sudah ada di database
        $sql_check_username = "SELECT id FROM user WHERE username = ?";
        if ($stmt_check_username = mysqli_prepare($conn, $sql_check_username)) {
            mysqli_stmt_bind_param($stmt_check_username, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt_check_username)) {
                mysqli_stmt_store_result($stmt_check_username);
                if (mysqli_stmt_num_rows($stmt_check_username) > 0) {
                    $username_error = "Username sudah digunakan";
                }
            } else {
                echo "Terjadi kesalahan. Silakan coba lagi nanti.";
            }
            mysqli_stmt_close($stmt_check_username);
        }
    }

    // Validasi email
    if (empty(trim($_POST["email"]))) {
        $email_error = "Email tidak boleh kosong";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_error = "Format email tidak valid";
    } else {
        $email = trim($_POST["email"]);

        // Periksa apakah email sudah ada di database
        $sql_check_email = "SELECT id FROM user WHERE email = ?";
        if ($stmt_check_email = mysqli_prepare($conn, $sql_check_email)) {
            mysqli_stmt_bind_param($stmt_check_email, "s", $param_email);
            $param_email = $email;
            if (mysqli_stmt_execute($stmt_check_email)) {
                mysqli_stmt_store_result($stmt_check_email);
                if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
                    $email_error = "Email sudah digunakan";
                }
            } else {
                echo "Terjadi kesalahan. Silakan coba lagi nanti.";
            }
            mysqli_stmt_close($stmt_check_email);
        }

    }



    // Validasi password
    if (empty(trim($_POST["password"]))) {
        $password_error = "Password tidak boleh kosong";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_error = "Password minimal terdiri dari 6 karakter";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validasi konfirmasi password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_error = "Konfirmasi password tidak boleh kosong";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_error) && ($password != $confirm_password)) {
            $confirm_password_error = "Password yang dikonfirmasi tidak sesuai";
        }
    }

    // Validasi email
    if (empty(trim($_POST["email"]))) {
        $email_error = "Email tidak boleh kosong";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_error = "Format email tidak valid";
    } else {
        $email = trim($_POST["email"]);
    }

    // Jika tidak terdapat error, masukkan data ke database
    if (empty($nik_error) && empty($username_error) && empty($password_error) && empty($confirm_password_error) && empty($email_error)) {
        // Prepare statement untuk memasukkan data
        $sql = "INSERT INTO user (nik, username, password, email, nama) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variabel ke statement sebagai parameter
            mysqli_stmt_bind_param($stmt, "sssss", $param_nik, $param_username, $param_password, $param_email, $param_nama);

            // Set parameter
            $param_nik = $nik;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
            $param_email = $email;
            $param_nama = $_POST["nama"];

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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/register.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Username" />
                                <span class="error">
                                    <?php echo $username_error; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="nik"><i class="zmdi zmdi-account-box"></i></label>
                                <input type="text" name="nik" id="nik" placeholder="Your NIK" />
                                <span class="error">
                                    <?php echo $nik_error; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                                <span class="error">
                                    <?php echo $email_error; ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                                <span class="error">
                                    <?php echo $password_error; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="re_pass"
                                    placeholder="Repeat your password" />
                                <span class="error">
                                    <?php echo $confirm_password_error; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="JS/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
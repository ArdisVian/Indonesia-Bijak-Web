<?php
session_start(); // Mulai sesi

// Buat koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "dbcrud";

$conn = mysqli_connect($server, $username, $password, $database);

// Cek jika pengguna sudah login, jika ya, redirect ke halaman lain
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect ke halaman dashboard jika sudah login
    exit;
}

// Cek jika form login disubmit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password dalam tabel user
    $query_user = "SELECT * FROM user WHERE username = '$username'";
    $result_user = mysqli_query($conn, $query_user);


    // Query untuk memeriksa username dan password dalam tabel admin
    // $query_admin = "SELECT * FROM tadmin WHERE username = '$username'";
    // $result_admin = mysqli_query($conn, $query_admin);

    // Memeriksa apakah pengguna terdapat dalam tabel user
    if (mysqli_num_rows($result_user) == 1) {
        $row = mysqli_fetch_assoc($result_user);

        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['NIK'] = $row['NIK'];

            // Redirect ke halaman dashboard atau halaman lain sesuai dengan role pengguna
            if ($row['role'] == 'user') {
                header("Location: user.php");
                exit;
            } elseif ($row['role'] == 'admin') {
                header("Location: dashboard.php");
                exit;
            }
        } else {
            // Jika password tidak cocok, tampilkan pesan kesalahan
            $error = "Username atau password salah!";
        }
    }
    // Memeriksa apakah pengguna terdapat dalam tabel admin
    // elseif (mysqli_num_rows($result_admin) == 1) {
    //     $row = mysqli_fetch_assoc($result_admin);

    //     // Membandingkan password yang dimasukkan dengan password yang disimpan dalam database
    //     if ($password === $row['password']) {
    //         $_SESSION['username'] = $row['username'];

    //         // Redirect ke halaman dashboard atau halaman lain sesuai dengan role pengguna
    //         if ($row['role'] == 'admin') {
    //             header("Location: dashboard.php");
    //             exit;
    //         }
    //     } else {
    //         // Jika password tidak cocok, tampilkan pesan kesalahan
    //         $error = "Username atau password salah!";
    //     }
    else {
        // Jika pengguna tidak ditemukan di kedua tabel, tampilkan pesan kesalahan
        $error = "Username atau password salah!";
    }
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
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in" />
                            </div>
                            <!-- Menampilkan pesan kesalahan jika ada -->
                            <?php if (isset($error)) { ?>
                                <div class="form-group">
                                    <p class="error-message">
                                        <?php echo $error; ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
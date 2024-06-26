<?php
//koneksi database
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan kembali ke halaman login
    header("Location: login.php");
    exit; // Pastikan tidak ada kode yang dieksekusi setelah melakukan redirect
}

// Koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbcrud";

// Buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

// Ambil NIK dari sesi
$NIK = $_SESSION['NIK'];




//tombol simpan
if (isset($_POST['bsimpan'])) {

    if (isset($_GET['hal']) == "edit") {
        $edit = mysqli_query($koneksi, "UPDATE user SET NIK = '$_POST[tNIK]', nama = '$_POST[tnama]', tempat_lahir = '$_POST[tlahir]', 
    tgl_lahir = '$_POST[ttgl_lahir]',  jenis_kelamin = '$_POST[tjenis_kelamin]',  agama = '$_POST[tagama]',  nomor_telepon = '$_POST[tnomor_telepon]',
     alamat = '$_POST[talamat]' WHERE NIK = '$_GET[id]'");

        // test jika edit data berhasil
        if ($edit) {
            echo "<script>
    alert('Edit Data Berhasil!');
    document.location='user.php';
    </script>";
        } else {
            echo "<script>
    alert('Edit Data Gagal!');
    document.location='user.php';
    </script>";
        }
    } else {
        //save data
        $save = mysqli_query($koneksi, " INSERT INTO user (NIK, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, nomor_telepon) VALUE 
  ( '$_POST[tNIK]', '$_POST[tnama]', '$_POST[tlahir]', '$_POST[ttgl_lahir]', '$_POST[tjenis_kelamin]', '$_POST[tagama]', '$_POST[talamat]', '$_POST[tnomor_telepon]')");

        // test jika simpan data berhasil
        if ($save) {
            echo "<script>
    alert('Simpan Data Berhasil!');
    document.location='user.php';
    </script>";
        } else {
            echo "<script>
    alert('Simpan Data Gagal!');
    document.location='user.php';
    </script>";
        }
    }


}

$vNIK = "";
$vnama = "";
$vtlahir = "";
$vtgl_lahir = "";
$vj_k = "";
$vagama = "";
$valamat = "";
$vno_telp = "";
//test btn save/delete
if (isset($_GET["hal"])) {
    if ($_GET['hal'] == 'edit') {
        $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE NIK =  '$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vNIK = $data['NIK'];
            $vnama = $data['nama'];
            $vtlahir = $data['tempat_lahir'];
            $vtgl_lahir = $data['tgl_lahir'];
            $vj_k = $data['jenis_kelamin'];
            $vagama = $data['agama'];
            $valamat = $data['alamat'];
            $vno_telp = $data['nomor_telepon'];
        }

    } else if ($_GET['hal'] == 'hapus') {
        $hapus = mysqli_query($koneksi, "DELETE FROM user WHERE NIK = '$_GET[id]'");
        // test jika hapus data berhasil
        if ($hapus) {
            echo "<script>
    alert('Hapus Data Berhasil!');
    document.location='user.php';
    </script>";
        } else {
            echo "<script>
    alert('Hapus Data Gagal!');
    document.location='user.php';
    </script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia Bijak</title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Assets/logo.png" alt="Logo" width="150" height="67" class="d-inline-block align-top"
                    style="border-radius: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partai.php">Partai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kandidat.php">Kandidat</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#Program">Program</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="edit_profile.php?hal=edit&id=<?= $NIK ?>">Edit Profile</a>
                    </li>
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="#Contact">Kontak</a>
                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#About">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->



    <!-- Hero Section start -->
    <section class="hero" id="Home">

        <main class="content" style="position: relative; margin:auto;">
            <h1 style="align-items: center;">Mari Bijak Memilih Untuk Negeri</h1>
            <p>Mari bersama-sama menjadi bagian dari perubahan dengan memberikan suaramu pada pemilihan presiden.</p>
            <p>Setiap
                suara kita memiliki kekuatan untuk membentuk masa depan negara kita</p>
            <a href="coblos.php" class="cta btn btn-primary">Tentukan Pilihanmu</a>

        </main>
    </section>

    <!-- Partai Section start -->
    <section class="kandidat" id="partai">
        <div class="container">
            <h2 class="text-center mb-4">Kandidat Partai</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/pdip.jpg" class="card-img-top" alt="pdip">
                        <div class="card-body text-center">
                            <h5 class="card-title">PDI Perjuangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/gerindra.png" class="card-img-top" alt="gerindra">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gerindra</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/pkb.jpg" class="card-img-top" alt="pkb">
                        <div class="card-body text-center">
                            <h5 class="card-title">PKB</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/demokrat.png" class="card-img-top" alt="demokrat"
                            style="width: 100%; height: 240px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Demokrat</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/golkar.jpg" class="card-img-top" alt="golkar">
                        <div class=" card-body text-center">
                            <h5 class="card-title">Golkar</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/nasdem.png" class="card-img-top" alt="nasdem">
                        <div class="card-body text-center">
                            <h5 class="card-title">Nasdem</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partai Section end -->




    <!-- Kandidat Section start -->
    <section class="kandidat" id="Kandidat">
        <div class="container">
            <h2 class="text-center mb-4">Kandidat Presiden</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/Anies.jpg" class="card-img-top" alt="Anies Baswedan">
                        <div class="card-body text-center">
                            <h5 class="card-title">Anies Baswedan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/Prabowo.jpg" class="card-img-top" alt="Prabowo Subianto">
                        <div class="card-body text-center">
                            <h5 class="card-title">Prabowo Subianto</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/Ganjar.jpg" class="card-img-top" alt="Ganjar Pranowo">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ganjar Pranowo</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kandidat Section end -->



    <!-- Hero Section end -->


    <!-- Feather Icons -->
    <script>
        feather.replace(); 
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

<!-- Footer Section start -->
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container" id="About">
        <div class="row">
            <div class="col-md-6">
                <h5>Tentang Kami</h5>
                <p>Indonesia Bijak adalah platform yang bertujuan untuk meningkatkan partisipasi dalam proses demokrasi
                    melalui penyediaan informasi yang relevan dan akurat tentang pemilihan umum.</p>
            </div>
            <div class="col-md-3 offset-md-3">
                <h5>Kontak</h5>
                <ul class="list-unstyled">
                    <li>Alamat: Jl. Pemilu No. 1, Jakarta</li>
                    <li>Telp: (021) 1234-5678</li>
                    <li>Email: info@indonesiabijak.com</li>
                </ul>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">© 2024 Indonesia Bijak. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section end -->




</html>
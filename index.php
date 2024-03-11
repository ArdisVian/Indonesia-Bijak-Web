<?php
//koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbcrud";

//make connection
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

//tombol simpan
if (isset($_POST['bsimpan'])) {

    if (isset($_GET['hal']) == "edit") {
        $edit = mysqli_query($koneksi, "UPDATE tmahasiswa SET NIK = '$_POST[tNIK]', nama = '$_POST[tnama]', tempat_lahir = '$_POST[tlahir]', 
    tgl_lahir = '$_POST[ttgl_lahir]',  jenis_kelamin = '$_POST[tjenis_kelamin]',  agama = '$_POST[tagama]',  nomor_telepon = '$_POST[tnomor_telepon]',
     alamat = '$_POST[talamat]' WHERE NIK = '$_GET[id]'");

        // test jika edit data berhasil
        if ($edit) {
            echo "<script>
    alert('Edit Data Berhasil!');
    document.location='index.php';
    </script>";
        } else {
            echo "<script>
    alert('Edit Data Gagal!');
    document.location='index.php';
    </script>";
        }
    } else {
        //save data
        $save = mysqli_query($koneksi, " INSERT INTO tmahasiswa (NIK, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, nomor_telepon) VALUE 
  ( '$_POST[tNIK]', '$_POST[tnama]', '$_POST[tlahir]', '$_POST[ttgl_lahir]', '$_POST[tjenis_kelamin]', '$_POST[tagama]', '$_POST[talamat]', '$_POST[tnomor_telepon]')");

        // test jika simpan data berhasil
        if ($save) {
            echo "<script>
    alert('Simpan Data Berhasil!');
    document.location='index.php';
    </script>";
        } else {
            echo "<script>
    alert('Simpan Data Gagal!');
    document.location='index.php';
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
        $tampil = mysqli_query($koneksi, "SELECT * FROM tmahasiswa WHERE NIK =  '$_GET[id]'");
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
        $hapus = mysqli_query($koneksi, "DELETE FROM tmahasiswa WHERE NIK = '$_GET[id]'");
        // test jika hapus data berhasil
        if ($hapus) {
            echo "<script>
    alert('Hapus Data Berhasil!');
    document.location='index.php';
    </script>";
        } else {
            echo "<script>
    alert('Hapus Data Gagal!');
    document.location='index.php';
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

    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Indonesia Bijak</a>
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
                        <a class="nav-link" href="#Partai">Partai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Kandidat">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Program">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Lokasi">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat delectus, consequuntur maiores voluptas
                debitis unde.</p>
            <a href="#" class="cta">Tentukan Pilihanmu</a>
        </main>
    </section>

    <!-- Partai Section start -->
    <section class="partai-slideshow" id="Partai">

        <h1>TES Partai</h1>

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


    <!-- LOGIN Section start -->
    <section class="login" id="login">

        <div class="container">

            <h3 class="text-center text-dark">Aplikasi CRUD PHP OOP dan MYSQL</h3>


            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            Input Data
                        </div>
                        <div class="card-body">
                            <form method="POST">

                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="tNIK" value="<?= $vNIK ?>" class="form-control"
                                        placeholder="NIK">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <input type="text" name="tnama" value="<?= $vnama ?>" class="form-control"
                                        placeholder="Nama">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tlahir" value="<?= $vtlahir ?>" class="form-control"
                                        placeholder="Tempat Lahir">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="ttgl_lahir" value="<?= $vtgl_lahir ?>"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div>
                                        <input type="radio" id="laki-laki" name="tjenis_kelamin" value="laki-laki"
                                            class="form-check-input" <?= ($vj_k == 'laki-laki') ? 'checked' : '' ?>>
                                        <label for="laki-laki" class="form-check-label">laki-laki</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="perempuan" name="tjenis_kelamin" value="perempuan"
                                            class="form-check-input" <?= ($vj_k == 'perempuan') ? 'checked' : '' ?>>
                                        <label for="perempuan" class="form-check-label">perempuan</label>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select name="tagama" class="form-select">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" <?= ($vagama == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                        <option value="Kristen" <?= ($vagama == 'Kristen') ? 'selected' : '' ?>>Kristen
                                        </option>
                                        <option value="Katolik" <?= ($vagama == 'Katolik') ? 'selected' : '' ?>>Katolik
                                        </option>
                                        <option value="Hindu" <?= ($vagama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                        <option value="Buddha" <?= ($vagama == 'Buddha') ? 'selected' : '' ?>>Buddha
                                        </option>
                                        <option value="Konghucu" <?= ($vagama == 'Konghucu') ? 'selected' : '' ?>>Konghucu
                                        </option>
                                        <option value="Kepercayaan Lain" <?= ($vagama == 'Kepercayaan Lain') ? 'selected' : '' ?>>Kepercayaan
                                            Lain</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="talamat" value="<?= $valamat ?>" class="form-control"
                                        placeholder="Masukkan alamat lengkap Anda">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="tel" name="tnomor_telepon" value="<?= $vno_telp ?>"
                                        class="form-control" placeholder="Masukkan nomor telepon Anda">
                                </div>

                                <div class="text-center">
                                    <hr>
                                    <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                                    <button class="btn btn-danger" name="bkosongkan" type="reset">Kosongkan</button>
                                </div>


                            </form>
                        </div>
                        <div class="card-footer text-body-secondary">
                        </div>
                    </div>
                </div>
            </div>


            <div class="card text-center mt-3">
                <div class="card-header">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <div class="col-md-6 mx-auto">
                        <form method="POST">
                            <div class="input-group mb-3">
                                <input type="text" name="tcari" class="form-control" placeholder="Masukkan Kata Kunci">
                                <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                                <button class="btn btn-danger" name="breset" type="submit">Reset</button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php

                        if (isset($_POST['bcari'])) {
                            $keyword = $_POST['tcari'];
                            $q = "SELECT * FROM tmahasiswa WHERE NIK LIKE '%$keyword%' or nama LIKE '%$keyword%' ORDER BY NIK";
                        } else {
                            $q = "SELECT * FROM tmahasiswa ORDER BY NIK ASC";
                        }

                        $tampil = mysqli_query($koneksi, $q);
                        while ($data = mysqli_fetch_array($tampil)):

                            ?>
                            <tbody>
                                <!-- Data Mahasiswa akan ditampilkan di sini -->
                                <tr>
                                    <td>
                                        <?= $data['NIK'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tempat_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tgl_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $data['jenis_kelamin'] ?>
                                    </td>
                                    <td>
                                        <?= $data['agama'] ?>
                                    </td>
                                    <td>
                                        <?= $data['alamat'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nomor_telepon'] ?>
                                    </td>
                                    <td>
                                        <a href="index.php?hal=edit&id=<?= $data['NIK'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?hal=hapus&id=<?= $data['NIK'] ?>" class="btn btn-danger"
                                            onclick="return confirm('Yakin Hapus Data?')">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>

                        <?php endwhile; ?>
                    </table>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>


        </div>

    </section>
    <!-- Login Section end -->
    <!-- Hero Section end -->


    <!-- Feather Icons -->
    <script>
        feather.replace(); 
    </script>

    <!-- My Javascript -->
    <script src="JS/script.js"></script>
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
            <!-- <div class="col-md-3">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#Home" class="text-white">Home</a></li>
                    <li><a href="#Partai" class="text-white">Partai</a></li>
                    <li><a href="#Kandidat" class="text-white">Kandidat</a></li>
                    <li><a href="#Program" class="text-white">Program</a></li>
                    <li><a href="#Lokasi" class="text-white">Lokasi</a></li>
                    <li><a href="#Contact" class="text-white">Kontak</a></li>
                    <li><a href="#About" class="text-white">Tentang Kami</a></li>
                </ul>
            </div> -->
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
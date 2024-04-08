<?php
//koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbcrud";

//make connection
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

session_start(); // Mulai sesi
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
    <meta charset="utf-8">


    <title>bs5 edit profile account details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <div class="nav nav-borders">
                <a href="javascript:history.go(-1);" class="btn-logo">
                    <img src="Assets/arrow.png" alt="Back" class="arrow-icon"
                        style="width: 30px; height: 20px; margin-right: 20px;">
                </a>
            </div>
            <a class="nav-link active ms-0" target="__blank">Profile</a>
            <!-- Tombol kembali ke user.php -->
        </nav>

        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">

                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

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
                                            placeholder="NIK" <?php if (isset($_GET['hal']) && $_GET['hal'] == 'edit')
                                                echo 'readonly'; ?>>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
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
                                            <option value="Islam" <?= ($vagama == 'Islam') ? 'selected' : '' ?>>Islam
                                            </option>
                                            <option value="Kristen" <?= ($vagama == 'Kristen') ? 'selected' : '' ?>>Kristen
                                            </option>
                                            <option value="Katolik" <?= ($vagama == 'Katolik') ? 'selected' : '' ?>>Katolik
                                            </option>
                                            <option value="Hindu" <?= ($vagama == 'Hindu') ? 'selected' : '' ?>>Hindu
                                            </option>
                                            <option value="Buddha" <?= ($vagama == 'Buddha') ? 'selected' : '' ?>>Buddha
                                            </option>
                                            <option value="Konghucu" <?= ($vagama == 'Konghucu') ? 'selected' : '' ?>>
                                                Konghucu
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
                                        <button class="btn btn-danger" name="bkosongkan" type="reset">Reset</button>
                                    </div>


                                </form>
                            </div>
                            <div class="card-footer text-body-secondary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
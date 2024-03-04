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
    $edit = mysqli_query($koneksi, "UPDATE tmahasiswa SET NIS = '$_POST[tNIS]', nama = '$_POST[tnama]', tempat_lahir = '$_POST[tlahir]', 
    tgl_lahir = '$_POST[ttgl_lahir]',  jenis_kelamin = '$_POST[tjenis_kelamin]',  agama = '$_POST[tagama]',  nomor_telepon = '$_POST[tnomor_telepon]',
     alamat = '$_POST[talamat]' WHERE NIS = '$_GET[id]'");

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
    $save = mysqli_query($koneksi, " INSERT INTO tmahasiswa (NIS, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, nomor_telepon) VALUE 
  ( '$_POST[tNIS]', '$_POST[tnama]', '$_POST[tlahir]', '$_POST[ttgl_lahir]', '$_POST[tjenis_kelamin]', '$_POST[tagama]', '$_POST[talamat]', '$_POST[tnomor_telepon]')");

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

$vNIS = "";
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
    $tampil = mysqli_query($koneksi, "SELECT * FROM tmahasiswa WHERE NIS =  '$_GET[id]'");
    $data = mysqli_fetch_array($tampil);
    if ($data) {
      $vNIS = $data['NIS'];
      $vnama = $data['nama'];
      $vtlahir = $data['tempat_lahir'];
      $vtgl_lahir = $data['tgl_lahir'];
      $vj_k = $data['jenis_kelamin'];
      $vagama = $data['agama'];
      $valamat = $data['alamat'];
      $vno_telp = $data['nomor_telepon'];
    }

  } else if ($_GET['hal'] == 'hapus') {
    $hapus = mysqli_query($koneksi, "DELETE FROM tmahasiswa WHERE NIS = '$_GET[id]'");
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

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crud Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h3>Aplikasi CRUD PHP OOP dan MYSQL</h3>


    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header bg-primary text-center">
            Input Data Mahasiswa
          </div>
          <div class="card-body">
            <form method="POST">

              <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="tNIS" value="<?= $vNIS ?>" class="form-control" placeholder="NIS">
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="tnama" value="<?= $vnama ?>" class="form-control" placeholder="Nama">
              </div>

              <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tlahir" value="<?= $vtlahir ?>" class="form-control"
                  placeholder="Tempat Lahir">
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="ttgl_lahir" value="<?= $vtgl_lahir ?>" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div>
                  <input type="radio" id="laki-laki" name="tjenis_kelamin" value="laki-laki" class="form-check-input"
                    <?= ($vj_k == 'laki-laki') ? 'checked' : '' ?>>
                  <label for="laki-laki" class="form-check-label">laki-laki</label>
                </div>
                <div>
                  <input type="radio" id="perempuan" name="tjenis_kelamin" value="perempuan" class="form-check-input"
                    <?= ($vj_k == 'perempuan') ? 'checked' : '' ?>>
                  <label for="perempuan" class="form-check-label">perempuan</label>
                </div>
              </div>


              <div class="mb-3">
                <label class="form-label">Agama</label>
                <select name="tagama" class="form-select">
                  <option value="">Pilih Agama</option>
                  <option value="Islam" <?= ($vagama == 'Islam') ? 'selected' : '' ?>>Islam</option>
                  <option value="Kristen" <?= ($vagama == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                  <option value="Katolik" <?= ($vagama == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                  <option value="Hindu" <?= ($vagama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                  <option value="Buddha" <?= ($vagama == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                  <option value="Konghucu" <?= ($vagama == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
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
                <input type="tel" name="tnomor_telepon" value="<?= $vno_telp ?>" class="form-control"
                  placeholder="Masukkan nomor telepon Anda">
              </div>

              <div class="text-center">
                <hr>
                <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                <button class="btn btn-danger" name="bkosongkan" type="reset">Kosongkan</button>
              </div>


            </form>
          </div>
          <div class="card-footer text-body-secondary bg-primary">
          </div>
        </div>
      </div>
    </div>


    <div class="card text-center mt-3">
      <div class="card-header bg-primary">
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
              <th scope="col">NIS</th>
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
            $q = "SELECT * FROM tmahasiswa WHERE NIS LIKE '%$keyword%' or nama LIKE '%$keyword%' ORDER BY NIS";
          } else {
            $q = "SELECT * FROM tmahasiswa ORDER BY NIS ASC";
          }

          $tampil = mysqli_query($koneksi, $q);
          while ($data = mysqli_fetch_array($tampil)):

            ?>
            <tbody>
              <!-- Data Mahasiswa akan ditampilkan di sini -->
              <tr>
                <td>
                  <?= $data['NIS'] ?>
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
                  <a href="index.php?hal=edit&id=<?= $data['NIS'] ?>" class="btn btn-warning">Edit</a>
                  <a href="index.php?hal=hapus&id=<?= $data['NIS'] ?>" class="btn btn-danger"
                    onclick="return confirm('Yakin Hapus Data?')">Hapus</a>
                </td>
              </tr>
            </tbody>

          <?php endwhile; ?>
        </table>
      </div>
      <div class="card-footer text-muted bg-primary">
      </div>
    </div>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
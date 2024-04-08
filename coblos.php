<?php
session_start(); // Mulai sesi

// Buat koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "dbcrud";

$conn = mysqli_connect($server, $username, $password, $database);

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Ambil NIK pengguna yang sudah login
    $NIK = $_SESSION['NIK'];

    // Cek apakah pengguna sudah pernah mengisi form sebelumnya
    $query_check = "SELECT * FROM pilihan_user WHERE NIK = '$NIK'";
    $result_check = mysqli_query($conn, $query_check);

    // Jika pengguna sudah pernah mengisi form, tampilkan pesan dan arahkan ke halaman sebelumnya
    if (mysqli_num_rows($result_check) > 0) {
        echo "Anda telah melakukan pemilihan sebelumnya. Anda tidak dapat mengisi form lagi.";
        exit; // Keluar dari skrip
    }

    // Proses form jika dikirimkan
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $id_partai = $_POST['partai'];
        $id_capres = $_POST['presiden'];
        $tgl_coblos = date('Y-m-d'); // Tanggal coblos saat ini

        // Query untuk menyimpan data ke tabel pilihan_user
        $query = "INSERT INTO pilihan_user (id_partai, id_capres, NIK, tgl_coblos) VALUES ('$id_partai', '$id_capres', '$NIK', '$tgl_coblos')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
} else {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Coblos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-5 mb-3">Form Pemilihan Partai dan Pasangan Presiden</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="partai" class="form-label">Pilih Partai</label>
                <select class="form-select" id="partai" name="partai">
                    <option selected disabled>Pilih Partai</option>
                    <option value="1">PDIP</option>
                    <option value="2">Gerindra</option>
                    <option value="3">PKB</option>
                    <option value="4">Demokrat</option>
                    <option value="5">Golkar</option>
                    <option value="6">Nasdem</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="presiden" class="form-label">Pilih Pasangan Presiden</label>
                <select class="form-select" id="presiden" name="presiden">
                    <option selected disabled>Pilih Pasangan Presiden</option>
                    <option value="1">Anies Imin</option>
                    <option value="2">Prabowo Gibran</option>
                    <option value="3">Ganjar Mahfud</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Coblos</button>
        </form>

        <!-- Tombol untuk kembali ke halaman sebelumnya -->
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
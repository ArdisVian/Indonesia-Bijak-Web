<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kandidat Presiden</title>
    <!-- Bootstrap CSS -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom CSS -->
    <style>
        .kandidat {
            padding: 50px 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            margin-top: 15px;
        }

        .learn-more {
            color: blue;
            cursor: pointer;
        }
    </style>
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
                        <a class="nav-link" href="user.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partai.php">Partai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kandidat.php">Kandidat</a>
                    </li>
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


    <section class="kandidat" id="Kandidat">
        <div class="container">
            <br><br><br>
            <h2 class="text-center mb-4">Kandidat Presiden dan Wakil Presiden</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/aniesimin.png" class="card-img-top" alt="Anies Baswedan"
                            style="width: 100%; height: 170px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Anies Muhaimin</h5>
                            <p class="learn-more" onclick="window.location.href='kandidatpres/aniesimin.php'">Pelajari
                                Selengkapnya →</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/prabowogibran.jpg" class="card-img-top" alt="Prabowo Subianto">
                        <div class="card-body text-center">
                            <h5 class="card-title">Prabowo Gibran</h5>
                            <p class="learn-more" onclick="window.location.href='prabowo.php'">Pelajari Selengkapnya →
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="Assets/ganjarmahfud.jpg" class="card-img-top" alt="Ganjar Pranowo"
                            style="width: 100%; height: 170px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ganjar Mahfud</h5>
                            <p class="learn-more" onclick="window.location.href='ganjar.php'">Pelajari Selengkapnya →
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



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
                        <a class="nav-link" href="#Partai">Partai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Kandidat">Kandidat</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#Program">Program</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#Lokasi">Lokasi</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#Contact">Kontak</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#About">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <button type="button" class="btn btn-primary">Login</button>
                        </a>
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
    <section class="partai-slideshow" id="Partai">
        <div class="container">
            <br>
            <h2 class="text-center mb-4 d-flex align-items-center justify-content-center" style="height: 80px;">
                Kandidat Partai
            </h2>
            <div class="swiper-container" style="width: 100%;">
                <div class="swiper-wrapper"
                    style="display: flex; flex-wrap: nowrap; justify-content: center; padding: 0 20px;">
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/pdip.jpg" class="card-img-top partai-image" alt="Partai 1"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>PDIP</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/golkar.jpg" class="card-img-top partai-image" alt="Partai 2"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>Golkar</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/pkb.jpg" class="card-img-top partai-image" alt="Partai 2"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>PKB</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/nasdem.png" class="card-img-top partai-image" alt="Partai 2"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>NasDem</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/gerindra.png" class="card-img-top partai-image" alt="Partai 2"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>Gerindra</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="flex: 0 0 200px; margin: 0 10px;">
                        <div class="card shadow">
                            <!-- CSS inline untuk mengatur ukuran gambar -->
                            <img src="Assets/demokrat.png" class="card-img-top partai-image" alt="Partai 2"
                                style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3>Demokrat</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak swiper-slide sesuai dengan jumlah partai yang ingin ditampilkan -->
                </div>
                <!-- Add Pagination -->
                <!-- <div class="swiper-pagination"></div> -->
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



    <!-- LOGIN Section start -->

    <!-- Login Section end -->
    <!-- Hero Section end -->


    <!-- Feather Icons -->
    <script>
        feather.replace(); 
    </script>





    < <!-- My Javascript -->
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


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
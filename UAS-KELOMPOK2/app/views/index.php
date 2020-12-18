<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/fontawesome/css/all.min.css">

    <title><?= $data['judul'] ?></title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="<?= BASEURL ?>">
                <i class="fab fa-accusoft mr-2"></i>Tutorin Aja!
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-2">
                        <a class="nav-link text-white" role="button" href="auth/login">
                            MASUK
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link text-white" role="button" href="auth/daftar">
                            DAFTAR
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->

    <!--jumbotron-->
    <div class="jumbotron">
        <div class="container">
            <h2 class="display-4">Butuh Tutor? <span class="font-weight-bold">Tutorin Aja!</span></h2>
            <p class="lead">
                Tutorin Aja! merupakan website yang menyediakan jasa private tutor <br>untuk siswa pada jenjang pendidikan SD, SMP, dan SMA<br>di daerah Bali
            </p>
        </div>
        <img src="<?= BASEURL ?>/img/gambar 1.png" alt="icon" class="float-right" id="gambar">
    </div>
    <!--end jumbotron-->

    <!--alasan harus Tutorin Aja-->
    <section>
        <div class="container">
            <div class="media">
                <img src="<?= BASEURL ?>/img/gambar 2.png" id="image" class="align-self-start mr-3" alt="icon">
                <div class="media-body">
                    <h5 class="display-4 text-muted">Mengapa harus <span class="font-weight-bold text-info">Tutorin Aja!</span></h5>
                    <div class="content">
                        <img src="<?= BASEURL ?>/img/petik.png" alt="icon" class="float">
                        <p class="text-muted">Tutor yang bekerja sama dengan Tutorin Aja! adalah tutor yang berkompeten di bidangnya.</p>
                    </div>
                    <div class="content">
                        <img src="<?= BASEURL ?>/img/petik.png" alt="icon" class="float">
                        <p class="text-muted">Tutorin Aja! adalah platform yang terpercaya untuk menemukan tutor hebat guna menambah wawasan siswa di luar jam sekolah.</p>
                    </div>
                    <div class="content">
                        <img src="<?= BASEURL ?>/img/petik.png" alt="icon" class="float">
                        <p class="text-muted">Tutorin Aja! memberikan kemudahan siswa untuk mengakses informasi mengenai tutor dan mata pelajaran yang ingin dikuasai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end alasan harus Tutorin Aja-->

    <!--dapatkan tutor keren di Tutorin Aja-->
    <section>
        <div class="container">
            <div class="tata-cara">
                <h3 class="display-4 text-muted text-center">Cari Tutor keren di Tutorin Aja!</h3>
                <div class="grid">
                    <div class="row mt-4">
                        <div class="col-md-3 col-sm-12 mb-3">
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <img src="<?= BASEURL ?>/img/step1.png" class="card-img-top mt-2" alt="...">
                                <div class="card-body">
                                    <div class="card-title text">
                                        <h4>DAFTAR</h4>
                                    </div>
                                    <p class="text-muted">Lakukan pendaftaran terlebih dahulu agar dapat mengakses website. User dapat mendaftar sebagai tutor ataupun siswa</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <img src="<?= BASEURL ?>/img/step2.png" class="card-img-top mt-2" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>CARI TUTOR</h4>
                                    </div>
                                    <p class="text-muted">Pilih guru privat yang kamu butuhkan. Masukan mata pelajaran, kecamatan/kota wilayah tempat tinggalmu, klik find tutor</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3 ">
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <img src="<?= BASEURL ?>/img/step3.png" class="card-img-top mt-2" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>RESERVASI</h4>
                                    </div>
                                    <p class="text-muted">Anda dapat melakukan reservasi setelah mendapatkan tutor yang tepat, kamu dapat memilih durasi sesuai keinginan</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <img src="<?= BASEURL ?>/img/step4.png" class="card-img-top mt-2" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>KONFIRMASI</h4>
                                    </div>
                                    <p class="text-muted">Tutor akan menerima proses permintaan kamu & kamu langsung bisa belajar dengan guru les pilihan kamu setelah dikonfirmasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--end dapatkan tutor keren di Tutorin Aja-->

    <!--footer-->
    <footer class="footer-distributed">
        <div class="footer-left">
            <div class="container">
                <h3>Tutorin Aja!</h3>
                <p class="footer-links">
                    Team<br>
                    <a href="#">Safira</a>
                    ·
                    <a href="#">Ekanad</a>
                    ·
                    <a href="#">Ari Widi</a>
                    ·
                    <a href="#">Marissa</a>
                </p>
                <p class="footer-company-name">praktikum_pbw &copy; 2020</p>
            </div>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Jalan Sudirman</span> Denpasar, Bali</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>(0361) 29880</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="#">contact@tutorin_aja.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-company-about">
                <span>Tentang Tutorin Aja!</span>
                Solusi untuk permasalahan yang dihadapi para pelajar &amp; memberikan peluang kepada pengajar.
            </p>
    </footer>
    <!--end footer-->

    <script src="<?= BASEURL ?>/js/jquery.js"></script>
    <script src="<?= BASEURL ?>/js/bootstrap.bundle.js"></script>
</body>

</html>
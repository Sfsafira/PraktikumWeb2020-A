<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">

    <title>Dashboard Admin</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="../"><i class="fab fa-accusoft mr-2"></i>Tutorin Aja!</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"></div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-2">
                    <a class="nav-link text-white logout" href="../auth/logout">LOGOUT<i class="fas fa-sign-out-alt ml-2"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row no-gutters mt-5">
        <!--bagian sisi kiri-->
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>DASHBOARD
                    </a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="tutor"><i class="fas fa-bookmark mr-2"></i>DATA TUTOR</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="siswa"><i class="fas fa-bookmark mr-2"></i>DATA SISWA</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
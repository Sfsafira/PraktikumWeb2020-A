<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">

    <title>Dashboard Siswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="<?= BASEURL ?>siswa/dashboard"><i class="fab fa-accusoft mr-2"></i>Tutorin Aja!</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"></div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-2">
                    <a class="nav-link text-white" href="<?= BASEURL ?>siswa/mycourse"><i class="fas fa-chalkboard-teacher mr-2"></i>MY TUTOR</a>
                </li>
                <li class="nav-item ml-2">
                    <a class="nav-link text-white profilsiswa" href="<?= BASEURL ?>siswa/yanglogin">PROFIL<i class="fas fa-user-alt ml-2"></i></a>
                </li>

                <li class="nav-item ml-2">
                    <a class="nav-link text-white logout" href="<?= BASEURL ?>auth/logout">LOGOUT<i class="fas fa-sign-out-alt ml-2"></i></a>
                </li>


            </ul>
        </div>
    </nav>
    <div class="modal fade" id="profilesiswa" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PROFIL SISWA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body isiprofilsiswa">

                </div>
                <div class="modal-footer">
                    <a href="<?= BASEURL ?>siswa/editprofile/<?= $data['siswa']['id'] ?>">
                        <button class="btn btn-info">Edit Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
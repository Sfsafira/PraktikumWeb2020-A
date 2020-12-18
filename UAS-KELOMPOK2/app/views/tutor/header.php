<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">

    <title>Dashboard Tutor</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="<?= BASEURL ?>">
                <i class="fab fa-accusoft mr-2"></i>Tutorin Aja!
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-2">
                        <a class="nav-link text-white profiltutor" href="<?= BASEURL ?>tutor/liatprofile/<?= $_SESSION['username'] ?>">PROFIL<i class="fas fa-user-alt ml-2"></i></a>
                    </li>

                    <li class="nav-item ml-2">
                        <a class="nav-link text-white logout" href="<?= BASEURL ?>auth/logout">LOGOUT<i class="fas fa-sign-out-alt ml-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="profiletutor" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body isiprofiltutor">

                </div>
                <div class="modal-footer">
                    <a href="<?= BASEURL ?>tutor/editprofile/<?= $data['id'] ?>">
                        <button class="btn btn-info">Edit Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="row no-gutters mt-5">
        <!--bagian sisi kiri-->
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="<?= BASEURL ?>tutor/dashboard"><i class="fas fa-chalkboard-teacher mr-2"></i>COURSE</a>
                    <hr class="bg-secondary">
                </li>
                <?php $mapel = explode(",", $data['minatmapel']);
                foreach ($mapel as $map) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= BASEURL ?>tutor/mapel/<?= $map ?>"><i class="fas fa-bookmark mr-2"></i><?= strtoupper($map) ?></a>
                        <hr class="bg-secondary">
                    </li>
                <?php endforeach; ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= BASEURL ?>tutor/info"><i class="fas fa-bell mr-2"></i>INFO</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
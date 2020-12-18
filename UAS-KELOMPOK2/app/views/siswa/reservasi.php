<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">
    <title>Reservasi</title>
</head>

<body>
    <div class="mb-4" style="background-color: #17a2b8; width: 100%;">
        <br>
        <h2 class="text-center mt-3 text-white">RESERVASI TUTOR</h2>
        <br><br>
    </div>
    <div class="container">
        <form action="../sukreservasi" method="post" class="formreservasi">
            <input type="hidden" name="idtutor" value="<?= $data['id'] ?>">
            <input type="hidden" name="usertutor" value="<?= $data['username'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilih Durasi Belajar :</label>
                        <select class="form-control <?php if (isset($_SESSION['errordurasi'])) echo 'is-invalid'; ?>" name="durasi">
                            <option selected value="">Durasi belajar</option>
                            <option <?php if (isset($_SESSION['valdurasi'])) if (strcmp($_SESSION['valdurasi'], '90menit') == 0) echo 'selected'; ?> value="90menit">90 menit - <?= $data['biaya90menit'] ?></option>
                            <option <?php if (isset($_SESSION['valdurasi'])) if (strcmp($_SESSION['valdurasi'], '120menit') == 0) echo 'selected'; ?> value="120menit">120 menit - <?= $data['biaya120menit'] ?></option>
                            <?php if (isset($_SESSION['valdurasi'])) unset($_SESSION['valdurasi']) ?>
                        </select>
                        <?php if (isset($_SESSION['errordurasi'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errordurasi'] ?>
                            </div>
                        <?php unset($_SESSION['errordurasi']);
                        endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran :</label>
                        <?php $mapel = explode(",", $data['minatmapel']); ?>
                        <select class="form-control <?php if (isset($_SESSION['errormatapelajaran'])) echo 'is-invalid'; ?>" name="matapelajaran">
                            <option selected value="">Mata pelajaran</option>
                            <?php foreach ($mapel as $map) : ?>
                                <option <?php if (isset($_SESSION['valmatapelajaran'])) if (strcmp($_SESSION['valmatapelajaran'], $map) == 0) echo 'selected'; ?> value="<?= $map ?>"><?= $map ?></option>
                            <?php endforeach; ?>
                            <?php if (isset($_SESSION['valmatapelajaran'])) unset($_SESSION['valmatapelajaran']) ?>
                        </select>
                        <?php if (isset($_SESSION['errormatapelajaran'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errormatapelajaran'] ?>
                            </div>
                        <?php unset($_SESSION['errormatapelajaran']);
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Lokasi Belajar</label>
                        <textarea class="form-control <?php if (isset($_SESSION['errorlokasibelajar'])) echo 'is-invalid'; ?>" name="lokasibelajar" placeholder="Masukkan lokasi Belajar"><?php if (isset($_SESSION['vallokasibelajar'])) echo $_SESSION['vallokasibelajar'];
                                                                                                                                                                                            unset($_SESSION['vallokasibelajar']); ?></textarea>
                        <?php if (isset($_SESSION['errorlokasibelajar'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errorlokasibelajar'] ?>
                            </div>
                        <?php unset($_SESSION['errorlokasibelajar']);
                        endif; ?>
                    </div>
                </div>
            </div>
            <br>
            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-primary">
                SELESAI
            </button>
        </form>
        <a href="<?= BASEURL ?>siswa/">
            <button class="btn btn-primary mt-4">KEMBALI</button>
        </a>
    </div>

    <script src="<?= BASEURL ?>js/jquery.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap.bundle.js"></script>
    <script src="<?= BASEURL ?>js/sweetalert2.all.js"></script>
    <script src="<?= BASEURL ?>js/jsnya.js"></script>
</body>

</html>
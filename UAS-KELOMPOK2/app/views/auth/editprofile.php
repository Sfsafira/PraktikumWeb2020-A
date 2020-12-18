<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="container my-4">
        <div class="card w-75 shadow mx-auto">
            <div class="card-header">
                <h4 class="text-center">Edit Profile</h4>
            </div>
            <div class="card-body">
                <?php $tmp =  explode("/", $_SERVER['REQUEST_URI']) ?>
                <form action="<?= BASEURL . $tmp[3] ?>/sukprofile" method="post" class="editprofil">
                    <input type="hidden" name="idnya" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control <?php if (isset($_SESSION['errornama'])) echo 'is-invalid'; ?>" name="nama" value="<?php if (isset($_SESSION['valnama'])) {
                                                                                                                                                        echo $_SESSION['valnama'];
                                                                                                                                                        unset($_SESSION['valnama']);
                                                                                                                                                    } else echo $data['nama'] ?>">
                        <?php if (isset($_SESSION['errornama'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errornama'] ?>
                            </div>
                        <?php unset($_SESSION['errornama']);
                        endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" class="form-control <?php if (isset($_SESSION['errornamapanggilan'])) echo 'is-invalid'; ?>" name="namapanggilan" placeholder="Masukkan nama panggilan anda" value="<?php if (isset($_SESSION['valnamapanggilan'])) {
                                                                                                                                                                                                                    echo $_SESSION['valnamapanggilan'];
                                                                                                                                                                                                                    unset($_SESSION['valnamapanggilan']);
                                                                                                                                                                                                                } else echo $data['namapanggilan'] ?>">
                        <?php if (isset($_SESSION['errornamapanggilan'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errornamapanggilan'] ?>
                            </div>
                        <?php unset($_SESSION['errornamapanggilan']);
                        endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control <?php if (isset($_SESSION['errorjeniskelamin'])) echo 'is-invalid'; ?>" name="jeniskelamin">
                            <option value="">Jenis Kelamin</option>
                            <option <?php if (strcmp($data['jk'], 'perempuan') == 0) echo "selected";
                                    else if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], 'perempuan') == 0) echo 'selected'; ?> value="perempuan">Perempuan</option>
                            <option <?php if (strcmp($data['jk'], 'laki-laki') == 0) echo "selected";
                                    else if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], "laki-laki") == 0) echo 'selected'; ?> value="laki-laki">Laki-Laki</option>
                            <?php if (isset($_SESSION['valjeniskelamin'])) unset($_SESSION['valjeniskelamin']) ?>
                        </select>
                        <?php if (isset($_SESSION['errorjeniskelamin'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errorjeniskelamin'] ?>
                            </div>
                        <?php unset($_SESSION['errorjeniskelamin']);
                        endif; ?>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="notlp" class="form-control <?php if (isset($_SESSION['errornotlp'])) echo 'is-invalid'; ?>" value="<?php if (isset($_SESSION['valnotlp'])) {
                                                                                                                                                        echo $_SESSION['valnotlp'];
                                                                                                                                                        unset($_SESSION['valnotlp']);
                                                                                                                                                    } else echo $data['notlp'] ?>">
                        <?php if (isset($_SESSION['errornotlp'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errornotlp'] ?>
                            </div>
                        <?php unset($_SESSION['errornotlp']);
                        endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempatlahir" class="form-control <?php if (isset($_SESSION['errortempatlahir'])) echo 'is-invalid'; ?>" placeholder="Masukkan tempat lahir anda" value="<?php if (isset($_SESSION['valtempatlahir'])) {
                                                                                                                                                                                                                echo $_SESSION['valtempatlahir'];
                                                                                                                                                                                                                unset($_SESSION['valtempatlahir']);
                                                                                                                                                                                                            } else echo $data['tempatlahir'] ?>">
                        <?php if (isset($_SESSION['errortempatlahir'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['errortempatlahir'] ?>
                            </div>
                        <?php unset($_SESSION['errortempatlahir']);
                        endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Detail Alamat</label>
                        <textarea class="form-control <?php if (isset($_SESSION['erroralamat'])) echo 'is-invalid'; ?>" name="alamat" placeholder="Masukkan detail alamat"><?php if (isset($_SESSION['valalamat'])) {
                                                                                                                                                                                echo $_SESSION['valalamat'];
                                                                                                                                                                                unset($_SESSION['valalamat']);
                                                                                                                                                                            } else echo $data['alamat'] ?></textarea>
                        <?php if (isset($_SESSION['erroralamat'])) : ?>
                            <div class="invalid-feedback">
                                <?= $_SESSION['erroralamat'] ?>
                            </div>
                        <?php unset($_SESSION['erroralamat']);
                        endif; ?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-block" type="submit">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= BASEURL ?>js/jquery.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap.bundle.js"></script>
    <script src="<?= BASEURL ?>js/sweetalert2.all.js"></script>
    <script src="<?= BASEURL ?>js/jsnya.js"></script>
    <script src="<?= BASEURL ?>js/bs-custom-file-input.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        });
    </script>
</body>

</html>
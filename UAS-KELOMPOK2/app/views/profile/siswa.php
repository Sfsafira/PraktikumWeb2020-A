<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>css/datepicker.css">

    <title>Formulir Siswa</title>
</head>

<body>

    <div class="mb-4" style="background-color: #17a2b8; width: 100%;">
        <br>
        <h2 class="text-center mt-3 text-white">Data Profil Siswa</h2>
        <br>
        <div class="container">
            <a href="logout">
                <button class="btn btn-primary btn-sm mb-2">Logout</button>
            </a>
        </div>
        <br>
    </div>
    <div class="container">
        <?php if (isset($_SESSION['sukses'])) : ?>
            <div class="alert alert-success"><?= $_SESSION['sukses'] ?></div>
        <?php unset($_SESSION['sukses']);
        endif; ?>
        <form action="sukdatasiswa" method="post" enctype="multipart/form-data">
            <?php if ($_SESSION['ceklengkap'] == 0) : ?>
                <div class="profil-siswa">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control <?php if (isset($_SESSION['errornama'])) echo 'is-invalid'; ?>" name="nama" value="<?php if (isset($_SESSION['valnama'])) {
                                                                                                                                                                echo $_SESSION['valnama'];
                                                                                                                                                                unset($_SESSION['valnama']);
                                                                                                                                                            } else echo $data['user']['nama'] ?>">
                                <?php if (isset($_SESSION['errornama'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornama'] ?>
                                    </div>
                                <?php unset($_SESSION['errornama']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="username" class="form-control" name="username" value="<?= $data['user']['username'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input type="text" class="form-control <?php if (isset($_SESSION['errornamapanggilan'])) echo 'is-invalid'; ?>" name="namapanggilan" placeholder="Masukkan nama panggilan anda" value="<?php if (isset($_SESSION['valnamapanggilan'])) echo $_SESSION['valnamapanggilan'];
                                                                                                                                                                                                                            unset($_SESSION['valnamapanggilan']); ?>">
                                    <?php if (isset($_SESSION['errornamapanggilan'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errornamapanggilan'] ?>
                                        </div>
                                    <?php unset($_SESSION['errornamapanggilan']);
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $data['user']['email'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control <?php if (isset($_SESSION['errorjeniskelamin'])) echo 'is-invalid'; ?>" name="jeniskelamin">
                                        <option selected value="">Jenis Kelamin</option>
                                        <option <?php if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], 'perempuan') == 0) echo 'selected'; ?> value="perempuan">Perempuan</option>
                                        <option <?php if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], "laki-laki") == 0) echo 'selected'; ?> value="laki-laki">Laki-Laki</option>
                                        <?php if (isset($_SESSION['valjeniskelamin'])) unset($_SESSION['valjeniskelamin']) ?>
                                    </select>
                                    <?php if (isset($_SESSION['errorjeniskelamin'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errorjeniskelamin'] ?>
                                        </div>
                                    <?php unset($_SESSION['errorjeniskelamin']);
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" name="notlp" class="form-control <?php if (isset($_SESSION['errornotlp'])) echo 'is-invalid'; ?>" value="<?php if (isset($_SESSION['valnotlp'])) {
                                                                                                                                                                    echo $_SESSION['valnotlp'];
                                                                                                                                                                    unset($_SESSION['valnotlp']);
                                                                                                                                                                } else echo $data['user']['notlp'] ?>">
                                    <?php if (isset($_SESSION['errornotlp'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errornotlp'] ?>
                                        </div>
                                    <?php unset($_SESSION['errornotlp']);
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempatlahir" class="form-control <?php if (isset($_SESSION['errortempatlahir'])) echo 'is-invalid'; ?>" placeholder="Masukkan tempat lahir anda" value="<?php if (isset($_SESSION['valtempatlahir'])) echo $_SESSION['valtempatlahir'];
                                                                                                                                                                                                                        unset($_SESSION['valtempatlahir']); ?>">
                                    <?php if (isset($_SESSION['errortempatlahir'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errortempatlahir'] ?>
                                        </div>
                                    <?php unset($_SESSION['errortempatlahir']);
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" name="tanggallahir" id="tLahir" autocomplete="off" class="form-control <?php if (isset($_SESSION['errortanggallahir'])) echo 'is-invalid'; ?>" placeholder="Masukkan tanggal lahir anda" value="<?php if (isset($_SESSION['valtanggallahir'])) echo $_SESSION['valtanggallahir'];
                                                                                                                                                                                                                                                        unset($_SESSION['valtanggallahir']); ?>">
                                    <?php if (isset($_SESSION['errortanggallahir'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errortanggallahir'] ?>
                                        </div>
                                    <?php unset($_SESSION['errortanggallahir']);
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <select class="form-control <?php if (isset($_SESSION['errorjenjangpendidikan'])) echo 'is-invalid'; ?>" name="jenjangpendidikan">
                                        <option selected value="">Jenjang Pendidikan</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '1 SD') == 0) echo 'selected'; ?> value="1 SD">1 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '2 SD') == 0) echo 'selected'; ?> value="2 SD">2 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '3 SD') == 0) echo 'selected'; ?> value="3 SD">3 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '4 SD') == 0) echo 'selected'; ?> value="4 SD">4 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '5 SD') == 0) echo 'selected'; ?> value="5 SD">5 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '6 SD') == 0) echo 'selected'; ?> value="6 SD">6 SD</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '1 SMP') == 0) echo 'selected'; ?> value="1 SMP">1 SMP</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '2 SMP') == 0) echo 'selected'; ?> value="2 SMP">2 SMP</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '3 SMP') == 0) echo 'selected'; ?> value="3 SMP">3 SMP</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '1 SMA') == 0) echo 'selected'; ?> value="1 SMA">1 SMA</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '2 SMA') == 0) echo 'selected'; ?> value="2 SMA">2 SMA</option>
                                        <option <?php if (isset($_SESSION['valjenjangpendidikan'])) if (strcmp($_SESSION['valjenjangpendidikan'], '3 SMA') == 0) echo 'selected'; ?> value="3 SMA">3 SMA</option>
                                        <?php if (isset($_SESSION['valjenjangpendidikan'])) unset($_SESSION['valjenjangpendidikan']) ?>
                                    </select>
                                    <?php if (isset($_SESSION['errorjenjangpendidikan'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errorjenjangpendidikan'] ?>
                                        </div>
                                    <?php unset($_SESSION['errorjenjangpendidikan']);
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asal Sekolah</label>
                                    <input type="text" name="asalsekolah" class="form-control <?php if (isset($_SESSION['errorasalsekolah'])) echo 'is-invalid'; ?>" placeholder="Masukkan asal sekolah anda" value="<?php if (isset($_SESSION['valasalsekolah'])) echo $_SESSION['valasalsekolah'];
                                                                                                                                                                                                                        unset($_SESSION['valasalsekolah']); ?>">
                                    <?php if (isset($_SESSION['errorasalsekolah'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['errorasalsekolah'] ?>
                                        </div>
                                    <?php unset($_SESSION['errorasalsekolah']);
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($_SESSION['ceklengkap'] == 1) : ?>
                <div class="formulir-siswa">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Orang Tua/Wali</label>
                                <input type="text" class="form-control <?php if (isset($_SESSION['errornamaortu'])) echo 'is-invalid'; ?>" name="namaortu" placeholder="Masukkan nama orang tua/wali" value="<?php if (isset($_SESSION['valnamaortu'])) echo $_SESSION['valnamaortu'];
                                                                                                                                                                                                                unset($_SESSION['valnamaortu']); ?>">
                                <?php if (isset($_SESSION['errornamaortu'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornamaortu'] ?>
                                    </div>
                                <?php unset($_SESSION['errornamaortu']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telepon orang tua</label>
                                <input type="text" class="form-control <?php if (isset($_SESSION['errornotlportu'])) echo 'is-invalid'; ?>" name="notlportu" placeholder="Masukkan No. Telepon orang tua" value="<?php if (isset($_SESSION['valnotlportu'])) echo $_SESSION['valnotlportu'];
                                                                                                                                                                                                                    unset($_SESSION['valnotlportu']); ?>">
                                <?php if (isset($_SESSION['errornotlportu'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornotlportu'] ?>
                                    </div>
                                <?php unset($_SESSION['errornotlportu']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Alamat</p>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <br>
                                    <select name="kabupaten" class="selectpicker kabupaten" required data-live-search="true" title="kabupaten" data-size="7" data-width="100%">
                                        <?php foreach ($data['kabupaten'] as $kab) : ?>
                                            <option value="<?= $kab['id'] ?>"><?= $kab['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kecamatan</label> <br>
                                    <select name="kecamatan" class="selectpicker kecamatan" required id="kecamatan" data-live-search="true" title="Kecamatan" data-size="7" data-width="100%">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelurahan</label> <br>
                                    <select name="kelurahan" class="selectpicker kelurahan" required id="kelurahan" data-live-search="true" title="Kelurahan" data-size="7" data-width="100%">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Detail Alamat</label>
                                    <textarea class="form-control <?php if (isset($_SESSION['erroralamat'])) echo 'is-invalid'; ?>" name="alamat" placeholder="Masukkan detail alamat"><?php if (isset($_SESSION['valalamat'])) echo $_SESSION['valalamat'];
                                                                                                                                                                                        unset($_SESSION['valalamat']); ?></textarea>
                                    <?php if (isset($_SESSION['erroralamat'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= $_SESSION['erroralamat'] ?>
                                        </div>
                                    <?php unset($_SESSION['erroralamat']);
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php if (isset($_SESSION['errorfoto'])) echo 'is-invalid'; ?>" id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                <?php if (isset($_SESSION['errorfoto'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorfoto'] ?>
                                    </div>
                                <?php unset($_SESSION['errorfoto']);
                                endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <button type="submit" name="masukan" class="btn btn-primary my-3">SELANJUTNYA</button>
        </form>
    </div>

    <script src="<?= BASEURL ?>js/jquery.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap.bundle.js"></script>
    <script src="<?= BASEURL ?>js/jsnya.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap-select.js"></script>
    <script src="<?= BASEURL ?>js/select/defaults-id_ID.js"></script>
    <script src="<?= BASEURL ?>js/datepicker.js"></script>
    <script src="<?= BASEURL ?>js/bs-custom-file-input.js"></script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
        $('#tLahir').datepicker({
            autoHide: true,
            format: 'yyyy-mm-dd'
        });
        $(".kabupaten").change(function() {
            var id = $(this).val();
            var urel = "<?= BASEURL ?>/auth/alamat/kecamatan";
            $.ajax({
                type: "post",
                url: urel,
                dataType: "html",
                data: "id_kabupaten=" + id,
                success: function(msg) {
                    $("#kecamatan").html(msg).selectpicker('refresh');
                    $("select.kecamatan").selectpicker('refresh');
                    ambildatakelurahan();
                }
            });
        });
        $("#kecamatan").change(ambildatakelurahan);

        function ambildatakelurahan() {
            var idkc = $("#kecamatan").val();
            var urlkl = "<?= BASEURL ?>/auth/alamat/kelurahan";
            $.ajax({
                type: 'post',
                url: urlkl,
                dataType: 'html',
                data: "id_kecamatan=" + idkc,
                success: function(msg) {
                    $("#kelurahan").html(msg).selectpicker('refresh');
                    $("select.kelurahan").selectpicker('refresh');
                }
            });
        }
    </script>
</body>

</html>
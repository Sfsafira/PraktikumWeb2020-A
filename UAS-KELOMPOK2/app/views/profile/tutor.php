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

    <title>Formulir Tutor</title>
</head>

<body>
    <div class="mb-4" style="background-color: #17a2b8; width: 100%;">
        <br>
        <h2 class="text-center mt-3 text-white">DATA PROFIL TUTOR</h2>
        <br>
        <div class="container">
            <a href="logout">
                <button class="btn btn-primary btn-sm mb-2 logout">Logout</button>
            </a>
        </div>
    </div>
    <div class="container">
        <?php if (isset($_SESSION['sukses'])) : ?>
            <div class="alert alert-success sukses"><?= $_SESSION['sukses'] ?></div>
        <?php unset($_SESSION['sukses']);
        endif; ?>
        <form action="sukdatatutor" method="post" enctype="multipart/form-data">
            <?php if ($_SESSION['ceklengkap'] == 0) : ?>
                <div class="data-profil">
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
                                    <option selected disabled>Jenis Kelamin</option>
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
                    <div>
                        <p>Alamat</p>
                    </div>
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
                    <br>
                </div>
            <?php elseif ($_SESSION['ceklengkap'] == 1) : ?>
                <div class="riwayat-pendidikan">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control <?php if (isset($_SESSION['errorpendidikan_terakhir'])) echo 'is-invalid'; ?>" name="pendidikan_terakhir">
                                    <option selected value="">Pendidikan Terakhir</option>
                                    <option <?php if (isset($_SESSION['valpendidikan_terakhir'])) if (strcmp($_SESSION['valpendidikan_terakhir'], 'SMAsederajat') == 0) echo 'selected'; ?> value="SMAsederajat">SMA/Sederajat</option>
                                    <option <?php if (isset($_SESSION['valpendidikan_terakhir'])) if (strcmp($_SESSION['valpendidikan_terakhir'], 'D1') == 0) echo 'selected'; ?> value="D1">D1</option>
                                    <option <?php if (isset($_SESSION['valpendidikan_terakhir'])) if (strcmp($_SESSION['valpendidikan_terakhir'], 'D2') == 0) echo 'selected'; ?> value="D2">D2</option>
                                    <option <?php if (isset($_SESSION['valpendidikan_terakhir'])) if (strcmp($_SESSION['valpendidikan_terakhir'], 'D3') == 0) echo 'selected'; ?> value="D3">D3</option>
                                    <option <?php if (isset($_SESSION['valpendidikan_terakhir'])) if (strcmp($_SESSION['valpendidikan_terakhir'], 'D4/S1') == 0) echo 'selected'; ?> value="D4/S1">D4/S1</option>
                                </select>
                                <?php if (isset($_SESSION['valpendidikan_terakhir'])) unset($_SESSION['valpendidikan_terakhir']) ?>
                                <?php if (isset($_SESSION['errorpendidikan_terakhir'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorpendidikan_terakhir'] ?>
                                    </div>
                                <?php unset($_SESSION['errorpendidikan_terakhir']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" name="keterangan_pendidikan" class="form-control <?php if (isset($_SESSION['errorketerangan_pendidikan'])) echo 'is-invalid'; ?>" placeholder="Keterangan pendidikan" value="<?php if (isset($_SESSION['valketerangan_pendidikan'])) echo $_SESSION['valketerangan_pendidikan'];
                                                                                                                                                                                                                                unset($_SESSION['valketerangan_pendidikan']); ?>">
                                <?php if (isset($_SESSION['errorketerangan_pendidikan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorketerangan_pendidikan'] ?>
                                    </div>
                                <?php unset($_SESSION['errorketerangan_pendidikan']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Perguruan Tinggi</label>
                                <input type="text" name="perguruan_tinggi" class="form-control <?php if (isset($_SESSION['errorperguruan_tinggi'])) echo 'is-invalid'; ?>" placeholder="Nama perguruan tinggi" value="<?php if (isset($_SESSION['valperguruan_tinggi'])) echo $_SESSION['valperguruan_tinggi'];
                                                                                                                                                                                                                        unset($_SESSION['valperguruan_tinggi']); ?>">
                                <?php if (isset($_SESSION['errorperguruan_tinggi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorperguruan_tinggi'] ?>
                                    </div>
                                <?php unset($_SESSION['errorperguruan_tinggi']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" name="program_studi" class="form-control <?php if (isset($_SESSION['errorprogram_studi'])) echo 'is-invalid'; ?>" placeholder="Keterangan program studi" value="<?php if (isset($_SESSION['valprogram_studi'])) echo $_SESSION['valprogram_studi'];
                                                                                                                                                                                                                    unset($_SESSION['valprogram_studi']); ?>">
                                <?php if (isset($_SESSION['errorprogram_studi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorprogram_studi'] ?>
                                    </div>
                                <?php unset($_SESSION['errorprogram_studi']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IPK Terakhir</label>
                                <input type="text" name="IPK" class="form-control <?php if (isset($_SESSION['errorIPK'])) echo 'is-invalid'; ?>" placeholder="Masukkan IPK terakhir" value="<?php if (isset($_SESSION['valIPK'])) echo $_SESSION['valIPK'];
                                                                                                                                                                                            unset($_SESSION['valIPK']); ?>">
                                <?php if (isset($_SESSION['errorIPK'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorIPK'] ?>
                                    </div>
                                <?php unset($_SESSION['errorIPK']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="">Upload ijazah/transkrip nilai terakhir</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php if (isset($_SESSION['errorijasah'])) echo 'is-invalid'; ?>" id="customFile" name="ijasah">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                <small class="text-info">file harus: jpg atau pdf</small>
                                <?php if (isset($_SESSION['errorijasah'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorijasah'] ?>
                                    </div>
                                <?php unset($_SESSION['errorijasah']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php elseif ($_SESSION['ceklengkap'] == 2) : ?>
                <div class="deskripsi-tutor">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Perkenalan</label>
                                <textarea class="form-control <?php if (isset($_SESSION['errorperkenalan'])) echo 'is-invalid'; ?>" name="perkenalan" placeholder="Perkenalkan diri Anda secara singkat"><?php if (isset($_SESSION['valperkenalan'])) echo $_SESSION['valperkenalan'];
                                                                                                                                                                                                            unset($_SESSION['valperkenalan']); ?></textarea>
                                <?php if (isset($_SESSION['errorperkenalan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorperkenalan'] ?>
                                    </div>
                                <?php unset($_SESSION['errorperkenalan']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pengalaman Mengajar</label>
                                <textarea class="form-control <?php if (isset($_SESSION['errorpengalaman'])) echo 'is-invalid'; ?>" name="pengalaman" placeholder="Masukkan pengalaman mengajar"><?php if (isset($_SESSION['valpengalaman'])) echo $_SESSION['valpengalaman'];
                                                                                                                                                                                                    unset($_SESSION['valpengalaman']); ?></textarea>
                                <?php if (isset($_SESSION['errorpengalaman'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorpengalaman'] ?>
                                    </div>
                                <?php unset($_SESSION['errorpengalaman']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Prestasi</label>
                                <textarea class="form-control <?php if (isset($_SESSION['errorprestasi'])) echo 'is-invalid'; ?>" name="prestasi" placeholder="Masukkan prestasi yang pernah diraih"><?php if (isset($_SESSION['valprestasi'])) echo $_SESSION['valprestasi'];
                                                                                                                                                                                                        unset($_SESSION['valprestasi']); ?></textarea>
                                <?php if (isset($_SESSION['errorprestasi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorprestasi'] ?>
                                    </div>
                                <?php unset($_SESSION['errorprestasi']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <label><b>Biaya mengajar per sesi</b></label>
                    <div class="row">
                        <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i>- 90 menit</i></label>
                                <input type="text" name="biaya90menit" class="form-control <?php if (isset($_SESSION['errorbiaya90menit'])) echo 'is-invalid'; ?>" placeholder="Masukkan biaya" value="<?php if (isset($_SESSION['valbiaya90menit'])) echo $_SESSION['valbiaya90menit'];
                                                                                                                                                                                                        unset($_SESSION['valbiaya90menit']); ?>"></input>
                                <?php if (isset($_SESSION['errorbiaya90menit'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorbiaya90menit'] ?>
                                    </div>
                                <?php unset($_SESSION['errorbiaya90menit']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i>- 120 menit</i></label>
                                <input type="text" name="biaya120menit" class="form-control <?php if (isset($_SESSION['errorbiaya120menit'])) echo 'is-invalid'; ?>" placeholder="Masukkan biaya" value="<?php if (isset($_SESSION['valbiaya120menit'])) echo $_SESSION['valbiaya120menit'];
                                                                                                                                                                                                            unset($_SESSION['valbiaya120menit']); ?>"></input>
                                <?php if (isset($_SESSION['errorbiaya120menit'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorbiaya120menit'] ?>
                                    </div>
                                <?php unset($_SESSION['errorbiaya120menit']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Metode Mengajar</label>
                                <textarea class="form-control <?php if (isset($_SESSION['errormetode_mengajar'])) echo 'is-invalid'; ?>" name="metode_mengajar" placeholder="Jelaskan metode mengajar Anda secara singkat"><?php if (isset($_SESSION['valmetode_mengajar'])) echo $_SESSION['valmetode_mengajar'];
                                                                                                                                                                                                                            unset($_SESSION['valmetode_mengajar']); ?></textarea>
                                <?php if (isset($_SESSION['errormetode_mengajar'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errormetode_mengajar'] ?>
                                    </div>
                                <?php unset($_SESSION['errormetode_mengajar']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><i class="fas fa-book mr-2"></i>Minat Mengajar</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="minatngajar[]" value="SD">
                                <label class="form-check-label" for="inlineCheckbox1">SD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="minatngajar[]" value="SMP">
                                <label class="form-check-label" for="inlineCheckbox2">SMP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatngajar[]" value="SMA">
                                <label class="form-check-label" for="inlineCheckbox3">SMA</label>
                            </div>
                            <br>
                            <?php if (isset($_SESSION['errorminatngajar'])) : ?>
                                <small class="text-danger">
                                    <?= $_SESSION['errorminatngajar'] ?>
                                </small>
                            <?php unset($_SESSION['errorminatngajar']);
                            endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><i class="fas fa-book mr-2"></i>Minat Mata Pelajaran</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="minatmapel[]" value="IPA">
                                <label class="form-check-label" for="inlineCheckbox1">IPA</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="minatmapel[]" value="IPS">
                                <label class="form-check-label" for="inlineCheckbox2">IPS</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Matematika">
                                <label class="form-check-label" for="inlineCheckbox3">Matematika</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Bahasa Inggris">
                                <label class="form-check-label" for="inlineCheckbox3">Bahasa Inggris</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Fisika">
                                <label class="form-check-label" for="inlineCheckbox3">Fisika</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Kimia">
                                <label class="form-check-label" for="inlineCheckbox3">Kimia</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Biologi">
                                <label class="form-check-label" for="inlineCheckbox3">Biologi</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Geografi">
                                <label class="form-check-label" for="inlineCheckbox3">Geografi</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Sosiologi">
                                <label class="form-check-label" for="inlineCheckbox3">Sosiologi</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="minatmapel[]" value="Ekonomi">
                                <label class="form-check-label" for="inlineCheckbox3">Ekonomi</label>
                            </div>
                            <br>
                            <?php if (isset($_SESSION['errorminatmapel'])) : ?>
                                <small class="text-danger">
                                    <?= $_SESSION['errorminatmapel'] ?>
                                </small>
                            <?php unset($_SESSION['errorminatmapel']);
                            endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <button type="submit" name="kirim" class="btn btn-primary my-4 next">SELANJUTNYA</button></a>
        </form>
    </div>

    <script src="<?= BASEURL ?>js/jquery.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap.bundle.js"></script>
    <script src="<?= BASEURL ?>js/sweetalert2.all.js"></script>
    <script src="<?= BASEURL ?>js/jsnya.js"></script>
    <script src="<?= BASEURL ?>js/bootstrap-select.js"></script>
    <script src="<?= BASEURL ?>js/select/defaults-id_ID.js"></script>
    <script src="<?= BASEURL ?>js/datepicker.js"></script>
    <script src="<?= BASEURL ?>js/bs-custom-file-input.js"></script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        });
        $('#tLahir').datepicker({
            autoHide: true,
            format: 'yyyy-mm-dd',
            endDate: '0d',
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
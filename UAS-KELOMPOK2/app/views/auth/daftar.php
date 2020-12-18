<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Daftar</h1>
                                    <?php if (isset($_SESSION['sukses'])) : ?>
                                        <div class="alert alert-success"><?= $_SESSION['sukses'] ?></div>
                                    <?php unset($_SESSION['sukses']);
                                    endif; ?>
                                    <?php if (isset($_SESSION['gagal'])) : ?>
                                        <div class="alert alert-danger"><?= $_SESSION['gagal'] ?></div>
                                    <?php unset($_SESSION['gagal']);
                                    endif; ?>
                                </div>
                                <form class="user" id="user" action="sukdaftar" method="post">
                                    <div class="form-group">
                                        <input type="text" name="nama" id="daftarNama" class="form-control form-control-user <?php if (isset($_SESSION['errornama'])) echo 'is-invalid'; ?>" placeholder="Masukkan Nama Lengkap..." value="<?php if (isset($_SESSION['valnama'])) echo $_SESSION['valnama'];
                                                                                                                                                                                                                                            unset($_SESSION['valnama']); ?>">
                                        <?php if (isset($_SESSION['errornama'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errornama'] ?>
                                            </div>
                                        <?php unset($_SESSION['errornama']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="notlp" class="form-control form-control-user <?php if (isset($_SESSION['errornotlp'])) echo 'is-invalid'; ?>" placeholder="Masukkan No Telpon..." value="<?php if (isset($_SESSION['valnotlp'])) echo $_SESSION['valnotlp'];
                                                                                                                                                                                                                            unset($_SESSION['valnotlp']); ?>">
                                        <?php if (isset($_SESSION['errornotlp'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errornotlp'] ?>
                                            </div>
                                        <?php unset($_SESSION['errornotlp']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user <?php if (isset($_SESSION['errorusername'])) echo 'is-invalid'; ?>" placeholder="Masukkan Username..." value="<?php if (isset($_SESSION['valusername'])) echo $_SESSION['valusername'];
                                                                                                                                                                                                                                unset($_SESSION['valusername']); ?>">
                                        <?php if (isset($_SESSION['errorusername'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errorusername'] ?>
                                            </div>
                                        <?php unset($_SESSION['errorusername']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user <?php if (isset($_SESSION['erroremail'])) echo 'is-invalid'; ?>" placeholder="Masukkan Email..." value="<?php if (isset($_SESSION['valemail'])) echo $_SESSION['valemail'];
                                                                                                                                                                                                                        unset($_SESSION['valemail']); ?>">
                                        <?php if (isset($_SESSION['erroremail'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['erroremail'] ?>
                                            </div>
                                        <?php unset($_SESSION['erroremail']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="pass" name="password" class="form-control form-control-user <?php if (isset($_SESSION['errorpassword'])) echo 'is-invalid'; ?>" placeholder="Masukkan Password...">
                                        <?php if (isset($_SESSION['errorpassword'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errorpassword'] ?>
                                            </div>
                                        <?php unset($_SESSION['errorpassword']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="pass2" name="password2" class="form-control form-control-user <?php if (isset($_SESSION['errorpassword2'])) echo 'is-invalid'; ?>" placeholder="Konfirmasi Password...">
                                        <?php if (isset($_SESSION['errorpassword2'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errorpassword2'] ?>
                                            </div>
                                        <?php unset($_SESSION['errorpassword2']);
                                        endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" name="tutor" class="btn btn-primary btn-user btn-block">
                                                Daftar Sebagai Tutor
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" name="siswa" class="btn btn-success btn-user btn-block">
                                                Daftar Sebagai Siswa
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="login">Sudah punya akun? Login!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block my-auto">
                            <img src="<?= BASEURL ?>/img/business_conference_.png" alt="" width="400px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
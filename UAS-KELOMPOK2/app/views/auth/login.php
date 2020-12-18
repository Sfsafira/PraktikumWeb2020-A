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
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                                    <?php if (isset($_SESSION['sukses'])) : ?>
                                        <div class="alert alert-success"><?= $_SESSION['sukses'] ?></div>
                                    <?php unset($_SESSION['sukses']);
                                    endif; ?>
                                    <?php if (isset($_SESSION['gagal'])) : ?>
                                        <div class="alert alert-danger"><?= $_SESSION['gagal'] ?></div>
                                    <?php unset($_SESSION['gagal']);
                                    endif; ?>
                                </div>
                                <form class="user" action="masuk" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?php if (isset($_SESSION['errorusername'])) echo 'is-invalid'; ?>" name="username" placeholder="Masukkan Username..." value="<?php if (isset($_SESSION['valusername'])) echo $_SESSION['valusername'];
                                                                                                                                                                                                                                unset($_SESSION['valusername']); ?>">
                                        <?php if (isset($_SESSION['errorusername'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errorusername'] ?>
                                            </div>
                                        <?php unset($_SESSION['errorusername']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password...">
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="daftar">Buat akun baru!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block my-auto">
                            <img src="<?= BASEURL ?>/img/video_tutorial_.png" alt="" width="400px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
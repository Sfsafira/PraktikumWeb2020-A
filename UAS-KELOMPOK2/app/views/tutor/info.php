<div class="col-md-10 p-5 pt-2" style="height: 620px;">
    <h3><i class="fas fa-bell mr-2"></i>INFO</h3>
    <hr>

    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 940px;">
        <div class="row no-gutters">
            <div class="col-md-4 mt-4">
                <img src="<?= BASEURL ?>img/info.png" class="card-img pl-4 mx-auto d-block" alt="gambar" style="width: 260px; margin-top: 40px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div>
                        <p>Status Berkas Anda : </p>
                        <p class="btn btn-success">DIVALIDASI</p>

                    </div>
                    <br>
                    <p class="text-body" id="text-info">Proses validasi berkas dilakukan oleh admin selama kurang lebih 2x24 jam. Jika berkas Anda sudah divalidasi,
                        maka Anda sudah dapat melakukan pembayaran.
                    </p>
                    <div>
                        <p>Status Akun Anda : </p>
                        <?php if (!empty($data['buktibayar']) && $data['status'] == 0) :  ?>
                            <p class="btn btn-warning">MENUNGGU KONFIRMASI</p>
                        <?php elseif ($data['status'] == 0) : ?>
                            <p class="btn btn-danger">BELUM AKTIF</p>
                        <?php else : ?>
                            <p class="btn btn-success">AKTIF</p>
                        <?php endif; ?>
                    </div>
                    <br>
                    <?php if ($data['status'] == 0) : ?>
                        <p class="text-body" id="text-info">Untuk mengaktifkan akun pada website Tutorin Aja!, Anda dikenakan biaya sebesar 50.000/bulan.
                            Proses validasi bukti pembayaran dilakukan oleh admin selama kurang lebih 1x24 jam.</p>
                        <label>Bukti Pembayaran dapat diunggah di bawah ini :</label><br>
                        <form action="<?= BASEURL ?>tutor/uploadbukti/<?= $_SESSION['username'] ?>" method="post" enctype="multipart/form-data" class="buktibayar">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php if (isset($_SESSION['errorbuktibayar'])) echo 'is-invalid'; ?>" id="customFile" name="buktibayar">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                <small class="text-info">file harus: jpg,png,jpeg</small>
                                <?php if (isset($_SESSION['errorbuktibayar'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorbuktibayar'] ?>
                                    </div>
                                <?php unset($_SESSION['errorbuktibayar']);
                                endif; ?>
                            </div>
                            <button class="btn btn-info btn-block">Upload</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>



</div>
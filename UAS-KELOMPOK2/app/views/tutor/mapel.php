<div class="col-md-10 p-5 pt-2">
    <?php $m = explode("/", $_SERVER['REQUEST_URI']); ?>
    <h3><i class="fas fa-bookmark mr-2"></i><?= $m[5] ?></h3>
    <hr>
    <div class="row">
        <!--siswa pertama-->
        <?php foreach ($data as $res) : ?>
            <div class="card mb-3 ml-5 shadow p-3 mb-5 bg-white rounded" style="max-width: 900px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= BASEURL ?>asset/siswa/foto/<?= $res['foto'] ?>" class="card-img p-3" alt="..." style="width: 280px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body pt-1">
                            <h5 class="card-title">Identitas Siswa</h5>
                            <table style="width: 500px;">
                                <tr>
                                    <td><b>Nama Lengkap</b></td>
                                    <td>:</td>
                                    <td><?= $res['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kelas</b></td>
                                    <td>:</td>
                                    <td><?= $res['jenjangpendidikan'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Mata Pelajaran</b></td>
                                    <td>:</td>
                                    <td><?= $res['mapel'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Durasi yang dipilih</b></td>
                                    <td>:</td>
                                    <td><?= $res['durasi'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi Belajar</b></td>
                                    <td>:</td>
                                    <td><?= $res['lokasibelajar'] ?></td>
                                </tr>
                            </table>

                            <a href="<?= BASEURL ?>tutor/liatdetailsiswa/<?= $res['id'] ?>/<?= $res['mapel'] ?>" class="liatdetailsiswa">
                                <p class="card-text text-info mt-3">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                            </a>
                            <h6 class="card-title mt-3">Status : <?php if ($res['diterima'] == 1) echo "Diterima";
                                                                    else if ($res['diterima'] == 2) echo "Ditolak";
                                                                    else echo "Menunggu"; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>
<div class="modal fade" id="detailsiswa" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body isidetailsiswa">

            </div>
            <div class="modal-footer tomboldetailsiswa">

            </div>
        </div>
    </div>
</div>
<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-address-card mr-2"></i></i>DATA TUTOR</h3>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Nama tutor</th>
                <th scope="col">Perguruan Tinggi</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Foto</th>
                <th scope="col">File Ijazah</th>
                <th scope="col">Detail</th>
                <th scope="col">Status</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data['tutor'] as $tutor) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $tutor['nama'] ?></td>
                    <td><?= $tutor['perguruan_tinggi'] ?></td>
                    <td><?= $tutor['prodi'] ?></td>
                    <td class="text-center">
                        <a href="fototutor/<?= $tutor['id'] ?>" class="liatfototutor">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="ijasahtutor/<?= $tutor['id_riwayat'] ?>" class="liatijasahtutor">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-download"></i></button>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="liatdetailtutor" href="detailtutor/<?= $tutor['id'] ?>">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                        </a>
                    </td>
                    <td>
                        <?php if ($tutor['profileLengkap'] == 4) : ?>
                            <?php if ($tutor['verif'] == 0) : ?>
                                <span class="badge badge-danger">Not Verifed</span>
                            <?php else : ?>
                                <span class="badge badge-success">Verifed</span>
                            <?php endif; ?>
                        <?php else : ?>
                            <span class="badge badge-warning">Data Belum Lengkap</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if (!empty($tutor['buktibayar'])) : ?>
                            <a class="liatbuktibayar" href="buktibayartutor/<?= $tutor['id'] ?>">
                                <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            </a>
                        <?php else : ?>
                            <span class="badge badge-danger">Belum Bayar</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($tutor['status'] == 0) : ?>
                            <a class="hapustutor" href="hapustutor/<?= $tutor['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </a>
                        <?php else : ?>
                            <button class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="modal fade" id="fotoijasahtutor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body isinyat text-center">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailtutor" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body isidetailtutor">
                </div>
                <div class="modal-footer tomboldetailtutor">
                </div>
            </div>
        </div>
    </div>
</div>
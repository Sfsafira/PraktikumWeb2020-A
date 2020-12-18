<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-address-card mr-2"></i></i>DATA SISWA</h3>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Nama siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Alamat</th>
                <th scope="col">Detail</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data['siswa'] as $siswa) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['jenjangpendidikan'] ?></td>
                    <td><?= $siswa['asalsekolah'] ?></td>
                    <td><?= $siswa['alamat'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm profilsiswa" href="detailsiswa/<?= $siswa['id'] ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td class="text-center"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<div class="modal fade" id="profilesiswa" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PROFIL SISWA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body isiprofilsiswa">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
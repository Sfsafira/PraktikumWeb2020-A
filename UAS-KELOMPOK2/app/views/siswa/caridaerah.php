<br><br><br><br><br>

<div class="row">
    <div class="col">
        <h1 class="display-4 text-info text-center">Pilih Tutormu di sini!</h1>
        <hr>
    </div>
</div>
<br>
<section class="search-bar">
    <div class="container">
        <div class="row">
            <div class="mx-auto d-block">
                <form action="carimapel" method="post">
                    <div class="input-group" style="width: 600px;">
                        <input type="text" name="mapel" placeholder="Cari Mata Pelajaran" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" name="cari" class="btn btn-link"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <small class="text-info ml-2">Pisahkan dengan koma dan tanpa spasi</small>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="mx-auto d-block">
                <form action="caridaerah" method="post">
                    <div class="input-group" style="width: 600px;">
                        <input type="text" name="daerah" placeholder="Cari Wilayah" class="form-control" value="<?= $_POST['daerah'] ?>">
                        <div class="input-group-append">
                            <button type="submit" name="cdaerah" class="btn btn-link"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <small class="text-info ml-2">*Berdasarkan, kabupaten, kecamatan, atau daerah</small>
                </form>
            </div>
        </div>
    </div>
</section>

<br><br>
<section>
    <div class="container">
        <div class="tutor-tutor">
            <blockquote class="blockquote text-center">
                <p class="mb-0">The capacity to learn is a gift; the ability to learn is a skill; the willingness to learn is a choice.</p>
                <footer class="blockquote-footer">Brian Herbert, <cite title="Source Title">author</cite></footer>
            </blockquote>
            <br>
            <div class="grid">
                <div class="row mt-4">
                    <?php $tmp = explode(" ", $data['siswa']['jenjangpendidikan']);
                    foreach ($data['tutor'] as $tutor) : ?>
                        <?php if (strpos($tutor['minatngajar'], $tmp[1]) !== false) : ?>
                            <div class="col-md-3 col-sm-12 mb-3">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <img src="<?= BASEURL ?>asset/tutor/foto/<?= $tutor['foto'] ?>" class="card-img-top">
                                    <div class="card-body ">
                                        <div class="card-title text">
                                            <h4><?= $tutor['nama'] ?></h4>
                                        </div>
                                        <?= $tutor['perkenalan'] ?>
                                        <a href="detailtutor/<?= $tutor['id'] ?>/ds" class="detailtutor">
                                            <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
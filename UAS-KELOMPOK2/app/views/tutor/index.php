<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-chalkboard-teacher mr-2"></i>COURSE</h3>
    <hr>
    <?php $mapel = explode(",", $data['minatmapel']);
    foreach ($mapel as $map) : ?>
        <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 940px; max-height: 240px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= BASEURL ?>img/tiga.png" class="card-img pl-4" alt="gambar" style="width: 230px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title display text-muted"><?= $map ?></h1>
                        <!-- <p class="text-body" id="murid"> 3 Murid</p> -->
                        <a href="<?= BASEURL ?>tutor/mapel/<?= $map ?>">
                            <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Welcome back,</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <i class="mdi mdi-account-multiple icon-lg mr-3 text-primary"></i> <b>User</b>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <i class="mdi mdi-buffer icon-lg mr-3 text-danger"></i> <b>Kategori</b>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <i class="mdi mdi-car icon-lg mr-3 text-success"></i> <b>Mobil</b>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <i class="mdi mdi-account-box icon-lg mr-3 text-secondary"></i> <b>Customer</b>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-7">
        <div class="card card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $galery = $kon->query("SELECT * FROM galery ORDER BY idgalery");
                    $active = 'active';
                    foreach ($galery as $key) {
                    ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key['idgalery'] - 1 ?>" class="<?= $active ?>"></li>
                    <?php
                        $active = ''; // Remove 'active' class after the first iteration
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $active = 'active';
                    foreach ($galery as $key) {
                    ?>
                        <div class="carousel-item <?= $active ?>">
                            <img class="d-block w-100" src="../assets/images/slide/<?= $key['galery'] ?>" alt="<?= $key['alt_text'] ?>">
                        </div>
                    <?php
                        $active = ''; // Remove 'active' class after the first iteration
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

    <div class="col-md-5">
        <div class="card card-body">

        </div>
    </div>
</div>
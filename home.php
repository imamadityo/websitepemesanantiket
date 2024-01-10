<div class="card shadow-lg ">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <?php
            $galery = $kon->query("SELECT * FROM galery ORDER BY idgalery");
            $active = 'active';
            $slideNumber = 0;

            foreach ($galery as $key) {
                // Output carousel indicators
                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $slideNumber . '" class="' . $active . '" aria-current="true" aria-label="Slide ' . ($slideNumber + 1) . '"></button>';
                $active = ''; // Remove active class after the first iteration
                $slideNumber++;
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            $galery = $kon->query("SELECT * FROM galery ORDER BY idgalery");
            $active = 'active';
            foreach ($galery as $key) {
            ?>
                <div class="carousel-item <?= $active ?>">
                    <img src="assets/images/slide/<?= $key['galery'] ?>" style="height: 600px;" class="d-block w-100" alt="<? $key['image_alt'] ?>">
                </div>
                <?php $active = ''; ?>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php
if ($_GET['p'] == "home") {
    include "data.php";
}
?>
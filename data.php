<div class="container-fluid mt-3">


    <div class="row justify-content-center">
        <?php

        $batas = 8;
        $data = isset($_GET['data']) ? (int)$_GET['data'] : 1;
        $data_awal = ($data > 1) ? ($data * $batas) - $batas : 0;
        $previous = $data - 1;
        $next = $data + 1;
        $data = mysqli_query($kon, "SELECT * FROM berangkatan");
        $jumlah_data = mysqli_num_rows($data);
        $total_data = ceil($jumlah_data / $batas);

        $q = ""; // Inisialisasi query kosong
        $l = ""; // Inisialisasi limit kosong

        if (!empty($_GET["idkat"])) {
            $q = " WHERE idkat='$_GET[idkat]'";
            $l = "";
        } else if (isset($_POST["cari"])) {
            $q = "";
            $l = "";
            $m = "where nama_mobil like '%$_POST[cari]%'";
        } else {
            $q = "";
            $l = " limit $posisi, $batas";
        }
        $sqlk = mysqli_query($kon, "SELECT * from kategori $q");
        if (!empty($_GET["idk"])) {
            $rk = mysqli_fetch_array($sqlk);
            $kat = "<br>Kategori : <b>$rk[namakat]</b>";
        } else {
            $kat = "<br>Daftar Mobil";
        }
        $a = "INNER JOIN berangkatan ON mobil.idmobil=berangkatan.idmobil";
        $berangkatan = $kon->query("SELECT * FROM mobil $a $q $m limit $data_awal, $batas");

        ?>
        <center>
            <h3><?= $kat ?></h3>
        </center>
        <hr>
        <?php foreach ($berangkatan as $key) { ?>
            <div class="col-xl-3 mb-3">
                <a href="?p=detail&id=<?= $key['idberangkatan'] ?>" style="text-decoration: none;">
                    <div class="card text-black shadow-lg">
                        <img src="assets/images/mobil/<?= $key['foto'] ?>" class="card-img-top" height="250px" alt="Apple Computer" />
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="card-title"><?= $key['nama_mobil'] ?></h5>
                                <p class="text-muted mb-4"><?= $key['noplat'] ?></p>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span>Tipe</span><span>
                                        <span class="badge <?= ($key['type'] == 'Eksekutif') ? 'bg-success' : 'bg-warning' ?>"><?= $key['type'] ?></span>
                                    </span>
                                </div>
                                <div class=" d-flex justify-content-between">
                                    <span>Tujuan</span><span><?= $key['tujuan'] ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Bangku</span><span><?= $key['bangku'] ?></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                <span>Harga Tiket</span><span><?= formatRupiah($key['harga']) ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php
tampilkanPagination($data, $total_data, $previous, $next);
?>
<br>
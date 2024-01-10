<?php
if (empty($_SESSION["userag"]) and empty($_SESSION["passag"])) {
    $icon = 'warning';
    $title = 'Anda Belum Login Ke Kistem ?';
    $halaman = 'login';

    gagal($icon, $title, $halaman);
} else {
    $cart = $kon->query("SELECT * FROM cart WHERE idberangkatan='$_GET[idber]'");
    $car = mysqli_fetch_array($cart);

    $sqlc = mysqli_query($kon, "SELECT idberangkatan FROM cart WHERE idberangkatan='$_GET[idber]' AND idanggota='$_GET[idang]'");
    $rowc = mysqli_num_rows($sqlc);

    $a = "INNER JOIN mobil ON berangkatan.idmobil=mobil.idmobil";
    $berangkatan = $kon->query("SELECT * FROM berangkatan $a WHERE idberangkatan='$_GET[idber]'");
    $key = mysqli_fetch_array($berangkatan);
    $sisa =  $key['bangku'] - $car['jumlahbeli'];
    if ($sisa == 0) {
        $icon = 'warning';
        $title = 'Bangku Telah Habis';
        $halaman = 'home';

        gagal($icon, $title, $halaman);
    } else {
?>
        <div class="container row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Pesan Tiket</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-3">
                            <label for="">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="waktu">
                        </div>

                        <div class="mt-3">
                            <label for="">Banyak Bangku</label>
                            <input type="number" class="form-control" name="banyak">
                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

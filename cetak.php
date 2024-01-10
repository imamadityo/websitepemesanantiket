<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluit mt-3 mb-3 card card-body">
        <center>
            <h3>Tiket Keberangkatan PT.HPS</h3>
        </center>
        <hr>
        <?php
        include "include/koneksi.php";
        include "include/fucntion.php";
        $now = date('Y-m-d');
        $no = 1;
        $c = "INNER JOIN agen ON  pembelian.idagen=agen.idagen";
        $a = "INNER JOIN berangkatan ON pembelian.idberangkatan=berangkatan.idberangkatan";
        $pemesanan = $kon->query("SELECT * FROM pembelian $a $c WHERE idanggota='$_GET[idag]' AND idcart='$_GET[id]'");
        $key = mysqli_fetch_assoc($pemesanan);

        $mobil = $kon->query("SELECT  * FROM mobil WHERE idmobil='$key[idmobil]'");
        $bil = mysqli_fetch_assoc($mobil);

        $berangkatan = $kon->query("SELECT  * FROM berangkatan WHERE idmobil='$key[idmobil]' ");
        $berang = mysqli_fetch_assoc($berangkatan);

        $anggota = $kon->query("SELECT  * FROM anggota WHERE idanggota='$key[idanggota]'");
        $ang = mysqli_fetch_assoc($anggota);

        $total = formatRupiah($key['banyak'] * $key['harga']);
        ?>
        Alamat : Barung-Barung Balantai, Jl.Padang-Painan, Pesisir Selatan, Sumbar <br>
        Telpon : 0823-8744-1448<br>

        <hr>
        <table>
            <tr>
                <td>
                    <center>
                        <img src="assets/images/mobil/<?= $bil['foto'] ?>" width="60%">
                    </center>
                </td>
                <td>
                    Nama Penumpang : <?= $ang['nama'] ?><br>
                    Nomor Hp : <?= $ang['nohp'] ?><br>
                    Nama Mobil : <?= $bil['nama_mobil'] ?><br>
                    Nomor Plat : <?= $bil['noplat'] ?><br>
                    Bangku: <?= $key['banyak'] ?> Bangku (
                    <?php
                    $det = $kon->query("SELECT * FROM detail WHERE idcart='$key[idcart]'");
                    foreach ($det as $tail) {
                        echo $tail['huruf'] . ",";
                    }
                    ?>)<br>
                    Harga : <?= formatRupiah($key['harga']) ?><br>
                    Total Harga : <?= $total ?><br>
                    Tujuan : <?= $berang['tujuan'] ?><br>
                    Penjemputan :<?= $key['kota'] ?>, <?= $key['alamat'] ?><br>
                    Keterangan :
                    <span class="badge <?= ($key['tgl']  <= $now) ? 'bg-danger' : 'bg-warning' ?>"><?= ($key['tgl']  <= $now) ? 'Telang Berangkat' : ' Belum Berangkat' ?></span>

                <td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
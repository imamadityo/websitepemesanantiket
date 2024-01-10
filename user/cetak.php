<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Riwayat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <center>
            <h3>Laporan Riwayat Penumpang PT.HPS</h3>
            Barung-barung Balantai, Jln. Padang - Painan, Pesisir Selatan, Sumbar
            <br>Telpon : 0823-8744-1448
        </center>
        <hr>


        <table class="table table-bordered" style="width:100%; font-size: 10px;">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Mobil</th>
                <th>Tanggal Keberangkatan</th>
                <th>Banyak Bangku</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                require_once "../include/koneksi.php";
                include "../include/fucntion.php";
                $now = date('Y-m-d');
                $no = 1;
                $a = "INNER JOIN berangkatan ON pembelian.idberangkatan=berangkatan.idberangkatan";
                $b = "INNER JOIN anggota ON pembelian.idanggota=anggota.idanggota";
                $c = "INNER JOIN agen ON  pembelian.idagen=agen.idagen";
                $pemesanan = $kon->query("SELECT * FROM pembelian $a $b $c");
                foreach ($pemesanan as $key) {
                    $mobil = $kon->query("SELECT  * FROM mobil WHERE idmobil='$key[idmobil]'");
                    $bil = mysqli_fetch_assoc($mobil);
                    $total = $key['banyak'] * $key['harga'];
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key['nama'] ?><br><?= $key['nohp'] ?></td>
                        <td><?= $bil['nama_mobil'] ?><br> (<?= $bil['noplat'] ?>)</td>
                        <td>
                            <?= $key['tgl'] ?><br>Jam (<?= $key['jam'] ?>)<br>
                            <?= $key['kota'] ?>, <?= $key['alamat'] ?>
                        </td>
                        <td>
                            <?= $key['banyak'] ?> Bangku <br>(
                            <?php
                            $det = $kon->query("SELECT * FROM detail WHERE idcart='$key[idcart]'");
                            foreach ($det as $tail) {
                                echo $tail['huruf'] . ",";
                            }
                            ?>)
                        </td>
                        <td><?= formatRupiah($key['harga']) ?></td>
                        <td><?= formatRupiah($total) ?></td>
                        <td>
                            <center><span class="badge <?= ($key['tgl']  <= $now) ? 'bg-danger' : 'bg-warning' ?>"><?= ($key['tgl']  <= $now) ? 'Telang Berangkat' : ' Belum Berangkat' ?></span></center>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <table width="100%">
            <tr>
                <td width="50%"></td>
                <td align="center">
                    Padang, <?= date('d-m-Y'); ?>
                    <br><br><br><br><br>
                    (......................................................................)
                </td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>

</html>
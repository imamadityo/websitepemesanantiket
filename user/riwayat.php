<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Riwayat Keberangkatan</h2>
                </div>
            </div>
        </div>
        <a href="cetak.php" target="_blank" class="btn btn-primary btn-sm mt-3">Cetak Riwayat</a>
    </div>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
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
        </div>
    </div>
</div>
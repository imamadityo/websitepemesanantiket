<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Riwayat</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Sopir</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Banyak Bangku</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $now = date('Y-m-d');
                    $no = 1;
                    $a = "INNER JOIN berangkatan ON pembelian.idberangkatan=berangkatan.idberangkatan";
                    $c = "INNER JOIN agen ON  pembelian.idagen=agen.idagen";
                    $pemesanan = $kon->query("SELECT * FROM pembelian $a $c WHERE idanggota='$_SESSION[idanggota]'");
                    foreach ($pemesanan as $key) {
                        $mobil = $kon->query("SELECT  * FROM mobil WHERE idmobil='$key[idmobil]'");
                        $bil = mysqli_fetch_assoc($mobil);
                        $total = formatRupiah($key['banyak'] * $key['harga']);
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $bil['nama_mobil'] ?><br> (<?= $bil['noplat'] ?>)</td>
                            <td><?= $bil['sopir'] ?><br> (<?= $bil['nohp'] ?>)</td>
                            <td><?= $key['tgl'] ?><br>Jam (<?= $key['jam'] ?>)
                                <br> <?= $key['kota'] ?>, <?= $key['alamat'] ?>
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
                            <td><?= $total ?></td>
                            <td>
                                <center>
                                    <span class="badge <?= ($key['tgl']  <= $now) ? 'bg-danger' : 'bg-warning' ?>"><?= ($key['tgl']  <= $now) ? 'Telang Berangkat' : ' Belum Berangkat' ?></span>
                                </center>
                            </td>
                            <td>
                                <?php if ($key['tgl']  <= $now) { ?>
                                    <a href="cetak.php?id=<?= $key['idcart'] ?>&idag=<?= $rag['idanggota']; ?>" target="_blank" class="btn btn-secondary btn-sm">Cetak</a>
                                <?php } else { ?>
                                    <center><a href="?p=aksi&id=<?= $key['idcart'] ?>&idag=<?= $rag['idanggota']; ?>" class="btn btn-warning btn-sm">Hapus</a>
                                        <a href="cetak.php?id=<?= $key['idcart'] ?>&idag=<?= $rag['idanggota']; ?>" target="_blank" class="btn btn-secondary btn-sm">Cetak</a>
                                    </center>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mt-3">
    <?php

    $cart = $kon->query("SELECT * FROM pembelian WHERE idcart='$_GET[id]'");
    $car = mysqli_fetch_array($cart);

    $a = "INNER JOIN mobil ON berangkatan.idmobil=mobil.idmobil";
    $berangkatan = $kon->query("SELECT * FROM berangkatan $a WHERE idberangkatan='$_GET[id]'");
    $key = mysqli_fetch_array($berangkatan);


    $kategori = $kon->query("SELECT * FROM kategori WHERE idkat='$key[idkat]'");
    $ket = mysqli_fetch_array($kategori);
    ?>
    <div class="card shadow-lg mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <center><img src="assets/images/mobil/<?= $key['foto'] ?>" width="70%" /></center>
                </div>
                <div class="col-md-6">
                    <h3><?= $ket['nama'] ?></h3>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td width="20%">Mobil</td>
                            <td>:</td>
                            <td><?= $key['nama_mobil'] ?></td>
                        </tr>
                        <tr>
                            <td>No Plat Mobil</td>
                            <td>:</td>
                            <td><?= $key['noplat'] ?></td>
                        </tr>

                        <tr>
                            <td>Banyak Bangku</td>
                            <td>:</td>
                            <td><?= $key['bangku'] ?> Bangku</td>
                        </tr>

                        <tr>
                            <td>Tipe</td>
                            <td>:</td>
                            <td><span class="badge <?= ($key['type'] == 'Eksekutif') ? 'bg-success' : 'bg-warning' ?>"><?= $key['type'] ?></span></td>
                        </tr>

                        <tr>
                            <td>Keberangkatan</td>
                            <td>:</td>
                            <td><?= $key['hari'] ?></td>
                        </tr>

                        <tr>
                            <td>Jam</td>
                            <td>:</td>
                            <td><?= $key['jam'] ?></td>
                        </tr>

                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td><?= $key['tujuan'] ?></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><?= formatRupiah($key['harga']) ?></td>
                        </tr>

                    </table>
                    <hr>
                    <form method="get" action="?p=detail">
                        <label for="">Cek Tanggal Keberangkatan</label>
                        <input type="hidden" class="form-control" name="p" value="<?= $_GET['p'] ?>">
                        <input type="date" class="form-control" name="cek">
                        <input type="hidden" class="form-control" name="id" value="<?= $_GET['id'] ?>">
                        <center>
                            <input type="submit" class="btn btn-sm btn-primary mt-3" value="Cek Tanggal" />
                        </center>
                    </form>


                    <?php

                    $jam = date('h:i a');
                    $now = date('Y-m-d');
                    if ($_GET['cek'] == "") {
                    } else if ($_GET['cek'] < $now) {
                        if ($key['jam'] < $jam) {
                        }
                    ?>
                        <h2>
                            <center><span class="badge bg-danger mt-3">Tanggal Sudah Berlalu</span></center>
                        </h2>
                    <?php } else {
                        $beli = $kon->query("SELECT * FROM pembelian WHERE idberangkatan='$_GET[id]' AND tgl='$_GET[cek]'");
                        $bel = mysqli_fetch_assoc($beli);
                        $sisa = $key['bangku'] - $bel['banyak'];
                        $selectedLetters = array(); // Explicitly initialize as an empty array

                        $det = $kon->query("SELECT * FROM detail WHERE idcart='$bel[idcart]'");
                        foreach ($det as $tail) {
                            $selectedLetters[] = $tail['huruf'];
                        }

                    ?>
                        <table width="100%" class="mt-3">
                            <tr>
                                <td width="30%">Tanggal Berangkat</td>
                                <td>:</td>
                                <td><?= $_GET['cek'] ?></span></td>
                            </tr>
                            <tr>
                                <td width="30%">Sisa Bangku</td>
                                <td>:</td>
                                <td><span class="badge <?= ($sisa == 0) ? 'bg-danger' : 'bg-success' ?>"><?= ($sisa == 0) ? 'Habis' : $sisa . ' Bangku' ?></span></td>
                            </tr>
                        </table>

                        <form action="" method="post">
                            <div class="mt-2">
                                <label for="">Pilih Kursi</label><br>
                                <input type="hidden" class="form-control" name="tgl" value="<?= $_GET['cek'] ?>">
                                <input type="hidden" class="form-control mb-3" name="id" value="<?= $_GET['id'] ?>">
                                <?php
                                $alphabet = range('A', 'Z');

                                for ($i = 1; $i <= $sisa; $i++) {
                                    $currentLetter = '';
                                    if ($i <= 26) {
                                        $currentLetter = $alphabet[$i - 1];
                                    } else {
                                        $index = ($i - 1) % 26;
                                        $currentLetter = $alphabet[$index] . floor(($i - 1) / 26);
                                    }
                                    if (!in_array($currentLetter, $selectedLetters)) {
                                ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $i ?>" name='alpha[]' value="<?= $currentLetter ?>">
                                            <label class="form-check-label" for="inlineCheckbox<?= $i ?>"> <?= $currentLetter ?> </label>
                                        </div>
                                <?php
                                        $selectedLetters[] = $currentLetter;
                                    }
                                }
                                ?>
                                <div class="mt-3">
                                    <label for="">Pilih Agen</label>
                                    <select name="idagen" id="" class="form-control">
                                        <option value="">Pilih Agen</option>
                                        <?= agen($row) ?>
                                    </select>
                                </div>
                            </div>

                            <center><button class="btn btn-primary mt-3 btn-sm" type="submit" name="pesan">Pesan Tiket</button></center>
                        </form>

                    <?php
                        if (isset($_POST["pesan"])) {
                            if ($_POST['banyak'] > $sisa) {
                                $icon = 'warning';
                                $title = 'Bangku Tidak Cukup';
                                $halaman = 'detail&cek=' . $_GET['cek'] . '&id=' . $_GET['id'];
                                gagal($icon, $title, $halaman);
                            } else {
                                $banyak = count($_POST['alpha']);
                                $idagen = $_POST['idagen'];
                                $sqlag = mysqli_query($kon, "INSERT INTO pembelian (idberangkatan, idanggota, idagen, banyak, tgl, tglorder) values ('$_GET[id]', '$_SESSION[idanggota]','$idagen' , '$banyak', '$_GET[cek]', NOW())");
                                $idorder = mysqli_insert_id($kon);
                                for ($i = 0; $i < count($_POST['alpha']); $i++) {
                                    $huruf = $_POST['alpha'][$i];
                                    mysqli_query($kon, "INSERT INTO detail (idcart, huruf) values ('$idorder', '$huruf')");
                                }
                                if ($sqlag) {
                                    $icon = 'success';
                                    $title = 'Anda Berhasil Mesan Tiket.';
                                    $halaman = 'riwayat';
                                    gagal($icon, $title, $halaman);
                                }
                            }
                        }
                    }
                    ?>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="container mt-3">
    <h3>Keranjang Belanja</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-3 shadow-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlc = mysqli_query($kon, "SELECT * from cart  where idanggota='$idanggota'");
                        $rowc = mysqli_num_rows($sqlc);
                        if ($rowc > 0) {
                            echo "<form action='?p=keranjangedit' method='post' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='idag' value='$idanggota'>";
                            $no = 1;
                            $total = 0;
                            while ($rc = mysqli_fetch_array($sqlc)) {
                                $a = "INNER JOIN mobil ON berangkatan.idmobil=mobil.idmobil";
                                $berangkatan = $kon->query("SELECT * FROM berangkatan $a WHERE idberangkatan='$rc[idberangkatan]'");
                                $key = mysqli_fetch_array($berangkatan);

                                $total += $key['harga'];
                                $nomor = $no++;
                        ?>
                                <?= "<input type='hidden' name='id[$nomor]' value='$rc[idcart]'>"; ?>
                                <tr>
                                    <td><?= $key['nama_mobil'] ?> (<?= $key['noplat'] ?>)</td>
                                    <td>

                                    </td>
                                    <td align=" center">
                                        <?= $key['harga'] ?>
                                    </td>
                                    <td>
                                        <?= "<input type='text' class='form-control' name='jml[$nomor]' value='$rc[jumlahbeli]'>"; ?>
                                    </td>
                                    <td align=" center">
                                        <?= formatRupiah($key['harga']) ?>
                                    </td>
                                    <td>
                                        <a href='?p=keranjangdel&idc=<?= $rc['idcart'] ?>&idag=<?= $rag['idanggota'] ?>' class="btn btn-danger btn-sm">X</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <script>
                                // Contoh penggunaan SweetAlert
                                Swal.fire({
                                    title: 'Maaf!',
                                    text: 'Keranjang Anda Masih Kosong',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Pengalihan halaman saat tombol "OK" diklik
                                        window.location.href = '?p=produkterbaru';
                                    }
                                });
                            </script>
                        <?php
                        }
                        if ($total !== null) {
                            $nil = formatRupiah($total);
                        } else {
                            $nil = "Rp 0";
                        }
                        ?>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="center"><b>Total</b></td>
                            <td align="center" colspan="2">
                                <b><?= $nil ?></b>
                            </td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <center>
                <a href="?p=home" class="primary-btn btn btn-primary shadow-lg"> CONTINUE SHOPPING</a>
            </center>
        </div>

        <div class="col-md-4">
            <center>
                <button type="submit" class="primary-btn btn btn-primary shadow-lg"> UPADATE CART </button>
            </center>
        </div>

        <div class="col-md-4">
            <center>
                <a href="?p=selesaibelanja" class="primary-btn btn btn-primary shadow-lg">PROCEED TO CHECKOUT</a>
            </center>
        </div>

    </div>
</div>
</form>
<br>
<br><br>
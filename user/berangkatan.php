<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data Berangkatan</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#berangkatanadd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>Berangkat</th>
                        <th>Jam Berangkat</th>
                        <th>Tujuan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $berangkatan = $kon->query("SELECT * FROM berangkatan INNER JOIN mobil ON mobil.idmobil=berangkatan.idmobil ORDER BY idberangkatan");
                    foreach ($berangkatan as $key) {
                        $nama = "berangkatandel";
                        $id = $key['idberangkatan'];
                        $data = $key['nama'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['nama_mobil'] ?></td>
                            <td><?= $key['hari'] ?></td>
                            <td style="text-align: center;"><?= $key['jam'] ?> jam</td>
                            <td><?= $key['tujuan'] ?></td>
                            <td style="text-align: right;"><?= formatRupiah($key['harga']) ?></td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#berangkatanedit<?= $key['idberangkatan'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
                                    <button class="btn btn-danger btn-sm" id="<?= $nama ?><?= $id ?>"><i class="mdi mdi-delete menu-icon"></i></button>
                                </center>
                            </td>
                        </tr>
                        <?= delete($nama, $id, $data) ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="berangkatanadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data berangkatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=berangkatanadd" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mt-3">
                        <label for="">Kendaraan</label>
                        <select name="idmobil" class="form-control" id="">
                            <option value="">Pilih Data</option>
                            <?= mobil($row) ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Hari Keberangkatan</label>
                        <input type="text" class="form-control" name="hari">
                    </div>

                    <div class="mt-3">
                        <label for="">Jam Keberangkatan</label>
                        <input type="text" class="form-control" name="jam">
                    </div>

                    <div class="mt-3">
                        <label for="">Tujuan Keberangkatan</label>
                        <input type="text" class="form-control" name="tujuan">
                    </div>

                    <div class="mt-3">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($berangkatan as $key) { ?>
    <div class="modal fade" id="berangkatanedit<?= $key['idberangkatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data berangkatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=berangkatanedit&id=<?= $key['idberangkatan'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Kendaraan</label>
                            <select name="idmobil" class="form-control" id="">
                                <option value="">Pilih Data</option>
                                <?= mobil($key['idmobil']) ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">Hari Keberangkatan</label>
                            <input type="text" class="form-control" name="hari" value="<?= $key['hari'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Jam Keberangkatan</label>
                            <input type="text" class="form-control" name="jam" value="<?= $key['jam'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Tujuan Keberangkatan</label>
                            <input type="text" class="form-control" name="tujuan" value="<?= $key['tujuan'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Harga</label>
                            <input type="text" class="form-control" name="harga" value="<?= $key['harga'] ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>
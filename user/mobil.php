<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data Mobil</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mobiladd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bangku</th>
                        <th>Nomor Plat</th>
                        <th>Sopir</th>
                        <th>Nomor Hp</th>
                        <th>Tipe</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $mobil = $kon->query("SELECT * FROM mobil ORDER BY idmobil");
                    foreach ($mobil as $key) {
                        $nama = "mobildel";
                        $id = $key['idmobil'];
                        $data = $key['nama_mobil'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['nama_mobil'] ?></td>
                            <td style="text-align: center;"><?= $key['bangku'] ?> Bangku</td>
                            <td style="text-align: center;"><?= $key['noplat'] ?></td>
                            <td style="text-align: center;"><?= $key['sopir'] ?></td>
                            <td style="text-align: center;"><?= $key['nohp'] ?></td>
                            <td>
                                <center>
                                    <div class="badge <?= ($key['type'] == 'Eksekutif') ? 'badge-success' : 'badge-warning' ?>"><?= $key['type'] ?></div>
                                </center>
                            </td>
                            <td>
                                <center><a href="#" data-toggle="modal" data-target="#mobilview<?= $key['idmobil'] ?>"><img src="../assets/images/mobil/<?= $key['foto'] ?>" alt=""><?= $key['level'] ?></a></center>
                            </td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mobiledit<?= $key['idmobil'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
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

<div class="modal fade" id="mobiladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=mobiladd" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mt-3">
                        <label for="">Kategori Kendaraan</label>
                        <select name="idkat" class="form-control" id="">
                            <option value="">Pilih Data</option>
                            <?= kategori($row) ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Nama Mobil</label>
                        <input type="text" class="form-control" name="nama_mobil">
                    </div>

                    <div class="mt-3">
                        <label for="">Banyak Bangku</label>
                        <input type="text" class="form-control" name="bangku">
                    </div>

                    <div class="mt-3">
                        <label for="">Nomor Plat Mobil</label>
                        <input type="text" class="form-control" name="noplat">
                    </div>

                    <div class="mt-3">
                        <label for="">Tipe Kendaraan</label>
                        <select name="type" class="form-control" id="">
                            <option value="">Pilih Data</option>
                            <?= type($row) ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Nama Sopir</label>
                        <input type="text" class="form-control" name="sopir">
                    </div>

                    <div class="mt-3">
                        <label for="">Nomor Hp Sopir</label>
                        <input type="text" class="form-control" name="nohp">
                    </div>

                    <div class="mt-3">
                        <label for="">Foto Mobil</label>
                        <input type="file" class="form-control" name="foto">
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

<?php foreach ($mobil as $key) { ?>
    <div class="modal fade" id="mobiledit<?= $key['idmobil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=mobiledit&id=<?= $key['idmobil'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Kategori Kendaraan</label>
                            <select name="idkat" class="form-control" id="">
                                <?= kategori($key['idkat']) ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama_mobil" value="<?= $key['nama_mobil'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Banyak Bangku</label>
                            <input type="text" class="form-control" name="bangku" value="<?= $key['bangku'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Nomor Plat Mobil</label>
                            <input type="text" class="form-control" name="noplat" value="<?= $key['noplat'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Tipe Kendaraan</label>
                            <select name="type" class="form-control" id="">
                                <option value="">Pilih Data</option>
                                <?= type($key['type']) ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">Nama Supir</label>
                            <input type="text" class="form-control" name="sopir" value="<?= $key['sopir'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Nomor Hp Sopir</label>
                            <input type="text" class="form-control" name="nohp" value="<?= $key['nohp'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Foto Mobil</label>
                            <center>
                                <img src="../assets/images/mobil/<?= $key['foto'] ?>" width="100%" class="mb-3" alt="">
                            </center>
                            <input type="file" class="form-control" name="foto">
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


    <div class="modal fade" id="mobilview<?= $key['idmobil'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="../assets/images/mobil/<?= $key['foto'] ?>" width="100%" alt="">

                </div>
            </div>
        </div>
    </div>
<?php } ?>
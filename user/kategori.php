<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data Kategori</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kategoriadd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Banyak</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $kategori = $kon->query("SELECT * FROM kategori  ORDER BY idkat DESC");
                    foreach ($kategori as $key) {
                        $nama = "kategoridel";
                        $id = $key['idkat'];
                        $data = $key['nama'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center>
                                    <div class="badge badge-success">10</div>
                                </center>
                            </td>
                            <td><?= $key['ketkat'] ?></td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#kategoriedit<?= $key['idkat'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
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

<div class="modal fade" id="kategoriadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=kategoriadd" method="post">
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="mt-3">
                        <label for="">Keterangan Kategori</label>
                        <input type="text" class="form-control" name="ketkat">
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

<?php foreach ($kategori as $key) { ?>
    <div class="modal fade" id="kategoriedit<?= $key['idkat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=kategoriedit&id=<?= $key['idkat'] ?>" method="post">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Nama </label>
                            <input type="text" class="form-control" name="nama" value="<?= $key['nama'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Keterangan Kategori</label>
                            <input type="text" class="form-control" name="ketkat" value="<?= $key['ketkat'] ?>">
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
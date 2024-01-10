<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data Agen</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#agenadd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kota</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $agen = $kon->query("SELECT * FROM agen  ORDER BY idagen DESC");
                    foreach ($agen as $key) {
                        $kota = "agendel";
                        $id = $key['idagen'];
                        $data = $key['kota'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['kota'] ?></td>

                            <td><?= $key['alamat'] ?></td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#agenedit<?= $key['idagen'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
                                    <button class="btn btn-danger btn-sm" id="<?= $kota ?><?= $id ?>"><i class="mdi mdi-delete menu-icon"></i></button>
                                </center>
                            </td>
                        </tr>
                        <?= delete($kota, $id, $data) ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="agenadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data agen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=agenadd" method="post">
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="">Kota</label>
                        <input type="text" class="form-control" name="kota">
                    </div>

                    <div class="mt-3">
                        <label for="">Alamat Agen</label>
                        <input type="text" class="form-control" name="alamat">
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

<?php foreach ($agen as $key) { ?>
    <div class="modal fade" id="agenedit<?= $key['idagen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data agen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=agenedit&id=<?= $key['idagen'] ?>" method="post">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Kota </label>
                            <input type="text" class="form-control" name="kota" value="<?= $key['kota'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Alamat Agen</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $key['alamat'] ?>">
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
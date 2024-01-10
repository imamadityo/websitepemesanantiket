<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data User</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#useradd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $user = $kon->query("SELECT * FROM user WHERE iduser !='1' ORDER BY iduser");
                    foreach ($user as $key) {
                        $nama = "userdel";
                        $id = $key['iduser'];
                        $data = $key['namalengkap'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['namalengkap'] ?></td>
                            <td><?= $key['level'] ?></td>
                            <td>
                                <center>
                                    <div class="badge <?= ($key['status'] == 'Aktif') ? 'badge-success' : 'badge-danger' ?>"><?= $key['status'] ?></div>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#useredit<?= $key['iduser'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
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

<div class="modal fade" id="useradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=useradd" method="post">
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namalengkap">
                    </div>

                    <div class="mt-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mt-3">
                        <label for="">Level Akses</label>
                        <select name="level" class="form-control" id="">
                            <option value="">Pilih Data</option>
                            <?= posisi($row) ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="">Pilih Data</option>
                            <?= status($row) ?>
                        </select>
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

<?php foreach ($user as $key) { ?>
    <div class="modal fade" id="useredit<?= $key['iduser'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=useredit&id=<?= $key['iduser'] ?>" method="post">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="namalengkap" value="<?= $key['namalengkap'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $key['username'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" value="<?= $key['password'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Level Akses</label>
                            <select name="level" class="form-control" id="">
                                <option value="">Pilih Data</option>
                                <?= posisi($key['level']) ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="">Pilih Data</option>
                                <?= status($key['status']) ?>
                            </select>
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
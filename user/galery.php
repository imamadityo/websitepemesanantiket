<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2>Master Data Galery</h2>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#galeryadd">Tambah Data</button>
    </div>
    <?= pesan($_GET['alert']) ?>
    <div class="col-md-12">
        <div class="card card-body">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $galery = $kon->query("SELECT * FROM galery ORDER BY idgalery");
                    foreach ($galery as $key) {
                        $nama = "galerydel";
                        $id = $key['idgalery'];
                        $data = $key['nama'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td>
                                <center><a href="#" data-toggle="modal" data-target="#galeryview<?= $key['idgalery'] ?>"><img src="../assets/images/slide/<?= $key['galery'] ?>" alt=""><?= $key['level'] ?></a></center>
                            </td>
                            <td>
                                <center>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#galeryedit<?= $key['idgalery'] ?>"><i class="mdi mdi-tooltip-edit menu-icon"></i></button>
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

<div class="modal fade" id="galeryadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data galery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?p=aksi&form=galeryadd" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="">Nama </label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="mt-3">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="galery">
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

<?php foreach ($galery as $key) { ?>
    <div class="modal fade" id="galeryedit<?= $key['idgalery'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data galery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?p=aksi&form=galeryedit&id=<?= $key['idgalery'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mt-3">
                            <label for="">Nama </label>
                            <input type="text" class="form-control" name="nama" value="<?= $key['nama'] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="">Gambar</label>
                            <center><img src="../assets/images/slide/<?= $key['galery'] ?>" width="40%" alt=""><br><br></center>
                            <input type="file" class="form-control" name="galery">
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


    <div class="modal fade" id="galeryview<?= $key['idgalery'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="../assets/images/slide/<?= $key['galery'] ?>" width="100%" alt="">

                </div>
            </div>
        </div>
    </div>
<?php } ?>
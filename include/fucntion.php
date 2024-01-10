<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

function pesan($alert)
{
    $pesan = $_GET['alert'];
    if (empty($pesan)) {
        echo "";
    } else if ($pesan == 1) { ?>
        <script>
            Swal.fire(
                'Gagal Login',
                'Username & Password Tidak Boleh Kosong',
                'error'
            )
        </script>
    <?php } else if ($pesan == 2) { ?>
        <script>
            Swal.fire(
                'Gagal Login',
                'Username & Password Salah',
                'warning'
            )
        </script>
    <?php } else if ($pesan == 3) { ?>
        <script>
            Swal.fire(
                'Selamat',
                'Anda Berhasil Logout',
                'success'
            );
        </script>
    <?php } else if ($pesan == 4) { ?>
        <script>
            Swal.fire(
                'Selamat',
                'Anda Berhasil Menambah Data',
                'success'
            );
        </script>
    <?php } else if ($pesan == 5) { ?>
        <script>
            Swal.fire(
                'Selamat',
                'Anda Berhasil Mengedit Data',
                'success'
            );
        </script>
    <?php } else if ($pesan == 6) { ?>
        <script>
            Swal.fire(
                'Selamat',
                'Anda Berhasil Menghapus Data',
                'success'
            );
        </script>


    <?php } else if ($pesan == 7) { ?>
        <script>
            Swal.fire(
                'Maaf',
                'Data Sudah Ada',
                'warning'
            );
        </script>
    <?php }
}

function posisi($selected)
{
    $rows = array("Admin", "Pimpinan");
    $opt = '';
    foreach ($rows as $row) {
        if ($row == $selected) {
            $opt .= '<option class="form-control" value=' . $row . ' selected>' . $row . '</option>';
        } else {
            $opt .= '<option class="form-control" value=' . $row . '>' . $row . '</option>';
        }
    }
    return $opt;
}

function status($selected)
{
    $rows = array("Aktif", "Tidak Aktif");
    $opt = '';
    foreach ($rows as $row) {
        if ($row == $selected) {
            $opt .= '<option class="form-control" value=' . $row . ' selected>' . $row . '</option>';
        } else {
            $opt .= '<option class="form-control" value=' . $row . '>' . $row . '</option>';
        }
    }
    return $opt;
}

function delete($name, $id, $data)
{
    ?>
    <script>
        document.getElementById('<?= $name ?><?= $id ?>').addEventListener('click', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Apakah Anda Menghapus Data <?= $data ?>?',
                showDenyButton: true,
                confirmButtonText: 'Yess',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = '?p=aksi&form=<?= $name ?>&id=<?= $id ?>';
                }
            })
        })
    </script>
<?php }


function kategori($selected)
{
    include "koneksi.php";
    $rows = $kon->query("SELECT * FROM kategori ORDER BY idkat DESC");
    $opt = '';
    foreach ($rows as $row) {
        if ($row['idkat'] == $selected) {
            $opt .= "<option value='" . $row['idkat'] . "' selected>" . $row['nama'] . "</option>";
        } else {
            $opt .= "<option value='" . $row['idkat'] . "'>" . $row['nama'] . "</option>";
        }
    }
    return $opt;
}


function formatRupiah($angka)
{
    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $rupiah;
}

function type($selected)
{
    $rows = array("Eksekutif", "Ekonomi");
    $opt = '';
    foreach ($rows as $row) {
        if ($row == $selected) {
            $opt .= '<option class="form-control" value=' . $row . ' selected>' . $row . '</option>';
        } else {
            $opt .= '<option class="form-control" value=' . $row . '>' . $row . '</option>';
        }
    }
    return $opt;
}

function mobil($selected)
{
    include "koneksi.php";
    $rows = $kon->query("SELECT * FROM mobil ORDER BY idmobil DESC");
    $opt = '';
    foreach ($rows as $row) {
        if ($row['idmobil'] == $selected) {
            $opt .= "<option value='" . $row['idmobil'] . "' selected>" . $row['nama_mobil'] . "</option>";
        } else {
            $opt .= "<option value='" . $row['idmobil'] . "'>" . $row['nama_mobil'] . "</option>";
        }
    }
    return $opt;
}


function tampilkanPagination($data, $total_data, $previous, $next)
{
?>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($data > 1) {
                                            echo "href='?p=data&data=$previous'";
                                        } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_data; $x++) {
                if ($_GET['data'] == $x) {
                    $active = "active";
                } else {
                    $active = "";
                }
                // Tambahkan kondisi untuk nomor halaman pertama
                if (!isset($_GET['data']) && $x == 1) {
                    $active = "active";
                }
            ?>
                <li class="page-item <?= $active ?>"><a class="page-link" href="?p=data&data=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" <?php if ($data < $total_data) {
                                            echo "href='?p=data&data=$next'";
                                        } ?>>Next</a>
            </li>
        </ul>
    </nav>
<?php
}
function gagal($icon, $title, $halaman)
{ ?>
    <script>
        Swal.fire({
            icon: '<?= $icon ?>',
            title: '<?= $title ?>',
            confirmButtonText: 'Yess',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = '?p=<?= $halaman ?>';
            }
        })
    </script>
<?php }

function alfabet($limit)
{
    $alphabet = range('A', 'Z');
    $result = '';

    for ($i = 1; $i <= $limit; $i++) {
        if ($i <= 26) {
            $result .= "<option value='" . $alphabet[$i - 1] . "'>" . $alphabet[$i - 1] . "</option>";
        } else {
            $index = ($i - 1) % 26;
            $result .= "<option value='" . $alphabet[$index] . floor(($i - 1) / 26) . "'>" . $alphabet[$index] . floor(($i - 1) / 26) . "</option>";
        }
    }

    return $result;
}

function agen($selected)
{
    include "koneksi.php";
    $rows = $kon->query("SELECT * FROM agen ORDER BY idagen DESC");
    $opt = '';
    foreach ($rows as $row) {
        if ($row['idagen'] == $selected) {
            $opt .= "<option value='" . $row['idagen'] . "' selected>" . $row['kota'] . ", " . $row['alamat'] . "</option>";
        } else {
            $opt .= "<option value='" . $row['idagen'] . "'>" . $row['kota'] . ", " . $row['alamat'] . "</option>";
        }
    }
    return $opt;
}

<?php
require_once "../include/koneksi.php";
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

if ($_GET['form'] == "useradd") {
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $useradd = mysqli_query($kon, "INSERT INTO user (namalengkap, username, password, level, status)VALUES('$namalengkap','$username','$password','$level','$status')");
    if ($useradd) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=user&alert=4'>";
    }
} else if ($_GET['form'] == "useredit") {
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $iduser = $_GET['id'];

    $useredit = mysqli_query($kon, "UPDATE user SET     namalengkap='$namalengkap',
                                                        username='$username',
                                                        password='$password',
                                                        level='$level',
                                                        status='$status'
                                                        WHERE iduser = '$iduser'");
    if ($useredit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=user&alert=5'>";
    }
} else if ($_GET['form'] == "userdel") {

    $userdel = mysqli_query($kon, "DELETE FROM user WHERE iduser='$_GET[id]'");
    if ($userdel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=user&alert=6'>";
    }
}


if ($_GET['form'] == "galeryadd") {
    $nama = $_POST['nama'];

    $nmfoto  = basename($_FILES["galery"]["name"]);
    $lokfoto = $_FILES["galery"]["tmp_name"];
    $file_name = $nama . "-" . $nmfoto;
    if (!empty($lokfoto)) {
        move_uploaded_file($lokfoto, "../assets/images/slide/$file_name");
    }

    $galeryadd = mysqli_query($kon, "INSERT INTO galery (nama, galery)VALUES('$nama','$file_name')");
    if ($galeryadd) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=galery&alert=4'>";
    }
} else if ($_GET['form'] == "galeryedit") {
    $nama = $_POST['nama'];
    $id = $_GET['id'];

    $galery = mysqli_query($kon, "SELECT * from galery where idgalery='$_GET[id]'");
    $key = mysqli_fetch_array($galery);
    $nmfoto  = basename($_FILES["galery"]["name"]);
    $lokfoto = $_FILES["galery"]["tmp_name"];
    $file_name = $nama . "-" . $nmfoto;
    if (!empty($lokfoto)) {
        move_uploaded_file($lokfoto, "../assets/images/slide/$file_name");
        unlink("../assets/images/slide/$key[galery]");
        $foto = ", galery='$file_name'";
    } else {
        $foto = "";
    }

    $galeryedit = mysqli_query($kon, "UPDATE galery SET nama='$nama'
                                                        $foto
                                                        WHERE idgalery = '$id'");
    if ($galeryedit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=galery&alert=5'>";
    }
} else if ($_GET['form'] == "galerydel") {

    $galery = mysqli_query($kon, "SELECT * from galery where idgalery='$_GET[id]'");
    $key = mysqli_fetch_array($galery);
    unlink("../assets/images/slide/$key[galery]");
    $galerydel = mysqli_query($kon, "DELETE FROM galery WHERE idgalery='$_GET[id]'");
    if ($galerydel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=galery&alert=6'>";
    }
}

if ($_GET['form'] == "kategoriadd") {
    $nama = $_POST['nama'];
    $ketkat = $_POST['ketkat'];

    $kategoriadd = mysqli_query($kon, "INSERT INTO kategori (nama, ketkat)VALUES('$nama','$ketkat')");
    if ($kategoriadd) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=kategori&alert=4'>";
    }
} else if ($_GET['form'] == "kategoriedit") {
    $nama = $_POST['nama'];
    $ketkat = $_POST['ketkat'];
    $idkat = $_GET['id'];

    $kategoriedit = mysqli_query($kon, "UPDATE kategori SET     nama='$nama',
                                                        ketkat='$ketkat'
                                                        WHERE idkat = '$idkat'");
    if ($kategoriedit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=kategori&alert=5'>";
    }
} else if ($_GET['form'] == "kategoridel") {

    $kategoridel = mysqli_query($kon, "DELETE FROM kategori WHERE idkat='$_GET[id]'");
    if ($kategoridel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=kategori&alert=6'>";
    }
}


if ($_GET['form'] == "mobiladd") {
    $idkat = $_POST['idkat'];
    $nama_mobil = $_POST['nama_mobil'];
    $bangku = $_POST['bangku'];
    $noplat = $_POST['noplat'];
    $type = $_POST['type'];
    $nohp = $_POST['nohp'];
    $sopir = $_POST['sopir'];

    $nmfoto  = basename($_FILES["foto"]["name"]);
    $lokfoto = $_FILES["foto"]["tmp_name"];
    $file_name = $nama_mobil . "-" . $nmfoto;
    if (!empty($lokfoto)) {
        move_uploaded_file($lokfoto, "../assets/images/mobil/$file_name");
    }

    $mobiladd = mysqli_query($kon, "INSERT INTO mobil (idkat, nama_mobil, bangku, noplat, type, sopir,  nohp, foto)VALUES('$idkat','$nama_mobil','$bangku','$noplat','$type','$sopir','$nohp','$file_name')");
    if ($mobiladd) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=mobil&alert=4'>";
    }
} else if ($_GET['form'] == "mobiledit") {
    $idkat = $_POST['idkat'];
    $nama_mobil = $_POST['nama_mobil'];
    $bangku = $_POST['bangku'];
    $noplat = $_POST['noplat'];
    $type = $_POST['type'];
    $sopir = $_POST['sopir'];
    $nohp = $_POST['nohp'];
    $idmobil = $_GET['id'];

    $mobil = mysqli_query($kon, "SELECT * from mobil where idmobil='$_GET[id]'");
    $key = mysqli_fetch_array($mobil);
    $nmfoto  = basename($_FILES["foto"]["name"]);
    $lokfoto = $_FILES["foto"]["tmp_name"];
    $file_name = $nama_mobil . "-" . $nmfoto;
    if (!empty($lokfoto)) {
        move_uploaded_file($lokfoto, "../assets/images/mobil/$file_name");
        unlink("../assets/images/mobil/$key[mobil]");
        $foto = ", foto='$file_name'";
    } else {
        $foto = "";
    }

    $mobiledit = mysqli_query($kon, "UPDATE mobil SET   idkat='$idkat',
                                                        nama_mobil='$nama_mobil',
                                                        bangku='$bangku',
                                                        noplat='$noplat',
                                                        type='$type',
                                                        sopir='$sopir',
                                                        nohp='$nohp'
                                                        $foto
                                                        WHERE idmobil = '$idmobil'");
    if ($mobiledit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=mobil&alert=5'>";
    }
} else if ($_GET['form'] == "mobildel") {

    $mobil = mysqli_query($kon, "SELECT * from mobil where idmobil='$_GET[id]'");
    $key = mysqli_fetch_array($mobil);
    unlink("../assets/images/mobil/$key[mobil]");

    $mobildel = mysqli_query($kon, "DELETE FROM mobil WHERE idmobil='$_GET[id]'");
    if ($mobildel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=mobil&alert=6'>";
    }
}

if ($_GET['form'] == "berangkatanadd") {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $idmobil = $_POST['idmobil'];
    $tujuan = $_POST['tujuan'];
    $harga = $_POST['harga'];

    $mobil = mysqli_query($kon, "SELECT * from berangkatan where idmobil='$idmobil'");
    $row = mysqli_num_rows($mobil);
    if ($row > 0) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=berangkatan&alert=7'>";
    } else {
        $berangkatanadd = mysqli_query($kon, "INSERT INTO berangkatan (hari, jam, idmobil, tujuan, harga)VALUES('$hari','$jam','$idmobil','$tujuan', '$harga')");
        if ($berangkatanadd) {
            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=berangkatan&alert=4'>";
        }
    }
} else if ($_GET['form'] == "berangkatanedit") {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $idmobil = $_POST['idmobil'];
    $tujuan = $_POST['tujuan'];
    $harga = $_POST['harga'];
    $idberangkatan = $_GET['id'];

    $berangkatanedit = mysqli_query($kon, "UPDATE berangkatan SET   hari='$hari',
                                                                    jam='$jam',
                                                                    tujuan='$tujuan',
                                                                    harga='$harga',
                                                                    idmobil='$idmobil'
                                                                    WHERE idberangkatan = '$idberangkatan'");
    if ($berangkatanedit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=berangkatan&alert=5'>";
    }
} else if ($_GET['form'] == "berangkatandel") {

    $berangkatandel = mysqli_query($kon, "DELETE FROM berangkatan WHERE idberangkatan='$_GET[id]'");
    if ($berangkatandel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=berangkatan&alert=6'>";
    }
}


if ($_GET['form'] == "agenadd") {
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];

    $agenadd = mysqli_query($kon, "INSERT INTO agen (kota, alamat)VALUES('$kota','$alamat')");
    if ($agenadd) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=agen&alert=4'>";
    }
} else if ($_GET['form'] == "agenedit") {
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $idagen = $_GET['id'];

    $agenedit = mysqli_query($kon, "UPDATE agen SET     kota='$kota',
                                                        alamat='$alamat'
                                                        WHERE idagen = '$idagen'");
    if ($agenedit) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=agen&alert=5'>";
    }
} else if ($_GET['form'] == "agendel") {

    $agendel = mysqli_query($kon, "DELETE FROM agen WHERE idagen='$_GET[id]'");
    if ($agendel) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=agen&alert=6'>";
    }
}

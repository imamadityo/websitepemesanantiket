<?php
$del = mysqli_query($kon, "DELETE FROM pembelian WHERE idcart='$_GET[id]'");
$del = mysqli_query($kon, "DELETE FROM detail WHERE idcart='$_GET[id]'");
if ($del) {
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=riwayat&idag=$_GET[id]'>";
}

<!doctype html>
<html lang="en">
<?php
session_start();
include "include/koneksi.php";
include "include/fucntion.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$idanggota = $_SESSION['idanggota'];

$sqlag = mysqli_query($kon, "SELECT * from anggota where idanggota='$_SESSION[idanggota]' ");
$rag = mysqli_fetch_array($sqlag);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php include "nav.php" ?>
    <?php
    if (!empty($_GET["p"])) {
        include_once($_GET["p"] . ".php");
    } else {
        include "home.php";
        include "data.php";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
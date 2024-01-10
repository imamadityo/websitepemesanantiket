<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
require_once "../include/koneksi.php";
include "../include/fucntion.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.semanticui.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>

    <script src="../assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/dashboard.js"></script>

</head>

<body>
    <div class="container-scroller">
        <?php include "tampilan/nav.php" ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php include "tampilan/side.php" ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php
                    if (!empty($_GET["p"])) {
                        include_once($_GET["p"] . ".php");
                    } else {
                        include "home.php";
                    }
                    ?>
                </div>
                <?php include "tampilan/footer.php" ?>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
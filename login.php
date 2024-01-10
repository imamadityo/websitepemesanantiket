<div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong shadow-lg" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Sign in</h3>
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX-2">Password</label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
                    </form>
                    <hr class="my-4">

                    <a href="?p=daftar" class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Belum Punya Akun ??</a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["login"])) {
    $sqlag = mysqli_query($kon, "SELECT * from anggota where email='$_POST[email]' and password='$_POST[password]'");
    $row = mysqli_num_rows($sqlag);
    if ($row > 0) {
        $rag = mysqli_fetch_array($sqlag);

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        session_start();
        $_SESSION["userag"] = $rag["email"];
        $_SESSION["passag"] = $rag["password"];
        $_SESSION["idanggota"]   = $rag["idanggota"];
        $_SESSION["nama"]   = $rag["nama"];
        ////////////////Berhasil Login////////////////
        $icon = 'success';
        $title = 'Anda Berhasil Login Kesistem';
        $halaman = 'home';
        gagal($icon, $title, $halaman);
    } else {
        $icon = 'error';
        $title = 'Anda Anda Gagal Login.';
        $halaman = 'login';
        gagal($icon, $title, $halaman);
    }
} ?>
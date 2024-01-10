    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(245,167,208,1) 0%, rgba(0,212,255,1) 100%);">
        <div class="container-fluid">
            <a class="navbar-brand" href="?p=home"><b>PT.HPS</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['p'] == 'home' or $_GET['p'] == '') ? 'active fw-bold' : '' ?>" aria-current=" page" href="?p=home">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($_GET['idkat'] == '') ? '' : 'active fw-bold' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $kategori = $kon->query("SELECT * FROM kategori ORDER BY idkat DESC");
                            foreach ($kategori as $ket) {
                            ?>
                                <li><a class="dropdown-item <?= ($_GET['idkat'] == $ket['idkat']) ? 'active fw-bold' : '' ?>" href="?p=data&idkat=<?= $ket['idkat'] ?>"><?= $ket['nama'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search" method="post" action="?p=data">
                    <input class="form-control me-2" type="search" placeholder="Search" name="cari" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <?php
                if (!empty($_SESSION["userag"]) and !empty($_SESSION["passag"])) {
                ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link m-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $rag['nama'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="?p=riwayat&idag=<?= $rag['idanggota']; ?>">Riwayat</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="?p=logout">Logout</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a class="nav-link m-2 text-dark" href="?p=register">Register</a>
                    <a class="nav-link m-2 text-dark" href="?p=login">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>
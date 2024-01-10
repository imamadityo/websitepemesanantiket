<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?= ($_GET['p'] == 'home') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=home">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'user') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=user">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'galery') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=galery">
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
                <span class="menu-title">Galery</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'kategori') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=kategori">
                <i class="mdi mdi-equal-box menu-icon"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'mobil') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=mobil">
                <i class="mdi mdi-car menu-icon"></i>
                <span class="menu-title">Mobil</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'agen') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=agen">
                <i class="mdi mdi-folder menu-icon"></i>
                <span class="menu-title">Agen</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'berangkatan') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=berangkatan">
                <i class="mdi mdi-calendar menu-icon"></i>
                <span class="menu-title">Keberangkatan</span>
            </a>
        </li>

        <li class="nav-item <?= ($_GET['p'] == 'riwayat') ? 'active bg-secondary' : '' ?>">
            <a class=" nav-link" href="?p=riwayat">
                <i class="mdi mdi-table menu-icon"></i>
                <span class="menu-title">Riwayat</span>
            </a>
        </li>

    </ul>
</nav>
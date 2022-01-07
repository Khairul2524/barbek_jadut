<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">

                </div>
                <div class="sidebar-brand-text mx-3">SIP SISWA BARU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            $idrole = $this->session->userdata('idrole');
            $dimana = array(
                'idrole' => $idrole,
                'aktif' => 1
            );
            $menu = $this->db->from('aksesmenu')->join('menu', 'menu.idmenu=aksesmenu.idmenu')->where($dimana)->order_by('urutan', 'ASC')->get()->result();
            foreach ($menu as $m) {
                $dimana = array(
                    'idmenu' => $m->idmenu,
                    'subaktif' => 1
                );
                $submenu = $this->db->from('submenu')->where($dimana)->order_by('suburutan', 'ASC')->get()->result();
                if (!$submenu) {
            ?>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url($m->url) ?>">
                            <i class="<?= $m->icon ?>"></i>
                            <span><?= $m->menu ?></span></a>
                    </li>
                <?php } else { ?>
                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?= site_url($m->url) ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="<?= $m->icon ?>"></i>
                            <span><?= $m->menu ?></span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <?php
                                foreach ($submenu as $sb) {
                                ?>
                                    <a class="collapse-item" href="<?= site_url($sb->suburl) ?>"><?= $sb->submenu ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
            <?php }
            } ?>
            <?php

            if ($this->session->userdata('idrole') == 2) {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu" aria-expanded="true" aria-controls="menu">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Menu Manajemen</span>
                    </a>
                    <div id="menu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= site_url('menu') ?>">Menu</a>
                            <a class="collapse-item" href="<?= site_url('submenu') ?>">Sub Menu</a>
                            <a class="collapse-item" href="<?= site_url('menu/hakakses') ?>">Hak Akses</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
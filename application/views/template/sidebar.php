<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title">
                            <span>E-SONGKET</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= base_url('assets/backand/') ?>img/default.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span><?= $this->session->userdata('nama') ?></span>
                            <?php
                            $id = $this->session->userdata('idrole');
                            $role = $this->db->get_where('role', ['idrole' => $id])->row();
                            ?>
                            <h2><?= $role->role; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
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
                                        <li><a href="<?= base_url($m->url) ?>"><i class="<?= $m->icon ?>"></i><?= $m->menu; ?></a>
                                        </li>
                                    <?php      } else {
                                    ?>

                                        <li><a><i class="<?= $m->icon ?>"></i><?= $m->menu; ?><span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php
                                                foreach ($submenu as $sb) {
                                                ?>
                                                    <li><a href="<?= base_url($sb->suburl) ?>"><?= $sb->submenu; ?></a></li>
                                                <?php } ?>

                                            </ul>
                                        </li>
                                <?php
                                    }
                                } ?>
                                <?php

                                if ($this->session->userdata('idrole') == 2) {
                                ?>
                                    <li><a><i class="fa fa-cog"></i> Manajemen Menu <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('menu') ?>">Menu</a></li>
                                            <li><a href="<?= base_url('submenu') ?>">Sub Menu</a></li>
                                            <li><a href="<?= base_url('menu/hakakses') ?>">Hak Akses</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
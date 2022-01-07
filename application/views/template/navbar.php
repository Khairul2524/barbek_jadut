<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Profile">
        <i class="fa fa-user"></i>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Ubah Password">
        <i class="fa fa-edit"></i>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <i class="fa fa-sign-out"></i>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('assets/backand/') ?>img/default.jpg" alt=""><?= $this->session->userdata('nama') ?></a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="<?= base_url('') ?>auth/keluar"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>
        </nav>
    </div>
</div>
<!-- /top navigation -->
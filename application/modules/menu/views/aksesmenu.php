<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul . ' ' . $role->role  ?></h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($menu as $d) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d->menu ?></td>
                                <td class="text-center">
                                    <input class="form-check-input akses" type="checkbox" id="akses" name="akses" value="1" data-idrole="<?= $role->idrole ?>" data-idmenu="<?= $d->idmenu ?>" <?= hakaksesmenu($role->idrole, $d->idmenu); ?>>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('menu/hakakses') ?>" class="btn btn-danger btn-icon-split ">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->

<script>
    $(function() {
        // ubah
        $('.akses').on('click', function() {
            // console.log('oket');
            const idrole = $(this).data('idrole')
            const idmenu = $(this).data('idmenu')
            // console.log(idrole)
            // console.log(idmenu)
            $.ajax({
                url: `<?= site_url('menu/hakaksesmenu') ?>`,
                data: {
                    roleid: idrole,
                    menuid: idmenu
                },
                method: 'post',
                dataType: 'json',
            })
        })
    })
</script>
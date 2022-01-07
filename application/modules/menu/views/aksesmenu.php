<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= $judul . ' : ' . $role->role ?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
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
                    </div>
                    <a href="<?= base_url('menu/hakakses') ?>" class="btn btn-danger btn-icon-split mt-2">
                        <span class="icon text-white-50">
                            <i class="fa fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


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
<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= $judul; ?></h2>
                    <div class="clearfix"></div>
                </div>
                <button type="button" class="btn btn-success btn-sm tombol-tambah" data-toggle="modal" data-target="#exampleModal"> Tambah User</button>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aktif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $d) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $d->nama; ?></td>
                                                <td><?= $d->username; ?></td>
                                                <td><?= $d->role; ?></td>
                                                <td><?php
                                                    if ($d->aktif == 1) {
                                                        echo "aktif";
                                                    } else {
                                                        echo "tidak aktif";
                                                    }
                                                    ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-warning tombol-ubah" data-toggle="modal" data-target="#exampleModal" data-id="<?= $d->iduser; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-primary tombol-reset" data-toggle="modal" data-target="#resetmodal" data-id="<?= $d->iduser; ?>">
                                                        <i class="fa fa-lock"></i>
                                                    </a>
                                                    <a href="<?= site_url('user/hapus/') . $d->iduser ?>" class="btn btn-danger btn-circle">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="demo-form2" action="<?= site_url('user/tambah') ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group" id="pass">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <?php
                            foreach ($role as $m) {
                            ?>
                                <option value="<?= $m->idrole; ?>"><?= $m->role; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="aktif" id="aktif1" value="1" checked> Aktif
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="aktif" id="aktif2" value="2">Tidak Aktif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success"></button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- modal reset password -->
<div class="modal fade" id="resetmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="<?= site_url('user/ubahpass') ?>">
            <input type="text" id="iduser" name="id" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pass">Password Baru</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="Password Baru" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fa fa-times"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <button type="submit" class="btn btn-warning btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        // tambah
        $('.tombol-tambah').on('click', function() {
            $('.modal-title').html('Tambah User')
            $('#pass').html(`<label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" autocomplete="off" required>`)

            $('.modal-footer button[type= submit]').html('Simpan')
            $('#id').val('')
            $('#username').val('')
            $('#nama').val('')
            $('#role').val('')
            $('#aktif').val(1)
            $('#tidakaktif').val(2)
        })
        // ubah
        $('.tombol-ubah').on('click', function() {
            $('.modal-title').html('Ubah User')
            $('.modal-footer button[type= submit] ').html('Ubah')
            $('.modal-dialog form').attr('action', `<?= site_url('user/ubah') ?>`)
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('user/getubah') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id').val(data.iduser)
                    $('#nama').val(data.nama)
                    $('#username').val(data.username)
                    $('#role').val(data.idrole)
                    if (data.aktif == 1) {
                        $('input:radio[name=aktif][value=' + data.aktif + ']')[0].checked = true;
                    } else {
                        $('input:radio[name=aktif][value=' + data.aktif + ']')[0].checked = true;
                    }
                }
            })
        })
        // reset Password
        $('.tombol-reset').on('click', function() {
            const id = $(this).data('id')
            // console.log(id)
            $.ajax({
                url: `<?= site_url('user/getubah') ?>`,
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#iduser').val(data.iduser)
                }
            })
        })
    })
</script>
<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $judul; ?></h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-success btn-icon-split mb-2 tombol-tambah" data-toggle="modal" data-target="#menumodal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus-square"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->iduser; ?>">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-circle tombol-reset" data-toggle="modal" data-target="#resetmodal" data-id="<?= $d->iduser; ?>">
                                        <i class="fas fa-lock"></i>
                                    </a>
                                    <a href="<?= site_url('user/hapus/') . $d->iduser ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->
<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="<?= site_url('user/tambah') ?>">
            <input type="text" id="id" name="id" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
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
                    <a href="#" class="btn btn-danger btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
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
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <button type="submit" class="btn btn-warning btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
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
            $('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
            $('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
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
            $('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
            $('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
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
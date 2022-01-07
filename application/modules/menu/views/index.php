<script src="<?= site_url('assets/backand/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data <?= $judul ?></h6>
		</div>
		<div class="card-body">
			<a href="#" class="btn btn-success btn-icon-split mb-2 tambah-menu" data-toggle="modal" data-target="#menumodal">
				<span class="icon text-white-50">
					<i class="fas fa-plus-square"></i>
				</span>
				<span class="text">Tambah</span>
			</a>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Menu</th>
							<th>icon</th>
							<th>url</th>
							<th>urutan</th>
							<th>Aktif</th>
							<th>Aksi</th>
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
								<td><?= $d->icon ?></td>
								<td><?= $d->url ?></td>
								<td><?= $d->urutan ?></td>
								<td><?php
									if ($d->aktif == 1) {
										echo "Aktif";
									} else {
										echo "Tidak Aktif";
									}

									?></td>
								<td class="text-center">
									<button data-toggle="modal" data-target="#menumodal" class="btn btn-warning btn-circle ubah-menu" data-id="<?= $d->idmenu ?>">
										<i class="fas fa-exclamation-triangle"></i>
									</button>
									<a href="<?= site_url('menu/hapus/') . $d->idmenu ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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

</div>
<!-- /.container-fluid -->

<!-- Logout Modal-->
<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="<?= site_url('menu/tambah') ?>">
			<input type="text" id="id" name="id" hidden>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah <?= $judul; ?></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="menu">Menu</label>
						<input type="text" class="form-control" id="menus" name="menu" placeholder="Menu" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="icon">Icon</label>
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<input type="text" class="form-control" id="url" name="url" placeholder="URL" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="urutan">Urutan</label>
						<input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan" autocomplete="off" required>
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


</div>
<!-- End of Main Content -->

<script>
	$(function() {
		// tambah
		$('.tambah-menu').on('click', function() {
			$('.modal-title').html('Tambah Menu')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#menus').val('')
			$('#icon').val('')
			$('#url').val('')
			$('#urutan').val('')
			$('#aktif').val(1)
			$('#tidakaktif').val(2)
		})
		// ubah
		$('.ubah-menu').on('click', function() {
			$('.modal-title').html('Ubah Menu')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('menu/ubah') ?>`)
			const id = $(this).data('id')
			console.log(id)
			$.ajax({
				url: `<?= site_url('menu/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					// console.log(data)
					$('#id').val(data.idmenu)
					$('#menus').val(data.menu)
					$('#icon').val(data.icon)
					$('#url').val(data.url)
					$('#urutan').val(data.urutan)
					if (data.aktif == 1) {
						$('input:radio[name=aktif][value=' + data.aktif + ']')[0].checked = true;
					} else {
						$('input:radio[name=aktif][value=' + data.aktif + ']')[0].checked = true;
					}
				}
			})
		})
	})
</script>
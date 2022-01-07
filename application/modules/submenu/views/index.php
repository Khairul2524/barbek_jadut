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
				<a href="#" class="btn btn-success btn-icon-split mb-2 tambah-menu" data-toggle="modal" data-target="#menumodal">
					<span class="icon text-white-50">
						<i class="fa fa-plus-square"></i>
					</span>
					<span class="text">Tambah</span>
				</a>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Menu</th>
											<th>Sub Menu</th>
											<th>url</th>
											<th>urutan</th>
											<th>Aktif</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($submenu as $d) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $d->menu ?></td>
												<td><?= $d->submenu ?></td>
												<td><?= $d->suburl ?></td>
												<td><?= $d->suburutan ?></td>
												<td><?php
													if ($d->subaktif == 1) {
														echo "Aktif";
													} else {
														echo "Tidak Aktif";
													}

													?></td>
												<td class="text-center">
													<button data-toggle="modal" data-target="#menumodal" class="btn btn-warning btn-circle ubah-menu" data-id="<?= $d->idsubmenu ?>">
														<i class="fa fa-exclamation-triangle"></i>
													</button>
													<a href="<?= site_url('submenu/hapus/') . $d->idsubmenu ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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


<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="<?= site_url('submenu/tambah') ?>">
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
						<select class="form-control" id="menus" name="menu" required>
							<option>Pilih Menu</option>
							<?php
							foreach ($menu as $m) {
							?>
								<option value="<?= $m->idmenu; ?>"><?= $m->menu; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="submenu">Sub Menu</label>
						<input type="text" class="form-control" id="submenu" name="submenu" placeholder="Sub Menu" autocomplete="off" required>
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
							<i class="fa fa-times"></i>
						</span>
						<span class="text">Batal</span>
					</a>
					<button type="submit" class="btn btn-success btn-icon-split mb-2">
						<span class="icon text-white-50">
							<i class="fa fa-plus-square"></i>
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
			$('.modal-title').html('Tambah Sub Menu')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#menus').val('')
			$('#submenu').val('')
			$('#url').val('')
			$('#urutan').val('')
			$('#aktif').val(1)
			$('#tidakaktif').val(2)
		})
		// ubah
		$('.ubah-menu').on('click', function() {
			$('.modal-title').html('Ubah Sub Menu')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fas fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('submenu/ubah') ?>`)
			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('submenu/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					// console.log(data)
					$('#id').val(data.idsubmenu)
					$('#menus').val(data.idmenu)
					$('#submenu').val(data.submenu)
					$('#url').val(data.suburl)
					$('#urutan').val(data.suburutan)
					if (data.subaktif == 1) {
						$('input:radio[name=aktif][value=' + data.subaktif + ']')[0].checked = true;
					} else {
						$('input:radio[name=aktif][value=' + data.subaktif + ']')[0].checked = true;
					}
				}
			})
		})
	})
</script>
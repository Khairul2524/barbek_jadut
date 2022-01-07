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
				<a href="#" class="btn btn-success btn-icon-split mb-2 tombol-tambah" data-toggle="modal" data-target="#menumodal">
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
											<th>NO</th>
											<th>Role</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($data as $d) {
										?>
											<tr>
												<td scope="row"><?= $no++; ?></td>
												<td><?= $d->role; ?></td>
												<td>
													<a href="#" class="btn btn-warning btn-circle tombol-ubah" data-toggle="modal" data-target="#menumodal" data-id="<?= $d->idrole; ?>">
														<i class="fa fa-edit"></i>
													</a>
													<a href="<?= site_url('role/hapus/') . $d->idrole ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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
		<form method="POST" action="<?= site_url('role/tambah') ?>">
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
						<label for="role">Role</label>
						<input type="text" class="form-control" id="role" name="role" placeholder="role" autocomplete="off" required>
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
<script>
	$(function() {
		// tambah
		$('.tombol-tambah').on('click', function() {
			$('.modal-title').html('Tambah Role')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fa fa-plus-square"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Simpan')
			$('#id').val('')
			$('#role').val('')
		})
		// ubah
		$('.tombol-ubah').on('click', function() {
			$('.modal-title').html('Ubah Role')
			$('.modal-footer button[type= submit] span[class="icon text-white-50"]').html('	<i class="fa fa-check"></i>')
			$('.modal-footer button[type= submit] span[class="text"]').html('Ubah')
			$('.modal-dialog form').attr('action', `<?= site_url('role/ubah') ?>`)
			const id = $(this).data('id')
			// console.log(id)
			$.ajax({
				url: `<?= site_url('role/getubah') ?>`,
				data: {
					id: id
				},
				method: 'post',
				dataType: 'json',
				success: function(data) {
					// console.log(data)
					// console.log(data)
					$('#id').val(data.idrole)
					$('#role').val(data.role)
				}
			})
		})
	})
</script>
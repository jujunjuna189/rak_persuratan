<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
        <div class="card-body">
            Selamat Datang Di Aplikasi Rak Persuratan
        </div>
    </div>
    </div>
	<?php foreach($jumlah_surat as $jumlah): ?>
		<div class="col-md-4 mb-4">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title mb-3"><?= $jumlah->total ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?= $jumlah->nama_kategori ?></h6>
			</div>
		</div>
	</div>
	<?php endforeach ?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title">List Surat Yang Sedang Diajukan</div>
				<?php foreach($surat_diajukan as $surat): ?>
					<div class="border border-1 py-1 px-2 d-flex justify-content-between align-items-center">
						<div>
							<h5><?= $surat->nama_surat ?></h5>
							<span>
								<?= $surat->nama_kategori ?> - <?= $surat->tanggal_surat ?>
							</span>
						</div>
						<?php if($this->session->userdata('role')->role_key == 2) : ?>
							<div>
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $surat->id ?>">
							Setujui
							</button>
								<a href="" class="btn btn-danger">Tolak</a>
							</div>
						<?php endif ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Setujui Surat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('surat/updatestatus') ?>" method="post">
			<div class="form-group">
				<label for="">Deskripsi</label>
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="status" id="status" value="2">
				<textarea name="deskripsi" class="form-control" id="" cols="30" rows="1" required></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Setujui</button>
		</div>
	</form>
    </div>
  </div>
</div>
<script>
	$('#exampleModal').on('show.bs.modal', function(e) {
		var suratId = $(e.relatedTarget).data('id');
		$(e.currentTarget).find('input[name="id"]').val(suratId);
	});
</script>
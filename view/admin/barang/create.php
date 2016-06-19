<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Barang - <small>Tambah Barang</small></h3>
			<hr>
			<form method="post" action="<?php echo app_base.'save_barang' ?>" enctype="multipart/form-data">
			<div class="row">
				<label class="col-md-3">File Gambar</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="file" name="gambar" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Nama Barang</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="nama_barang" value="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Kategori Barang</label>
				<div class="col-md-6">
					<div class="form-group">
						<select class="form-control cst" name="id_kategori">
							<?php echo Lib::dropKategori() ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Harga</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="harga" value="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Stok Barang</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="stok" value="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Berat Barang</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="berat" value="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Size</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="size" value="" >
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Warna</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="warna" value="">
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Deskripsi Barang</label>
				<div class="col-md-6">
					<div class="form-group">
						<textarea class="form-control cst" name="deskripsi" rows="5" style="resize:none"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Publikasi</label>
				<div class="col-md-6">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3">
								<input type="radio" name="publikasi" value="1" required> Ya
							</label>
							<label class="col-md-3">
								<input type="radio" name="publikasi" value="0" required> Tidak
							</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<div class="form-group">
						<button class="btn btn-cst red"><i class="fa fa-check"></i> Simpan</button>
						<a href="<?php echo app_base.'index_barang' ?>">
							<button type="button" class="btn btn-cst orange"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
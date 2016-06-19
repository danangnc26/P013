<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Kategori - <small>Edit Kategori</small></h3>
			<hr>
			<?php
			if($data == null){
				
			}else{
				foreach ($data as $key => $value) {
			?>
			<form method="post" action="<?php echo app_base.'update_kategori' ?>">
			<input type="hidden" name="id_kategori" value="<?php echo $value['id_kategori'] ?>">
			<div class="row">
				<label class="col-md-3">Nama Kategori</label>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control cst" type="text" name="nama_kategori" value="<?php echo $value['nama_kategori'] ?>" required>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3">Tipe Kategori</label>
				<div class="col-md-6">
					<div class="form-group">
						<select class="form-control cst" name="type" required>
							<option value="">-- Pilih Type Kategori --</option>
							<option <?php echo ($value['type'] == 'L') ? 'selected' : '' ?> value="L">Pria</option>
							<option <?php echo ($value['type'] == 'P') ? 'selected' : '' ?> value="P">Wanita</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<div class="form-group">
						<button class="btn btn-cst red"><i class="fa fa-check"></i> Simpan</button>
						<a href="<?php echo app_base.'index_kategori' ?>">
							<button type="button" class="btn btn-cst orange"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
					</div>
				</div>
			</div>
			</form>
			<?php }} ?>
		</div>
	</div>
</div>
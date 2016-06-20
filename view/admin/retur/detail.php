<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Retur - <small>Index Retur</small></h3>
			<hr>
			<?php 
		if($data1 != null){
		foreach ($data1 as $key1 => $value1) {
		?>
		<div class="row">
			<div class="col-md-6">
				<label class="b">Data Transaksi : </label>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Kode Transaksi
						</label>
						<div class="col-md-8">
							<?php echo $value1['kode_beli'] ?>
						</div>
					</div>
				</div>
				<label class="b">Metode Pengembalian Barang : </label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<i class="fa fa-check"></i> Kirim kembali barang yang direturn.
						</div>
					</div>
				</div>
				<label class="b">Lampirkan File : </label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12"><i class="fa fa-papper-clip"></i>
							<?php
							if($value1['file_retur'] == null){
							?>
							-
							<?php
							}else{
							?>
							<a target="_blank" href="<?php echo base_url.'public/images/'.$value1['file_retur'] ?>">
								<i class="fa fa-papperclip"></i> Lihat Lampiran
							</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="b">Alasan mengapa barang direturn :</label>
					<div class="row">
						<div class="col-md-12">
							<?php echo $value1['alasan_retur'] ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<label class="b">Data Pengembalian Dana : </label>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nama Bank
						</label>
						<div class="col-md-8">
							<?php echo $value1['bank_retur'] ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nama pemilik rekening
						</label>
						<div class="col-md-8">
							<?php echo $value1['nama_rekening_retur'] ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nomor rekening
						</label>
						<div class="col-md-8">
							<?php echo $value1['no_rekening_retur'] ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<h4>Barang yang direturn</h4>
				<hr>
				<div class="row">
						<?php
						if($data2 == null){

						}else{
						foreach ($data2 as $key2 => $value2) {
						?>
						<div class="col-xs-6 col-md-6" style="margin-bottom:10px">
							<div class="row">
								<div class="col-md-4">
									<img style="margin-bottom:10px;" src="<?php echo base_url.'public/images/'.$value2['gambar'] ?>" width="100%">
								</div>
								<div class="col-md-8">
									<h5 class="txt-red b"><?php echo $value2['nama_barang'] ?></h5>
									<label class="b"><?php echo Lib::ind($value2['harga']) ?></label><br>
									Jumlah retur : <?php echo $value2['qty'] ?>
								</div>
							</div>
						</div>
						<?php
							}}
						?>
					</div>
			</div>
			<div class="col-md-12">
				<hr>
				<h4 class="pull-right">Dana yang harus dikembalikan : <?php echo Lib::ind($value1['total_retur']) ?></h4>
				<br>
				<br>
				<hr>
				<a href="<?php echo app_base.'index_retur' ?>">
				<button type="button" class="btn btn-cst red"><i class="fa fa-arrow-left"></i> Kembali</button>
				</a>
				<a href="<?php echo app_base.'konfirmasi_pengembalian_dana&kode_beli='.$value1['kode_beli'].'&id_retur='.$value1['id_retur'] ?>">
				<button type="button" class="btn btn-cst red"><i class="fa fa-check"></i> Konfirmasi Pengembalian Dana</button>
				</a>
			</div>
		</div>
		<?php  }} ?>
		</div>
	</div>
</div>
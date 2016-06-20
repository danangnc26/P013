<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<?php
		if($data1 == null){

		}else{
		foreach ($data1 as $key1 => $value1) {
		?>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Pesanan - <small>Detail Pesanan</small></h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<h4 class="pull-right">Kode Transaksi : <span class="txt-red"><?php echo $value1['kode_beli'] ?></span></h4>
					<form method="post" action="<?php echo app_base.'update_pesanan' ?>">
					<input type="hidden" name="kode_beli" value="<?php echo $value1['kode_beli'] ?>">
					<div class="input-group" style="width:250px; margin-bottom:10px;">
							<select name="status" class="form-control cst" style="width:200px;" required>
								<option <?php echo ($value1['status'] == '') ? 'selected' : '' ?> value="">-- Pilih Status --</option>
								<!-- <option <?php echo ($value1['status'] == '-') ? 'selected' : '' ?> value="-">Dibatalkan</option>
								<option <?php echo ($value1['status'] == '1') ? 'selected' : '' ?> value="1">Pending</option>
								<option <?php echo ($value1['status'] == '2') ? 'selected' : '' ?> value="2">Pembayaran Lunas</option> -->
								<option <?php echo ($value1['status'] == '3') ? 'selected' : '' ?> value="3">Sedang Diproses</option>
								<option <?php echo ($value1['status'] == '4') ? 'selected' : '' ?> value="4">Barang Dikirim</option>
								<!-- <option <?php echo ($value1['status'] == '5') ? 'selected' : '' ?> value="5">Barang Diterima</option> -->
								<option <?php echo ($value1['status'] == '6') ? 'selected' : '' ?> value="6">Selesai</option>
							</select>
							<span class="input-group-btn">
								<button class="btn btn-cst red"><i class="fa fa-refresh"></i> Ubah Status</button>
							</span>
						</div>
					</form>
					<hr>
					<div class="row">
						<?php
						if($data2 == null){

						}else{
						foreach ($data2 as $key2 => $value2) {
						?>
						<div class="col-md-6" style="margin-bottom:10px">
							<div class="row">
								<div class="col-md-4">
									<img src="<?php echo base_url.'public/images/'.$value2['gambar'] ?>" width="100%">
								</div>
								<div class="col-md-8">
									<h5 class="txt-red b"><?php echo $value2['nama_barang'] ?></h5>
									<label class="b"><?php echo Lib::ind($value2['harga']) ?></label><br>
									<small>Jumlah : <?php echo $value2['qty'] ?></small><br>
									<small>Berat : <?php echo $value2['berat'] ?> gram</small>
								</div>
							</div>
						</div>
						<?php
							}}
						?>
					</div>
					<hr>
				</div>
				<div class="col-md-6">
					<h5 class="b">Rangkuman Biaya : </h5>
					<table border="0" width="100%" style="margin-bottom:20px;">
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Harga Total</td>
							<td align="right" style="vertical-align:top; padding-top:10px;">
								<?php echo Lib::ind($value1['subtotal']) ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Biaya kirim ( JNE REG )</td>
							<td align="right" style="vertical-align:top; padding-top:10px; width:120px;">
								<?php echo Lib::ind($value1['ongkir']) ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Kode Pembayaran</td>
							<td align="right" style="vertical-align:top; padding-top:10px; width:120px;">
								<?php echo $value1['kode_unik'] ?>
							</td>
						</tr>
					</table>
					<table border="0" width="100%" style="margin-bottom:50px;">
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Total Biaya</td>
							<td align="right" style="padding-top:10px;">
								<?php echo Lib::ind($value1['total_biaya']+$value1['kode_unik']) ?>
							</td>
						</tr>
					</table>
					<h5 class="b">Metode Pembayaran : </h5>
					<h5>Transfer</h5>
					<h5 class="b">Kurir Pengiriman : </h5>
					<h5>JNE REG</h5>
					<h5 class="b">Catatan : </h5>
					<h5><?php echo $value1['catatan'] ?></h5>
					<h5 class="b">Status : </h5>
					<h5 class="txt-red" style="margin-bottom:20px;"><?php echo Lib::status($value1['status']) ?></h5>
					<?php if($value1['resi'] != null){ ?>
					<h5 class="b">No. Resi Pengiriman : </h5>
					<a target="_blank" href="http://www.jne.co.id/tracking.php">
						<h5 class="txt-red" style="margin-bottom:20px;"><?php echo $value1['resi'] ?></h5>
					</a>
					<?php } ?>
				</div>
				<div class="col-md-6">
				<h5 class="b">Dikirm Ke : </h5>
					<table border="0" width="100%" style="margin-bottom:20px;">
						<tr>
							<td style="vertical-align:top; padding-top:10px; width:50px; ">Nama</td>
							<td align="left" style="vertical-align:top; padding-top:10px;">
								: <?php echo $value1['nama_penerima'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">No. Telp</td>
							<td align="left" style="vertical-align:top; padding-top:10px;">
								: <?php echo $value1['no_telp'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Alamat</td>
							<td align="left" style="vertical-align:top; padding-top:10px; width:120px;">
								: <?php echo $value1['alamat_penerima'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Kecamatan</td>
							<td align="left" style="vertical-align:top; padding-top:10px; width:120px;">
								: <?php echo $value1['kecamatan'] ?>							
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Kota</td>
							<td align="left" style="padding-top:10px;">
								: <?php 
									$kota = explode('|', $value1['kota']);
									echo $kota[1];
								?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Provinsi</td>
							<td align="left" style="padding-top:10px;">
								: <?php 
									$provinsi = explode('|', $value1['provinsi']);
									echo $provinsi[1];
								?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Kode Pos</td>
							<td align="left" style="padding-top:10px;">
								: <?php echo $value1['kode_pos'] ?>
							</td>
						</tr>
					</table>
					<h5 class="b">Data pembayaran : </h5>
					<?php 
					if(Lib::getConfirm($value1['kode_beli']) == null){
					?>
					Transaksi ini belum dibayar.
					<?php
					}else{
					foreach (Lib::getConfirm($value1['kode_beli']) as $key3 => $value3) {
					?>
					<table border="0" width="100%" style="margin-bottom:20px;">
						<tr>
							<td style="vertical-align:top; padding-top:10px; width:50px; ">Bank Tujuan</td>
							<td align="left" style="vertical-align:top; padding-top:10px;">
								: <?php echo $value3['bank_tujuan'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Bank yang digunakan</td>
							<td align="left" style="vertical-align:top; padding-top:10px;">
								: <?php echo $value3['bank_asal'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">No. Rekening</td>
							<td align="left" style="vertical-align:top; padding-top:10px; width:120px;">
								: <?php echo $value3['no_rekening'] ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; padding-top:10px;">Pemilik Rekening</td>
							<td align="left" style="vertical-align:top; padding-top:10px; width:120px;">
								: <?php echo $value3['nama_pemilik_rekening'] ?>							
							</td>
						</tr>
					</table>
					<?php }} ?>
				</div>
				<div class="col-md-12">
				<hr>
					<a href="<?php echo app_base.'index_pesanan' ?>">
							<button type="button" class="btn btn-cst red"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
						
				</div>
			</div>
		</div>
		<?php }} ?>
	</div>
</div>
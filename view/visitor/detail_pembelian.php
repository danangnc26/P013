<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Detail Transaksi</h3>
		<hr>
		<?php
		if($data1 == null){

		}else{
		foreach ($data1 as $key1 => $value1) {
		?>
		<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-cst red"><i class="fa fa-money"></i> Konfirmasi Pembayaran</button>
					<button type="button" class="btn btn-cst red"><i class="fa fa-mail-reply-all"></i> Return Barang</button>
					<h4 class="pull-right">Kode Transaksi : <span class="txt-red"><?php echo $value1['kode_beli'] ?></span></h4>
					<br><br>
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
				</div>
				<div class="col-md-6">
				<h5 class="b">Dikirim Ke : </h5>
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
				</div>
				<div class="col-md-12">
				<hr>
					<a href="<?php echo app_base.'trans_history' ?>">
							<button type="button" class="btn btn-cst red"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
				</div>
			</div>
	</div>
	<?php }} ?>
</div>
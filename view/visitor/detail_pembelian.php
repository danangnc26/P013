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
					<button <?php echo (Lib::getConfirm($value1['kode_beli']) != null) ? 'disabled' : '' ?> data-toggle="modal" data-target="#myModal" type="button" class="btn btn-cst red"><i class="fa fa-money"></i> Konfirmasi Pembayaran</button>
					<!-- <button type="button" class="btn btn-cst red"><i class="fa fa-mail-reply-all"></i> Return Barang</button> -->

					<?php if($value1['status'] == '4'){ ?>
					<button type="button" class="btn btn-cst red"><i class="fa fa-dropbox"></i> Konfirmasi Barang Diterima</button>
					<?php } ?>

					<?php if($value1['status'] == '5'){ ?>
					<button type="button" class="btn btn-cst red"><i class="fa fa-mail-reply-all"></i> Return Barang</button>
					<?php } ?>


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
					<?php if($value1['resi'] != null){ ?>
					<h5 class="b">No. Resi Pengiriman : </h5>
					<a target="_blank" href="http://www.jne.co.id/tracking.php">
						<h5 class="txt-red" style="margin-bottom:20px;"><?php echo $value1['resi'] ?></h5>
					</a>
					<?php } ?>
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
					<a href="<?php echo app_base.'trans_history' ?>">
							<button type="button" class="btn btn-cst red"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
				</div>
			</div>
	</div>
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-money"></i> Konfirmasi Pembayaran</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo app_base.'save_konfirmasi' ?>">
			<input type="hidden" name="kode_beli" value="<?php echo $value1['kode_beli'] ?>">
				<div class="form-group">
					<label>Bank tujuan : </label>
					<select class="form-control cst" name="bank_tujuan" required>
						<option value="">-- Pilih Bank --</option>
						<option value="Bank Central Asia ( BCA )">Luppy Shop - Bank Central Asia ( BCA )</option>
						<option value="Bank Mandiri">Luppy Shop - Bank Mandiri</option>
						<option value="Bank Nasional Indonesia ( BNI )">Luppy Shop - Bank Nasional Indonesia ( BNI )</option>
						<option value="Bank Rakyat Indonesia ( BRI )">Luppy Shop - Bank Rakyat Indonesia ( BRI )</option>
					</select>
				</div>
				<div class="form-group">
					<label>Bank yang digunakan : </label>
					<select class="form-control cst" name="bank_asal" required>
						<option value="">-- Pilih Bank --</option>
						<option value="Bank Central Asia ( BCA )">Bank Central Asia ( BCA )</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank Nasional Indonesia ( BNI )">Bank Nasional Indonesia ( BNI )</option>
						<option value="Bank Rakyat Indonesia ( BRI )">Bank Rakyat Indonesia ( BRI )</option>
					</select>
					<small>
						Pastikan nomor rekening yang anda masukkan valid.
					</small>
				</div>
				<div class="form-group">
					<label>Nomor rekening saya : </label>
					<input type="text" pattern="[0-9].{0,}" title="Gunakan Format Angka" class="form-control cst" name="no_rekening" required>
				</div>
				<div class="form-group">
					<label>Nama pemilik rekening : </label>
					<input class="form-control cst" name="nama_pemilik" required>
				</div>
				<hr>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cst pull-right orange nm" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
          <button class="btn btn-cst pull-right red"><i class="fa fa-send"></i> Konfirmasi pembayaran ini</button>
        </div>
      </div>
      </form>
    </div>
  </div>
	<?php }} ?>
</div>
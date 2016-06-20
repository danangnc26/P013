<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Form Return Barang</h3>
		<hr>
		<?php 
		if($data1 != null){
		foreach ($data1 as $key1 => $value1) {
		?>
		<form method="post" action="<?php echo app_base.'send_retur' ?>"  enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<label class="b">Data Transaksi : </label>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Kode Transaksi
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="kode_beli" readonly value="<?php echo $value1['kode_beli'] ?>">
						</div>
					</div>
				</div>
				<label class="b">Metode Pengembalian Barang : </label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="radio" checked name="metode_retur" value=""> Kirim kembali barang yang direturn.
						</div>
					</div>
				</div>
				<label class="b">Lampirkan File : </label>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="file" class="form-control" name="gambar" >
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="b">Alasan mengapa barang direturn :</label>
					<div class="row">
						<div class="col-md-12">
							<textarea name="alasan_retur" class="form-control cst" rows="4" style="resize:none"></textarea>
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
							<select class="form-control cst" name="bank_asal" required>
								<option <?php echo ($value1['bank_asal'] == '') ? 'selected' : '' ?> value="">-- Pilih Bank --</option>
								<option <?php echo ($value1['bank_asal'] == 'Bank Central Asia ( BCA )') ? 'selected' : '' ?> value="Bank Central Asia ( BCA )">Bank Central Asia ( BCA )</option>
								<option <?php echo ($value1['bank_asal'] == 'Bank Mandiri') ? 'selected' : '' ?> value="Bank Mandiri">Bank Mandiri</option>
								<option <?php echo ($value1['bank_asal'] == 'Bank Nasional Indonesia ( BNI )') ? 'selected' : '' ?> value="Bank Nasional Indonesia ( BNI )">Bank Nasional Indonesia ( BNI )</option>
								<option <?php echo ($value1['bank_asal'] == 'Bank Rakyat Indonesia ( BRI )') ? 'selected' : '' ?> value="Bank Rakyat Indonesia ( BRI )">Bank Rakyat Indonesia ( BRI )</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nama pemilik rekening
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="nama_pemilik_rekening" value="<?php echo $value1['nama_pemilik_rekening'] ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nomor rekening
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="no_rekening" value="<?php echo $value1['no_rekening'] ?>">
						</div>
					</div>
				</div>
				<small class="txt-red">
					Biaya ongkos kirim akan diakumulasi dan dikembalikan bersama dengan total harga barang yang akan direturn.
				</small>
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
								<label class="col-md-1">
									<input class="chk" id="ch_<?php echo $key2 ?>" onchange="rd(<?php echo $key2 ?>)" type="checkbox" name="barang_retur[]">
								</label>
								<div class="col-md-4">
									<img style="margin-bottom:10px;" src="<?php echo base_url.'public/images/'.$value2['gambar'] ?>" width="100%">
								</div>
								<div class="col-md-7">
									<h5 class="txt-red b"><?php echo $value2['nama_barang'] ?></h5>
									<label class="b"><?php echo Lib::ind($value2['harga']) ?></label><br>
									<input onblur="ht(<?php echo $key2 ?>)" id="nm_<?php echo $key2 ?>" disabled type="number" style="width:100px;" class="form-control cst" name="qty_retur[]" value="" placeholder="Jumlah" max="<?php echo $value2['qty'] ?>" min="1">
									<input disabled id="kd_brg_<?php echo $key2 ?>" type="hidden" name="kd_barang[]" value="<?php echo $value2['kode_barang'] ?>">
									<input type="hidden" id="hr_<?php echo $key2 ?>" name="hr[]" value="<?php echo $value2['harga'] ?>">
								</div>
							</div>
						</div>
						<?php
							}}
						?>
					</div>
					<script type="text/javascript">
						function rd(id)
						{
							// alert($('input#ch_'+id+':checked').length);
							if($('input#ch_'+id+':checked').length > 0){
								$('#kd_brg_'+id).attr('disabled', false);
								$('#nm_'+id).attr('disabled', false);
							}else{
								$('#kd_brg_'+id).attr('disabled', true);
								$('#nm_'+id).attr('disabled', true);
								$('#nm_'+id).val('');
							}
						}
						// alert($('.chk').length);

						// var x = [];
						// var total = 0;
						// function ht(id)
						// {
						// 	var qty = parseInt($('#nm_'+id).val());
						// 	var hrg = parseInt($('#hr_'+id).val());
						// 	var hs = qty*hrg;
						// 	// alert(hs);
						// 	x.push(hs);
						// 	console.log(x);
						// 	ht2();
						// }

						// function ht2()
						// {
						// 	$.each(x,function() {
						// 	    total += this;
						// 	});
						// 	$('#dn').text(ind(total));
						// 	// alert(total);
						// }

					</script>
			</div>
			<div class="col-md-12">
				<!-- <hr>
				<h4 class="pull-right">Total dana yang dikembalikan : <b><span id="dn">Rp. 0</span></b></h4>
				<br><br> -->
				<hr>
				<button class="btn btn-cst red"><i class="fa fa-mail-reply-all"></i> Kirim Return Barang</button>
			</div>
		</div>
		</form>
		<?php  }} ?>
	</div>
</div>
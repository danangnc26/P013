<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<?php
		if($data != null){
		foreach ($data as $key => $value) {
		?>
	<div class="col-md-9">
		<h4 class="pull-right">Kode Transaksi : <span class="txt-red"><?php echo $value['kode_beli'] ?></span></h4>
		<h3>Konfirmasi Pembelian</h3>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<p>
					Transaksi ini dicatat dengan kode <label class="txt-red b"><?php echo $value['kode_beli'] ?></label>.
				</p>
				<center>
					<p>Segera lakukan pembayaran sebelum : </p>
					<span id="tgl_cancel" class="red" style="color:#fff; font-size:1.2em; padding:5px;"></span>
					<br><br>
					<p>Lakukan pembayaran sebesar : </p>
					<?php
					$x = explode('.', Lib::ind($value['total_biaya']+$value['kode_unik']));
					$sz = sizeof($x)-1;
					for ($i=0; $i < $sz; $i++) { 
						$d[] = $x[$i];
					}
					?>
					<span style="font-size:1.8em; padding:5px;"><?php echo implode('.', $d) ?>.</span><span class="red" style="color:#fff; font-size:1.8em; padding:5px;"><?php echo end($x) ?></span>
					<br><br>
					<label class="b">Tepat</label> hingga 3 digit terakhir.<br>
					<small>
						<i>Perbedaan nilai transfer akan menghambat proses verifikasi.</i>
					</small>
					<br><br>
					Pembayaran dapat dilakukan ke salah satu rekening berikut.
				</center>
				<div class="row" style="margin-top:20px;">
					<div class="col-xs-6 col-md-3">
						<center>
							<div style="height:60px;">
							<img src="<?php echo base_url.'assets/img/BCA-bank-logo-transparent.png' ?>" width="100%">
							</div>
							<label class="b">Bank BCA, Ambarawa</label><br>
							No. Rekening<br>
							<label class="b">3200419625</label><br>
							a.n. Luppy Shop
						</center>
					</div>
					<div class="col-xs-6 col-md-3">
						<center>
							<div style="height:60px;">
							<img src="<?php echo base_url.'assets/img/Mandiri.png' ?>" width="100%">
							</div>
							<label class="b">Bank Mandiri, Ambarawa</label><br>
							No. Rekening<br>
							<label class="b">023842042042127</label><br>
							a.n. Luppy Shop
						</center>
					</div>
					<div class="col-xs-6 col-md-3">
						<center>
							<div style="height:60px;">
							<img src="<?php echo base_url.'assets/img/800px-BankNegaraIndonesia46-logo.svg.png' ?>" width="100%">
							</div>
							<label class="b">Bank BNI, Ambarawa</label><br>
							No. Rekening<br>
							<label class="b">019239128121243</label><br>
							a.n. Luppy Shop
						</center>
					</div>
					<div class="col-xs-6 col-md-3">
						<center>
							<div style="height:60px;">
							<img src="<?php echo base_url.'assets/img/bank-bri-logo.png' ?>" width="100%">
							</div>
							<label class="b">Bank BRI, Ambarawa</label><br>
							No. Rekening<br>
							<label class="b">051301003984539</label><br>
							a.n. Luppy Shop
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$stop_date = new DateTime($value['tanggal_beli']);
$stop_date->modify('+1 day');
$tgl_cancel = $stop_date->format('Y-m-d');
?>
		<script type="text/javascript">
			var datetime = null,
		        date = null;

			var update = function () {
			    date = moment("<?php echo $tgl_cancel.' '.$value['jam_beli']?>").locale('id');
			    // date = moment(new Date()).locale('id');
			    datetime.html(date.format('dddd, Do MMMM YYYY, HH:mm')+' WIB ( 1 x 24 jam )');
			};

			$(document).ready(function(){
			    datetime = $('span#tgl_cancel')
			    update();
			    setInterval(update, 1000);
			});	
		</script>
<?php }} ?>
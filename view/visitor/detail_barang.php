<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Detail Barang</h3>
		<hr>
		<div class="row">
			<?php
			if($data1 == null){

			}else{
				foreach ($data1 as $key1 => $value1) {
					?>
					<form method="post" action="<?php echo app_base.'add_to_cart' ?>">
					<input type="hidden" name="kode_barang" value="<?php echo $value1['kode_barang'] ?>">
					<input type="hidden" name="type" value="detail">
					<div class="col-md-5">
							<img style="margin-bottom:20px; width:100%;" src="<?php echo base_url.'public/images/'.$value1['gambar'] ?>" alt="Gambar <?php echo $value1['nama_barang'] ?>">
					</div>
					<div class="col-md-7">
						<h4 style="margin-bottom:20px;"><?php echo $value1['nama_barang'] ?></h4>
						<a href="#"><h3 style="margin-bottom:20px;"><?php echo Lib::ind($value1['harga']) ?></h3></a>
						<p style="margin-bottom:5px;">Tersedia <b><i><?php echo $value1['stok'] ?></i></b> stok barang <?php if($value1['tgl_update']!=null){ ?><small class="txt-red pull-right">Diperbaharui pada ( <?php echo Lib::dateInd($value1['tgl_update'], true) ?> )</small><?php } ?></p>
						<p style="margin-bottom:5px;">Ukuran <?php echo $value1['size'] ?></p>
						<p style="margin-bottom:5px;">Berat <?php echo $value1['berat'] ?> gr</p>
						<p>Deskripsi barang: <br><small><?php echo $value1['deskripsi'] ?></small></p>
						<div class="form-group">
						<label>Jumlah Barang : </label>
						<div class="input-group" style="width:140px; margin-bottom:10px;">
							<span class="input-group-btn">
								<button class="btn btn-cst red nm dec" type="button"><i class="fa fa-minus"></i></button>
							</span>
							<input name="qty" type="number" class="form-control cst" value="1">
							<span class="input-group-btn">
								<button class="btn btn-cst red nm inc" type="button"><i class="fa fa-plus"></i></button>
							</span>
						</div>
							<button class="btn btn-cst red nm full"><i class="fa fa-shopping-bag"></i> Beli</button>
						</div><!-- /input-group -->
					</div>
					</form>
					<?php }} ?>
				<!-- </div> -->
					<div class="col-md-12">
						<h3>Barang Lainnya</h3>
						<hr>
						<div class="row">
							<?php
							if($data2 == null){

							}else{
								foreach ($data2 as $key2 => $value2) {
									?>
									<a href="<?php echo app_base.'detail_barang&kode_barang='.$value2['kode_barang'] ?>">
									<div class="col-xs-6 col-md-3">
										<div class="thumbnail">
											<img src="<?php echo base_url.'public/images/'.$value2['gambar'] ?>" alt="Gambar <?php echo $value2['nama_barang'] ?>">
											<div class="caption">
												<h5 class="judul-barang"><?php echo $value2['nama_barang'] ?></h5>
												<div class="input-group">
													<input type="text" class="form-control cst" readonly style="background:#fff" value="<?php echo Lib::ind($value2['harga']) ?>">
													<span class="input-group-btn">
														<button class="btn btn-cst red nm"><i class="fa fa-shopping-bag"></i> Beli</button>
													</span>
												</div><!-- /input-group -->
											</div><!-- /.col-lg-6 -->
										</div>
									</div>
									</a>
									<?php }} ?>
								<!-- </div> -->
						</div>
					</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".input-group-btn").on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    // console.log($button.children().html());
    if ($button.children().html() == '<i class="fa fa-plus"></i>') {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 1;
      }
	  }

    $button.parent().find("input").val(newVal);

  });
</script>
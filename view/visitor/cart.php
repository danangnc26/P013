<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Keranjang Belanja</h3>
		<hr>
		<div class="row">
			<div class="col-md-12" style="margin-top:10px;">
				<!-- <h4 class="pull-right b">Sub Total</h4> -->
				<!-- <h4 class="b">Barang</h4>
				<hr> -->
				<div class="row">
					<div class="col-md-12" >
						<div class="row">
						<?php
						if($data == null){
						?>
						<center>
							<i class="fa fa-shopping-bag" style="font-size:5.7em; margin-bottom:20px;"></i>
							<h4>Keranjang belanja masih kosong.</h4>
						</center>
						<?php
						}else{
						foreach ($data as $key => $value) {
						?>
						<form method="post" action="<?php echo app_base.'add_to_cart' ?>">
						<input type="hidden" name="kode_barang" value="<?php echo $value['kode_barang'] ?>">
						<input type="hidden" name="stok" value="<?php echo $value['stok'] ?>">						
						<input type="hidden" name="type" value="cart">
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-3 col-md-2">
										<img src="<?php echo base_url.'public/images/'.$value['gambar'] ?>" width="100%">
									</div>
									<div class="col-xs-9 col-md-10">
										<a onclick="return confirm('Hapus barang dari keranjang belanja?')" href="<?php echo app_base.'delete_item_from_cart&id_barang_cart='.$value['id_barang_cart'].'&kode_barang='.$value['kode_barang'].'&qty='.$value['qty'] ?>" class="btn red btn-circle pull-right">
											<i class="fa fa-trash" style="font-size:1.4em"></i>
										</a>
										<a class="bl" href="<?php echo app_base.'detail_barang&kode_barang='.$value['kode_barang'] ?>">
										<h5><?php echo $value['nama_barang'] ?></h5>
										</a>
										<a href="#">
											<label class="b"><?php echo Lib::ind($value['harga']) ?></label>
										</a>
										<br>
										<button title="Update Kuantiti" class="btn red btn-circle pull-right"><i class="fa fa-refresh" style="font-size:1.4em"></i></button>	
										<div class="input-group" style="width:140px;">
											<span  class="input-group-btn">
												<button class="btn btn-cst red nm dec" type="button"><i class="fa fa-minus"></i></button>
											</span>
											<input type="number" name="qty" class="form-control cst" value="<?php echo $value['qty'] ?>">
											<span class="input-group-btn">
												<button class="btn btn-cst red nm inc" type="button"><i class="fa fa-plus"></i></button>
											</span>
										</div>
									</div>
								</div>
								<hr style="border:none; border-bottom:1px dashed #ddd; margin-top:10px;">
							</div>
							</form>
							<?php 
							$qty[] = $value['qty'];
							$subtotal[] = $value['qty']*$value['harga'];
							}} ?>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<div class="row">
							<div class="col-md-6">
								<h4>Rangkuman Biaya</h4>
								<hr>
								<table border="0" width="100%" style="margin-bottom:20px;">
									<tr>
										<td style="vertical-align:top; padding-top:10px;">Total jumlah barang</td>
										<td align="right" style="vertical-align:top; padding-top:10px;">
											<?php echo (isset($qty)) ? array_sum($qty) : 0 ?>
										</td>
									</tr>
									<tr>
										<td style="vertical-align:top; padding-top:10px;">Total harga barang</td>
										<td align="right" style="vertical-align:top; padding-top:10px;">
											<?php echo (isset($subtotal)) ? Lib::ind(array_sum($subtotal)) : Lib::ind(0) ?>
										</td>
									</tr>
									<tr>
										<td style="vertical-align:top; padding-top:10px;">Biaya kirim</td>
										<td align="right" style="vertical-align:top; padding-top:10px; width:120px;">
											<small>
												Dapat dikenakan ongkos kirim
											</small>
										</td>
									</tr>
									<tr>
										<td style="vertical-align:top; padding-top:10px;">Subtotal</td>
										<td align="right" style="padding-top:10px;">
											<?php echo (isset($subtotal)) ? Lib::ind(array_sum($subtotal)) : Lib::ind(0) ?>
										</td>
									</tr>
								</table>								
							</div>
							<div class="col-md-6">
								<a href="<?php echo app_base.'checkout' ?>">
									<button <?php echo (empty($data)) ? 'disabled' : '' ?> type="button" class="btn btn-cst red nm pull-right"><i class="fa fa-arrow-right"></i> Checkout</button>
								</a>
								<a  href="<?php echo app_base.'home' ?>">
									<button type="button" class="btn btn-cst red pull-right"><i class="fa fa-arrow-left"></i> Lanjutkan belanja</button>
								</a>
							</div>
						</div>
					</div>
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

	function ubah(key, type){
		if(parseInt($('input[name=qty_'+key+']').val())-1 == 1){
			$('#min').attr('disabled', true);
		}else{
			$('#min').attr('disabled', false);
		}

		if(type == 'plus'){
			var c = parseInt($('input[name=qty_'+key+']').val())+1;	
		}else{
			var c = parseInt($('input[name=qty_'+key+']').val())-1;	
		}
		
		// if()
		// alert(c);
	}
</script>
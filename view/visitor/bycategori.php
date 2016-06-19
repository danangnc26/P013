<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3 style="text-transform:capitalize">Kategori : <?php echo (isset($g['nama_kategori'])) ? $g['nama_kategori'] : '' ?></h3>
		<hr>

		<div class="row">
			<?php
			if($data1 == null){

			}else{
				foreach ($data1 as $key1 => $value1) {
					?>
					<a href="<?php echo app_base.'detail_barang&kode_barang='.$value1['kode_barang'] ?>">
					<div class="col-xs-6 col-md-4">
						<div class="thumbnail">
							<img src="<?php echo base_url.'public/images/'.$value1['gambar'] ?>" alt="Gambar <?php echo $value1['nama_barang'] ?>">
							<div class="caption">
								<h5 class="judul-barang"><?php echo $value1['nama_barang'] ?></h5>
								<div class="input-group">
									<input type="text" class="form-control cst" readonly style="background:#fff" value="<?php echo Lib::ind($value1['harga']) ?>">
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
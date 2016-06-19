<?php
if(!empty($_SESSION) && $_SESSION['level_user'] == 'customer'){
?>
<a href="<?php echo app_base.'cart' ?>">
<div class="cart">
	<i class="fa fa-shopping-bag" style="font-size:1.7em"></i>
	<span style="font-size:1.3em; margin-left:5px;">Cart : </span>
	<?php echo Lib::currentCart()['jumlah_barang'] ?>
	 barang - 
	<?php echo Lib::ind(Lib::currentCart()['total']) ?>, -
</div>
</a>
<hr>
<?php } ?>
<ul class="kategori">
	<?php
	if(Lib::listKategori() == null){

	}else{
	foreach (Lib::listKategori() as $key => $value) {
	?>
	<a href="<?php echo app_base.'kategori&id='.$value['id_kategori'].'&nama_kategori='.strtolower($value['nama_kategori']) ?>">
		<li><?php echo $value['nama_kategori'] ?></li>
	</a>
	<?php }} ?>
	<a href="<?php echo app_base.'kategori&nama_kategori=semua' ?>">
		<li>Semua</li>
	</a>
</ul>
<div class="pull-right">
	<a href="<?php echo app_base.'index_pesanan' ?>">
		<span class="notif-round"><?php echo Lib::pendingNotif() ?></span>
		<i class="fa fa-bell" style="font-size:1.6em;color:#000"></i>
	</a>
</div>
<div class="pull-right">
	<span class="notif-round"><?php echo Lib::returNotif() ?></span>
	<i class="fa fa-mail-reply-all" style="font-size:1.6em"></i>
</div>
<h3>Menu</h3>
<hr>
<ul class="nav nav-pills nav-stacked nav-pills-stacked-example"> 
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'show_welcome' ?>">Home</a>
	</li> 
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_kategori' ?>">Kategori</a>
	</li> 
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_barang' ?>">Barang</a>
	</li> 
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_pesanan' ?>">Daftar Pesanan</a>
	</li> 
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_customer' ?>">Daftar Customer</a>
	</li>
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_retur' ?>">Retur Barang</a>
	</li>
	<li role="presentation" class="active">
		<a href="<?php echo app_base.'index_' ?>">Laporan</a>
	</li>
</ul>
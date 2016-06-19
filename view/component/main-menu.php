<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Menu</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li><a href="<?php echo app_base.'home' ?>">Home</a></li>
			<?php
			if(!empty($_SESSION) && $_SESSION['level_user'] == 'customer'){
			?>
			<li><a href="<?php echo app_base.'trans_history' ?>">Histori Transaksi</a></li>
			<li><a href="<?php echo app_base.'' ?>">Estimasi Biaya Kirim</a></li>
			<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if(empty($_SESSION)){ ?>
			<li><a href="<?php echo app_base.'daftar' ?>">Daftar</a></li>
			<li><a href="<?php echo app_base.'login' ?>">Login</a></li>
			<?php 
			}else{ 
				if($_SESSION['level_user'] == 'admin'){
			?>
				<li><a href="<?php echo app_base.'show_welcome' ?>">Panel Admin</a></li>
			<?php } ?>

				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="<?php echo app_base.'' ?>">Ubah Profil</a></li>
					<li><a href="<?php echo app_base.'ubah_password' ?>">Ubah Password</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo app_base.'logout' ?>">Log Out</a></li>
					</ul>
				</li>
			<?php } ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
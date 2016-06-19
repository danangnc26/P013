<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Ubah Password</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<form method="post" action="<?php echo app_base.'save_password' ?>" >
					  	<div class="row">
					  		<div class="col-md-3">
					  			<label>Password Baru</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="password" class="form-control cst" id="password1" name="password" >
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-3">
					  			<label>Konfirmasi Password Baru</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="password" class="form-control cst" id="password2" name="password2" >
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-3">
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<button class="btn btn-cst red" ><i class="fa fa-save"></i> Simpan</button>
							  		<a href="<?php echo app_base.'home' ?>">
							  			<button type="button" class="btn btn-cst red" ><i class="fa fa-arrow-left"></i> Kembali</button>
							  		</a>
							  	</div>
					  		</div>
					  	</div>
					</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
			$('#password2').change(function(){
				validatePassword();
			});
			
			function validatePassword(){
			var pass2=$("#password2").val();
			var pass1=$("#password1").val();
			if(pass1!=pass2){
				// document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				alert('Password tidak sama, coba lagi.');
			}}
			</script>
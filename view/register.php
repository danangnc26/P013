<div class="login-register" style="top:0px;">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<h3>Form Daftar</h3>
				<hr>
			</div>
			<form method="post" action="<?php echo app_base.'save_daftar' ?>">
				<div class="form-group">
					<label>Username : </label>
					<input type="text" class="form-control cst" name="username" placeholder="Masukkan Username">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="password" class="form-control cst" name="password" id="password1" placeholder="Masukkan Password">
				</div>
				<div class="form-group">
					<label>Konfirmasi Password : </label>
					<input type="password" class="form-control cst" name="password2" id="password2" placeholder="Masukkan Konfirmasi Password">
				</div>
				<div class="form-group">
					<label>Nama : </label>
					<input type="text" class="form-control cst" name="nama" placeholder="Masukkan Nama Lengkap">
				</div>
				<div class="form-group">
					<label>Alamat Email : </label>
					<input type="email" class="form-control cst" name="email" placeholder="Masukkan Email">
				</div>
				<div class="form-group">
					<hr>
				</div>
				<div class="form-group">
					<button class="btn btn-cst red pull-right nm"><i class="fa fa-check"></i> Simpan</button>
				</div>
			</form>
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
				alert('Password tidak sama, silahkan ulangi lagi.');
			}}
		</script>
<div class="login-register">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h3>Log In Form</h3>
								<hr>
							</div>
							<form method="post" action="<?php echo app_base.'authenticate' ?>">
							<div class="form-group">
								<label>Username : </label>
								<input type="text" class="form-control cst" name="username" placeholder="Masukkan Username">
							</div>
							<div class="form-group">
								<label>Password : </label>
								<input type="password" class="form-control cst" name="password" placeholder="Masukkan Password">
							</div>
							<div class="form-group">
								<hr>
							</div>
							<div class="form-group">
								<button class="btn btn-cst red pull-right nm"><i class="fa fa-sign-in"></i> Log In</button>
								<a href="<?php echo app_base.'daftar' ?>">
									<button type="button" class="btn btn-cst orange pull-right"><i class="fa fa-group"></i> Daftar</button>
								</a>
							</div>
							</form>
						</div>
					</div>
				</div>
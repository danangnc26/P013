<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Customer - <small>Index Customer</small></h3>
			<hr>
			<table class="dt">
				<thead>
						<tr>
							<th width="10">No.</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($data == null){
						echo Lib::tblNotFound(6);
					}else{
					foreach ($data as $key => $value) {
					?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['username'] ?></td>
							<td><?php echo $value['nama'] ?></td>
							<td><?php echo $value['email'] ?></td>
							<td align="center" width="100">
								<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_customer&id_user='.$value['id_user'] ?>">
									<i style="font-size:1.8em;" class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
			</table>
		</div>
	</div>
</div>
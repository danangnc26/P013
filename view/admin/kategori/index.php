<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Kategori - <small>Index Kategori</small></h3>
			<hr>

			<a href="<?php echo app_base.'create_kategori' ?>">
				<button class="btn btn-cst red"><i class="fa fa-plus"></i> Tambah Kategori</button>
			</a>

			<table class="dt">
				<thead>
					<tr>
						<th width="10">No.</th>
						<th>Nama Kategori</th>
						<th width="200">Tipe Kategori</th>
						<th width="100">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($data == null){
						echo Lib::tblNotFound(4);
					}else{
					foreach ($data as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['nama_kategori'] ?></td>
						<td><?php echo Lib::lp($value['type']) ?></td>
						<td align="center" width="100">
							<a href="<?php echo app_base.'edit_kategori&id_kategori='.$value['id_kategori'] ?>" title="Edit">
								<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_kategori&id_kategori='.$value['id_kategori'] ?>" title="Hapus">
								<i style="font-size:1.8em" class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
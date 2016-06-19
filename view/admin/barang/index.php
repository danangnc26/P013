<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Barang - <small>Index Barang</small></h3>
			<hr>

			<a href="<?php echo app_base.'create_barang' ?>">
				<button class="btn btn-cst red"><i class="fa fa-plus"></i> Tambah Barang</button>
			</a>

			<table class="dt">
				<thead>
					<tr>
						<th width="10">No.</th>
						<th>Nama Barang</th>
						<th width="80">Berat</th>
						<th width="110">Harga</th>
						<th width="20">Stok</th>
						<th width="20">Publikasi</th>
						<th width="100">Action</th>
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
						<td><?php echo $value['nama_barang'] ?></td>
						<td><?php echo $value['berat'] ?> kg</td>
						<td><?php echo Lib::ind($value['harga']) ?></td>
						<td><?php echo $value['stok'] ?></td>
						<td align="center"><?php echo Lib::publikasi($value['publikasi']) ?></td>
						<td align="center" width="100">
							<a href="<?php echo app_base.'edit_barang&kode_barang='.$value['kode_barang'] ?>" title="Edit">
								<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_barang&kode_barang='.$value['kode_barang'] ?>" title="Hapus">
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
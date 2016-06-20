<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Retur - <small>Index Retur</small></h3>
			<hr>
			<table class="dt">
				<thead>
						<tr>
							<th width="10">No.</th>
							<th>Kode Transaksi</th>
							<th>Barang Yang Diretur</th>
							<th>Total Retur</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($data == null){
						echo Lib::tblNotFound(5);
					}else{
					foreach ($data as $key => $value) {
					?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['kode_beli'] ?></td>
							<td><?php echo Lib::jmlBarangRetur($value['id_retur']) ?> barang</td>
							<td><?php echo Lib::ind($value['total_retur']) ?></td>
							<td align="center" width="100">
								<a href="<?php echo app_base.'detail_retur&kode_beli='.$value['kode_beli'].'&id_retur='.$value['id_retur'] ?>">
									<i style="font-size:1.8em;" class="fa fa-eye"></i>
								</a>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
			</table>
		</div>
	</div>
</div>
<div class="general">
	<div class="row">
		<div class="col-md-3">
			<?php include "view/component/admin-menu.php" ?>
		</div>
		<div class="col-md-9">
			<h3 class="pull-right">Panel Admin</h3>
			<h3>Pesanan - <small>Index Pesanan</small></h3>
			<hr>
			<table class="dt">
				<thead>
						<tr>
							<th>No.</th>
							<th>Kode Transaksi</th>
							<th>Tanggal Transaksi</th>
							<th>Penerima</th>
							<th>Total Pembelian</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($data == null){
						echo Lib::tblNotFound(7);
					}else{
					foreach ($data as $key => $value) {
					?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['kode_beli'] ?></td>
							<td><?php echo Lib::dateInd($value['tanggal_beli'], true).' '.substr($value['jam_beli'], 0,5) ?></td>
							<td><?php echo $value['nama_penerima'] ?></td>
							<td><?php echo Lib::ind($value['total_biaya']) ?></td>
							<td><?php echo Lib::status($value['status']) ?></td>
							<td align="center" width="100">
								<a href="<?php echo app_base.'detail_pesanan&kode_beli='.$value['kode_beli'] ?>">
									<i style="font-size:1.8em; margin-right:20px;" class="fa fa-eye"></i>
								</a>
								<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_pesanan&kode_beli='.$value['kode_beli'] ?>">
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
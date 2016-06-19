<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Histori Transaksi</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<table class="dt resp">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Transaksi</th>
							<th>Tanggal Transaksi</th>
							<th>Penerima</th>
							<th>Total Pembelian</th>
							<th>Status</th>
							<th width="90">Action</th>
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
							<td data-label="No."><?php echo $key+1 ?></td>
							<td data-label="Kode Transaksi"><?php echo $value['kode_beli'] ?></td>
							<td data-label="Tanggal Transaksi"><?php echo Lib::dateInd($value['tanggal_beli'], true).' '.substr($value['jam_beli'], 0,5) ?></td>
							<td data-label="Penerima"><?php echo $value['nama_penerima'] ?></td>
							<td data-label="Total Pembelian"><?php echo Lib::ind($value['total_biaya']) ?></td>
							<td data-label="Status"><?php echo Lib::status($value['status']) ?></td>
							<td style="text-align:center" data-label="">
								<a href="<?php echo app_base.'trans_detail&kode_beli='.$value['kode_beli'] ?>">
									<button type="button" class="btn btn-cst red full"><i class="fa fa-eye"></i> Detail</button>
								</a>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
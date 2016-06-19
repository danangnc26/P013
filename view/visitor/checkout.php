<div class="row">
	<div class="col-md-3">
		<?php include "view/component/sidebar-menu.php" ?>
	</div>
	<div class="col-md-9">
		<h3>Data Pembelian</h3>
		<?php
		if($data1 != null){			
		foreach ($data1 as $key1 => $value1) {
		?>
		<hr style="margin-bottom:20px;">
		<form method="post" action="<?php echo app_base.'send_checkout' ?>">
		<input type="hidden" name="kode_beli" value="<?php echo Lib::currentKodeBeli() ?>">
		<input type="hidden" id="jam_beli" name="jam_beli">
		<div class="row">
			<div class="col-md-7">
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nama Pembeli
						</label>
						<div class="col-md-8">
							<input type="text" readonly class="form-control cst" name="nama_pembeli" value="<?php echo $value1['nama'] ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Email Pembeli
						</label>
						<div class="col-md-8">
							<input type="email" readonly class="form-control cst" name="email_pembeli" value="<?php echo $value1['email'] ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nama Penerima
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="nama_penerima" value="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Nomor Telepon
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="no_telp" value="" pattern="[0-9].{1,}" title="Gunakan Format Angka">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Provinsi
						</label>
						<div class="col-md-8">
							<select id="provinsi" class="form-control cst select2" name="id_provinsi" required>
								<option></option>
							</select>
							<input type="hidden" name="txt_provinsi">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Kota / Kabupaten
						</label>
						<div class="col-md-8">
							<select id="kota" class="form-control cst select2" name="id_kota" required >
								<option></option>
							</select>
							<input type="hidden" name="txt_kota">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Kecamatan
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="kecamatan" value="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Alamat Lengkap
						</label>
						<div class="col-md-8">
							<textarea rows="4" style="resize:none" class="form-control cst" name="alamat_penerima"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Kode Pos
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control cst" name="kode_pos" value="" pattern="[0-9].{1,}" title="Gunakan Format Angka">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Catatan
						</label>
						<div class="col-md-8">
							<textarea rows="4" style="resize:none" class="form-control cst" name="catatan"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">
							Pilihan kurir
						</label>
						<div class="col-md-8">
							<input type="radio" checked name="kurir" value="JNE REG"> Jalur Nugraha Ekakurir (JNE)
							<br><small>
								Kurir & service yang tersedia hanyalah JNE Regular
							</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5" style="margin-bottom:20px;">				
				<h4>Metode Pembayaran</h4>
				<hr>
					<small id="shw_ketentuan" class="pull-right txt-red">Lihat ketentuan <i class="fa  fa-chevron-down"></i></small>
					<small id="hd_ketentuan" class="pull-right txt-red" style="display:none">Sembunyikan ketentuan <i class="fa  fa-chevron-up"></i></small>
				<input type="radio" checked name="metode_pembayaran" value="Transfer"> Transfer
				<div id="ketentuan" style=" display:none">
				<p style="text-align:justify;">
				<small>
					<label class="b">Ketentuan pembayaran dengan transfer: </label>
					<ol style="font-size:14px;padding-left:10px;">
						<li>Transaksi dengan menggunakan metode pembayaran transfer akan ditambahkan kode pembayaran*.</li>
						<li>Pembayaran dengan angka yang tidak tepat menyebabkan proses verifikasi terhambat.</li>
						<li>Total pembayaran transaksi yang harus dibayar beserta kode pembayaran dapat diketahui setelah mengklik tombol LANJUT.</li>
						<li>Transaksi dianggap batal jika dalam 1x24 jam pembayaran belum dilunasi.</li>
					</ol>
					Klik tombol LANJUT jika Anda telah memahami dan menyetujui ketentuan transaksi di atas. LuppyShop akan mengirim tagihan pembayaran ke email anda.
					</small>
				</p>
				</div>
			</div>
			<div class="col-md-5">				
				<h4>Rangkuman Biaya</h4>
				<hr>
				<table border="0" width="100%" style="margin-bottom:20px;">
					<tr>
						<td style="vertical-align:top; padding-top:10px;">Total jumlah barang</td>
						<td align="right" style="vertical-align:top; padding-top:10px;">
							<?php echo Lib::currentCart()['jumlah_barang'] ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top; padding-top:10px;">Total harga barang</td>
						<td align="right" style="vertical-align:top; padding-top:10px;">
							<?php echo Lib::ind(Lib::currentCart()['total']) ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top; padding-top:10px;">Biaya kirim (<span id="kurir"></span>)</td>
						<td align="right" style="vertical-align:top; padding-top:10px; width:120px;">
							<span id="res_ongkir"></span>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top; padding-top:10px;">Kode Unik</td>
						<td align="right" style="vertical-align:top; padding-top:10px; width:120px;">
							<small class="txt-red">Belum termasuk 3 digit kode unik</small>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top; padding-top:10px;">Subtotal</td>
						<td align="right" style="padding-top:10px;">
							<span id="subtotal"></span>
						</td>
					</tr>
				</table>
				<small>* Barang dikirim dari Ambarawa, Kabupaten Semarang.</small>
				<input type="hidden" name="weight" value="<?php echo Lib::getCurrentBeliBerat() ?>">
				<input type="hidden" name="hit_jmlbarang" value="<?php echo Lib::currentCart()['jumlah_barang'] ?>">
				<input type="hidden" name="hit_total" value="<?php echo Lib::currentCart()['total'] ?>">
				<input type="hidden" name="hit_ongkir" value="0">
				<input type="hidden" name="hit_subtotal" value="0">
			</div>
			<div class="col-md-7">
				<div class="row">
					<label class="col-md-4"></label>
					<div class="col-md-8">
						<button class="btn btn-cst red"><i class="fa fa-arrow-right"></i> Lanjut checkout</button>
						<a href="<?php echo app_base.'cart' ?>">
							<button type="button" class="btn btn-cst red"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		</form>
		<?php }} ?>
	</div>
</div>
<script type="text/javascript">
	var datetime = null,
	date = null;

	var update = function () {
		date = moment(new Date()).locale('id');
		datetime.val(date.format('HH:mm:ss'));
	};

	$('#shw_ketentuan').click(function(){
		$('#ketentuan').show();
		$('#hd_ketentuan').show();
		$('#shw_ketentuan').hide();
	});
	$('#hd_ketentuan').click(function(){
		$('#ketentuan').hide();
		$('#hd_ketentuan').hide();
		$('#shw_ketentuan').show();
	});

	$(document).ready(function(){
		// MOMENT
		datetime = $('input#jam_beli')
		update();
		setInterval(update, 1000);


		$('#res_ongkir').text(ind('0'));
		$('#subtotal').text(ind('0'));
		hitung();

		$('input[name=nama_penerima]').val($('input[name=nama_pembeli]').val());
		listProvinsi();

		$('select#provinsi').change(function(){
			listKota($('select#provinsi').val());
			$('input[name=txt_provinsi]').val($('select#provinsi option:selected').text());
		});
		$('select#kota').change(function(){
			kodepos($('select#kota option:selected').attr('kodepos'));
			if($('select#kota').val() != null){
				ongkir($('select#kota').val(), $('input[name=weight]').val());
				
			}
			$('input[name=txt_kota]').val($('select#kota option:selected').text());
		});

		$("select#provinsi").select2({
			placeholder : '-- Pilih Provinsi --',
		});
		
		$("select#kota").select2({
			placeholder : '-- Pilih Kota / Kabupaten --',
		});
		$('select#provinsi').select2("val", null);

		$('span#kurir').text($('input[name=kurir]').val());
	});
	
	function listProvinsi()
	{
		$.getJSON("<?php echo base_url.'function/func.php?func=list_provinsi' ?>", function(json){
			// var json = $.parseJSON(data);
			// console.log(json.rajaongkir.results);
			var tx;
			$.each(json.rajaongkir.results, function( index, value ) {
				tx = '<option value="'+value.province_id+'">'+value.province+'</option>';
			  $('#provinsi').append(tx);
			});
			$('#provinsi').select2("val", null);
		});
	}

	function listKota(id)
	{
		$.getJSON("<?php echo base_url.'function/func.php?func=list_kota&id_provinsi=' ?>"+id, function(json){
			// var json = $.parseJSON(data);
			// console.log(json.rajaongkir.results);
			var tx;
			$('#kota').select2("val", "All");
			$('#kota').empty();
			$('#kota').append('<option></option>');
			$.each(json.rajaongkir.results, function( index, value ) {
				tx = '<option kodepos="'+value.postal_code+'" value="'+value.city_id+'">'+value.type+' '+value.city_name+'</option>';
			  	$('#kota').append(tx);
			});
		});
	}

	function kodepos(id)
	{
		$('input[name=kode_pos]').val(id);
	}

	function ongkir(destination, weight)
	{
		$.getJSON("<?php echo base_url.'function/func.php?func=hitung_ongkir' ?>"+"&destination="+destination+"&weight="+weight, function(data){
			console.log(data.rajaongkir);
			if(data.rajaongkir.results[0].costs.length != 0){
				$('#res_ongkir').text(ind(data.rajaongkir.results[0].costs[1].cost[0].value));
				$('input[name=hit_ongkir]').val(data.rajaongkir.results[0].costs[1].cost[0].value);
				hitung(data.rajaongkir.results[0].costs[1].cost[0].value);
			}else{
				alert('Pengiriman ke '+data.rajaongkir.destination_details.type+' '+data.rajaongkir.destination_details.city_name+' tidak tersedia');
				$('#kota').empty();
				listKota(data.rajaongkir.destination_details.province_id);
			}
		});
	}	

	function hitung(ongk)
	{
		var total = $('input[name=hit_total]').val();
		var ongkir = $('input[name=hit_ongkir]').val();
		// alert(total);
		if(isNaN(ongk) == true){
			$('input[name=hit_subtotal]').val(total);
			$('span#subtotal').empty();
			$('span#subtotal').text(ind(total));
		}else{
			var ht = parseInt(total) + parseInt(ongk);
			$('input[name=hit_subtotal]').val(ht);
			$('span#subtotal').empty();
			$('span#subtotal').text(ind(ht));
		}
	}

</script>
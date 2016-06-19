<?php
class Beli extends Core{

	protected $table 		= 'tbl_beli'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'kode_beli';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function currentCart()
	{
		return $this->findAll("where status=0 and id_user='".$_SESSION['id_user']."'");
	}

	public function createCart()
	{
		$fin = $this->currentCart();
		if($fin == null){
			try {
				$id = Lib::genStr(8);
				$data = [
						'kode_beli' 	=> $id,
						'id_user'		=> $_SESSION['id_user'],
						'tanggal_beli'		=> date("Y-m-d")
						];
				if($this->save($data)){
					$result = $id;
				}else{
					$result = 0;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}else{
			$result = $fin[0]['kode_beli'];
		}
		return $result;
	}

	public function sendCheckout($input)
	{
		try {
			$data = [
					'tanggal_beli'		=> date("Y-m-d"),
					'jam_beli'			=> $input['jam_beli'],
					'nama_penerima'		=> $input['nama_penerima'],
					'no_telp'			=> $input['no_telp'],
					'alamat_penerima'	=> nl2br($input['alamat_penerima']),
					'catatan'			=> nl2br($input['catatan']),
					'total_berat'		=> $input['weight'],
					'ongkir'			=> $input['hit_ongkir'],
					'subtotal'			=> $input['hit_total'],
					'total_biaya'		=> $input['hit_subtotal'],
					'kode_unik'			=> mt_rand(100, 333),
					'kode_pos'			=> $input['kode_pos'],
					'provinsi'			=> $input['id_provinsi'].'|'.$input['txt_provinsi'],
					'kota'				=> $input['id_kota'].'|'.$input['txt_kota'],
					'kecamatan'			=> $input['kecamatan'],
					'status'			=> 1
					];
			if($this->update($data, $this->primaryKey, $input['kode_beli'])){
				Lib::redirect('buy_confirm&kode_beli='.$input['kode_beli']);
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function findDataPembelian($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function historiPembelian()
	{
		return $this->findAll("where id_user='".$_SESSION['id_user']."' and status!=0 order by tanggal_beli desc");
	}

	public function daftarPembelian()
	{
		return $this->findAll("where status!=0 order by tanggal_beli desc");
	}

	public function deletePesanan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_pesanan');
		}else{
			Lib::back();
		}
	}

	public function detailBeli($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function updateStatus($input)
	{
		try {
			$data = ['status' => $input['status']];
			if($input['status'] == '4'){
				$data['resi']	= Lib::genStr(20);
			}
			if($this->update($data, $this->primaryKey, $input['kode_beli'])){
				echo Lib::redirectjs(app_base.'detail_pesanan&kode_beli='.$input['kode_beli'], 'Status Berhasil diubah.');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
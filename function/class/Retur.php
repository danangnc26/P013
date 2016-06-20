<?php
class Retur extends Core{

	protected $table 		= 'tbl_retur'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_retur';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
		$this->barangretur = new ItemRetur();
		$this->beli = new Beli();
	}

	public function index()
	{
		return $this->findAll("where retur_status=0");
	}

	public function findRetur($id)
	{
		return $this->findBy('kode_beli', $id);
	}

	public function sendRetur($input)
	{
		try {
			if(isset($input['qty_retur']) && isset($input['hr'])){
				$v = array_combine($input['hr'], $input['qty_retur']);
				foreach ($v as $k => $v2) {
					$xx[] = $k*$v2;
				}
				if(isset($xx)){
					$xxx = array_sum($xx);
				}else{
					$xxx = 0;
				}
			}


			$data = [
					'kode_beli'				=> $input['kode_beli'],
					'alasan_retur'			=> $input['alasan_retur'],
					'bank_retur'			=> $input['bank_asal'],
					'nama_rekening_retur'	=> $input['nama_pemilik_rekening'],
					'no_rekening_retur'		=> $input['no_rekening'],
					'total_retur'			=> $xxx
					];
					if($_FILES['gambar']['tmp_name'] != ''){
						$data['file_retur'] = Lib::uploadImg($input);
					}
			if($this->save($data)){
				if(isset($input['qty_retur']) && isset($input['kd_barang'])){
					$v = array_combine($input['kd_barang'], $input['qty_retur']);
					$this->barangretur->saveBarangRetur($v);
				}
				$d = ['status' => '9', 'kode_beli' => $input['kode_beli']];
				return $this->beli->updStatCustomer($d);
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function konfirmasiPengembalianDana($g)
	{
		try {
			$data = ['retur_status' => 1];
			if($this->update($data, $this->primaryKey, $g['id_retur'])){
				echo Lib::redirectjs(app_base.'index_retur', 'Dana berhasil dikembalikan.');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
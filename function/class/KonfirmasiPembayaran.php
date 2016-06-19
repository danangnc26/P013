<?php
class KonfirmasiPembayaran extends Core{

	protected $table 		= 'tbl_konfirmasi_pembayaran'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_konfirmasi';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
		$this->beli = new Beli();
	}

	public function saveKonfirmasi($input)
	{
		try {
			$data = [
					'bank_tujuan'		=> $input['bank_tujuan'],
					'bank_asal'			=> $input['bank_asal'],
					'no_rekening'		=> $input['no_rekening'],
					'nama_pemilik_rekening'	=> $input['nama_pemilik'],
					'kode_beli'			=> $input['kode_beli']
					];
			if($this->save($data)){
				$data2 = ['status' => 2];
				if($this->beli->update($data2, 'kode_beli', $input['kode_beli'])){
					Lib::redirect('trans_detail&kode_beli='.$input['kode_beli']);
				}else{
					Lib::back();	
				}
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
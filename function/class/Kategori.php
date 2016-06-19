<?php
class Kategori extends Core{

	protected $table 		= 'tbl_kategori'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_kategori';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll("order by nama_kategori asc");
	}

	public function findKategori($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveKategori($input)
	{
		try {
			$data = [
					'nama_kategori'		=> $input['nama_kategori'],
					'type'				=> $input['type']
					];
			if($this->save($data)){
				Lib::redirect('index_kategori');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateKategori($input)
	{
		try {
			$data = [
					'nama_kategori'		=> $input['nama_kategori'],
					'type'				=> $input['type']
					];
			if($this->update($data, $this->primaryKey, $input['id_kategori'])){
				Lib::redirect('index_kategori');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteKategori($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_kategori');
		}else{
			Lib::back();
		}
	}

}
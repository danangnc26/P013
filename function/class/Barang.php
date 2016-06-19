<?php
class Barang extends Core{

	protected $table 		= 'tbl_barang'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'kode_barang';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll("order by nama_barang asc");
	}

	public function findBarang($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveBarang($input)
	{
		try {
			$data = [
					'kode_barang'		=> strtoupper(Lib::genStr(5)),
					'nama_barang'		=> $input['nama_barang'],
					'deskripsi'			=> nl2br($input['deskripsi']),
					'harga'				=> $input['harga'],
					'stok'				=> $input['stok'],
					'publikasi'			=> $input['publikasi'],
					'berat'				=> $input['berat'],
					'size'				=> $input['size'],
					'warna'				=> $input['warna'],
					'id_kategori'		=> $input['id_kategori'],
					'tgl_post'			=> date("Y-m-d")
					];
					if($_FILES['gambar']['tmp_name'] != ''){
						$data['gambar'] = Lib::uploadImg($input);
					}
			if($this->save($data)){
				Lib::redirect('index_barang');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateBarang($input)
	{
		try {
			$data = [					
					'nama_barang'		=> $input['nama_barang'],
					'deskripsi'			=> nl2br($input['deskripsi']),
					'harga'				=> $input['harga'],
					'stok'				=> $input['stok'],
					'publikasi'			=> $input['publikasi'],
					'berat'				=> $input['berat'],
					'size'				=> $input['size'],
					'warna'				=> $input['warna'],
					'id_kategori'		=> $input['id_kategori'],
					'tgl_update'		=> date("Y-m-d")
					];
					if($_FILES['gambar']['tmp_name'] != ''){
						$data['gambar'] = Lib::uploadImg($input);
					}
			if($this->update($data, $this->primaryKey, $input['kode_barang'])){
				Lib::redirect('index_barang');
			}else{
				Lib::back();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteBarang($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_barang');
		}else{
			Lib::back();
		}
	}

	// 

	public function getPublishedHome()
	{
		return $this->findAll("where publikasi=1 limit 9");
	}

	public function randomBarang()
	{
		return $this->findAll("order by rand() limit 8");
		// return $this->raw("SELECT * FROM ".$this->table." ORDER BY RAND() LIMIT 6");
	}

	public function currentStock($id)
	{
		$result = $this->findBy($this->primaryKey, $id);
		return $result[0]['stok'];
	}

	public function minStock($data)
	{
		if(!isset($data['selisih'])){
			$this->raw_write("UPDATE ".$this->table." SET stok=stok-".$data['qty']." where kode_barang='".$data['kode_barang']."'");
		}else{
			$this->raw_write("UPDATE ".$this->table." SET stok=stok-".$data['selisih']." where kode_barang='".$data['kode_barang']."'");
		}
	}

	public function addStock($data)
	{
		$this->raw_write("UPDATE ".$this->table." SET stok=stok+".$data['selisih']." where kode_barang='".$data['kode_barang']."'");
	}

	public function getByCategory($id = '')
	{
		if(!empty($id)){
			return $this->findBy('id_kategori', $id, "and publikasi=1");
		}else{
			return $this->findAll("where publikasi=1");
		}
	}

}
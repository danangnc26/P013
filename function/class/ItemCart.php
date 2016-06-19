<?php
class ItemCart extends Core{

	protected $table 		= 'tbl_barang_cart'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_barang_cart';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
		$this->beli = new Beli();
		$this->barang = new Barang();
	}

	public function itemOnCart()
	{
		// return $this->findAll("where kode_beli='".$this->beli->createCart()."'");
		return $this->raw("SELECT
							tbl_barang.nama_barang,
							tbl_barang.deskripsi,
							tbl_barang.harga,
							tbl_barang.warna,
							tbl_barang.size,
							tbl_barang.stok,
							tbl_barang.gambar,
							tbl_barang.berat,
							tbl_barang.tgl_update,
							tbl_barang.tgl_post,
							tbl_barang.id_kategori,
							tbl_barang_cart.id_barang_cart,
							tbl_barang_cart.kode_beli,
							tbl_barang_cart.kode_barang,
							tbl_barang_cart.qty,
							tbl_beli.tanggal_beli,
							tbl_beli.id_user,
							tbl_beli.`status`,
							tbl_beli.nama_penerima,
							tbl_beli.no_telp,
							tbl_beli.provinsi,
							tbl_beli.kota,
							tbl_beli.alamat_penerima,
							tbl_beli.catatan,
							tbl_beli.total_berat,
							tbl_beli.total_biaya
							FROM
							tbl_barang_cart
							INNER JOIN tbl_barang ON tbl_barang_cart.kode_barang = tbl_barang.kode_barang
							INNER JOIN tbl_beli ON tbl_barang_cart.kode_beli = tbl_beli.kode_beli where tbl_barang_cart.kode_beli='".$this->beli->createCart()."'
				");
	}

	public function alreadyOnCart($id)
	{
		$result = $this->findAll("where kode_barang='".$id."' and kode_beli='".$this->beli->createCart()."'");
		if($result != null){
			return ['id' => $result[0]['id_barang_cart'], 'qty' => $result[0]['qty']];
		}else{
			return null;
		}
	}

	public function addItemToCart($input)
	{
		try {
			$data = [
					'kode_barang'		=> $input['kode_barang'],
					'kode_beli'			=> $this->beli->createCart(),
					];
			if($this->alreadyOnCart($input['kode_barang']) == null){
				$data['qty']	= $input['qty'];
				if($this->save($data)){
					$d = ['qty' => $input['qty'], 'kode_barang' => $input['kode_barang']];
					$this->barang->minStock($d);
					Lib::redirect('cart');
				}else{
					Lib::back();
				}
			}else{
				$oncrt = $this->alreadyOnCart($input['kode_barang']);
				if($input['qty'] >= 1){
					if(isset($input['type']) && $input['type'] == 'cart'){
						if($oncrt['qty'] < $input['qty']){
							$selisih = $input['qty'] - $oncrt['qty'];
							$data['qty'] = $oncrt['qty']+$selisih;	
						}else{
							$selisih = $oncrt['qty'] - $input['qty'];
							$data['qty'] = $oncrt['qty']-$selisih;
						}
					}else{
						$data['qty']	= $oncrt['qty']+$input['qty'];	
					}
				}else{
					$data['qty']	= $oncrt['qty']+1;
				}
				// echo $selisih;
				// var_dump($data);

					$d = ['qty' => $input['qty'], 'kode_barang' => $input['kode_barang']];
					if(isset($input['type']) && $input['type'] == 'cart'){
							if(isset($selisih)){
								$d['selisih'] = $selisih;
							}
						if($input['qty'] > $oncrt['qty']){
								$this->barang->minStock($d);	
						}else{
								$this->barang->addStock($d);
							// echo $input['qty'].'-';
							// echo $oncrt['qty'];
						}
					}else{
						if($input['qty'] < $oncrt['qty']){
							$this->barang->minStock($d);	
						}
					}

				if($this->update($data, $this->primaryKey, $oncrt['id'])){

					Lib::redirect('cart');
				}else{
					Lib::back();
				}
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function min($d)
	{
		$this->barang->minStock($d);
	}

	public function deleteItemFromCart($data)
	{
		$d = ['selisih' => $data['qty'], 'kode_barang' => $data['kode_barang']];
		$this->barang->addStock($d);
		if($this->delete($this->primaryKey, $data['id_barang_cart'])){
			Lib::redirect('cart');
		}else{
			Lib::back();
		}
	}

	public function barangBeli($id)
	{
		return $this->raw("SELECT
							tbl_barang.nama_barang,
							tbl_barang.deskripsi,
							tbl_barang.harga,
							tbl_barang.warna,
							tbl_barang.size,
							tbl_barang.stok,
							tbl_barang.gambar,
							tbl_barang.publikasi,
							tbl_barang.berat,
							tbl_barang.tgl_update,
							tbl_barang.tgl_post,
							tbl_barang.id_kategori,
							tbl_barang_cart.id_barang_cart,
							tbl_barang_cart.kode_beli,
							tbl_barang_cart.qty,
							tbl_barang.kode_barang
							FROM
							tbl_barang_cart
							INNER JOIN tbl_barang ON tbl_barang_cart.kode_barang = tbl_barang.kode_barang 
							where tbl_barang_cart.kode_beli='".$id."'
							");
	}


}
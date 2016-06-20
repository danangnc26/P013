<?php
class ItemRetur extends Core{

	protected $table 		= 'tbl_barang_retur'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_barang_retur';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function saveBarangRetur($input)
	{

		foreach ($input as $key => $value) {
			$z[] = "('".$key."','".$value."', '".$this->con()->insert_id."')";
		}
		// return implode(',', $z);
		return $this->raw_write("INSERT INTO ".$this->table." (kode_barang, qty, id_retur) VALUES".implode(',', $z)."");
		// try {
		// 	$data
		// } catch (Exception $e) {
		// 	echo $e->getMessage();
		// }
	}

	public function findBarangRetur($id)
	{
		return $this->raw("SELECT
						tbl_barang_retur.id_barang_retur,
						tbl_barang_retur.kode_barang,
						tbl_barang_retur.qty,
						tbl_barang_retur.id_retur,
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
						tbl_barang.id_kategori
						FROM
						tbl_barang_retur
						INNER JOIN tbl_barang ON tbl_barang_retur.kode_barang = tbl_barang.kode_barang where tbl_barang_retur.id_retur='".$id."'
						");
	}

}
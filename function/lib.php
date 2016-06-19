<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'ongkir.php';

Class Lib{

	public static function redirect($loc)
	{
		header('Location:'.app_base.$loc);
	}

	public static function redirectjs($src = '', $msg = '')
	{
		$r 	= '<script>';
		$r .= (!empty($msg)) ? 'alert("'.$msg.'");' : '';
		$r .= 'location.replace("'.$src.'")';
		$r .= '</script>';
		return $r;
	}

	public static function back()
	{
		header("location:javascript://history.go(-1)");
	}

	public static function tblNotFound($jml)
	{
		return "<tr><td align='center' colspan='".$jml."'> -- Data not Found -- </td></tr>";
	}

	public static function ind($str = '')
	{
		return 'Rp. '.number_format($str, 0, ',', '.');	
	}

	public static function dateInd($str = '', $s = false) {
        setlocale (LC_TIME, 'id_ID');
        if($s == true){
        	$date = strftime( "%d-%m-%Y", strtotime($str));
        }else{
        	$dt = explode('-', $str);
        	$date = strftime( "%Y-%m-%d", strtotime($dt[0].'-'.$dt[1].'-'.$dt[2]));
        }

        return $date;
    }

    public static function status($v)
	{
		
		switch ($v) {
			case '-':
				$vf = '<i class="fa fa-close"></i> Pemesanan Dibatalkan';
				break;
			case '0':
				$vf = 'Pemesanan Belum Selesai';
				break;
			case '1':
				$vf = '<i class="fa fa-clock-o"></i> Pending';
				break;
			case '2':
				$vf = '<i class="fa fa-money"></i> Pembayaran Lunas';
				break;
			case '3':
				$vf = '<i class="fa fa-spinner"></i> Sedang Diproses';
				break;
			case '4':
				$vf = '<i class="fa fa-cab"></i> Barang Dikirim';
				break;
			case '5':
				$vf = '<i class="fa fa-check"></i> Selesai';
				break;
			
			default:
				$vf = '';
				break;
		}
		return $vf;
	}

	public static function uploadImg($post)
	{
		if(isset($post) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['gambar']['name'];
			$size = $_FILES['gambar']['size'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$path = "public/images/";
			move_uploaded_file($tmp, $path.$name); //Stores the image in the uploads folder
		}
		return $name;
	}

	public static function lp($opt)
	{
		switch ($opt) {
			case 'L':
				$x = 'Pria';
				break;
			case 'P':
				$x = 'Wanita';
				break;
			
			default:
				$x = '';
				break;
		}
		return $x;
	}

	public static function publikasi($opt)
	{
		switch ($opt) {
			case '1':
				$x = '<a href="#"><i class="fa fa-check"></i></a>';
				break;
			case '0':
				$x = '<a href="#"><i class="fa fa-close"></i></a>';
				break;
			
			default:
				$x = '';
				break;
		}
		return $x;
	}

	public static function dropKategori($opt = '')
	{
		$s[] = '<option value="">-- Pilih Kategori --</option>';
		$j = new Kategori();
		$result =  $j->findAll("order by nama_kategori asc");
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_kategori'] == $opt) ? '<option  selected value="'.$value['id_kategori'].'">'.$value['nama_kategori'].'</option>' : '<option value="'.$value['id_kategori'].'">'.$value['nama_kategori'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function listKategori()
	{
		$j =  new Kategori();
		$result = $j->findAll("order by nama_kategori asc");
		return $result;
	}

	public static function genStr($len){
		// $len = 5;
	    $result = "";
	    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	    $charArray = str_split($chars);
	    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		    $result .= "".$charArray[$randItem];
	    }
	    return strtoupper($result);
	}

	public static function nltxt($str = '')
    {
    	$breaks = array("<br />","<br>","<br/>");  
   		// $text = str_ireplace($breaks, "\r\n", $str);
   		$text = str_ireplace($breaks, "", $str);
   		return $text;
    }

    public static function getCurrentBeliBerat()
    {
    	$j = new ItemCart();
    	$result = $j->itemOnCart();
    	if($result != null){
	    	foreach ($result as $key => $value) {
	    		$d[] = $value['berat']*$value['qty'];
	    	}
	    	return array_sum($d);
    	}else{
    		return 0;
    	}
    }

    public static function currentCart()
    {
    	$j = new ItemCart();
    	$result = $j->itemOnCart();
    	if($result != null){
    		foreach ($result as $key => $value) {
    			$qty[] = $value['qty'];
				$subtotal[] = $value['qty']*$value['harga'];
    		}
    		if(isset($qty) && isset($subtotal)){
    			$d = ['jumlah_barang' => array_sum($qty), 'total' => array_sum($subtotal)];
    		}

    		return $d;
    	}
    }

    public static function currentKodeBeli()
    {
    	$j = new Beli();
    	$result = $j->createCart();
    	if($result != null){
    		return $result;
    	}
    }

}
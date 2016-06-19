<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'ongkir.php';

if(isset($_GET['func'])){
	$func = $_GET['func'];
}else{
	$func = '';
}

switch ($func) {
	case 'check_quota':
		$res_temp = Lib::checkQuota($_GET['date']);
		$res = json_encode($res_temp);
		break;
	case 'generate_event_xml':
		$res = Lib::generateXMLDate();
		break;
	case 'dropdown_sub_event_type':
		$res = Lib::dropdownSubEventType(null, true, $_GET['id_event_type']);
		break;
	case 'list_provinsi':
		$res = Ongkir::getProvList();
		break;
	case 'list_kota':
		$res = Ongkir::getCityList($_GET['id_provinsi']);
		break;
	case 'hitung_ongkir':
		$res = Ongkir::hitungOngkir($_GET['destination'], $_GET['weight']);
		break;
	
	default:
		$res = '';
		break;
}

echo $res;

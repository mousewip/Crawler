<?php 
require 'checkServ.php';
require 'classHocPhan.php';
require 'helper.php';
require 'thongTinSinhVien.php';
require 'gethk.php';
require 'getDiem.php';

class HK
{
	var $name;
	var $list_HocPhan;
	public function __construct($name, $lHP)
	{
		$this->name = $name;
		$this->list_HocPhan = $lHP;
	}
}




$mssv = $_GET["mssv"];
// $mssv = "1451120125";
if(checkServer() == 1)
{
	$url = "http://sv2.ut.edu.vn/XemDiem.aspx?mssv=" .$mssv;
	//echo $url;
	$html = file_get_html($url);
	$allDiem = getDiem($html);
	$allHK = getHK($html);


	$result = array();
	$dem = 0;

	foreach ($allHK as $value) 
	{
		$list_HP = array();
		do
		{
			array_push($list_HP, $allDiem[$dem] );
			$dem++;
		}
		while($dem < count($allDiem) && $allDiem[$dem]->stt != 1);

		$hk = new HK($value, $list_HP);
		array_push($result, $hk);
	}
	echo '<pre>', json_encode($result,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), '</pre>';
}
?>
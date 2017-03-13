<?php 


require 'simple_html_dom.php';

require 'helper.php';
$mssv = "1451120125";
$url = "http://sv2.ut.edu.vn/XemLichHoc.aspx?mssv=" .$mssv;
	//echo $url;
$html = file_get_html($url);

/**
* 
*/
class LichHP
{
	var $maLHP;
	var $monHoc;
	var $tietHoc;
	var $giangVien;
	var $phongHoc;
	var $ngayHoc;
	
	public function __construct($maLHP, $monHoc, $tietHoc, $giangVien, $phongHoc, $ngayHoc)
	{
		$this->maLHP = $maLHP;
		$this->monHoc = $monHoc;
		$this->tietHoc = $tietHoc;
		$this->giangVien = $giangVien;
		$this->phongHoc = $phongHoc;
		$this->ngayHoc = $ngayHoc;
	}
}








$allKQ  = array();
foreach ($html->find('table[class="table-lich_hoc"]') as $ele) 
{
	foreach($ele->find('tr') as $tr)
	{
		$col = array();
			foreach ($tr->find('td') as $td) {
				
				array_push($col, trim(stdName($td->plaintext)));
			}
			
			$tmpMH = preg_split('/\n|\r\n?/', $col[2]);
			$tmpDate = preg_split('/\n|\r\n?/', $col[6]);
			// echo strpos($tmpDate[0], ':'), '</br>';
			$nowdate =  trim(substr($tmpDate[0], 6));
			//echo date_format($nowdate, 'd-m-Y') , '</br>';
			// echo '<pre>', print_r($tmp) , '</pre>';
			// echo $tmp;
			$lhp = new LichHP($col[1], trim($tmpMH[0]), $col[3], $col[4], $col[5], $nowdate);
			array_push($allKQ, $lhp);

		
	}
}

/*$a = "400";
$b = "2";
echo intval($a) / intval($b);*/

 echo '<pre>',  json_encode($allKQ, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),'</pre>';





?>
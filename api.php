<?php 
include('simple_html_dom.php');



function stdName ($astr)
{
	$retval = $astr;
//Xóa dấu cách ở giữa

	$length = strlen($retval);
	for($i=0;$i< $length; $i ++){
		$length = strlen($retval);
		if(substr($retval,$i,1)==' '){
			$flag = $i;
			while(substr($retval,$flag,1)==' ')
				$flag ++;
			$retval = substr($retval,0,$i)." ".ucfirst(substr($retval,$flag,$length)) ;
		}//end if

	}//end for
	//$retval = mb_convert_case($retval,MB_CASE_TITLE,"UTF-8");
	return $retval;
}

/*class SinhVien
{
	var $hoTen;
	var $gioiTinh;
	var $mssv;
	var $nganh;
	var $khoa;
	var $lop;
	var $trangThai;

	public function __construct($hoTen='', $gioiTinh='', $mssv='', $nganh='', $khoa='', $lop='', $trangThai='')
	{
		$this->hoTen = $hoTen;
		$this->gioiTinh = $gioiTinh;
		$this->mssv = $mssv;
		$this->nganh = $nganh;
		$this->khoa = $khoa;
		$this->lop = $lop;
		$this->trangThai = $trangThai;
	}
	public function setHoTen($value)
	{
		$this->hoTen = $value;
	}

	public function setGioiTinh($value)
	{
		$this->gioiTinh=$value;
	}
	public function setMSSV($value)
	{
		$this->mssv=$value;
	}
	public function setNganh($value)
	{
		$this->nganh=$value;
	}
	public function setKhoa($value)
	{
		$this->khoa=$value;
	}
	public function setLop($value)
	{
		$this->lop=$value;
	}
	public function setTrangThai($value)
	{
		$this->trangThai=$value;
	}


}*/





$html = file_get_html('http://sv2.ut.edu.vn/XemDiem.aspx?mssv=1451120125');
//echo $html;

$arrName  = array();

$i = 0;

foreach($html->find('div[class="title-group"]') as $element) 
{
	
	if($i == 0)
	{
		$arrName = split("\n", trim($element->plaintext));
		$i++;
	}
	else
		break;
}

$arrThongTin = array();

foreach($html->find('table[class="none-grid"]') as $e) 
{
	if($i == 1)
		{
			foreach($e->find('td') as $td) 
			{
				array_push($arrThongTin, trim(stdName($td->plaintext)));
			}
			$i++;
		}
	else break;
	
}
array_push($arrThongTin, trim($arrName[1]));


foreach($html->find('span[id="ctl00_ContentPlaceHolder_ucThongTinTotNghiepTinChi1_lblTongTinChi"]') as $e)
{
	array_push($arrThongTin, trim($e->plaintext));
	//echo 'Tổng số tín chỉ: ' ,$e->plaintext, '<br>';
}

foreach($html->find('span[id="ctl00_ContentPlaceHolder_ucThongTinTotNghiepTinChi1_lblTBCTL"]') as $e)
{
	array_push($arrThongTin, trim($e->plaintext));
	//echo 'Trung bình chung tích lũy:' ,$e->plaintext, '<br>';
}


/*echo count(explode(" ", $arrThongTin[0]));
echo '<pre>', print_r(explode("\n", $arrThongTin[0])), '</pre>';*/


//echo '<pre>', print_r($arrThongTin), '</pre>';

echo json_encode($arrThongTin,JSON_UNESCAPED_UNICODE);


?>
<?php 
// chuẩn hóa chuỗi


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

function getStudenInfo()
{
	$arrName  = array();

	$i = 0;
	// find full name
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



	//find all info of student
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

	// find sum of Tín chỉ
	foreach($html->find('span[id="ctl00_ContentPlaceHolder_ucThongTinTotNghiepTinChi1_lblTongTinChi"]') as $e)
	{
		array_push($arrThongTin, trim($e->plaintext));
		//echo 'Tổng số tín chỉ: ' ,$e->plaintext, '<br>';
	}

	// trung binh chung tich luy
	foreach($html->find('span[id="ctl00_ContentPlaceHolder_ucThongTinTotNghiepTinChi1_lblTBCTL"]') as $e)
	{
		array_push($arrThongTin, trim($e->plaintext));
		//echo 'Trung bình chung tích lũy:' ,$e->plaintext, '<br>';
	}


	/*echo count(explode(" ", $arrThongTin[0]));
	echo '<pre>', print_r(explode("\n", $arrThongTin[0])), '</pre>';*/


	//echo '<pre>', print_r($arrThongTin), '</pre>';

	return json_encode($arrThongTin, JSON_PRETTY_PRINT);
}
//echo $html;




?>
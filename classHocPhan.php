<?php 
class HP
{
	var $stt;
	var $maHP;
	var $tenHP;
	var $lopHoc;
	var $soTC;
	var $diemQT;
	var $diemThi;
	var $diem10;
	var $diem4;
	var $diemChu;
	var $xepLoai;
	var $ghiChu;

	function __construct($stt, $maHP, $tenHP, $lopHoc, $tc, $diemQT = "", $diemThi="", $diem10="", $diem4="", $diemChu="", $xepLoai="", $ghiChu="")
	{
		$this->stt=$stt;
		$this->maHP=$maHP;
		$this->tenHP = $tenHP;
		$this->lopHoc = $lopHoc;
		$this->soTC = $tc;
		$this->diemQT = $diemQT;
		$this->diemThi = $diemThi;
		$this->diem10 = $diem10;
		$this->diem4 = $diem4;
		$this->diemChu = $diemChu;
		$this->xepLoai = $xepLoai;
		$this->ghiChu = $ghiChu;
	}

	function __toString()
	{
		return $this->stt ." ".$this->maHP ." ".$this->tenHP;
	}
}

 ?>
<?php 
function getDiem($html)
{
	$allKQ  = array();
	foreach($html->find('table[class="grid grid-color2 tblKetQuaHocTap"]') as $element) 
	{
		foreach($element->find('tr') as $tr)
		{
			$b = array();
			foreach ($tr->find('td') as $value) {
				array_push($b, trim($value->innertext));
			}
			if(count($b) > 2)
			{
				if(count($b) == 14)
				{
			// stt - maHP - tenHP - lopHoc - soTC - QT - Thi - 10 - 4 - chu - xeploai - g.chu
					$temp = new HP($b[0], $b[1], $b[2], $b[3], $b[4],"",$b[7],$b[9],$b[10],$b[11], $b[12], $b[13]);
					array_push($allKQ, $temp);
				}
				else
				{
					$temp = new HP($b[0], $b[1], $b[2], $b[3], $b[4],$b[6],$b[10], $b[12], $b[13],$b[14], $b[15], $b[16]);
					array_push($allKQ, $temp);
				}
			}
		}
	}
	return $allKQ;
}


?>
<?php 
function getHK($html)
{
	$b = array();
	foreach ($html->find('td[colspan=17]') as $value) {
		array_push($b, trim($value->innertext));
	}
	return $b;
}
?>
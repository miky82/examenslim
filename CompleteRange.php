<?php

class CompleteRange
{
var $arrRes;
function build($rango)
{
	$this->arrRes = '';
	$partes = explode(",", substr(substr($rango, 0, -1), 1));
	$strsplit = str_split($enteros);
	$i = reset($partes);
	while ($i <= end($partes)) {
	  $this->arrRes .= $i.', ';
	  $i++;
	}
	$this->arrRes = substr($this->arrRes, 0, -2);
	return '['.$this->arrRes.']';
}
}

$rang = new CompleteRange; 

echo 'entrada : [1, 2, 4, 5] salida : '.$rang->build("[1, 2, 4, 5]").'<br/>' ;
echo 'entrada : [2, 4, 9] salida : '.$rang->build("[2, 4, 9]").'<br/>' ;
echo 'entrada : [55, 58, 60] salida : '.$rang->build("[55, 58, 60]").'<br/>' ;
?>


<?php

class ChangeString
{
var $resultado;
function build($str)
{
	$this->resultado = '';
	$abc = 'abcdefghijklmnñopqrstuvwxyz';
	$strsplit = str_split($str);

	foreach ($strsplit as $key => $value) {
		$valoriginal = $value;
		$value = strtolower($value);

		$pos = strpos($abc, $value);
		// Si no encuentra
		if($pos === false) $this->resultado .= $valoriginal;

		elseif ($pos >= 0) {
			$rest = substr($abc, (($pos+1) > (strlen($abc)-1) ? 0 : ($pos+1)) , 1);
			if(strcmp($value, $valoriginal) !== 0)
			{
				$this->resultado .= strtoupper($rest);
			}
			else{$this->resultado .= $rest;}
		}
		unset($pos);
	}
	return $this->resultado;
}
}

header("Content-Type: text/html; charset=utf-8");
$cambio = new ChangeString; 

echo 'entrada : "123 abcd*3" salida : "'.$cambio->build("123 abcd*3").'"<br/>' ;
echo 'entrada :"**Casa 52" salida : "'.$cambio->build("**Casa 52").'"<br/>' ;
echo 'entrada : "**Casa 52Z" salida : "'.$cambio->build("**Casa 52Z").'"' ;
?>


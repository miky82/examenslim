<?php

class ClearPar
{
var $res;
var $temp;
function build($cadena)
{
	$this->res = '';

	$this->temp = '';
	$a = preg_replace('/[^()]+/', '', $cadena);
	$resultado = str_split($a);
	foreach ($resultado as $key => $value) {
		if($value == '(')
		{
			$this->temp = $value;
		}
		elseif($value == ')' && $this->temp == '(')
		{
			$this->res .= '()';
			$this->temp = '';
		}
	}
	return $this->res;
}
}

$cl = new ClearPar; 

echo 'entrada : "()())()" salida : "'.$cl->build("()())()").'"<br/>' ;
echo 'entrada : "()(()" salida : "'.$cl->build("()(()").'"<br/>' ;
echo 'entrada : ")(" salida : "'.$cl->build(")(").'"<br/>' ;
echo 'entrada : "((()" salida : "'.$cl->build("((()").'"<br/>' ;
?>


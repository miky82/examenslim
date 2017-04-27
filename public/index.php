<?php
if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';
// Activamos las sesiones para el funcionamiento de flash['']
@session_start();
// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
$app = new \Slim\App();
$container = $app->getContainer();

// Register component on container
$container['renderer'] = function ($c) {
    return new Slim\Views\PhpRenderer( __DIR__ . '/../templates/');
};

$app->get('/', function() {
	echo "Pagina de gestión API REST de mi aplicación.";
});

$app->get('/listar', function ($request, $response, $args) {
	$consulta = file_get_contents(__DIR__ . '/../public/employees.json');
	return $this->renderer->render($response,'listar.phtml', array(
	    'resultados' => $consulta
		   ),$args
	);
});

$app->post('/buscarlistar', function ($request, $response, $args) use ($app) {
	$entity = $request->getParsedBody();

	$consulta = file_get_contents(__DIR__ . '/../public/employees.json');
	$arrayemp = json_decode($consulta,true);
	$res = '';

	if (strlen($entity['txtEmail']) == 0) {
		$res = $consulta;
	}
	else
	{
		foreach ($arrayemp as $key => $value) {
			if ( $value['email'] == $entity['txtEmail'] ) {
	        	$res = json_encode(array($arrayemp[$key]));
	        	break;
	    	}
	    	else
	    	{
	    		$res = 'No hay datos encontrados';
	    	}
		}
	}
	return $this->renderer->render($response,'listar.phtml', array(
	    'resultados' => $res
		   )
	);
});



$app->get('/ver/[{id}]', function ($request, $response, $args) use ($app) {
	$id = $args['id'];

	$consulta = file_get_contents(__DIR__ . '/../public/employees.json');
	$arrayemp = json_decode($consulta,true);
	$res = '';

	if (strlen($id) > 0)
	{
		foreach ($arrayemp as $key => $value) {
			if ( $value['id'] == $id ) {
	        	$res = json_encode(array($arrayemp[$key]));
	        	break;
	    	}
	    	else
	    	{
	    		$res = 'No existe este empleado';
	    	}
		}
	}
	return $this->renderer->render($response,'ver.phtml', array(
	    'resultados' => $res
		   )
	);
});

$app->get('/salariows', function () use ($app) {
	require __DIR__ . '/../lib/nusoap.php';
	$miURL = 'http://localhost:81/developere/public/salariows';
	$server = new soap_server();
	$server->configureWSDL('Servicio Web', $miURL);
	$server->wsdl->schemaTargetNamespace = $miURL;
	
	$server->register('mostrar_empleados', // Nombre de la funcion
				   array('salmin' => 'xsd:string','salmax' => 'xsd:string'), // Parametros de entrada
                   array('return' => 'xsd:string'), // Parametros de salida
               	   $miURL); 

	function mostrar_empleados($salmin,$salmax){
		$res="";
		$xml = new SimpleXMLElement('<empleados/>');

		$sql = file_get_contents(__DIR__ . '/../public/employees.json');
		$obj = json_decode($sql,true);

		foreach ($obj as $key => $value) {
			//$value = substr($value, 1);
			$salario = str_replace(",", "", substr($value['salary'], 1));
			$floatsalario = floatval($salario);

			if ( $floatsalario >= $salmin && $floatsalario <= $salmax) {
	        	$res = json_encode(array($obj[$key]));
	    	}
	    	else
	    	{
	    		$res = 'No hay datos';
	    	}
		}
		return new soapval('return', 'xsd:string',$res);
	}
		
	$server->service($HTTP_RAW_POST_DATA);

});

$app->run();
?>
<?php
// Routes
/*
$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/
$app->get('/', function() {
	echo "Pagina de gestión API REST de mi aplicación.";
});
/*
$app->get('/listar', function ($request, $response,$args){
	//$json_emp = json_decode($employees, true);
	$employees = file_get_contents(__DIR__ . '/../public/employees.json');
	//print_r($args);exit(0);
	print_r($employees);exit(0);
    //$args['data']=$employees;
	//$response['Content-Type'] = 'application/json';
    //$response->body(json_encode($employees));
    //$app->response->setStatus(200);
   // $app->response()->headers->set('Content-Type', 'application/json');   

	return $this->renderer->render($response, 'listar.phtml', $args);
});*/
/*
$app->get('/listar', function ($request, $response, $args) {
	
	// Va a devolver un objeto JSON con los datos de usuarios.
	// Preparamos la consulta a la tabla.
	$consulta = file_get_contents(__DIR__ . '/../public/employees.json');

	// Desde dentro de la vista accederemos directamente a $resultados para gestionar su contenido.
	return $this->renderer->render($response,'listar.phtml', array(
	    'resultados' => $consulta
		   )
	);
});*/
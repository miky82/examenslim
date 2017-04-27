<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);


// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';



$app->get('/listar', function() {
	// Va a devolver un objeto JSON con los datos de usuarios.
	// Preparamos la consulta a la tabla.
	$consulta = file_get_contents(__DIR__ . '/../public/employees.json');
	// Desde dentro de la vista accederemos directamente a $resultados para gestionar su contenido.

	echo $consulta;exit(0);
	$app->render('listar.phtml', array(
	    'resultados' => $consulta
		   )
	);
});

// Run app
$app->run();

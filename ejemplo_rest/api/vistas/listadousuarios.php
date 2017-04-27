<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<title>Listado de Usuarios</title>
	</head>
    <body>
        <h2>Listado de usuarios</h2>
        <ul>
            <?php
		  // Aquí recibimos la variable $resultados
		  // Que es un array de una posición que contiene en dicha posición otro array con todas las filas
            foreach ($resultados as $clave => $valor) {
                echo '<li>' . $valor['idusuario'] . ' -- ' . $valor['apellidos'] . '</li>';
            }
            ?>
        </ul>
    </body>
</html>
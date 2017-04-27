<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<title>Alta de usuarios en la aplicación</title>
	</head>	
	<body>
		<div class="container">
			<form action="" method="POST" role="form" style="margin:0 auto;max-width:600px;padding:15px;">
				<legend>Alta de Usuarios</legend>
				<?php if (isset($flash['error'])): ?>
					<span class="label label-danger"><?php echo $flash['error'] ?></span>
				<?php endif; ?>

				<div class="form-group">
					<label for="idusuario">ID Usuario</label>
					<input type="text" class="form-control" id="idusuario" name="idusuario" placeholder="Introduzca id Usuario">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
					<label for="apellidos">Apellidos</label>
					<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca apellidos">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Introduzca e-mail">
				</div>

				<div class="form-group" style="height:20px;">
					<?php if (isset($flash['message'])): ?>
						<span class="label label-success"><?php echo $flash['message'] ?></span>
					<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</body>
</html>
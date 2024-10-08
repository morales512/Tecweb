<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
	// Verifica si se recibe el parámetro 'tope' por URL
	if(isset($_GET['tope']))
		$tope = intval($_GET['tope']); // Asegura que sea un entero

	// Si se recibió el parámetro 'tope'
	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '202131603_Jp', 'marketzone');	

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
		}

		/** Consultar productos con unidades <= tope */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= {$tope}") ) 
		{
			/** Almacenar resultados en un array */
			$productos = $result->fetch_all(MYSQLI_ASSOC);
			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTOS CON UNIDADES MENORES O IGUALES A <?= htmlspecialchars($tope) ?></h3>
		<br/>
		
		<?php if( isset($productos) && count($productos) > 0 ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Modificar</th> <!-- Nueva columna para modificar -->
					</tr>
				</thead>
				<tbody>
					<?php foreach($productos as $producto) : ?>
					<tr>
						<th scope="row"><?= $producto['id'] ?></th>
						<td><?= $producto['nombre'] ?></td>
						<td><?= $producto['marca'] ?></td>
						<td><?= $producto['modelo'] ?></td>
						<td><?= $producto['precio'] ?></td>
						<td><?= $producto['unidades'] ?></td>
						<td><?= htmlspecialchars($producto['detalles'], ENT_QUOTES, 'UTF-8') ?></td>
						<td><img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto"></td>
						<td>
							<a href="formulario_productos_v2.php?id=<?= $producto['id'] ?>" class="btn btn-warning btn-sm">Modificar</a> <!-- Botón de modificar -->
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		<?php elseif(!empty($tope)) : ?>

			<p>No hay productos con unidades menores o iguales a <?= htmlspecialchars($tope) ?>.</p>

		<?php endif; ?>
	</body>
</html>

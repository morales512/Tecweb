<?php
    //header("Content-Type: application/json; charset=utf-8"); 
    $data = array();

	if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '202131603_Jp', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		// Solo mostrar productos con unidades <= tope y eliminado = 0
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado = 0") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = utf8_encode($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
        //echo json_encode($data, JSON_PRETTY_PRINT);
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>
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
					</tr>
				</thead>
				<tbody>
					<?php foreach($row as $value) : ?>
					<tr>
						<th scope="row"><?= $value['id'] ?></th>
						<td><?= $value['nombre'] ?></td>
						<td><?= $value['marca'] ?></td>
						<td><?= $value['modelo'] ?></td>
						<td><?= $value['precio'] ?></td>
						<td><?= $value['unidades'] ?></td>
						<td><?= $value['detalles'] ?></td>
						<td><img src=<?= $value['imagen'] ?> ></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php elseif(!empty($id)) : ?>

			 <script>
                alert('El ID del producto no existe');
             </script>

		<?php endif; ?>
	</body>
</html>
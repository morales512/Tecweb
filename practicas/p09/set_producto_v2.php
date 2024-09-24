<?php
// Conexión a la base de datos
@$link = new mysqli('localhost', 'root', '202131603_Jp', 'marketzone');	

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

// Capturar datos del formulario
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];

// Verificar si ya existe un producto con el mismo nombre, marca y modelo
$sql_verificar = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
$resultado = $link->query($sql_verificar);

if ($resultado->num_rows > 0) {
    echo 'Error: El producto con este nombre, marca y modelo ya existe en la base de datos.';
} else {
    // Insertar el producto si no existe ya en la base de datos
    //SE AÑADE LA VERIFICACION DE LA COLUMNA ELIMINADO
    $sql_insertar = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}')";    
    if ($link->query($sql_insertar)) {
        echo 'Producto insertado con éxito:<br/>';
        echo 'Nombre: ' . $nombre . '<br/>';
        echo 'Marca: ' . $marca . '<br/>';
        echo 'Modelo: ' . $modelo . '<br/>';
        echo 'Precio: ' . $precio . '<br/>';
        echo 'Detalles: ' . zdetalles . '<br/>';
        echo 'Unidades: ' . $unidades . '<br/>';
        echo 'Imagen: ' . $imagen . '<br/>';
    } else {
        echo 'Error al insertar el producto: ' . $link->error;
    }
}

$link->close();
?>

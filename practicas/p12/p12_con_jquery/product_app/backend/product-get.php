<?php
include_once __DIR__.'/database.php';

$data = array('status' => 'error', 'message' => 'Producto no encontrado');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = {$id} AND eliminado = 0";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        $data = $producto;  // Devuelve los datos del producto
    }
    $result->free();
}

$conexion->close();
echo json_encode($data, JSON_PRETTY_PRINT);
?>

<?php
include_once __DIR__.'/database.php';

// Leer el cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

$response = array('status' => 'error', 'message' => 'Error al actualizar el producto');

if (isset($data['id']) && isset($data['producto'])) {
    $id = $data['id'];
    $producto = $data['producto'];
    
    $sql = "UPDATE productos SET 
        nombre = '{$producto['nombre']}', 
        marca = '{$producto['marca']}', 
        modelo = '{$producto['modelo']}', 
        precio = {$producto['precio']}, 
        detalles = '{$producto['detalles']}', 
        unidades = {$producto['unidades']}, 
        imagen = '{$producto['imagen']}' 
        WHERE id = {$id}";
    
    if ($conexion->query($sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Producto actualizado correctamente';
    } else {
        $response['message'] = 'Error en la consulta: '.mysqli_error($conexion);
    }
}

$conexion->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>

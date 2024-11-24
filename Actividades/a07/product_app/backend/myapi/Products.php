<?php
namespace MyApi;

require_once 'database.php';

class Products extends DataBase {
    protected $response;

    public function __construct($dbName = 'marketzone', $host = 'localhost', $user = 'root', $password = '202131603_Jp') {
        parent::__construct($host, $user, $password, $dbName);
        $this->response = array('status' => 'error', 'message' => 'Operación no realizada');
    }

    // Implementamos el método query de la clase DataBase
    public function query($sql) {
        return $this->conexion->query($sql);
    }

    public function addProduct($data) {
        $sql = "SELECT * FROM productos WHERE nombre = '{$data['nombre']}' AND eliminado = 0";
        $result = $this->query($sql);  // Usamos el método query que hemos implementado

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO productos VALUES (null, '{$data['nombre']}', '{$data['marca']}', '{$data['modelo']}', {$data['precio']}, '{$data['detalles']}', {$data['unidades']}, '{$data['imagen']}', 0)";
            if ($this->query($sql)) {  // Usamos el método query para insertar el producto
                $this->response = array('status' => 'success', 'message' => 'Producto agregado');
            } else {
                $this->response['message'] = 'Error en la inserción: ' . $this->conexion->error;
            }
        } else {
            $this->response['message'] = 'Ya existe un producto con ese nombre';
        }
    }

    public function deleteProduct($id) {
        $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
        if ($this->query($sql)) {  // Usamos el método query para eliminar el producto
            $this->response = array('status' => 'success', 'message' => 'Producto eliminado');
        } else {
            $this->response['message'] = 'Error al eliminar: ' . $this->conexion->error;
        }
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM productos WHERE id = {$id} AND eliminado = 0";
        $result = $this->query($sql);  // Usamos el método query

        if ($result && $result->num_rows > 0) {
            $this->response = $result->fetch_assoc();
        } else {
            $this->response = array('status' => 'error', 'message' => 'Producto no encontrado');
        }
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->query($sql);  // Usamos el método query

        if ($result) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->response['message'] = 'Error al obtener productos: ' . $this->conexion->error;
        }
    }

    public function searchProducts($search) {
        $sql = "SELECT * FROM productos WHERE (nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        $result = $this->query($sql);  // Usamos el método query

        if ($result) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->response['message'] = 'Error en la búsqueda: ' . $this->conexion->error;
        }
    }

    public function updateProduct($id, $data) {
        if (strlen($data['detalles']) > 250) {
            $this->response['message'] = 'Los detalles deben tener 250 caracteres o menos.';
            return;
        }

        if ($data['precio'] < 99) {
            $this->response['message'] = 'El precio debe ser mayor o igual a 99.';
            return;
        }

        $sql = "UPDATE productos SET 
            nombre = '{$data['nombre']}', 
            marca = '{$data['marca']}', 
            modelo = '{$data['modelo']}', 
            precio = {$data['precio']}, 
            detalles = '{$data['detalles']}', 
            unidades = {$data['unidades']}, 
            imagen = '{$data['imagen']}' 
            WHERE id = {$id}";

        if ($this->query($sql)) {  // Usamos el método query para actualizar el producto
            $this->response = array('status' => 'success', 'message' => 'Producto actualizado correctamente');
        } else {
            $this->response['message'] = 'Error en la actualización: ' . $this->conexion->error;
        }
    }

    public function getData() {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>

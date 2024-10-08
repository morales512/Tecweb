<?php
// Conectar a la base de datos
$link = new mysqli('localhost', 'root', '202131603_Jp', 'marketzone');

// Verificar si se recibe un ID para modificar el producto
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Consulta para obtener los detalles del producto
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = $link->query($query);

    if ($result && $result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        echo "<p>No se encontró el producto con ID $id.</p>";
    }
    $link->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <script>
        function validarFormulario() {
            var nombre = document.getElementById('nombre').value;
            if (nombre === "" || nombre.length > 100) {
                alert("El nombre del producto es requerido y debe tener 100 caracteres o menos.");
                return false;
            }

            var marca = document.getElementById('marca').value;
            if (marca === "") {
                alert("La marca es requerida.");
                return false;
            }

            var modelo = document.getElementById('modelo').value;
            var modeloRegex = /^[a-zA-Z0-9]+$/;
            if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 50) {
                alert("El modelo es requerido, debe ser alfanumérico y tener 50 caracteres o menos.");
                return false;
            }

            var precio = parseFloat(document.getElementById('precio').value);
            if (isNaN(precio) || precio <= 99.99) {
                alert("El precio es requerido y debe ser mayor a 99.99.");
                return false;
            }

            var detalles = document.getElementById('detalles').value;
            if (detalles.length > 250) {
                alert("Los detalles deben tener 250 caracteres o menos.");
                return false;
            }

            var unidades = parseInt(document.getElementById('unidades').value);
            if (isNaN(unidades) || unidades < 0) {
                alert("Las unidades son requeridas y deben ser mayor o igual a 0.");
                return false;
            }

            var imagen = document.getElementById('imagen').value;
            if (imagen === "") {
                document.getElementById('imagen').value = "img/imagen.png";  // Ruta por defecto
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Modificar Producto</h1>
    <form action="update_producto.php" method="POST" onsubmit="return validarFormulario()">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>" /> <!-- Se envía el ID del producto -->

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" required><br><br>

        <label for="marca">Marca:</label>
        <select id="marca" name="marca" required>
            <option value="Nike" <?= $producto['marca'] == 'Nike' ? 'selected' : '' ?>>Nike</option>
            <option value="Adidas" <?= $producto['marca'] == 'Adidas' ? 'selected' : '' ?>>Adidas</option>
            <option value="Converse" <?= $producto['marca'] == 'Converse' ? 'selected' : '' ?>>Converse</option>
            <option value="Puma" <?= $producto['marca'] == 'Puma' ? 'selected' : '' ?>>Puma</option>
            <option value="Vans" <?= $producto['marca'] == 'Vans' ? 'selected' : '' ?>>Vans</option>
            <option value="Under Armou" <?= $producto['marca'] == 'Under Armou' ? 'selected' : '' ?>>Under Armour</option>
            <option value="Skechers" <?= $producto['marca'] == 'Skechers' ? 'selected' : '' ?>>Skechers</option>
            <option value="FILA" <?= $producto['marca'] == 'FILA' ? 'selected' : '' ?>>FILA</option>
            <option value="Lacoste" <?= $producto['marca'] == 'Marca9' ? 'selected' : '' ?>>Lacoste</option>
            <option value="New Balance" <?= $producto['marca'] == 'Marca10' ? 'selected' : '' ?>>New Balance</option>
        </select><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= $producto['modelo'] ?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?= $producto['precio'] ?>" required><br><br>

        <label for="detalles">Detalles:</label>
        <textarea id="detalles" name="detalles"><?= $producto['detalles'] ?></textarea><br><br>

        <label for="unidades">Unidades disponibles:</label>
        <input type="number" id="unidades" name="unidades" value="<?= $producto['unidades'] ?>" required><br><br>

        <label for="imagen">Imagen (ruta):</label>
        <input type="text" id="imagen" name="imagen" value="<?= $producto['imagen'] ?>"><br><br>

        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>

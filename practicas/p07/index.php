<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>

<form action="http://localhost/tecweb/practicas/p07/index.php" method="get">
    Otro número: <input type="text" name="number1"><br>
    <input type="submit" value="Comprobar">
</form>


<?php
include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; 

if (isset($_GET['number1'])) {
    $num = $_GET['number1'];
    $numero_correcto = gen_multiploaletorio($num);
    echo "<pre>";
    print_r($numero_correcto);
    echo "</pre>";
}
?>
    <h2>Ejercicio 2</h2>
    <p>Generar secuencia de números aleatorios hasta obtener una secuencia impar, par, impar</p>
    <form method="post" action="index.php">
        <input type="submit" name="generar" value="Generar matriz">
    </form>

    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; // Incluir archivo de funciones

    // Mostrar la matriz solo si se ha hecho un submit
    if (isset($_POST['generar'])) {
        // Llamar a la función para generar la secuencia
        $resultados = generarSecuencia();
        
        echo "<h3>Resultados:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Número 1</th><th>Número 2</th><th>Número 3</th></tr>";
        
        // Mostrar la matriz de números aleatorios
        foreach ($resultados['matriz'] as $fila) {
            echo "<tr>";
            foreach ($fila as $num) {
                echo "<td>$num</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Mostrar número de iteraciones y total de números generados
        echo "<p>{$resultados['totalNumeros']} números obtenidos en {$resultados['iteraciones']} iteraciones.</p>";
    }
    ?>



</body>
</html>
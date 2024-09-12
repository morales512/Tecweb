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
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; 


    if (isset($_POST['generar'])) {
        $resultados = generarSecuencia();
        
        echo "<h3>Resultados:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Número 1</th><th>Número 2</th><th>Número 3</th></tr>";

        foreach ($resultados['matriz'] as $fila) {
            echo "<tr>";
            foreach ($fila as $num) {
                echo "<td>$num</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<p>{$resultados['totalNumeros']} números obtenidos en {$resultados['iteraciones']} iteraciones.</p>";
    }
    ?>

<h2>Ejercicio 3</h2>
    <p>Encontrar el primer número aleatorio que sea múltiplo de un número dado</p>

    <!-- Formulario para enviar el número dado vía GET -->
    <form method="get" action="index.php">
        <label for="numero">Introduce un número:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Encontrar múltiplo (while)">
    </form>

    <!-- Variante con do-while -->
    <form method="get" action="index.php">
        <input type="hidden" name="dowhile" value="1">
        <label for="numero">Introduce un número:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Encontrar múltiplo (do-while)">
    </form>

    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; // Incluir archivo de funciones

    // Comprobar si se ha enviado un número vía GET
    if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
        $numeroDado = intval($_GET['numero']);

        // Opción para ciclo do-while
        if (isset($_GET['dowhile'])) {
            // Llamar a la función que utiliza do-while
            echo "<h3>Resultado usando do-while:</h3>";
            $numeroAleatorio = encontrarMultiploDoWhile($numeroDado);
            echo "<p>El primer número aleatorio que es múltiplo de {$numeroDado} es: {$numeroAleatorio}</p>";
        } else {
            // Llamar a la función que utiliza while
            echo "<h3>Resultado usando while:</h3>";
            $numeroAleatorio = encontrarMultiploWhile($numeroDado);
            echo "<p>El primer número aleatorio que es múltiplo de {$numeroDado} es: {$numeroAleatorio}</p>";
        }
    }
    ?>




</body>
</html>
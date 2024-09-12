<?php
function gen_multiploaletorio($num) {
    if ($num % 5 == 0 && $num % 7 == 0) {
        return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}



function generarSecuencia() {
    $matriz = [];
    $iteraciones = 0;
    $totalNumeros = 0;
    do {
        $fila = [];
        $fila[] = rand(1, 999); 
        $fila[] = rand(1, 999);
        $fila[] = rand(1, 999); 

        $matriz[] = $fila;
        $iteraciones++;
        $totalNumeros += 3;

        // Verificar si la secuencia es impar, par, impar
        $esSecuenciaValida = ($fila[0] % 2 != 0) && ($fila[1] % 2 == 0) && ($fila[2] % 2 != 0);
    } while (!$esSecuenciaValida);

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumeros' => $totalNumeros
    ];
}


function encontrarMultiploWhile($numeroDado) {
    $numeroAleatorio = rand(1, 999);
    while ($numeroAleatorio % $numeroDado !== 0) {
        $numeroAleatorio = rand(1, 999);
    }
    return $numeroAleatorio;
}

function encontrarMultiploDoWhile($numeroDado) {
    $numeroAleatorio = 0;
    do {
        $numeroAleatorio = rand(1, 999);
    } while ($numeroAleatorio % $numeroDado !== 0);
    return $numeroAleatorio;
}


?>

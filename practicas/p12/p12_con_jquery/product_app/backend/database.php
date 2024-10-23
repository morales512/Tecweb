<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '202131603_Jp',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>
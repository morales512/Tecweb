<?php
namespace MyApi;

abstract class DataBase {
    protected $conexion;

    public function __construct($host = 'localhost', $user = 'root', $password = '202131603_Jp', $db = 'marketzone') {
        $this->conexion = @mysqli_connect($host, $user, $password, $db);

        if (!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }

    abstract protected function query($sql);
}
?>

<?php

require_once("parametros.php");

class Conexion {
    
    private $conexion;
    
    public function __construct() {
    }
    
    public function __abrir_conexion() {
        $this->conexion = mysqli_connect(HOST, SUPERUSUARIO, CONTRASENA, BASEDATOS);
        
        if($this->conexion) {
            return $this->conexion;
        } else {
            return false;
        }
    }
    
    public function __cerrar_conexion() {
        mysqli_close($this->conexion);
    }
}
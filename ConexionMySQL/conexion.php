<?php
class Conexion {
public $conexion;
    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=localhost; dbname=inventario", "root", "");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    

   
}

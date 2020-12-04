<?php
include "conexion.php";
include "producto.php";

$p = new Producto();

    $cantidadP=$_POST["cant"];
 

    $parametros=array();

       for($i=0; $i< $cantidadP; $i++){
         $parametros["p".$i] =$_POST["p".$i];
       }
   
 
     if($cantidadP==6){

      $p->insertar($parametros);
 
      }
      else if($cantidadP==7){
  	$p ->actualizar($parametros);
      }else if($cantidadP==1){
        $p->eliminar($parametros);
      }else{
        $p ->consultar();
      }
     




?>
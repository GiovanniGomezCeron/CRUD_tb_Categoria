<?php
include "conexion.php";
include "categoria.php";

$cat=new Categoria();

 
    $cantidadP=$_POST["cant"];

 $parametros=array();

       for($i=0; $i< $cantidadP; $i++){
         $parametros["p".$i] =$_POST["p".$i];
       }
   
 
     if($cantidadP==2){

      $cat->insertar($parametros);
 
      }
     else if($cantidadP==3){
  
   	$cat ->actualizar($parametros);

     }else if($cantidadP==1){

       $cat->eliminar($parametros);

     }else{

       $cat ->consultar();

     }

?>
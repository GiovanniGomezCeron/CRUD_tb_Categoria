<?php
include "user.php";
include "conexion.php";
include "categoria.php";

$usuario = new Usuarios();

   $cantP = $_POST["cant"];
        $parametros=array();

       for($i=0; $i< $cantP; $i++){
         $parametros[$i] =$_POST["p".$i];
       }
	
	if($cantP==2){
           $p1 = $_POST["p0"];
           $p2 = $_POST["p1"];
           $usuario ->login($p1,$p2);
		
         }else if($cantP==6){
	   $usuario -> update($parametros);
	 }
          else{
		$usuario ->select();
         }
    
 








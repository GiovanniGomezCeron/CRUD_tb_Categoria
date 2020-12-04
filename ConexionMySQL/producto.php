<?php
class Producto{
    private $cxn;
    
    public function __construct(){
	include "json_encode.php";
        $this -> cxn =new Conexion();
    }
    //id, nombre, stock, precio, estado, fecha, categoria, desc
    public function insertar($values){
       $this ->cxn ->conexion ->query("insert into tb_producto values (0,'".$values["p0"]."',".$values["p1"].",".$values["p2"].",".$values["p3"].",current_timestamp(),".$values["p4"].",'".$values["p5"]."')");
        
    }
    
    public function actualizar($values){
        $this -> cxn ->conexion ->query("update tb_producto set nom_producto = '".$values["p0"]."' ,stock =".$values["p1"].", precio = ".$values["p2"].", estado = ".$values["p3"].", categoria = ".$values["p4"].", descripcion ='".$values["p5"]."' where id_producto =".$values["p6"]);
        
    }
    public function eliminar($where){
        $this -> cxn ->conexion -> query("delete from tb_producto where id_producto=".$where["p0"]);
        
    }
    
    public function consultar(){
	$encode = new Json_encode();
    $resul=$this -> cxn ->conexion ->query("select p.id_producto,p.nom_producto,p.precio, c.nom_categoria,p.estado , p.descripcion,p.stock from tb_producto as p inner join tb_categoria as c on p.categoria = c.id_categoria");
	$resul2=$resul -> fetchAll();
 	
         $datos = array();
	
         $a = count($resul2);

	    $j = 0;
       
 	for($i = 0 ; $i < $a; $i++){
  	  $datos["p".$j]=$resul2[$i][0];
 	  $datos["p".($j+1)]=$resul2[$i][1];
      $datos["p".($j+2)]=$resul2[$i][2];
      $datos["p".($j+3)]=$resul2[$i][3];
      $datos["p".($j+4)]=$resul2[$i][4];
      $datos["p".($j+5)]=$resul2[$i][5];
      $datos["p".($j+6)]=$resul2[$i][6];
	  $j+=7;
       }
	
      $encode ->encode($datos);
       
    }
    
}




?>
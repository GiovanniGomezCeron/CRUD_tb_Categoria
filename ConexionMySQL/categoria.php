<?php
class Categoria{
    private $cxn;
    
    public function __construct(){
	include "json_encode.php";
        $this -> cxn =new Conexion();
    }
    
    public function insertar($values){
        $this -> cxn -> conexion -> query("insert into tb_categoria values (0,'".$values["p0"]."',1)");
        
    }
    
    public function actualizar($values){
        $this -> cxn ->conexion ->query("update tb_categoria set nom_categoria='".$values["p0"]."', estado =".$values["p1"]." where id_categoria=".$values["p2"]);
        
    }
    public function eliminar($where){
        $this -> cxn ->conexion -> query("delete from tb_categoria where id_categoria=".$where["p0"]);
        
    }
    
    public function consultar(){
	$encode = new Json_encode();
        $resul=$this -> cxn ->conexion ->query("select nom_categoria, id_categoria, estado from tb_categoria");
	$resul2=$resul -> fetchAll();
 	
 	 
         $datos=array();
	
         $a=count($resul2);

	$j=0;
       
 	for($i=0; $i < $a; $i++){
  	  $datos["p".$j]=$resul2[$i][0];
 	  $datos["p".($j+1)]=$resul2[$i][1];
	  $datos["p".($j+2)]=$resul2[$i][2];
		$j+=3;
       }
      
      $encode ->encode($datos);
       
    }
    
}

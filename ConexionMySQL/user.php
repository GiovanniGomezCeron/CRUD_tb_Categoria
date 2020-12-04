<?php 
class Usuarios{
 public $cxn;
  public function __construct(){
    include "json_encode.php";
    $this-> cxn =new Conexion();
      
  }
  
  //metodos           //campos id, nombre, apellidos , usuario  , contraseña , pregunta , respuesta,  estado , registro, correo
  //array values
  //[0] = nombre
  //[1] = apellido
  //[2] = usuario
  //[3] = contraseña 
  //[4] = pregunta
  //[5] = respuesta
  //[6] = correo
  
  public function insertar($values){
     $this -> cxn -> conexion ->query("insert into tb_usuario values (0, '".$values[0]."' , '".$values[1]."' ,  '".$values[2]."' ,'".$values[3]."' , '".$values[4]."' ,'".$values[5]."' ,1,null,'".$values[6]."' )");
     
  }
  
  public function update($values){
     $correo = $values[5];
     echo $correo;
     $this->cxn ->conexion->query("update tb_usuario set nombre='".$values[0]."', apellido='".$values[1]."', usuario ='".$values[2]."'". ", contraseña='".$values[3]."',correo='".$values[4]."' where correo = '".$correo."'");
  }
  
  public function delete($condWhere){
        $this -> cxn ->conexion -> query("delete from tb_usuario where id = ".$condWhere);
     
  }
  
  public function select(){
	      $p = array();
        $res = $this -> cxn ->conexion -> query("select nombre,apellido,usuario,contraseña, correo from tb_usuario");
        $res2 = $res -> fetch();
        $a = count($res2) /2 ;

        for($i=0; $i < $a; $i++){

        $p["p".$i] = $res2[$i];
        
	     }
    $encode = new Json_encode();
    $encode -> encode($p);
       
   }

  public function login($user, $pasw){
   $array=array();
   $resul   = $this ->cxn->conexion -> query("select pregunta, respuesta from tb_usuario where usuario = '$user' and contraseña = '$pasw';");
   $resul2= $resul ->fetch();
   $hasta= count($resul2) / 2;

   for($i=0; $i < $hasta; $i++){
     $array["p".$i]=$resul2[$i];
   }
 
    //REQUEST 
    $encode = new Json_encode();
    $encode -> encode($array);
  }
 
}
?>
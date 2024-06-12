<?php 
session_start();
require_once "conexion.php";

$usuario  = $_REQUEST['usuario'];
$nombre   =  $_REQUEST['nombre'];
$apellido =  $_REQUEST['apellido'];
$email    = $_REQUEST['codigo']; 
/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("UPDATE usuarios SET usuario='".$usuario."', nombre='".$nombre."' , apellido='".$apellido."', email = '".$email."' WHERE usuario = '".$usuario."'");

/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
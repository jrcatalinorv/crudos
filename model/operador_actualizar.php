<?php 
session_start();
require_once "conexion.php";

$codigo = $_REQUEST['codigo']; 
$nombre = $_REQUEST['nombre']; 

/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("UPDATE dk1_crudos_operadores SET codigo='".$codigo."', nombre='".$nombre."' WHERE codigo='".$codigo."'");
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
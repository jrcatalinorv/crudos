<?php 
session_start();
date_default_timezone_set('America/Santo_Domingo');
require_once "conexion.php";
require_once "funciones.php";

$rollo = $_REQUEST['rollo'];

$stmt2 = Conexion::conectar()->prepare("DELETE FROM dk1_crudos2 WHERE rollo = '".$rollo."'");

if($stmt2->execute()){	  
  $stmt3 = Conexion::conectar()->prepare("DELETE FROM dk1_crudos_defectos_rollo WHERE  rollo = '".$rollo."'");
  $stmt3->execute();	
  $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
?>
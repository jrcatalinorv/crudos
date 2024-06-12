<?php 
session_start();
require_once "conexion.php";

$defecto = $_REQUEST['defecto'];

/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("INSERT INTO dk1_crudos_defectos (defectos) VALUES (:defectos)");
$stmt2->bindParam(":defectos",$defecto, PDO::PARAM_STR);
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
<?php 
session_start();
require_once "conexion.php";

$id = $_REQUEST['codigo'];
$defecto = $_REQUEST['defecto'];

/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("UPDATE dk1_crudos_defectos SET defectos = '".$defecto."' WHERE id_defectos = ".$id."");
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
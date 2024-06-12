<?php 
session_start();
date_default_timezone_set('America/Santo_Domingo');
require_once "conexion.php";

$id = $_REQUEST['id'];
$rollo  = $_REQUEST['rollo'];
$defecto = $_REQUEST['defecto'];
$puntos = $_REQUEST['puntos'];
$cliente = $_REQUEST['cliente'];

 
/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("INSERT INTO dk1_crudos_defectos_rollo (id,rollo,defecto,puntos,cliente)VALUES (:id,:rollo,:defecto,:puntos,:cliente)");

$stmt2->bindParam(":id",$id, PDO::PARAM_INT);
$stmt2->bindParam(":rollo",$rollo, PDO::PARAM_STR);
$stmt2->bindParam(":defecto",$defecto, PDO::PARAM_STR);
$stmt2->bindParam(":puntos",$puntos, PDO::PARAM_INT);
$stmt2->bindParam(":cliente",$cliente, PDO::PARAM_STR);

/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
<?php 
session_start();
require_once "conexion.php";

$codigo = $_REQUEST['codigo']; 
$nombre = $_REQUEST['nombre']; 

/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("INSERT INTO dk1_crudos_operadores(codigo,nombre) VALUES (:codigo,:nombre)");
$stmt2->bindParam(":codigo",$codigo, PDO::PARAM_STR);
$stmt2->bindParam(":nombre",$nombre, PDO::PARAM_STR);
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
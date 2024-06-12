<?php 
session_start();
require_once "conexion.php";

$operador= $_REQUEST['operador'];

$stmt  = Conexion::conectar()->prepare("SELECT * FROM dk1_crudos_operadores WHERE codigo = '".$operador."'");
$stmt -> execute();	
if($results = $stmt -> fetch()){
 $out['ok'] = 1; 
}else{
$out['ok'] = 0;
}
echo json_encode($out); 
?>
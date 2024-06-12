<?php 
session_start();
require_once "conexion.php";

$stmt  = Conexion::conectar()->prepare("select * from dk1_crudos_defectos");
$stmt -> execute();	
while($results = $stmt -> fetch()){
 echo '<option value="'.$results['defectos'].'">'.$results['defectos'].'</option>';	
} 
?>
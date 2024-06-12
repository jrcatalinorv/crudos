<?php 
session_start();
require_once "conexion.php";

$rollo = $_REQUEST['rollo'];

$stmt  = Conexion::conectar()->prepare("SELECT * FROM dk1_crudos_defectos_rollo WHERE rollo = '".$rollo."'");
$stmt -> execute();	
while($results = $stmt -> fetch()){
 echo '<tr>
		<td>'.$results['defecto'].'</td> 
		<td>'.$results['puntos'].'</td>
		<td> &nbsp; </td>
      <tr>';	
} 
?>
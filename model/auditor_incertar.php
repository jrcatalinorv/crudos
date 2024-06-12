<?php 
session_start();
require_once "conexion.php";

$usuario  = $_REQUEST['usuario'];
$clave    = crypt($_REQUEST['codigo'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
$nombre   =  $_REQUEST['nombre'];
$apellido =  $_REQUEST['apellido'];
$dept     = 1;
$email    = $_REQUEST['codigo']; 
$level    = 21;
$level0   = 1; 
$Data_label = 'CRUDOS';
/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("INSERT INTO usuarios (usuario,clave,nombre,apellido,dept,email,level,level0,Data_label)
VALUES (:usuario,:clave,:nombre,:apellido,:dept,:email,:level,:level0,:Data_label)");

$stmt2->bindParam(":usuario",$usuario, PDO::PARAM_STR);
$stmt2->bindParam(":clave",$clave, PDO::PARAM_STR);
$stmt2->bindParam(":nombre",$nombre, PDO::PARAM_STR);
$stmt2->bindParam(":apellido",$apellido, PDO::PARAM_STR);
$stmt2->bindParam(":dept",$dept, PDO::PARAM_INT);
$stmt2->bindParam(":email",$email, PDO::PARAM_STR);
$stmt2->bindParam(":level",$level, PDO::PARAM_INT);
$stmt2->bindParam(":level0",$level0, PDO::PARAM_INT);
$stmt2->bindParam(":Data_label",$Data_label, PDO::PARAM_STR);
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
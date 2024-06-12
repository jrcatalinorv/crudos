<?php 
session_start();
require_once "conexion.php";

$usuario = $_REQUEST['usuario'];
$password = '123456';
$pass  = crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); //
/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("UPDATE usuarios SET clave='".$pass."' WHERE usuario = '".$usuario."'");

/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
<?php 
session_start();
require_once "conexion.php";

$usrcode  = $_REQUEST["code"];
$old 	  = crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
$new 	  = crypt($_REQUEST["npass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
 
$stmt2 = Conexion::conectar()->prepare("SELECT clave FROM usuarios WHERE usuario ='".$usrcode."'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
										
if($results['clave'] == $old){
	
$stmt2 = Conexion::conectar()->prepare("UPDATE usuarios SET clave = '".$new."' WHERE usuario = '".$usrcode."' ");
if($stmt2->execute()){	   
	$out['ok'] = 1;	   
  }else{
	$out['ok']  = 0;
	$out['err'] = $stmt->errorInfo();
  }
}else{
	
	$out['ok'] = 2;
	$out['err'] = $stmt2->errorInfo();
}
echo json_encode($out);
?>
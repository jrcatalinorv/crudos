<?php 
session_start();
require_once "conexion.php";

$usr  = strtolower ($_REQUEST["usr"]);
$pass = crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

$stmt  = Conexion::conectar()->prepare("SELECT * FROM usuarios where usuario ='".$usr."' and clave = '".$pass."'");
$stmt -> execute();	
$results = $stmt -> fetch();

if($results['usuario']==$usr && $results['clave']==$pass){
	$_SESSION["crudosSesion"] = 'ok';
	$_SESSION['usuario'] = $results['usuario'];
	$_SESSION['email'] = $results['email'];
	$_SESSION['nombre_completo'] = $results['nombre'].' '.$results['apellido'];
	$_SESSION['perfil'] = $results['level'];
	
	$out['URL'] = searchUrl($results['level']);
	$out['ok']  = 1;
}else{
	$out['ok'] = 0;
}
echo json_encode($out); 
 
function searchUrl($lv){
	switch($lv){
		case 20:  $route = "menu"; break;
		case 21:  $route = "auditoria-rollo"; break;
		case 500:  $route = "menu"; break;
	  default:   $route = "auditoria-rollo"; break;	
	}
return $route;	
} 
?>
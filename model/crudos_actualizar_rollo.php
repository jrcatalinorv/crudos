<?php 
session_start();
date_default_timezone_set('America/Santo_Domingo');
require_once "conexion.php";
require_once "funciones.php";

$rollo = $_REQUEST['rollo']; // No cambia
$fecha = replace_date_dash($_REQUEST['fecha']);
$maquina = $_REQUEST['maquina'];
$auditor = $_REQUEST['auditor'];
$kilos = $_REQUEST['kilos'];
$tipo_calidad = $_REQUEST['tipo_calidad'];
$desperdicio = $_REQUEST['desperdicio'];
$razon_desp = $_REQUEST['razon_desp'];
$turno = $_REQUEST['turno'];
$operador = $_REQUEST['operador'];

/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("UPDATE dk1_crudos2 SET fecha ='".$fecha."', maquina = '".$maquina."', cod_auditor ='".$auditor."', kilos_rollo  = '".$kilos."',
	tipo_calidad = '".$tipo_calidad."',	desperdicios = '".$desperdicio."', razon_desp = '".$razon_desp."', turno = '".$turno."',
	codigo_operador = '".$operador."' WHERE rollo = '".$rollo."'");
/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
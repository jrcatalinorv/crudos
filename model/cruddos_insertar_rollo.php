<?php 
session_start();
date_default_timezone_set('America/Santo_Domingo');
require_once "conexion.php";
require_once "funciones.php";

$rollo = $_REQUEST['rollo'];
$fecha = replace_date_dash($_REQUEST['fecha']);
$hora = intval(date('Hi'));
$maquina = $_REQUEST['maquina'];
$cod_auditor = $_REQUEST['auditor'];
$kilos_rollo =  $_REQUEST['kilos_rollo'];
$tipo_calidad = $_REQUEST['tipo_calidad'];
$desperdicios = $_REQUEST['desperdicio'];
$razon_desp = $_REQUEST['razon_desp'];
$turno = $_REQUEST['turno'];
$dispo = $_REQUEST['dispo'];
$codigo_operador = $_REQUEST['codigo_operador'];
$cliente = $_REQUEST['cliente'];
$tela = $_REQUEST['tela'];
$tipo = $_REQUEST['tipot'];
$ancho =  $_REQUEST['ancho'];
$gsm  = $_REQUEST['gsm'];


 
/* -------------------------------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("INSERT INTO dk1_crudos2 (
rollo,fecha,hora,maquina,cod_auditor,kilos_rollo,tipo_calidad,desperdicios,razon_desp,turno,dispo,codigo_operador,cliente,tela,tipo,ancho,gsm)VALUES (:rollo,:fecha,:hora,:maquina,:cod_auditor,:kilos_rollo,:tipo_calidad,:desperdicios,:razon_desp,:turno,:dispo,:codigo_operador,:cliente,:tela,:tipo,:ancho,:gsm)");


$stmt2->bindParam(":rollo",$rollo, PDO::PARAM_STR);
$stmt2->bindParam(":fecha",$fecha, PDO::PARAM_INT);
$stmt2->bindParam(":hora",$hora, PDO::PARAM_INT);
$stmt2->bindParam(":maquina",$maquina, PDO::PARAM_STR);
$stmt2->bindParam(":cod_auditor",$cod_auditor, PDO::PARAM_STR);
$stmt2->bindParam(":kilos_rollo",$kilos_rollo, PDO::PARAM_STR);
$stmt2->bindParam(":tipo_calidad",$tipo_calidad, PDO::PARAM_STR);
$stmt2->bindParam(":desperdicios",$desperdicios, PDO::PARAM_STR);
$stmt2->bindParam(":razon_desp",$razon_desp, PDO::PARAM_STR);
$stmt2->bindParam(":turno",$turno, PDO::PARAM_STR);
$stmt2->bindParam(":dispo",$dispo, PDO::PARAM_STR);
$stmt2->bindParam(":codigo_operador",$codigo_operador, PDO::PARAM_STR);
$stmt2->bindParam(":cliente",$cliente, PDO::PARAM_STR);
$stmt2->bindParam(":tela",$tela, PDO::PARAM_STR);
$stmt2->bindParam(":tipo",$tipo, PDO::PARAM_STR);
$stmt2->bindParam(":ancho",$ancho, PDO::PARAM_STR);
$stmt2->bindParam(":gsm",$gsm, PDO::PARAM_STR);

/* -------------------------------------------------------------------- */
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
  $out['err'] = $stmt2->errorInfo();
}	
echo json_encode($out);  	
 
?>
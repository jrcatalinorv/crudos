<?php 
session_start();
require_once "conexion.php";
require_once "funciones.php";

$rollo = $_REQUEST['rollo'];

$stmt0 = Conexion::conectar()->prepare("SELECT count(defecto) as tdf, SUM(puntos) as tpt FROM dk1_crudos_defectos_rollo WHERE rollo = '".$rollo."'");
$stmt0 -> execute();	
$results0 = $stmt0 -> fetch();


$stmt  = Conexion::conectar()->prepare("SELECT * FROM dk1_crudos2 WHERE rollo = '".$rollo."'");
$stmt -> execute();	
if($results = $stmt -> fetch()){
 
 $out['ok'] = 1;
 $out['rollo']= $results['rollo'];
 $out['fecha']= date('Y-m-d', strtotime( revert_date($results['fecha']) ));
 $out['hora']= $results['hora'];
 $out['maquina']= $results['maquina'];
 $out['cod_auditor']= $results['cod_auditor'];
 $out['kilos_rollo']= $results['kilos_rollo'];
 $out['tipo_calidad']= $results['tipo_calidad'];
 $out['desperdicios']= $results['desperdicios'];
 $out['razon_desp']= $results['razon_desp'];
 $out['turno']= $results['turno'];
 $out['codigo_operador']= $results['codigo_operador'];
 $out['dispo']= $results['dispo'];	
 $out['cliente']= $results['cliente'];
 $out['tela']= $results['tela'];
 $out['tipo']= $results['tipo'];
 $out['ancho']= $results['ancho'];
 $out['gsm']= $results['gsm'];
 $out['Total_defecto']= $results0['tdf'];
 $out['Total_puntos']= $results0['tpt'];
 
 
}else{
	
$out['ok'] = 0;
}
echo json_encode($out); 
?>
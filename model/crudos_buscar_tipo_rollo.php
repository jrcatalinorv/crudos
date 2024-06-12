<?php 
session_start();
//Datos recividos del cliente
$tela = $_REQUEST['tela'];
$gsm = $_REQUEST['gsm'];
$ancho = $_REQUEST['ancho'];

//Datos de conexion 
$dsn = "as400"; 
$as400_usuario = "PRODTIM";
$as400_clave="PRODTIM";

 
if ( $cid=odbc_connect($dsn, $as400_usuario, $as400_clave) )
{
    $sql = "select zclas1, ycdke3 from artya00f inner join artms00f on yannul = zannul 
	and yrecty = zrecty and ycdke1 = zcdke1 and ycdke2 = zcdke2 and ycdke3 = zcdke3
	where yannul = '' and yrecty = 'A' AND yyrect = 'D' 
	AND yycdk1 = '".$tela."' and yycdk2= '".$gsm."' and yycdk3= '".$ancho."'";

			if ($result = odbc_exec($cid,$sql))
			{ 
				if(odbc_fetch_row($result)){
				$out['tipo_tela']	    = trim(odbc_result($result,1));
				$out['ancho_acabdo']	= trim(odbc_result($result,1));
				$out['case']= 1;
				}
				else
				{
				$out['case']= 2;
				}				
			}			
  }
	else{
$out['case']= 2;
}
echo json_encode($out);
?>
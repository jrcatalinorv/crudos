<?php 
session_start();
date_default_timezone_set('America/Santo_Domingo');
$rollo = $_REQUEST['rollo'];

//Datos de conexion 
$dsn = "AS400"; 
$as400_usuario = "PRODTIM";
$as400_clave="PRODTIM";

//conectarse a la base de datos 
if ( $cid=odbc_connect($dsn, $as400_usuario, $as400_clave) )
{
    $sql = "SELECT DISTINCT ODITD1, CQTELE, DCDDIS, DDISQT, OOUTQT, OWRKQT, ODITD5 
            FROM DISHD00F A INNER JOIN DISDT00F B ON 
                A.DANNUL = B.OANNUL AND 
                A.DRECTY = B.ORECTY And 
                A.DDISTP = B.ODISTP AND 
                A.DCDDIS = B.OCDDIS INNER JOIN ELEMS00F C ON  
                C.CANNUL = B.OANNUL AND  
                C.CRECTY = B.ORECTY AND  
                C.CDISTP = B.ODISTP AND  
                C.CCDDIS = B.OCDDIS WHERE DANNUL = ''   
            AND DRECTY = 'D' AND DDISTP = 'TR' AND CELEME = '".$rollo."' ";

			if ($result = odbc_exec($cid,$sql))
			{ 
				if(odbc_fetch_row($result)){
					
				$out['maquina']  	= odbc_result($result,1);
				$out['kilos_rollo']  = odbc_result($result,2);
				$out['dispo']		 = odbc_result($result,3);
				$out['cliente']		 = odbc_result($result,7);
				
			/* -============================================================- */					
			/* Buscar otro datos */
			/* -============================================================- */
		$sql2 = "SELECT ccdke1,ccdke2,ccdke3,ccdke4 FROM elems00f where cannul = '' and 
		crect0 = 'D' and celein= 0 and celeme = '".$rollo."' ";
			
			if ($result2 = odbc_exec($cid,$sql2))
			{ 
				if(odbc_fetch_row($result2)){
				$out['ccdke1']  = odbc_result($result2,1);
				$out['ccdke2']  = odbc_result($result2,2);
				$out['ccdke3']	= odbc_result($result2,3);
				$out['case']= 1;
				//$out['ccdke4']	= odbc_result($result2,7);
			}else{
				$out['case']= 0;
			} 	
		  }
			/* -============================================================- */
			}
			else{
			  $out['case']= 0;
			 }		
		}			
     }
else{
$out['case']= 2;
}
echo json_encode($out);
?>
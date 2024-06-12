<?php
/* 
Nombre : replace_date ($date)
detalle: Converitr la fecha a formato yyyymmdd para base de datos 
input  : 01/12/2016 ==>  output : 20160112
*/
function replace_date($date)
{
 $txt = explode("/",$date);	
 return $txt[2].''. sprintf("%02d",$txt[0]).''.sprintf("%02d",$txt[1]);		
}

function replace_date_dash($date)
{
 $txt = explode("-",$date);	
 return $txt[0].''. sprintf("%02d",$txt[1]).''.sprintf("%02d",$txt[2]);		
}


/*
Nombre : replace_date ($date)
detalle: Convertir la fecha a formato mm/dd/yyyy  
input  : 01/12/2016 ==>  output : 20160112
*/
function revert_date($date)
{
$txt = str_split($date,2);	
return $txt[2]."/".$txt[3].'/'.$txt[0].$txt[1];		
}

/*Convertir la fecha a formato dd/mm/yyyy */
function revert_date_esp($date)
{
$txt = str_split($date,2);	
return $txt[3]."/".$txt[2].'/'.$txt[0].$txt[1];		
}

/* */
function convert_hour($hour)
{
	if(intval($hour) <= 959)	
	{
		if(intval($hour) <= 59 )
		{
			return t24h('00').':'.sprintf("%02d",intval($hour)) . " am";
		}
		else 
		{
		$txt = str_split($hour,1);	
		return sprintf("%02d",$txt[0]).":".$txt[1].$txt[2] ." am";		
		}
	}
	else
	{
		$txt = str_split($hour,2);
		if(intval($txt[0]) >= 12)
		{	
			return t24h($txt[0]).":".$txt[1]." pm";	
		}
		else if($txt[0] == 0)
		{
		    return t24h($txt[0]).":".$txt[1]." am";
		}
		else
		{	
			return $txt[0].":".$txt[1]." am";
		}
	}		
}

/* *** Funcion *** */
function t24h($hour)
{
	switch($hour)
	{
		case '12': $r = '12'; break;
		case '13': $r = '01'; break;
		case '14': $r = '02'; break;
		case '15': $r = '03'; break;
		case '16': $r = '04'; break;
		case '17': $r = '05'; break;
		case '18': $r = '06'; break;
		case '19': $r = '07'; break;
		case '20': $r = '08'; break;
		case '21': $r = '09'; break;
		case '22': $r = '10'; break;
		case '23': $r = '11'; break;
		case '00': $r = '12'; break;
	}	
return $r;	
}

/* Calcular el turno */
function get_shift($hora){
if(intval($hora) >=600 && intval($hora) < 1759){ return "A";}
else { return "B"; }
}

/* Clacular la fecha correspondiente al turno */
function get_dateShift($hora){
if (intval($hora) >= 0  && intval($hora) <= 559 )
{
	return date('Y-m-d',strtotime("-1 days"));  		 
}
else
{
	return date('Y-m-d'); 
}
}



/*Cuenta la cantidad de defectos */
/*
function count_times($rollo, $conexion)
{
$registros = mysql_query("
SELECT count(defecto) FROM sgi.dk1_crudos_defectos_rollo where rollo = '".$rollo."'",$conexion);
while ($reg=mysql_fetch_array($registros)) 
{  
  $n = $reg['count(defecto)'];
}
return 	intval($n);
}*/

/*Cuenta la cantidad de defectos - Diferentes */
/*
function count_times_dis($rollo, $conexion)
{
$registros = mysql_query("SELECT count(DISTINCT(defecto)) FROM sgi.dk1_crudos_defectos_rollo where rollo = '".$rollo."'",$conexion);
while ($reg=mysql_fetch_array($registros)) 
{  
  $n = $reg['count(DISTINCT(defecto))'];
}
return 	intval($n);
}*/

/* get_def: obtener los desperdicios por rollo y por ID */
/*
function get_def($rollo, $id, $conexion)
{
$registros = mysql_query("SELECT defecto FROM sgi.dk1_crudos_defectos_rollo 
where rollo = '".$rollo."' and id =".$id."",$conexion);
while ($reg=mysql_fetch_array($registros)) 
{  
  $name = $reg['defecto'];
}
return 	$name;
}*/

/* 
function get_pts($rollo, $id, $conexion)
{
$registros = mysql_query("SELECT puntos FROM sgi.dk1_crudos_defectos_rollo 
where rollo = '".$rollo."' and id =".$id."",$conexion);
while ($reg=mysql_fetch_array($registros)) 
{  
  $n = $reg['puntos'];
}
return 	$n;
}*/
?>
<?php 
//Quitar tiempo limite y agregar indicador 
set_time_limit(0);
require_once "model/conexion.php";

if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}

$original_start_date = $_REQUEST['sd'];
$original_end_date = $_REQUEST['ed'];


$start_date = convert_date($original_start_date);
$end_date   = convert_date($original_end_date);


?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Auditoría de Crudos </title>
   <link rel="stylesheet" href="view/plugins/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md main-header navbar navbar-expand navbar-dark navbar-lightblue">
    <div class="container">
      <a href="" class="navbar-brand"><span class="brand-text font-weight-light"><b><i class="fas fa-file-alt"></i> Reportes </b></span></a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-bars fa-lg"></i>  &nbsp;</a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		  <div class="dropdown-divider"></div>
           <a href="mi-perfil" class="dropdown-item text-info"><i class="fas fa-user mr-2"></i> Mi perfil</a>
           <div class="dropdown-divider"></div>
            <a href="salir" class="dropdown-item text-danger"><i class="fas fa-power-off mr-2"></i> Salir</a>
          </div>
        </li>
 
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
     <div class="row mb-2 p-0">
	    <div class="col-sm-12">
		<div class="btn-group">
            <a class="btn btn-default" href="reportes" title="Regresar a ajustes"><i class="far fa-arrow-alt-circle-left"></i> Regresar </a>
			<a class="btn btn-default" href="" title="Recargar la página"><i class="fas fa-sync-alt"></i> Recargar </a>
         </div>		


		 <span id="loading-label" class="text-primary"><i class="fad fa-spinner-third  fa-spin ml-2"></i> <b class="">Cargando Por favor espere ...</b></span>		 
      
		 </div>
     </div>	
      </div> 
    </div>

    <div class="content">
      <div class="">
	  
 	  
	  
<div class="row pt-1 optionPane">
 
 
<div class="col-12">
<div class="card  p-0 card-primary">
<div class="card-header">
<h3 class="card-title">  Reporte de Segundas  </h3>
</div>
<div class="card-body p-0">
<table class="table table-sm table-striped"> 
<thead>
<tr>
<th># Rollo </th>
<th>Maquina</th>
<th>Tela</th>
<th>Turno</th>
<th>Operador</th>
<th>Defecto</th>
<th>Puntos</th>
<th>Disposicion</th>
<th>Kilos(Kg)</th>
<th>Auditor</th> 
<th>Desp.</th>  
<th>Cliente</th> 
<th>Dispo</th>  
<th>Fecha </th>
<th>Hora </th>
</tr> 
</thead>
<tbody>
<?php 
/*
ELECT c.*, d.* FROM dk1_crudos2 c
LEFT JOIN dk1_crudos_defectos_rollo d ON c.rollo = d.rollo
AND c.fecha between ".$start_date." AND ".$end_date." ORDER BY c.rollo ASC
*/
 
$stmt  = Conexion::conectar()->prepare("SELECT c.*, d.* FROM dk1_crudos2 c
INNER JOIN dk1_crudos_defectos_rollo d ON c.rollo = d.rollo
AND c.fecha between ".$start_date." AND ".$end_date." AND tipo_calidad = 'calidad 3' 
ORDER BY c.rollo ASC");
$stmt -> execute();	
while($results = $stmt -> fetch()){
	
$rollo = $results['rollo'];	
$maquina = $results['maquina'];
$tela = $results['tela'];
$turno = $results['turno'];
$operador = $results['codigo_operador'];
$defecto = $results['defecto'];  	
$puntos = $results['puntos']; 
$tipo_calidad = $results['tipo_calidad'];
$kilos_rollo = $results['kilos_rollo'];
$desperdicios = $results['desperdicios'];
$cod_auditor = $results['cod_auditor'];
$cliente = $results['cliente'];
$dispo = $results['dispo'];
$fecha = revert_date($results['fecha']);
$hora = convert_hour($results['hora']);
 
echo "<tr>";
	echo "<td>".$rollo."</td>";
	echo "<td>".$maquina."</td>";
	echo "<td>".$tela."</td>";
	echo "<td>".$turno."</td>";
	echo "<td>".$operador."</td>";
	echo "<td>".$defecto." </td>";
	echo "<td>".$puntos." </td>";
	echo "<td>".$tipo_calidad."</td>";
	echo "<td>".$kilos_rollo."</td>";
	echo "<td>".$cod_auditor."</td>";
	echo "<td>".$desperdicios."</td>";
	echo "<td>".$cliente."</td>";
	echo "<td>".$dispo."</td>";
	echo "<td>".$fecha."</td>";
	echo "<td>".$hora."</td>";
 echo "</tr>";
  
}
  
	
echo '</tbody></table>';
?>
</div>
<div class="card-footer"></div>
</div>
 
 </div> 
  
         
 
   
		  
       </div>       
      </div> 
    </div>
  </div>

<footer class="main-footer">
   <div class="float-right d-none d-sm-inline"> Dominican Knits  </div>
   <strong>Copyright &copy; 2016-2020  </strong>  
</footer>
  
</div>
<script src="view/plugins/jquery/jquery.min.js"></script>
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {
    $('#loading-label').hide();
});

 

function semanaISO($fecha){
   
      if($fecha.match(/\//)){
      $fecha   =   $fecha.replace(/\//g,"-",$fecha); //Permite que se puedan ingresar formatos de fecha ustilizando el "/" o "-" como separador
   };
   
   $fecha   =   $fecha.split("-"); //Dividimos el string de fecha en trozos (dia,mes,año)
   $dia   =   eval($fecha[1]);
   $mes   =   eval($fecha[0]);
   $ano   =   eval($fecha[2]);
   
   if ($mes==1 || $mes==2){
      //Cálculos si el mes es Enero o Febrero
      $a   =   $ano-1;
      $b   =   Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);
      $c   =   Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);
      $s   =   $b-$c;
      $e   =   0;
      $f   =   $dia-1+(31*($mes-1));
   } else {
      //Calculos para los meses entre marzo y Diciembre
      $a   =   $ano;
      $b   =   Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);
      $c   =   Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);
      $s   =   $b-$c;
      $e   =   $s+1;
      $f   =   $dia+Math.floor(((153*($mes-3))+2)/5)+58+$s;
   };

   //Adicionalmente sumándole 1 a la variable $f se obtiene numero ordinal del dia de la fecha ingresada con referencia al año actual.

   //Estos cálculos se aplican a cualquier mes
   $g   =   ($a+$b)%7;
   $d   =   ($f+$g-$e)%7; //Adicionalmente esta variable nos indica el dia de la semana 0=Lunes, ... , 6=Domingo.
   $n   =   $f+3-$d;
   
   if ($n<0){
      //Si la variable n es menor a 0 se trata de una semana perteneciente al año anterior
      $semana   =   53-Math.floor(($g-$s)/5);
      $ano      =   $ano-1; 
   } else if ($n>(364+$s)) {
      //Si n es mayor a 364 + $s entonces la fecha corresponde a la primera semana del año siguiente.
      $semana   = 1;
      $ano   =   $ano+1;
   } else {
      //En cualquier otro caso es una semana del año actual.
      $semana   =   Math.floor($n/7)+1;
   };
   
   return $semana; //La función retorna una cadena de texto indicando la semana y el año correspondiente a la fecha ingresada   
};

</script>
</body>
</html>
<?php 

function convert_date($date){
	$x = explode("-",$date);
	$new_format = $x[0].''.$x[1].$x[2];
	return $new_format;
}

function get_all_dates($firstDate, $date_pos){

$d = intval($date_pos);
$date = strtotime($firstDate);
$date = strtotime("+".$d." day", $date);	
return date('d/m/Y', $date);
}

function get_db_date($firstDate, $date_pos){

$d = intval($date_pos);
$date = strtotime($firstDate);
$date = strtotime("+".$d." day", $date);	
return date('Ymd', $date);
}

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

function revert_date($date)
{
$txt = str_split($date,2);	
return $txt[3]."/".$txt[2].'/'.$txt[0].$txt[1];		
}

 
?>

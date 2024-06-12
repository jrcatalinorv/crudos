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
$days = intval($end_date) - intval($start_date);



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

	 
      
		 </div>
     </div>	
      </div> 
    </div>

    <div class="content">
      <div class="container">
	  
 	  
	  
<div class="row pt-1 optionPane">
 

<div class="card col-sm-12 p-0 card-primary">
<div class="card-header">
<h3 class="card-title"> Reporte de Auditorias Semana #   </h3>
</div>
<div class="card-body p-0">
<?php 

echo '<table class="table table-sm table-striped">'; 
 
echo "<theader>
<tr>";
echo "<th>  Fecha  </th>";
echo "<th> Turno A (Kg) </th>";
echo "<th> Turno B (Kg) </th>";
echo "<th> Segundas (Kg)  </th>";
echo "<th> Desperdicios (Kg)  </th>";
echo "<th> Kilos Defectuosos (Kg)  </th>";
echo "</tr> </theader>
<tbody>
";
$kilos_defectuosos=0;
$totalKilosTurnoA=0;
$totalKilosTurnoB=0;
$totalKilosSegundas=0;
$totalKilosDesperdicios=0;
$totalKilosDefectuosos =0;

for($i=0; $i<= $days; $i++ )
{
/*Turno A*/
$stmt  = Conexion::conectar()->prepare("select SUM(kilos_rollo) from dk1_crudos2 where 
fecha = ".get_db_date($original_start_date,$i)." AND tipo_calidad = 'calidad 1' AND turno = 'A'");
$stmt -> execute();
if($results = $stmt -> fetch()){
 $Datos_turnoA = $results['SUM(kilos_rollo)'];
 $totalKilosTurnoA += $Datos_turnoA;
}

/*Turno B*/
$stmt  = Conexion::conectar()->prepare("select SUM(kilos_rollo) from dk1_crudos2 where 
fecha = ".get_db_date($original_start_date,$i)." AND tipo_calidad = 'calidad 1' AND turno = 'B'");
$stmt -> execute();
if($results = $stmt -> fetch()){
 $Datos_turnoB = $results['SUM(kilos_rollo)'];
 $totalKilosTurnoB += $Datos_turnoB;
} 

/* kilos de Segunda */
$stmt  = Conexion::conectar()->prepare("select SUM(kilos_rollo) from dk1_crudos2 where 
fecha = ".get_db_date($original_start_date,$i)." AND tipo_calidad = 'calidad 3'");
$stmt -> execute();
if($results = $stmt -> fetch()){
	$kilos_segundas = $results['SUM(kilos_rollo)'];
	$totalKilosSegundas += $kilos_segundas ; 
}
/* Desperdicios */
$stmt  = Conexion::conectar()->prepare("select SUM(desperdicios) from dk1_crudos_desperdicios where 
fecha = ".get_db_date($original_start_date,$i)."");
$stmt -> execute();
if($results = $stmt -> fetch()){
 $kilos_desperdicios = $results['SUM(desperdicios)'];
}

$stmt  = Conexion::conectar()->prepare("select SUM(desperdicios) from dk1_crudos2 where 
fecha = ".get_db_date($original_start_date,$i)." AND tipo_calidad = 'calidad 1'");
$stmt -> execute();
if($results = $stmt -> fetch()){
	$kilos_desperdicios2= $results['SUM(desperdicios)'];
}
  
  $kilos_desperdiciosAll = floatval($kilos_desperdicios) + floatval($kilos_desperdicios2);
  $totalKilosDesperdicios += $kilos_desperdiciosAll;


/* Kilos defectuosos */
$stmt  = Conexion::conectar()->prepare("select c.*, d.*, count(d.defecto) as ccnt from dk1_crudos2 c 
INNER JOIN dk1_crudos_defectos_rollo d  ON c.rollo = d.rollo AND c.fecha = ".get_db_date($original_start_date,$i)." 
GROUP BY d.rollo");
$stmt -> execute();
while($results = $stmt -> fetch()){
	if( $results['ccnt'] >=7 && intval($results['kilos_rollo'])<= 75 ){
		$kilos_defectuosos += $results['kilos_rollo']; 
 
	}
	else if ( $results['ccnt'] >=8 && intval($results['kilos_rollo'])>= 76){
		$kilos_defectuosos += floatval($results['kilos_rollo']);
 
	}else{
		$kilos_defectuosos +=0;

	}
   	
} 


echo "<tr>";
echo "<td>".get_all_dates($original_start_date,$i)."</td>";
echo "<td class=''>".number_format($Datos_turnoA,2)."</td>";
echo "<td class=''>".number_format($Datos_turnoB,2)."</td>";
echo "<td class=''>".number_format($kilos_segundas,2)."</td>";
echo "<td class=''>".number_format($kilos_desperdiciosAll,2)."</td>";
echo "<td> ".number_format($kilos_defectuosos,2)." </td>";
echo "</tr>";	
$totalKilosDefectuosos += $kilos_defectuosos;	
} 


echo "<tr class='bg-gray'>";
echo "<td> <b> Totales</b> </td>";
echo "<td class=''>".number_format($totalKilosTurnoA,2)."</td>";
echo "<td class=''>".number_format($totalKilosTurnoB,2)."</td>";
echo "<td class=''>".number_format($totalKilosSegundas,2)." </td>";
echo "<td class=''>".number_format($totalKilosDesperdicios,2)."</td>";
echo "<td>".number_format($totalKilosDefectuosos,2)."</td>";
echo "</tr>";	
	
echo '</tbody></table>';
?>
</div>

</div>
 
 
<?php 

/*Calculo del Yield de Calidad */
$yield_calidad = (1- (($totalKilosSegundas + $totalKilosDesperdicios + $totalKilosDefectuosos  ) /($totalKilosTurnoA + $totalKilosTurnoB  )) ) * 100;
$Segundas = ((($totalKilosSegundas+ $totalKilosDesperdicios + $totalKilosDefectuosos ) /( $totalKilosTurnoA + $totalKilosTurnoB  )) ) * 100;


?> 
 
<div class="card col-sm-6">
<div class="card-body">
	<table class="table table-sm">
		<tr>
			<td> Nivel de aceptación  </td>
			<td> <?php echo number_format($yield_calidad,2); ?> % </td>
		</tr>		
		<tr>
			<td> % Defectuoso </td>
			<td><?php echo number_format($Segundas,2); ?> %</td>
		</tr>
	</table>
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
var semana_0 = semanaISO(<?php echo "'".$fecha."'"; ?>);

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
 
?>

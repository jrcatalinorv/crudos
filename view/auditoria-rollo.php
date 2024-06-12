<?php 
require_once "model/funciones.php";
date_default_timezone_set('America/Santo_Domingo');
if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}
$date = date('Y-m-d'); 
$time = date('Hi');
$turno = get_shift($time);
$dateShift = get_dateShift($time);
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Auditoría de Crudos </title>
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css"> 
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md main-header navbar navbar-expand navbar-dark navbar-lightblue">
    <div class="container">
      <a href="" class="navbar-brand"><span class="brand-text font-weight-light"><b> <i class="fas fa-tasks"></i> Auditoría de Crudos  </b></span></a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars fa-lg"></i> &nbsp;
          </a>
		  
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<?php 
			if($_SESSION['perfil']==20 || $_SESSION['perfil'] == 500)
			{
				echo '<a href="menu" class="dropdown-item text-info"><i class="fas fa-th mr-2"></i> Menu </a>       
                      <div class="dropdown-divider"></div>'; 			
			}
			?>
			<a href="datos-turno" class="dropdown-item text-info"><i class="fas fa-calendar-day mr-2"></i> Datos del Turno </a>       
            <div class="dropdown-divider"></div>       
			<a href="buscar-rollo" class="dropdown-item text-info"><i class="fas fa-search mr-2"></i> Buscar Rollo </a> 			
            <div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item text-info" data-toggle="modal" data-target="#modal-deps"><i class="far fa-list-alt mr-2"></i> Desperdicios </a> 			
            <div class="dropdown-divider"></div>
            <a href="mi-perfil" class="dropdown-item text-info"><i class="fas fa-user mr-2"></i> Mi perfil </a>
            <div class="dropdown-divider"></div>
            <a href="salir" class="dropdown-item text-danger"><i class="fas fa-power-off mr-2"></i> Salir </a>
          </div>
        </li>
 
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content">
      <div class="ml-3">
<div class="row pt-2">

 <div class="col-md-8 p-0">
 <div class="card ">
    <div class="card-body p-2">
       <div class="row">
           <div class="col-6"> 
				<label class="col-form-label"># de Rollo </label> 
				 <input id="tipo_caliad"  type="hidden" value="calidad 1" readonly />
				<input id="nrollo" type="text" class="form-control" onkeypress ='return isNumberKey(event)' />
			</div>
           <div class="col-3"> 
				<label class="col-form-label">Turno a Cargar </label>
				<select id="turno" class="form-control">
					<option <?php if($turno=="A"){ echo "selected"; } ?> value="A"> A </option>
					<option <?php if($turno=="B"){ echo "selected"; } ?> value="B"> B </option>
				</select>
		   </div>
           <div class="col-3"> 
				<label class="col-form-label">Fecha</label> 
				<input id="fecha" type="date" class="form-control" value="<?php echo $dateShift; ?>">
		   </div>
        </div>
		
		<!------------>
						<div class="row">
					  <div class="col-md-6"><hr/>
				 					 
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> C&oacute;digo Tela </label>
							<div class="col-sm-7"><input class="form-control" id="codigo_tela" readonly  /></div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Tipo de Tela </label>
							<div class="col-sm-7">
								<input class="form-control" id="tipo_tela" readonly />
							</div>
						</div>							
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Ancho de Tela </label>
							<div class="col-sm-7">
								<input class="form-control" id="ancho_tela" />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> # Kilos (Kg) </label>
							<div class="col-sm-7">
								<input class="form-control" id="kilos_rollos" onkeypress ='return isNumberKey(event)' /> 
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Cliente </label>
							<div class="col-sm-7">
								<input class="form-control" id="cliente" readonly  />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> GSM </label>
							<div class="col-sm-7">
								<input class="form-control" id="gsm" readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> # Dispo </label>
							<div class="col-sm-7">
								<input class="form-control" id="dispo" readonly  />
							</div>
						</div>						
					 </div>
					
					<div class="col-md-6"><hr/>
					     <div class="form-group row">
							<label class="col-sm-5 col-form-label"> M&aacute;quina </label>
							<div class="col-sm-7"><input id="maquina" class="form-control" onkeypress ='return isNumberKey(event)'/></div>
						</div>					     
					 				     				     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Auditor </label>
							<div class="col-sm-7"><input id="nombre_auditor"  readonly class="form-control" value="<?php echo $_SESSION['nombre_completo']; ?>" /></div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Código </label>
							<div class="col-sm-7"><input id="codigo_auditor"  class="form-control"  readonly  value="<?php echo $_SESSION['email']; ?>"/></div>
						</div>					     

						<div class="form-group row">
							<label id="txtOp" class="col-sm-5 col-form-label"> Operador </label>
							<div class="col-sm-7"><input id="noperador" class="form-control" onkeypress ='return isNumberKey(event)' maxlength="8"  /></div>
						</div>	
						
						<div class="form-group row">
							<label id="txtNdesp" class="col-sm-5 col-form-label"> Desperdicios (Kg) </label>
							<div class="col-sm-7">
								<input id="ndesp" class="form-control" />
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Raz&oacute;n / <br/> No Conformidad </label>
							<div class="col-sm-7 pt-3">
								<select id="ndespt" class="form-control" >
								
								</select>
							</div>
						</div>						
						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label">  &nbsp; </label>
							<div class="col-sm-7 pt-3">
								 <span id="men" class="text-danger" style="font-weight: bold;">
							 
								 </span>
							</div>
						</div>
					 </div>
					
					</div>
		
		
		<!------------>
      </div>
	      <!-- /.card-body -->
                <div class="card-footer">
                  <span class="float-right">
					<button id="save" type="button" class="btn btn-success"> <i class="fas fa-save"></i> Guardar </button>				  
					<button id="limpiar" type="button" class="btn btn-info"> <i class="fas fa-retweet"></i> Recargar </button>
				   </span>
				</div>
	  
	  
     </div>
 </div>
 

  <div class="col-md-4">
				<div class="card">
 
                <div class="card-body p-1">
			<table class="table table-valign-middle table-borderd table-sm">
                  <thead>
                  <tr>
                    <th>  <a href="#" id="del_item"> <i class="fas fa-trash-alt text-danger"></i></a> </th>
                    <th> Lista de Defectos </th>
                    <th> Puntos </th>
                    <th> &nbsp; </th>
                  </tr>
				  <tr>
                    <th class="p-1" colspan="2"> <select id="defectos" class="form-control" size="4"> </select> </th>
                    <th class="p-1"> <select id="puntos" class="form-control"   size="4"><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option></select> </th>
                    <th class="p-1"> <a class="btn btn-app" id="add_item"> <i class="fas fa-plus"></i>  Añadir </a> </th>
                  </tr>
				  
                  </thead>
                  <tbody id="myTable">
                   
 
 
                  </tbody>
                </table>
				</div>
		</div>
	  </div>		  
        
</div>
 </div> 
    
	</div>
    <!-- /.content -->
  </div>

<div class="modal fade" id="modal-deps">
  <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Desperdicios del Turno  </h4>
              <button id="closeModalNI" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
				<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Turno </label>
                    <div class="col-sm-9">
					   <select  id="turno2" class="form-control">
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
					   
                    </div>
                  </div>				
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Desperdicios: </label>
                    <div class="col-sm-9">
                       <input id="desp_total" type="text" class="form-control" />
					   
                    </div>
                  </div>	  
            </div>
            <div class="modal-footer justify-content-between">
              <button id="closeModalNI" type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> Cancelar </button>
              <button id="saveItem" type="button" class="btn btn-success"> <i class="fas fa-save"></i>  Guardar </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal -->  


  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline"> Dominican Knits  </div>
    <strong>Copyright &copy; 2016-2020  </strong>  
  </footer>
</div>
<script src="view/plugins/jquery/jquery.min.js"></script>
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="view/plugins/jquery-number/jquery.number.js"></script>
<script src="view/plugins/toastr/toastr.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$( document ).ready(function(){ 
	var crudos_tela;
	var crudos_ancho;
	var crudos_ancho_calc;
	var crudos_gsm;
	var crudos_tipo_tela;
	var color_tela;
	var sum_puntos; 
	
	$('#kilos_rollos').number(true,2);
	$('#ndesp').number(true,2);
	$('#nrollo').focus();
}); 

$('#limpiar').click(function(){ location.href='';});
$('#ndespt').load('model/crudos_defectos.php');
$('#defectos').load('model/crudos_defectos.php');


/***************************************************************************
Seguridad: Los kilos de desperdicios no pueden ser mayor a los del rollo 
****************************************************************************/
$('#ndesp').keyup(function(){     
$rollo = parseFloat( $('#kilos_rollos').val() );
$despe = parseFloat( $('#ndesp').val() );

if($rollo < $despe ) {
	toastr.error('Los Kilos de Desperdicios no pueden ser Mayor a los Kilos del Rollo');
	$('#ndesp').val(0);
	$('#txtNdesp').addClass('text-danger');
	}
	else {  
	   $('#txtNdesp').removeClass('text-danger');
	}
});


/******************************************************************
  Clear: Limpiar los campos 
*******************************************************************/
function Clr()
{
	$('#nrollo').val("");
	$('#maquina').val("");
	$('#kilos_rollos').val("");
	$('#dispo').val("");
	$('#cliente').val("");
	$('#nrollo').focus();
} 


/**********************************
 Funciones para el GRID
***********************************/
$('#add_item').click(function(){	
if( $('#defectos').val() == null || $('#defectos').val() == "Ninguno" || $('#puntos').val() == null  || $('#nrollo').val() == "" || $('#maquina').val() == "") 
{ 
  /* No Hacer Nada */
}else {  
 var table = document.getElementById("myTable");
 var rowCount = table.rows.length;
 var row = table.insertRow(rowCount);

 var cell1 = row.insertCell(0);
 var element1 = document.createElement("i");
     element1.classList.add("fas");
     element1.classList.add("fa-trash-alt");
     element1.classList.add("text-danger");
     element1.classList.add("pt-1");
     element1.classList.add("quitarItem");
     cell1.appendChild(element1);

 var cell2 = row.insertCell(1);
 var cell3 = row.insertCell(2);
     cell2.innerHTML = $('#defectos').val();
     cell3.innerHTML = $('#puntos').val();
 
 var cell4 = row.insertCell(3);
	 cell4.innerHTML = "  "; 
print_msj();
 }
});

$('#myTable').on('click','i.quitarItem',function(){
	 $(this).parent().parent().remove();
	 print_msj();
});

/******************************************************************
  isNumberKey: Evitar que se digiten letras en el imput 
  ( Solo funciona con teclado PC )
*******************************************************************/ 
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode;
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
		return true;
}



function isEmpty(str) {
    return (!str || 0 === str.length);
}

/*******************************
Comprobar el # de operador
********************************/
$('#noperador').keyup(function(){ 
var content = $('#noperador').val();
if(content.length != 5)
{
  /* no hacer nada */
}
else 
{
   search_operador();
}
});


function search_operador(){
$.getJSON('model/crudos_verif_operador.php',{ 
		operador: $('#noperador').val()
},function(data){
	switch(data['ok'])
	{
		case 0:  
			toastr.error('!El operador no existe!');
			$('#txtOp').addClass("text-danger");	
			$('#noperador').val("");
			$('#noperador').focus();
		break;
		case 1: 
			$('#txtOp').removeClass("text-danger");
			$('#txtOp').addClass("text-success");
		break; 		
		}
	});	
}


/****************************************************
 Buscar los datos del Rollo 
*****************************************************/
$('#nrollo').keyup(function(){ 
var content = $('#nrollo').val();
if(content.length != 9)
{
/* no hacer nada */
}
else {

Clr_sh();	
 $.getJSON('model/crudos_buscar_datos_rollo.php',{ 
	rollo: $('#nrollo').val()
 },function(data){
	switch(data['case'])
	{
		case 0: toastr.error('EL rollo no existe');  /* Clr(); */  break; 
		case 1:
			$('#maquina').val(data['maquina']);
			$('#kilos_rollos').val(data['kilos_rollo']);
			$('#dispo').val( data['dispo']);	
			$('#cliente').val( data['cliente']);
			$('#codigo_tela').val(data['ccdke1']);

			/* Calulos para la tela */
			
			crudos_tela = data['ccdke1'];
			crudos_gsm = data['ccdke2'];
			crudos_ancho = data['ccdke3'];
			
			/*Tipo de Tela*/
			find_ftype(crudos_tela, crudos_gsm, crudos_ancho);
			$('#gsm').val(parseInt(getpa(crudos_gsm),10));
			 	
			break;
		case 2:  toastr.error('Ha fallado la conexion');  break; 
		}
	});
  }
});


function Clr_sh()
{
	//$('#nrollo').val("");
	$('#maquina').val("");
	$('#kilos_rollos').val("");
	$('#dispo').val("");
	$('#cliente').val("");
	$('#codigo_tela').val("");
	//$('#nrollo').focus();
}

/*********************************** 
  Leer la info de la tabla 
******************************/		
function get_points()
{
var table = document.getElementById("myTable"); 
var rowCount = table.rows.length; 
var puntos = 0;
var value;

try { 
	for(var i=0; i<rowCount; i++) 
	{
		row = table.rows[i];  	
		value = table.rows[i].cells.item(2).innerHTML;
		puntos = parseInt(value,10) + puntos;  /*Cantidad de Puntos*/ 
		//console.log(i+", "+puntos);		
}//Fin del For
}catch(e){ 
   alert(e); 
}
return puntos; 
}


/**************************
  Quitar la comillas
***************************/
function getwidth($string)
{
var mystring = $string;
mystring = mystring.replace('"','');
return mystring; 	
}



/*********************************************
  Quitar las letras extras del GSM 
**********************************************/
function getpa($string)
{
var myString = $string;
myString = myString.replace(/\D/g,'');
return myString; 	
}


/******************************
 Buscar el tipo de  tela  
*******************************/
function find_ftype($tela, $gsm, $ancho)
{
 var width;

$.getJSON('model/crudos_buscar_tipo_rollo.php',{ 
		tela: $tela,
		gsm: $gsm,
		ancho: $ancho
	},function(data){
		switch(data['case'])
		{
			case 1: 
				$('#tipo_tela').val(data['tipo_tela']); 				
				if ($('#tipo_tela').val()=="TB")
				{
					width = parseInt(getwidth(getpa($ancho)),10) * 2;
					$('#ancho_tela').val(width+'"');
				}
				else{
					width = parseInt(getwidth(getpa($ancho)),10);
					$('#ancho_tela').val(width+'"');
				}
			break;
			case 0:	
					$('#tipo_tela').val("NF"); 
					$('#ancho_tela').val(getpa($ancho)+'"');
			break;
		}
	});
}

/* */
function print_msj(){
	
var table = document.getElementById("myTable"); 
var rowCount = table.rows.length; 
var last = rowCount-1; 
			
var pts = parseInt(get_points(),10); 
			
var anchoT = parseInt(getwidth( $('#ancho_tela').val() ),10);
var gsmT = parseInt(getpa( $('#gsm').val() ),10);
var kilosT = parseInt( $('#kilos_rollos').val(),10 );
			
var YdsXKG = 1000 / (((anchoT / 39.37008) * gsmT) * 1.093613);
var yardas = YdsXKG * kilosT;
			
var four_pts =  Math.round((pts * 3600) / (yardas * anchoT)); 
 
/* Descicion de imprimir o no el letrero de la dispocicion */
if(four_pts >=21)
{
	$('#men').text("*** Rollo de Segunda ***");	
	$('#tipo_caliad').val("calidad 3");
} else{ 
	$('#men').text(" ");
	$('#tipo_caliad').val("calidad 1");
}//fin del else 
				
}


/*********************************
Función para salvar los datos 
*********************************/
$('#save').click(function(){
var content = $('#noperador').val();	
if(isEmpty($('#noperador').val()) || content.length < 5 ){
	search_operador();
}else{
/* ----------------------------------- */ 
var table = document.getElementById("myTable"); 
var rowCount = table.rows.length; 
var last = rowCount-1; 


$.getJSON('model/cruddos_insertar_rollo.php',{ 
				rollo: $('#nrollo').val(),
				fecha: $('#fecha').val(),
				maquina:$('#maquina').val(),
				auditor:$('#codigo_auditor').val(),
				kilos_rollo:$('#kilos_rollos').val(),
				tipo_calidad: $('#tipo_caliad').val(),
				desperdicio:$('#ndesp').val(),
				razon_desp:$('#ndespt').val(),
				turno:$('#turno').val(),
				dispo:$('#dispo').val(),
				codigo_operador:$('#noperador').val(),
				cliente: $('#cliente').val(),
				tela: $('#codigo_tela').val(),
				tipot: $('#tipo_tela').val(),
				ancho: $('#ancho_tela').val(),
				gsm: $('#gsm').val()
			},function(data){
			
			switch(data['ok'])
			{
			  	case 0:	toastr.error('No se guardo la data.' +data['err'] ); break;
			  	case 1:	
				if(last==0)
				{
						toastr.success('!Datos guardados de forma correcta!'); 
				}else{
					for(var i=0; i< rowCount ; i++) {
						row = table.rows[i];
						$defecto = table.rows[i].cells.item(1).innerHTML; /*nombre del defecto*/ 
						$puntos  = table.rows[i].cells.item(2).innerHTML;  /*Cantidad de Puntos*/ 

							var def = new Array();
							var pun = new Array();

							def[i-1] = $defecto;
							pun[i-1] = $puntos;	
						if(i== last)
							{
							save_points(i+1,$('#nrollo').val(),def[i-1],pun[i-1],1,$('#cliente').val());
						}else{
							save_points(i+1,$('#nrollo').val(),def[i-1],pun[i-1],0,$('#cliente').val());
						}
							
					}
				}
				break;
				
			}//fin del switch 
  }); //fin del getJSON 
  }//fin del else`
});	

/*********************************************
  Guardar los puntos y los defectos 
**********************************************/
function save_points($id, $rollo, $defecto, $puntos, $last, $cliente)
{
$.getJSON('model/crudos_guardar_data_defectos.php',{ 
	id: $id,
	rollo: $rollo,
	defecto: $defecto,
	puntos: $puntos,
	cliente: $cliente
},function(data){			
	switch(data['ok'])
	{
	 case 0: toastr.error('No se guardo la data de los defectos' +data['err'] );  break;
	 case 1: if($last == 1) { toastr.success('!Datos guardados de forma correcta!');} else { } break;	
	}
  });	
} 
			
		  
	 	

function reload(){location.href="";}
</script>
</body>
</html>

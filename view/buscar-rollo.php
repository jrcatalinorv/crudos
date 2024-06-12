<?php 
if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}
$date = date('Y-m-d'); 
if($_SESSION['perfil']==21){
	$ret = "auditoria-rollo";
}else{
	$ret = "menu";
}
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
      <a href="" class="navbar-brand">       
        <span class="brand-text font-weight-light"><b> <i class="fas fa-search"></i> Buscar Rollo </b></span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto"> 
 	 <li class="nav-item">
		 <a class="nav-link text-white" href="<?php echo $ret; ?>">
            <i class="far fa-arrow-alt-circle-left"></i> Regresar
          </a>
		</li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars fa-lg"></i> &nbsp;
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="mi-perfil" class="dropdown-item text-info">
              <i class="fas fa-user mr-2"></i> Mi perfil
            </a>
            <div class="dropdown-divider"></div>
            <a href="salir" class="dropdown-item text-danger">
			  <i class="fas fa-power-off mr-2"></i> Salir
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content">
      <div class="ml-2">
<div class="row pt-2">
      <div class="col-md-8">
            <div class="card">
                <div class="card-body">
					<div class="row p-0">
					  <div class="col-md-6 ">
						 <div class="form-group row">
							<label class="col-sm-5 col-form-label"> # de Rollo </label>
							<div class="col-sm-7">
							<div class="input-group">
								<input tabindex=1 id="nrollo" class="form-control" onkeypress ='return isNumberKey(event)'/>
								<div class="input-group-append">
									<button id="sch" type="button" class="btn btn-info"><i class="fas fa-search"></i></button>
								</div>
							</div>
							</div>
						</div>						 
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> C&oacute;digo Tela </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="codigo_tela"   readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Tipo de Tela </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="tipo_tela"    readonly />
							</div>
						</div>							
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Ancho de Tela </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="ancho_tela"   readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Kilos (Kg) </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="kilos_rollos"  /> 
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Cliente </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="cliente"   readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> GSM </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="gsm"    readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Dispo </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="dispo"   readonly />
							</div>
						</div>						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Puntos * Yardas </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="puntos"   readonly />
							</div>
						</div>						
		
						
						
					 
					 </div>
					
					<div class="col-md-6">
					     <div class="form-group row">
							<label class="col-sm-5 col-form-label"> M&aacute;quina </label>
							<div class="col-sm-7">
								<input tabindex=-1 id="maquina" maxlength="3" class="form-control" onkeypress ='return isNumberKey(event)'/>
							</div>
						</div>					     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Fecha <span style="font-size:0.65em">(Mes/d&iacute;a/a&ntilde;o)<span> </label>
							<div class="col-sm-7">
								<input tabindex=-1 id="fecha" type="date" class="form-control" />
							</div>
						</div>					     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Turno a Cargar  </label>
							<div class="col-sm-7">							
								<select tabindex=-1 id="turno" class="form-control" >
									<option value="0">  -  </option>
									<option value="A">  A  </option>
									<option value="B">  B  </option>
								</select> 	
							</div>
						</div>					     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Auditor </label>
							<div class="col-sm-7">
								<input tabindex=-1 id="codigo_auditor" class="form-control" onkeypress ='return isNumberKey(event)'/>
							</div>
						</div>					     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Operador </label>
							<div class="col-sm-7">
								<input tabindex=-1 id="noperador" class="form-control" onkeypress ='return isNumberKey(event)'/>
							</div>
						</div>					     
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Desperdicios (Kg) </label>
							<div class="col-sm-7">
								<input tabindex=-1 id="ndesp" class="form-control" />
							</div>
						</div>	

				<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Tipo Calidad </label>
							<div class="col-sm-7">
								<input tabindex=-1 class="form-control" id="tipo_calidad"   readonly />
							</div>
						</div>

						
						<div class="form-group row">
							<label class="col-sm-5 col-form-label"> Raz&oacute;n </label>
							<div class="col-sm-7">
								<select tabindex=-1 id="ndespt" class="form-control" >
								
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<button id="delete" type="button" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> Eliminar Rollo </button>
				
                  <span class="float-right">
					<button id="limpiar" type="button" class="btn btn-info"> <i class="fas fa-broom"></i> Limpiar Campos </button>
					<button id="update" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> Modificar Datos </button>
				   </span>
				</div>
         
            </div>
            <!-- /.card -->

          </div> 


  <div class="col-md-4">
				<div class="card">
		            <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-list"></i> Defectos </h3>
				
				<div class="card-tools">
                  <div class="input-group input-group-sm" >
                   

                    
                   <!--   <button type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Agregar </button>  -->
                    
                  </div>
                </div>
				
              </div>
 
                <div class="card-body">
					 <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th> Defecto </th>
                    <th>Puntos </th>
                    <th> &nbsp; </th>
                  </tr>
                  </thead>
                  <tbody id="defectos_table">
                   
 
 
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
  
<div id="triggerModalDelete" data-toggle="modal" data-target="#modal-delete" ></div>  
  
<div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> <i class="fas fa-ban text-danger"></i> Eliminiar Rollo  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="pt-4 mb-4">
				<center>
					<button id="closeDelModal" type="button" class="btn btn-danger btn-lg p-2" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar </button>
					<button id="btnDelete" type="button" class="btn btn-success btn-lg p-2"> <i class="far fa-check-circle"></i> Aceptar </button>
				</center>
				</div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
	$('#nrollo').focus();
	$('#ndespt').load('model/crudos_defectos.php');
	$('#kilos_rollos').number(true,2);
	$('#ndesp').number(true,2);		
});
 
$('#limpiar').click(function(){ location.href='buscar-rollo';  });


$('#sch').click(function(){
	search_rollo();
});


$('#nrollo').keyup(function(){ 
var content = $('#nrollo').val();
if(content.length != 9){
/* no hacer nada */
}else {
	//search_rollo();
  }
});



function search_rollo(){

	$.getJSON('model/crudos_buscar_rollo.php',{ 
			rollo: $('#nrollo').val()
 },function(data){
	switch(data['ok'])
	{
		case 0: toastr.error('EL rollo no existe'); Clr(); break; 
		case 1:
				$('#fecha').val(data['fecha']);
				$('#hora').val(data['hora']);
				$('#maquina').val(data['maquina']);
				$('#codigo_auditor').val(data['cod_auditor']);
				$('#kilos_rollos').val(data['kilos_rollo']);
				$('#tipo_calidad').val(data['tipo_calidad']);
				$('#ndesp').val(data['desperdicios']);
				$('#ndespt').val(data['razon_desp']);
				$('#turno').val(data['turno']);
				$('#dispo').val(data['dispo']);
				$('#cliente').val(data['cliente']);
				$('#codigo_tela').val(data['tela']);
				$('#tipo_tela').val(data['tipo']);
				$('#ancho_tela').val(data['ancho']);
				$('#gsm').val(data['gsm']);
				$('#noperador').val(data['codigo_operador']);					
				print_msj(data['Total_defecto'],data['Total_puntos']);
				
				$('#defectos_table').load("model/crudos_defectos_lista.php?rollo="+$('#nrollo').val());
				
			break;
		}
	});	
}



function search_rollo2(){

	$.getJSON('model/crudos_buscar_rollo.php',{ 
			rollo: $('#nrollo').val()
 },function(data){
	switch(data['ok'])
	{
		case 0: Clr(); break; 
		case 1:
				$('#fecha').val(data['fecha']);
				$('#hora').val(data['hora']);
				$('#maquina').val(data['maquina']);
				$('#codigo_auditor').val(data['cod_auditor']);
				$('#kilos_rollos').val(data['kilos_rollo']);
				$('#tipo_calidad').val(data['tipo_calidad']);
				$('#ndesp').val(data['desperdicios']);
				$('#ndespt').val(data['razon_desp']);
				$('#turno').val(data['turno']);
				$('#dispo').val(data['dispo']);
				$('#cliente').val(data['cliente']);
				$('#codigo_tela').val(data['tela']);
				$('#tipo_tela').val(data['tipo']);
				$('#ancho_tela').val(data['ancho']);
				$('#gsm').val(data['gsm']);
				$('#noperador').val(data['codigo_operador']);					
				print_msj(data['Total_defecto'],data['Total_puntos']);
				
				$('#defectos_table').load("model/crudos_defectos_lista.php?rollo="+$('#nrollo').val());
				
			break;
		}
	});	
}


/* */
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode;
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
		return true;
}

/**********************************
 Funciones para el GRID
***********************************/
function Clr()
{
	$('#nrollo').val("");
	$('#maquina').val("");
	$('#kilos_rollos').val("");
	$('#dispo').val("");
	$('#cliente').val("");
	$('#puntos').val("");
	$('#nrollo').focus();
}

/**********************************
 Funciones para el GRID
***********************************/
function print_msj( cant_def,  cant_puntos){
let pts = 4;

 
  
 

if ( Number(cant_puntos) == 0 ){
     pts = 0;
  }else{
	 pts = parseInt(cant_puntos,10);
 }
 
	
var last = parseInt(cant_def,10); 	
var anchoT = parseInt(getwidth( $('#ancho_tela').val() ),10);
var gsmT = parseInt($('#gsm').val(),10);
var kilosT = parseInt( $('#kilos_rollos').val(),10 );
var YdsXKG = 1000 / (((anchoT / 39.37008) * gsmT) * 1.093613);

var yardas = YdsXKG * kilosT;

var four_pts =  Math.round((pts * 3600) / (yardas * anchoT)); 


console.log('Cant Def: '+ last);
console.log('Puntos: '+ pts);
console.log('Ancho: '+ anchoT);
console.log('GMS: '+ gsmT);
console.log('Yardas: '+ yardas);
console.log('Kilos Total: '+ kilosT);
console.log('Resultado:' + four_pts);

$('#puntos').val(four_pts);
 
/* Descicion de imprimir o no el letrero de la dispocicion */
if(four_pts >=21){$('#men').text("*** Rollo de Segunda ***");}else{$('#men').text("");} 	

}

/*	Funcion de borrar rollo */
$('#update').click(function(){
$.getJSON('model/crudos_actualizar_rollo.php',{ 
	rollo: $('#nrollo').val(),
	fecha: $('#fecha').val(),
	maquina: $('#maquina').val(),
	auditor: $('#codigo_auditor').val(), 
	kilos: $('#kilos_rollos').val(),
	tipo_calidad: $('#tipo_calidad').val(),
	desperdicio: $('#ndesp').val(),
	razon_desp: $('#ndespt').val(),
	turno: $('#turno').val(),
	operador: $('#noperador').val()
 },function(data){
	switch(data['ok'])
	{
		case 0: toastr.error('EL rollo no existe'); Clr(); break; 
		case 1: toastr.success('Los datos fueron actualizados con exito.'); search_rollo();  $('#defectos_table').load("model/crudos_defectos_lista.php?rollo="+$('#nrollo').val()); break;
		case 2: alert('Ha fallado la conexion'); break; 
		}
	});	
	
});

/*	Funcion de borrar rollo */
$('#delete').click(function(){
	$('#triggerModalDelete').click();
});

/* Quitar la comillas */
function getwidth($string)
{
var mystring = $string;
mystring = mystring.replace('"','');
return mystring; 	
}

/*  */
$('#btnDelete').click(function(){
$.getJSON('model/crudos_borrar_rollo.php',{ 
	rollo: $('#nrollo').val()
},function(data){
	switch(data['ok'])
	{
		case 0: toastr.error('No se pudo borrar la data.'); Clr(); break; 
		case 1: location.href=""; break;
		case 2: alert('Ha fallado la conexion'); break; 
		}
	});		
});
</script>
</body>
</html>

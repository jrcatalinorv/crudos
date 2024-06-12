<?php 
require_once "model/conexion.php";
if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}
$date = date('Y-m-d'); 

if($_SESSION['perfil']==21){
	$ret = "auditoria-rollo";
}else{
	$ret = "menu";
}


$stmt  = Conexion::conectar()->prepare("SELECT * FROM usuarios where usuario ='".$_SESSION['usuario']."'");
$stmt -> execute();	
$results = $stmt -> fetch(); 




?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Auditoría de Crudos </title>
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> 
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">   
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md main-header navbar navbar-expand navbar-dark navbar-lightblue">
    <div class="container">
      <a href="" class="navbar-brand">       
        <span class="brand-text font-weight-light"><b> <i class="far fa-id-badge"></i> Mi Perfil </b></span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

 

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
 
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
      <div class="container">
     <div class="row mb-2 pt-1">
	    <div class="col-sm-12">
		<div class="btn-group">
            <a class="btn btn-default" href="<?php echo $ret; ?>" title="Regresar a ajustes"><i class="far fa-arrow-alt-circle-left"></i> Regresar </a>
			<a class="btn btn-default" href="" title="Recargar la página"><i class="fas fa-sync-alt"></i> Recargar </a>
         </div>		   
         </div>
     </div>	  
	  
<div class="row pt-1">
<div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-header"><h3 class="card-title"> Datos Personales </h3></div>
              <div class="card-body">             
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Código: </label>
                    <div class="col-sm-10">
					<input id="modalCodeEdit" type="text" maxlength="15" value="<?php echo $results['email']; ?>" class="form-control" placeholder="Usuario">
					<input id="modalCode" type="hidden" value="<?php echo $results['usuario']; ?>" class="form-control" >
					</div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Usuario: </label>
                    <div class="col-sm-10"><input id="modalUserEdit" maxlength="15" type="text" value="<?php echo $results['usuario']; ?>" class="form-control" placeholder="Usuario"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nombre: </label>
                    <div class="col-sm-10"><input id="modalFNameEdit" maxlength="15" type="text" value="<?php echo $results['nombre']; ?>" class="form-control" placeholder="Nombre"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Apellido: </label>
                    <div class="col-sm-10"><input id="modalLNameEdit" maxlength="15" type="text" value="<?php echo $results['apellido']; ?>" class="form-control" placeholder="Apellido"></div>
                  </div>
                </div> 
            <div class="card-footer">    
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-pass" ><i class="fas fa-lock"></i> Cambiar Clave </button>  
                  <button id="btnEditSave" type="button" class="btn btn-warning float-right"><i class="fas fa-edit"></i> Actualizar datos </button>
                </div>
			</div>
          </div>
</div>
 </div> 
</div>
</div>


<div class="modal fade" id="modal-pass">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">  Cambiar la contraseña </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="form-group"><input type="password" class="form-control" id="password0" placeholder="Contraseña Actual"></div>
				<div class="form-group"><input type="password" class="form-control" id="password1" placeholder="Nueva Contraseña"></div>
				<div class="form-group"><input type="password" class="form-control" id="password2" placeholder="Confirmar Contraseña"></div> 
            </div>
			 <div class="modal-footer justify-content-between">
              <button id="closeMeBtn" type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
              <button id="changePass" type="button" class="btn btn-success">  Actualizar </button>
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
<script src="view/plugins/datatables/jquery.dataTables.js"></script>
<script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="view/plugins/toastr/toastr.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
 $('#btnEditSave').click(function(){
$.getJSON('model/auditor_actualizar.php',{
		codigo:   $('#modalCodeEdit').val(),
		usuario:  $('#modalUserEdit').val(),
		nombre:   $('#modalFNameEdit').val(),
		apellido: $('#modalLNameEdit').val()
	 },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo guardar los cambios: '+ data['err']); break;
			case 1: $('#closeModalNIEdit').click(); toastr.success('Los datos fueron actualizados con exito.'); setTimeout(reload,1000);  	break;
		}
	}); 	
});
 
function reload(){location.href="";}

 
$('#changePass').click(function(){

if( !isEmpty($("#password0").val())){ 
  if( !isEmpty($("#password1").val())){
	if( !isEmpty($("#password2").val())){
	var newpass  = $("#password1").val();
	var conpass  = $("#password2").val(); 
	var pr = newpass.localeCompare(conpass);
	
	if(pr==0){
			$.getJSON('model/update_account_pass.php',{
		 code: $('#modalCode').val(),
		 pass: $("#password0").val(),
		 npass: newpass
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: toastr.success('Los Datos fueron actualizados de forma correcta.'); $('#closeMeBtn').click(); break;
			case 2: $('#password0').val(""); $('#password0').focus(); toastr.error('La clave actual no es correcta! '+data['err']); break;
		}
	});
		
	}else{
		$('#password1').val(""); 
		$('#password2').val(""); 
		$('#password1').focus(); 
		toastr.error('Las Claves no coinciden');
	}
}else{ $('#password2').focus();	toastr.error('Las Claves no coinciden'); }
}else{ $('#password1').focus();	toastr.error('Las Claves no coinciden'); }
}else{ $('#password0').focus(); toastr.error('La clave actual no es correcta! '); }
}); 

function isEmpty(str) {
    return (!str || 0 === str.length);
}

</script>
</body>
</html>

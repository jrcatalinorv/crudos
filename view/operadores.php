<?php 
if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}
$date = date('Y-m-d'); 

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
        <span class="brand-text font-weight-light"><b> <i class="fas fa-users-cog"></i> Operadores </b></span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
            <a class="btn btn-default" href="menu" title="Regresar a ajustes"><i class="far fa-arrow-alt-circle-left"></i> Regresar </a>
			<a class="btn btn-default" href="" title="Recargar la página"><i class="fas fa-sync-alt"></i> Recargar </a>
         </div>		   
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-nuevo" > <i class="fas fa-plus"></i> Nuevo </button>        
		 </div>
     </div>
	  
<div class="row pt-3">
 	<div class="col-md-12">
         <div class="card p-0">
            <div class="card-body">
              <table class="table table-bordered table-striped tablas table-sm">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombre Operador </th>
                  <th>Acciones </th>

                </tr>
                </thead>
                <tbody class="assetsList">
<?php 
require_once "model/conexion.php";
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM dk1_crudos_operadores");
$stmt2 -> execute();
 
while($results = $stmt2 -> fetch())
{
  echo '<tr>
	<td>'.$results["codigo"].'</td>
	<td>'.$results["nombre"].'</td>
	<td> <button type="button" class="btn btn-xs btn-warning btn-block btn-flat itemEdit"  
			codigo="'.$results['codigo'].'"  
			nombre="'.$results['nombre'].'" 
			title="Editar" ><i class="fas fa-edit"></i> Editar </button> </td>
	</tr>';	
}	
?>           
 </tfoot>
</table>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>


<!------- -------> 
<div id="triggerModalEdit"  data-toggle="modal" data-target="#modal-edit"> </div>
 
<div class="modal fade" id="modal-nuevo">
  <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo Record </h4>
              <button id="closeModalNI" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Código: </label>
                    <div class="col-sm-10">
                       <input id="modalCode" type="text" class="form-control" />
                    </div>
                  </div>				
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nombre: </label>
                    <div class="col-sm-10">
                       <input id="modalName" type="text" class="form-control" />
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


<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-edit"></i>Editar Datos </h4>
              <button id="closeModalNI" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Código: </label>
                    <div class="col-sm-10">
                       <input id="modalCodeEdit" type="text" class="form-control" />
                    </div>
                  </div>				
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nombre: </label>
                    <div class="col-sm-10">
                       <input id="modalNameEdit" type="text" class="form-control" />
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button id="closeModalNIEdit" type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> Cancelar </button>
              <button id="saveItemEdit" type="button" class="btn btn-warning"> <i class="fas fa-retweet"></i>  Actualizar </button>
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
<script src="view/plugins/datatables/jquery.dataTables.js"></script>
<script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="view/plugins/toastr/toastr.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$('.assetsList').on('click','button.itemEdit',function(){
	$('#modalCodeEdit').val($(this).attr('codigo'));
	$('#modalNameEdit').val($(this).attr('nombre'));	
	$('#triggerModalEdit').click();
});


$('#saveItem').click(function(){
$.getJSON('model/operador_incertar.php',{
		codigo: $('#modalCode').val(),
		nombre: $('#modalName').val()
	 },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: $('#closeModalNI').click(); clear(); toastr.success('Los datos fueron almacenados con exito.');  setTimeout(reload,1000); 	break;
		}
	}); 
});
 
$('#saveItemEdit').click(function(){
$.getJSON('model/operador_actualizar.php',{
		codigo: $('#modalCodeEdit').val(),
		nombre: $('#modalNameEdit').val()
	 },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo guardar los cambios: '+ data['err']); break;
			case 1: $('#closeModalNIEdit').click(); toastr.success('Los datos fueron actualizados con exito.');  setTimeout(reload,1000); 	break;
		}
	}); 	
}); 
 /* =============================================================== */
$(".tablas").DataTable({
	  "language": {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	}
   }); 
/* =============================================================== */

function clear(){
 $('#modalCode').val("");
 $('#modalName').val("");
}
function reload(){location.href="";}
</script>
</body>
</html>

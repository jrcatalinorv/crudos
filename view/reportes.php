<?php 
if($_SESSION["crudosSesion"] != "ok"){
	header('location: salir'); 
}
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Auditoría de Crudos </title>
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">    
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
            <a class="btn btn-default" href="menu" title="Regresar a ajustes"><i class="far fa-arrow-alt-circle-left"></i> Regresar </a>
			<a class="btn btn-default" href="" title="Recargar la página"><i class="fas fa-sync-alt"></i> Recargar </a>
         </div>		   
      
		 </div>
     </div>	
      </div> 
    </div>

    <div class="content">
      <div class="container">
	  
   	  
	  
<div class="row pt-1 optionPane">
  <div class="col-sm-12">
 
 <div class="card">
              <div class="card-body p-2">
                <div class="row">
                  <div class="col-6">
                  <label> Fecha de Inicio </label>
				  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input id="fecha_inicio" type="date" class="form-control">
                </div>
			 </div>
			 
                  <div class="col-6">
                  
                  <label> Fecha de Fin </label>
				  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input id="fecha_fin" type="date" class="form-control">
                </div>
                 
                </div>
              </div>
              <!-- /.card-body -->
            </div>
 
</div>


 
</div>
   

           
              
            <div class="col-sm-4  seletecOption" optUrl="reporte-general">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Reportes General Semanal  </span>
              </div>
            </div>   
            </div>  
			
            <div class="col-sm-4  seletecOption" optUrl="kilos-auditados">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number">Kilos Auditados  </span>
              </div>
            </div>   
            </div>             

			<div class="col-sm-4  seletecOption" optUrl="segundas">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number">Reporte de Segundas  </span>
              </div>
            </div>   
            </div>   
			
			<div class="col-sm-4  seletecOption2" optUrl="defectos-rollo">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Defectos x rollo  </span>
              </div>
            </div>   
            </div>   

         
			<div class="col-sm-4  seletecOption2" optUrl="desperdicios-turno">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Desperdicios x Turno  </span>
              </div>
            </div>   
            </div>   

    			<div class="col-sm-4  seletecOption2" optUrl="kilos-defectuosos-turno">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Kilos Defectuoso x Tuno  </span>
              </div>
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
<script src="view/plugins/toastr/toastr.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$('.optionPane').on('click','div.seletecOption',function(){
  if( isEmpty($('#fecha_inicio').val()) ){  toastr.error('Debe seleccionar una fecha de Inicio');    }else{
	 if( isEmpty($('#fecha_fin').val()) ){   toastr.error('Debe seleccionar una fecha de fin'); }else{
		location.href="index.php?ruta="+$(this).attr('optUrl')+"&sd="+$('#fecha_inicio').val()+"&ed="+$('#fecha_fin').val();	
	  }
	}
});


function isEmpty(str) {
    return (!str || 0 === str.length);
}


</script>
</body>
</html>


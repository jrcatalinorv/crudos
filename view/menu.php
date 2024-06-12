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
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md main-header navbar navbar-expand navbar-dark navbar-lightblue">
    <div class="container">
      <a href="" class="navbar-brand"><span class="brand-text font-weight-light"><b> Auditoría de Crudos </b></span></a>
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
        <div class="row mb-2">
          <div class="col-sm-6"><h1 class="m-0 text-dark"></h1></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Crudos</a></li>
              <li class="breadcrumb-item active"> Menu </li>
            </ol>
          </div> 
        </div> 
      </div> 
    </div>

    <div class="content">
      <div class="container">
<div class="row pt-3 optionPane">
 
         <div class="col-sm-4 seletecOption" optUrl="buscar-rollo" >
           <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-search"></i> </span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Buscar Rollos </span>
              </div>
            </div>   
            </div>                
              
            <div class="col-sm-4  seletecOption" optUrl="reportes">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Reportes  </span>
              </div>
            </div>   
            </div>   

          <div class="col-sm-4 seletecOption" optUrl="auditoria-rollo" >
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tasks"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> </span>
                <span style="margin-top:12px; " class="info-box-number"> Auditoría de Rollos  </span>
              </div>
            </div>
          </div>         

          <div class="col-sm-4 seletecOption" optUrl="operadores" >
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> </span>
                <span style="margin-top:12px; " class="info-box-number"> Operadores  </span>
              </div>
            </div>
          </div>

            <div class="col-sm-4 seletecOption" optUrl="usuarios" >
           <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Usuarios </span>
              </div>
            </div>   
            </div>                
              
            <div class="col-sm-4 seletecOption" optUrl="defectos">
           <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clipboard-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">  </span>
                <span style="margin-top:12px;" class="info-box-number"> Defectos  </span>
              </div>
            </div>   
            </div>   

          <div class="col-sm-4 seletecOption" optUrl="auditores">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> </span>
                <span style="margin-top:12px; " class="info-box-number"> Auditores  </span>
              </div>
            </div>
          </div>         

          <div class="col-sm-4 seletecOption" optUrl="mi-perfil">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="far fa-id-badge"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> </span>
                <span style="margin-top:12px; " class="info-box-number"> Mi perfil </span>
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
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$('.optionPane').on('click','div.seletecOption',function(){
	location.href=$(this).attr('optUrl');
});
</script>
</body>
</html>

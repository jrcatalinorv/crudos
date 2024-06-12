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
      <a href="" class="navbar-brand">       
        <span class="brand-text font-weight-light"><b> Auditoría de Crudos </b></span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"></ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
 
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars fa-lg"></i>
 
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
 
       
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-info">
              <i class="fas fa-user mr-2"></i> Mi perfil
 
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-danger">
              
			  <i class="fas fa-power-off mr-2"></i> Salir
 
			
 
            </a>
          </div>
        </li>
 
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">crudos</a></li>
              <li class="breadcrumb-item active"> NOT FOUND </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container">
<div class="row pt-3 optionPane">
 
      <div class="col-md-8 mx-auto"> 
	  <div class="callout callout-danger">
                  <h5> <i class="icon fas fa-ban text-danger"></i>  404 NOT FOUND  </h5>
                  <p>El menú que anda buscando no existe. En 5 segundos será redireccionado.</p>
                </div>
	  </div> 
        </div>
       
      </div> 
    </div>
    <!-- /.content -->
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
 setTimeout(gotoPage,3000);
 function gotoPage(){
	 location.href="menu";
 }
</script>
</body>
</html>

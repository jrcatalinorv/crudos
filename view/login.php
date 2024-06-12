<?php 
$d = new DateTime('', new DateTimeZone('America/Santo_Domingo')); 
$d->format('H:i a');
$hora_actual = intval($d->format('H'));
$date = getdate();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Auditoría de Crudos </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="view/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">  
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
 <style>  
</style>  
</head>
<body class="hold-transition login-page" style="background: url(view/dist/img/mop2.jpg) no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover; ">
<div class="login-box" >
 
  <!-- /.login-logo -->
  <div class="card"> 
    <div class="card-body login-card-body pt-4">
        <div class="login-logo pt-4">
    <a href=""><b>Auditoría  de Crudos </b></a>
  </div>
	  
	  <p class="login-box-msg"> - Dominican Knits -  </p>

   
        <div class="input-group mb-3 pt-3">
          <input type="text" id="user" name="usuario"  class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass"  name="clave" type="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"> </div>          
          <!-- /.col -->
        </div>
      

      <div class="social-auth-links text-center mb-3">
      
        <button id="login" type="button" class="btn btn-block btn-success"> Accedder <i class="fas fa-sign-in-alt mr-2"></i> </button>
     
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1 pt-3">
        
      </p>
      <p class="mb-3 pt-4">
    
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="view/plugins/jquery/jquery.min.js"></script>
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="view/plugins/toastr/toastr.min.js"></script>
<script src="view/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
var input = document.getElementById("pass");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("login").click();
  }
});

$('#login').click(function(){
$.getJSON('model/crudos_login.php',{			  	 
	usr: $('#user').val(),	    	 
	pass: $('#pass').val() 	 
	},function(data){
	   switch(data['ok'])
		{
			case 0: 
				toastr.error('Usuario o Clave Incorrectos'); 
				$('#user').val("");
				$('#pass').val("");
			  break;
			case 1: 
				 
				location.href=data['URL'];  
			break;		
		 }
	});				 
});  
</script> 
</body>
</html>
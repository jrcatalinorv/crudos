function flogin(){document.login.action ='inicio_crudos.php'; document.login.submit();}

function main_menu (num, num2){ 
var numero = num;
var numero2= num2;
switch ( numero )
{
	case 1: 
		switch(numero2)
		{
		case 25: location.href='knits/02-dk1/Crudos_Master/main_menu.php';break;
		case 21: location.href='knits/02-dk1/Crudos_Master/04/insertar_rollos.php';break;
		default: location.href='knits/02-dk1/Crudos_Master/main_menu.php'; break;
		}
	
	break
	case 2: location.href='logout_crudos.php';break
	case 3: 
		switch(numero2)
		{
		case 1: location.href='logout_crudos.php'; break
		case 2: location.href='logout_crudos.php'; break
		case 3: location.href='logout_crudos.php'; break
		case 4: location.href='logout_crudos.php'; break
		case 200: location.href='logout_crudos.php'; break
		case 500: location.href='logout_crudos.php'; break
		default: location.href='logout_crudos.php';  break
		}		
		break
	case 4: location.href='logout_crudos.php';break
	case 100: location.href='logout_crudos.php';break /* admin access - all view priviliges */
	case 200: location.href='logout_crudos.php';break /* admin access - some priviliges */
	case 500: location.href='knits/02-dk1/Crudos_Master/main_menu.php'; break /* admin access*/
} 
}

function num(e) {
evt = e ? e : event;
tcl = (window.Event) ? evt.which : evt.keyCode;
if ((tcl > 12 && tcl < 14)) { flogin() }
}

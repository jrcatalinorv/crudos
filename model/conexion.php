<?php
class Conexion{
	public static function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=crudos","crudos_admin","Scrudos@sytem2020");
		$link->exec("set names utf8");
		return $link;
	}
}
?>


<?php 

	require_once "mainModel.php";

	class loginModelo extends mainModel{

		 /* MODELO PARA INICIAR SESIÓN */

		 protected static function iniciar_sesion_modelo($datos){
		 	$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE curp=:curp AND password=:password");
		 	$sql->bindParam(":curp", $datos['curp']);
		 	$sql->bindParam(":password", $datos['password']);
		 	$sql->execute();
		 	return $sql;

		 }



		 protected static function getIdiomas(){
		 	$sql=mainModel::conectar()->prepare("SELECT * FROM idioma ORDER BY etiqueta_idioma");		 	
		 	$sql->execute();
		 	return $sql;
		 }
	}
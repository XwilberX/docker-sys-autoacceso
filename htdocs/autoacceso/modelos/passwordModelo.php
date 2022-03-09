<?php 

	require_once "mainModel.php";

	class passwordModelo extends mainModel{
		
		/* MODELO AGREGAR USUARIO */
		
		protected static function actualizar_password_modelo($datos){

		$conn=mainModel::conectar();
		$sql=$conn->prepare("UPDATE persona SET password=:password WHERE id_persona=:id");

			$sql->bindParam(":password",$datos['password']);
			$sql->bindParam(":id",$datos['id']);
			$sql->execute();
			
			return $sql;
			}
	}
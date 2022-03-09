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

		 protected static function getAsesores(){
		 	$sql=mainModel::conectar()->prepare("SELECT nombre,apellido_paterno,apellido_materno,id_persona,idioma_asesor FROM persona WHERE id_rol=4 OR id_rol=1 OR id_rol=2 ORDER BY nombre");		 	
		 	$sql->execute();
		 	return $sql;
		 }
		 
		/* CAMBIAR LA ASESORIA  A ESTATUS DE VENCIDA */

		protected static function asesoria_vencida_loguot_modelo($id){			

			$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='2' WHERE id_plantilla_horario=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();	

		}/* FIN DEL MODELO */
		
			protected static function asesoria_volver_agendada_modelo($id){

		$consulta=mainModel::conectar()->prepare("SELECT tiempo_hora_asesoria FROM plantilla_horarios WHERE id_plantilla_horario=:id");
			$consulta->bindParam(":id", $id);
			$consulta->execute();
			$dato=$consulta->fetch();

		if($dato['tiempo_hora_asesoria']!=2){
			$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='1' WHERE id_plantilla_horario=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
		}else{
			$consulta5_5=mainModel::conectar()->prepare("SELECT id_curso FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE plantilla_horarios.id_plantilla_horario=:id");
			$consulta5_5->bindParam(":id", $id);
			$consulta5_5->execute();
			
			if($consulta5_5->rowCount()<=4){
				$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='3' WHERE id_plantilla_horario=:id");
				$sql->bindParam(":id", $id);
				$sql->execute();			
			}
			if($consulta5_5->rowCount()==5){
				$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='1' WHERE id_plantilla_horario=:id");
				$sql->bindParam(":id", $id);
				$sql->execute();			
			}


		}		
	

		}/* FIN DEL MODELO */
	}
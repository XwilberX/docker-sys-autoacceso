<?php 

	require_once "mainModel.php";

	class usuarioModelo extends mainModel{
		
		/* MODELO AGREGAR USUARIO */
		
		protected static function agregar_usuario_modelo($datos){

		$sql=mainModel::conectar()->prepare("INSERT INTO persona(curp,nombre,apellido_paterno,apellido_materno,fecha_nacimiento,calle,numero,colonia,cp,telefono,correo,matricula,idioma_asesor,password,id_rol) VALUES(:curp,:nombre,:apellido_paterno,:apellido_materno,:fecha_nacimiento,:calle,:numero,:colonia,:cp,:telefono,:correo,:matricula,:idioma_asesor,:password,:id_rol)");

			if($datos['fecha_nacimiento']==""){
				$datos['fecha_nacimiento']=null;
			}		

			if($datos['idioma_asesor']==""){
				$datos['idioma_asesor']=0;
			}
				$sql->bindParam(":curp",$datos['curp']);
				$sql->bindParam(":nombre",$datos['nombre']);
				$sql->bindParam(":apellido_paterno",$datos['apellido_paterno']);
				$sql->bindParam(":apellido_materno",$datos['apellido_materno']);
				$sql->bindParam(":fecha_nacimiento",$datos['fecha_nacimiento']);
				$sql->bindParam(":calle",$datos['calle']);
				$sql->bindParam(":numero",$datos['numero']);
				$sql->bindParam(":colonia",$datos['colonia']);
				$sql->bindParam(":cp",$datos['cp']);
				$sql->bindParam(":telefono",$datos['telefono']);
				$sql->bindParam(":correo",$datos['correo']);
				$sql->bindParam(":matricula",$datos['matricula']);
				$sql->bindParam(":idioma_asesor",$datos['idioma_asesor']);
				$sql->bindParam(":password",$datos['password']);
				$sql->bindParam(":id_rol",$datos['id_rol']);
				$sql->execute();
			//$arr = $sql->errorInfo();
			//print_r($arr);
			//print_r($datos);
				return $sql;

		}
		
		/* MODELO ELIMINAR USUARIO */
		protected static function eliminar_usuario_modelo($curp){
			$sql=mainModel::conectar()->prepare("DELETE FROM persona WHERE curp=:curp");

			$sql->bindParam(":curp", $curp);
			$sql->execute();
			return $sql;


		} /* FIN DEL MODELO */

		/* MODELO DATOS PREINSCRITO */

		protected static function datos_usuario_modelo($tipo, $id){

			if($tipo=="Unico"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona=:id_persona");
				$sql->bindParam(":id_persona", $id);
			}elseif ($tipo=="Conteo"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona!=1");
			}
					$sql->execute();
					return $sql;
		}/* FIN DEL MODELO */

		protected static function editar_usuario_modelo($datos){
					$sql=mainModel::conectar()->prepare("UPDATE persona SET curp=:curp,nombre=:nombre,apellido_paterno=:apellido_paterno,apellido_materno=:apellido_materno,calle=:calle,numero=:numero,colonia=:colonia,cp=:cp,telefono=:telefono,correo=:correo,matricula=:matricula,idioma_asesor=:idioma_asesor,id_rol=:id_rol WHERE id_persona=:id");

					if($datos['idioma_asesor']==""){
				$datos['idioma_asesor']=null;
			}
				$sql->bindParam(":id",$datos['id']);
				$sql->bindParam(":curp",$datos['curp']);
				$sql->bindParam(":nombre",$datos['nombre']);
				$sql->bindParam(":apellido_paterno",$datos['apellido_paterno']);
				$sql->bindParam(":apellido_materno",$datos['apellido_materno']);
				$sql->bindParam(":calle",$datos['calle']);
				$sql->bindParam(":numero",$datos['numero']);
				$sql->bindParam(":colonia",$datos['colonia']);
				$sql->bindParam(":cp",$datos['cp']);
				$sql->bindParam(":telefono",$datos['telefono']);
				$sql->bindParam(":correo",$datos['correo']);
				$sql->bindParam(":matricula",$datos['matricula']);
				$sql->bindParam(":idioma_asesor",$datos['idioma_asesor']);
				$sql->bindParam(":id_rol",$datos['id_rol']);
				$sql->execute();
				
					//$arr = $sql->errorInfo();
					//print_r($arr);
					//print_r($datos);

				return $sql;
		}
		
		protected static function obtener_asesores_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT nombre,apellido_paterno,apellido_materno,id_persona,idioma_asesor,correo FROM persona WHERE id_rol=4 OR id_rol=1 OR id_rol=2 ORDER BY nombre");		 	
		 	$sql->execute();
		 	return $sql;
		}

	}

?>
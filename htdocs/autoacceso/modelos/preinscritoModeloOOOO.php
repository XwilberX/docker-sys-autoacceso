<?php 

	require_once "mainModel.php";

	class preinscritoModelo extends mainModel{
		
		/* MODELO AGREGAR USUARIO */
		
		protected static function agregar_preinscrito_modelo($datos){

		$conn=mainModel::conectar();
		$sql=$conn->prepare("INSERT INTO persona(curp,nombre,apellido_paterno,apellido_materno,sexo,fecha_nacimiento,calle,numero,colonia,cp,municipio,estado,telefono,correo,matricula,password,id_rol) VALUES(:curp,:nombre,:apellido_paterno,:apellido_materno,:sexo,:fecha_nacimiento,:calle,:numero,:colonia,:cp,:municipio,:estado,:telefono,:correo,:matricula,:password,:id_rol)");

				$sql->bindParam(":curp",$datos['curp']);
				$sql->bindParam(":nombre",$datos['nombre']);
				$sql->bindParam(":apellido_paterno",$datos['apellido_paterno']);
				$sql->bindParam(":apellido_materno",$datos['apellido_materno']);
				$sql->bindParam(":sexo",$datos['sexo']);
				$sql->bindParam(":fecha_nacimiento",$datos['fecha_nacimiento']);
				$sql->bindParam(":calle",$datos['calle']);
				$sql->bindParam(":numero",$datos['numero']);
				$sql->bindParam(":colonia",$datos['colonia']);
				$sql->bindParam(":cp",$datos['cp']);
				$sql->bindParam(":municipio",$datos['municipio']);
				$sql->bindParam(":estado",$datos['estado']);
				$sql->bindParam(":telefono",$datos['telefono']);
				$sql->bindParam(":correo",$datos['correo']);
				$sql->bindParam(":matricula",$datos['matricula']);
				$sql->bindParam(":password",$datos['password']);
				$sql->bindParam(":id_rol",$datos['id_rol']);
				
				$sql->execute();
				$id_persona = $conn->lastInsertId();
				
				$arreglo=array();
				if($datos['idioma']!=null){
					$arreglo[$datos['idioma']] = $datos['tipo'];
				}
				if($datos['idioma_dos']!=null){
					$arreglo[$datos['idioma_dos']] = $datos['tipo_dos'];
				}
				if($datos['idioma_tres']!=null){
					$arreglo[$datos['idioma_tres']] = $datos['tipo_tres'];
				}
				if($datos['idioma_cuatro']!=null){
					$arreglo[$datos['idioma_cuatro']] = $datos['tipo_cuatro'];
				}


				foreach ($arreglo as $key=>$value) {
					$datos['tipo']=$value;
					//$datos['nivel']=0;
					$datos['id_idioma']=$key;
					$sql=$conn->prepare("INSERT INTO curso_asesorias(tipo,id_persona_alumno,id_idioma) VALUES(:tipo,:id_persona_alumno,:id_idioma)");
					
					$sql->bindParam(":tipo",$datos['tipo']);
					//$sql->bindParam(":nivel",$datos['nivel']);
					$sql->bindParam(":id_persona_alumno",$id_persona);
					$sql->bindParam(":id_idioma",$datos['id_idioma']);
					
					$sql->execute();
				
				}

				
				return $sql;
				

		
/*
				$conn=mainModel::conectar();
				$x=$conn->query("INSERT INTO persona(curp,nombre,apellido_paterno,apellido_materno,sexo,fecha_nacimiento,calle,numero,colonia,cp,municipio,estado,telefono,correo,matricula,password,id_rol) VALUES('".$datos['curp']."','".$datos['nombre']."','".$datos['apellido_paterno']."','".$datos['apellido_materno']."','".$datos['sexo']."','".$datos['fecha_nacimiento']."','".$datos['calle']."','".$datos['numero']."','".$datos['colonia']."','".$datos['cp']."','".$datos['municipio']."','".$datos['estado']."','".$datos['telefono']."','".$datos['correo']."','".$datos['matricula']."','".$datos['password']."','".$datos['id_rol']."')");
				$temp = $conn->lastInsertId();
				print_r($temp);
*/					



				
			/*$conexion=mainModel::conectar();
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();*/
			//echo mainModel::get_id();


				//$ins_id = $sql->insert_id;
				//print_r($sql);
				 
				  //print $sql->lastInsertId();
				  //$id=mainModel::lastInsertId();

		}
		

	

		/* MODELO ELIMINAR USUARIO */
		protected static function eliminar_preinscrito_modelo($id){
			$sql=mainModel::conectar()->prepare("DELETE FROM curso_asesorias WHERE id_persona_alumno=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
			$sql=mainModel::conectar()->prepare("DELETE FROM persona WHERE id_persona=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
			return $sql;


		} /* FIN DEL MODELO */

		/* MODELO DATOS PREINSCRITO */

		protected static function datos_preinscrito_modelo($tipo, $id){



			if($tipo=="Unico"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM curso_asesorias JOIN persona ON (persona.id_persona=curso_asesorias.id_persona_alumno) JOIN idioma ON (curso_asesorias.id_idioma=idioma.id_idioma) WHERE persona.id_persona=:id");
				$sql->bindParam(":id", $id);
			}elseif ($tipo=="Conteo"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona!=1");
			}
					$sql->execute();
			return $sql;
		}
	}


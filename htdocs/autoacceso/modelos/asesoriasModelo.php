<?php 

	require_once "mainModel.php";

	class asesoriasModelo extends mainModel{

		protected static function agregar_horarios_asesor_modelo($datos){
		
		if($datos['tiempo_hora_asesoria']=="1"){
			$sql2=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE hora=:h AND dia=:dia AND id_persona_asesor=:id AND estatus_hora_asesoria!='2'");
			$sql2->bindParam(":id",$datos['id']);

			$sql3=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE ADDTIME(hora,'00:15:00')=:h  AND dia=:dia AND id_persona_asesor=:id AND (tiempo_hora_asesoria=0 OR tiempo_hora_asesoria=2 OR tiempo_hora_asesoria=3) AND estatus_hora_asesoria!='2'");
			$sql3->bindParam(":id",$datos['id']);



			$sql=mainModel::conectar()->prepare("INSERT INTO plantilla_horarios(dia,hora,tiempo_hora_asesoria,id_persona_asesor) VALUES(:dia,:hora,:tiempo_hora_asesoria,:id)");
			$sql->bindParam(":id",$datos['id']);
			$sql->bindParam(":tiempo_hora_asesoria",$datos['tiempo_hora_asesoria']);
					
						
					
					//print_r($datos['dia']);
					foreach ($datos['dia'] as $dia) {
						$hora3=floatval($datos['horarios3']);
					$hora4=floatval($datos['horarios4']);
					
					if($datos['rango']=="Unico"){
							$hora4=$hora3;
					}
					$sql->bindParam(":dia",$dia);
					while ($hora3<=$hora4) { 
						//echo '*'.$hora3.'*'.$hora4.'*';
						if(strpos((string)$hora3,'.1')==1 ||strpos((string)$hora3,'.1')==2){
							$h=intval($hora3).':00';
							//echo '#'.$h.'#';
						}
						if(strpos((string)$hora3,'.35')==1 || strpos((string)$hora3,'.35')==2){
							$h=intval($hora3).':15';
							//echo '/'.$h.'/';
						}
						if(strpos((string)$hora3,'.6')==1 || strpos((string)$hora3,'.6')==2){
							$h=intval($hora3).':30';
							//echo '&'.$h.'&';
						}
						if(strpos((string)$hora3,'.85')==1 || strpos((string)$hora3,'.85')==2){
							$h=intval($hora3).':45';
							//echo '!'.$h.'!';
						}

						$sql2->bindParam(":dia",$dia);
						$sql2->bindParam(":h",$h);
						$sql2->execute();
						$datos2=$sql2->fetch();

						$sql3->bindParam(":dia",$dia);
						if(strlen($h)==4){
							$hx='0'.$h.':00';
						}else{
							$hx=$h.':00';
						}
						$sql3->bindParam(":h",$hx);
						//print_r($hx);
						$sql3->execute();
						$datos3=$sql3->fetch();

						if($sql2->rowCount()==0 && $sql3->rowCount()==0){
							$sql->bindParam(":hora",$h);
							$sql->execute();
						}

						$hora3+=.25;
							

				// 		$sql3->debugDumpParams();
						//$arr = $sql->errorInfo();
						//print_r($arr);
						//$arr = $sql3->errorInfo();
						//print_r($arr);
						//print_r($sql3);
					}
				}

		}else{

			$sql2=mainModel::conectar()->prepare("SELECT * FROM plantilla_horarios WHERE hora=:h AND dia=:dia AND id_persona_asesor=:id AND estatus_hora_asesoria!='2'");
			$sql2->bindParam(":id",$datos['id']);

			$sql3=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE SUBTIME(hora,'00:15:00')=:h  AND dia=:dia AND id_persona_asesor=:id AND estatus_hora_asesoria!='2'");
			$sql3->bindParam(":id",$datos['id']);

			$sql=mainModel::conectar()->prepare("INSERT INTO plantilla_horarios(dia,hora,tiempo_hora_asesoria,id_persona_asesor) VALUES(:dia,:hora,:tiempo_hora_asesoria,:id)");
					//print_r($_SESSION['id_scaa']);
					$sql->bindParam(":id",$datos['id']);
					$sql->bindParam(":tiempo_hora_asesoria",$datos['tiempo_hora_asesoria']);
					//print_r($datos);
					
					//print_r($datos['dia']);
					foreach ($datos['dia'] as $dia) {
						$hora=floatval($datos['horarios']);
						$hora2=floatval($datos['horarios2']);
						
						if($datos['rango']=="Unico"){
							$hora2=$hora;
						}
						$sql->bindParam(":dia",$dia);

						while ($hora<=$hora2){ 
								//echo '*'.$hora.'*'.$hora2.'*';
							if(strpos((string)$hora,'.')==0){
								$h=intval($hora).':00';
							}else{
								$h=intval($hora).':30';
							}

							$sql2->bindParam(":dia",$dia);
							$sql2->bindParam(":h",$h);
							$sql2->execute();
							$datos2=$sql2->fetch();

							$sql3->bindParam(":dia",$dia);
						if(strlen($h)==4){
							$hx='0'.$h.':00';
						}else{
							$hx=$h.':00';
						}
						$sql3->bindParam(":h",$hx);
						//print_r($hx);
						$sql3->execute();
						// $sql3->debugDumpParams();
						// exit();
						$datos3=$sql3->fetch();
							
							if($sql2->rowCount()==0 && $sql3->rowCount()==0){
								$sql->bindParam(":hora",$h);
								$sql->execute();
							}
								
							$hora+=.5;
							
						}

					
					}
				}
				return $sql;
		}/* FIN DEL MODELO */
		

					
				
		/* MODELO ELIMINAR DISPONIBILIDAD DE HORARIO */
		protected static function eliminar_horario_dispo_modelo($id){

			$sql=mainModel::conectar()->prepare("DELETE FROM plantilla_horarios WHERE id_plantilla_horario=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();

			// $sql->debugDumpParams();
		
			return $sql;

					
		}/* FIN DEL MODELO */

			/* MODELO ACTUALIZAR DISPONIBILIDAD DE HORARIO */
		protected static function actualizar_horario_dispo_modelo($datos){


			
			if($datos['tiempo_hora_asesoria']=="1"){
				$sql2=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE id_persona_asesor=:id and dia=:dia AND hora=:h AND estatus_hora_asesoria!='2'");
				$sql2->bindParam(":id",$_SESSION['id_scaa']);
				$sql2->bindParam(":dia",$datos['dia']);

				//echo '#'.$_SESSION['id_scaa'].'#';
				//echo '#'.$datos['dia'].'#';

				$sql3=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE ADDTIME(hora,'00:15:00')=:h AND dia=:dia AND id_persona_asesor=:id AND (tiempo_hora_asesoria=0 OR tiempo_hora_asesoria=2 OR tiempo_hora_asesoria=3) AND estatus_hora_asesoria!='2'");
				$sql3->bindParam(":id",$_SESSION['id_scaa']);
				$sql3->bindParam(":dia",$datos['dia']);
				

				$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET hora=:hora WHERE id_plantilla_horario=:id");
				$sql->bindParam(":id",$datos['id']);
				
				$hora2=floatval($datos['hora2']);
		
					if(strpos((string)$hora2,'.1')==1 ||strpos((string)$hora2,'.1')==2){
						$h=intval($hora2).':00';
						//echo '#'.$h.'#';
					}
					if(strpos((string)$hora2,'.35')==1 || strpos((string)$hora2,'.35')==2){
						$h=intval($hora2).':15';
						//echo '/'.$h.'/';
					}
					if(strpos((string)$hora2,'.6')==1 || strpos((string)$hora2,'.6')==2){
						$h=intval($hora2).':30';
						//echo '&'.$h.'&';
					}
					if(strpos((string)$hora2,'.85')==1 || strpos((string)$hora2,'.85')==2){
						$h=intval($hora2).':45';
						//echo '!'.$h.'!';
					}
					//$sql2->bindParam(":dia",$dia);
					$sql2->bindParam(":h",$h);
					//echo '#'.$h.'#';
					$sql2->execute();

					$datos2=$sql2->fetch();
					
					if(strlen($h)==4){
						$hx='0'.$h.':00';
					}else{
						$hx=$h.':00';
					}
					$sql3->bindParam(":h",$hx);
					$sql3->execute();
//$sql3->debugDumpParams();
					$datos3=$sql3->fetch();
					if($sql2->rowCount()==0 && $sql3->rowCount()==0){

						$sql->bindParam(":hora",$h);
						$sql->execute();
					}
					$hora2+=.25;
					
					
			}else{

				$sql2=mainModel::conectar()->prepare("SELECT * FROM plantilla_horarios WHERE hora=:h AND dia=:dia AND id_persona_asesor=:id AND estatus_hora_asesoria!='2'");
				$sql2->bindParam(":id",$_SESSION['id_scaa']);
				$sql2->bindParam(":dia",$datos['dia']);

				$sql3=mainModel::conectar()->prepare( "SELECT * FROM plantilla_horarios WHERE SUBTIME(hora,'00:15:00')=:h  AND dia=:dia AND id_persona_asesor=:id AND estatus_hora_asesoria!='2'");
				$sql3->bindParam(":id",$_SESSION['id_scaa']);
				$sql3->bindParam(":dia",$datos['dia']);

				$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET hora=:hora WHERE id_plantilla_horario=:id");
				//print_r($_SESSION['id_scaa']);
				$sql->bindParam(":id",$datos['id']);
				//print_r($datos);
				
				$hora=floatval($datos['hora']);
				if(strpos((string)$hora,'.')==0){
					$h=intval($hora).':00';
				}else{
					$h=intval($hora).':30';
				}

				$sql2->bindParam(":h",$h);
				$sql2->execute();
				$datos2=$sql2->fetch();

				if(strlen($h)==4){
						$hx='0'.$h.':00';
					}else{
						$hx=$h.':00';
					}
					$sql3->bindParam(":h",$hx);
					$sql3->execute();
//$sql3->debugDumpParams();
					$datos3=$sql3->fetch();

				if($sql2->rowCount()==0 && $sql3->rowCount()==0){
					$sql->bindParam(":hora",$h);
					$sql->execute();
				}
				$hora+=.5;
				//$sql2->debugDumpParams();
			}
				
				return $sql;
		}

			protected static function agendar_asesoria_modelo($datos){

				$conn=mainModel::conectar();
				try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES plantilla_horarios, asesorias');
				$sql=$conn->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria=:estatus_hora_asesoria WHERE id_plantilla_horario=:id_asesoria_plantilla_horario");
				$sql->bindParam(":estatus_hora_asesoria",$datos['estatus_hora_asesoria']);
				$sql->bindParam(":id_asesoria_plantilla_horario",$datos['id_asesoria_plantilla_horario']);
					$sql->execute();

				$sql=$conn->prepare("INSERT INTO asesorias(fecha_asesoria,id_asesoria_plantilla_horario,id_curso) VALUES(:fecha_asesoria,:id_asesoria_plantilla_horario,:id_curso)");
					$sql->bindParam(":fecha_asesoria",$datos['fecha_asesoria']);
					$sql->bindParam(":id_asesoria_plantilla_horario",$datos['id_asesoria_plantilla_horario']);
					$sql->bindParam(":id_curso",$datos['id_curso']);
					$sql->execute();
					
				$sql2=$conn->prepare("SELECT id_asesoria FROM asesorias WHERE fecha_asesoria=:fecha_asesoria AND id_asesoria_plantilla_horario=:id_asesoria_plantilla_horario AND id_curso=:id_curso");
				$sql2->bindParam(":fecha_asesoria",$datos['fecha_asesoria']);
				$sql2->bindParam(":id_asesoria_plantilla_horario",$datos['id_asesoria_plantilla_horario']);
				$sql2->bindParam(":id_curso",$datos['id_curso']);

				$sql2->execute();
				$_SESSION['id_asesoria_agendada'] = $sql2->fetch();

				// 	 $_SESSION['id_asesoria_agendada'] = $conn->lastInsertId();
$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
}					
					//$arr = $sql->errorInfo();
					//print_r($arr);
					//$sql->debugDumpParams();
					return $sql;

			}/* FIN DEL MODELO */

			
			/* MODELO ELIMINAR DISPONIBILIDAD DE HORARIO */
		
		protected static function actualizar_link_asesorias_modelo($datos){

			$sql2=mainModel::conectar()->prepare( "SELECT link FROM persona WHERE id_persona=:id");
			$sql2->bindParam(":id",$datos['id']);
			$sql2->execute();
			$dato = $sql2->fetch(PDO::FETCH_ASSOC);	

					
			if($dato['link']=="null"){
				$sql=mainModel::conectar()->prepare("INSERT INTO persona (link) VALUES (:link) WHERE id_persona=:id");
				$sql->bindParam(":id",$datos['id']);
				$sql->bindParam(":link",$datos['link']);
				$sql->execute();
			}else{

				$conn=mainModel::conectar();
				$sql=$conn->prepare("UPDATE persona SET link=:link WHERE id_persona=:id");
				$sql->bindParam(":id",$datos['id']);
				$sql->bindParam(":link",$datos['link']);
				$sql->execute();

			}
			
			return $sql;

					
		}/* FIN DEL MODELO */


		/* ELIMINAR HORARIO NO APARTADO */

		protected static function elimnar_horario_cero_modelo($id){
			$sql=mainModel::conectar()->prepare("DELETE FROM plantilla_horarios WHERE estatus_hora_asesoria=0 AND id_plantilla_horario=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
			return $sql;

		}/* FIN DEL MODELO */


				/* CAMBIAR LA ASESORIA  A ESTATUS DE VENCIDA */

		protected static function asesoria_vencida_modelo($id){			

			$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='2' WHERE id_plantilla_horario=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
	

		}/* FIN DEL MODELO */


		/* BORRAR ASESORIA AGENDADA Y REESTABLECER HORARIO EN LISTA DE HORARIOS MODELO */

		protected static function borrar_asesoria_agendada_modelo($datos){	

			$consulta=mainModel::conectar()->prepare("SELECT tiempo_hora_asesoria FROM plantilla_horarios WHERE id_plantilla_horario=:id_actualizar");
			$consulta->bindParam(":id_actualizar", $datos['id_actualizar']);
			$consulta->execute();
			$dato=$consulta->fetch();
		
			if($dato['tiempo_hora_asesoria']==2){
				$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='3' WHERE id_plantilla_horario=:id_actualizar");
				$sql->bindParam(":id_actualizar", $datos['id_actualizar']);
				$sql->execute();

				$sql2=mainModel::conectar()->prepare("DELETE FROM asesorias WHERE id_asesoria=:id_borrar");
				$sql2->bindParam(":id_borrar", $datos['id_borrar']);
				$sql2->execute();

			}else{

				$consulta2=mainModel::conectar()->prepare("SELECT * FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE id_plantilla_horario=:id_actualizar");
				$consulta2->bindParam(":id_actualizar", $datos['id_actualizar']);
				$consulta2->execute();
				
				if($consulta2->rowCount()>=2){
					$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='1' WHERE id_plantilla_horario=:id_actualizar");
					$sql->bindParam(":id_actualizar", $datos['id_actualizar']);
					$sql->execute();
				}else{
					$sql=mainModel::conectar()->prepare("UPDATE plantilla_horarios SET estatus_hora_asesoria='0' WHERE id_plantilla_horario=:id_actualizar");
					$sql->bindParam(":id_actualizar", $datos['id_actualizar']);
					$sql->execute();
				}
				
				$sql2=mainModel::conectar()->prepare("DELETE FROM asesorias WHERE id_asesoria=:id_borrar");
				$sql2->bindParam(":id_borrar", $datos['id_borrar']);
				$sql2->execute();
			}

			return $sql2;
	

		}/* FIN DEL MODELO */

		/* ENVIAR DATOS DE LA ASESORIA */

			protected static function datos_asesoria_modelo($tipo,$id){			
			
			if($tipo=="Unico"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE asesorias.id_asesoria=:id");
				$sql->bindParam("id", $id);
			}elseif ($tipo=="Conteo"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona!=1");
			}
					$sql->execute();

					
					return $sql;
	

		}/* FIN DEL MODELO */


			protected static function avance_asesoria_modelo($datos){

			$sql2=mainModel::conectar()->prepare( "SELECT progreso FROM asesorias WHERE id_asesoria=:id");
			$sql2->bindParam(":id",$datos['id']);
			$sql2->execute();
			$dato = $sql2->fetch(PDO::FETCH_ASSOC);	
			// $sql->debugDumpParams();
					
			if($dato['progreso']=="null"){
				$sql=mainModel::conectar()->prepare("INSERT INTO asesorias (progreso) VALUES (:progreso) WHERE id_asesoria=:id");
				$sql->bindParam(":id",$datos['id']);
				$sql->bindParam(":progreso",$datos['progreso']);
				$sql->execute();
			}else{

				$conn=mainModel::conectar();
				$sql=$conn->prepare("UPDATE asesorias SET progreso=:progreso WHERE id_asesoria=:id");
				$sql->bindParam(":id",$datos['id']);
				$sql->bindParam(":progreso",$datos['progreso']);
				$sql->execute();

			}
			
			return $sql;

					
		}/* FIN DEL MODELO */


		/* ASESORIA DE ESTATUS COMPLETADA */
			protected static function completada_asesoria_modelo($datos){
				
				$sql=mainModel::conectar()->prepare("UPDATE asesorias SET completada=:completada WHERE id_asesoria=:id_asesoria");
				$sql->bindParam(":id_asesoria",$datos['id_asesoria']);
				$sql->bindParam(":completada",$datos['completada']);
				$sql->execute();			
				return $sql;

				//$sql->debugDumpParams();

					
		}/* FIN DEL MODELO */

				/* ENVIAR DATOS DE LA ASESORIA */

			protected static function datos_asesoria_coordinacion_modelo($tipo,$id){			
			
			if($tipo=="Unico"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM idioma ON persona.idioma_asesor=idioma.id_idioma WHERE (persona.id_rol='4' OR persona.id_rol='1' OR persona.id_rol='2') ORDER BY persona.nombre, persona.apellido_paterno, persona.apellido_materno");
				// $sql=mainModel::conectar()->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE persona.id_persona=:id");
				$sql->bindParam("id", $id);
			}elseif ($tipo=="Conteo"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona!=1");
			}
					$sql->execute();
 //$sql->debugDumpParams();
					
					return $sql;
	

		}/* FIN DEL MODELO */
		
				/* DEVOLVER LA ASESORÍA DE PASADA A AGENDADA  (POR SI SE DA EL FALLO) */

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
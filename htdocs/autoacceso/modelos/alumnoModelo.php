<?php 

	require_once "mainModel.php";

	class alumnoModelo extends mainModel{
		
		/* MODELO AGREGAR USUARIO */
		
		protected static function agregar_alumno_modelo($datos){

		$conn=mainModel::conectar();
		$sql=$conn->prepare("INSERT INTO persona(curp,nombre,apellido_paterno,apellido_materno,sexo,fecha_nacimiento,residencia,calle,numero,colonia,cp,municipio,estado,telefono,correo,correo_unach,dependencia,carrera_unach,matricula,password,id_rol,fecha_registro) VALUES(:curp,:nombre,:apellido_paterno,:apellido_materno,:sexo,:fecha_nacimiento,:residencia,:calle,:numero,:colonia,:cp,:municipio,:estado,:telefono,:correo,:correo_unach,:dependencia,:carrera_unach,:matricula,:password,:id_rol,:fecha_registro)");
			
try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES persona, curso_asesorias');
				$sql->bindParam(":curp",$datos['curp']);
				$sql->bindParam(":nombre",$datos['nombre']);
				$sql->bindParam(":apellido_paterno",$datos['apellido_paterno']);
				$sql->bindParam(":apellido_materno",$datos['apellido_materno']);
				$sql->bindParam(":sexo",$datos['sexo']);
				$sql->bindParam(":fecha_nacimiento",$datos['fecha_nacimiento']);
				$sql->bindParam(":residencia",$datos['residencia']);
				$sql->bindParam(":calle",$datos['calle']);
				$sql->bindParam(":numero",$datos['numero']);
				$sql->bindParam(":colonia",$datos['colonia']);
				$sql->bindParam(":cp",$datos['cp']);
				$sql->bindParam(":municipio",$datos['municipio']);
				$sql->bindParam(":estado",$datos['estado']);
				$sql->bindParam(":telefono",$datos['telefono']);
				$sql->bindParam(":correo",$datos['correo']);
				$sql->bindParam(":correo_unach",$datos['correo_unach']);
				$sql->bindParam(":dependencia",$datos['dependencia']);
				$sql->bindParam(":carrera_unach",$datos['carrera_unach']);
				$sql->bindParam(":matricula",$datos['matricula']);
				$sql->bindParam(":password",$datos['password']);
				$sql->bindParam(":id_rol",$datos['id_rol']);
				$sql->bindParam(":fecha_registro",$datos['fecha_registro']);
				$sql->execute();
				
				$id_persona = $conn->lastInsertId();

				//$arreglo=array();
				
				if($datos['idioma']!=null){
					$arreglo[$datos['idioma']] = array( 'tipo'=>$datos['tipo'],
														'nivel'=>$datos['nivel'],
														'refuerzo'=>$datos['refuerzo'],		
														'fecha_termino'=>$datos['fecha_termino'],
														'id_curso'=>$datos['id_curso'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc1'],
														'condicion'=>$datos['condicion']);
				}

				if($datos['idioma_dos']!=null){
					$arreglo[$datos['idioma_dos']] = array( 'tipo'=>$datos['tipo_dos'],
														'nivel'=>$datos['nivel_dos'],
														'refuerzo'=>$datos['refuerzo_dos'],		
														'fecha_termino'=>$datos['fecha_termino_dos'],
														'id_curso'=>$datos['id_curso2'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc2'],
														'condicion'=>$datos['condicion_dos']);
				}

				if($datos['idioma_tres']!=null){
					$arreglo[$datos['idioma_tres']] = array( 'tipo'=>$datos['tipo_tres'],
														'nivel'=>$datos['nivel_tres'],
														'refuerzo'=>$datos['refuerzo_tres'],		
														'fecha_termino'=>$datos['fecha_termino_tres'],
														'id_curso'=>$datos['id_curso3'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc3'],
														'condicion'=>$datos['condicion_tres']);
				}
				
				if($datos['idioma_cuatro']!=null){
					$arreglo[$datos['idioma_cuatro']] = array( 'tipo'=>$datos['tipo_cuatro'],
														'nivel'=>$datos['nivel_cuatro'],
														'refuerzo'=>$datos['refuerzo_cuatro'],		
														'fecha_termino'=>$datos['fecha_termino_cuatro'],
														'id_curso'=>$datos['id_curso4'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc4'],
														'condicion'=>$datos['condicion_cuatro']);
				}


				 foreach ($arreglo as $key=>$value) {
					$datos['tipo']=$value['tipo'];
					$datos['nivel']=$value['nivel'];
					$datos['refuerzo']=$value['refuerzo'];
					$datos['condicion']=$value['condicion'];
					$datos['fecha_termino']=$value['fecha_termino'];
					$datos['id_curso']=$value['id_curso'];
					$datos['periodo']=$value['periodo'];
					$datos['lc']=$value['lc'];
					$datos['id_idioma']=$key;


				$sql=$conn->prepare("INSERT INTO curso_asesorias(tipo,nivel,refuerzo,fecha_termino,condicion,periodo,observaciones,lc,id_persona_alumno,id_idioma) VALUES(:tipo,:nivel,:refuerzo,:fecha_termino,:condicion,:periodo,:observaciones,:lc,:id_persona_alumno,:id_idioma)");

				if($datos['fecha_termino']==""){
				$datos['fecha_termino']=null;
				}

					$sql->bindParam(":tipo",$datos['tipo']);
					$sql->bindParam(":nivel",$datos['nivel']);
					$sql->bindParam(":refuerzo",$datos['refuerzo']);
					$sql->bindParam(":fecha_termino",$datos['fecha_termino']);
					$sql->bindParam(":condicion",$datos['condicion']);
					$sql->bindParam(":periodo",$datos['periodo']);
					$sql->bindParam(":observaciones",$datos['observaciones']);
					$sql->bindParam(":lc",$datos['lc']);
					$sql->bindParam(":id_persona_alumno",$id_persona);
					$sql->bindParam(":id_idioma",$datos['id_idioma']);
					
					$sql->execute();
				}

				$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
}
					//$arr = $sql->errorInfo();
					//print_r($arr);
					//print_r($datos);
				
				return $sql;
				
		}
		

		/* MODELO ELIMINAR USUARIO */
		protected static function eliminar_alumno_modelo($id){

			$sql=mainModel::conectar()->prepare("DELETE FROM curso_asesorias WHERE id_persona_alumno=:id ");
			$sql->bindParam(":id", $id);
			$sql->execute();
			
			$sql=mainModel::conectar()->prepare("DELETE FROM persona WHERE id_persona=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
					
			return $sql;

					
		}/* FIN DEL MODELO */


			/* MODELO INSCRIBIR ALUMNO */
		protected static function inscribir_alumno_modelo($datos){
		
			$conn=mainModel::conectar();
				$sql=$conn->prepare("UPDATE persona SET curp=:curp,nombre=:nombre,apellido_paterno=:apellido_paterno,apellido_materno=:apellido_materno,sexo=:sexo,fecha_nacimiento=:fecha_nacimiento,calle=:calle,numero=:numero,colonia=:colonia,cp=:cp,municipio=:municipio,estado=:estado,telefono=:telefono,correo=:correo,correo_unach=:correo_unach,dependencia=:dependencia,carrera_unach=:carrera_unach,matricula=:matricula, id_rol=:id_rol WHERE id_persona=:id");
try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES persona, curso_asesorias');

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
					$sql->bindParam(":correo_unach",$datos['correo_unach']);
					$sql->bindParam(":dependencia",$datos['dependencia']);
					$sql->bindParam(":carrera_unach",$datos['carrera_unach']);
					$sql->bindParam(":matricula",$datos['matricula']);
					$sql->bindParam(":id_rol",$datos['id_rol']);
					$sql->bindParam(":id",$datos['id']);

					$sql->execute();


				if($datos['idioma']!=null){
					$arreglo[$datos['idioma']] = array( 'tipo'=>$datos['tipo'],
														'nivel'=>$datos['nivel'],
														'refuerzo'=>$datos['refuerzo'],		
														'fecha_termino'=>$datos['fecha_termino'],
														'id_curso'=>$datos['id_curso'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc1'],
														'condicion'=>$datos['condicion']);
				}

				if($datos['idioma_dos']!=null){
					$arreglo[$datos['idioma_dos']] = array( 'tipo'=>$datos['tipo_dos'],
														'nivel'=>$datos['nivel_dos'],
														'refuerzo'=>$datos['refuerzo_dos'],		
														'fecha_termino'=>$datos['fecha_termino_dos'],
														'id_curso'=>$datos['id_curso2'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc2'],
														'condicion'=>$datos['condicion_dos']);
				}

				if($datos['idioma_tres']!=null){
					$arreglo[$datos['idioma_tres']] = array( 'tipo'=>$datos['tipo_tres'],
														'nivel'=>$datos['nivel_tres'],
														'refuerzo'=>$datos['refuerzo_tres'],		
														'fecha_termino'=>$datos['fecha_termino_tres'],
														'id_curso'=>$datos['id_curso3'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc3'],
														'condicion'=>$datos['condicion_tres']);
				}
				
				if($datos['idioma_cuatro']!=null){
					$arreglo[$datos['idioma_cuatro']] = array( 'tipo'=>$datos['tipo_cuatro'],
														'nivel'=>$datos['nivel_cuatro'],
														'refuerzo'=>$datos['refuerzo_cuatro'],		
														'fecha_termino'=>$datos['fecha_termino_cuatro'],
														'id_curso'=>$datos['id_curso4'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc4'],
														'condicion'=>$datos['condicion_cuatro']);
				}


				 foreach ($arreglo as $key=>$value) {
					$datos['tipo']=$value['tipo'];
					$datos['nivel']=$value['nivel'];
					$datos['refuerzo']=$value['refuerzo'];
					$datos['condicion']=$value['condicion'];
					$datos['fecha_termino']=$value['fecha_termino'];
					$datos['id_curso']=$value['id_curso'];
					$datos['periodo']=$value['periodo'];
					$datos['lc']=$value['lc'];
					$datos['id_idioma']=$key;

			//$conn=mainModel::conectar();
					//if($datos['fecha_termino']==""){$datos['fecha_termino']=null;}
					
					if($datos['id_curso']==""){

						$sql=$conn->prepare("INSERT INTO curso_asesorias(tipo,nivel,refuerzo,fecha_termino,condicion,periodo,observaciones,lc,id_persona_alumno,id_idioma) VALUES(:tipo,:nivel,:refuerzo,:fecha_termino,:condicion,:periodo,:observaciones,:lc,:id_persona_alumno,:id_idioma)");
						$sql->bindParam(":id_persona_alumno",$datos['id']);
					}else{


					$sql=$conn->prepare("UPDATE curso_asesorias SET tipo=:tipo,nivel=:nivel,refuerzo=:refuerzo,fecha_termino=:fecha_termino,condicion=:condicion,periodo=:periodo,observaciones=:observaciones,lc=:lc,id_idioma=:id_idioma WHERE id_curso_asesoria=:id_curso");
						$sql->bindParam(":id_curso",$datos['id_curso']);
					}


				if($datos['fecha_termino']==""){
					$datos['fecha_termino']=null;
				}
			
				$sql->bindParam(":tipo",$datos['tipo']);
				$sql->bindParam(":nivel",$datos['nivel']);
				$sql->bindParam(":refuerzo",$datos['refuerzo']);
				$sql->bindParam(":fecha_termino",$datos['fecha_termino']);
				$sql->bindParam(":condicion",$datos['condicion']);
				$sql->bindParam(":periodo",$datos['periodo']);
				$sql->bindParam(":observaciones",$datos['observaciones']);
				$sql->bindParam(":lc",$datos['lc']);
				$sql->bindParam(":id_idioma",$datos['id_idioma']);

				$sql->execute();
			}				
$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
}			
				return $sql;
				
		}/* FIN DEL MODELO */
			
					//$arr = $sql->errorInfo();
					//print_r($arr);
				//print_r($datos);
				//print_r($id_persona);

		/* MODELO DATOS ALUMNO */

		protected static function datos_alumno_modelo($tipo, $id){

			if($tipo=="Unico"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM curso_asesorias JOIN persona ON (persona.id_persona=curso_asesorias.id_persona_alumno) JOIN idioma ON (curso_asesorias.id_idioma=idioma.id_idioma) WHERE persona.id_persona=:id");
				$sql->bindParam(":id", $id);
			}elseif ($tipo=="Conteo"){
				$sql=mainModel::conectar()->prepare("SELECT * FROM persona WHERE id_persona!=1");
			}
					$sql->execute();
					return $sql;
		}/* FIN DEL MODELO */




					/* MODELO EDITAR ALUMNO */
		protected static function editar_alumno_modelo($datos){
				
				//print_r($datos);
				$variable_errores=0;
				
				$conn=mainModel::conectar();
try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES persona, curso_asesorias');
				if(!$x=$conn->query("UPDATE persona SET curp='".$datos['curp']."',nombre='".$datos['nombre']."',apellido_paterno='".$datos['apellido_paterno']."',apellido_materno='".$datos['apellido_materno']."',sexo='".$datos['sexo']."',fecha_nacimiento='".$datos['fecha_nacimiento']."',residencia='".$datos['residencia']."',calle='".$datos['calle']."',numero='".$datos['numero']."',colonia='".$datos['colonia']."',cp='".$datos['cp']."',municipio='".$datos['municipio']."',estado='".$datos['estado']."',telefono='".$datos['telefono']."',correo='".$datos['correo']."',correo_unach='".$datos['correo_unach']."',dependencia='".$datos['dependencia']."',carrera_unach='".$datos['carrera_unach']."',matricula='".$datos['matricula']."' WHERE id_persona='".$datos['id']."'")){
					
					$variable_errores=1;
				
				}

				if($datos['idioma']!=null){
					$arreglo[$datos['idioma']] = array( 'tipo'=>$datos['tipo'],
														'nivel'=>$datos['nivel'],
														'refuerzo'=>$datos['refuerzo'],		
														'fecha_termino'=>$datos['fecha_termino'],
														'id_curso'=>$datos['id_curso'],
														'periodo'=>$datos['periodo'],
														'lc'=>$datos['lc1'],
														'condicion'=>$datos['condicion']);
				}

				if($datos['idioma_dos']!=null){
					$arreglo[$datos['idioma_dos']] = array( 'tipo'=>$datos['tipo_dos'],
														'nivel'=>$datos['nivel_dos'],
														'refuerzo'=>$datos['refuerzo_dos'],		
														'fecha_termino'=>$datos['fecha_termino_dos'],
														'id_curso'=>$datos['id_curso2'],
														'periodo'=>$datos['periodo2'],
														'lc'=>$datos['lc2'],
														'condicion'=>$datos['condicion_dos']);
				}

				if($datos['idioma_tres']!=null){
					$arreglo[$datos['idioma_tres']] = array( 'tipo'=>$datos['tipo_tres'],
														'nivel'=>$datos['nivel_tres'],
														'refuerzo'=>$datos['refuerzo_tres'],		
														'fecha_termino'=>$datos['fecha_termino_tres'],
														'id_curso'=>$datos['id_curso3'],
														'periodo'=>$datos['periodo3'],
														'lc'=>$datos['lc3'],
														'condicion'=>$datos['condicion_tres']);
				}
				
				if($datos['idioma_cuatro']!=null){
					$arreglo[$datos['idioma_cuatro']] = array( 'tipo'=>$datos['tipo_cuatro'],
														'nivel'=>$datos['nivel_cuatro'],
														'refuerzo'=>$datos['refuerzo_cuatro'],		
														'fecha_termino'=>$datos['fecha_termino_cuatro'],
														'id_curso'=>$datos['id_curso4'],
														'periodo'=>$datos['periodo4'],
														'lc'=>$datos['lc4'],
														'condicion'=>$datos['condicion_cuatro']);
				}


				 foreach ($arreglo as $key=>$value) {
					$datos['tipo']=$value['tipo'];
					$datos['nivel']=$value['nivel'];
					$datos['refuerzo']=$value['refuerzo'];
					$datos['condicion']=$value['condicion'];
					$datos['fecha_termino']=$value['fecha_termino'];
					$datos['id_curso']=$value['id_curso'];
					$datos['periodo']=$value['periodo'];
					$datos['lc']=$value['lc'];
					$datos['id_idioma']=$key;

					
				/*if($datos['fecha_termino']==""){
					$datos['fecha_termino']="null";
					
				}*/
					if($datos['id_curso']==""){
						if($datos['fecha_termino']==""){
							$s="INSERT INTO curso_asesorias(tipo,nivel,refuerzo,fecha_termino,condicion,periodo,lc,observaciones,id_persona_alumno,id_idioma) VALUES('".$datos['tipo']."','".$datos['nivel']."','".$datos['refuerzo']."',null,'".$datos['condicion']."','".$datos['periodo']."','".$datos['lc']."','".$datos['observaciones']."',".$datos['id'].",".$datos['id_idioma'].")";
						}else{

						$s="INSERT INTO curso_asesorias(tipo,nivel,refuerzo,fecha_termino,condicion,periodo,lc,observaciones,id_persona_alumno,id_idioma) VALUES('".$datos['tipo']."','".$datos['nivel']."','".$datos['refuerzo']."','".$datos['fecha_termino']."','".$datos['condicion']."','".$datos['periodo']."','".$datos['lc']."','".$datos['observaciones']."',".$datos['id'].",".$datos['id_idioma'].")";
						}
						if(!$x=$conn->query($s)){
					
					//$variable_errores=1;
					//$arr = $conn->errorInfo();
							//print_r($arr);
							//echo $s;
					
				}
						
					}else{
						if($datos['fecha_termino']==""){
					
					$s="UPDATE curso_asesorias SET tipo='".$datos['tipo']."',nivel='".$datos['nivel']."',refuerzo='".$datos['refuerzo']."',fecha_termino=null,condicion='".$datos['condicion']."',periodo='".$datos['periodo']."',lc='".$datos['lc']."',observaciones='".$datos['observaciones']."',id_idioma='".$datos['id_idioma']."' WHERE id_curso_asesoria='".$datos['id_curso']."'";
				}else{

						$s="UPDATE curso_asesorias SET tipo='".$datos['tipo']."',nivel='".$datos['nivel']."',refuerzo='".$datos['refuerzo']."',fecha_termino='".$datos['fecha_termino']."',condicion='".$datos['condicion']."',periodo='".$datos['periodo']."',lc='".$datos['lc']."',observaciones='".$datos['observaciones']."',id_idioma='".$datos['id_idioma']."' WHERE id_curso_asesoria='".$datos['id_curso']."'";
				}
						if(!$x=$conn->query($s)){
							$variable_errores=1;
							
							
					//$arr = $conn->errorInfo();
							//print_r($arr);
							//echo $s;
							 // $s->debugDumpParams();
							
						}
					}
				
				}
				//print_r($datos);

				$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
}	
				return $variable_errores;
				
		}/* FIN DEL MODELO */


				/* MODELO ELIMINAR CURSO_ASESORIA */
		protected static function eliminar_curso_asesoria_modelo($id){

			$sql=mainModel::conectar()->prepare("DELETE FROM curso_asesorias WHERE id_curso_asesoria=:id");
			$sql->bindParam(":id", $id);
			$sql->execute();
				
			return $sql;

					
		}/* FIN DEL MODELO */

		protected static function finalizar_periodo_modelo($periodo){
			/*$consulta=mainModel::conectar()->prepare("SELECT id_persona_alumno FROM curso_asesorias WHERE periodo=:periodo GROUP BY id_persona_alumno HAVING COUNT(*)<2");
			$consulta->bindParam(":periodo", $periodo);
			$consulta->execute();
			$datos = $consulta->fetchAll();

			foreach ($datos as $rows){
				$sql2=mainModel::conectar()->prepare("UPDATE persona SET id_rol=8 WHERE id_persona=:id_persona_alumno AND id_rol=6" );
				$sql2->bindParam(":id_persona_alumno", $rows['id_persona_alumno']);
				$sql2->execute();				
			}*/

			$sql=mainModel::conectar()->prepare("UPDATE curso_asesorias SET estatus_periodo=0 WHERE periodo=:periodo");
			$sql->bindParam(":periodo", $periodo);
			$sql->execute();
				// $sql->debugDumpParams();
			return $sql;

					
		}/* FIN DEL MODELO */


		/* MODELO PARA SOLICITAR/CANCELAR REINSCRIPCIÓN */
		protected static function solicitar_reinscripcion_modelo($datos){

			if($datos['solicitar']=="1"){
				if($datos['nivel']!=""){

					$sql=mainModel::conectar()->prepare("UPDATE curso_asesorias SET estatus_periodo=:solicitar,nivel=:nivel,condicion=:condicion,refuerzo=:refuerzo,periodo=:periodo,fecha_termino=:fecha_termino,nivel=:nivel,lc=:lc,observaciones=:observaciones WHERE id_curso_asesoria=:id_curso_asesoria");
					$sql->bindParam(":solicitar", $datos['solicitar']);
					$sql->bindParam(":id_curso_asesoria", $datos['id_curso_asesoria']);
					$sql->bindParam(":nivel", $datos['nivel']);
					$sql->bindParam(":condicion", $datos['condicion']);
					$sql->bindParam(":refuerzo", $datos['refuerzo']);
					$sql->bindParam(":periodo", $datos['periodo']);
					$sql->bindParam(":fecha_termino", $datos['fecha_termino']);
					$sql->bindParam(":nivel", $datos['nivel']);
					$sql->bindParam(":lc", $datos['lc']);
					$sql->bindParam(":observaciones", $datos['observaciones']);
					$sql->execute();
					
					$sql2=mainModel::conectar()->prepare("UPDATE persona SET id_rol=6 WHERE id_persona=:id_persona");
					$sql2->bindParam(":id_persona", $datos['id_persona']);
					$sql2->execute();

				}else{

					$sql=mainModel::conectar()->prepare("UPDATE curso_asesorias SET estatus_periodo=:solicitar,periodo=:periodo,observaciones=:observaciones WHERE id_curso_asesoria=:id_curso_asesoria");
					$sql->bindParam(":solicitar", $datos['solicitar']);
					$sql->bindParam(":id_curso_asesoria", $datos['id_curso_asesoria']);
					$sql->bindParam(":periodo", $datos['periodo']);
					$sql->bindParam(":observaciones", $datos['observaciones']);
					$sql->execute();
					
					$sql2=mainModel::conectar()->prepare("UPDATE persona SET id_rol=6 WHERE id_persona=:id_persona");
					$sql2->bindParam(":id_persona", $datos['id_persona']);
					$sql2->execute();
					// $sql->debugDumpParams();
				}

			}else{

				$sql=mainModel::conectar()->prepare("UPDATE curso_asesorias SET estatus_periodo=:solicitar,tiempo=:tiempo WHERE id_curso_asesoria=:id_curso_asesoria");
				$sql->bindParam(":solicitar", $datos['solicitar']);
				$sql->bindParam(":id_curso_asesoria", $datos['id_curso_asesoria']);
				$sql->bindParam(":tiempo", $datos['tiempo']);
				$sql->execute();
			}
				
			return $sql;

					
		}/* FIN DEL MODELO */

		/* MODELO ELIMINAR CURSO_ASESORIA */
		protected static function solicitar_nuevos_cursos_modelo($datos){

			$conn=mainModel::conectar();
			try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES curso_asesorias');

			if($datos['idioma_dos']!=null){
					$arreglo[$datos['idioma_dos']] =array( 'tipo'=>$datos['tipo_dos'],
														'nivel'=>$datos['nivel_dos']);
				}
				if($datos['idioma_tres']!=null){
					$arreglo[$datos['idioma_tres']] =array( 'tipo'=>$datos['tipo_tres'],
														'nivel'=>$datos['nivel_tres']);
				}
				if($datos['idioma_cuatro']!=null){
					$arreglo[$datos['idioma_cuatro']] =array( 'tipo'=>$datos['tipo_cuatro'],
														'nivel'=>$datos['nivel_cuatro']);
				}

	
				foreach ($arreglo as $key=>$value) {
					$datos['tipo']=$value['tipo'];
					$datos['nivel']=$value['nivel'];
					$datos['id_idioma']=$key;
					$sql=$conn->prepare("INSERT INTO curso_asesorias(tipo,nivel,id_persona_alumno,id_idioma,estatus_periodo) VALUES(:tipo,:nivel,:id_persona_alumno,:id_idioma,:estatus_periodo)");
					
					$sql->bindParam(":tipo",$datos['tipo']);
					$sql->bindParam(":nivel",$datos['nivel']);
					$sql->bindParam(":id_persona_alumno",$datos['id_persona_alumno']);
					$sql->bindParam(":id_idioma",$datos['id_idioma']);
					$sql->bindParam(":estatus_periodo",$datos['estatus_periodo']);
					
					$sql->execute();
				}
					$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!";
}
					return $sql;
			
		}/* FIN DEL MODELO */


		/* MODELO PARA ACTIVAR/DESACTIVAR UN IDIOMA */
		protected static function modificar_curso_asesoria_modelo($datos){
			$sql=mainModel::conectar()->prepare("UPDATE curso_asesorias SET estatus_periodo=:estatus_periodo WHERE id_curso_asesoria=:id_curso_asesoria");
				$sql->bindParam(":estatus_periodo", $datos['estatus_periodo']);
				$sql->bindParam(":id_curso_asesoria", $datos['id_curso_asesoria']);
				$sql->execute();
				// $sql->debugDumpParams();
				return $sql;

		}/* FIN DEL MODELO */

				/* MODELO ACTIVAR A UN ALUMNO */
		protected static function activar_alumno_modelo($id){

			$sql=mainModel::conectar()->prepare("UPDATE persona SET id_rol=6 WHERE id_persona=:id_persona");
			$sql->bindParam(":id_persona", $id);
			$sql->execute();
				
			return $sql;

					
		}/* FIN DEL MODELO */


	}



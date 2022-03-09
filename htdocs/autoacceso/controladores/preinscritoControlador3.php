<?php 

	if($peticionAjax){
		require_once "../modelos/preinscritoModelo.php";
	}else{
		require_once "./modelos/preinscritoModelo.php";
	}
	
	class preinscritoControlador extends preinscritoModelo{

		public function agregar_preinscrito_controlador(){

			$nombre=mainModel::limpiar_cadena($_POST['nombre_preins_reg']);
			$apellido_paterno=mainModel::limpiar_cadena($_POST['apellido_paterno_reg']);
			$apellido_materno=mainModel::limpiar_cadena($_POST['apellido_materno_reg']);
			$curp=mainModel::limpiar_cadena($_POST['curp_alumno_reg']);
			$sexo=mainModel::limpiar_cadena($_POST['sex_preins_reg']);
			$idioma=mainModel::limpiar_cadena($_POST['idioms_reg']);
			$tipo=mainModel::limpiar_cadena($_POST['tipo_preins_reg']);
			$nivel1=mainModel::limpiar_cadena($_POST['nivel1']);

			$idioma_dos=mainModel::limpiar_cadena($_POST['idioms_reg2']);
			$tipo_dos=mainModel::limpiar_cadena($_POST['tipo1']);
			$nivel2=mainModel::limpiar_cadena($_POST['nivel2']);

			$idioma_tres=mainModel::limpiar_cadena($_POST['idioms_reg3']);
			$tipo_tres=mainModel::limpiar_cadena($_POST['tipo2']);
			$nivel3=mainModel::limpiar_cadena($_POST['nivel3']);

			$idioma_cuatro=mainModel::limpiar_cadena($_POST['idioms_reg4']);
			$tipo_cuatro=mainModel::limpiar_cadena($_POST['tipo3']);
			$nivel4=mainModel::limpiar_cadena($_POST['nivel4']);

			$fecha_nacimiento=mainModel::limpiar_cadena($_POST['fecha_nacimiento_ins_reg']);

			$calle=mainModel::limpiar_cadena($_POST['calle_reg']);
			$numero=mainModel::limpiar_cadena($_POST['num_reg']);
			$colonia=mainModel::limpiar_cadena($_POST['col_reg']);
			$cp=mainModel::limpiar_cadena($_POST['cp_ins_Reg']);
			$municipio=mainModel::limpiar_cadena($_POST['municipio_ins_Reg']);
			$estado=mainModel::limpiar_cadena($_POST['estado_ins_Reg']);
			$telefono=mainModel::limpiar_cadena($_POST['tel_reg']);
			$correo=mainModel::limpiar_cadena($_POST['correo_reg']);
			$matricula=mainModel::limpiar_cadena($_POST['matricula_reg']);
			$dependencia=mainModel::limpiar_cadena($_POST['dependencia']);

			$password=mainModel::limpiar_cadena($_POST['pass_reg']);
			$confirmPass=mainModel::limpiar_cadena($_POST['pass2_reg']);
			$fecha_registro=date("Y-m-d",strtotime("Today"));
			$fecha_restric=date("Y-m-d",strtotime("Today -14 years"));
			$id_rol="7";
			

			/* COMPROBAR CAMPOS VACIOS */

			if($nombre=="" || $apellido_paterno=="" || $apellido_materno=="" || $curp=="" || $sexo=="" || $tipo=="" || $idioma=="" ||  $fecha_nacimiento=="" || $calle=="" || $numero=="" || $colonia=="" || $cp=="" || $municipio=="" || $estado==""  || $telefono=="" || $correo==""  || $password=="" || $confirmPass=="" || $nivel1=="" ){

					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}


				/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
					if(mainModel::verificar_datos("[a-zA-Z0-9]{18,18}",$curp)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El CURP no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

					if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}",$nombre)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El Nombre no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}",$apellido_paterno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El Apellido paterno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}",$apellido_materno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El Apellido materno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$calle)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El campo calle no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[0-9]{1,5}",$numero)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El campo número no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						
						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}",$colonia)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El campo colonia no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}


						if(mainModel::verificar_datos("[0-9]{5,5}",$cp)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El código postal no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$municipio)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El municipio no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}",$estado)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El estado no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}


						if($tipo !="Inscripción" && $tipo !="Reinscripción"){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El tipo de inscripción solicitado no es válido",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if($sexo !="Masculino" && $sexo !="Femenino"){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El tipo de sexo solicitado no es válido",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}




						if(mainModel::verificar_datos("[0-9]{10,10}",$telefono)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El teléfono no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						
					if($matricula!=""){
					if(mainModel::verificar_datos("[a-zA-Z0-9]{2,15}",$matricula)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"La matrícula no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
					}

/*
					if($idioma!=""){
						if(mainModel::verificar_datos("[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}",$idioma)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El idioma no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}
				}

				*/

						if(mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}",$password) || mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}",$confirmPass)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Las contraseñas no coinciden con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}


					if(mainModel::verificar_fecha($fecha_nacimiento)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"La fecha de nacimiento no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						
					if($fecha_nacimiento<"1940-01-01" || $fecha_nacimiento>$fecha_restric){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"La fecha de nacimiento introducida no es correcta, verifíquela.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();

					}


						/* COMPROBANDO CURP */

						$check_curp=mainModel::ejecutar_consulta_simple("SELECT curp FROM persona WHERE curp='$curp'");
						if($check_curp->rowCount()>0){
							$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El CURP ingresado ya se encuentra registrado en el sistema. Verifique sus datos",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();


					}
							
							/*COMPROBAR LAS CLAVES*/ 

						if($password != $confirmPass){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Las claves que acaba de ingresar no coinciden",
							"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}else{
							$claveEncriptada=mainModel::encryption($password);
						}


                    if($nivel1=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el nivel de inscripción del idioma 1 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
					
					if($idioma_dos!=""){
						if($idioma_dos!="1" && $idioma_dos!="2" && $idioma_dos!="3" && $idioma_dos!="4" && $idioma_dos!="5" && $idioma_dos!="6"){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El idioma 2 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
							"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();

							}

							if($tipo_dos=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el tipo de inscripción del idioma 2 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($tipo_dos!="Inscripción" && $tipo_dos!="Reinscripción"){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"El tipo de Inscripción 2 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($nivel2=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el nivel de inscripción del idioma 2 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
						}

					if($idioma_tres!=""){
						if($idioma_tres!="1" && $idioma_tres!="2" && $idioma_tres!="3" && $idioma_tres!="4" && $idioma_tres!="5" && $idioma_tres!="6"){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El idioma 3 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
							"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();

							}

							if($tipo_tres=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el tipo de inscripción del idioma 3 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($tipo_tres!="Inscripción" && $tipo_tres!="Reinscripción"){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"El tipo de Inscripción 3 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($nivel3=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el nivel de inscripción del idioma 3 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
						}


					if($idioma_cuatro!=""){
						if($idioma_cuatro!="1" && $idioma_cuatro!="2" && $idioma_cuatro!="3" && $idioma_cuatro!="4" && $idioma_cuatro!="5" && $idioma_cuatro!="6"){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El idioma 4 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
							"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();

							}

							if($tipo_cuatro=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el tipo de inscripción del idioma 4 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($tipo_cuatro!="Inscripción" && $tipo_cuatro!="Reinscripción"){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"El tipo de Inscripción 4 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
							
							if($nivel4=="" ){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Señale el nivel de inscripción del idioma 4 por favor.",
								"Tipo"=>"error"
								];
							echo json_encode($alerta);
							exit();

							}
						}



						$datos_preinscrito_reg=[
							"nombre"=>$nombre,
							"apellido_paterno"=>$apellido_paterno,
							"apellido_materno"=>$apellido_materno,
							"curp"=>$curp,
							"sexo"=>$sexo,
							"idioma"=>$idioma,
							"tipo"=>$tipo,
							"nivel1"=>$nivel1,
							"idioma_dos"=>$idioma_dos,
							"tipo_dos"=>$tipo_dos,
							"nivel2"=>$nivel2,
							"idioma_tres"=>$idioma_tres,
							"tipo_tres"=>$tipo_tres,
							"nivel3"=>$nivel3,
							"idioma_cuatro"=>$idioma_cuatro,
							"tipo_cuatro"=>$tipo_cuatro,
							"nivel4"=>$nivel4,
							"fecha_nacimiento"=>$fecha_nacimiento,
							"calle"=>$calle,
							"numero"=>$numero,
							"colonia"=>$colonia,
							"cp"=>$cp,
							"municipio"=>$municipio,
							"estado"=>$estado,
							"telefono"=>$telefono,
							"correo"=>$correo,
							"matricula"=>$matricula,
							"dependencia"=>$dependencia,
							"password"=>$claveEncriptada,
							"id_rol"=>$id_rol,
							"fecha_registro"=>$fecha_registro
							
						];

						$agregar_preinscrito=preinscritoModelo::agregar_preinscrito_modelo($datos_preinscrito_reg);

						if($agregar_preinscrito->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"La solicitud de inscripción se ha enviado correctamente. El personal de CAA te enviará un correo electrónico para continuar tu proceso de inscripción.",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los datos no se han registrado.",
							"Tipo"=>"error"
							];

													
						}
							echo json_encode($alerta);


		}

					/* CONTROLADOR PAGINAR USUARIO */

			public function paginador_preinscrito_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
				$pagina=mainModel::limpiar_cadena($pagina);
				$registros=mainModel::limpiar_cadena($registros);
				$privilegio=mainModel::limpiar_cadena($privilegio);
				$curp=mainModel::limpiar_cadena($curp);

				$url=mainModel::limpiar_cadena($url);
				$url=SERVERURL.$url."/";
				
				$busqueda=mainModel::limpiar_cadena($busqueda);
				$tabla="";

				$pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1 ;
				$inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0 ;

				if(isset($busqueda) && $busqueda !=""){

					$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND persona.id_rol='7' ORDER BY persona.apellido_paterno ASC";
					
					$consulta="SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND persona.id_rol='7' ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";
					
					$consulta3="SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND persona.id_rol='7' ORDER BY persona.apellido_paterno ASC";

				
				}else{
					$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND id_rol='7' ORDER BY persona.id_persona ASC";

					$consulta="SELECT * FROM persona WHERE curp!='$curp' AND id_rol='7' ORDER BY id_persona ASC LIMIT $inicio,$registros ";

					$consulta3="SELECT * FROM persona WHERE curp!='$curp' AND id_rol='7' ORDER BY id_persona ASC";


					

				}
				$claveDesencriptada=mainModel::decryption($password);
				$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos3 = $conexion->query($consulta3);
				$total = $datos3->rowCount();
				

				$t2_Array=array();
				$t3_Array=array();
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				//$total= $conexion->query("SELECT FOUND_ROWS()");
				//$total= (int) $total->fetchColumn();

				$Npaginas=ceil($total/$registros);
				
				
				foreach ($datos2 as $rows) {
						          		if(!in_array($rows['id_persona'], $t2_Array)){
						          			$t2_Array[]=$rows['id_persona'];
						          			$t3_Array[$rows['id_persona']]=$rows['etiqueta_idioma'];
						          		}else{	
						          			$t3_Array[$rows['id_persona']]=$t3_Array[$rows['id_persona']].', '.$rows['etiqueta_idioma'];
						          		}
						          	}
						          	$temporal_Array=array();
				$tabla.='
						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Idioma (s)</th>
						    <th>Curp</th>
						    <th>Matrícula</th>
						    <th>Teléfono</th>
						    <th>Correo</th>
						    <th>Dependencia</th>
						    <th>Inscribir</th>
						    <th>Eliminar</th>
								</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
						          	

							foreach ($datos as $rows) {
								//if(!in_array($rows['id_persona'], $temporal_Array)){

											$tabla.=' 
									<tr class="text-center" >
						                <td data-label="#">'.$contador.'</td>
						                <td data-label="Nombre">'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td>
						                <td data-label="Idioma (s)">'.$t3_Array[$rows['id_persona']].'</td>
						                <td data-label="Curp">'.$rows['curp'].'</td>
						                <td data-label="Matrícula">'.$rows['matricula'].'</td>
						                <td data-label="Teléfono">'.$rows['telefono'].'</td>
						                <td data-label="Correo">'.$rows['correo'].'</td>
						                <td data-label="Dependencia">'.$rows['dependencia'].'</td>
						               
						                <td data-label="Inscribir">
						               
						                   <a href="'.SERVERURL.'preinsIndAdmin/'.mainModel::encryption($rows['id_persona']).'/"> <button class="btnTable"> <button class="btnInscribir">Inscribir</button></a>
						                  
						                 </td>

						                  </a>
						                </td>
						                
						                <td data-label="Eliminar">
						                		<form class="FormularioAjax" action="'.SERVERURL.'ajax/preinscritoAjax.php" 	method="POST" data-form="delete" autocomplete="off">

						                		<input type="hidden" name="usuario_id_del" value="'.mainModel::encryption($rows['id_persona']).'">


						                 <button class="btnEliminar">Eliminar</button>
						                   </form>
						                 </td>
					                     
					            </tr>';
					            $contador++;
					            $temporal_Array[]=$rows['id_persona'];
								//}
							}

							$reg_final=$contador-1;
						          }else{
						          	if($total>=1 ){
						          		$tabla.='<tr class="text-center" ><td colspan="10">
						          	<a href="'.$url.'" class="btns4" id="whiteText">Haga clic aquí para recargar el listado </a>
						          		</td></tr>';
						          	}else{
						          		$tabla.='<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td></tr>';
						         		 }
						          	    }


				$tabla.='</tbody></table></div><br>';	

				
				if($total>=1 && $pagina<=$Npaginas){
					$tabla.='<p class="texto_derecha">Mostrando solicitud '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 

				
				/* CONTROLADOR ELIMINAR SOLICITUD DE INSCRIPCIÓN */

				public function eliminar_preinscrito_controlador(){

				$id=mainModel::decryption($_POST['usuario_id_del']);
				$id=mainModel::limpiar_cadena($id);

				if($id==1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se puede eliminar a los usuarios principales del sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}
					
					/* COMPROBANDO PRIVILEGIOS */ 

					session_start(['name'=>'SCAA']);
					if($_SESSION['privilegio_scaa']!=1){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No tienes los permisos necesarios para realizar esta operación",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}
					
					$eliminar_preinscrito=preinscritoModelo::eliminar_preinscrito_modelo($id);

					if($eliminar_preinscrito->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"La solicitud de inscripción ha sido eliminada del sistema correctamente",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido eliminar la solicitud de inscripción, porfavor intente nuevamente",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					

			}/* FIN DEL CONTROLADOR */ 

				
				/* BUSCAR CP CONTROLADOR */ 

				public function buscar_cp_controlador(){
					$cp=mainModel::limpiar_cadena($_POST['cp']);
					
							$municipio="";
							$estado="";
							$colonia=array();


				$consulta= "SELECT SQL_CALC_FOUND_ROWS * FROM sepomex WHERE cp='$cp'";
				

				$conexion=mainModel::conectar();
					
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				$total= $conexion->query("SELECT FOUND_ROWS()");
				$total= (int) $total->fetchColumn();
				$flag = 1;

				foreach ($datos as $row){
					if($flag){
						echo $row['municipio']."&";
						echo $row['estado']."&";
					}
					$flag = 0;
					echo $row['asentamiento']."*";
				}
				

			}	/* FIN DEL CONTROLADOR */

			/* CONTROLADOR DATOS PREINSCRITO */

		public function datos_preinscrito_controlador($tipo, $id){
			
			$tipo=mainModel::limpiar_cadena($tipo);
			$id=mainModel::decryption($id);
			$id=mainModel::limpiar_cadena($id);
			
			return preinscritoModelo::datos_preinscrito_modelo($tipo, $id);

		} /* FIN DEL CONTROLADOR */

			public function desencriptar_controlador($pass){
						
						
						return mainModel::decryption($pass);

					} /* FIN DEL CONTROLADOR */
					
		/* CONTROLADOR CARRERAS UNACH */

			public function datos_carreras_unach_controlador(){				
						
						$consulta=mainModel::conectar()->prepare("SELECT * FROM carreras_unach");
						$consulta->execute();
						return $consulta;

					} /* FIN DEL CONTROLADOR */

				public function buscar_curp_reinscripcion_controlador(){

				$curp=mainModel::limpiar_cadena($_POST['buscar_curp_alumno']);	

				$check_curp=mainModel::conectar()->prepare("SELECT id_persona FROM persona WHERE curp='$curp'");
				$check_curp->execute();
				$id_persona = $check_curp->fetch();
						
						if($check_curp->rowCount()!=0){
							 // print_r($id_persona);

							echo"<script> location.href='".SERVERURL."reinscripcion/".mainModel::encryption($id_persona[0])."/'</script>";
							// header("Location:".SERVERURL."reinscripcion/".mainModel::encryption($id_persona[0])."/");

					
					}else{
						return '
							<script>
							Swal.fire({
								title: "Ocurrió un error inesperado",
								text: "No se ha podido encontrar el curp solicitado. Verifíquelo e ingrese el dato correctamente. Si el problema persiste contacte al administrador del  sistema.",
								type: "error",
								confirmButtonText: "Aceptar"
								});
							</script> 
						' ;
				}
					
			} /* FIN DEL CONTROLADOR */

}
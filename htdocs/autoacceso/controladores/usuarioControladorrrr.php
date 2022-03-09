<?php 

	if($peticionAjax){
		require_once "../modelos/usuarioModelo.php";
	}else{
		require_once "./modelos/usuarioModelo.php";
	}
	
	class usuarioControlador extends usuarioModelo{

		public function agregar_usuario_controlador(){

			$curp=mainModel::limpiar_cadena($_POST['curp_personal_reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre_reg']);
			$apellido_paterno=mainModel::limpiar_cadena($_POST['apellido_paterno_reg']);
			$apellido_materno=mainModel::limpiar_cadena($_POST['apellido_materno_reg']);
			$fecha_nacimiento="";
			
			$calle=mainModel::limpiar_cadena($_POST['calle_reg']);
			$numero=mainModel::limpiar_cadena($_POST['num_reg']);
			$colonia=mainModel::limpiar_cadena($_POST['col_reg']);
			$telefono=mainModel::limpiar_cadena($_POST['tel_reg']);
			$correo=mainModel::limpiar_cadena($_POST['correo_reg']);
			$cp=mainModel::limpiar_cadena($_POST['cp_personal_reg']);
			$matricula=mainModel::limpiar_cadena($_POST['matricula_reg']);
			$idioma_asesor=mainModel::limpiar_cadena($_POST['idiom_reg']);
			$password=mainModel::limpiar_cadena($_POST['pass_reg']);
			$confirmPass=mainModel::limpiar_cadena($_POST['pass2_reg']);
			$id_rol=mainModel::limpiar_cadena($_POST['priv_reg']);

			/* COMPROBAR CAMPOS VACIOS */

			if($curp=="" || $nombre=="" || $apellido_paterno=="" || $apellido_materno=="" || $calle=="" || $numero=="" || $colonia=="" || $telefono=="" ||  $password=="" || $confirmPass==""){

					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
					if(mainModel::verificar_datos("[a-zA-Z0-9]{10,10}",$curp)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El CURP no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

					if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{3,50}",$nombre)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Nombre no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{2,50}",$apellido_paterno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Apellido paterno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{1,50}",$apellido_materno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Apellido materno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$calle)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo calle no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[0-9]{1,5}",$numero)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo número no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$colonia)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo colonia no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[0-9]{10,10}",$telefono)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El teléfono no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						
					if($matricula!=""){
					if(mainModel::verificar_datos("[a-zA-Z0-9]{0,10}",$matricula)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"La matrícula no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
					}

					if($idioma_asesor!=""){
						if(mainModel::verificar_datos("[0-9]{1,2}",$idioma_asesor)){
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

						if(mainModel::verificar_datos("[A-Za-z0-9$@.-]{6,20}",$password) || mainModel::verificar_datos("[A-Za-z0-9$@.-]{6,20}",$confirmPass)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Las contraseñas no coinciden con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

				



						/* COMPROBANDO CURP */

						$check_curp=mainModel::ejecutar_consulta_simple("SELECT curp FROM persona where curp='$curp'");
						if($check_curp->rowCount()>0){
							$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El CURP ingresado ya se encuentra registrado en el sistema. Verifique sus datos",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();


					}
		
					/*
						if($correo!=""){
							if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
								$check_correo=mainModel::ejecutar_consulta_simple("SELECT correo FROM personal WHERE correo ='$correo'");
									if($check_correo->rowCount()>0){
										$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"El correo electrónico ingresado ya se encuentra registrado en el sistema. Verifique sus datos",
										"Tipo"=>"error"
									];
									echo json_encode($alerta);
									exit();
						
							}

						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Ha ingresado un correo electrónico no válido",
							"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

					}
				}*/


						/*COMPROBAR LAS CLAVES*/ 

						if($password != $confirmPass){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Las claves que acaba de ingresar no coinciden",
							"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}else{
							$claveEncriptada=mainModel::encryption($password);
						}




						$datos_persona_reg=[
							"curp"=>$curp,
							"nombre"=>$nombre,
							"apellido_paterno"=>$apellido_paterno,
							"apellido_materno"=>$apellido_materno,
							"fecha_nacimiento"=>$fecha_nacimiento,
							"calle"=>$calle,
							"numero"=>$numero,
							"colonia"=>$colonia,
							"telefono"=>$telefono,
							"correo"=>$correo,
							"cp"=>$cp,
							"matricula"=>$matricula,
							"idioma_asesor"=>$idioma_asesor,
							"password"=>$claveEncriptada,
							"id_rol"=>$id_rol

						];

						$agregar_persona=usuarioModelo::agregar_usuario_modelo($datos_persona_reg);

						if($agregar_persona->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"Los datos del usuario se han guardado correctamente",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Los datos no se han registrado",
							"Tipo"=>"error"
							];

													
						}
							echo json_encode($alerta);


/*
			
						if($id_rol < 1 || $id_rol > 4){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El privilegio seleccionado no es válido",
							"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}


						echo json_encode($alerta);*/


		}/*FIN DEL CONTROLADOR*/ 



			/* CONTROLADOR PAGINAR USUARIO */

			public function paginador_usuario_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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

					$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE ((curp_persona!='$curp' AND curp!='1' AND id_persona!='6' AND id_persona!='7' AND id_persona!='8') AND (nombre LIKE '%$busqueda%' OR apellido_paterno LIKE '%$busqueda%' OR apellido_materno LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR curp LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registros ";
					//$paginaUrl="buscarUsuario";

				
				}else{
					
				$consulta2="SELECT * FROM persona JOIN rol ON persona.id_rol=rol.id_rol JOIN idioma ON persona.idioma_asesor=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol!='6' AND persona.id_rol!='7' AND persona.id_rol!='8' ";

					$consulta="SELECT * FROM persona JOIN rol ON persona.id_rol=rol.id_rol JOIN idioma ON (persona.idioma_asesor=idioma.id_idioma) WHERE curp!='$curp' AND rol.id_rol!='6' AND rol.id_rol!='7' AND rol.id_rol!='8' ORDER BY nombre ASC LIMIT $inicio,$registros";

					$consulta3="SELECT * FROM persona WHERE curp!='$curp' AND id_rol!='6' AND id_rol!='7' AND id_rol!='8' ORDER BY nombre ASC";


					//$paginaUrl="listaUsuarios";
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
				
				
				/*foreach ($datos2 as $rows) {
						          		if(!in_array($rows['id_persona'], $t2_Array)){
						          			$t2_Array[]=$rows['id_persona'];
						          			$t3_Array[$rows['id_persona']]=$rows['etiqueta_idioma'];
						          		}else{	
						          			$t3_Array[$rows['id_persona']]=$t3_Array[$rows['id_persona']].', '.$rows['etiqueta_idioma'];
						          		}
						          	}*/
						          	$temporal_Array=array();


				$tabla.='
						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Matrícula</th>
						    <th>Privilegios</th>
						    <th>Nombre</th>
						    <th>Curp</th>
						    <th>Teléfono</th>
						    <th>Correo</th>
						    <th>Contraseña</th>
						    <th>Idioma</th>
						    <th>Actualizar</th>
						    <th>Eliminar</th>
								</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;


							foreach ($datos as $rows) {
								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Matrícula">'.$rows['matricula'].'</td>
			                <td data-label="Privilegios">'.$rows['etiqueta'].'</td>
			                <td data-label="Nombre">'.$rows['nombre'].' '.$rows['apellido_paterno'].' '.$rows['apellido_materno'].'</td>
			                <td data-label="Curp">'.$rows['curp'].'</td>
			                <td data-label="Teléfono">'.$rows['telefono'].'</td>
			                <td data-label="Correo">'.$rows['correo'].'</td>
			                <td data-label="Contraseña">'.$claveDesencriptada=mainModel::decryption($rows['password']).'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>
			               
			                <td data-label="Actualizar">
			               
			                  <a href="'.SERVERURL.'editarUsuario/'.mainModel::encryption($rows['id_persona']).'/"> <button class="btnActualizar">Actualizar</button></a> 
			                  
			                 </td>

			                  </a>
			                </td>
			                
			                <td data-label="Eliminar">
			                		<form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php" 	method="POST" data-form="delete" autocomplete="off">

			                		<input type="hidden" name="usuario_id_del" value="'.mainModel::encryption($rows['curp']).'">

									<button class="btnEliminar">Eliminar</button>
			                  
			                   </form>
			                 </td>
		                     
		            </tr>';
		            $contador++;
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
					$tabla.='<p class="texto_derecha">Mostrando usuario '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 

			/* CONTROLADOR ELIMINAR USUARIO */
			public function eliminar_usuario_controlador(){

				$curp=mainModel::decryption($_POST['usuario_id_del']);
				$curp=mainModel::limpiar_cadena($curp);

				if($curp==1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se puede eliminar a los usuarios principales del sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}
					/* COMPROBANDO USUARIO EN LA BASE DE DATOS */ 
					$check_usuario=mainModel::ejecutar_consulta_simple("SELECT curp FROM persona WHERE curp='$curp'");

					if($check_usuario->rowCount()<=0){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El usuario que intenta eliminar no se encuentra registrado en el sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}

					/* COMPROBANDO ASESORIAS */ 
					$check_asesoria=mainModel::ejecutar_consulta_simple("SELECT curp FROM asesorias WHERE curp='$curp' LIMIT 1");

					if($check_asesoria->rowCount()>0){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos eliminar a este usuario debido a que tiene asesorias pendientes",
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
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No tienes los permisos necesarios para realizar esta operación",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}
					
					$eliminar_usuario=usuarioModelo::eliminar_usuario_modelo($curp);

					if($eliminar_usuario->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"El usuario ha sido eliminado del sistema correctamente",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se ha podido eliminar el usuario, porfavor intente nuevamente",
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

			/* CONTROLADOR DATOS USUARIO */

		public function datos_usuario_controlador($tipo, $id){

			$tipo=mainModel::limpiar_cadena($tipo);
			$id=mainModel::decryption($id);
			$id=mainModel::limpiar_cadena($id);

			return usuarioModelo::datos_usuario_modelo($tipo, $id);

		} /* FIN DEL CONTROLADOR */


		public function editar_usuario_controlador(){
			$id=mainModel::decryption($_POST['user_id_decrypt']);
			$id=mainModel::limpiar_cadena($id);
			$curp=mainModel::limpiar_cadena($_POST['curp_personal_reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre_reg']);
			$apellido_paterno=mainModel::limpiar_cadena($_POST['apellido_paterno_reg']);
			$apellido_materno=mainModel::limpiar_cadena($_POST['apellido_materno_reg']);
			
			$calle=mainModel::limpiar_cadena($_POST['calle_reg']);
			$numero=mainModel::limpiar_cadena($_POST['num_reg']);
			$colonia=mainModel::limpiar_cadena($_POST['col_reg']);
			$telefono=mainModel::limpiar_cadena($_POST['tel_reg']);
			$correo=mainModel::limpiar_cadena($_POST['correo_reg']);
			$cp=mainModel::limpiar_cadena($_POST['cp_personal_reg']);
			$matricula=mainModel::limpiar_cadena($_POST['matricula_reg']);
			$idioma_asesor=mainModel::limpiar_cadena($_POST['idiom_reg']);
			$id_rol=mainModel::limpiar_cadena($_POST['priv_reg_edit']);

						/* COMPROBAR CAMPOS VACIOS */

			if($curp=="" || $nombre=="" || $apellido_paterno=="" || $apellido_materno=="" || $calle=="" || $numero=="" || $colonia=="" || $telefono==""){

					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
					if(mainModel::verificar_datos("[a-zA-Z0-9]{10,10}",$curp)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El CURP no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

					if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{3,50}",$nombre)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Nombre no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{2,50}",$apellido_paterno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Apellido paterno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚ]{1,50}",$apellido_materno)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Apellido materno no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$calle)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo calle no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[0-9]{1,5}",$numero)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo número no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
						if(mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}",$colonia)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El campo colonia no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						if(mainModel::verificar_datos("[0-9]{10,10}",$telefono)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El teléfono no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}

						
					if($matricula!=""){
					if(mainModel::verificar_datos("[a-zA-Z0-9]{0,10}",$matricula)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"La matrícula no coincide con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
					}

					if($idioma_asesor!=""){
						if(mainModel::verificar_datos("[0-9]{1,2}",$idioma_asesor)){
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

			$datos_persona_edit=[
				
							"id"=>$id,
							"curp"=>$curp,
							"nombre"=>$nombre,
							"apellido_paterno"=>$apellido_paterno,
							"apellido_materno"=>$apellido_materno,
							"calle"=>$calle,
							"numero"=>$numero,
							"colonia"=>$colonia,
							"telefono"=>$telefono,
							"correo"=>$correo,
							"cp"=>$cp,
							"matricula"=>$matricula,
							"idioma_asesor"=>$idioma_asesor,
							"id_rol"=>$id_rol

						];

						$editar_persona=usuarioModelo::editar_usuario_modelo($datos_persona_edit);

						if($editar_persona->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"Los datos del usuario se han actualizado correctamente.",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Los datos no se han actualizado.",
							"Tipo"=>"error"
							];

													
						}
							echo json_encode($alerta);

					}/* FIN DEL CONTROLADOR */

	}



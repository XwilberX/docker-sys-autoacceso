<?php 

	if($peticionAjax){
		require_once "../modelos/documentoModelo.php";
	}else{
		require_once "./modelos/documentoModelo.php";
	}
	class documentoControlador extends documentoModelo{

		/* CONTROLADOR AGREGAR URL A RECURSOS (ALUMNOS) */

		public function agregar_url_controlador(){
			$url=mainModel::limpiar_cadena($_POST['cargarUrl']);
			$idioma=mainModel::limpiar_cadena($_POST['idiomas_agregar_documentos2']);
			$nivel=mainModel::limpiar_cadena($_POST['nivel_agregar_documentos2']);
			$nombre_link=mainModel::limpiar_cadena($_POST['nombre_link']);
			$acceso_link=mainModel::limpiar_cadena($_POST['acceso_link']);

			if($acceso_link=="1"){
				if ($idioma=="0"){			
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor elige un idioma.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();				
				}
			}

			if ($acceso_link!="1" && $acceso_link!="0") {			
				if ($idioma!="0") {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El secretario y personal administrativo no admiten el campo idioma. Elija la  opción 'Idioma' en la caja  de seleccion para poder guardar la URL seleccionada.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}				
			}

			if($url=="" || $nombre_link==""){

				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No ha llenado todos los campos obligatorios",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
				}
			
			if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ 0-9]{1,50}",$nombre_link)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El nombre de la URL contiene caracteres no válidos.",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();

			}
			
			
			$datos_link=[			
				"nombre_link"=>$nombre_link,
				"idioma"=>$idioma,
				"nivel"=>$nivel,
				"acceso_link"=>$acceso_link,
				"url"=>$url
			];

			$insertar_link=documentoModelo::agregar_url_modelo($datos_link);
					
			if($insertar_link->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Operación exitosa",
					"Texto"=>"La URL seleccionada se ha agregado al sistema con éxito.",
					"Tipo"=>"success"
				];
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No se ha podido agregar al sistema la URL seleccionada. Intente nuevamente.",
					"Tipo"=>"error"
				];
			}
				echo json_encode($alerta);
				exit();

			
		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR AGREGAR ARCHIVO A RECURSOS (ALUMNOS) */

		public function agregar_documento_controlador(){
			$idioma=mainModel::limpiar_cadena($_POST['idiomas_agregar_documentos']);
			$nivel=mainModel::limpiar_cadena($_POST['nivel_agregar_documentos']);
			$acceso_archivo=mainModel::limpiar_cadena($_POST['acceso_archivo']);

			if ($idioma=="0") {			
				if ($acceso_archivo=="1" || $acceso_archivo=="0") {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor elige un idioma.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}				
			}

			if ($acceso_archivo!="1" && $acceso_archivo!="0") {			
				if ($idioma!="0") {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El secretario y personal administrativo no admiten el campo idioma. Elija la  opción 'Idioma' en la caja  de seleccion para poder guardar los archivos seleccionados.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}				
			}
			
			
			$fileCount= count($_FILES['cargarArchivos']['name']);
			
			for ($i=0; $i < $fileCount; $i++) { 

				$nombreArchivo=mainModel::limpiar_cadena($_FILES['cargarArchivos']['name'][$i]);
				$tipoArchivo=mainModel::limpiar_cadena($_FILES['cargarArchivos']['type'][$i]);
				$tamanhoArchivo=mainModel::limpiar_cadena($_FILES['cargarArchivos']['size'][$i]);

				$archivo=fopen($_FILES['cargarArchivos']['tmp_name'][$i],'r');
				$archivo_bin=fread($archivo,$tamanhoArchivo);
				fclose($archivo);

				if($tipoArchivo!="image/jpeg" && $tipoArchivo!="image/png" && $tipoArchivo!="application/pdf" && $tipoArchivo!="application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $tipoArchivo!="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){

			
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Está intentando agregar un archivo que no es válido. El sistema solo admite archivos tipo: png, jpeg, pdf, docx y xslx.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				$datos_documentos=[
					"nombreArchivo"=>$nombreArchivo,
					"tipoArchivo"=>$tipoArchivo,
					"acceso_archivo"=>$acceso_archivo,
					"idioma"=>$idioma,
					"nivel"=>$nivel,
					"archivo_bin"=>$archivo_bin
				];
			// print_r($datos_documentos);
			// exit();

			$insertar_documentos=documentoModelo::agregar_documento_modelo($datos_documentos);
			}

			if($insertar_documentos->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Operación exitosa",
					"Texto"=>"El archivo seleccionado se ha agregado al sistema con éxito.",
					"Tipo"=>"success"
				];
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No se ha podido agregar el documento seleccionado. Intente nuevamente.",
					"Tipo"=>"error"
				];
			}
				echo json_encode($alerta);
				exit();

			
		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR DATOS DOCUMENTOS (ALUMNOS) */

		public function datos_documentos_controlador(){

			return documentoModelo::datos_documentos_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS LINKS (ALUMNOS) */

		public function datos_links_controlador(){

			return documentoModelo::datos_links_modelo();

	}/* FIN DEL CONTROLADOR */

			/* CONTROLADOR DATOS DOCUMENTOS (ASESORES) */

		public function datos_documentos_asesores_controlador(){

			return documentoModelo::datos_documentos_asesores_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS LINKS (ASESORES) */

		public function datos_links_asesores_controlador(){

			return documentoModelo::datos_links_asesores_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS DOCUMENTOS (SECRETARIO) */

		public function datos_documentos_secretario_controlador(){

			return documentoModelo::datos_documentos_secretario_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS LINKS (SECRETARIO) */

		public function datos_links_secretario_controlador(){

			return documentoModelo::datos_links_secretario_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS DOCUMENTOS (PERSONAL ADMINISTRATIVO) */

		public function datos_documentos_personal_controlador(){

			return documentoModelo::datos_documentos_personal_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS LINKS (PERSONAL ADMINISTRATIVO) */

		public function datos_links_personal_controlador(){

			return documentoModelo::datos_links_personal_modelo();

	}/* FIN DEL CONTROLADOR */

	/* CONTROLADOR ELIMMINAR ARCHIVOS */

		public function eliminar_documento_controlador(){
			$id_archivo=mainModel::limpiar_cadena($_POST['eliminar_archivo']);


			$eliminar_archivo=documentoModelo::eliminar_documento_modelo($id_archivo);


					if($eliminar_archivo->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"El archivo seleccionado ha sido eliminado del sistema correctamente.",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido eliminar el archivo seleccionado, por favor intente nuevamente.",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					exit();

		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR ELIMMINAR ARCHIVOS */

		public function eliminar_url_controlador(){
			$id_link=mainModel::limpiar_cadena($_POST['eliminar_url']);

			$eliminar_link=documentoModelo::eliminar_url_modelo($id_link);


					if($eliminar_link->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"La URL seleccionada ha sido eliminada del sistema correctamente.",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido eliminar la URL seleccionada, por favor intente nuevamente.",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					exit();

		}/* FIN DEL CONTROLADOR */

			/* CONTROLADOR DATOS IMAGENES INDEX */

		public function images_index_controlador(){

			return documentoModelo::images_index_modelo();

		}/* FIN DEL CONTROLADOR */

			/* CONTROLADOR DATOS IMAGENES INFOGRAFIA */

		public function images_infografia_controlador(){

			return documentoModelo::images_infografia_modelo();

		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR CAROUSEL IMAGENES INDEX */

		public function carousel_index_controlador(){

			$consulta2="SELECT * FROM archivos WHERE acceso_archivo=5 ORDER BY id_archivo ASC";
					
			$consulta="SELECT * FROM archivos WHERE acceso_archivo=5 ORDER BY id_archivo ASC";

			$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();
				
				$total= $conexion->query("SELECT FOUND_ROWS()");
				$total= (int) $total->fetchColumn();
				
				$Npaginas=ceil($total/$registros);

			$tabla.='
						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Imagen</th>
						    <th>Actualizar Imagen</th>
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
			                <td data-label="Nombre">'.$rows['nombre_archivo'].'</td>
			                <td data-label="Imagen"> <img  src="data:image/png; base64,'.base64_encode($rows['contenido']).'" style="max-width:150px;"> </td>
			               			                
			                <td data-label="Actualizar">
			                		<form class="FormularioAjax" action="'.SERVERURL.'ajax/documentoAjax.php" 	method="POST" data-form="update" autocomplete="off">
			                		<input type="file" id="input_carousel_index" name="img_carousel_index_actualizar" required>

			                		<input type="hidden" name="id_img_carousel_index_actualizar" value="'.$rows['id_archivo'].'">

									<button type="submit" class="btnActualizar">Actualizar</button>
			                  
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
					$tabla.='<p class="texto_derecha">Mostrando Imagen '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					// $tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;
		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR CAROUSEL IMAGENES INFOGRAFÍA */

		public function carousel_infografia_controlador(){

			$consulta2="SELECT * FROM archivos WHERE acceso_archivo=6 ORDER BY id_archivo ASC";
					
			$consulta="SELECT * FROM archivos WHERE acceso_archivo=6 ORDER BY id_archivo ASC";

			$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();
				
				$total= $conexion->query("SELECT FOUND_ROWS()");
				$total= (int) $total->fetchColumn();
				
				$Npaginas=ceil($total/$registros);

			$tabla.='
						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Imagen</th>
						    <th>Actualizar Imagen</th>
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
			                <td data-label="Nombre">'.$rows['nombre_archivo'].'</td>
			                <td data-label="Imagen"> <img  src="data:image/png; base64,'.base64_encode($rows['contenido']).'" style="max-width:150px;"> </td>
			               			                
			                <td data-label="Actualizar">
			                		<form class="FormularioAjax" action="'.SERVERURL.'ajax/documentoAjax.php" 	method="POST" data-form="update" autocomplete="off">
			                		<input type="file" id="input_carousel_index" name="img_carousel_index_actualizar" required>

			                		<input type="hidden" name="id_img_carousel_index_actualizar" value="'.$rows['id_archivo'].'">

									<button type="submit" class="btnActualizar">Actualizar</button>
			                  
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
					$tabla.='<p class="texto_derecha">Mostrando Imagen '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					// $tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;
		}/* FIN DEL CONTROLADOR */
	

		/* CONTROLADOR ACTUALIZAR IMÁGNES DEL CAROUSEL DEL INDEX */

		public function actualizar_img_carousel_index_controlador(){
			$id_archivo=mainModel::limpiar_cadena($_POST['id_img_carousel_index_actualizar']);
			$nombreArchivo=mainModel::limpiar_cadena($_FILES['img_carousel_index_actualizar']['name']);
			$tipoArchivo=mainModel::limpiar_cadena($_FILES['img_carousel_index_actualizar']['type']);
			$tamanhoArchivo=mainModel::limpiar_cadena($_FILES['img_carousel_index_actualizar']['size']);

			$archivo=fopen($_FILES['img_carousel_index_actualizar']['tmp_name'],'r');
			$archivo_bin=fread($archivo,$tamanhoArchivo);
			fclose($archivo);
			/*print_r($tipoArchivo);
			print_r($nombreArchivo);*/

			if($tipoArchivo!="image/png"){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"En esta sección solo se pueden agregar archivos png.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				$datos_actualizar_img_carousel=[
					"id_archivo"=>$id_archivo,
					"nombreArchivo"=>$nombreArchivo,
					"tipoArchivo"=>$tipoArchivo,
					"archivo_bin"=>$archivo_bin
				];
				
			$actualizar_img_carousel=documentoModelo::actualizar_img_carousel_index_modelo($datos_actualizar_img_carousel);

			if($actualizar_img_carousel->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Operación exitosa",
					"Texto"=>"La imagen seleccionada se ha actualizado correctamente.",
					"Tipo"=>"success"
				];
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No se ha podido actualizar la imagen seleccionada. Verifique los caracteres en el nombre de la misma e intente nuevamente.",
					"Tipo"=>"error"
				];
			}
				echo json_encode($alerta);
				exit();

		}/* FIN DEL CONTROLADOR */

		/* CONTROLADOR DATOS CURSOS POR ALUMNO */

		public function datos_curso_alumnos_controlador(){

			return documentoModelo::datos_curso_alumnos_modelo();

		}/* FIN DEL CONTROLADOR */
	
	}
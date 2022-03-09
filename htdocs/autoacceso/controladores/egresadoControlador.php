<?php 

	if($peticionAjax){
		require_once "../modelos/egresadoModelo.php";
	}else{
		require_once "./modelos/egresadoModelo.php";
	}
	
	class egresadoControlador extends egresadoModelo{
			public function paginador_egresados_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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
						
					if($_SESSION['privilegio_scaa']==4){
						$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']." ORDER BY persona.apellido_paterno ASC";

						$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

						$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY persona.apellido_paterno ASC";
					
					}else{
						
						$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";

						$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

						$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";
									
					}

					$sql="SELECT nombre,apellido_paterno,apellido_materno,id_persona,idioma_asesor,correo FROM persona WHERE id_rol=4 OR id_rol=1 OR id_rol=2 ORDER BY nombre";
			
				$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos3 = $conexion->query($consulta3);
				$total = $datos3->rowCount();
				
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				$datos4=$conexion->query($sql);	
				$datos4 = $datos4->fetchAll();		

				$Npaginas=ceil($total/$registros);

					$tabla.='						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Matricula</th>
						    <th>Idioma</th>
						    <th>Tipo nivel</th>
						    <th>nivel</th>						    
						    <th>Número de acta</th>
						    <th>Asesor</th>								
						    <th>Egresar nivel</th>';				

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos as $rows) {

								if($rows['lc']==1){
									$lc="LC";
								}else{
									$lc="Ordinario";
								}

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Nombre">'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td>
			                <td data-label="Matricula">'.$rows['matricula'].'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>	                
			                <td data-label="Tipo nivel">'.$lc.'</td>
			                <td data-label="Nivel">'.$rows['nivel'].'</td>
			                <td data-label="Número de acta">

			                <form class="FormularioAjax" action="'.SERVERURL.'ajax/egresadoAjax.php" 	method="POST" data-form="delete" autocomplete="off">
			                <input type="text" name="numeroActa" placeholder="No. de acta" id="noActa" pattern="[a-z A-Z 0-9]{3,15}" required></td>

			                <td data-label="Asesor">
			                <select name="nombre_asesor_egr" required>
			                <option value="">Elige un asesor</option>';
			                	foreach ($datos4 as $rows4) {
			                		if($rows['id_idioma']==$rows4['idioma_asesor']){
			                			$tabla.=' <option value="'.mainModel::encryption($rows4['id_persona']).'">'.$rows4['nombre'].' '.$rows4['apellido_paterno'].' </option>';
			                		}
			                	}
			        $tabla.='<select>
			                </td>'; 

			               $tabla.='                
			                
			                <td data-label="Egresar">
			                		<input type="hidden" name="nivel_egr" value="'.$rows['nivel'].'">
			                		<input type="hidden" name="curso_egr" value="'.$rows['id_curso_asesoria'].'">


			                  <button type="submit" class="btnEgresar">Egresar</button>
			                   </form>
			                 </td>';

		            $tabla.='</tr>';
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
					$tabla.='<p class="texto_derecha">Mostrando cursos inscritos '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 

			public function paginador_exalumno_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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
						
					if($_SESSION['privilegio_scaa']==4){
						$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']." ORDER BY persona.apellido_paterno ASC";

						$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

						$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY persona.apellido_paterno ASC";
					
					}else{
						
						$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";

						$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

						$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";
									
					}

					$sql="SELECT nombre,apellido_paterno,apellido_materno,id_persona,idioma_asesor,correo FROM persona WHERE id_rol=4 OR id_rol=1 OR id_rol=2 ORDER BY nombre";
			
				$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos3 = $conexion->query($consulta3);
				$total = $datos3->rowCount();
				
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				$datos4=$conexion->query($sql);	
				$datos4 = $datos4->fetchAll();		

				$Npaginas=ceil($total/$registros);

					$tabla.='						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Matricula</th>
						    <th>Idioma</th>
						    <th>Tipo nivel</th>
						    <th>nivel</th>						    
						    <th>CURP</th>
						    <th>Correo</th>';				

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos as $rows) {

								if($rows['lc']==1){
									$lc="LC";
								}else{
									$lc="Ordinario";
								}

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Nombre">'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td>
			                <td data-label="Matricula">'.$rows['matricula'].'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>	                
			                <td data-label="Tipo nivel">'.$lc.'</td>
			                <td data-label="Nivel">'.$rows['nivel'].'</td>
							<td data-label="Curp">'.$rows['curp'].'</td>
							<td data-label="Email">'.$rows['correo'].'</td>
							';

			               

		            // $tabla.='</tr>';
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
					$tabla.='<p class="texto_derecha">Mostrando cursos inscritos '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 

			
			public function egresar_nivel_controlador(){
				
				
				$nivel=mainModel::limpiar_cadena($_POST['nivel_egr']);
				$id_curso=mainModel::limpiar_cadena($_POST['curso_egr']);
				$fecha_cambio_nivel=date("Y-m-d",strtotime("Today"));
				$numero_acta=mainModel::limpiar_cadena($_POST['numeroActa']);
				$id_persona_asesor_egr=mainModel::decryption($_POST['nombre_asesor_egr']);
				$id_persona_asesor_egr=mainModel::limpiar_cadena($id_persona_asesor_egr);
				
				

				if(mainModel::verificar_datos("[a-z A-Z 0-9]{3,15}",$numero_acta)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El número de acta  contiene caracteres no válidos. COntacte al administrador del sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				if(mainModel::verificar_datos("[0-9]{1,11}",$id_persona_asesor_egr)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El asesor seleccionado no puede ser agregado. COntacte al administrador del sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}

				if($numero_acta=="" || $id_persona_asesor_egr==""){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

				}

				if($nivel=="Ubicación"){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Los alumnos en 'Ubicación' no pueden egresar niveles hasta obtener uno.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

				}
				if($nivel=="Finalizado"){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Los idiomas con nivel 'Finalizado' no pueden egresar más niveles.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

				}
				if($nivel=="12"){
					$nvo_nivel="Finalizado";

				}
				if($nivel>="1" && $nivel<="11"){
					$nvo_nivel=$nivel+1;

				}

				$datos_nivel_egresado=[
					"nvo_nivel"=>$nvo_nivel,
					"nivel_egresado"=>$nivel,
					"id_curso"=>$id_curso,
					"numero_acta"=>$numero_acta,
					"id_persona_asesor_egr"=>$id_persona_asesor_egr,
					"fecha_cambio_nivel"=>$fecha_cambio_nivel
				];

				$egresar_curso=egresadoModelo::egresar_curso_modelo($datos_nivel_egresado);
						
						if($egresar_curso->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"El alumno ha egresado del nivel ".$nivel." a ".$nvo_nivel.". Éste cambio se verá reflejado en la lista de egresados. ",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Los cambios no se han efectuado, inténtelo nuevamente. Si el problema persiste, contacte al administrador del sistema.",
							"Tipo"=>"error"
							];
													
						}
							echo json_encode($alerta);
							exit();
				
				// print($nivel_egresado);

			}/* FIN DEL CONTROLADOR */ 

			public function paginador_mostrar_egresados_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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

				if($_SESSION['privilegio_scaa']==4){

					$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada DESC";

					$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada DESC LIMIT $inicio,$registros";

					$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."  ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada DESC";

				
				}else{		
					$consulta2="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada DESC";

					$consulta="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada  DESC LIMIT $inicio,$registros";

					$consulta3="SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN curso_asesorias_egresadas ON curso_asesorias.id_curso_asesoria=curso_asesorias_egresadas.id_curso WHERE persona.curp!='$curp' AND id_rol='8' ORDER BY curso_asesorias_egresadas.id_curso_asesoria_egresada DESC";
				}

				$sql="SELECT nombre,apellido_paterno,apellido_materno,id_persona,idioma_asesor,correo FROM persona WHERE id_rol=4 OR id_rol=1 OR id_rol=2 ORDER BY nombre";

				
				$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos3 = $conexion->query($consulta3);
				$total = $datos3->rowCount();

				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				$datos4=$conexion->query($sql);	
				$datos4 = $datos4->fetchAll();

				$Npaginas=ceil($total/$registros);	
				
				$tabla.='
				<div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Matricula</th>
						    <th>Idioma</th>
						    <th>Tipo nivel</th>
						    <th>Nivel egresado</th>
						    <th>Fecha de egreso</th>
						    <th>Número de acta</th>
						    <th>Asesor</th>';
						    if($_SESSION['privilegio_scaa']<=3){

						    $tabla.='<th>Revertir</th>';				
						    }							

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos as $rows) {

								if($rows['lc']==1){
									$lc="LC";
								}else{
									$lc="Ordinario";
								}

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Nombre">'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td>
			                <td data-label="Matricula">'.$rows['matricula'].'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>	                
			                <td data-label="Tipo nivel">'.$lc.'</td>
			                <td data-label="Nivel egresado">'.$rows['nivel_egresado'].'</td>
			                <td data-label="Fecha de egreso">'.date('d-m-Y',strtotime($rows['fecha_cambio_nivel'])).'</td>
			                <td data-label="Número de acta">'.$rows['numero_acta'].'</td>
			                <td data-label="Asesor">';
			                foreach ($datos4 as $rows4) {
			                if($rows['id_persona_asesor_egr']==$rows4['id_persona']){
			                	if($rows4['id_persona']==$rows4['id_persona']){
			                			$tabla.=''.$rows4['nombre'].' '.$rows4['apellido_paterno'].'';
			                		}
			                }
			            }

			                 $tabla.='</td>'; 	               	
			               		if($_SESSION['privilegio_scaa']<=3){
			                		if($rows['nivel']==$rows['nivel_egresado']+1 || $rows['nivel_egresado']=="12"){
			                			$tabla.='                
						                <td data-label="Revertir">
						                <form class="FormularioAjax" action="'.SERVERURL.'ajax/egresadoAjax.php" 	method="POST" data-form="delete" autocomplete="off">
						                		<input type="hidden" name="nivel_egr_rev" value="'.$rows['nivel_egresado'].'">
						                		<input type="hidden" name="curso_egr_rev" value="'.$rows['id_curso'].'">
						                		<input type="hidden" name="id_curso_asesoria_egresada" value="'.$rows['id_curso_asesoria_egresada'].'">
						                  <button type="submit" class="btnAgregar2">Revertir</button>
						                   </form></td>';
			                		}else{

			                		$tabla.='                
						                <td data-label="Revertir">
						                </td>';

			                		}
			                	}	
					$tabla.='</tr>';
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
					$tabla.='<p class="texto_derecha">Mostrando egresados '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 

			public function revertir_nivel_controlador(){
				$nvo_nivel=mainModel::limpiar_cadena($_POST['nivel_egr_rev']);
				$id_curso=mainModel::limpiar_cadena($_POST['curso_egr_rev']);
				$id_curso_asesoria_egresada=mainModel::limpiar_cadena($_POST['id_curso_asesoria_egresada']);


				$datos_nivel_revertir=[
					"nvo_nivel"=>$nvo_nivel,
					"id_curso_asesoria_egresada"=>$id_curso_asesoria_egresada,
					"id_curso"=>$id_curso
				];

				$revertir_nivel=egresadoModelo::revertir_nivel_modelo($datos_nivel_revertir);
						
					if($revertir_nivel->rowCount()==1){
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"El nivel del alumno en éste idioma ha cambiado al nivel ".$nvo_nivel." y el registro en cuestión ha sido eliminado de la lista de egresados correctamente.",
							"Tipo"=>"success"
						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Los cambios no se han efectuado, inténtelo nuevamente. Si el problema persiste, contacte al administrador del sistema.",
							"Tipo"=>"error"
						];
													
					}
						echo json_encode($alerta);
						exit();
				
				// print($nivel_egresado);

			}/* FIN DEL CONTROLADOR */ 

	}
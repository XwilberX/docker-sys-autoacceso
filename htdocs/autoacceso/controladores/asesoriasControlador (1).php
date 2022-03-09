<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if($peticionAjax){
		require_once "../modelos/asesoriasModelo.php";
	}else{
		require_once "./modelos/asesoriasModelo.php";
	}
	class asesoriasControlador extends asesoriasModelo{

		/* CONTROLADOR MANEJAR HORARIOS ASESORIAS */

		public function horarios_asesorias_controlador(){
			// session_start();

				if(isset($_POST['id_asesor_recargar'])){
					$id_repuesto=$_POST['id_asesor_recargar'];
				}else {

					$id_repuesto=$_SESSION['id_scaa'];
				}
			// echo "***";
			// print_r($id_repuesto);
			// echo "***";
			$consulta= "SELECT * FROM plantilla_horarios WHERE id_persona_asesor='$id_repuesto' AND (estatus_hora_asesoria='0' OR estatus_hora_asesoria='3') ORDER BY hora";
			

				
				$tabla="";
				$diaActual=date("l",strtotime("Today"));
				$horaActual=date("H:i:s",strtotime("Now"));
				$hora_cambio="23:59:59";



				$conexion=mainModel::conectar();
					
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

		$tabla.='
		<table class="tableAlumnos" id="tableAsesorias">


	        	<thead class="theadAsesorias">
							  <tr class="text-center">
							    
							    <th id="theadAsesoriasLabel">Día</th>
							    <th id="theadAsesoriasLabel">Horarios</th>
							    
							</tr>
				</thead>';
				$tabla.='<tr class="asesoriasTr">';
				
						if($diaActual=="Monday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Lunes '.date("d-m-Y",strtotime("next Monday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Lunes '.date("d-m-Y",strtotime("this Monday")).'</th><th>';
	        		 	}
	        			
	        	foreach ($datos as $rows) {

      		 	//$_SESSION['id_edit_dispo']= mainModel::encryption($rows['id_plantilla_horario']);
					        	
	        		 if($rows['dia']=="lu"){
	        		 	
	        		 	if($diaActual=="Monday" && $horaActual>=$rows['hora']){
	        		 		$elimnar_horario_cero=asesoriasModelo::elimnar_horario_cero_modelo($rows['id_plantilla_horario']);
	        		 	}
	        		 		
	        		 	$tabla.='<div class="btnHorario">';
	        		 	if($rows['tiempo_hora_asesoria']=="3"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario4" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="2"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario3" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="0"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="1"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario2" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}

	        		 	$tabla.='<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" 	data-form="delete" autocomplete="off">
	        		 			<input type="hidden" name="eliminar_horario_id" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">
	        		 			<button class="btnEliminarHorario" id="btnEliminarHorario" type="submit">X</button>
	        		 		</form> 
	        		 	</div>';
	        		 };}
            $tabla.='</th></tr>';
            $tabla.='<tr class="asesoriasTr">';
           
	        		if($diaActual=="Tuesday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Martes '.date("d-m-Y",strtotime("next Tuesday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Martes '.date("d-m-Y",strtotime("this Tuesday")).'</th><th>';
	        		 	}
	        		
	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="ma"){

	        		 	if( $diaActual=="Tuesday" && $horaActual>=$rows['hora']){
	        		 		
	        		 		$elimnar_horario_cero=asesoriasModelo::elimnar_horario_cero_modelo($rows['id_plantilla_horario']);
	        		 	}

	        		 	$tabla.='<div class="btnHorario">';
	        		 	if($rows['tiempo_hora_asesoria']=="3"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario4" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="2"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario3" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="0"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="1"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario2" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 		        		 	
	        		 	$tabla.='<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" 	data-form="delete" autocomplete="off">
	        		 			<input type="hidden" name="eliminar_horario_id" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">
	        		 			<button class="btnEliminarHorario" id="btnEliminarHorario" type="submit">X</button>
	        		 		</form> 
	        		 	</div>';
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
	
							if($horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Miércoles '.date("d-m-Y",strtotime("next Wednesday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Miércoles '.date("d-m-Y",strtotime("this Wednesday")).'</th><th>';
	        		 	}

	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="mi"){

	        		 	if($diaActual=="Wednesday" && $horaActual>=$rows['hora']){
	        		 		
	        		 		$elimnar_horario_cero=asesoriasModelo::elimnar_horario_cero_modelo($rows['id_plantilla_horario']);
	        		 	}
	     
	        		 	$tabla.='<div class="btnHorario">';
	        		 	if($rows['tiempo_hora_asesoria']=="3"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario4" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="2"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario3" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="0"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="1"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario2" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}

	        		 	$tabla.='<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" 	data-form="delete" autocomplete="off">
	        		 			<input type="hidden" name="eliminar_horario_id" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">
	        		 			<button class="btnEliminarHorario" id="btnEliminarHorario" type="submit">X</button>
	        		 		</form> 
	        		 	</div>';
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
	
							if($diaActual=="Thursday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Jueves '.date("d-m-Y",strtotime("next Thursday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Jueves '.date("d-m-Y",strtotime("this Thursday")).'</th><th>';
	        		 	}

	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="ju"){

	        		 	if($diaActual=="Thursday" && $horaActual>=$rows['hora']){
	        		 		
	        		 		$elimnar_horario_cero=asesoriasModelo::elimnar_horario_cero_modelo($rows['id_plantilla_horario']);
	        		 	}
	        		 	
	        		 	$tabla.='<div class="btnHorario">';
	        		 	if($rows['tiempo_hora_asesoria']=="3"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario4" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="2"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario3" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="0"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="1"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario2" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	
	        		 	$tabla.='<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" method="POST" data-form="delete" autocomplete="off">
	        		 			<input type="hidden" name="eliminar_horario_id" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">
	        		 			<button class="btnEliminarHorario" id="btnEliminarHorario" type="submit">X</button>
	        		 		</form> 
	        		 	</div>';
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
	
							if($diaActual=="Friday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Viernes '.date("d-m-Y",strtotime("next Friday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Viernes '.date("d-m-Y",strtotime("this Friday")).'</th><th>';
	        		 	}

	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="vi"){

	        		 	if($diaActual=="Friday" && $horaActual>=$rows['hora']){
	        		 		
	        		 		$elimnar_horario_cero=asesoriasModelo::elimnar_horario_cero_modelo($rows['id_plantilla_horario']);
	        		 	}
	        		 		
	        		 	$tabla.='<div class="btnHorario">';
	        		 	if($rows['tiempo_hora_asesoria']=="3"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario4" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="2"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario3" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="0"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	if($rows['tiempo_hora_asesoria']=="1"){
	        		 		$tabla.='<a herf="" id="horario_editar" class="editarHorario2" onclick="horario_editar_mostrar('.$rows['id_plantilla_horario'].','.$rows['tiempo_hora_asesoria'].')">'.date(" H:i",strtotime($rows['hora'])).'</a>';
	        		 	}
	        		 	// print_r(mainModel::encryption($rows['id_plantilla_horario']));
	        		 	$tabla.='<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" 	data-form="delete" autocomplete="off">
	        		 			<input type="hidden" name="eliminar_horario_id" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">
	        		 			<button class="btnEliminarHorario" id="btnEliminarHorario" type="submit">X</button>
	        		 		</form> 
	        		 	</div>';
	        		 };}
            $tabla.='</th></tr>';
            $tabla.='<div></div>
       		 </table>';

		return $tabla;

		} /* FIN DEL CONTROLADOR */


		/* CONTROLADOR LISTAR ASESORIAS */

		public function lista_asesorias_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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
						
				
				}else{

					if($_SESSION['privilegio_scaa']!=6){
					$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (plantilla_horarios.estatus_hora_asesoria='1' OR plantilla_horarios.estatus_hora_asesoria='3') AND persona.id_rol='6' AND plantilla_horarios.id_persona_asesor='".$_SESSION['id_scaa']."'ORDER BY asesorias.fecha_asesoria, plantilla_horarios.hora ASC";

					$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (plantilla_horarios.estatus_hora_asesoria='1' OR plantilla_horarios.estatus_hora_asesoria='3') AND persona.id_rol='6' AND plantilla_horarios.id_persona_asesor='".$_SESSION['id_scaa']."'ORDER BY asesorias.fecha_asesoria, plantilla_horarios.hora ASC LIMIT $inicio,$registros";
						
					}else{
						
						$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (plantilla_horarios.estatus_hora_asesoria='1' OR plantilla_horarios.estatus_hora_asesoria='3') AND persona.id_persona='".$_SESSION['id_scaa']."' ORDER BY asesorias.fecha_asesoria,plantilla_horarios.hora ASC ";

						$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (plantilla_horarios.estatus_hora_asesoria='1' OR plantilla_horarios.estatus_hora_asesoria='3') AND persona.id_persona='".$_SESSION['id_scaa']."' ORDER BY asesorias.fecha_asesoria,plantilla_horarios.hora ASC LIMIT $inicio,$registros";
					}					
				}

				

				$conexion=mainModel::conectar();
				$fechaActual=date("Y-m-d",strtotime("Today"));
				$horaActual=date("H:i:s",strtotime("Now -20 minutes"));
				// print_r($fechaActual);
				//  print_r($horaActual);
				
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
							    <th>Día</th>
							    <th>Fecha</th>
							    <th>Hora</th>
							    <th>Tipo</th>';
							    
					if($_SESSION['privilegio_scaa']==6){	

						$tabla.=' 
						<th>Idioma</th>
						<th>Asesor</th>
						<th>Correo</th>
						<th>Link zoom</th>';
					}

					if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){					    

						$tabla.=' <th>Alumno</th>';
						$tabla.=' <th>Nivel</th>';
					}
					
					if($_SESSION['privilegio_scaa']==1){
				// 		$tabla.=' <th>Asesor</th>';
						$tabla.=' <th>Alumno</th>';
						$tabla.=' <th>Nivel</th>';
					}

					$tabla.='
						<th>Eliminar</th>';
										

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos2 as $rows) {

								if($rows['dia']=="lu"){
									$dia="Lunes";
								}
								if($rows['dia']=="ma"){
									$dia="Martes";
								}
								if($rows['dia']=="mi"){
									$dia="Miércoles";
								}
								if($rows['dia']=="ju"){
									$dia="Jueves";
								}
								if($rows['dia']=="vi"){
									$dia="Viernes";
								}

								if($rows['tiempo_hora_asesoria']=="1"){
							
									$tipoAsesoria="Escritos 15 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="0"){
									$tipoAsesoria="Asesoría 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="2"){
									$tipoAsesoria="Conversación 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="3"){
									$tipoAsesoria="Lectura 30 minutos";
								}

								

								//if(!in_array($rows['id_persona'], $temporal_Array)){

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Día">'.$dia.'</td>
			                <td data-label="Fecha (s)">'.date('d-m-Y',strtotime($rows['fecha_asesoria'])).'</td>
			                <td data-label="Hora">'.date(" H:i",strtotime($rows['hora'])).'</td>
			                <td data-label="Tipo">'.$tipoAsesoria.'</td>';
			                
			                if($_SESSION['privilegio_scaa']==6){
			                $tabla.='
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>
			                <td data-label="Asesor">'.$rows['nombre2'].' '.$rows['apPaterno2'].'</td>
			                <td data-label="Asesor">'.$rows['correo2'].'</td>
			                <td data-label="Link zoom"><a href="'.$rows['link'].'"><button class="btnFicha">ZOOM</button></a></td>';
							}	
							if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){
			                $tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
			                $tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
							}
							if($_SESSION['privilegio_scaa']==1){
								// $tabla.='<td data-label="Asesor">'.$rows['nombre2'].' '.$rows['apPaterno2'].' '.$rows['apMaterno2'].'</td>';
								$tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
								$tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
							}
							
						
							
							if($rows['fecha_asesoria']<=$fechaActual && $rows['hora']<=$horaActual){
			                  	// 
		                  			$asesoria_vencida=asesoriasModelo::asesoria_vencida_modelo($rows['id_plantilla_horario']);
		                  		}

							if($_SESSION['privilegio_scaa']==6 && $rows['tiempo_hora_asesoria']=="2"){
								$tabla.='';
								}else{
			                $tabla.='<td data-label="Eliminar">
			                  <form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" data-form="cancel_advisory" autocomplete="off">

			                		<input type="hidden" name="asesoria_agendada_borrar" value="'.mainModel::encryption($rows['id_asesoria']).'">
			                		<input type="hidden" name="act_id_pl_hr" value="'.mainModel::encryption($rows['id_plantilla_horario']).'">

								
			                  <button type="submit" class="btnEliminar">Eliminar</button>
			                   </form>
		           			</td>';
							
								 
							}
		            $tabla.='</tr>';
		            $contador++;
							}
					            //$temporal_Array[]=$rows['id_persona'];
								//}
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
					$tabla.='<p id="texto_derecha" class="texto_derecha">Mostrando asesoria '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			} /* FIN DEL CONTROLADOR */

			/* AGREGAR HORARIOS DE ASESORES CONTROLADOR */

			public function agregar_horarios_asesor_controlador(){
			$id=mainModel::decryption($_POST['user_id_decrypt']);
			$id=mainModel::limpiar_cadena($id);

			$rango=mainModel::limpiar_cadena($_POST['unico_rango']);
			$horarios=mainModel::limpiar_cadena($_POST['horarios_asesorias']);
			$horarios2=mainModel::limpiar_cadena($_POST['horarios_asesorias2']);

			$horarios3=mainModel::limpiar_cadena($_POST['horarios_asesorias_1']);
			$horarios4=mainModel::limpiar_cadena($_POST['horarios_asesorias2_1']);

			$tiempo_hora_asesoria=mainModel::limpiar_cadena($_POST['tipo_asesoria']);

			$dia=$_POST['dias_semana'];

			if ($tiempo_hora_asesoria=="") {
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor indique un tiempo de asesorías.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}

			//print_r($id);
			
			if($tiempo_hora_asesoria=="1"){

			if ($horarios3=="") {
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor elija un horario.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
			if ($rango=="Rango") {

				if ($horarios4=="") {
					$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Por favor elija un Horario 2 válido.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}


				if ($horarios4<$horarios3) {
					$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Su rango de horarios es incorrecto, verifíquelo.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}

			}

				$datos_horarios=[
					"id"=>$id,
					"rango"=>$rango,
					"horarios3"=>$horarios3,
					"horarios4"=>$horarios4,
					"tiempo_hora_asesoria"=>$tiempo_hora_asesoria,
					"dia"=>$dia
			];

			}else{

			if ($horarios=="") {
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor elija un horario válido.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}

			if ($rango=="Rango") {

				if ($horarios2=="") {
					$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Por favor elija un Horario 2 válido.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}


				if ($horarios2<$horarios) {
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Su rango de horarios es incorrecto, verifíquelo.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}
			} 
			

				$datos_horarios=[
					"id"=>$id,
					"rango"=>$rango,
					"horarios"=>$horarios,
					"horarios2"=>$horarios2,
					"tiempo_hora_asesoria"=>$tiempo_hora_asesoria,
					"dia"=>$dia
				];

			}

			$agregar_horarios=asesoriasModelo::agregar_horarios_asesor_modelo($datos_horarios);
						
						if($agregar_horarios->rowCount()==1){
							$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"Los horarios seleccionados se han agregado correctamente",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"No ha sido posible agregar los horarios seleccionados. Verifique sus datos.",
							"Tipo"=>"error"
							];
													
						}
							echo json_encode($alerta);
							
							//ob_start();

			}/* FIN DEL CONTROLADOR */

			/* AGENDAR ASESORIAS CONTROLADOR */

			public function agendar_asesorias_controlador(){
				session_start(['name'=>'SCAA']);
				
				$id_asesoria_plantilla_horario=mainModel::limpiar_cadena($_POST['agendar_asesoria_id']);
				$fecha_asesoria=mainModel::limpiar_cadena($_POST['fecha_asesoria']);
				$id_curso=mainModel::limpiar_cadena($_POST['id_curso_as']);
				$id_repuesto=mainModel::limpiar_cadena($_POST['id_repuesto']);
				$id_idioma=mainModel::limpiar_cadena($_POST['idioma_slct80']);
				
				$estatus_hora_asesoria="1";	
				$fechaActual=date("Y-m-d",strtotime("Today"));
				$fechaSemana=date("Y-m-d",strtotime("Today +7 days"));
				
				$semanaActual=date("Y-m-d",strtotime("Monday this week"));
				$semanaActual2=date("Y-m-d",strtotime("Friday this week"));
				$semanaFutura=date("Y-m-d",strtotime("Monday next week"));
				$semanaFutura2=date("Y-m-d",strtotime("Friday next week"));

				$consulta3=mainModel::conectar()->prepare("SELECT tiempo_hora_asesoria FROM plantilla_horarios WHERE id_plantilla_horario='$id_asesoria_plantilla_horario'");
				$consulta3->execute();
				$dato3 = $consulta3->fetch();
				//print_r($dato3);
				//exit();
					//  $consulta6->debugDumpParams();
			 	// echo "**************";
			 	
// 			 	print_r($fecha_asesoria);
// exit();

				$consulta4=mainModel::conectar()->prepare("SELECT lc,nivel FROM curso_asesorias WHERE id_persona_alumno='$id_repuesto' AND id_curso_asesoria=".$id_curso."");
				$consulta4->execute();
				$dato4 = $consulta4->fetch();

				/*$consulta2=mainModel::conectar()->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE idioma.id_idioma='$id_idioma' AND plantilla_horarios.tiempo_hora_asesoria=".$dato3['tiempo_hora_asesoria']." AND persona.id_persona=".$id_repuesto." AND asesorias.fecha_asesoria BETWEEN '$fechaActual' AND '$fechaSemana' ORDER BY asesorias.fecha_asesoria DESC");

				$consulta2->execute();
				$datos2 = $consulta2->fetch();*/
				
				if($fecha_asesoria>=$semanaFutura){
					
					$consulta2=mainModel::conectar()->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE idioma.id_idioma='$id_idioma' AND plantilla_horarios.tiempo_hora_asesoria=".$dato3['tiempo_hora_asesoria']." AND persona.id_persona=".$id_repuesto." AND asesorias.fecha_asesoria BETWEEN '$semanaFutura' AND '$semanaFutura2' ORDER BY asesorias.fecha_asesoria DESC");

				$consulta2->execute();
				$datos2 = $consulta2->fetch();
					// $consulta2->debugDumpParams();
					// exit();
				}else{		
					$consulta2=mainModel::conectar()->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE idioma.id_idioma='$id_idioma' AND plantilla_horarios.tiempo_hora_asesoria=".$dato3['tiempo_hora_asesoria']." AND persona.id_persona=".$id_repuesto." AND asesorias.fecha_asesoria BETWEEN '$semanaActual' AND '$semanaActual2' ORDER BY asesorias.fecha_asesoria DESC");
					
				$consulta2->execute();
				$datos2 = $consulta2->fetch();
					// $consulta2->debugDumpParams();
					// exit();
				}

				$consulta8=mainModel::conectar()->prepare("SELECT idioma_asesor FROM persona JOIN plantilla_horarios ON persona.id_persona=plantilla_horarios.id_persona_asesor WHERE plantilla_horarios.id_plantilla_horario='$id_asesoria_plantilla_horario'");

				$consulta8->execute();
				$dato8 = $consulta8->fetch();
				
				$consulta9=mainModel::conectar()->prepare("SELECT * FROM carreras_unach JOIN persona ON carreras_unach.id_carrera_unach=persona.carrera_unach JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.id_persona='$id_repuesto' AND curso_asesorias.id_idioma='$id_idioma' AND carreras_unach.id_carrera_unach='17'");

				$consulta9->execute();
				
				$consulta10=mainModel::conectar()->prepare("SELECT estatus_hora_asesoria FROM plantilla_horarios WHERE id_plantilla_horario='$id_asesoria_plantilla_horario'");

				$consulta10->execute();
				$datos10 = $consulta10->fetch();
				
				$consulta11=mainModel::conectar()->prepare("SELECT hora, dia FROM plantilla_horarios WHERE id_plantilla_horario='$id_asesoria_plantilla_horario'");

				$consulta11->execute();
				$dato11 = $consulta11->fetch();

   				$consulta12=mainModel::conectar()->prepare("SELECT id_asesoria FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.fecha_asesoria='$fecha_asesoria' AND curso_asesorias.id_persona_alumno='$id_repuesto' AND  plantilla_horarios.hora='".$dato11['hora']."'");

                $consulta13=mainModel::conectar()->prepare("SELECT id_asesoria FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE ADDTIME(hora,'00:15:00')='".$dato11['hora']."' AND asesorias.fecha_asesoria='$fecha_asesoria' AND curso_asesorias.id_persona_alumno='$id_repuesto'");

				$consulta13->execute();

				$consulta14=mainModel::conectar()->prepare("SELECT id_asesoria FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE SUBTIME(hora,'00:15:00')='".$dato11['hora']."' AND asesorias.fecha_asesoria='$fecha_asesoria' AND curso_asesorias.id_persona_alumno='$id_repuesto'");

				$consulta14->execute();
				
				$consulta15=mainModel::conectar()->prepare("SELECT id_asesoria FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.fecha_asesoria='$fecha_asesoria' AND curso_asesorias.id_curso_asesoria='$id_curso' AND curso_asesorias.id_persona_alumno='$id_repuesto' AND plantilla_horarios.tiempo_hora_asesoria='".$dato3['tiempo_hora_asesoria']."'");

				$consulta15->execute();
				 // $consulta15->debugDumpParams();
					//  exit();
				if($consulta15->rowCount()>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"No puede agendar más de una sesión del mismo tipo en un solo día.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}
				

				if ($dato3['tiempo_hora_asesoria']==1){
					if($consulta13->rowCount()!=0){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"La sesión que intentas agendar choca con otra asesoría que tienes agendada. Verifica tu lista de asesorías pendientes y prueba con otro horario.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}
				} else{

					if($consulta14->rowCount()!=0){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"La sesión que intentas agendar choca con otra asesoría que tienes agendada. Verifica tu lista de asesorías pendientes y prueba con otro horario.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}
				}

				$consulta12->execute();
				if($consulta12->rowCount()!=0){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"No puedes agendar más de una sesión para el mismo día y hora. Verifica tu lista de asesorías pendientes y prueba con otro horario.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}

				
				if($dato8['idioma_asesor']!=$id_idioma){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El asesor y el idioma elegidos no coinciden.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}
				
				if($datos10['estatus_hora_asesoria']==1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Éste horario ya no se encuentra disponible, intente con otro horario.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
				}
				
				if($id_idioma==1 && $dato3['tiempo_hora_asesoria']!="2"){
					if ($consulta9->rowCount()>=1) {					
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los estudiantes de LEI solo pueden solicitar club de conversación.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}
				}


				if ($dato3['tiempo_hora_asesoria']=="1"){
					if ($dato4['nivel']=="Ubicación"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los alumnos en Ubicación solo pueden agendar asesorias.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}
				}


				if ($dato3['tiempo_hora_asesoria']=="2"){

					if ($dato4['nivel']=="Ubicación"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los alumnos en Ubicación solo pueden agendar asesorias.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}

					$consulta5=mainModel::conectar()->prepare("SELECT id_curso FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.id_asesoria_plantilla_horario='$id_asesoria_plantilla_horario' ORDER BY asesorias.id_asesoria ASC LIMIT 1");
					$consulta5->execute();
					$dato5 = $consulta5->fetch();

					$consulta5_5=mainModel::conectar()->prepare("SELECT id_curso FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.id_asesoria_plantilla_horario='$id_asesoria_plantilla_horario'");
					$consulta5_5->execute();
					$dato5_5 = $consulta5_5->fetch();

					$consulta6=mainModel::conectar()->prepare("SELECT * FROM asesorias WHERE id_asesoria_plantilla_horario='$id_asesoria_plantilla_horario' AND id_curso='$id_curso'");
					$consulta6->execute();
					$dato6 = $consulta6->fetch();				
					
					$consulta7=mainModel::conectar()->prepare("SELECT nivel FROM curso_asesorias WHERE id_curso_asesoria=".$dato5['id_curso']."");
					$consulta7->execute();
					$dato7 = $consulta7->fetch();
 // $consulta5->debugDumpParams();

  // print_r($dato4['nivel']);

	

				if($consulta5->rowCount()==0){
					$estatus_hora_asesoria="3";	
						
				}
					
				if($consulta5_5->rowCount()>=1){

					if($consulta5_5->rowCount()<=6){
						$estatus_hora_asesoria="3";	
						
					}
					if($consulta5_5->rowCount()==7){
						$estatus_hora_asesoria="1";	
						
					}
					if($dato4['nivel']<$dato7['nivel']-2 || $dato4['nivel']>$dato7['nivel']+2){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los participantes agendados a está sesión tienen un nivel en el que usted no tiene permitido participar. Intente con otro horario de club de conversación.",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();	
					
					}

						if($consulta6->rowCount()==1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Usted solo puede agendar 1 espacio en éste club de conversación",
								"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();	
						
						}
						
			
					
				}
			}

				if ($dato4['lc']=="1"){
				 	if ($dato3['tiempo_hora_asesoria']!="0"){
				 		$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrió un error inesperado",
									"Texto"=>"Usted solo puede agendar asesorías de 30 minutos.",
									"Tipo"=>"error"
								];
								echo json_encode($alerta);
								exit();
				 	}

				 	if($consulta2->rowCount()>=1){
							if($consulta2->rowCount()>=$datos2['tipo_3']){

								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrió un error inesperado",
									"Texto"=>"Usted solo tiene permitido solicitar ".$datos2['tipo_3']." sesiones por semana.",
									"Tipo"=>"error"
								];
								echo json_encode($alerta);
								exit();
							}

						}

				}else{

					if ($dato3['tiempo_hora_asesoria']=="3"){
				 		$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrió un error inesperado",
									"Texto"=>"Usted no tiene permitido agendar este tipo de sesión.",
									"Tipo"=>"error"
								];
								echo json_encode($alerta);
								exit();
				 	}

					if($consulta2->rowCount()>=1){
						if($consulta2->rowCount()>=$datos2['tipo_'.$dato3['tiempo_hora_asesoria']]){

							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"Usted solo tiene permitido solicitar ".$datos2['tipo_'.$dato3['tiempo_hora_asesoria']]." asesorías por semana.",
								"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();
						}
					}
						
				}						

					$agendar_datos=[
						"id_asesoria_plantilla_horario"=>$id_asesoria_plantilla_horario,
						"fecha_asesoria"=>$fecha_asesoria,
						"id_curso"=>$id_curso,
						"estatus_hora_asesoria"=>$estatus_hora_asesoria
						];

					$agendar_asesoria=asesoriasModelo::agendar_asesoria_modelo($agendar_datos);
				
					if($agendar_asesoria->rowCount()==1){
					
						/*$consulta=mainModel::conectar()->prepare("SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2,persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE asesorias.id_asesoria='".$_SESSION['id_asesoria_agendada'][0]."'");

						$consulta->execute();
						$datos = $consulta->fetch(PDO::FETCH_ASSOC);
					
						

						if($datos['dia']=="lu"){
							$dia="Lunes";
						}
						if($datos['dia']=="ma"){
							$dia="Martes";
						}
						if($datos['dia']=="mi"){
							$dia="Miércoles";
						}
						if($datos['dia']=="ju"){
							$dia="Jueves";
						}
						if($datos['dia']=="vi"){
							$dia="Viernes";
						}

						$destinatario=$datos['correo1'];
						$destinatario2=$datos['correo2'];
								
						$nombreAsesor=$datos['nombre2'].' '.$datos['apPaterno2'];
						$nombreAlumno=$datos['nombre1'].' '.$datos['apPaterno1'].' '.$datos['apMaterno1'];
						$link=$datos['link'];
						$fecha=date("d-m-Y",strtotime($datos['fecha_asesoria']));
						$hora=date("H:i",strtotime($datos['hora']));
						$idioma=$datos['etiqueta_idioma'];
						$asunto="Asesoria agendada";
							

						if($datos['tiempo_hora_asesoria']=="1"){
							
							$tipoAsesoria="una Revisión de trabajos escritos de 15 minutos";
						}
						if($datos['tiempo_hora_asesoria']=="0"){
							$tipoAsesoria="una Asesoría de 30 minutos";
						}
						if($datos['tiempo_hora_asesoria']=="2"){
							$tipoAsesoria="un Club de conversación de 30 minutos";
						}
						if($datos['tiempo_hora_asesoria']=="3"){
							$tipoAsesoria="una sesión de Comprensión lectora de 30 minutos";
						}

						$msg='¡NO RESPONDA ESTE CORREO! '."\n".'ESTE ES UN MENSAJE GENERADO AUTOMÁTICAMENTE, CUALQUIER DUDA POR FAVOR COMUNÍQUESE CON EL ASESOR DEL IDIOMA CORRESPONDIENTE ('.$destinatario2.') O ENVÍE UN CORREO ELECTRÓNICO A LA SIGUIENTE DIRECCIÓN: autoacceso.flct@unach.mx '."\n\n".'Con copia para: '.$nombreAsesor."\n\n".'Apreciable '.$nombreAlumno.': '."\n".'Usted ha reservado '.$tipoAsesoria.' de '.$idioma.' para el día '.$dia.' '.$fecha.' a las '.$hora.' con el asesor '.$nombreAsesor.'.'."\n\n".'Para acceder a la sesión haga en clic en el siguiente enlace en el día y hora mencionados previamente: '.$link."\n\n".'Gracias por utilizar https://www.centrodeautoacceso.com';
						
						require_once "../PHPMailer/Exception.php";
						require_once "../PHPMailer/PHPMailer.php";
						require_once "../PHPMailer/SMTP.php";

						$mail= new PHPMailer(true);
						
							$mail->SMTPOptions=array(
								'ssl'=>array(
									'verify_peer'=>false,
									'verify_peer_name'=>false,
									'allow_self_signed'=>true,
								)
							);


						$mail->isSMTP();
						$mail->Host="smtp.gmail.com";
						$mail->Port=587;
						$mail->SMTPSecure="tls";
						$mail->SMTPAuth="true";
						$mail->SMTPAuth="true";
						$mail->Username="centrodeautoacceso.tuxtla@gmail.com"; //Accede a la cuenta que enviará el correo
						$mail->Password="LBV6VvPSmhxbK7H";
						$mail->CharSet = 'UTF-8';
						$mail->SetFrom("no-reply@centrodeautoacceso.tuxtla.com", "Centro de AutoAcceso"); //Quien envía
						
						$mail->addAddress($destinatario); //A quien se le va a enviar
						$mail->addAddress($destinatario2);

						$mail->Subject=$asunto;  
						$mail->Body=$msg;  
						$mail->send();*/
					
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"La asesoría se ha agendado correctamente. En tu lista de asesorías pendientes encontrarás los datos de la asesoría agendada, así como el link de zoom para conectarte a la misma.",
							"Tipo"=>"success"
						];
					
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"No se ha podido guardar la asesoría seleccionada, por favor intente nuevamente",
							"Tipo"=>"error"
							];
						}
					echo json_encode($alerta);	

			}/* FIN DEL CONTROLADOR 


			/* CONTROLADOR ELIMINAR DISPONIBILIDAD DE HORARIO */

			public function eliminar_horario_dispo_controlador(){

				$id=mainModel::decryption($_POST['eliminar_horario_id']);
				$id=mainModel::limpiar_cadena($id);
				

					
					/* COMPROBANDO PRIVILEGIOS */ 

					session_start(['name'=>'SCAA']);
					if($_SESSION['privilegio_scaa']==3||$_SESSION['privilegio_scaa']>=5){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No tienes los permisos necesarios para realizar esta operación",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}

					$eliminar_dispo_horario=asesoriasModelo::eliminar_horario_dispo_modelo($id);


					if($eliminar_dispo_horario->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"El horario seleccionado ha sido eliminado del sistema correctamente",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido eliminar el horario seleccionado, por favor intente nuevamente",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					

			}/* FIN DEL CONTROLADOR */ 

			/* CONTROLADOR ACTUALIZAR HORARIO DE DISPONIBILIDAD DEL ASESOR */

			public function actualizar_horario_dispo_controlador(){

				$id=mainModel::limpiar_cadena($_POST['actualizar_horario_id']);
				$hora=mainModel::limpiar_cadena($_POST['horario_asesoria_edit']);

				$tiempo_hora_asesoria=mainModel::limpiar_cadena($_POST['tiempo_hora_asesoria']);
				$hora2=mainModel::limpiar_cadena($_POST['horario_asesoria_edit2']);

				$consulta= "SELECT * FROM plantilla_horarios WHERE id_plantilla_horario='$id'";
				
				$conexion=mainModel::conectar();
					
				$datos = $conexion->query($consulta);
				$dato = $datos->fetch();
				$dia=$dato['dia'];

				
					/* COMPROBANDO PRIVILEGIOS */ 

					session_start(['name'=>'SCAA']);
					if($_SESSION['privilegio_scaa']==3||$_SESSION['privilegio_scaa']>=5){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No tienes los permisos necesarios para realizar esta operación",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}

					if($tiempo_hora_asesoria=="1"){
						$actualizar_horario=[
						"id"=>$id,
						"tiempo_hora_asesoria"=>$tiempo_hora_asesoria,
						"dia"=>$dia,
						"hora2"=>$hora2
						];
					}else{
						$actualizar_horario=[
						"id"=>$id,
						"tiempo_hora_asesoria"=>$tiempo_hora_asesoria,
						"dia"=>$dia,
						"hora"=>$hora
						];
					}

				$actualizar_dispo_horario=asesoriasModelo::actualizar_horario_dispo_modelo($actualizar_horario);


					if($actualizar_dispo_horario->rowCount()==1){
							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"El horario seleccionado ha sido actualizado correctamente",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido actualizar el horario seleccionado, por favor intente nuevamente",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					

			}/* FIN DEL CONTROLADOR */ 

			public function info_asesorias_controlador(){
				
				// if(isset($_SESSION['id_asesor_recargar'])){
				// 	$id_repuesto=$_SESSION['id_asesor_recargar'];
				// }else {

				// }
					$id_repuesto=$_SESSION['id_scaa'];

			$consulta= "SELECT * FROM persona JOIN curso_asesorias ON persona.idioma_asesor=curso_asesorias.id_idioma WHERE (persona.id_rol='4' OR persona.id_rol='1' OR persona.id_rol='2') AND curso_asesorias.id_persona_alumno='".$_SESSION['id_scaa']."' ORDER BY persona.nombre, persona.apellido_paterno, persona.apellido_materno";

			$tabla="";

				$conexion=mainModel::conectar();
					
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();
					
				$tabla.='

					<div id="btnsAsesoresDiv">
					<form class="FormularioAjax" id="FormularioAjaxAgendar" action="'.SERVERURL.'ajax/asesoriasAjax.php" method="POST" data-form="save">
	        		 			<input type="hidden" id="agendar_asesoria_id" name="agendar_asesoria_id" value="">
	        		 			<input type="hidden" id="fecha_asesoria" name="fecha_asesoria" value="">
	        		 			<input type="hidden" id="id_curso_as" name="id_curso_as" value="">
	        		 			<input type="hidden" id="id_repuesto" name="id_repuesto" value="'.$id_repuesto.'">
	        		 			<input type="hidden" id="idioma_slct80" name="idioma_slct80" value="">

	        		 			<input type="submit" id="submitAgendar" value="aprietame" style="display:none;">
	        		 		</form>
						<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" method="POST" autocomplete="off">';
						foreach ($datos as $rows) {
							// if($rows['id_idioma']==$rows['idioma_asesor']){
							$tabla.='<input class="btnAluElegirAsesores" type="button" onclick="div_asesorias_mostrar('.$rows['id_persona'].')" value="'.$rows['nombre'].' '.$rows['apellido_paterno'].'">';}	
						$tabla.=' <input type="hidden" id="select_asesorias" name="select_asesorias" value="">';
					// }
						$tabla.='</form>
					<br>
				<div class="seleccionarAsesoria" id="seleccionarAsesoria" >
						<table class="tableAlumnos" id="tableAsesorias">
				        	<thead class="theadAsesorias">
										  <tr class="text-center">
										    
										    <th id="theadAsesoriasLabel">Día</th>
										    <th id="theadAsesoriasLabel">Horarios</th>
										    
										</tr>
							</thead><tbody id="tBody_asesorias">';

       		 $tabla.='</tbody></table>
				</div>
				';
			
				return $tabla;
			}/* FIN DEL CONTROLADOR */ 

			public function visualizar_horarios_asesorias_controlador(){
				//session_start();
				
				$id=mainModel::limpiar_cadena($_POST['id']);

			$consulta= "SELECT * FROM plantilla_horarios WHERE id_persona_asesor=$id AND (estatus_hora_asesoria='0' OR estatus_hora_asesoria='3') ORDER BY hora";
			
			// $tabla="%% ".$_SESSION." &&";

				$conexion=mainModel::conectar();
					
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();
				$diaActual=date("l",strtotime("Today"));
				$horaActual=date("H:i:s",strtotime("Now"));
				$hora_cambio="19:45:00";
						
				$tabla.='
				<tr class="asesoriasTr" id="asesoriasTr">';
				
						if($diaActual=="Monday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Lunes '.date("d-m-Y",strtotime("next Monday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Lunes '.date("d-m-Y",strtotime("this Monday")).'</th><th>';
	        		 	}

	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="lu"){
	        		 	if($diaActual=="Monday" && $horaActual>=$hora_cambio){
	        		 	$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Monday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Monday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Monday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Monday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}	
	        		 	}else{	
	        		 	$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Monday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Monday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Monday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Monday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
						}
	        		 	$tabla.='</div>';
	        		 };}
            $tabla.='</th></tr>';
            $tabla.='<tr class="asesoriasTr">';
				
						if($diaActual=="Tuesday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Martes '.date("d-m-Y",strtotime("next Tuesday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Martes '.date("d-m-Y",strtotime("this Tuesday")).'</th><th>';
	        		 	}
	        		

	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="ma"){
						if($diaActual=="Tuesday" && $horaActual>=$hora_cambio){
						$tabla.='
		        		<div class="btnHorario_alu">';
		        			if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Tuesday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Tuesday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Tuesday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Tuesday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}	
						}else{
		        		$tabla.='
		        		<div class="btnHorario_alu">';
		        			if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Tuesday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Tuesday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Tuesday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Tuesday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
						}
	        		 	$tabla.='</div>';
								        		 		        		 	
	        		 	
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
				
						if($diaActual=="Wednesday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Miércoles '.date("d-m-Y",strtotime("next Wednesday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Miércoles '.date("d-m-Y",strtotime("this Wednesday")).'</th><th>';
	        		 	}
	        		
	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="mi"){
	        		 	if($diaActual=="Wednesday" && $horaActual>=$hora_cambio){
	     				$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Wednesday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Wednesday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Wednesday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Wednesday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
	     				}else{
	        		 	$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Wednesday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Wednesday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Wednesday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Wednesday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
						}
	        		 	$tabla.='</div>';
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
				
						if($diaActual=="Thursday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Jueves '.date("d-m-Y",strtotime("next Thursday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Jueves '.date("d-m-Y",strtotime("this Thursday")).'</th><th>';
	        		 	}
	        		
	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="ju"){
	        		 	if($diaActual=="Thursday" && $horaActual>=$hora_cambio){

		        		 	$tabla.='
		        		 	<div class="btnHorario_alu">';
		        		 	if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Thursday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Thursday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Thursday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Thursday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
	        		 	}else{
	        		 		$tabla.='
		        		 	<div class="btnHorario_alu">';
		        		 	if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Thursday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Thursday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Thursday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Thursday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
						}
	        		 	$tabla.='</div>';
	        		 };}
            $tabla.='</th></tr>';
                        $tabla.='<tr class="asesoriasTr">';
				
						if($diaActual=="Friday" && $horaActual>=$hora_cambio){
	        		 		
	        				$tabla.='<th id="diaTh">Viernes '.date("d-m-Y",strtotime("next Friday")).'</th><th>';
	        		 	}else{
	        		 		$tabla.='<th id="diaTh">Viernes '.date("d-m-Y",strtotime("this Friday")).'</th><th>';
	        		 	}
	        		
	        	foreach ($datos as $rows) {
					        	
	        		 if($rows['dia']=="vi"){
	        		 	if($diaActual=="Friday" && $horaActual>=$hora_cambio){
	        		 		$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Friday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Friday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Friday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("next Friday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
	        		 	}else{	
	        		 	$tabla.='
	        		 	<div class="btnHorario_alu">';
	        		 		if($rows['tiempo_hora_asesoria']=="3"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Friday")).'\')"class="editarHorario_alu4" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="2"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Friday")).'\')"class="editarHorario_alu3" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
		        		 	}
		        		 	if($rows['tiempo_hora_asesoria']=="0"){
		        		 		$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Friday")).'\')"class="editarHorario_alu" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
							if($rows['tiempo_hora_asesoria']=="1"){
								$tabla.='<button onclick="agendarAsesoria('.$rows['id_plantilla_horario'].',\''.date("Y-m-d",strtotime("this Friday")).'\')"class="editarHorario_alu2" >'.date(" H:i",strtotime($rows['hora'])).'</button>';
							}
					}
	        		 	$tabla.='</div>';
	        		 };}
            $tabla.='</th></tr>';
            $tabla.='<div></div></div>
				';
			
				return $tabla;
			}/* FIN DEL CONTROLADOR */ 

			/* CONTROLADOR ACTUALIZAR/INSERTAR LINK DE ASESORIAS */

			public function actualizar_link_asesorias_controlador(){

				$id=mainModel::decryption($_POST['user_id_decrypt']);
				$id=mainModel::limpiar_cadena($id);
				$link=mainModel::limpiar_cadena($_POST['inputLinkDispo']);

				$datos_link=[
					"id"=>$id,
					"link"=>$link
				];

				$actualizar_link=asesoriasModelo::actualizar_link_asesorias_modelo($datos_link);

				if($actualizar_link->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"El link de asesorías ha sido actualizado correctamente",
						"Tipo"=>"success"
					];
				}else{
					
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido actualizar el link de asesorias, por favor intente nuevamente",
						"Tipo"=>"error"
					];
				}
				echo json_encode($alerta);
				exit();

			}/* FIN DEL CONTROLADOR */ 

						/* CONTROLADOR ELIMINAR SOLICITUD DE INSCRIPCIÓN */

			public function borrar_asesoria_agendada_controlador(){

				$id_actualizar=mainModel::decryption($_POST['act_id_pl_hr']);
				$id_actualizar=mainModel::limpiar_cadena($id_actualizar);

				$id_borrar=mainModel::decryption($_POST['asesoria_agendada_borrar']);
				$id_borrar=mainModel::limpiar_cadena($id_borrar);


					/*	$consulta=mainModel::conectar()->prepare("SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2,persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE asesorias.id_asesoria='$id_borrar'");

						$consulta->execute();
						$datos = $consulta->fetch(PDO::FETCH_ASSOC);
						//print_r($datos);
						

						if($datos['dia']=="lu"){
							$dia="Lunes";
						}
						if($datos['dia']=="ma"){
							$dia="Martes";
						}
						if($datos['dia']=="mi"){
							$dia="Miércoles";
						}
						if($datos['dia']=="ju"){
							$dia="Jueves";
						}
						if($datos['dia']=="vi"){
							$dia="Viernes";
						}

						$destinatario=$datos['correo1'];
						$destinatario2=$datos['correo2'];
								
						$nombreAsesor=$datos['nombre2'].' '.$datos['apPaterno2'];
						$nombreAlumno=$datos['nombre1'].' '.$datos['apPaterno1'].' '.$datos['apMaterno1'];
						// $link=$datos['link'];
						$fecha=date("d-m-Y",strtotime($datos['fecha_asesoria']));
						$hora=date("H:i",strtotime($datos['hora']));
						$idioma=$datos['etiqueta_idioma'];
						$asunto="Cancelación de asesoría";
							
						if($datos['tiempo_hora_asesoria']=="1"){
							
							$tipoAsesoria="Revisión de trabajos escritos de 15 minutos";
						}
						if($datos['tiempo_hora_asesoria']=="0"){
							$tipoAsesoria="Asesoría de 30 minutos";
						}

						if($datos['tiempo_hora_asesoria']=="2"){
							$tipoAsesoria="Club de conversación de 30 minutos";
						}
						
						if($datos['tiempo_hora_asesoria']=="3"){
							$tipoAsesoria="sesión de Comprensión lectora de 30 minutos";
						}

						$msg='¡NO RESPONDA ESTE CORREO! '."\n".'ESTE ES UN MENSAJE GENERADO AUTOMÁTICAMENTE, CUALQUIER DUDA POR FAVOR COMUNÍQUESE CON EL ASESOR DEL IDIOMA CORRESPONDIENTE ('.$destinatario2.') O ENVÍE UN CORREO ELECTRÓNICO A LA SIGUIENTE DIRECCIÓN: autoacceso.flct@unach.mx '."\n\n".'Con copia para: '.$nombreAsesor."\n\n".'Apreciable '.$nombreAlumno.': '."\n".'Se ha realizado correctamente la cancelación de su '.$tipoAsesoria.' de '.$idioma.' para el día '.$dia.' '.$fecha.' a las '.$hora.' con el asesor '.$nombreAsesor.'.'."\n\n".'Gracias por utilizar https://www.centrodeautoacceso.com';
						*/
	 // $consulta->debugDumpParams();
	 // exit();
					
					/* COMPROBANDO PRIVILEGIOS */
					
					session_start(['name'=>'SCAA']);

					if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2 && $_SESSION['privilegio_scaa']!=4 && $_SESSION['privilegio_scaa']!=6){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No tienes los permisos necesarios para realizar esta operación",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}

					$datos_eliminar=[
						"id_actualizar"=>$id_actualizar,
						"id_borrar"=>$id_borrar
					];


					$eliminar_asesoria_agendada=asesoriasModelo::borrar_asesoria_agendada_modelo($datos_eliminar);


					if($eliminar_asesoria_agendada->rowCount()==1){

						/*require_once "../PHPMailer/Exception.php";
						require_once "../PHPMailer/PHPMailer.php";
						require_once "../PHPMailer/SMTP.php";

						$mail= new PHPMailer(true);
						
							$mail->SMTPOptions=array(
								'ssl'=>array(
									'verify_peer'=>false,
									'verify_peer_name'=>false,
									'allow_self_signed'=>true,
								)
							);


						$mail->isSMTP();
						$mail->Host="smtp.gmail.com";
						$mail->Port=587;
						$mail->SMTPSecure="tls";
						$mail->SMTPAuth="true";
						$mail->SMTPAuth="true";
						$mail->Username="centrodeautoacceso.tuxtla@gmail.com"; //Accede a la cuenta que enviará el correo
						$mail->Password="LBV6VvPSmhxbK7H";
						$mail->CharSet = 'UTF-8';
						$mail->SetFrom("no-reply@centrodeautoacceso.tuxtla.com", "Centro de AutoAcceso"); //Quien envía
						
						$mail->addAddress($destinatario); //A quien se le va a enviar
						$mail->addAddress($destinatario2);

						$mail->Subject=$asunto;  
						$mail->Body=$msg;  
						$mail->send();*/

							$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Operación exitosa",
						"Texto"=>"La  asesoría seleccionada ha sido eliminada del sistema correctamente.",
						"Tipo"=>"success"
					];
					
					}else{
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se ha podido eliminar la asesoría seleccionada, por favor intente nuevamente",
						"Tipo"=>"error"
						];
					}
					echo json_encode($alerta);
					exit();

			}/* FIN DEL CONTROLADOR */ 

			public function datos_asesoria_controlador($tipo, $id){

			$tipo=mainModel::limpiar_cadena($tipo);
			$id=mainModel::decryption($id);
			$id=mainModel::limpiar_cadena($id);

			return asesoriasModelo::datos_asesoria_modelo($tipo, $id);

		} /* FIN DEL CONTROLADOR */

			/* INSERTAR/ACTUALIZAR AVANCE ASESORIA CONTROLADOR */
		public function avance_asesoria_controlador(){

			$id=mainModel::decryption($_POST['asesoria_id_decrypt']);
			$id=mainModel::limpiar_cadena($id);

			$progreso=mainModel::limpiar_cadena($_POST['avance_asesoria_alumno']);

			if ($progreso=="") {
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			} 

			if(mainModel::verificar_datos("[A-Z a-z áéíóúüñÁÉÍÓÚÜÑ 0-9,:.-]{5,500}",$progreso)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El texto contiene caracteres no permitidos. Los caracteres que puede utilizar son: A-Z a-z áéíóúüñÁÉÍÓÚÜÑ 0-9 , : . -",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
					}
			
			$datos_avance=[
				"id"=>$id,
				"progreso"=>$progreso
			];

			$ins_datos_avance=asesoriasModelo::avance_asesoria_modelo($datos_avance);

			if($ins_datos_avance->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"Los datos de la  asesoría se han guardado correctamente",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"Los datos no se han registrado",
							"Tipo"=>"error"
							];
													
						}
							echo json_encode($alerta);
							exit();

		} /* FIN DEL CONTROLADOR */

		public function completada_asesoria_controlador(){

			$completada=mainModel::limpiar_cadena($_POST['estatus_asesoria_completada']);
			$id_asesoria=mainModel::limpiar_cadena($_POST['id_asesoria_completada']);
			$datos_completada=[
				"completada"=>$completada,
				"id_asesoria"=>$id_asesoria
			];
			
			$ins_completada=asesoriasModelo::completada_asesoria_modelo($datos_completada);

			if($ins_completada->rowCount()==1){
							$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"La asesoría se ha registrado como completada correctamente",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"La asesoría no se ha registrado como completada",
							"Tipo"=>"error"
							];
													
						}
							echo json_encode($alerta);
							exit();

		} /* FIN DEL CONTROLADOR */

		public function datos_asesoria_coordinacion_controlador($tipo, $id){

			$tipo=mainModel::limpiar_cadena($tipo);
			$id=mainModel::decryption($id);
			$id=mainModel::limpiar_cadena($id);

			return asesoriasModelo::datos_asesoria_coordinacion_modelo($tipo, $id);

		} /* FIN DEL CONTROLADOR */

				public function lista_asesorias_pasadas_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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

				$fechaActual=date("Y-m-d",strtotime("Today"));
				$fechaRegistros=date("Y-m-d",strtotime("Today -3 weeks"));

				if(isset($busqueda) && $busqueda !=""){
						
				
				}else{

					if($_SESSION['privilegio_scaa']!=6){
					// $consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE plantilla_horarios.estatus_hora_asesoria='2' AND persona.id_rol='6' AND plantilla_horarios.id_persona_asesor='".$_SESSION['id_scaa']."' ORDER BY asesorias.fecha_asesoria DESC";

					$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE plantilla_horarios.estatus_hora_asesoria='2' AND persona.id_rol='6' AND curso_asesorias.id_idioma='".$_SESSION['curso_asesor_scaa']."' AND asesorias.fecha_asesoria BETWEEN '$fechaRegistros' AND '$fechaActual' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora  DESC";

					$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE plantilla_horarios.estatus_hora_asesoria='2' AND persona.id_rol='6' AND curso_asesorias.id_idioma='".$_SESSION['curso_asesor_scaa']."' AND asesorias.fecha_asesoria BETWEEN '$fechaRegistros' AND '$fechaActual' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora  DESC LIMIT $inicio,$registros";
						
					}else{
						
						$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE plantilla_horarios.estatus_hora_asesoria='2' AND persona.id_persona='".$_SESSION['id_scaa']."'AND asesorias.fecha_asesoria BETWEEN '$fechaRegistros' AND '$fechaActual' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC";


						$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE plantilla_horarios.estatus_hora_asesoria='2' AND persona.id_persona='".$_SESSION['id_scaa']."'AND asesorias.fecha_asesoria BETWEEN '$fechaRegistros' AND '$fechaActual' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC LIMIT $inicio,$registros";
						}					
				}

				
			
				$conexion=mainModel::conectar();
				$fechaActual=date("Y-m-d",strtotime("Today"));
				$horaActual=date("H:i:s",strtotime("Now"));
				
				
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
							    <th>Día</th>
							    <th>Fecha</th>
							    <th>Hora</th>
							    <th>Tipo</th>
							    <th>Idioma</th>';
					if($_SESSION['privilegio_scaa']==6){	

						$tabla.=' <th>Asesor</th>';
					}

					if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){					    

						$tabla.=' <th>Alumno</th>
						 			<th>Nivel</th>';
						 $tabla.=' <th>Asesor</th>';
					}
					
					if($_SESSION['privilegio_scaa']==1){
						
						$tabla.=' <th>Alumno</th>
						 		<th>Nivel</th>';
						$tabla.=' <th>Asesor</th>';
					}

					$tabla.='
							<th>Completada</th>
						    <th>Avance</th>';
										

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos2 as $rows) {

								if($rows['dia']=="lu"){
									$dia="Lunes";
								}
								if($rows['dia']=="ma"){
									$dia="Martes";
								}
								if($rows['dia']=="mi"){
									$dia="Miércoles";
								}
								if($rows['dia']=="ju"){
									$dia="Jueves";
								}
								if($rows['dia']=="vi"){
									$dia="Viernes";
								}

								if($rows['tiempo_hora_asesoria']=="1"){
							
									$tipoAsesoria="Escritos 15 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="0"){
									$tipoAsesoria="Asesoría 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="2"){
									$tipoAsesoria="Conversación 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="3"){
									$tipoAsesoria="Lectura 30 minutos";
								}

								//if(!in_array($rows['id_persona'], $temporal_Array)){

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Día">'.$dia.'</td>
			                <td data-label="Fecha (s)">'.date('d-m-Y',strtotime($rows['fecha_asesoria'])).'</td>
			                <td data-label="Hora">'.date(" H:i",strtotime($rows['hora'])).'</td>
			                <td data-label="Tipo">'.$tipoAsesoria.'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>';
			                if($_SESSION['privilegio_scaa']==6){
			                $tabla.='<td data-label="Asesor">'.$rows['nombre2'].' '.$rows['apPaterno2'].'</td>';
							}	
							if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){
			                $tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
			                $tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
			                $tabla.='<td data-label="Asesor">'.$rows['nombre2'].'</td>';
							}
							if($_SESSION['privilegio_scaa']==1){
								
								$tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
								$tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
								$tabla.='<td data-label="Asesor">'.$rows['nombre2'].'</td>';
							}		

							
							if($_SESSION['privilegio_scaa']==6){
			               $tabla.=' <td data-label="Completada">';
								
								if($rows['completada']=="1"){
									
									$tabla.='
									<button type="submit" class="btnAsesoriaCompletada2" disabled>Completada</button></td>';
								}else{
									$tabla.='
									<button type="submit" class="btnAsesoriaIncompleta2" disabled>Incompleta</button></td>';
								}
							}

							if($_SESSION['privilegio_scaa']==1 || $_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){
							$tabla.=' <td data-label="Completada">';
								if($rows['completada']=="1"){
				               
				                   	$tabla.='
									<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" data-form="question" autocomplete="off">
									
									 <input type="hidden" name="id_asesoria_completada" value="'.$rows['id_asesoria'].'">
									 <input type="hidden" name="estatus_asesoria_completada" value="0">
									
									<button type="submit" class="btnAsesoriaCompletada">Completada</button>
									 </form></td>';
				            	 
				            	 }else{
				             		 $tabla.='
									<form class="FormularioAjax" action="'.SERVERURL.'ajax/asesoriasAjax.php" 	method="POST" data-form="question" autocomplete="off">
									
									 <input type="hidden" name="id_asesoria_completada" value="'.$rows['id_asesoria'].'">
									 <input type="hidden" name="estatus_asesoria_completada" value="1">
									
									<button type="submit" class="btnAsesoriaIncompleta">Incompleta</button>
									 </form></td>';
				             		 
				            	 }
			                }
			                
			                if($rows['fecha_asesoria']>=$fechaActual && $rows['hora']>$horaActual){
			                  	
		                  			$asesoria_vencida=asesoriasModelo::asesoria_volver_agendada_modelo($rows['id_plantilla_horario']);
		                  		}
							
			                 	$tabla.='<td data-label="Avance">';
							
			                   	$tabla.='<a href="'.SERVERURL.'avanceAsesoria/'.mainModel::encryption($rows['id_asesoria']).'/"><button class="btnActualizar">Avance</button></a>
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
					$tabla.='<p id="texto_derecha" class="texto_derecha">Mostrando asesoria '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			} /* FIN DEL CONTROLADOR */
			
			
			public function buscar_asesorias_pasadas_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda){
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
						$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']." ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC LIMIT $inicio,$registros";

						$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']." ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC LIMIT $inicio,$registros ";

						$consulta3="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']." ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC ";

					
					}else{
						
						$consulta2="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC LIMIT $inicio,$registros";

						$consulta="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC LIMIT $inicio,$registros ";

						$consulta3="SELECT *,p2.nombre AS nombre2,p2.apellido_paterno AS apPaterno2,p2.apellido_materno AS apMaterno2,p2.correo AS correo2, persona.nombre AS nombre1,persona.apellido_paterno AS apPaterno1,persona.apellido_materno AS apMaterno1,persona.correo AS correo1 FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN asesorias ON curso_asesorias.id_curso_asesoria=asesorias.id_curso JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona AS p2 ON p2.id_persona=plantilla_horarios.id_persona_asesor JOIN idioma ON idioma.id_idioma=curso_asesorias.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%') AND persona.id_rol='6' AND plantilla_horarios.estatus_hora_asesoria='2' ORDER BY asesorias.fecha_asesoria DESC, plantilla_horarios.hora DESC";
									
					  
					}


				$conexion=mainModel::conectar();
				$datos2 = $conexion->query($consulta2);
				$datos2 = $datos2->fetchAll();
				
				$datos3 = $conexion->query($consulta3);
				$total = $datos3->rowCount();
				
				$datos = $conexion->query($consulta);
				$datos = $datos->fetchAll();

				$Npaginas=ceil($total/$registros);
				
				$tabla.='						
					<div class="tableAlumnos">
						<table>
						  
							<thead>
							<tr class="text-center">
							    <th>#</th>
							    <th>Día</th>
							    <th>Fecha</th>
							    <th>Hora</th>
							    <th>Tipo</th>
							    <th>Idioma</th>';
					if($_SESSION['privilegio_scaa']==6){	

						$tabla.=' <th>Asesor</th>';
					}

					if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){					    

						$tabla.=' <th>Alumno</th>
						 			<th>Nivel</th>
						 			<th>Asesor</th>';
					}
					
					if($_SESSION['privilegio_scaa']==1){
						
						$tabla.=' <th>Alumno</th>
						 		<th>Nivel</th>
						 		<th>Asesor</th>';
					}

					$tabla.='
							<th>Completada</th>
						    <th>Avance</th>';
										

					$tabla.='	</tr >
								</thead>
						          <tbody>';

						          if($total>=1 && $pagina<=$Npaginas){
						          	$contador=$inicio+1;
						          	$reg_inicio=$inicio+1;
					          		
							foreach ($datos2 as $rows) {

								if($rows['dia']=="lu"){
									$dia="Lunes";
								}
								if($rows['dia']=="ma"){
									$dia="Martes";
								}
								if($rows['dia']=="mi"){
									$dia="Miércoles";
								}
								if($rows['dia']=="ju"){
									$dia="Jueves";
								}
								if($rows['dia']=="vi"){
									$dia="Viernes";
								}

								if($rows['tiempo_hora_asesoria']=="1"){
							
									$tipoAsesoria="Escritos 15 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="0"){
									$tipoAsesoria="Asesoría 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="2"){
									$tipoAsesoria="Conversación 30 minutos";
								}
								if($rows['tiempo_hora_asesoria']=="3"){
									$tipoAsesoria="Lectura 30 minutos";
								}

								//if(!in_array($rows['id_persona'], $temporal_Array)){

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="#">'.$contador.'</td>
			                <td data-label="Día">'.$dia.'</td>
			                <td data-label="Fecha (s)">'.date('d-m-Y',strtotime($rows['fecha_asesoria'])).'</td>
			                <td data-label="Hora">'.date(" H:i",strtotime($rows['hora'])).'</td>
			                <td data-label="Tipo">'.$tipoAsesoria.'</td>
			                <td data-label="Idioma">'.$rows['etiqueta_idioma'].'</td>';
			                if($_SESSION['privilegio_scaa']==6){
			                $tabla.='<td data-label="Asesor">'.$rows['nombre2'].' '.$rows['apPaterno2'].'</td>';
							}	
							if($_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){
			                $tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
			                $tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
			                $tabla.='<td data-label="Asesor">'.$rows['nombre2'].'</td>';
							}
							if($_SESSION['privilegio_scaa']==1){
								
								$tabla.='<td data-label="Alumno">'.$rows['nombre1'].' '.$rows['apPaterno1'].' '.$rows['apMaterno1'].'</td>';
								$tabla.='<td data-label="Nivel">'.$rows['nivel'].'</td>';
								$tabla.='<td data-label="Asesor">'.$rows['nombre2'].'</td>';
							}		

							
							if($_SESSION['privilegio_scaa']==6){
			               $tabla.=' <td data-label="Completada">';
								
								if($rows['completada']=="1"){
									
									$tabla.='
									<button type="submit" class="btnAsesoriaCompletada2" disabled>Completada</button></td>';
								}else{
									$tabla.='
									<button type="submit" class="btnAsesoriaIncompleta2" disabled>Incompleta</button></td>';
								}
							}

							if($_SESSION['privilegio_scaa']==1 || $_SESSION['privilegio_scaa']==2 || $_SESSION['privilegio_scaa']==4){
							$tabla.=' <td data-label="Completada">';
								if($rows['completada']=="1"){

									 $tabla.='
									<button type="submit" class="btnAsesoriaCompletada2" disabled>Completada</button></td>';
								}else{
									$tabla.='
									<button type="submit" class="btnAsesoriaIncompleta2" disabled>Incompleta</button></td>';
				             		 
				            	 }
			                }
							
			                 	$tabla.='<td data-label="Avance">';
							
			                   	$tabla.='<a href="'.SERVERURL.'avanceAsesoria/'.mainModel::encryption($rows['id_asesoria']).'/"><button class="btnActualizar">Avance</button></a>
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
					$tabla.='<p id="texto_derecha" class="texto_derecha">Mostrando asesoria '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';
					$tabla.=mainModel::paginador_tablas($pagina, $Npaginas, $url,7);
				}

				return $tabla;

			}/* FIN DEL CONTROLADOR */ 



	}

 
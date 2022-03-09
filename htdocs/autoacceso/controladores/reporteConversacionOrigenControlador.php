<?php 

	if($peticionAjax){
		require_once "../modelos/reportesModelo.php";
	}else{
		require_once "./modelos/reportesModelo.php";
	}
	class reporteConversacionOrigenControlador extends reportesModelo{

		public function reporte_conversacion_origen_controlador(){

			$mes=mainModel::limpiar_cadena($_POST['conv_origen']);


			if($mes=="1"){
				$mes1=date("Y-m-01", strtotime("January"));				
				$mes2=date("Y-m-t", strtotime("January"));
				$nombreMes="ENERO";
				
			}

			if($mes=="2"){
				$mes1=date("Y-m-01", strtotime("February"));				
				$mes2=date("Y-m-t", strtotime("February"));
				$nombreMes="FEBRERO";
			}

			if($mes=="3"){
				$mes1=date("Y-m-01", strtotime("March"));				
				$mes2=date("Y-m-t", strtotime("March"));
				$nombreMes="MARZO";
			}

			if($mes=="4"){
				$mes1=date("Y-m-01", strtotime("April"));				
				$mes2=date("Y-m-t", strtotime("April"));
				$nombreMes="ABRIL";
			}

			if($mes=="5"){
				$mes1=date("Y-m-01", strtotime("May"));				
				$mes2=date("Y-m-t", strtotime("May"));
				$nombreMes="MAYO";
			}

			if($mes=="6"){
				$mes1=date("Y-m-01", strtotime("June"));				
				$mes2=date("Y-m-t", strtotime("June"));
				$nombreMes="JUNIO";
			}

			if($mes=="7"){
				$mes1=date("Y-m-01", strtotime("July"));				
				$mes2=date("Y-m-t", strtotime("July"));
				$nombreMes="JULIO";
			}

			if($mes=="8"){
				$mes1=date("Y-m-01", strtotime("August"));				
				$mes2=date("Y-m-t", strtotime("August"));
				$nombreMes="AGOSTO";
			}

			if($mes=="9"){
				$mes1=date("Y-m-01", strtotime("September"));				
				$mes2=date("Y-m-t", strtotime("September"));
				$nombreMes="SEPTIEMBRE";
			}

			if($mes=="10"){
				$mes1=date("Y-m-01", strtotime("October"));				
				$mes2=date("Y-m-t", strtotime("October"));
				$nombreMes="OCTUBRE";
			}

			if($mes=="11"){
				$mes1=date("Y-m-01", strtotime("November"));				
				$mes2=date("Y-m-t", strtotime("November"));
				$nombreMes="NOVIEMBRE";
			}


			if($mes=="12"){
				$mes1=date("Y-m-01", strtotime("December"));				
				$mes2=date("Y-m-t", strtotime("December"));
				$nombreMes="DICIEMBRE";
			}

		
			/* --------- CONSULTAS POR MES LEI ---------- */
			$consulta=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta -> execute();
			$dato = $consulta -> fetch();

			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta2 -> execute();
			$dato2 = $consulta2 -> fetch();

			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta3 -> execute();
			$dato3 = $consulta3 -> fetch();

			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta4 -> execute();
			$dato4 = $consulta4 -> fetch();

			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta5 -> execute();
			$dato5 = $consulta5 -> fetch();

			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta6 -> execute();
			$dato6 = $consulta6 -> fetch();




						/* --------- CONSULTAS POR MES CAA ---------- */
			$consulta73=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta73 -> execute();
			$dato73 = $consulta73 -> fetch();

			$consulta74=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta74 -> execute();
			$dato74 = $consulta74 -> fetch();

			$consulta75=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta75 -> execute();
			$dato75 = $consulta75 -> fetch();

			$consulta76=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta76 -> execute();
			$dato76 = $consulta76 -> fetch();

			$consulta77=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta77 -> execute();
			$dato77 = $consulta77 -> fetch();

			$consulta78=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta78 -> execute();
			$dato78 = $consulta78 -> fetch();


			/* --------- TOTAL POR MES ---------- */

			$consulta145=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta145 -> execute();
			$dato145 = $consulta145 -> fetch();

			$consulta146=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta146 -> execute();
			$dato146 = $consulta146 -> fetch();

			$consulta147=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta147 -> execute();
			$dato147 = $consulta147 -> fetch();

			$consulta148=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta148 -> execute();
			$dato148 = $consulta148 -> fetch();

			$consulta149=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta149 -> execute();
			$dato149 = $consulta149 -> fetch();

			$consulta150=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta150 -> execute();
			$dato150 = $consulta150 -> fetch();



									/* --------- TOTALES POR MES  ---------- */

			$consulta183=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta183 -> execute();
			$dato183 = $consulta183 -> fetch();



			

			

			$tabla="";
				$tabla.='						
						 <div class="tableAlumnos"  id="tableInscritos2">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>IDIOMA</th>
						    <th colspan=2>'.$nombreMes.'</th>
						    
						    <th colspan=2>TOTAL MENSUAL</th>
						   
								</tr >
								</thead>
						          <tbody>
									<tr class="text-center">
										<td data-label="'.$nombreMes.'"></td>
										
										<td data-label="LEI">LEI</td>
										<td data-label="CAA">CAA</td>
										
										
										
									</tr>
									<tr class="text-center">
										<td data-label="Inglés">Inglés</td>
										<td data-label="LEI">'.$dato[0].'</td>
										<td data-label="CAA">'.$dato73[0].'</td>
										
										<td data-label="TOTAL">'.$dato145[0].'</td>
										
									</tr>
									<tr class="text-center">
										<td data-label="Francés">Francés</td>
										<td data-label="LEI">'.$dato2[0].'</td>
										<td data-label="CAA">'.$dato74[0].'</td>
										

										<td data-label="TOTAL">'.$dato146[0].'</td>
										
									</tr>
									<tr class="text-center">
										<td data-label="Alemán">Alemán</td>
										<td data-label="LEI">'.$dato3[0].'</td>
										<td data-label="CAA">'.$dato75[0].'</td>
										
										<td data-label="TOTAL">'.$dato147[0].'</td>
										
									</tr>
									<tr class="text-center">
										<td data-label="Italiano">Italiano</td>
										<td data-label="LEI">'.$dato4[0].'</td>
										<td data-label="CAA">'.$dato76[0].'</td>
										
										<td data-label="TOTAL">'.$dato148[0].'</td>
										
									</tr>
									<tr class="text-center">
										<td data-label="Chino">Chino</td>
										<td data-label="LEI">'.$dato5[0].'</td>
										<td data-label="CAA">'.$dato77[0].'</td>
										
										<td data-label="TOTAL">'.$dato149[0].'</td>
										
									</tr>
									<tr class="text-center">	
										<td data-label="Español">Español</td>
										<td data-label="LEI">'.$dato6[0].'</td>
										<td data-label="CAA">'.$dato78[0].'</td>
										
										<td data-label="TOTAL">'.$dato150[0].'</td>
										
									</tr>
									
									<tr class="text-center">	
										<td data-label="TOTAL">TOTAL</td>
										<td colspan=2 data-label="TOTAL">'.$dato183[0].'</td>
										
										<td data-label="TOTAL">'.$dato183[0].'</td>
									</tr>
									';
			            $tabla.='</tbody></table></div><br>';
			            print($tabla);

		} /* FIN DEL CONTROLADOR */
	}
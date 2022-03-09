<?php 
	if($peticionAjax){
		require_once "../modelos/reportesModelo.php";
	}else{
		require_once "./modelos/reportesModelo.php";
	}
	class reporteConversacionControlador extends reportesModelo{
		public function reporte_conversacion_controlador(){
			$mat="09:00:00";
			$mat2="14:50:00";

			$vesp="15:00:00";
			$vesp2="19:50:00";

			$trimestre=mainModel::limpiar_cadena($_POST['conversacion']);


			if($trimestre=="1"){
				$mes1=date("Y-m-01", strtotime("January"));				
				$mes2=date("Y-m-t", strtotime("January"));
				$nombreMes="ENERO";
				
			}

			if($trimestre=="2"){
				$mes1=date("Y-m-01", strtotime("February"));				
				$mes2=date("Y-m-t", strtotime("February"));
				$nombreMes="FEBRERO";
			}

			if($trimestre=="3"){
				$mes1=date("Y-m-01", strtotime("March"));				
				$mes2=date("Y-m-t", strtotime("March"));
				$nombreMes="MARZO";
			}

			if($trimestre=="4"){
				$mes1=date("Y-m-01", strtotime("April"));				
				$mes2=date("Y-m-t", strtotime("April"));
				$nombreMes="ABRIL";
			}

			if($trimestre=="5"){
				$mes1=date("Y-m-01", strtotime("May"));				
				$mes2=date("Y-m-t", strtotime("May"));
				$nombreMes="MAYO";
			}

			if($trimestre=="6"){
				$mes1=date("Y-m-01", strtotime("June"));				
				$mes2=date("Y-m-t", strtotime("June"));
				$nombreMes="JUNIO";
			}

			if($trimestre=="7"){
				$mes1=date("Y-m-01", strtotime("July"));				
				$mes2=date("Y-m-t", strtotime("July"));
				$nombreMes="JULIO";
			}

			if($trimestre=="8"){
				$mes1=date("Y-m-01", strtotime("August"));				
				$mes2=date("Y-m-t", strtotime("August"));
				$nombreMes="AGOSTO";
			}

			if($trimestre=="9"){
				$mes1=date("Y-m-01", strtotime("September"));				
				$mes2=date("Y-m-t", strtotime("September"));
				$nombreMes="SEPTIEMBRE";
			}

			if($trimestre=="10"){
				$mes1=date("Y-m-01", strtotime("October"));				
				$mes2=date("Y-m-t", strtotime("October"));
				$nombreMes="OCTUBRE";
			}

			if($trimestre=="11"){
				$mes1=date("Y-m-01", strtotime("November"));				
				$mes2=date("Y-m-t", strtotime("November"));
				$nombreMes="NOVIEMBRE";
			}

			if($trimestre=="12"){
				$mes1=date("Y-m-01", strtotime("December"));				
				$mes2=date("Y-m-t", strtotime("December"));
				$nombreMes="DICIEMBRE";
			}

			$consulta=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta -> execute();
			$dato = $consulta -> fetch();

			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta2 -> execute();
			$dato2 = $consulta2 -> fetch();

			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta3 -> execute();
			$dato3 = $consulta3 -> fetch();

			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta4 -> execute();
			$dato4 = $consulta4 -> fetch();

			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta5 -> execute();
			$dato5 = $consulta5 -> fetch();

			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta6 -> execute();
			$dato6 = $consulta6 -> fetch();


			


			$consulta73=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta73 -> execute();
			$dato73 = $consulta73 -> fetch();

			$consulta74=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta74 -> execute();
			$dato74 = $consulta74 -> fetch();

			$consulta75=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta75 -> execute();
			$dato75 = $consulta75 -> fetch();

			$consulta76=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta76 -> execute();
			$dato76 = $consulta76 -> fetch();

			$consulta77=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta77 -> execute();
			$dato77 = $consulta77 -> fetch();

			$consulta78=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta78 -> execute();
			$dato78 = $consulta78 -> fetch();

			

			$consulta157=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta157 -> execute();
			$dato157 = $consulta157 -> fetch();

			$consulta158=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta158 -> execute();
			$dato158 = $consulta158 -> fetch();

			$consulta159=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta159 -> execute();
			$dato159 = $consulta159 -> fetch();

			$consulta160=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta160 -> execute();
			$dato160 = $consulta160 -> fetch();

			$consulta161=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta161 -> execute();
			$dato161 = $consulta161 -> fetch();

			






			$consulta162=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta162 -> execute();
			$dato162 = $consulta162 -> fetch();


			$consulta163=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta163 -> execute();
			$dato163 = $consulta163 -> fetch();
				
			$consulta176=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta176 -> execute();
			$dato176 = $consulta176 -> fetch();






			$consulta189=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta189 -> execute();
			$dato189 = $consulta189 -> fetch();

			$consulta190=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta190 -> execute();
			$dato190 = $consulta190 -> fetch();

			$consulta202=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta202 -> execute();
			$dato202 = $consulta202 -> fetch();



			$tabla="";
				$tabla.='						
						 <div class="tableAlumnos"  id="tableInscritos2">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>IDIOMA</th>
						    <th colspan=2>'.$nombreMes.'</th>
						    
						   
						    <th>TOTAL</th>
						   
								</tr >
								</thead>
						          <tbody>
									<tr class="text-center">
										<td data-label="'.$nombreMes.'"></td>
										
										<td data-label="Mat">Mat</td>
										<td data-label="Vesp">Vesp</td>
									</tr>
									<tr class="text-center">
										<td data-label="Inglés">Inglés</td>
										
										<td data-label="Mat">'.$dato[0].'</td>
										<td data-label="Vesp">'.$dato73[0].'</td>

										<td data-label="TOTAL">'.$dato157[0].'</td>
									</tr>
									<tr class="text-center">
										<td data-label="Francés">Francés</td>
										
										<td data-label="Mat">'.$dato2[0].'</td>
										<td data-label="Vesp">'.$dato74[0].'</td>

										<td data-label="TOTAL">'.$dato158[0].'</td>
									</tr>
									<tr class="text-center">
										<td data-label="Alemán">Alemán</td>
										
										<td data-label="Mat">'.$dato3[0].'</td>
										<td data-label="Vesp">'.$dato75[0].'</td>
	
										<td data-label="TOTAL">'.$dato159[0].'</td>
									</tr>
									<tr class="text-center">
										<td data-label="Italiano">Italiano</td>
										
										<td data-label="Mat">'.$dato4[0].'</td>
										<td data-label="Vesp">'.$dato76[0].'</td>
			
										<td data-label="TOTAL">'.$dato160[0].'</td>
									</tr>
									<tr class="text-center">
										<td data-label="Chino">Chino</td>
										
										<td data-label="Mat">'.$dato5[0].'</td>
										<td data-label="Vesp">'.$dato77[0].'</td>
	
										<td data-label="TOTAL">'.$dato161[0].'</td>
									</tr>
									<tr class="text-center">	
										<td data-label="Español">Español</td>
										
										<td data-label="Mat">'.$dato6[0].'</td>
										<td data-label="Vesp">'.$dato78[0].'</td>
	
										<td data-label="TOTAL">'.$dato162[0].'</td>
									</tr>
									<tr class="text-center">	
										<td data-label="SUB-TOTAL">SUB-TOTAL</td>
										
										<td data-label="Mat">'.$dato163[0].'</td>
										<td data-label="Vesp">'.$dato176[0].'</td>
	
										<td data-label="TOTAL">'.$dato189[0].'</td>
									</tr>
									<tr class="text-center">	
										<td data-label="TOTAL">TOTAL</td>
										<td colspan=2 data-label="TOTAL">'.$dato190[0].'</td>

										</tr>
									';
			            $tabla.='</tbody></table></div><br>';
			            print($tabla);
			        }

				}

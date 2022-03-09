<?php 

	if($peticionAjax){
		require_once "../modelos/reportesModelo.php";
	}else{
		require_once "./modelos/reportesModelo.php";
	}
	class reporteAsistenciaControlador extends reportesModelo{

		public function reporte_asistencia_controlador(){

			$mes=mainModel::limpiar_cadena($_POST['asistencia_mensual']);
			$enero=date("Y-m-01", strtotime("January"));
			$diciembre2=date("Y-m-t", strtotime("December"));

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

			$consulta=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta->execute();
			$dato = $consulta->fetch();

			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta2->execute();
			$dato2 = $consulta2->fetch();

			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta3->execute();
			$dato3 = $consulta3->fetch();

			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta4->execute();
			$dato4 = $consulta4->fetch();

			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta5->execute();
			$dato5 = $consulta5->fetch();

			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta6->execute();
			$dato6 = $consulta6->fetch();


			
			$consulta73=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta73->execute();
			$dato73 = $consulta73->fetch();

			$consulta74=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta74->execute();
			$dato74 = $consulta74->fetch();

			$consulta75=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta75->execute();
			$dato75 = $consulta75->fetch();

			$consulta76=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta76->execute();
			$dato76 = $consulta76->fetch();

			$consulta77=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta77->execute();
			$dato77 = $consulta77->fetch();

			$consulta78=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta78->execute();
			$dato78 = $consulta78->fetch();


			$consulta79=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta79->execute();
			$dato79 = $consulta79->fetch();

			





			$consulta91=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2' AND asesorias.completada=1");
			$consulta91->execute();
			$dato91 = $consulta91->fetch();

			$consulta92=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta92->execute();
			$dato92 = $consulta92->fetch();

			




			$consulta104=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta104->execute();
			$dato104 = $consulta104->fetch();



			$consulta116=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta116->execute();
			$dato116 = $consulta116->fetch();

			$consulta117=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta117->execute();
			$dato117 = $consulta117->fetch();
			


			$tabla="";
			$tabla2="";
				$tabla.='						
					<div class="tableAlumnos"  id="tableInscritos2">
					<table>
						  
					<thead>
						<tr class="text-center">
							<th>IDIOMA</th>
							<th>'.$nombreMes.'</th>
							
							<th>TOTAL ENE-DIC</th>
							   
						</tr >
					</thead>
					<tbody>
						<tr class="text-center">
										<td data-label="Inglés">Inglés</td>
										<td data-label='.$nombreMes.'>'.$dato[0].'</td>
										
										<td data-label="Total">'.$dato73[0].'</td>
									</tr>
									<tr class="text-center">
										<td data-label="Francés">Francés</td>
										<td data-label='.$nombreMes.'>'.$dato2[0].'</td>
										
										<td data-label="Total">'.$dato74[0].'</td>										
									</tr>
									<tr class="text-center">
										<td data-label="Alemán">Alemán</td>
										<td data-label='.$nombreMes.'>'.$dato3[0].'</td>
										
										<td data-label="Total">'.$dato75[0].'</td>	
									</tr>
									<tr class="text-center">
										<td data-label="Italiano">Italiano</td>
										<td data-label='.$nombreMes.'>'.$dato4[0].'</td>
										
										<td data-label="Total">'.$dato76[0].'</td>	
									</tr>
									<tr class="text-center">
										<td data-label="Chino">Chino</td>
										<td data-label='.$nombreMes.'>'.$dato5[0].'</td>
										
										<td data-label="Total">'.$dato77[0].'</td>
									</tr>
									<tr class="text-center">	
										<td data-label="Español">Español</td>
										<td data-label='.$nombreMes.'>'.$dato6[0].'</td>
										
										<td data-label="Total">'.$dato78[0].'</td>
									</tr>
									<tr class="text-center">	
										<td data-label="TOTAL">TOTAL</td>
										<td data-label='.$nombreMes.'>'.$dato79[0].'</td>
										
										<td data-label="Total">'.$dato91[0].'</td>
									</tr>
						';
			        $tabla.='</tbody></table></div><br><h2>Concentrado de asistencia mensual por origen</h2> ';
			        print($tabla);

			        $tabla2.='						
					<div class="tableAlumnos"  id="tableInscritos2">
					<table>
						  
					<thead>
						<tr class="text-center">
							<th></th>
							<th>'.$nombreMes.'</th>
							
							<th>TOTAL ENE-DIC</th>
							   
						</tr >
					</thead>
					<tbody>
						<tr class="text-center">
							<td>CAA</td>
								<td data-label='.$nombreMes.'>'.$dato92[0].'</td>
								
								<td data-label="Total">'.$dato116[0].'</td>
						</tr>
						<tr class="text-center">
							<td>LEI</td>
								<td data-label='.$nombreMes.'>'.$dato104[0].'</td>
								
								<td data-label="Total">'.$dato117[0].'</td>
						</tr>
						<tr class="text-center">
							<td data-label="TOTAL">TOTAL</td>
										<td data-label='.$nombreMes.'>'.$dato79[0].'</td>
										
										<td data-label="Total">'.$dato91[0].'</td>
						</tr>
						';
			        $tabla2.='</tbody></table></div><br>';
			        print($tabla2);


		} /* FIN DEL CONTROLADOR */

	}
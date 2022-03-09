<?php 

	if($peticionAjax){
		require_once "../modelos/reportesModelo.php";
	}else{
		require_once "./modelos/reportesModelo.php";
	}
	class reporteInscritosControlador extends reportesModelo{

		public function reporte_inscritos_periodo_controlador(){


			$periodo=mainModel::limpiar_cadena($_POST['inscritos_periodo']);

			if($periodo=="1"){
				$periodo1='ENERO '.date("Y", strtotime("this Year")).' - AGOSTO '.date("Y", strtotime("this Year"));
				$periodo2='ABRIL '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
				$periodo3='ENERO '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
			}

			if($periodo=="2"){
				$periodo1='AGOSTO '.date("Y", strtotime("this Year")).' - ENERO '.date("Y", strtotime("next Year"));
				$periodo2='OCTUBRE '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));
				$periodo3='AGOSTO '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));
				
			}

			
			

			
			$consulta=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo1'");
				$consulta->execute();
				$dato = $consulta->fetch();
				
			
			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo1'");
				$consulta2->execute();
				$dato2 = $consulta2->fetch();
				
			
			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo1'");
				$consulta3->execute();
				$dato3 = $consulta3->fetch();
				
			
			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo1'");
				$consulta4->execute();
				$dato4 = $consulta4->fetch();
				
			
			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo1'");
				$consulta5->execute();
				$dato5 = $consulta5->fetch();
				
			
			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo1'");
				$consulta6->execute();
				$dato6 = $consulta6->fetch();
				


			$consulta7=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo2'");
				$consulta7->execute();
				$dato7 = $consulta7->fetch();
				
			
			$consulta8=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo2'");
				$consulta8->execute();
				$dato8 = $consulta8->fetch();
				
			
			$consulta9=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo2'");
				$consulta9->execute();
				$dato9 = $consulta9->fetch();
				
			
			$consulta10=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo2'");
				$consulta10->execute();
				$dato10 = $consulta10->fetch();
				
			
			$consulta11=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo2'");
				$consulta11->execute();
				$dato11 = $consulta11->fetch();
				
			
			$consulta12=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo2'");
				$consulta12->execute();
				$dato12 = $consulta12->fetch();
				

						

			$consulta25=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND persona.dependencia='Conversación' AND curso_asesorias.periodo='$periodo1' AND persona.id_rol=6");
				$consulta25->execute();
				$dato25 = $consulta25->fetch();
			$consulta26=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND persona.dependencia='Conversación' AND curso_asesorias.periodo='$periodo2' AND persona.id_rol=6");
				$consulta26->execute();
				$dato26 = $consulta26->fetch();


			$consulta29=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo1'");
				$consulta29->execute();
				$dato29 = $consulta29->fetch();
			$consulta30=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo2'");
				$consulta30->execute();
				$dato30 = $consulta30->fetch();

				$consulta33=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta33->execute();
				$dato33 = $consulta33->fetch();
				// $consulta33->debugDumpParams();
				
				$consulta34=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta34->execute();
				$dato34 = $consulta34->fetch();
				
				$consulta35=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta35->execute();
				$dato35 = $consulta35->fetch();
				
				$consulta36=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta36->execute();
				$dato36 = $consulta36->fetch();
				
				$consulta37=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta37->execute();
				$dato37 = $consulta37->fetch();
				
				$consulta38=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta38->execute();
				$dato38 = $consulta38->fetch();

				$consulta39=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND persona.dependencia='Conversación' AND persona.id_rol=6 AND curso_asesorias.periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta39->execute();
				$dato39 = $consulta39->fetch();

				$consulta40=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo BETWEEN '$periodo1' AND '$periodo2'");
				$consulta40->execute();
				$dato40 = $consulta40->fetch();
				
				$tabla="";
				$tabla.='						
						 <div class="tableAlumnos"  id="tableInscritos2">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>Periodo</th>
						    <th>Inglés</th>
						    <th>Francés</th>
						    <th>Alemán</th>
						    <th>Italiano</th>
						    <th>Chino</th>
						    <th>Español</th>
						    <th>Conversación Ingles (Depto.)</th>
						    <th>Total</th>
						   
								</tr >
								</thead>
						          <tbody>
						<tr class="text-center" >
			                <td data-label="'.$periodo1.'">'.$periodo1.'</td>
			                <td data-label="Inglés">'.$dato[0].'</td>
			                <td data-label="Francés">'.$dato2[0].'</td>
			                <td data-label="Alemán">'.$dato3[0].'</td>
			                <td data-label="Italiano">'.$dato4[0].'</td>
			                <td data-label="Chino">'.$dato5[0].'</td>
			                <td data-label="Español">'.$dato6[0].'</td>
			                <td data-label="Conversación Ingles (Depto.)">'.$dato25[0].'</td>
			                <td data-label="Total">'.$dato29[0].'</td>
			            </tr>
			            <tr class="text-center" >
			                <td data-label="'.$periodo2.'">'.$periodo2.'</td>
			                <td data-label="Inglés">'.$dato7[0].'</td>
			                <td data-label="Francés">'.$dato8[0].'</td>
			                <td data-label="Alemán">'.$dato9[0].'</td>
			                <td data-label="Italiano">'.$dato10[0].'</td>
			                <td data-label="Chino">'.$dato11[0].'</td>
			                <td data-label="Español">'.$dato12[0].'</td>
			                <td data-label="Conversación Ingles (Depto.)">'.$dato26[0].'</td>
			                <td data-label="Total">'.$dato30[0].'</td>
			            </tr>

			             <tr class="text-center" >
			               <td data-label="Total">Total</td>
			               <td data-label="Total">'.$dato33[0].'</td>
			               <td data-label="Total">'.$dato34[0].'</td>
			               <td data-label="Total">'.$dato35[0].'</td>
			               <td data-label="Total">'.$dato36[0].'</td>
			               <td data-label="Total">'.$dato37[0].'</td>
			               <td data-label="Total">'.$dato38[0].'</td>
			               <td data-label="Total">'.$dato39[0].'</td>
			               <td data-label="Total">'.$dato40[0].'</td>
			            </tr>
			            ';
			            $tabla.='</tbody></table></div><br>';
			            print($tabla);
						// return $tabla;

						$tabla2="";
				$tabla2.='
					<div class="tableAlumnos" id="tableInscritos1">
						<table>
						  
						  <thead class="theadAsesorias">
						  <tr class="text-center">
						    <th id="theadAsesoriasLabel">IDIOMAS</th>
						    <th id="theadAsesoriasLabel">Total</th>
							</tr >
								</thead>
						          <tbody>
						          <tr class="text-center" >
										<td data-label="Inglés">Inglés</td>
										<td data-label="Inglés">'.$dato33[0].'</td>
									 </tr>
									<tr class="text-center" >
										<td data-label="Francés">Francés</td>
										<td data-label="Francés">'.$dato34[0].'</td>
									</tr>
									<tr class="text-center" >
										<td data-label="Alemán">Alemán</td>
										<td data-label="Alemán">'.$dato35[0].'</td>
									</tr>
									<tr class="text-center" >
										<td data-label="Italiano">Italiano</td>
										<td data-label="Italiano">'.$dato36[0].'</td>
									</tr>
									<tr class="text-center" >
										<td data-label="Chino">Chino</td>
										<td data-label="Chino">'.$dato37[0].'</td>
									</tr>
									<tr class="text-center" >
										<td data-label="Español">Español</td>
										<td data-label="Español">'.$dato38[0].'</td>
									</tr>
									<tr class="text-center" >
										<td data-label="Conversación Ingles (Depto.)">Conversación Ingles (Depto.)</td>
										<td data-label="Conversación Ingles (Depto.)">'.$dato39[0].'</td>
									</tr>';
				$tabla2.='</tbody></table></div><br>';
				
				print($tabla2);
		} /* FIN DEL CONTROLADOR */
	}
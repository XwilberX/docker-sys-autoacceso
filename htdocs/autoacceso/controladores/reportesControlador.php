<?php 

	if($peticionAjax){
		require_once "../modelos/reportesModelo.php";
	}else{
		require_once "./modelos/reportesModelo.php";
	}
	class reportesControlador extends reportesModelo{

		public function reporte_inscritos_periodo_controlador(){

			$periodo1='ENERO '.date("Y", strtotime("this Year")).' - AGOSTO '.date("Y", strtotime("this Year"));
			$periodo2='ABRIL '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
			$periodo3='AGOSTO '.date("Y", strtotime("this Year")).' - ENERO '.date("Y", strtotime("next Year"));
			$periodo4='OCTUBRE '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));

			
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
				

						
			$consulta13=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo3'");
				$consulta13->execute();
				$dato13 = $consulta13->fetch();
				
			
			$consulta14=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo3'");
				$consulta14->execute();
				$dato14 = $consulta14->fetch();
				
			
			$consulta15=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo3'");
				$consulta15->execute();
				$dato15 = $consulta15->fetch();
				
			
			$consulta16=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo3'");
				$consulta16->execute();
				$dato16 = $consulta16->fetch();
				
			
			$consulta17=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo3'");
				$consulta17->execute();
				$dato17 = $consulta17->fetch();
				
			
			$consulta18=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo3'");
				$consulta18->execute();
				$dato18 = $consulta18->fetch();
				


			$consulta19=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo4'");
				$consulta19->execute();
				$dato19 = $consulta19->fetch();
				
			
			$consulta20=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo4'");
				$consulta20->execute();
				$dato20 = $consulta20->fetch();
				
			
			$consulta21=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo4'");
				$consulta21->execute();
				$dato21 = $consulta21->fetch();
				
			
			$consulta22=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo4'");
				$consulta22->execute();
				$dato22 = $consulta22->fetch();
				
			
			$consulta23=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo4'");
				$consulta23->execute();
				$dato23 = $consulta23->fetch();
				
			
			$consulta24=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo4'");
				$consulta24->execute();
				$dato24 = $consulta24->fetch();

			$consulta25=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo1'");
				$consulta25->execute();
				$dato25 = $consulta25->fetch();
			$consulta26=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo2'");
				$consulta26->execute();
				$dato26 = $consulta26->fetch();
			$consulta27=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo3'");
				$consulta27->execute();
				$dato27 = $consulta27->fetch();
			$consulta28=mainModel::conectar()->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo4'");
				$consulta28->execute();
				$dato28 = $consulta28->fetch();

			$consulta29=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo1'");
				$consulta29->execute();
				$dato29 = $consulta29->fetch();
			$consulta30=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo2'");
				$consulta30->execute();
				$dato30 = $consulta30->fetch();
			$consulta31=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo3'");
				$consulta31->execute();
				$dato31 = $consulta31->fetch();
			$consulta32=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo4'");
				$consulta32->execute();
				$dato32 = $consulta32->fetch();

				$consulta33=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND  periodo!='null'");
				$consulta33->execute();
				$dato33 = $consulta33->fetch();
				
				$consulta34=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND  periodo!='null'");
				$consulta34->execute();
				$dato34 = $consulta34->fetch();
				
				$consulta35=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND  periodo!='null'");
				$consulta35->execute();
				$dato35 = $consulta35->fetch();
				
				$consulta36=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND  periodo!='null'");
				$consulta36->execute();
				$dato36 = $consulta36->fetch();
				
				$consulta37=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND  periodo!='null'");
				$consulta37->execute();
				$dato37 = $consulta37->fetch();
				
				$consulta38=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND  periodo!='null'");
				$consulta38->execute();
				$dato38 = $consulta38->fetch();

				$consulta39=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND  periodo!='null'");
				$consulta39->execute();
				$dato39 = $consulta39->fetch();

				$consulta40=mainModel::conectar()->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma<=6 AND periodo!='null'");
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
			                <td data-label="'.$periodo3.'">'.$periodo3.'</td>
			                <td data-label="Inglés">'.$dato13[0].'</td>
			                <td data-label="Francés">'.$dato14[0].'</td>
			                <td data-label="Alemán">'.$dato15[0].'</td>
			                <td data-label="Italiano">'.$dato16[0].'</td>
			                <td data-label="Chino">'.$dato17[0].'</td>
			                <td data-label="Español">'.$dato18[0].'</td>
			                <td data-label="Conversación Ingles (Depto.)">'.$dato27[0].'</td>
			                <td data-label="Total">'.$dato31[0].'</td>
			            </tr>
			            <tr class="text-center" >
			                <td data-label="'.$periodo4.'">'.$periodo4.'</td>
			                <td data-label="Inglés">'.$dato19[0].'</td>
			                <td data-label="Francés">'.$dato20[0].'</td>
			                <td data-label="Alemán">'.$dato21[0].'</td>
			                <td data-label="Italiano">'.$dato22[0].'</td>
			                <td data-label="Chino">'.$dato23[0].'</td>
			                <td data-label="Español">'.$dato24[0].'</td>
			                <td data-label="Conversación Ingles (Depto.)">'.$dato28[0].'</td>
			                <td data-label="Total">'.$dato32[0].'</td>
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


		public function reporte_inscritos_genero_controlador(){
			$periodo1='ENERO '.date("Y", strtotime("this Year")).' - AGOSTO '.date("Y", strtotime("this Year"));
			$periodo2='ABRIL '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
			$periodo3='AGOSTO '.date("Y", strtotime("this Year")).' - ENERO '.date("Y", strtotime("next Year"));
			$periodo4='OCTUBRE '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));

				/*-------- CONSULTAS SEXO --------*/

			$consulta=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Masculino' AND curso_asesorias.periodo='$periodo1'");
			$consulta -> execute();
			$dato = $consulta->fetch();

			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Masculino' AND curso_asesorias.periodo='$periodo2'");
			$consulta2 -> execute();
			$dato2 = $consulta2->fetch();

			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Masculino' AND curso_asesorias.periodo='$periodo3'");
			$consulta3 -> execute();
			$dato3 = $consulta3->fetch();

			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Masculino' AND curso_asesorias.periodo='$periodo4'");
			$consulta4 -> execute();
			$dato4 = $consulta4->fetch();

			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Masculino'");
			$consulta5 -> execute();
			$dato5 = $consulta5->fetch();


			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Femenino' AND curso_asesorias.periodo='$periodo1'");
			$consulta6 -> execute();
			$dato6 = $consulta6->fetch();

			$consulta7=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Femenino' AND curso_asesorias.periodo='$periodo2'");
			$consulta7 -> execute();
			$dato7 = $consulta7->fetch();

			$consulta8=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Femenino' AND curso_asesorias.periodo='$periodo3'");
			$consulta8 -> execute();
			$dato8 = $consulta8->fetch();

			$consulta9=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Femenino' AND curso_asesorias.periodo='$periodo4'");
			$consulta9 -> execute();
			$dato9 = $consulta9->fetch();

			$consulta10=mainModel::conectar()->prepare("SELECT COUNT(sexo) FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.sexo='Femenino'");
			$consulta10 -> execute();
			$dato10 = $consulta10->fetch();


			/*-------- CONSULTAS DEPENDENCIA --------*/


				
			$tabla="";
				$tabla.='						
						 <div class="tableAlumnos"  id="tableInscritos2">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>GÉNERO/INSTITUCIÓN</th>
						    <th>'.$periodo1.'</th>
						    <th>'.$periodo2.'</th>
						    <th>'.$periodo3.'</th>
						    <th>'.$periodo4.'</th>
						    <th>TOTAL GÉNERO/INSTITUCIÓN</th>
						   
								</tr >
								</thead>
						          <tbody>
									<tr class="text-center">
										<td data-label="Masculino">Masculino</td>
										<td data-label="'.$periodo1.'">'.$dato[0].'</td>
										<td data-label="'.$periodo2.'">'.$dato2[0].'</td>
										<td data-label="'.$periodo3.'">'.$dato3[0].'</td>
										<td data-label="'.$periodo4.'">'.$dato4[0].'</td>
										<td data-label="TOTAL">'.$dato5[0].'</td>
									</tr>

									<tr class="text-center">
										<td data-label="Femenino">Femenino</td>
										<td data-label="'.$periodo1.'">'.$dato6[0].'</td>
										<td data-label="'.$periodo2.'">'.$dato7[0].'</td>
										<td data-label="'.$periodo3.'">'.$dato8[0].'</td>
										<td data-label="'.$periodo4.'">'.$dato9[0].'</td>
										<td data-label="TOTAL">'.$dato10[0].'</td>
									</tr>
									';
			            $tabla.='</tbody></table></div><br>';
			            print($tabla);


		} /* FIN DEL CONTROLADOR */



		public function reporte_asesorias_controlador(){

			$mat="09:00:00";
			$mat2="14:50:00";

			$vesp="15:00:00";
			$vesp2="19:50:00";

			$trimestre=mainModel::limpiar_cadena($_POST['trimestreAsesorias']);
		

				$nombreMes1="";
				$nombreMes2="";
				$nombreMes3="";

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

			$consulta=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta -> execute();
			$dato = $consulta -> fetch();

			$consulta2=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta2 -> execute();
			$dato2 = $consulta2 -> fetch();

			$consulta3=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta3 -> execute();
			$dato3 = $consulta3 -> fetch();

			$consulta4=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta4 -> execute();
			$dato4 = $consulta4 -> fetch();

			$consulta5=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta5 -> execute();
			$dato5 = $consulta5 -> fetch();

			$consulta6=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta6 -> execute();
			$dato6 = $consulta6 -> fetch();


			


			$consulta73=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta73 -> execute();
			$dato73 = $consulta73 -> fetch();

			$consulta74=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta74 -> execute();
			$dato74 = $consulta74 -> fetch();

			$consulta75=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta75 -> execute();
			$dato75 = $consulta75 -> fetch();

			$consulta76=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta76 -> execute();
			$dato76 = $consulta76 -> fetch();

			$consulta77=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta77 -> execute();
			$dato77 = $consulta77 -> fetch();

			$consulta78=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta78 -> execute();
			$dato78 = $consulta78 -> fetch();

			

			$consulta157=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta157 -> execute();
			$dato157 = $consulta157 -> fetch();

			$consulta158=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta158 -> execute();
			$dato158 = $consulta158 -> fetch();

			$consulta159=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta159 -> execute();
			$dato159 = $consulta159 -> fetch();

			$consulta160=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta160 -> execute();
			$dato160 = $consulta160 -> fetch();

			$consulta161=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta161 -> execute();
			$dato161 = $consulta161 -> fetch();

			






			$consulta162=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta162 -> execute();
			$dato162 = $consulta162 -> fetch();


			$consulta163=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$mat' AND '$mat2'");
			$consulta163 -> execute();
			$dato163 = $consulta163 -> fetch();
				
			$consulta176=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2' AND plantilla_horarios.hora BETWEEN '$vesp' AND '$vesp2'");
			$consulta176 -> execute();
			$dato176 = $consulta176 -> fetch();






			$consulta189=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta189 -> execute();
			$dato189 = $consulta189 -> fetch();

			$consulta190=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
			$consulta190 -> execute();
			$dato190 = $consulta190 -> fetch();

			$consulta202=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=0 AND asesorias.fecha_asesoria BETWEEN '$mes1' AND '$mes2'");
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
			       



		} /* FIN DEL CONTROLADOR */

		public function reporte_asistencia_controlador(){

		} /* FIN DEL CONTROLADOR */


		public function reporte_escritos_controlador(){



		} /* FIN DEL CONTROLADOR */


		public function reporte_conversacion_controlador(){


		} /* FIN DEL CONTROLADOR */


				public function reporte_conversacion_origen_controlador(){

		} /* FIN DEL CONTROLADOR */


		public function reporte_cedula_trimestral_controlador(){


				$consulta15=mainModel::conectar()->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach=17 AND persona.carrera_unach=74 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta15 -> execute();
			$dato15 = $consulta15 -> fetch();

			print_r($dato15);
		} /* FIN DEL CONTROLADOR */
		
	}
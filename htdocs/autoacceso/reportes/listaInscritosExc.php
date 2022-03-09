<?php 

   
	
	header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
	$añoActual=date("Y", strtotime("this Year"));
	$nombreDoc="Lista de inscritos";
	header("Content-Disposition: attachment; filename=".$nombreDoc." ".$añoActual.".xls");
    echo pack("CCC",0xef,0xbb,0xbf);
	require_once "../reportes/conexion.php";

	$consulta2=$mbd->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC");
	$consulta2 -> execute();
	

	$consulta=$mbd->prepare("SELECT * FROM persona WHERE curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC");
	$consulta -> execute();

	$consulta3=$mbd->prepare("SELECT * FROM persona WHERE curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC");
	$consulta3 -> execute();


	$datos2 = $consulta2->fetchAll();				
				
				$total = $consulta3->rowCount();				
				
				$t2_Array=array();
				$t3_Array=array();
				
				$datos = $consulta->fetchAll();

		foreach ($datos2 as $rows2) {
					if(!in_array($rows2['id_persona'], $t2_Array)){
						$t2_Array[]=$rows2['id_persona'];
						$t3_Array[$rows2['id_persona']]=$rows2['etiqueta_idioma'];
					}else{	
						$t3_Array[$rows2['id_persona']]=$t3_Array[$rows2['id_persona']].', '.$rows2['etiqueta_idioma'];
					}
				}
				$tabla="";

		$tabla.='		
					<style>
					.color_celda{
						background-color:#c8e4b4;
					}
					</style>

						<body style="border: 1px solid #ccc"> 
						<table>

						  <tr class="text-center">
						   
						    <th class="color_celda">Nombre</th>
						    <th class="color_celda">Idioma (s)</th>
						    
						    <th class="color_celda">Fecha de nacimiento</th>
						    <th class="color_celda">Teléfono</th>
						    <th class="color_celda">Correo</th>';						

					$tabla.='	</tr >
								</thead>
						          <tbody>';					          		
							foreach ($datos as $rows) {

								//if(!in_array($rows['id_persona'], $temporal_Array)){

								$tabla.=' 
						<tr class="text-center" >
			                <td data-label="Nombre">'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td>
			                <td data-label="Idioma (s)">'.$t3_Array[$rows['id_persona']].'</td>
			                
			                <td data-label="Fecha de naciemiento">'.date('d-m-Y',strtotime($rows['fecha_nacimiento'])).'</td>
			                <td data-label="Teléfono">'.$rows['telefono'].'</td>
			                <td data-label="Correo">'.$rows['correo'].'</td>
			               '; 

		            $tabla.='</tr>';
		            $contador++;
							}
				$tabla.='</tbody></table>';
    print($tabla);	




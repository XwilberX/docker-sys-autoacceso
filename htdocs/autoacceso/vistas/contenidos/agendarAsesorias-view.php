<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=6){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
<style>
	.g3{
		min-height: 565px;
	}
</style>
<div class="g3" id="select_idioma">
    	<div id="btnsList"><br>
		
			<a href="<?php echo SERVERURL; ?>listaAsesorias/"><input type="button" class="btns2" value="Lista de asesorías"></a>
			<a href="<?php echo SERVERURL."agendarAsesorias/".$lc->encryption($_SESSION['id_scaa'])."/";?>"><input type="button" class="btns2" value="Agendar Asesorías"></a>
			<a href="<?php echo SERVERURL; ?>asesoriasPasadas/"><input type="button" class="btns2" value="Asesorías pasadas"></a>
        			
	    </div>
	          <?php  

	         require_once "./controladores/alumnoControlador.php";
            
            
            $ins_alumno =  new alumnoControlador();
            

            $datos_alumno = $ins_alumno->datos_alumno_controlador("Unico",$pagina[1]);

          if($datos_alumno->rowCount()>=1){
            
            $campos = $datos_alumno->fetch();
            $campos2 = $datos_alumno->fetch();
            $campos3 = $datos_alumno->fetch();
            $campos4 = $datos_alumno->fetch();
           // $des=$ins_preinscrito->desencriptar_controlador($campos['password']);
           
           ?>
	 <div class="formContainer4">
	        <h2>Agendar Asesorías</h2>
	        <div><label for="" id="labelInfoDispo">Asesoría en línea: 30 minutos</label></div>
	        <div><label for="" id="labelInfoDispo2">Revisión de escritos: 15 minutos</label></div>
	        <div><label for="" id="labelInfoDispo3">Club de conversación: 30 minutos</label></div>	        
 			<div><label for="" id="labelInfoDispo4">Asesoría presencial: 30 minutos</label></div>
	       
<br>
						<script> var idiomas_asesores_cambio2 = <?php echo json_encode($_SESSION['asesores']);?>;</script>
					<select id="idioma_sesion_alumno" name="idioma_sesion_alumno" pattern="[0-9]{1,2}">
					  <option value="0" onclick="ocultarTabla()">Elige tu idioma</option>

					        <?php  

					        // $_SESSION['idiomas_alumno']=array();

					        $idiomas_id_pasar="<script> var idiomas_array={";
					        $flag=0;

						    foreach ($_SESSION['idiomas'] as $i) {

							      if($i['id_idioma']==$campos['id_idioma'] && $campos['estatus_periodo']==1){
							    	 $flag=1;
							    	 $idiomas_id_pasar.=$campos['id_curso_asesoria'].':'.$campos['id_idioma'].',';
							    	echo'<option value="'.$campos['id_curso_asesoria'].'" ';
							   		echo ">".$i['etiqueta_idioma']."</option>";
							   	} 
							    
							    if($i['id_idioma']==$campos2['id_idioma'] && $campos2['estatus_periodo']==1){
							    	 $flag=1;
							    	$idiomas_id_pasar.=$campos2['id_curso_asesoria'].':'.$campos2['id_idioma'].',';
							    	echo'<option value="'.$campos2['id_curso_asesoria'].'" ';
							   		echo ">".$i['etiqueta_idioma']."</option>";
							   	} 
							    
							    if($i['id_idioma']==$campos3['id_idioma'] && $campos3['estatus_periodo']==1){
							    	 $flag=1;
							    	$idiomas_id_pasar.=$campos3['id_curso_asesoria'].':'.$campos3['id_idioma'].',';
							    	echo'<option value="'.$campos3['id_curso_asesoria'].'" ';
							   		echo ">".$i['etiqueta_idioma']."</option>";
							   	} 
							    
							    if($i['id_idioma']==$campos4['id_idioma'] && $campos4['estatus_periodo']==1){
							    	 $flag=1;
							    	$idiomas_id_pasar.=$campos4['id_curso_asesoria'].':'.$campos4['id_idioma'].',';
							       echo'<option value="'.$campos4['id_curso_asesoria'].'" ';
							   		echo ">".$i['etiqueta_idioma']."</option>";
							   	}
						   }
						   if($flag){
						   		$idiomas_id_pasar=substr($idiomas_id_pasar, 0,-1);
						   }
						   $idiomas_id_pasar.="};</script>";

  						?>

					</select>
			<?php 
				echo $idiomas_id_pasar;
	          }
	          ?>
		          	
							<form class="FormularioAjax" id="FormularioAjaxAgendar" action="<?php echo SERVERURL;?>ajax/asesoriasAjax.php" method="POST" data-form="save">
	        		 			<input type="hidden" id="agendar_asesoria_id" name="agendar_asesoria_id" value="">
	        		 			<input type="hidden" id="fecha_asesoria" name="fecha_asesoria" value="">
	        		 			<input type="hidden" id="id_curso_as" name="id_curso_as" value="">
	        		 			<input type="hidden" id="id_repuesto" name="id_repuesto" value="<?php echo $_SESSION['id_scaa'];?>">
	        		 			<input type="hidden" id="idioma_slct80" name="idioma_slct80" value="">

	        		 			<input type="submit" id="submitAgendar" value="aprietame" style="display:none;">
	        		 		</form>
	        		 		
	          <?php 
              require_once"./controladores/asesoriasControlador.php";
              $ins_asesorias= new asesoriasControlador();
              echo $ins_asesorias->info_asesorias_controlador();
         
?>

	<br>
    </div>
</div><br>


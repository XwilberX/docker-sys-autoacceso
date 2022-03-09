<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2 && $_SESSION['privilegio_scaa']!=4){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

 <div class="divDeshabilitado">
	 <div class="g3" id="select_idioma">
    	<div id="btnsList"><br>

            <a href="<?php echo SERVERURL; ?>listaAsesorias/"><input type="button" class="btns2" value="Próximas asesorías"></a>
            <a href="<?php echo SERVERURL."dispoAsesorias/".$lc->encryption($_SESSION['id_scaa'])."/";?>"><input type="button" class="btns2" value="Disponibilidad"></a>
            <a href="<?php echo SERVERURL; ?>asesoriasPasadas/"><input type="button" class="btns2" value="Asesorías pasadas"></a>
            <a href="<?php echo SERVERURL; ?>buscarAsesoriaPasada/"><input type="button" class="btns2" value="Buscar por alumno"></a>
	    </div>
		

           <?php 

            require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->datos_usuario_controlador("Unico",$pagina[1]);
          if($datos_usuario->rowCount()==1){
           
            $campos = $datos_usuario->fetch();
           ?>
	 <div class="formContainer4" id="formContainer4">
	        <h3>Disponibilidad</h3>

	    		<div class="horariosAsesorias" id="horariosAsesorias">
				    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/asesoriasAjax.php" method="POST" data-form="save" >
	        			<input type="hidden" name="user_id_decrypt" value="<?php echo $pagina[1]; ?>"> 

						<label for="" id="theadAsesoriasLabel" style="font-weight:bold; font-size:18px;">Selecciona un nuevo horario</label><br>
							
						<select name="tipo_asesoria" id="tipo_asesoria" required>
						 	<option value="" disabled="" selected>Tipo de reunión</option>
							<option value="0" >Asesoría en línea 30min.</option>
							<option value="1" >Revisión de escritos 15min.</option>
							<option value="2" >Club de conversación 30min.</option>
							<option value="3">Asesoría presencial 30min.</option>
						</select>

	        			<input type="button" value="X" class="btnCerrarHorarios" onclick="horario_asesorias_ocultar()">
	        				<label for="unico_rango" id="labelRadioAsesorias">Único</label><input name="unico_rango" type="radio" value="Unico" checked>
	        				<label for="unico_rango" id="labelRadioAsesorias">Rango</label><input name="unico_rango" type="radio" value="Rango"><br>
							
							<label for="dias_semana" id="labelRadioAsesorias">(Para seleccionar más de un día, mantén presionada la tecla Ctrl)</label><br>
							<select name="dias_semana[]" id="dias_semana" multiple required>
		        				<option value="lu">Lunes</option>
		        				<option value="ma">Martes</option>
		        				<option value="mi">Miércoles</option>
		        				<option value="ju">Jueves</option>
		        				<option value="vi">Viernes</option>	        				
							</select><br>
						
							<div class="slct30" id="slct30">
								
			        			<select name="horarios_asesorias" id="horarios_asesorias">
			        				<option value="">Horario 1</option>
			        				<option value="8">8:00 - 8:30</option>
			        				<option value="8.5">8:30 - 9:00</option>
			        				<option value="9">9:00 - 9:30</option>
			        				<option value="9.5">9:30 - 10:00</option>
			        				<option value="10">10:00 - 10:30</option>
			        				<option value="10.5">10:30 - 11:00</option>
			        				<option value="11">11:00 - 11:30</option>
			        				<option value="11.5">11:30 - 12:00</option>
			        				<option value="12">12:00 - 12:30</option>
			        				<option value="12.5">12:30 - 13:00</option>
			        				<option value="13">13:00 - 13:30</option>
			        				<option value="13.5">13:30 - 14:00</option>
			        				<option value="14">14:00 - 14:30</option>
			        				<option value="14.5">14:30 - 15:00</option>
			        				<option value="15">15:00 - 15:30</option>
			        				<option value="15.5">15:30 - 16:00</option>
			        				<option value="16">16:00 - 16:30</option>
			        				<option value="16.5">16:30 - 17:00</option>
			        				<option value="17">17:00 - 17:30</option>
			        				<option value="17.5">17:30 - 18:00</option>
			        				<option value="18">18:00 - 18:30</option>
			        				<option value="18.5">18:30 - 19:00</option>
			        				<option value="19">19:00 - 19:30</option>
			        				<option value="19.5">19:30 - 20:00</option>
								</select>
									
									
		        				<select name="horarios_asesorias2" id="horarios_asesorias2" disabled>
			        				<option value="">Horario 2</option>
			        				<option value="8">8:00 - 8:30</option>
			        				<option value="8.5">8:30 - 9:00</option>
			        				<option value="9">9:00 - 9:30</option>
			        				<option value="9.5">9:30 - 10:00</option>
			        				<option value="10">10:00 - 10:30</option>
			        				<option value="10.5">10:30 - 11:00</option>
			        				<option value="11">11:00 - 11:30</option>
			        				<option value="11.5">11:30 - 12:00</option>
			        				<option value="12">12:00 - 12:30</option>
			        				<option value="12.5">12:30 - 13:00</option>
			        				<option value="13">13:00 - 13:30</option>
			        				<option value="13.5">13:30 - 14:00</option>
			        				<option value="14">14:00 - 14:30</option>
			        				<option value="14.5">14:30 - 15:00</option>
			        				<option value="15">15:00 - 15:30</option>
			        				<option value="15.5">15:30 - 16:00</option>
			        				<option value="16">16:00 - 16:30</option>
			        				<option value="16.5">16:30 - 17:00</option>
			        				<option value="17">17:00 - 17:30</option>
			        				<option value="17.5">17:30 - 18:00</option>
			        				<option value="18">18:00 - 18:30</option>
			        				<option value="18.5">18:30 - 19:00</option>
			        				<option value="19">19:00 - 19:30</option>
			        				<option value="19.5">19:30 - 20:00</option>
								</select>
						    </div>  


						    <div class="slct15" id="slct15">
							
		        				<select name="horarios_asesorias_1" id="horarios_asesorias_1">
		        				    <option value="">Horario 1</option>
		        				    <option value="8.1">8:00 - 8:15</option>
			        				<option value="8.35">8:15 - 8:30</option>
			        				<option value="8.6">8:30 - 8:45</option>
			        				<option value="8.85">8:45 - 9:00</option>
		        				    
			        				<option value="9.1">9:00 - 9:15</option>
			        				<option value="9.35">9:15 - 9:30</option>
			        				<option value="9.6">9:30 - 9:45</option>
			        				<option value="9.85">9:45 - 10:00</option>

			        				<option value="10.1">10:00 - 10:15</option>
			        				<option value="10.35">10:15 - 10:30</option>
			        				<option value="10.6">10:30 - 10:45</option>
			        				<option value="10.85">10:45 - 11:00</option>

			        				<option value="11.1">11:00 - 11:15</option>
			        				<option value="11.35">11:15 - 11:30</option>
			        				<option value="11.6">11:30 - 11:45</option>
			        				<option value="11.85">11:45 - 12:00</option>

			        				<option value="12.1">12:00 - 12:15</option>
			        				<option value="12.35">12:15 - 12:30</option>
			        				<option value="12.6">12:30 - 12:45</option>
			        				<option value="12.85">12:45 - 13:00</option>

			        				<option value="13.1">13:00 - 13:15</option>
			        				<option value="13.35">13:15 - 13:30</option>
			        				<option value="13.6">13:30 - 13:45</option>
			        				<option value="13.85">13:45 - 14:00</option>

			        				<option value="14.1">14:00 - 14:15</option>
			        				<option value="14.35">14:15 - 14:30</option>
			        				<option value="14.6">14:30 - 14:45</option>
			        				<option value="14.85">14:45 - 15:00</option>

			        				<option value="15.1">15:00 - 15:15</option>
			        				<option value="15.35">15:15 - 15:30</option>
			        				<option value="15.6">15:30 - 15:45</option>
			        				<option value="15.85">15:45 - 16:00</option>

			        				<option value="16.1">16:00 - 16:15</option>
			        				<option value="16.35">16:15 - 16:30</option>
			        				<option value="16.6">16:30 - 16:45</option>
			        				<option value="16.85">16:45 - 17:00</option>

			        				<option value="17.1">17:00 - 17:15</option>
			        				<option value="17.35">17:15 - 17:30</option>
			        				<option value="17.6">17:30 - 17:45</option>
			        				<option value="17.85">17:45 - 18:00</option>

			        				<option value="18.1">18:00 - 18:15</option>
			        				<option value="18.35">18:15 - 18:30</option>
			        				<option value="18.6">18:30 - 18:45</option>
			        				<option value="18.85">18:45 - 19:00</option>

			        				<option value="19.1">19:00 - 19:15</option>
			        				<option value="19.35">19:15 - 19:30</option>
			        				<option value="19.6">19:30 - 19:45</option>
			        				<option value="19.85">19:45 - 20:00</option>
								</select>
								
									
		        				<select name="horarios_asesorias2_1" id="horarios_asesorias2_1" disabled>
			        				<option value="">Horario 2</option>
			        				<option value="8.1">8:00 - 8:15</option>
			        				<option value="8.35">8:15 - 8:30</option>
			        				<option value="8.6">8:30 - 8:45</option>
			        				<option value="8.85">8:45 - 9:00</option>
			        				
			        				<option value="9.1">9:00 - 9:15</option>
			        				<option value="9.35">9:15 - 9:30</option>
			        				<option value="9.6">9:30 - 9:45</option>
			        				<option value="9.85">9:45 - 10:00</option>

			        				<option value="10.1">10:00 - 10:15</option>
			        				<option value="10.35">10:15 - 10:30</option>
			        				<option value="10.6">10:30 - 10:45</option>
			        				<option value="10.85">10:45 - 11:00</option>

			        				<option value="11.1">11:00 - 11:15</option>
			        				<option value="11.35">11:15 - 11:30</option>
			        				<option value="11.6">11:30 - 11:45</option>
			        				<option value="11.85">11:45 - 12:00</option>

			        				<option value="12.1">12:00 - 12:15</option>
			        				<option value="12.35">12:15 - 12:30</option>
			        				<option value="12.6">12:30 - 12:45</option>
			        				<option value="12.85">12:45 - 13:00</option>

			        				<option value="13.1">13:00 - 13:15</option>
			        				<option value="13.35">13:15 - 13:30</option>
			        				<option value="13.6">13:30 - 13:45</option>
			        				<option value="13.85">13:45 - 14:00</option>

			        				<option value="14.1">14:00 - 14:15</option>
			        				<option value="14.35">14:15 - 14:30</option>
			        				<option value="14.6">14:30 - 14:45</option>
			        				<option value="14.85">14:45 - 15:00</option>

			        				<option value="15.1">15:00 - 15:15</option>
			        				<option value="15.35">15:15 - 15:30</option>
			        				<option value="15.6">15:30 - 15:45</option>
			        				<option value="15.85">15:45 - 16:00</option>

			        				<option value="16.1">16:00 - 16:15</option>
			        				<option value="16.35">16:15 - 16:30</option>
			        				<option value="16.6">16:30 - 16:45</option>
			        				<option value="16.85">16:45 - 17:00</option>

			        				<option value="17.1">17:00 - 17:15</option>
			        				<option value="17.35">17:15 - 17:30</option>
			        				<option value="17.6">17:30 - 17:45</option>
			        				<option value="17.85">17:45 - 18:00</option>

			        				<option value="18.1">18:00 - 18:15</option>
			        				<option value="18.35">18:15 - 18:30</option>
			        				<option value="18.6">18:30 - 18:45</option>
			        				<option value="18.85">18:45 - 19:00</option>

			        				<option value="19.1">19:00 - 19:15</option>
			        				<option value="19.35">19:15 - 19:30</option>
			        				<option value="19.6">19:30 - 19:45</option>
			        				<option value="19.85">19:45 - 20:00</option>
								</select>
						    </div>  



	        			<input type="submit" value="Agregar" class="btnAmarillo">
					</form>
				</div>


	

	         <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/asesoriasAjax.php" method="POST" data-form="save" >
		       		 <label for="" id="linkMeet">Link de asesorias</label><input type="radio" name="activarLink" value="activate"><br>
		       		 <input type="url" id="inputLink" name="inputLinkDispo" minlength="10" maxlength="100" value=" <?php echo  $campos['link']; ?> " required disabled> <input type="submit" class="btns_preins" value="Actualizar" id="btnLink" disabled>
		       		 <input type="hidden" name="user_id_decrypt" value="<?php echo $pagina[1]; ?>">
				</form>

			<div class="horarios_asesorias_editar" id="horarios_asesorias_editar">
	        		 		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/asesoriasAjax.php" 	method="POST" 	data-form="update" autocomplete="off"> 
							
							<label for="" id="theadAsesoriasLabel" style="font-weight:bold; font-size:18px;">Edita el horario seleccionado</label><br>
							<input type="button" value="X" class="btnCerrarHorarios2" onclick="horario_editar_ocultar()"><br>							
							<div class="centrar_selects">				
	        				<select name="horario_asesoria_edit" id="horario_asesoria_edit">
	        				<option value="">Asesorías/Conversación 30 min.</option>
	        				<option value="9">9:00 - 9:30</option>
	        				<option value="9.5">9:30 - 10:00</option>
	        				<option value="10">10:00 - 10:30</option>
	        				<option value="10.5">10:30 - 11:00</option>
	        				<option value="11">11:00 - 11:30</option>
	        				<option value="11.5">11:30 - 12:00</option>
	        				<option value="12">12:00 - 12:30</option>
	        				<option value="12.5">12:30 - 13:00</option>
	        				<option value="13">13:00 - 13:30</option>
	        				<option value="13.5">13:30 - 14:00</option>
	        				<option value="14">14:00 - 14:30</option>
	        				<option value="14.5">14:30 - 15:00</option>
	        				<option value="15">15:00 - 15:30</option>
	        				<option value="15.5">15:30 - 16:00</option>
	        				<option value="16">16:00 - 16:30</option>
	        				<option value="16.5">16:30 - 17:00</option>
	        				<option value="17">17:00 - 17:30</option>
	        				<option value="17.5">17:30 - 18:00</option>
	        				<option value="18">18:00 - 18:30</option>
	        				<option value="18.5">18:30 - 19:00</option>
	        				<option value="19">19:00 - 19:30</option>
	        				<option value="19.5">19:30 - 20:00</option>
							</select>
		
							<select name="horario_asesoria_edit2" id="horario_asesoria_edit2">
	        				<option value="">Escritos 15 min.</option>
	        				<option value="9.1">9:00 - 9:15</option>
	        				<option value="9.35">9:15 - 9:30</option>
	        				<option value="9.6">9:30 - 9:45</option>
	        				<option value="9.85">9:45 - 10:00</option>

	        				<option value="10.1">10:00 - 10:15</option>
	        				<option value="10.35">10:15 - 10:30</option>
	        				<option value="10.6">10:30 - 10:45</option>
	        				<option value="10.85">10:45 - 11:00</option>

	        				<option value="11.1">11:00 - 11:15</option>
	        				<option value="11.35">11:15 - 11:30</option>
	        				<option value="11.6">11:30 - 11:45</option>
	        				<option value="11.85">11:45 - 12:00</option>

	        				<option value="12.1">12:00 - 12:15</option>
	        				<option value="12.35">12:15 - 12:30</option>
	        				<option value="12.6">12:30 - 12:45</option>
	        				<option value="12.85">12:45 - 13:00</option>

	        				<option value="13.1">13:00 - 13:15</option>
	        				<option value="13.35">13:15 - 13:30</option>
	        				<option value="13.6">13:30 - 13:45</option>
	        				<option value="13.85">13:45 - 14:00</option>

	        				<option value="14.1">14:00 - 14:15</option>
	        				<option value="14.35">14:15 - 14:30</option>
	        				<option value="14.6">14:30 - 14:45</option>
	        				<option value="14.85">14:45 - 15:00</option>

	        				<option value="15.1">15:00 - 15:15</option>
	        				<option value="15.35">15:15 - 15:30</option>
	        				<option value="15.6">15:30 - 15:45</option>
	        				<option value="15.85">15:45 - 16:00</option>

	        				<option value="16.1">16:00 - 16:15</option>
	        				<option value="16.35">16:15 - 16:30</option>
	        				<option value="16.6">16:30 - 16:45</option>
	        				<option value="16.85">16:45 - 17:00</option>

	        				<option value="17.1">17:00 - 17:15</option>
	        				<option value="17.35">17:15 - 17:30</option>
	        				<option value="17.6">17:30 - 17:45</option>
	        				<option value="17.85">17:45 - 18:00</option>

	        				<option value="18.1">18:00 - 18:15</option>
	        				<option value="18.35">18:15 - 18:30</option>
	        				<option value="18.6">18:30 - 18:45</option>
	        				<option value="18.85">18:45 - 19:00</option>

	        				<option value="19.1">19:00 - 19:15</option>
	        				<option value="19.35">19:15 - 19:30</option>
	        				<option value="19.6">19:30 - 19:45</option>
	        				<option value="19.85">19:45 - 20:00</option>
							</select>
							</div>	
							
	        			<br>
	        			<input type="submit" value="Agregar" class="btnAmarillo">
						<input type="hidden" id="actualizar_horario_id" name="actualizar_horario_id" value="">
						<input type="hidden" id="tiempo_hora_asesoria" name="tiempo_hora_asesoria" value="">
							</form>
							</div>

     
  <?php 
if($_SESSION['privilegio_scaa']==1){
	?>
	<label for="" id="linkMeet">Modifica la disponibilidad de los asesores</label><br>
    <div>
    	 <script> var idiomas_asesores_cambio = <?php echo json_encode($_SESSION['asesores']);?>;</script>
    	<select name="" id="idioma_arreglo_dispo_coor">
    		<option value="0" selected>Seleccione idioma</option>
    		<?php
	    		    foreach ($_SESSION['idiomas'] as $i) {
						echo'<option value="'.$i['id_idioma'].'">'.$i['etiqueta_idioma'].'</option>';
					   
				  	} 
    		 ?>
    	</select>
		
    	<select  name="profesores_nombre_idioma" id="profesores_nombre_idioma">
    			<option  value="0" selected>Seleccione un asesor</option>
    		<?php
	    		    // foreach ($_SESSION['asesores'] as $i) {
					    // echo'<option value="'.$i['id_persona'].'">'.$i['nombre'].' '.$i['apellido_paterno'].' '.$i['apellido_materno'].'</option>';
					   
				   	// } 
    		 ?> 
    	</select>
    </div>

     
     <?php } ?>




				<button class="btnAgregar" id="btnAgregar" onclick="horario_asesorias_mostrar()">Nuevo horario</button><br>
		        <div><label for="" id="labelInfoDispo">Asesoría en línea: 30 minutos</label></div>
		        <div><label for="" id="labelInfoDispo2">Revisión de escritos: 15 minutos</label></div>
		        <div><label for="" id="labelInfoDispo3">Club de conversación: 30 minutos</label></div>
		        <div><label for="" id="labelInfoDispo4">Asesoría presencial: 30 minutos</label></div><br>
	      

			
	      <?php   
  require_once"./controladores/asesoriasControlador.php";
  $ins_asesorias= new asesoriasControlador();
  echo $ins_asesorias->horarios_asesorias_controlador();
  ?> 

       		 <br>

    	</div>
    <?php }else{ ?>
    	<br><br>
</div>

	<div class="alert_error"><br>
  <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt="">
  <p class="errorSub1">¡Ocurrió un error inesperado!</p>
  <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

</div>
           <?php } ?>
	</div>
</div>
<script>
  (function(){
    setInterval(
      function(){
        document.location.reload()
      },
      900000)
  })()
</script>
<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=6){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
		    require_once "./controladores/documentoControlador.php";
		           $ins_doc =  new documentoControlador();
		           $datos_doc = $ins_doc->datos_documentos_asesores_controlador();
		           $datos_doc2 = $ins_doc->datos_documentos_secretario_controlador();
		           $datos_doc3 = $ins_doc->datos_documentos_personal_controlador();

		           $datos_link = $ins_doc->datos_links_asesores_controlador();
		           $datos_link2 = $ins_doc->datos_links_secretario_controlador();
		           $datos_link3 = $ins_doc->datos_links_personal_controlador();

		          if($datos_doc->rowCount()>=1){
		           
		            $campos = $datos_doc->fetchAll();
		        }

		          
		          if($datos_link->rowCount()>=1){
		           
		            $campos2 = $datos_link->fetchAll();
		        
		        }

		        if($datos_doc2->rowCount()>=1){
		           
		            $campos3 = $datos_doc2->fetchAll();
		        }

		     
		          if($datos_link2->rowCount()>=1){
		           
		            $campos4 = $datos_link2->fetchAll();
		        
		        }

		        if($datos_doc3->rowCount()>=1){
		           
		            $campos5 = $datos_doc3->fetchAll();
		        }

		     
		          if($datos_link3->rowCount()>=1){
		           
		            $campos6 = $datos_link3->fetchAll();
		        
		        }

		?>

 <div class="g3" id="select_idioma">
	<div class="formContainer4"><br>
		<?php if($_SESSION['privilegio_scaa']<=2){?>
				<h3>Formatería</h3>
			<p>Elija un tipo de usuario</p>
			
			<select name="" id="slctUsuarioFormateria" required>
			 	<option value="0">Seleccione</option>
			 	<option value="1">Asesores</option>
			 	<option value="2">Secretario</option>
			 	<option value="3">Personal administrativo</option>
			</select><br>

			<select name="" id="slctRecursoFormateria" required>
			 	<option value="0">Elija el tipo de recurso a agregar</option>
			 	<option value="1">URL</option>
			 	<option value="2">Documento / Imagen</option>
			</select><br>

		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/documentoAjax.php" method="POST" data-form="save" enctype="multipart/form-data">
			<input type="hidden" id="acceso_formateria" name="acceso_archivo">
			<input type="hidden" id="tipo_recurso_formateria" name="tipo_recurso_agregar">
			<input type="file" name="cargarArchivos[]" id="cargarArchivos_formateria" multiple>
			
			<select name="idiomas_agregar_documentos" id="idiomas_agregar_documentos_formateria">
			 	<option value="0">Idioma</option>
			 	<option value="1">Inglés</option>
			 	<option value="2">Francés</option>
			 	<option value="3">Alemán</option>
			 	<option value="4">Italiano</option>
			 	<option value="5">Chino</option>
			 	<option value="6">Español</option>
			</select>
			<!-- <select name="nivel_agregar_documentos" id="nivel_agregar_documentos" >
			 	<option value="">Nivel</option>
			 	<option value="1">1</option>
			 	<option value="2">2</option>
			 	<option value="3">3</option>
			 	<option value="4">4</option>
			 	<option value="5">5</option>
			 	<option value="6">6</option>
			 	<option value="7">7</option>
			 	<option value="8">8</option>
			 	<option value="9">9</option>
			 	<option value="10">10</option>
			 	<option value="11">11</option>
			 	<option value="12">12</option>
			 	<option value="Ubicación">Ubicación</option>
			</select> --><br>

			
			<input type="submit" class="btns_preins" value="Agregar" id="btnFortmateria">
		</form>
						
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/documentoAjax.php" method="POST" data-form="save">
			<input type="text" name="nombre_link" id="nombre_link_formateria" placeholder="Nombre del recurso. Max.50 caracteres." pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ 0-9]{1,50}">
			<input type="url" name="cargarUrl" id="cargarUrlFormateria" placeholder="Ingresa el link del recurso" maxlength="200" minlength="5">
			<select name="idiomas_agregar_documentos2" id="idiomas_agregar_documentos_formateria2">
			 	<option value="0">Idioma</option>
			 	<option value="1">Inglés</option>
			 	<option value="2">Francés</option>
			 	<option value="3">Alemán</option>
			 	<option value="4">Italiano</option>
			 	<option value="5">Chino</option>
			 	<option value="6">Español</option>
			</select>
			<!-- <select name="nivel_agregar_documentos2" id="nivel_agregar_documentos2" >
			 	<option value="">Nivel</option>
			 	<option value="1">1</option>
			 	<option value="2">2</option>
			 	<option value="3">3</option>
			 	<option value="4">4</option>
			 	<option value="5">5</option>
			 	<option value="6">6</option>
			 	<option value="7">7</option>
			 	<option value="8">8</option>
			 	<option value="9">9</option>
			 	<option value="10">10</option>
			 	<option value="11">11</option>
			 	<option value="12">12</option>
			 	<option value="Ubicación">Ubicación</option>
			</select> --> <br>
			<input type="hidden" id="acceso_formateria2" name="acceso_link">     
			<input type="hidden" id="tipo_recurso_formateria2" name="tipo_recurso_agregar">

			<input type="submit" class="btns_preins" value="Agregar" id="btnFortmateria2">
		</form>

					<div class="ulReportes" id="vistaAsesoresFormateria">
					<ul class="tabsReportes" id="tabsReportes">
						<li><a href="#rep1"><span>Inglés</span></a></li>
						<li><a href="#rep2"><span>Francés</span></a></li>
						<li><a href="#rep3"><span>Alemán</span></a></li>
						<li><a href="#rep4"><span>Italiano</span></a></li>
						<li><a href="#rep5"><span>Chino</span></a></li>
						<li><a href="#rep6"><span>Español</span></a></li>

					</ul>
					<div class="ContenidoPestañaReportes">
						<article id="rep1">
							<div class="banderasDiv">
							<img class="banderaUk" src="../vistas/images/banderas/uk.jpg"><h2>Inglés</h2><img class="banderaUk" src="../vistas/images/banderas/uk.jpg">
							</div><br>
							
						<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==1){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==1){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>
						<article id="rep2">
							<div class="banderasDiv">
							<img class="banderaFr" src="../vistas/images/banderas/fra.jpg"><h2>Francés</h2><img class="banderaFr" src="../vistas/images/banderas/fra.jpg">
							</div><br>
							
							<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==2){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==2){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>
						<article id="rep3">
							<div class="banderasDiv">
							<img class="banderaAle" src="../vistas/images/banderas/ale.jpg"><h2>Alemán</h2><img class="banderaAle" src="../vistas/images/banderas/ale.jpg">
							</div><br>
							
							<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==3){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==3){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>
						<article id="rep4">
							<div class="banderasDiv">
							<img class="banderaIta" src="../vistas/images/banderas/ita.jpg"><h2>Italiano</h2><img class="banderaIta" src="../vistas/images/banderas/ita.jpg">
							</div><br>
						<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==4){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==4){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>
						<article id="rep5">
							<div class="banderasDiv">
							<img class="banderaChi" src="../vistas/images/banderas/chi.jpg"><h2>Chino</h2><img class="banderaChi" src="../vistas/images/banderas/chi.jpg">
							</div><br>
							
							<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==5){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==5){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>
						<article id="rep6">
						<div class="banderasDiv">
							<img class="banderaEsp" src="../vistas/images/banderas/esp.jpg"><h2>Español</h2><img class="banderaEsp" src="../vistas/images/banderas/esp.jpg">
							</div><br>
							
							<?php 

							foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==6){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==6){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows2['id_link']."'>
									</form><br><br>";
							    }						  
							}
						?>
						</article>

					</div>
					
				</div>
				<div id="vistaSecretarioFormateria">
					<?php 
					
					foreach ($campos3 as $rows3) {	
							
						if($rows3['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows3['contenido'])."' style='max-width:500px;'></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows3['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows3['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows3['contenido'])."' style='max-width:500px;' ></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows3['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows3['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows3['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows3['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows3['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows3['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows3['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							
							foreach ($campos4 as $rows4) {

								
									
								  echo "<button class='btns2'><a href='".$rows4['link']."'>".$rows4['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows4['id_link']."'>
									</form><br><br>";
							    }
							

					 ?>
				</div>

				<div id="vistaPersonalFormateria">
					<?php 
					
					foreach ($campos5 as $rows5) {	
							
						if($rows5['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows5['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows5['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows5['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows5['contenido'])."' style='max-width:500px;' >
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows5['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows5['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows5['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows5['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows5['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								    if($rows5['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows5['id_archivo']."'>
										<button 
										 class='btnEliminar'>Eliminar</button><br><br>
									</form>";
								    }
								}	    
							
							foreach ($campos6 as $rows6) {
									
								  echo "<button class='btns2'><a href='".$rows6['link']."'>".$rows6['nombre_link']."</a></button><br>
								  <form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<button
										 class='btnEliminar'>Eliminar</button><br><br>
								  <input type='hidden' name='eliminar_url' value='".$rows6['id_link']."'>
									</form><br><br>";
							    
							}

					 ?>
				</div>
				<?php } ?> 
				<?php if($_SESSION['privilegio_scaa']==4){
					if($_SESSION['curso_asesor_scaa']==1){?>

					<div class="banderasDiv">
							<img class="banderaUk" src="../vistas/images/banderas/uk.jpg"><h3>Formatería</h3><img class="banderaUk" src="../vistas/images/banderas/uk.jpg">
							</div><br>
					<?php }
					if($_SESSION['curso_asesor_scaa']==2){?>

						<div class="banderasDiv">
							<img class="banderaFr" src="../vistas/images/banderas/fra.jpg"><h3>Formatería</h3><img class="banderaFr" src="../vistas/images/banderas/fra.jpg">
						</div><br>

					<?php }
					if($_SESSION['curso_asesor_scaa']==3){?>
						<div class="banderasDiv">
							<img class="banderaAle" src="../vistas/images/banderas/ale.jpg"><h3>Formatería</h3><img class="banderaAle" src="../vistas/images/banderas/ale.jpg">
						</div><br>

					<?php }
					if($_SESSION['curso_asesor_scaa']==4){?>
						<div class="banderasDiv">
							<img class="banderaIta" src="../vistas/images/banderas/ita.jpg"><h3>Formatería</h3><img class="banderaIta" src="../vistas/images/banderas/ita.jpg">
						</div><br>

					<?php }
					if($_SESSION['curso_asesor_scaa']==5){?>
						<div class="banderasDiv">
							<img class="banderaChi" src="../vistas/images/banderas/chi.jpg"><h3>Formatería</h3><img class="banderaChi" src="../vistas/images/banderas/chi.jpg">
						</div><br>

					<?php }
					if($_SESSION['curso_asesor_scaa']==6){?>
						<div class="banderasDiv">
							<img class="banderaEsp" src="../vistas/images/banderas/esp.jpg"><h3>Formatería</h3><img class="banderaEsp" src="../vistas/images/banderas/esp.jpg">
						</div><br>
					<?php }
					foreach ($campos as $rows) {	

								if($rows['idioma_archivo']==$_SESSION['curso_asesor_scaa']){
									if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br>";
								    }
								    if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br>";
								    }
								}	    
							}
							foreach ($campos2 as $rows2) {

								if($rows2['idioma_link']==$_SESSION['curso_asesor_scaa']){
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br><br>";
							    }						  
							}
				} 

				if($_SESSION['privilegio_scaa']==3){?>
					<h3>Formatería</h3>
					<?php  
					foreach ($campos3 as $rows3) {	

									if($rows3['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows3['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows3['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows3['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows3['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form><br>";
								    }
								    if($rows3['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form><br>";
								    }
								    if($rows3['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows3['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows3['nombre_archivo']."</button></form><br>";
								    }								    
							}
							foreach ($campos4 as $rows4) {
									
								  echo "<button class='btns2'><a href='".$rows4['link']."'>".$rows4['nombre_link']."</a></button><br><br>";
							 						  
							}

				}

				if($_SESSION['privilegio_scaa']==5){?>
					<h3>Formatería</h3>
					<?php
					foreach ($campos5 as $rows5) {	

									if($rows5['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows5['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows5['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows5['contenido'])."' style='max-width:500px;'><br>";
								    }
								    if($rows5['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form><br>";
								    }
								    if($rows5['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form><br>";
								    }
								    if($rows5['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows5['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows5['nombre_archivo']."</button></form><br>";
								    }								    
							}
							foreach ($campos6 as $rows6) {
									
								  echo "<button class='btns2'><a href='".$rows6['link']."'>".$rows6['nombre_link']."</a></button><br><br>";
							 						  
							}

				}

			?>
	</div>
</div>

<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2 && $_SESSION['privilegio_scaa']!=6){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
<style>
	#fC2{

	min-height: 527px;
	}
</style>
 <div class="g3" id="select_idioma">
	<div class="formContainer4"><br>
		<div id="btnsList">
			<?php if($_SESSION['privilegio_scaa']==1){ ?>
			<a href="<?php echo SERVERURL; ?>gestionarDocumentos/"><input type="button" class="btns2" value="Gestionar documentos"></a>
			<a href="<?php echo SERVERURL; ?>gestionarImagenes/"><input type="button" class="btns2" value="Imágenes de carouseles"></a>
		</div>
		 <?php } ?>
				<h3>Documentos</h3>
		<?php if($_SESSION['privilegio_scaa']<=2){?>
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/documentoAjax.php" method="POST" data-form="save" enctype="multipart/form-data">
			<p>Elija el tipo de recurso a agregar</p>
			<select name="tipo_recurso_agregar" id="slctRecurso" required>
			 	<option value="0">Seleccione</option>
			 	<option value="1">URL</option>
			 	<option value="2">Documento / Imagen</option>
			</select><br>
			<input type="file" name="cargarArchivos[]" id="cargarArchivos" multiple>
			<select name="idiomas_agregar_documentos" id="idiomas_agregar_documentos" required>
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

			<input type="hidden" value="0" name="acceso_archivo">
			<input type="submit" class="btns_preins" value="Agregar" id="btnLink">
		</form>
						
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/documentoAjax.php" method="POST" data-form="save">
			<input type="hidden" name="tipo_recurso_agregar" value="1" id="">
			<input type="text" name="nombre_link" id="nombre_link" placeholder="Nombre del recurso. Max.50 caracteres." pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ 0-9]{1,50}">
			<input type="url" name="cargarUrl" id="cargarUrl" placeholder="Ingresa el link del recurso" maxlength="200" minlength="5">
			<select name="idiomas_agregar_documentos2" id="idiomas_agregar_documentos2" required>
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
			<input type="hidden" value="0" name="acceso_link">       		
			<input type="submit" class="btns_preins" value="Agregar" id="btnLink2">
		</form>


		<?php 

		    require_once "./controladores/documentoControlador.php";
		            $ins_doc =  new documentoControlador();
		            $datos_doc = $ins_doc->datos_documentos_controlador();
		          if($datos_doc->rowCount()>=1){
		           
		            $campos = $datos_doc->fetchAll();
		        }

		          $datos_link = $ins_doc->datos_links_controlador();
		          if($datos_link->rowCount()>=1){
		           
		            $campos2 = $datos_link->fetchAll();
		        
		        }
		?>

					<div class="ulReportes">
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
										<form class='FormularioAjax' action='".SERVERURL."ajax/documentoAjax.php' method='POST' data-form='delete'>
										<input type='hidden' name='eliminar_archivo' value='".$rows['id_archivo']."'>
										<button name='eliminar_archivo' class='btnEliminar'>Eliminar</button>
										<br><br>
									</form>";
								    }
								    if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:500px;'>
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
					<?php } 
			require_once "./controladores/documentoControlador.php";
		    
		    $ins_doc =  new documentoControlador();
		
            $datos_cursos_alumno = $ins_doc->datos_curso_alumnos_controlador();

          if($datos_cursos_alumno->rowCount()>=1){
            
            $campos3 = $datos_cursos_alumno->fetchAll();
            
           }

         	$datos_doc = $ins_doc->datos_documentos_controlador();
		    if($datos_doc->rowCount()>=1){		           
	        	$campos = $datos_doc->fetchAll();
	    	}

	      	$datos_link = $ins_doc->datos_links_controlador();
	      	if($datos_link->rowCount()>=1){		           
	        	$campos2 = $datos_link->fetchAll();		        
		   	}

           if($_SESSION['privilegio_scaa']==6){

           

           		foreach ($campos3 as $rows3){
           			if($rows3['id_idioma']==1){?>

					<div class="banderasDiv">
							<img class="banderaUk" src="../vistas/images/banderas/uk.jpg"><h3>Inglés</h3><img class="banderaUk" src="../vistas/images/banderas/uk.jpg">
							</div><br>
					<?php }
					if($rows3['id_idioma']==2){?>

						<div class="banderasDiv">
							<img class="banderaFr" src="../vistas/images/banderas/fra.jpg"><h3>Francés<h3><img class="banderaFr" src="../vistas/images/banderas/fra.jpg">
						</div><br>

					<?php }
					if($rows3['id_idioma']==3){?>
						<div class="banderasDiv">
							<img class="banderaAle" src="../vistas/images/banderas/ale.jpg"><h3>Alemán</h3><img class="banderaAle" src="../vistas/images/banderas/ale.jpg">
						</div><br>

					<?php }
					if($rows3['id_idioma']==4){?>
						<div class="banderasDiv">
							<img class="banderaIta" src="../vistas/images/banderas/ita.jpg"><h3>Italiano</h3><img class="banderaIta" src="../vistas/images/banderas/ita.jpg">
						</div><br>

					<?php }
					if($rows3['id_idioma']==5){?>
						<div class="banderasDiv">
							<img class="banderaChi" src="../vistas/images/banderas/chi.jpg"><h3>Chino</h3><img class="banderaChi" src="../vistas/images/banderas/chi.jpg">
						</div><br>

					<?php }
					if($rows3['id_idioma']==6){?>
						<div class="banderasDiv">
							<img class="banderaEsp" src="../vistas/images/banderas/esp.jpg"><h3>Español</h3><img class="banderaEsp" src="../vistas/images/banderas/esp.jpg">
						</div><br>
					<div id="fC2">
					<?php }
           			
           			foreach ($campos as $rows){  

           				if($rows3['id_idioma']==$rows['idioma_archivo']){ 

           				
           					if($rows['tipo_archivo']=="image/jpeg"){
										

										echo "<img src='data:image/jpeg; base64,".base64_encode($rows['contenido'])."' style='max-width:350px;'><br><br>";
							}
							if($rows['tipo_archivo']=="image/png"){
										

										echo "<img src='data:image/png; base64,".base64_encode($rows['contenido'])."' style='max-width:350px;'><br><br>";
							}
							if($rows['tipo_archivo']=="application/pdf"){
										
										echo "<form action='../reportes/archivo_pdf.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br><br>";
							}
							if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
										
										echo "<form action='../reportes/archivo_doc.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br><br>";
							}
							if($rows['tipo_archivo']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
										
										echo "<form action='../reportes/archivo_xslx.php' method='POST'>
										<input type='hidden' name='id_archivo' value='".$rows['id_archivo']."'>
										<button class='btnAluElegirAsesores'>".$rows['nombre_archivo']."</button></form><br><br>";
							}
						}
					}
							
								foreach ($campos2 as $rows2) {
								if($rows3['id_idioma']==$rows2['idioma_link']){  
									
								  echo "<button class='btns2'><a href='".$rows2['link']."'>".$rows2['nombre_link']."</a></button><br><br>";
									}
							    }
						}	
           		}

            
           ?>
           </div>
	</div>
</div>

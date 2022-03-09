 <?php     

  require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->obtener_asesores_controlador();
        if($datos_usuario->rowCount()>=1){
                      
            $campos = $datos_usuario->fetchAll();
        }
       
  ?>

 <div class="g3">
	<div class="formContainer4">
		<h3>Directorio general</h3>
		<h2>Coordinador del Centro de AutoAcceso</h2>
		<?php 

					foreach ($campos as $rows) {

						if($rows['nombre']=="Cley"){
						 echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
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
					</div>
				<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==1 && $rows['nombre']!="Cley"){
						 echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>
				<article id="rep2">
					<div class="banderasDiv">
					<img class="banderaFr" src="../vistas/images/banderas/fra.jpg"><h2>Francés</h2><img class="banderaFr" src="../vistas/images/banderas/fra.jpg">
					</div>
					
					<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==2){
						  echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>
				<article id="rep3">
					<div class="banderasDiv">
					<img class="banderaAle" src="../vistas/images/banderas/ale.jpg"><h2>Alemán</h2><img class="banderaAle" src="../vistas/images/banderas/ale.jpg">
					</div>
					
					<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==3){
						  echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>
				<article id="rep4">
					<div class="banderasDiv">
					<img class="banderaIta" src="../vistas/images/banderas/ita.jpg"><h2>Italiano</h2><img class="banderaIta" src="../vistas/images/banderas/ita.jpg">
					</div>
					
					<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==4){
						 echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>
				<article id="rep5">
					<div class="banderasDiv">
					<img class="banderaChi" src="../vistas/images/banderas/chi.jpg"><h2>Chino</h2><img class="banderaChi" src="../vistas/images/banderas/chi.jpg">
					</div>
					
					<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==5){
						   echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>
				<article id="rep6">
				<div class="banderasDiv">
					<img class="banderaEsp" src="../vistas/images/banderas/esp.jpg"><h2>Español</h2><img class="banderaEsp" src="../vistas/images/banderas/esp.jpg">
					</div>
					
					<?php 

					foreach ($campos as $rows) {

						if($rows['idioma_asesor']==6){
						   echo "<p style='font-weight:bold;'>".$rows['nombre']." ".$rows['apellido_paterno'].":</p><p> ".$rows['correo']."</p><br>";
					    }						  
					}
				?>
				</article>

			</div>
		</div>
	</div>
</div>

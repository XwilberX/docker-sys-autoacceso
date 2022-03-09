

<div class="dash" id="homeIcons">
      <div class="dashContainer" id="adminUsuarios" style="display: none">
         <a href="<?php echo SERVERURL; ?>listaUsuarios/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/userAdmin_icon.png" ></input></a>
         <br> <label for="">Administrar usuarios</label>
     </div>

         <div class="dashContainer" id="completarIns" style="display: none">
         	<a href="<?php echo SERVERURL; ?>listaPreinscritos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/inscriptions_icon.png" ></input></a> <br> <label for="">Completar inscripciones</label>
		</div>
		
		<div class="dashContainer" id="asesorias" style="display: none">
         	<a href="<?php echo SERVERURL; ?>listaAsesorias/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/conversation_icon.png" ></input></a><br> <label for="">Asesorías, escritos, conversación</label>
		</div>
         
</div>

<div class="dash" id="homeIcons">
            <div class="dashContainer" id="seccionAlumnos" style="display: none">
         	<a href="<?php echo SERVERURL; ?>listaAlumnos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/studentList_icon.png" ></input></a><br> <label for="">Gestionar alumnos</label>
		</div>

         
         <div class="dashContainer" id="listaEgresados" style="display: none">
         	<a href="<?php echo SERVERURL; ?>listaEgresados/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/egresados_icon.png" ></input></a>
         	<br> <label for="">Lista de egresados</label>
		</div>         	

       <div class="dashContainer" id="reportes" style="display: none">
         	<a href="<?php echo SERVERURL; ?>generarReportes/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/reports_icon.png" ></input></a> <br> <label for="">Generación de reportes</label>
		</div>

</div>

<div class="dash" id="homeIcons">
 		<div class="dashContainer" id="adminFormatos" style="display: none">
         	<a href="<?php echo SERVERURL; ?>formatos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/formats_icon.png" ></input></a> <br> <label for="">Formatos</label>
		</div>

       <div class="dashContainer" id="adminDoc" style="display: none">
         	<a href="<?php echo SERVERURL; ?>gestionarDocumentos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/documents_icon.png" ></input></a> <br> <label for="">Documentos</label>
		</div>
        <div class="dashContainer" id="actualizarPass" style="display: none">
         	<a href="<?php echo SERVERURL.'actualizarPass/'.$lc->encryption($_SESSION['id_scaa']).'/';?>"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/pass_icon.png" ></input></a> <br> <label for="">Restablecer contraseña</label>
		</div> 
		
		      	
		
</div>

<div class="dash" id="homeIcons">
 
 

</div>




<?php
	  	if(isset($_SESSION['privilegio_scaa']) && $_SESSION['privilegio_scaa']==1){
	  		echo"<script>document.getElementById('adminUsuarios').style.display='block'</script>";
	  		echo"<script>document.getElementById('completarIns').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminFormatos').style.display='block'</script>";

	  		echo"<script>document.getElementById('seccionAlumnos').style.display='block'</script>";
	  		echo"<script>document.getElementById('listaEgresados').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminDoc').style.display='block'</script>";

	  		echo"<script>document.getElementById('asesorias').style.display='block'</script>";
	  		echo"<script>document.getElementById('conversacion').style.display='block'</script>";
	  		echo"<script>document.getElementById('reportes').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminPass').style.display='block'</script>";
	  		echo"<script>document.getElementById('actualizarPass').style.display='block'</script>";

	  			}

	  	if (isset($_SESSION['privilegio_scaa']) && $_SESSION['privilegio_scaa']==2){
	  		echo"<script>document.getElementById('completarIns').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminFormatos').style.display='block'</script>";

	  		echo"<script>document.getElementById('seccionAlumnos').style.display='block'</script>";
	  		echo"<script>document.getElementById('listaEgresados').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminDoc').style.display='block'</script>";

	  		echo"<script>document.getElementById('asesorias').style.display='block'</script>";
	  		echo"<script>document.getElementById('conversacion').style.display='block'</script>";
	  		echo"<script>document.getElementById('reportes').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminPass').style.display='block'</script>";
	  		echo"<script>document.getElementById('actualizarPass').style.display='block'</script>";
	  				}

	  	if (isset($_SESSION['privilegio_scaa']) && $_SESSION['privilegio_scaa']==3){
	  		
	  		echo"<script>document.getElementById('seccionAlumnos').style.display='block'</script>";
	  		echo"<script>document.getElementById('listaEgresados').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminPass').style.display='block'</script>";
			echo"<script>document.getElementById('actualizarPass').style.display='block'</script>";
	  				}

	  	if (isset($_SESSION['privilegio_scaa']) && $_SESSION['privilegio_scaa']==4){


	  		echo"<script>document.getElementById('seccionAlumnos').style.display='block'</script>";
	  		echo"<script>document.getElementById('listaEgresados').style.display='block'</script>";


	  		echo"<script>document.getElementById('asesorias').style.display='block'</script>";
	  		echo"<script>document.getElementById('conversacion').style.display='block'</script>";
	  		echo"<script>document.getElementById('adminPass').style.display='block'</script>";
			echo"<script>document.getElementById('actualizarPass').style.display='block'</script>";
	  		
	  				}

	  	if (isset($_SESSION['privilegio_scaa']) && $_SESSION['privilegio_scaa']==6){



	  		echo"<script>document.getElementById('asesorias').style.display='block'</script>";
	  		echo"<script>document.getElementById('conversacion').style.display='block'</script>";
	  		echo"<script>document.getElementById('actualizarPass').style.display='block'</script>";
	  		
	  				}
	  			?>



<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=7){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
<?php 

  require_once "./controladores/loginControlador.php";


  $head=new loginControlador();
  $nombre=$head->nombre_isLog_controlador();

 ?>

  <div class="g3" id="">
	  	
      <div class="formContainer2">
	  	<h2>Te damos la bienvenida, <?php echo $nombre ?>!</h2>
    

    <?php 

include "./vistas/inc/vistasPrivilegio.php"; 


 ?> 


    <!--  <div>
	  	<div class="dash">
      <div class="dashContainer">
         <a href="<?php echo SERVERURL; ?>listaUsuarios/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/userAdmin_icon.png" ></input></a>
         <br> <label for="">Administrar usuarios</label>
      </div>

         <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>preinsAdmin/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/inscriptions_icon.png" ></input></a> <br> <label for="">Completar inscripciones</label>
		</div>

 		<div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>adminFormatos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/formats_icon.png" ></input></a> <br> <label for="">Administrar formatos</label>
		</div>

     </div>  <br>  
	<div class="dash">
            <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>listaAlumnos/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/studentList_icon.png" ></input></a><br> <label for="">Gestionar alumnos</label>
		</div>
         
         <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>listaEgresados/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/egresados_icon.png" ></input></a>
         	<br> <label for="">Lista de egresados</label>
		</div>         	
       <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>adminDoc/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/documents_icon.png" ></input></a> <br> <label for="">Administrar documentos</label>
		</div>
</div>
<br>
      
      	<div class="dash">
            <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>asesorias/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/asesoria_icon.png" ></input></a><br> <label for="">Listas: Asesorias</label>
		</div>
         
         <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>clubConversacion/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/conversation_icon.png" ></input></a>
         	<br> <label for="">Listas: Club de conversación</label>
		</div>         	
       <div class="dashContainer">
         	<a href="<?php echo SERVERURL; ?>reportes/"> <input type="image" src="<?php echo SERVERURL; ?>vistas/images/adminIcons/reports_icon.png" ></input></a> <br> <label for="">Generación de reportes</label>
		</div>

</div>
<br>
      </div>-->
</div> 
</div>
       


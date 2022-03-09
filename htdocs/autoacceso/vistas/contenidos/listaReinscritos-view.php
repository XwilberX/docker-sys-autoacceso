<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=3){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <div class="formContainer3" >

       
    <div class="g3-table">
      <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaPreinscritos/"><input type="button" class="btns2" value="Lista de solicitudes"></a>
         <a href="<?php echo SERVERURL; ?>buscarPreinscrito/"><input type="button" class="btns2" value="Buscar solicitud"></a> 
         <a href="<?php echo SERVERURL; ?>listaReinscritos/"><input type="button" class="btns2" value="Solicitudes Reinscripción"></a>
         <a href="<?php echo SERVERURL; ?>buscarReinscripcion/"><input type="button" class="btns2" value="Buscar Reinscripción"></a>
      </div>
      

     <h2>Lista de solicitudes de reinscripción</h2>

<div>

<?php 

  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->paginador_alumno_reinscrito_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
  
 ?>
      </div>
        </div>
          </div>  

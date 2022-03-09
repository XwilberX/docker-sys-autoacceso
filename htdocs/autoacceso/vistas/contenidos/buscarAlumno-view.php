<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=5){
   
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

<div class="g3-table">

    <div class="formContainer3"> <br>
      <div id="btnsList">
         <?php if($_SESSION['privilegio_scaa']<=2){ ?>
         <a href="<?php echo SERVERURL; ?>agregarAlumno/"><input type="button" class="btns2" value="Agregar Alumno"></a>
         <a href="<?php echo SERVERURL; ?>listaAlumnos/"><input type="button" class="btns2" value="Lista de inscritos"></a>
        <a href="<?php echo SERVERURL; ?>buscarAlumno/"><input type="button" class="btns2" value="Buscar alumno"></a>
         
         <?php }else{ ?>
          <a href="<?php echo SERVERURL; ?>listaAlumnos/"><input type="button" class="btns2" value="Lista de inscritos"></a>
        <a href="<?php echo SERVERURL; ?>buscarAlumno/"><input type="button" class="btns2" value="Buscar alumno"></a>
         <?php } ?>
         </div>
       
    
    <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
      <input type="hidden" name="modulo" id="" value="alumno">
<div>
<h2>Buscar alumno</h2>

  <input type="text" value="" name="busqueda_inicial" minlength="2" maxlength="50" placeholder="Nombre, Apellidos, Curp o Teléfono" class="txtBox" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br> 
</div>
    </form>

<div class="formContainer3">
<?php 
if(isset($_SESSION['busqueda_alumno']) && $_SESSION['busqueda_alumno']!=""){
    $busqueda=$_SESSION['busqueda_alumno'];
 
 // }else{
  ?>
  	  	<h2 >Resultados de la búsqueda</h2>
<?php  
  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->paginador_alumno_controlador($pagina[1],5,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],$busqueda);
  
  }?>
</div>

    </div>
      	  </div>  


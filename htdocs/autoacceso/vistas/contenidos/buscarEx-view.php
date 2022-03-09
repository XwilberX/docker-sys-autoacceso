<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=4){
  
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <div class="g3-table" id="select_idioma">

       
    <div class="formContainer3">
       <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaExAlumnos/"><input type="button" class="btns2" value="Lista de ex-alumnos"></a>
         <a href="<?php echo SERVERURL; ?>buscarEx/"><input type="button" class="btns2" value="Buscar Alumno"></a>
       
         </div>
      
    
   <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
      <input type="hidden" name="modulo" id="" value="exalumno">
<div>
<h2>Buscar ex-alumno</h2>

  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos, Curp o Teléfono" class="txtBox" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br>
</div>
    </form>

<div class="formContainer3">
 <?php 
if(isset($_SESSION['busqueda_exalumno']) && $_SESSION['busqueda_exalumno']!=""){
    $busqueda=$_SESSION['busqueda_exalumno'];
 ?> 
        <h2 >Resultados de la búsqueda</h2>
<?php  
  require_once "./controladores/alumnoControlador.php";
  $ins_alumno = new alumnoControlador(); 
  echo $ins_alumno->paginador_exalumnos_controlador($pagina[1], 10, $_SESSION['privilegio_scaa'], $_SESSION['curp_scaa'], $pagina[0], $busqueda);
  
  }?>
</div>
    </div>
      	  </div>  
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
         <a href="<?php echo SERVERURL; ?>listaEgresados/"><input type="button" class="btns2" value="Lista de egresados"></a>
         <a href="<?php echo SERVERURL; ?>buscarEgr/"><input type="button" class="btns2" value="Buscar Alumno"></a>
       
         </div>
      
    
   <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
      <input type="hidden" name="modulo" id="" value="egresado">
<div>
<h2>Buscar alumno para añadir a lista de egresados</h2>

  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos, Curp o Teléfono" class="txtBox" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br>
</div>
    </form>

<div class="formContainer3">
 <?php 
if(isset($_SESSION['busqueda_egresado']) && $_SESSION['busqueda_egresado']!=""){
    $busqueda=$_SESSION['busqueda_egresado'];
 ?> 
        <h2 >Resultados de la búsqueda</h2>
<?php  
 require_once"./controladores/egresadoControlador.php";
  $ins_egresado= new egresadoControlador();
  echo $ins_egresado->paginador_egresados_controlador($pagina[1],5,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0], $busqueda);
  
  }?>
</div>
    </div>
      	  </div>  
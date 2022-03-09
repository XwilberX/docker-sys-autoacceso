<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=4){
  
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <div class="g3-table" id="select_idioma">

       
 <div class="formContainer3"> <br>
      <div id="btnsList">
         <a href="<?php echo SERVERURL; ?>listaPreinscritos/"><input type="button" class="btns2" value="Lista de solicitudes"></a>
        <a href="<?php echo SERVERURL; ?>buscarPreinscrito/"><input type="button" class="btns2" value="Buscar solicitud"></a>
        <a href="<?php echo SERVERURL; ?>listaReinscritos/"><input type="button" class="btns2" value="Solicitudes Reinscripción"></a>
        <a href="<?php echo SERVERURL; ?>buscarReinscripcion/"><input type="button" class="btns2" value="Buscar Reinscripción"></a>
      </div>
      
    
   <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
      <input type="hidden" name="modulo" id="" value="reinscripcion">
<div>
<h2>Buscar reinscripcion</h2>

  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos, Curp o Teléfono" class="txtBox" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br>
</div>
    </form>

<div class="formContainer3">
 <?php 
if(isset($_SESSION['busqueda_reinscripcion']) && $_SESSION['busqueda_reinscripcion']!=""){
    $busqueda=$_SESSION['busqueda_reinscripcion'];
 ?> 
        <h2 >Resultados de la búsqueda</h2>
<?php  
 require_once"./controladores/preinscritoControlador.php";
 $ins_preinscrito= new preinscritoControlador();
 echo $ins_preinscrito->paginador_reinscripcion_controlador($pagina[1],5,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0], $busqueda);
  
  }?>
</div>
    </div>
      	  </div>  
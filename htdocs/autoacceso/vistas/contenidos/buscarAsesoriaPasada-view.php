<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=5){
  
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <div class="g3-table">

       
    <div class="formContainer3">
       <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaAsesorias/"><input type="button" class="btns2" value="Próximas asesorias"></a>
          <a href="<?php echo SERVERURL."dispoAsesorias/".$lc->encryption($_SESSION['id_scaa'])."/";?>"><input type="button" class="btns2" value="Disponibilidad"></a>
          <a href="<?php echo SERVERURL; ?>asesoriasPasadas/"><input type="button" class="btns2" value="Asesorias pasadas"></a>
          <a href="<?php echo SERVERURL; ?>buscarAsesoriaPasada/"><input type="button" class="btns2" value="Buscar por alumno"></a>
       
         </div>
      
    
    <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
      <input type="hidden" name="modulo" id="" value="asesorias_pasadas">
<div>
<h2>Buscar asesorias pasadas</h2>

  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos o Curp" class="txtBox" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br>
</div>
    </form>

<div class="formContainer3">
 <?php 
if(isset($_SESSION['busqueda_asesorias_pasadas']) && $_SESSION['busqueda_asesorias_pasadas']!=""){
    $busqueda=$_SESSION['busqueda_asesorias_pasadas'];
 ?> 
        <h2 >Resultados de la búsqueda</h2>
<?php  
 require_once"./controladores/asesoriasControlador.php";
  $ins_asesorias= new asesoriasControlador();
  echo $ins_asesorias->buscar_asesorias_pasadas_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0], $busqueda);
  
  }?>
</div>
    </div>
      	  </div>  
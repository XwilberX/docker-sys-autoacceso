<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

<div class="g3-table">


    <div class="formContainer3"> <br>
      <div id="btnsList">
         <a href="<?php echo SERVERURL; ?>agregarUsuario/"><input type="button" class="btns2" value="Agregar usuario"></a>
         <a href="<?php echo SERVERURL; ?>listaUsuarios/"><input type="button" class="btns2" value="Lista de usuarios"></a>
         <a href="<?php echo SERVERURL; ?>buscarUsuario/"><input type="button" class="btns2" value="Buscar usuario"></a> 

         </div>
       
    
    <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">      
      <input type="hidden" name="modulo" id="" value="usuario">
<div>
<h2>Buscar usuario</h2>

  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos, Curp o Teléfono" class="txtBox" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñüÁÉÍÓÚÑÜ 0-9]{2,50}" autocomplete="off"><br>
  
<input type="submit" class="btns" id="divT" value="Buscar"><br>
</div>
    </form>

<div class="formContainer3">
<?php 
  if(isset($_SESSION['busqueda_usuario']) && $_SESSION['busqueda_usuario']!=""){
    $busqueda=$_SESSION['busqueda_usuario'];

 ?>
        <h2 >Resultados de la búsqueda</h2>
<?php  


  require_once"./controladores/usuarioControlador.php";
  $ins_usuario= new usuarioControlador();
  echo $ins_usuario->paginador_usuario_controlador($pagina[1],5,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0], $busqueda);
  
  
 } ?>
</div>
    </div>
        </div>  


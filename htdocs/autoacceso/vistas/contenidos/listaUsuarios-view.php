<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <div class="formContainer3" >
      
    <div class="g3-table">
      <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>agregarUsuario/"><input type="button" class="btns2" value="Agregar usuario"></a>
         <a href="<?php echo SERVERURL; ?>listaUsuarios/"><input type="button" class="btns2" value="Lista de usuarios"></a>
         <a href="<?php echo SERVERURL; ?>buscarUsuario/"><input type="button" class="btns2" value="Buscar usuario"></a>
         </div>
          <a href="<?php echo SERVERURL."editarUsuario/".$lc->encryption($_SESSION['id_scaa'])."/"; ?>"><button class="btnAgregar" id="btnAgregar2">Información personal</button></a><br>
     <h2>Lista de usuarios</h2>
     <div>
<?php 

  require_once"./controladores/usuarioControlador.php";
  $ins_usuario= new usuarioControlador();
  echo $ins_usuario->paginador_usuario_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
  
 ?>
      </div>
        </div>
          </div>  

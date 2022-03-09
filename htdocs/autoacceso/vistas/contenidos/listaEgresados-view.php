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
     <?php if($_SESSION['privilegio_scaa']<=3){ ?>      
       <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaEgresados/"><input type="button" class="btns2" value="Lista de egresados"></a>
         <a href="<?php echo SERVERURL; ?>buscarEgr/"><input type="button" class="btns2" value="Buscar Alumno"></a>
        </div>    
      <?php  }else{ ?> 
         <br><br>
      <?php  }?> 

     <h2>Lista de alumnos egresados</h2>

<div>

<?php 

  require_once"./controladores/egresadoControlador.php";
  $ins_egresado= new egresadoControlador();
  echo $ins_egresado->paginador_mostrar_egresados_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
  
 ?>
</div>
    </div>
      	  </div>  

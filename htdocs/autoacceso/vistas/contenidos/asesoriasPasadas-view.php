<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2 && $_SESSION['privilegio_scaa']!=4 && $_SESSION['privilegio_scaa']!=6){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

<div class="g3-table">
    <div id="btnsList"><br>

            <?php if($_SESSION['privilegio_scaa']<=4){ ?>
            <a href="<?php echo SERVERURL; ?>listaAsesorias/"><input type="button" class="btns2" value="Próximas asesorías"></a>
            <a href="<?php echo SERVERURL."dispoAsesorias/".$lc->encryption($_SESSION['id_scaa'])."/";?>"><input type="button" class="btns2" value="Disponibilidad"></a>
            <a href="<?php echo SERVERURL; ?>asesoriasPasadas/"><input type="button" class="btns2" value="Asesorías pasadas"></a>
            <a href="<?php echo SERVERURL; ?>buscarAsesoriaPasada/"><input type="button" class="btns2" value="Buscar por alumno"></a>
      
    <?php   } else {?>
            <a href="<?php echo SERVERURL; ?>listaAsesorias/"><input type="button" class="btns2" value="Próximas asesorías"></a>
            <a href="<?php echo SERVERURL."agendarAsesorias/".$lc->encryption($_SESSION['id_scaa'])."/";?>"><input type="button" class="btns2" value="Agendar Asesorías"></a>
            <a href="<?php echo SERVERURL; ?>asesoriasPasadas/"><input type="button" class="btns2" value="Asesorías pasadas"></a>

        <?php } ?>
        
    </div>
    <div class="formContainer4">
        <h2>Asesorías pasadas</h2>

        <div>
        <?php   
              require_once"./controladores/asesoriasControlador.php";
              $ins_asesorias= new asesoriasControlador();
              echo $ins_asesorias->lista_asesorias_pasadas_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
        ?>
        </div>
    </div>
</div>
<script>
  (function(){
    setInterval(
      function(){
        document.location.reload()
      },
      300000)
  })()
</script>
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
        <h2>Próximas asesorías</h2>
<?php if($_SESSION['privilegio_scaa']==6){ ?>
<p>Recuerda que, para acceder a tu asesoría debes dar clic en el botón "ZOOM" en la fecha y hora señaladas.</p>
<?php   } ?>
        <div>
        <?php   
              require_once"./controladores/asesoriasControlador.php";
              $ins_asesorias= new asesoriasControlador();
              if($_SESSION['privilegio_scaa']<=2){?>
              <p>(Buscar por asesor)</p>
                 <form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
                  <input type="hidden" name="modulo" id="" value="proximas_asesorias">
                  <input type="text" value="" name="busqueda_inicial" placeholder="Nombre, Apellidos o Curp" class="txtBox" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" autocomplete="off"><br>
                  <input type="submit" class="btns" id="divT" value="Buscar"><br>
                  </form><br>
                <?php 
                if(isset($_SESSION['busqueda_proximas_asesorias']) && $_SESSION['busqueda_proximas_asesorias']!=""){
                 $busqueda=$_SESSION['busqueda_proximas_asesorias'];
                //  echo $_SESSION['busqueda_proximas_asesorias'];
                 ?> <h2 >Resultados de la búsqueda</h2> <?php
                 echo $ins_asesorias->buscar_proximas_asesorias_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],$busqueda);
               }
              }else{
                echo $ins_asesorias->lista_asesorias_controlador($pagina[1],10,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
              }
              
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
      180000)
  })()
</script>
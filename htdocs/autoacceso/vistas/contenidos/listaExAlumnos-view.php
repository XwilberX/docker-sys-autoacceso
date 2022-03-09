<?php
if ($_SESSION['id_scaa'] != $pagina[1]) {
  if ($_SESSION['privilegio_scaa'] >= 3) {

    echo $lc->forzar_cierre_sesion_controlador();
    exit();
  }
}
?>
<!-- <?php echo $_SESSION['privilegio_scaa']; ?> -->
<div class="formContainer3">
  <div id="btnsList"><br>
    <?php if ($_SESSION['privilegio_scaa'] <= 2) { ?>
      <a href="<?php echo SERVERURL; ?>buscarEx/"><input type="button" class="btns2" value="Buscar ex-alumno"></a>

    <?php } else { ?>
      <a href="<?php echo SERVERURL; ?>buscarEx/"><input type="button" class="btns2" value="Buscar ex-alumno"></a>
    <?php } ?>
  </div>

  <div class="g3-table">
    <div id="btnsList"><br>



    </div>


    <h2>Lista de Ex alumnos</h2>

    <div>

      <?php

      require_once "./controladores/alumnoControlador.php";
      $ins_alumno = new alumnoControlador();
      echo $ins_alumno->paginador_exalumnos_controlador($pagina[1], 10, $_SESSION['privilegio_scaa'], $_SESSION['curp_scaa'], $pagina[0], "");

      ?>
    </div>
  </div>
</div>
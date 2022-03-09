 <?php
  if ($_SESSION['id_scaa'] != $pagina[1]) {
    if ($_SESSION['privilegio_scaa'] >= 5) {

      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
  ?>
 <div class="g3-table" id="select_idioma">


   <div class="formContainer3">
     <div id="btnsList"><br>
       <?php if ($_SESSION['privilegio_scaa'] <= 2) { ?>
         <a href="<?php echo SERVERURL; ?>agregarAlumno/"><input type="button" class="btns2" value="Agregar Alumno"></a>
         <a href="<?php echo SERVERURL; ?>listaAlumnos/"><input type="button" class="btns2" value="Lista de inscritos"></a>
         <a href="<?php echo SERVERURL; ?>buscarAlumno/"><input type="button" class="btns2" value="Buscar alumno"></a>

       <?php } else { ?>
         <a href="<?php echo SERVERURL; ?>listaAlumnos/"><input type="button" class="btns2" value="Lista de inscritos"></a>
         <a href="<?php echo SERVERURL; ?>buscarAlumno/"><input type="button" class="btns2" value="Buscar alumno"></a>
       <?php } ?>  
     </div>


     <h2>Lista de alumnos inscritos</h2>
     <a href="../reportes/listaInscritosExc.php"><button class="btnlistaIns"> Descargar esta lista</button></a><br>
     <?php if ($_SESSION['privilegio_scaa'] == 1) { ?>
       <button class="btnFinalizarCurso" id="btnFinalizarCurso" onclick="finalizar_curso_mostrar()">Finalizar un periodo</button><br>
     <?php } ?>
     <div class="horarios_asesorias_editar" id="horarios_asesorias_editar"><br>
       <input type="button" value="X" class="btnCerrarHorarios" onclick="finalizar_curso_ocultar()">
       <label for="" id="theadAsesoriasLabel" style="font-weight:bold; font-size:18px; margin-left:10%; ">Seleccione el periodo que desea finalizar</label><br>
       <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alumnoAjax.php" method="POST" data-form="delete">

         <select name="finalizarPeriodo" id="">
           <option value="" selected>Selecciona</option>
           <option value="AGOSTO 2021 - ENERO 2022">AGOSTO 2021 - ENERO 2022</option>
           <option value="OCTUBRE 2021 - ABRIL 2022">OCTUBRE 2021 - ABRIL 2022</option>
           <option value="ENERO 2022 - AGOSTO 2022">ENERO 2022 - AGOSTO 2022</option>
           <option value="ABRIL 2022 - OCTUBRE 2022">ABRIL 2022 - OCTUBRE 2022</option>

           <option value="AGOSTO 2022 - ENERO 2023">AGOSTO 2022 - ENERO 2023</option>
           <option value="OCTUBRE 2022 - ABRIL 2023">OCTUBRE 2022 - ABRIL 2023</option>
           <option value="ENERO 2023 - AGOSTO 2023">ENERO 2023 - AGOSTO 2023</option>
           <option value="ABRIL 2023 - OCTUBRE 2023">ABRIL 2023 - OCTUBRE 2023</option>

           <option value="AGOSTO 2023 - ENERO 2024">AGOSTO 2023 - ENERO 2024</option>
           <option value="OCTUBRE 2023 - ABRIL 2024">OCTUBRE 2023 - ABRIL 2024</option>
           <option value="ENERO 2024 - AGOSTO 2024">ENERO 2024 - AGOSTO 2024</option>
           <option value="ABRIL 2024 - OCTUBRE 2024">ABRIL 2024 - OCTUBRE 2024</option>

         </select><br><br>
         <input type="submit" value="Finalizar periodo" class="btnAmarillo">
       </form>
     </div>

     <div>

       <?php

        require_once "./controladores/alumnoControlador.php";
        $ins_alumno = new alumnoControlador();
        echo $ins_alumno->paginador_alumno_controlador($pagina[1], 10, $_SESSION['privilegio_scaa'], $_SESSION['curp_scaa'], $pagina[0], "");

        ?>
     </div>
   </div>
 </div>

 <!--  <?php
        $fechaActual = date("Y-m-d", strtotime("Today"));
        $fechaLimite = date("Y-m-d", strtotime("Today"));
        ?>
      <option value="AGOSTO <?php echo date("Y") ?> - ENERO <?php echo date("Y", strtotime("next Year")) ?>">AGOSTO <?php echo date("Y") ?> - ENERO <?php echo date("Y", strtotime("next Year")) ?></option>
      <option value="OCTUBRE <?php echo date("Y") ?> - ABRIL <?php echo date("Y", strtotime("next Year")) ?>">OCTUBRE <?php echo date("Y") ?> - ABRIL <?php echo date("Y", strtotime("next Year")) ?></option>
      <option value="ENERO <?php echo date("Y", strtotime("next Year")) ?> - AGOSTO <?php echo date("Y", strtotime("next Year")) ?>">ENERO <?php echo date("Y", strtotime("next Year")) ?> - AGOSTO <?php echo date("Y", strtotime("next Year")) ?></option>
      <option value="ABRIL <?php echo date("Y", strtotime("next Year")) ?> - OCTUBRE <?php echo date("Y", strtotime("next Year")) ?>">ABRIL <?php echo date("Y", strtotime("next Year")) ?> - OCTUBRE <?php echo date("Y", strtotime("next Year")) ?></option> -->
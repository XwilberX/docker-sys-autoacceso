<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=4){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }

              require_once "./controladores/alumnoControlador.php";
           $ins_alumno =  new alumnoControlador();
            $datos_alumno = $ins_alumno->datos_alumno_controlador("Unico",$pagina[1]);
          if($datos_alumno->rowCount()>=1){
            
            $campos = $datos_alumno->fetch();
            
 ?>

<div class="g3-table">
    <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaExAlumnos/"><input type="button" class="btns2" value="Lista de Ex alumnos"></a>
         <!-- <a href="<?php echo SERVERURL; ?>BuscarExAlumnos/"><input type="button" class="btns2" value="Buscar  Ex Alumnos"></a>      -->
    </div>
    <div class="formContainer4">
        <h2>Asesorías pasadas</h2>
        <P class="pBold">Alumno: <?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno']; ?></P>

        <div>
        <?php   
              require_once"./controladores/asesoriasControlador.php";
              $ins_asesorias= new asesoriasControlador();
              echo $ins_asesorias->lista_asesorias_exalumno_controlador($pagina[1],100,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
            }
        ?>
        </div>
    </div>
</div>
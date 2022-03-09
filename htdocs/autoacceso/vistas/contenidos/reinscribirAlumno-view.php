
<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2){
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 <style>
  #fC2{

  min-height: 527px;
  }

  label{
    font-size: 18px;
  }
</style>
 <div class="g3" id="select_idioma">
    
  <div class="formContainer4" id="fC2">

          <?php 

            require_once "./controladores/alumnoControlador.php";
            
 
            $ins_alumno =  new alumnoControlador();
            

            $datos_alumno = $ins_alumno->datos_alumno_controlador("Unico",$pagina[1]);
           
          if($datos_alumno->rowCount()>=1){
            
            $campos = $datos_alumno->fetch();
            $campos2 = $datos_alumno->fetch();
            $campos3 = $datos_alumno->fetch();
            $campos4 = $datos_alumno->fetch();
           // $des=$ins_preinscrito->desencriptar_controlador($campos['password']);
            
           ?>

<h2>Reinscripción de alumnos</h2>
    <p class="pBold"> <?php 
    if($campos['sexo']=="Masculino"){?>
      Alumno: <?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno'];
    }else{?>
      Alumna: <?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno'];
    }?>

    </p>

    <div>
      <?php 

  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->lista_idiomas_inscritos($pagina[1]);
  
 ?>
    </div>


    <div>
     <?php 

  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->lista_idiomas_para_inscribir($pagina[1]);
  
 ?>
    </div>


        <?php }else{ ?>
        <br><br>
        <div class="alert_error"><br>
          <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt="">
          <p class="errorSub1">¡Ocurrió un error inesperado!</p>
          <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

        </div>
        <?php } ?>

</div>  
</div>  


<!-- 

<label for="" style="font-weight: bold; font-size:18px;">Datos personales</label><br><label class="switchBtn">
    <input type="checkbox" class="checkDatosReins" id="checkDatosReins" onclick="showCheck1()">
    <div class="slide round"></div>
</label>

<div class="datosPersonalesReins" id="datosPersonalesReins" style="display: none;">
</div> 


<label for="" style="font-weight: bold; font-size:18px;">Idiomas</label><br><label class="switchBtn2">
    <input type="checkbox" class="checkDatosReins2" id="checkDatosReins2" onclick="showCheck2()">
    <div class="slide2 round2"></div>
  </label>
  <div class="idiomasReins" id="idiomasReins" style="display: none;">

</div> 
 -->
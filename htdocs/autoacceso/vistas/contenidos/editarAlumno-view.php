<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=3){
  
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

 <div class="g3" id="select_idioma">
     
  <br>
         <div id="btnsList">
         <a href="<?php echo SERVERURL; ?>agregarAlumno/"><input type="button" class="btns2" value="Agregar Alumno"></a>
         <a href="<?php echo SERVERURL; ?>listaAlumnos/"><input type="button" class="btns2" value="Lista de inscritos"></a>
         <a href="<?php echo SERVERURL; ?>buscarAlumno/"><input type="button" class="btns2" value="Buscar alumno"></a>
         </div>
 <div class="formContainer4">
          <?php 

            require_once "./controladores/alumnoControlador.php";
            require_once "./controladores/preinscritoControlador.php";
 
            $ins_alumno =  new alumnoControlador();
            $ins_preinscrito =  new preinscritoControlador();

            $datos_alumno = $ins_alumno->datos_alumno_controlador("Unico",$pagina[1]);
            $datos=$ins_preinscrito->datos_carreras_unach_controlador();

            if($datos->rowCount()>=1){
              $carreras=$datos->fetchAll();

          if($datos_alumno->rowCount()>=1){
            
            $campos = $datos_alumno->fetch();
            $campos2 = $datos_alumno->fetch();
            $campos3 = $datos_alumno->fetch();
            $campos4 = $datos_alumno->fetch();
           // $des=$ins_preinscrito->desencriptar_controlador($campos['password']);
            
           ?>
<form class="FormularioAjax" id="fAjax" action="<?php echo SERVERURL;?>ajax/cursoAjax.php" method="POST" data-form="delete">
  
  <input type="submit" id="eliminarIdSubm" class="btns" value="Inscribir" style="display:none;"><input type="hidden" name="eliminarId" id="eliminarId">
</form>
<form class="FormularioAjax" id="fAjax" action="<?php echo SERVERURL;?>ajax/cursoAjax.php" method="POST" data-form="update">
  
  <input type="submit" id="activarIdioma" class="btns" style="display:none;"><input type="hidden" name="activarCurso" id="activarCurso">
</form>
<form class="FormularioAjax" id="fAjax" action="<?php echo SERVERURL;?>ajax/cursoAjax.php" method="POST" data-form="update">
  
  <input type="submit" id="desactivarIdioma" class="btns" style="display:none;"><input type="hidden" name="desactivarCurso" id="desactivarCurso">
</form>

<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alumnoAjax.php" method="POST" data-form="save">
    <input type="hidden" name="id_curso" value=" <?php echo $campos['id_curso_asesoria'];?> ">
    <input type="hidden" name="id_curso2" value=" <?php echo $campos2['id_curso_asesoria'];?> "> 
    <input type="hidden" name="id_curso3" value=" <?php echo $campos3['id_curso_asesoria'];?> ">
    <input type="hidden" name="id_curso4" value=" <?php echo $campos4['id_curso_asesoria'];?> "> 

    <input type="hidden" name="alu_id_decrypt" value=" <?php echo $pagina[1]; ?> "> 
  <p style="font-weight: bold;">Editar alumno</p>
  <p>Todos los campos marcados con un asterisco son obligatorios</p>

<label for="" style="font-weight: bold; font-size:18px;">Datos personales</label><br><label class="switchBtn">
    <input type="checkbox" class="checkDatosReins" id="checkDatosReins" onclick="showCheck1()">
    <div class="slide round"></div>
</label>
  
   <div class="datosPersonalesReins" id="datosPersonalesReins" style="display: none;">
  <div class="contentEditAlu">
   
<label for="">*Nombre (s): </label>
  <input type="text" class="txtBox" name="nombre_alu_edit" placeholder="ej:Ana" required="" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" value="<?php echo $campos['nombre']?>">
  
  <label for="">*Apellido paterno:</label> 
  <input type="text" class="txtBox" required="" name="apellido_paterno_edit" placeholder="ej:Díaz" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" value="<?php echo $campos['apellido_paterno']?>">

  <label for="">*Apellido materno:</label>
  <input type="text" class="txtBox" required="" name="apellido_materno_edit" placeholder="ej:Ruiz" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" value="<?php echo $campos['apellido_materno']?>"><br>
  
    <label for="">*CURP:</label> <input maxlength="18" minlength="18" type="text" name="curp_alu_edit" placeholder="18 Dígitos" class="txtBox" required="" pattern="[a-zA-Z0-9]{18,18}" value="<?php echo $campos['curp']?>">
    <label for="">*Fecha de nacimiento</label> 
   <input type="text" name="fecha_nacimiento_alu_edit" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" max="2007-12-31" value="<?php echo date('d-m-Y',strtotime( $campos['fecha_nacimiento']))?>">
    <label for="">*Teléfono:</label> <input maxlength="10" minlength="10" type="text" name="tel_edit" placeholder="10 Dígitos" class="txtBox" required="" pattern="[0-9]{10,10}" value="<?php echo $campos['telefono']?>"> <br>
    <label for="">*Correo personal: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_edit" placeholder="ejemplo@email.com" value="<?php echo $campos['correo']?>">
    <label for="">Correo UNACH: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_unach_edit" placeholder="ejemplo@unach.mx" value="<?php echo $campos['correo_unach']?>">
          <label for="">*Sexo:</label> 
      <select id="sex_preins_reg" name="sex_alu_edit" pattern="[a-z]{8,9}">
        <option value="Masculino" <?php if($campos['sexo']=="Masculino"){echo"selected";}?>>Masculino</option>
        <option value="Femenino" <?php if($campos['sexo']=="Femenino"){echo"selected";}?>>Femenino</option>
      </select>
    <label for="">*Residencia:</label> 
      <select id="residencia" name="residencia" pattern="[a-z]{8,9}" required>
        <option value="Nacional"<?php if($campos['residencia']=="" || $campos['residencia']=="Nacional"){echo"selected";}?>>Nacional</option><br>
        <option value="Extranjero"<?php if($campos['residencia']=="Extranjero"){echo"selected";}?>>Extranjero</option>
      </select>

<br>
<div id="residencia_datos">
  <label for="">///DOMICILIO/// </label>
    <label for="">Calle: </label> <input type="text"class="txtBox" name="calle_edit" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}" placeholder="ej:2a oriente" value="<?php echo $campos['calle']?>">
    <label for="">Número: </label> <input type="text" class="txtBox" name="num_edit" pattern="[0-9]{0,5}" placeholder="ej:182" value="<?php echo $campos['numero']?>">
    <label for="">*Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_alu_edit" id="cp_alu_edit" class="txtBox"  pattern="[0-9]{5,5}" placeholder="5 dígitos" value="<?php echo $campos['cp']?>"><br>

    <label for="">*Colonia: </label> 
    <input type="text" id="col_edit" name="col_edit" value="<?php echo $campos['colonia']?>" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}" >

    <label for="">*Municipio: </label> <input type="text" readonly="" class="txtBox" name="municipio_alu_edit" id="municipio_ins_Reg"  pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" placeholder="municipio" value="<?php echo $campos['municipio']?>">
    <label for="">*Estado: </label> <input type="text" readonly="" class="txtBox"  name="estado_alu_edit" id="estado_ins_Reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Estado" value="<?php echo $campos['estado']?>"> </div>
    </div>
  </div>
   

   

<!--<label for="password">*Contraseña</label> 
<input id="pass1" minlength="6" class="txtBox" type="password" name="pass_reg" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-z0-9$@.-]{6,20}"><img id="eye_boton1" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña1();">
<label for="">*Confirmar contraseña</label> 
<input id="pass2" minlength="6" class="txtBox" type="password" name="pass2_reg" required="" pattern="[A-Za-z0-9$@.-]{6,20}" placeholder="mínimo 6 dígitos"><img id="eye_boton2" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña2();">
-->
<br>
  <label for="" style="font-weight: bold; font-size:18px;">Idiomas</label><br><label class="switchBtn2">
    <input type="checkbox" class="checkDatosReins2" id="checkDatosReins2" onclick="showCheck2()">
    <div class="slide2 round2"></div>
  </label>

<div class="idiomasReins" id="idiomasReins" style="display: none;">
    <div class="contentEditAlu">
 
    <div class="border">

     <label for="">*Idioma 1 </label>  
<select id="idioms_reg" name="idioms_alu_edit" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" >-----</option>
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }

  ?>
</select>

    <label for="">*Tipo </label> 
<select name="tipo_preins_reg" id="tipo_preins_reg" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Selecciona</option>
  <option value="Inscripción" <?php if($campos['tipo']=="Inscripción"){echo"selected";}?>>Inscripción</option>
  <option value="Reinscripción" <?php if($campos['tipo']=="Reinscripción"){echo"selected";}?>>Reinscripción</option>
</select>

    <label for="">*Cond.</label> <select name="condicion_uno_reg" id="condicion_uno_reg" required>
    <option value="" selected>Selecciona</option>
      <option value="Regular"<?php if($campos['condicion']=="Regular"){echo"selected";}?>>Regular</option>
      <option value="Recursador" <?php if($campos['condicion']=="Recursador"){echo"selected";}?>>Recursador</option>
      <option value="Refuerzo" <?php if($campos['condicion']=="Refuerzo"){echo"selected";}?>>Refuerzo</option>
    </select>
    <label for="">*Nivel </label><select id="nivel1" name="nivel1" required pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="1" <?php if($campos['nivel']=="1"){echo"selected";}?>>1</option>
      <option value="2" <?php if($campos['nivel']=="2"){echo"selected";}?>>2</option>
      <option value="3" <?php if($campos['nivel']=="3"){echo"selected";}?>>3</option>
      <option value="4" <?php if($campos['nivel']=="4"){echo"selected";}?>>4</option>
      <option value="5" <?php if($campos['nivel']=="5"){echo"selected";}?>>5</option>
      <option value="6" <?php if($campos['nivel']=="6"){echo"selected";}?>>6</option>
      <option value="7" <?php if($campos['nivel']=="7"){echo"selected";}?>>7</option>
      <option value="8" <?php if($campos['nivel']=="8"){echo"selected";}?>>8</option>
      <option value="9" <?php if($campos['nivel']=="9"){echo"selected";}?>>9</option>
      <option value="10" <?php if($campos['nivel']=="10"){echo"selected";}?>>10</option>
      <option value="11" <?php if($campos['nivel']=="11"){echo"selected";}?>>11</option>
      <option value="12" <?php if($campos['nivel']=="12"){echo"selected";}?>>12</option>
      <option value="Ubicación" <?php if($campos['nivel']=="Ubicación"){echo"selected";}?>>Ubicación</option>
      <option value="Finalizado" <?php if($campos['nivel']=="Finalizado"){echo"selected";}?>>Finalizado</option>
    </select> 

    <label for="" >CL</label><select name="lc1" id="lc1">
        <option value="0"<?php if($campos['lc']=="0"){echo"selected";}?>>NO</option>
        <option value="1"<?php if($campos['lc']=="1"){echo"selected";}?>>SI</option>
      </select><br>

     <label for="">F. término</label> <input type="date" id="fecha_termino_reg1" name="fecha_termino_reg1" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" value="<?php echo $campos['fecha_termino']?>"> 
      <input name="refuerzo_uno_reg" placeholder="Refuerzo" id="refuerzo1" type="text" class="refuerzo_dis" value="<?php echo $campos['refuerzo']?>">
       
      <select id="periodo_reg1" name="periodo_reg" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}" required="">
        <option value="AGOSTO 2020 - ENERO 2021" <?php if($campos['periodo']== "AGOSTO 2020 - ENERO 2021"){echo"selected";}?>>AGOSTO 2020 - ENERO 2021</option>
        <option value="OCTUBRE 2020 - ABRIL 2021" <?php if($campos['periodo']== "OCTUBRE 2020 - ABRIL 2021"){echo"selected";}?>>OCTUBRE 2020 - ABRIL 2021</option>
        <option value="ENERO 2021 - AGOSTO 2021" <?php if($campos['periodo']== "ENERO 2021 - AGOSTO 2021"){echo"selected";}?>>ENERO 2021 - AGOSTO 2021</option>
        <option value="ABRIL 2021 - OCTUBRE 2021" <?php if($campos['periodo']== "ABRIL 2021 - OCTUBRE 2021"){echo"selected";}?>>ABRIL 2021 - OCTUBRE 2021</option>
        <option value="AGOSTO 2021 - ENERO 2022" <?php if($campos['periodo']== "AGOSTO 2021 - ENERO 2022"){echo"selected";}?>>AGOSTO 2021 - ENERO 2022</option>
        <option value="OCTUBRE 2021 - ABRIL 2022" <?php if($campos['periodo']== "OCTUBRE 2021 - ABRIL 2022"){echo"selected";}?>>OCTUBRE 2021 - ABRIL 2022</option>
        
        <option value="ENERO 2022 - AGOSTO 2022" <?php if($campos['periodo']== "ENERO 2022 - AGOSTO 2022"){echo"selected";}?>>ENERO 2022 - AGOSTO 2022</option>
        <option value="ABRIL 2022 - OCTUBRE 2022" <?php if($campos['periodo']== "ABRIL 2022 - OCTUBRE 2022"){echo"selected";}?>>ABRIL 2022 - OCTUBRE 2022</option>
        <option value="AGOSTO 2022 - ENERO 2023" <?php if($campos['periodo']== "AGOSTO 2022 - ENERO 2023"){echo"selected";}?>>AGOSTO 2022 - ENERO 2023</option>
        <option value="OCTUBRE 2022 - ABRIL 2023" <?php if($campos['periodo']== "OCTUBRE 2022 - ABRIL 2023"){echo"selected";}?>>OCTUBRE 2022 - ABRIL 2023</option>

        <option value="ENERO 2023 - AGOSTO 2023" <?php if($campos['periodo']== "ENERO 2023 - AGOSTO 2023"){echo"selected";}?>>ENERO 2023 - AGOSTO 2023</option>
        <option value="ABRIL 2023 - OCTUBRE 2023" <?php if($campos['periodo']== "ABRIL 2023 - OCTUBRE 2023"){echo"selected";}?>>ABRIL 2023 - OCTUBRE 2023</option>
        <option value="AGOSTO 2023 - ENERO 2024" <?php if($campos['periodo']== "AGOSTO 2023 - ENERO 2024"){echo"selected";}?>>AGOSTO 2023 - ENERO 2024</option>
        <option value="OCTUBRE 2023 - ABRIL 2024" <?php if($campos['periodo']== "OCTUBRE 2023 - ABRIL 2024"){echo"selected";}?>>OCTUBRE 2023 - ABRIL 2024</option>
       
    </select>
    <?php  

     if($campos['estatus_periodo']==1){
             echo '
            <input type="button" class="btnActualizar" onclick="desactivar('.$campos['id_curso_asesoria'].')" value="Activo">';

          }
      if($campos['estatus_periodo']==0){  
             echo '
            <input type="button" class="btnDesactivar" onclick="activar('.$campos['id_curso_asesoria'].')" value="Inactivo">';

          }?>

    </div><br>

    <div class="border">

   <label for="">Idioma 2 </label> 
 <select  name="idioms_reg2" id="idioms_reg2" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" >-----</option>
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos2['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }

  ?>
</select>

    <label for="">Tipo</label><select name="tipo1" id="tipo1" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción" <?php if($campos2['tipo']=="Inscripción"){echo"selected";}?>>Inscripción</option>
  <option value="Reinscripción" <?php if($campos2['tipo']=="Reinscripción"){echo"selected";}?>>Reinscripción</option>
</select>

  <label for="">Cond.</label> <select name="condicion_dos_reg" id="condicion_dos_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular"<?php if($campos2['condicion']=="Regular"){echo"selected";}?>>Regular</option>
      <option value="Recursador" <?php if($campos2['condicion']=="Recursador"){echo"selected";}?>>Recursador</option>
      <option value="Refuerzo" <?php if($campos2['condicion']=="Refuerzo"){echo"selected";}?>>Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel2" name="nivel2" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected>Selecciona</option>
      <option value="1" <?php if($campos2['nivel']=="1"){echo"selected";}?>>1</option>
      <option value="2" <?php if($campos2['nivel']=="2"){echo"selected";}?>>2</option>
      <option value="3" <?php if($campos2['nivel']=="3"){echo"selected";}?>>3</option>
      <option value="4" <?php if($campos2['nivel']=="4"){echo"selected";}?>>4</option>
      <option value="5" <?php if($campos2['nivel']=="5"){echo"selected";}?>>5</option>
      <option value="6" <?php if($campos2['nivel']=="6"){echo"selected";}?>>6</option>
      <option value="7" <?php if($campos2['nivel']=="7"){echo"selected";}?>>7</option>
      <option value="8" <?php if($campos2['nivel']=="8"){echo"selected";}?>>8</option>
      <option value="9" <?php if($campos2['nivel']=="9"){echo"selected";}?>>9</option>
      <option value="10" <?php if($campos2['nivel']=="10"){echo"selected";}?>>10</option>
      <option value="11" <?php if($campos2['nivel']=="11"){echo"selected";}?>>11</option>
      <option value="12" <?php if($campos2['nivel']=="12"){echo"selected";}?>>12</option>
      <option value="Ubicación" <?php if($campos2['nivel']=="Ubicación"){echo"selected";}?>>Ubicación</option>
      <option value="Finalizado" <?php if($campos2['nivel']=="Finalizado"){echo"selected";}?>>Finalizado</option>
    </select> 
    <label for="" >CL</label><select name="lc2" id="lc2">
        <option value="0"<?php if($campos2['lc']=="0"){echo"selected";}?>>NO</option>
        <option value="1"<?php if($campos2['lc']=="1"){echo"selected";}?>>SI</option>
      </select><br>

    <label for="">F. término</label> <input type="date" id="fecha_termino_reg2" name="fecha_termino_reg2" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" value="<?php echo $campos2['fecha_termino']?>"> 
     <input name="refuerzo_dos_reg" placeholder="Refuerzo" id="refuerzo2" type="text" class="refuerzo_dis" value="<?php echo $campos2['refuerzo']?>">

     

      <select id="periodo_reg2" name="periodo_reg2" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}">
        <option value=""<?php if($campos2['periodo']==""){echo"selected";}?>>Periodo</option>
        <option value="AGOSTO 2020 - ENERO 2021" <?php if($campos2['periodo']== "AGOSTO 2020 - ENERO 2021"){echo"selected";}?>>AGOSTO 2020 - ENERO 2021</option>
        <option value="OCTUBRE 2020 - ABRIL 2021" <?php if($campos2['periodo']== "OCTUBRE 2020 - ABRIL 2021"){echo"selected";}?>>OCTUBRE 2020 - ABRIL 2021</option>
        <option value="ENERO 2021 - AGOSTO 2021" <?php if($campos2['periodo']== "ENERO 2021 - AGOSTO 2021"){echo"selected";}?>>ENERO 2021 - AGOSTO 2021</option>
        <option value="ABRIL 2021 - OCTUBRE 2021" <?php if($campos2['periodo']== "ABRIL 2021 - OCTUBRE 2021"){echo"selected";}?>>ABRIL 2021 - OCTUBRE 2021</option>
        <option value="AGOSTO 2021 - ENERO 2022" <?php if($campos2['periodo']== "AGOSTO 2021 - ENERO 2022"){echo"selected";}?>>AGOSTO 2021 - ENERO 2022</option>
        <option value="OCTUBRE 2021 - ABRIL 2022" <?php if($campos2['periodo']== "OCTUBRE 2021 - ABRIL 2022"){echo"selected";}?>>OCTUBRE 2021 - ABRIL 2022</option>
        
        <option value="ENERO 2022 - AGOSTO 2022" <?php if($campos2['periodo']== "ENERO 2022 - AGOSTO 2022"){echo"selected";}?>>ENERO 2022 - AGOSTO 2022</option>
        <option value="ABRIL 2022 - OCTUBRE 2022" <?php if($campos2['periodo']== "ABRIL 2022 - OCTUBRE 2022"){echo"selected";}?>>ABRIL 2022 - OCTUBRE 2022</option>
        <option value="AGOSTO 2022 - ENERO 2023" <?php if($campos2['periodo']== "AGOSTO 2022 - ENERO 2023"){echo"selected";}?>>AGOSTO 2022 - ENERO 2023</option>
        <option value="OCTUBRE 2022 - ABRIL 2023" <?php if($campos2['periodo']== "OCTUBRE 2022 - ABRIL 2023"){echo"selected";}?>>OCTUBRE 2022 - ABRIL 2023</option>

        <option value="ENERO 2023 - AGOSTO 2023" <?php if($campos2['periodo']== "ENERO 2023 - AGOSTO 2023"){echo"selected";}?>>ENERO 2023 - AGOSTO 2023</option>
        <option value="ABRIL 2023 - OCTUBRE 2023" <?php if($campos2['periodo']== "ABRIL 2023 - OCTUBRE 2023"){echo"selected";}?>>ABRIL 2023 - OCTUBRE 2023</option>
        <option value="AGOSTO 2023 - ENERO 2024" <?php if($campos2['periodo']== "AGOSTO 2023 - ENERO 2024"){echo"selected";}?>>AGOSTO 2023 - ENERO 2024</option>
        <option value="OCTUBRE 2023 - ABRIL 2024" <?php if($campos2['periodo']== "OCTUBRE 2023 - ABRIL 2024"){echo"selected";}?>>OCTUBRE 2023 - ABRIL 2024</option>
    </select>

     <?php
        if(isset($campos2['id_curso_asesoria']) && $campos2['id_curso_asesoria']!=null){

          if($campos2['estatus_periodo']==1){
             echo '
            <input type="button" class="btnActualizar" onclick="desactivar('.$campos2['id_curso_asesoria'].')" value="Activo">';

          }
          if($campos2['estatus_periodo']==0){  
             echo '
            <input type="button" class="btnDesactivar" onclick="activar('.$campos2['id_curso_asesoria'].')" value="Inactivo">';

          }
        
        echo '
             <input type="button" class="btnEliminar" onclick="eliminar('.$campos2['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>
    </div><br>

 <div class="border">

    <label for="">Idioma 3 </label>  
     <select name="idioms_reg3" id="idioms_reg3" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
     <option value="" >-----</option>
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos3['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }

  ?>
</select>

    <label for="">Tipo </label> 
      <select name="tipo2" id="tipo2" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción" <?php if($campos3['tipo']=="Inscripción"){echo"selected";}?>>Inscripción</option>
  <option value="Reinscripción" <?php if($campos3['tipo']=="Reinscripción"){echo"selected";}?>>Reinscripción</option>
</select>

    <label for="">Cond.</label> <select name="condicion_tres_reg" id="condicion_tres_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular"<?php if($campos3['condicion']=="Regular"){echo"selected";}?>>Regular</option>
      <option value="Recursador" <?php if($campos3['condicion']=="Recursador"){echo"selected";}?>>Recursador</option>
      <option value="Refuerzo" <?php if($campos3['condicion']=="Refuerzo"){echo"selected";}?>>Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel3" name="nivel3" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected>Selecciona</option>
      <option value="1" <?php if($campos3['nivel']=="1"){echo"selected";}?>>1</option>
      <option value="2" <?php if($campos3['nivel']=="2"){echo"selected";}?>>2</option>
      <option value="3" <?php if($campos3['nivel']=="3"){echo"selected";}?>>3</option>
      <option value="4" <?php if($campos3['nivel']=="4"){echo"selected";}?>>4</option>
      <option value="5" <?php if($campos3['nivel']=="5"){echo"selected";}?>>5</option>
      <option value="6" <?php if($campos3['nivel']=="6"){echo"selected";}?>>6</option>
      <option value="7" <?php if($campos3['nivel']=="7"){echo"selected";}?>>7</option>
      <option value="8" <?php if($campos3['nivel']=="8"){echo"selected";}?>>8</option>
      <option value="9" <?php if($campos3['nivel']=="9"){echo"selected";}?>>9</option>
      <option value="10" <?php if($campos3['nivel']=="10"){echo"selected";}?>>10</option>
      <option value="11" <?php if($campos3['nivel']=="11"){echo"selected";}?>>11</option>
      <option value="12" <?php if($campos3['nivel']=="12"){echo"selected";}?>>12</option>
      <option value="Ubicación" <?php if($campos3['nivel']=="Ubicación"){echo"selected";}?>>Ubicación</option>
      <option value="Finalizado" <?php if($campos3['nivel']=="Finalizado"){echo"selected";}?>>Finalizado</option>
    </select> 
    <label for="" >CL</label><select name="lc3" id="lc3">
        <option value="0"<?php if($campos3['lc']=="0"){echo"selected";}?>>NO</option>
        <option value="1"<?php if($campos3['lc']=="1"){echo"selected";}?>>SI</option>
      </select><br>

     <label for="">F. término</label> <input type="date" id="fecha_termino_reg3" name="fecha_termino_reg3" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" value="<?php echo $campos3['fecha_termino']?>">  
      <input name="refuerzo_tres_reg" placeholder="Refuerzo" id="refuerzo3" type="text" class="refuerzo_dis" value="<?php echo $campos3['refuerzo']?>">

      <select id="periodo_reg3" name="periodo_reg3" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}">
        <option value=""<?php if($campos3['periodo']==""){echo"selected";}?>>Periodo</option>
        <option value="AGOSTO 2020 - ENERO 2021" <?php if($campos3['periodo']== "AGOSTO 2020 - ENERO 2021"){echo"selected";}?>>AGOSTO 2020 - ENERO 2021</option>
        <option value="OCTUBRE 2020 - ABRIL 2021" <?php if($campos3['periodo']== "OCTUBRE 2020 - ABRIL 2021"){echo"selected";}?>>OCTUBRE 2020 - ABRIL 2021</option>
        <option value="ENERO 2021 - AGOSTO 2021" <?php if($campos3['periodo']== "ENERO 2021 - AGOSTO 2021"){echo"selected";}?>>ENERO 2021 - AGOSTO 2021</option>
        <option value="ABRIL 2021 - OCTUBRE 2021" <?php if($campos3['periodo']== "ABRIL 2021 - OCTUBRE 2021"){echo"selected";}?>>ABRIL 2021 - OCTUBRE 2021</option>
        <option value="AGOSTO 2021 - ENERO 2022" <?php if($campos3['periodo']== "AGOSTO 2021 - ENERO 2022"){echo"selected";}?>>AGOSTO 2021 - ENERO 2022</option>
        <option value="OCTUBRE 2021 - ABRIL 2022" <?php if($campos3['periodo']== "OCTUBRE 2021 - ABRIL 2022"){echo"selected";}?>>OCTUBRE 2021 - ABRIL 2022</option>
        
        <option value="ENERO 2022 - AGOSTO 2022" <?php if($campos3['periodo']== "ENERO 2022 - AGOSTO 2022"){echo"selected";}?>>ENERO 2022 - AGOSTO 2022</option>
        <option value="ABRIL 2022 - OCTUBRE 2022" <?php if($campos3['periodo']== "ABRIL 2022 - OCTUBRE 2022"){echo"selected";}?>>ABRIL 2022 - OCTUBRE 2022</option>
        <option value="AGOSTO 2022 - ENERO 2023" <?php if($campos3['periodo']== "AGOSTO 2022 - ENERO 2023"){echo"selected";}?>>AGOSTO 2022 - ENERO 2023</option>
        <option value="OCTUBRE 2022 - ABRIL 2023" <?php if($campos3['periodo']== "OCTUBRE 2022 - ABRIL 2023"){echo"selected";}?>>OCTUBRE 2022 - ABRIL 2023</option>

        <option value="ENERO 2023 - AGOSTO 2023" <?php if($campos3['periodo']== "ENERO 2023 - AGOSTO 2023"){echo"selected";}?>>ENERO 2023 - AGOSTO 2023</option>
        <option value="ABRIL 2023 - OCTUBRE 2023" <?php if($campos3['periodo']== "ABRIL 2023 - OCTUBRE 2023"){echo"selected";}?>>ABRIL 2023 - OCTUBRE 2023</option>
        <option value="AGOSTO 2023 - ENERO 2024" <?php if($campos3['periodo']== "AGOSTO 2023 - ENERO 2024"){echo"selected";}?>>AGOSTO 2023 - ENERO 2024</option>
        <option value="OCTUBRE 2023 - ABRIL 2024" <?php if($campos3['periodo']== "OCTUBRE 2023 - ABRIL 2024"){echo"selected";}?>>OCTUBRE 2023 - ABRIL 2024</option>
    </select>

     <?php
        if(isset($campos3['id_curso_asesoria']) && $campos3['id_curso_asesoria']!=null){

           if($campos3['estatus_periodo']==1){
             echo '
            <input type="button" class="btnActualizar" onclick="desactivar('.$campos3['id_curso_asesoria'].')" value="Activo">';

          }
          if($campos3['estatus_periodo']==0){  
             echo '
            <input type="button" class="btnDesactivar" onclick="activar('.$campos3['id_curso_asesoria'].')" value="Inactivo">';

          }
        echo '
      <input type="button" class="btnEliminar" onclick="eliminar('.$campos3['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>

    </div><br>

    <div class="border">

    <label for="">Idioma 4 </label>  
 <select  name="idioms_reg4" id="idioms_reg4" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" >-----</option>
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos4['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }
  ?>

</select>

    <label for="">Tipo </label> 
        <select name="tipo3" id="tipo3" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción" <?php if($campos4['tipo']=="Inscripción"){echo"selected";}?>>Inscripción</option>
  <option value="Reinscripción" <?php if($campos4['tipo']=="Reinscripción"){echo"selected";}?>>Reinscripción</option>
</select>
    <label for="">Cond.</label> <select name="condicion_cuatro_reg" id="condicion_cuatro_reg">
    <option value="" selected>Selecciona</option>
      <option value="Regular"<?php if($campos4['condicion']=="Regular"){echo"selected";}?>>Regular</option>
      <option value="Recursador" <?php if($campos4['condicion']=="Recursador"){echo"selected";}?>>Recursador</option>
      <option value="Refuerzo" <?php if($campos4['condicion']=="Refuerzo"){echo"selected";}?>>Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel4" name="nivel4" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected>Selecciona</option>
      <option value="1" <?php if($campos4['nivel']=="1"){echo"selected";}?>>1</option>
      <option value="2" <?php if($campos4['nivel']=="2"){echo"selected";}?>>2</option>
      <option value="3" <?php if($campos4['nivel']=="3"){echo"selected";}?>>3</option>
      <option value="4" <?php if($campos4['nivel']=="4"){echo"selected";}?>>4</option>
      <option value="5" <?php if($campos4['nivel']=="5"){echo"selected";}?>>5</option>
      <option value="6" <?php if($campos4['nivel']=="6"){echo"selected";}?>>6</option>
      <option value="7" <?php if($campos4['nivel']=="7"){echo"selected";}?>>7</option>
      <option value="8" <?php if($campos4['nivel']=="8"){echo"selected";}?>>8</option>
      <option value="9" <?php if($campos4['nivel']=="9"){echo"selected";}?>>9</option>
      <option value="10" <?php if($campos4['nivel']=="10"){echo"selected";}?>>10</option>
      <option value="11" <?php if($campos4['nivel']=="11"){echo"selected";}?>>11</option>
      <option value="12" <?php if($campos4['nivel']=="12"){echo"selected";}?>>12</option>
      <option value="Ubicación" <?php if($campos4['nivel']=="Ubicación"){echo"selected";}?>>Ubicación</option>
      <option value="Finalizado" <?php if($campos4['nivel']=="Finalizado"){echo"selected";}?>>Finalizado</option>
    </select> 
    <label for="" >CL</label><select name="lc4" id="lc4">
        <option value="0" <?php if($campos4['lc']=="0"){echo"selected";}?> >NO</option>
        <option value="1" <?php if($campos4['lc']=="1"){echo"selected";}?> >SI</option>
      </select><br>

    <label for="">F. término</label> <input type="date" id="fecha_termino_reg4" name="fecha_termino_reg4" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" value="<?php echo $campos4['fecha_termino']?>"> 
     <input name="refuerzo_cuatro_reg" placeholder="Refuerzo" id="refuerzo4" type="text" class="refuerzo_dis" value="<?php echo $campos4['refuerzo']?>"> 

      <select id="periodo_reg4" name="periodo_reg4" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}" >
        <option value=""<?php if($campos4['periodo']==""){echo"selected";}?>>Periodo</option>
        <option value="AGOSTO 2020 - ENERO 2021" <?php if($campos4['periodo']== "AGOSTO 2020 - ENERO 2021"){echo"selected";}?>>AGOSTO 2020 - ENERO 2021</option>
        <option value="OCTUBRE 2020 - ABRIL 2021" <?php if($campos4['periodo']== "OCTUBRE 2020 - ABRIL 2021"){echo"selected";}?>>OCTUBRE 2020 - ABRIL 2021</option>
        <option value="ENERO 2021 - AGOSTO 2021" <?php if($campos4['periodo']== "ENERO 2021 - AGOSTO 2021"){echo"selected";}?>>ENERO 2021 - AGOSTO 2021</option>
        <option value="ABRIL 2021 - OCTUBRE 2021" <?php if($campos4['periodo']== "ABRIL 2021 - OCTUBRE 2021"){echo"selected";}?>>ABRIL 2021 - OCTUBRE 2021</option>
        <option value="AGOSTO 2021 - ENERO 2022" <?php if($campos4['periodo']== "AGOSTO 2021 - ENERO 2022"){echo"selected";}?>>AGOSTO 2021 - ENERO 2022</option>
        <option value="OCTUBRE 2021 - ABRIL 2022" <?php if($campos4['periodo']== "OCTUBRE 2021 - ABRIL 2022"){echo"selected";}?>>OCTUBRE 2021 - ABRIL 2022</option>
        
        <option value="ENERO 2022 - AGOSTO 2022" <?php if($campos4['periodo']== "ENERO 2022 - AGOSTO 2022"){echo"selected";}?>>ENERO 2022 - AGOSTO 2022</option>
        <option value="ABRIL 2022 - OCTUBRE 2022" <?php if($campos4['periodo']== "ABRIL 2022 - OCTUBRE 2022"){echo"selected";}?>>ABRIL 2022 - OCTUBRE 2022</option>
        <option value="AGOSTO 2022 - ENERO 2023" <?php if($campos4['periodo']== "AGOSTO 2022 - ENERO 2023"){echo"selected";}?>>AGOSTO 2022 - ENERO 2023</option>
        <option value="OCTUBRE 2022 - ABRIL 2023" <?php if($campos4['periodo']== "OCTUBRE 2022 - ABRIL 2023"){echo"selected";}?>>OCTUBRE 2022 - ABRIL 2023</option>

        <option value="ENERO 2023 - AGOSTO 2023" <?php if($campos4['periodo']== "ENERO 2023 - AGOSTO 2023"){echo"selected";}?>>ENERO 2023 - AGOSTO 2023</option>
        <option value="ABRIL 2023 - OCTUBRE 2023" <?php if($campos4['periodo']== "ABRIL 2023 - OCTUBRE 2023"){echo"selected";}?>>ABRIL 2023 - OCTUBRE 2023</option>
        <option value="AGOSTO 2023 - ENERO 2024" <?php if($campos4['periodo']== "AGOSTO 2023 - ENERO 2024"){echo"selected";}?>>AGOSTO 2023 - ENERO 2024</option>
        <option value="OCTUBRE 2023 - ABRIL 2024" <?php if($campos4['periodo']== "OCTUBRE 2023 - ABRIL 2024"){echo"selected";}?>>OCTUBRE 2023 - ABRIL 2024</option>
    </select>

     <?php
        if(isset($campos4['id_curso_asesoria']) && $campos4['id_curso_asesoria']!=null){

           if($campos4['estatus_periodo']==1){
             echo '
            <input type="button" class="btnActualizar" onclick="desactivar('.$campos4['id_curso_asesoria'].')" value="Activo">';

          }
          if($campos4['estatus_periodo']==0){  
             echo '
            <input type="button" class="btnDesactivar" onclick="activar('.$campos4['id_curso_asesoria'].')" value="Inactivo">';

          }
      echo '
     <input type="button" class="btnEliminar" onclick="eliminar('.$campos4['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>
    </div><br>

    <label for="">Dependencia: </label><select id="nivel" name="dependencia" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" required>
      <option value="Estudiante UNACH" <?php if($campos['dependencia']=="Estudiante UNACH"){echo"selected";}?>>Estudiante UNACH</option>
      <option value="Maestrante/Doctorante UNACH"<?php if($campos['dependencia']=="Maestrante/Doctorante UNACH"){echo"selected";}?>>Maestrante/Doctorante UNACH</option>
      <option value="SPAUNACH" <?php if($campos['dependencia']=="SPAUNACH"){echo"selected";}?>>SPAUNACH</option>
      <option value="STAUNACH" <?php if($campos['dependencia']=="STAUNACH"){echo"selected";}?>>STAUNACH</option>
      <option value="Particulares" <?php if($campos['dependencia']=="Particulares"){echo"selected";}?>>Particulares</option>
      <option value="Escasos recursos" <?php if($campos['dependencia']=="Escasos recursos"){echo"selected";}?>>Escasos recursos</option>
      <option value="Confianza, Docentes no afiliados" <?php if($campos['dependencia']=="Confianza, Docentes no afiliados"){echo"selected";}?>>Confianza, Docentes no afiliados</option>
      <option value="Conversación" <?php if($campos['dependencia']=="Conversación"){echo"selected";}?>>Conversación Depto.</option>
      <option value="Becario" <?php if($campos['dependencia']=="Becario"){echo"selected";}?>>Becario</option>
    </select>
    <label for="">Matricula </label><input name="matricula_dependencia" type="text" pattern="[a-z A-Z 0-9 ,]{2,20}" value="<?php echo $campos['matricula']?>"> 
   
    
    <br>
 
<div id="elegir_carrera">
    <label for="">Carrera</label> <select id="carrera_unach" name="carrera_unach">
       <option value="0" selected> Selecciona</option>
      <?php  
    foreach ($carreras as $i) {
    echo'<option value="'.$i['id_carrera_unach'].'" ';
   if($i['id_carrera_unach']==$campos['carrera_unach'])
   {echo"selected";}
   echo ">".$i['nombre_carrera_unach']."</option>";
    }
  ?>
    </select> </div>
    <label for="">Observaciones </label><input name="observaciones_reg" id="observaciones_reg" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}" value="<?php echo $campos['observaciones']?>">
    <br><br>  
    </div>
    
    <br>
    
    </div> <br> <br>
    <input type="submit" class="btns" id="btn_alt" value="Actualizar"><br><br>
        </form>

        <?php } }else{ ?>
        <br><br>
        <div class="alert_error"><br>
          <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt="">
          <p class="errorSub1">¡Ocurrió un error inesperado!</p>
          <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

        </div>
        <?php } ?>
        <br>
        <br>

</div> 
</div> 


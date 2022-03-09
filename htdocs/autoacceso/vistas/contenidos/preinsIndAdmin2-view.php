
<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2){
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

 <div class="g3">
     
  
    <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>listaPreinscritos/"><input type="button" class="btns2" value="Lista de solicitudes"></a>
      <a href="<?php echo SERVERURL; ?>buscarPreinscrito/"><input type="button" class="btns2" value="Buscar solicitud"></a> 
      </div>
   <br>
  
   
 <div class="formContainer4">
          <?php 

            require_once "./controladores/preinscritoControlador.php";
            
            
            $ins_preinscrito =  new preinscritoControlador();
            $ins_preinscrito2 =  new preinscritoControlador();
            

            $datos_preinscrito = $ins_preinscrito->datos_preinscrito_controlador("Unico",$pagina[1]);
            $datos2=$ins_preinscrito2->datos_carreras_unach_controlador();
            
            if($datos2->rowCount()>=1){
              $carreras=$datos2->fetchAll();
 
          if($datos_preinscrito->rowCount()>=1){
            
             $campos = $datos_preinscrito->fetch();
            $campos2 = $datos_preinscrito->fetch();
            $campos3 = $datos_preinscrito->fetch();
            $campos4 = $datos_preinscrito->fetch();
           // $des=$ins_preinscrito->desencriptar_controlador($campos['password']);
            
           ?>
<form class="FormularioAjax" id="fAjax" action="<?php echo SERVERURL;?>ajax/cursoAjax.php" method="POST" data-form="delete">
  
  <input type="submit" id="eliminarIdSubm" class="btns" value="Inscribir" style="display:none;"><input type="hidden" name="eliminarId" id="eliminarId">
</form>

<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alumnoAjax.php" method="POST" data-form="save">

      <input type="hidden" name="id_curso" value=" <?php echo $campos['id_curso_asesoria'];?> ">
    <input type="hidden" name="id_curso2" value=" <?php echo $campos2['id_curso_asesoria'];?> "> 
    <input type="hidden" name="id_curso3" value=" <?php echo $campos3['id_curso_asesoria'];?> ">
    <input type="hidden" name="id_curso4" value=" <?php echo $campos4['id_curso_asesoria'];?> "> 

<input type="hidden" name="preins_id_decrypt" value=" <?php echo $pagina[1]; ?> "> 

    <div id="pre_admin">
       <div class="g-medio3" id="formContainer6">
  <h3>(Llenado por el alumno)</h3>
  <label for="">Nombre (s): </label>
  <input type="text" class="txtBox" name="nombre_preins_reg" placeholder="ej:Ana" required="" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" value="<?php echo $campos['nombre']; ?>">
  
  <label for="">Apellido paterno:</label> 
  <input type="text" class="txtBox" required="" name="apellido_paterno_reg" placeholder="ej:Díaz" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" value="<?php echo $campos['apellido_paterno']; ?>"><br>

  <label for="">Apellido materno:</label>
  <input type="text" class="txtBox" required="" name="apellido_materno_reg" placeholder="ej:Ruiz" minlength="1" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}" value="<?php echo $campos['apellido_materno']; ?>">
  
    <label for="">CURP:</label> <input maxlength="18" minlength="18" type="text" name="curp_alumno_reg" placeholder="18 Dígitos" class="txtBox" required="" pattern="[a-zA-Z0-9]{18,18}" value="<?php echo $campos['curp']; ?>"><br>
    <label for="">Fecha de nacimiento</label> 
    <input type="text" id="fecha_nacimiento_ins_reg" name="fecha_nacimiento_ins_reg" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" max="2007-12-31" value="<?php echo date('d-m-Y',strtotime($campos['fecha_nacimiento'])); ?>">
    <label for="">Teléfono:</label> <input maxlength="10" minlength="10" type="text" name="tel_reg" placeholder="10 Dígitos" class="txtBox" required="" pattern="[0-9]{10,10}" value="<?php echo $campos['telefono']; ?>"> <br>
    <label for="">Email: </label> <input type="email" class="txtBox" minlength="5" maxlength="100" pattern="[a-z0-9@._/-]{5,100}" name="correo_reg" placeholder="ejemplo@email.com" value="<?php echo $campos['correo']; ?>">
    <label for="">Calle: </label> <input type="text"class="txtBox" name="calle_reg" required="" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" placeholder="ej:2a oriente" value="<?php echo $campos['calle']; ?>"><br>
    <label for="">Número: </label> <input type="text" class="txtBox" name="num_reg" required="" minlength="1" maxlength="5" pattern="[0-9]{1,5}" placeholder="ej:182" value="<?php echo $campos['numero']; ?>">
    <label for="">Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_ins_Reg" class="txtBox" required="" pattern="[0-9]{5,5}" placeholder="5 dígitos" value="<?php echo $campos['cp']; ?>"><br> 
    <label for="">Colonia: </label> <input type="text" class="txtBox" name="col_reg" required="" minlength="2" maxlength="100" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}" placeholder="ej: Centro" value="<?php echo $campos['colonia']; ?>">
    <label for="">Municipio: </label> <input type="text" class="txtBox" name="municipio_ins_Reg" required="" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" placeholder="municipio" value="<?php echo $campos['municipio']; ?>" readonly><br>
    <label for="">Estado: </label> <input type="text" class="txtBox" required="" name="estado_ins_Reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Estado" value="<?php echo $campos['estado']; ?>" readonly>
    <label for="">Sexo:</label><input type="text" class="txtBox" required="" name="sexo_ins_Reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Sexo" value="<?php echo $campos['sexo']; ?>">
    <!--label for="">Contraseña:</label <input type="hidden" class="txtBox" required="" name="pass_reg" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Contraseña" value="<?php echo $campos['password'];?>"> -->

    </div>

    <div class="g-medio2_6" id="formContainer5">

      <h3>Inscripciones (Llenado por la administración)</h3>
 
    <div class="border">

     <label for="">Idioma 1 </label>  
<select id="idioms_reg" name="idioms_reg" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }
  ?>
</select>
<label for="">Nivel </label><select id="nivel1" name="nivel1" required pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected  <?php if($campos['nivel']=="1"){echo"selected";}?>>Selecciona</option>
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
    </select> 

    <label for="">Tipo </label> 
<select name="tipo_preins_reg" id="tipo_preins_reg" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="Inscripción" <?php if($campos['tipo']=="Inscripción"){echo"selected";}?> >Inscripción</option>
  <option value="Reinscripción" <?php if($campos['tipo']=="Reinscripción"){echo"selected";}?> >Reinscripción</option>
</select>

    <label for="">Cond.</label> <select name="condicion_uno_reg" id="condicion_uno_reg" required>
    <option value="" selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador" >Recursador</option>
      <option value="Refuerzo" >Refuerzo</option>
    </select>
    
     <label for="">F. término</label> <input type="date" id="fecha_termino_reg1" name="fecha_termino_reg1"  class="txtBox" min="1940-01-01" value=""> 
     <label for="" >Refuerzo</label> <input name="refuerzo_uno_reg" id="refuerzo1" maxlength="50" type="text" class="refuerzo_dis">
      <label for="" >CL</label><select name="lc1" id="lc1">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
      

    </div>

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
<label for="">Nivel </label><select id="nivel2" name="nivel2" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected <?php if($campos2['nivel']==""){echo"selected";}?>>Selecciona</option>
      <option value="1"<?php if($campos2['nivel']=="1"){echo"selected";}?>>1</option>
      <option value="2"<?php if($campos2['nivel']=="2"){echo"selected";}?>>2</option>
      <option value="3"<?php if($campos2['nivel']=="3"){echo"selected";}?>>3</option>
      <option value="4"<?php if($campos2['nivel']=="4"){echo"selected";}?>>4</option>
      <option value="5"<?php if($campos2['nivel']=="5"){echo"selected";}?>>5</option>
      <option value="6"<?php if($campos2['nivel']=="6"){echo"selected";}?>>6</option>
      <option value="7"<?php if($campos2['nivel']=="7"){echo"selected";}?>>7</option>
      <option value="8"<?php if($campos2['nivel']=="8"){echo"selected";}?>>8</option>
      <option value="9"<?php if($campos2['nivel']=="9"){echo"selected";}?>>9</option>
      <option value="10"<?php if($campos2['nivel']=="10"){echo"selected";}?>>10</option>
      <option value="11"<?php if($campos2['nivel']=="11"){echo"selected";}?>>11</option>
      <option value="12"<?php if($campos2['nivel']=="12"){echo"selected";}?>>12</option>
      <option value="Ubicación"<?php if($campos2['nivel']=="Ubicación"){echo"selected";}?>>Ubicación</option>
    </select> 

    <label for="">Tipo </label> <!--<input type="text" name="tipo1" id="tipo1" class="tip" value="<?php echo $campos['tipo_dos']; ?>"> -->
    <select name="tipo1" id="tipo1" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" <?php if($campos['tipo_dos']==""){echo"selected";}?> >-----</option>
  <option value="Inscripción" <?php if($campos2['tipo']=="Inscripción"){echo"selected";}?> >Inscripción</option>
  <option value="Reinscripción" <?php if($campos2['tipo']=="Reinscripción"){echo"selected";}?> >Reinscripción</option>
</select>

    <label for="">Cond.</label> <select name="condicion_dos_reg" id="condicion_dos_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
    
    <label for="">F. término</label> <input type="date" id="fecha_termino_reg2" name="fecha_termino_reg2" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01"> 
    <label for="" >Refuerzo</label> <input name="refuerzo_dos_reg" id="refuerzo2" maxlength="50" type="text" class="refuerzo_dis">
    <label for="" >CL</label><select name="lc2" id="lc2">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
  <?php
        if(isset($campos2['id_curso_asesoria']) && $campos2['id_curso_asesoria']!=null){
echo '
     <input type="button" class="btnEliminar" onclick="eliminar('.$campos2['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>
       
    </div>
 <div class="border">

    <label for="">Idioma 3 </label>  
     <select name="idioms_reg3" id="idioms_reg3" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" <?php if($campos3['tipo_tres']==""){echo"selected";}?>>-----</option>
      <?php  
    foreach ($_SESSION['idiomas'] as $i) {
    echo'<option value="'.$i['id_idioma'].'" ';
   if($i['id_idioma']==$campos3['id_idioma'])
   {echo"selected";}
   echo ">".$i['etiqueta_idioma']."</option>";
    }
  ?>
</select>

 <label for="">Nivel </label><select id="nivel3" name="nivel3" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected <?php if($campos3['nivel']==""){echo"selected";}?>>Selecciona</option>
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
    </select> 

    <label for="">Tipo </label> 
      <select name="tipo2" id="tipo2" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" <?php if($campos3['tipo_tres']==""){echo"selected";}?> >-----</option>
  <option value="Inscripción" <?php if($campos3['tipo']=="Inscripción"){echo"selected";}?> >Inscripción</option>
  <option value="Reinscripción" <?php if($campos3['tipo']=="Reinscripción"){echo"selected";}?> >Reinscripción</option>
</select>

    <label for="">Cond.</label> <select name="condicion_tres_reg" id="condicion_tres_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
   
     <label for="">F. término</label> <input type="date" id="fecha_termino_reg3" name="fecha_termino_reg3" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01">  
     <label for="" >Refuerzo</label> <input name="refuerzo_tres_reg" id="refuerzo3" maxlength="50" type="text" class="refuerzo_dis">
     <label for="" >CL</label><select name="lc3" id="lc3">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
        <?php
        if(isset($campos3['id_curso_asesoria']) && $campos3['id_curso_asesoria']!=null){
echo '
     <input type="button" class="btnEliminar" onclick="eliminar('.$campos3['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>
    </div>

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

    <label for="">Nivel </label><select id="nivel4" name="nivel4" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected <?php if($campos4['nivel']==""){echo"selected";}?>>Selecciona</option>
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
    </select>

    <label for="">Tipo </label> 
        <select name="tipo3" id="tipo3" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" <?php if($campos4['tipo_cuatro']==""){echo"selected";}?> >-----</option>
  <option value="Inscripción" <?php if($campos4['tipo']=="Inscripción"){echo"selected";}?> >Inscripción</option>
  <option value="Reinscripción" <?php if($campos4['tipo']=="Reinscripción"){echo"selected";}?> >Reinscripción</option>
</select>
    <label for="">Cond.</label> <select name="condicion_cuatro_reg" id="condicion_cuatro_reg">
    <option value="" selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
 
    <label for="">F. término</label> <input type="date" id="fecha_termino_reg4" name="fecha_termino_reg4" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01"> 
    <label for="" >Refuerzo</label> <input name="refuerzo_cuatro_reg" id="refuerzo4" maxlength="50" type="text" class="refuerzo_dis"> 
    <label for="" >CL</label><select name="lc4" id="lc4">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
    <?php
        if(isset($campos4['id_curso_asesoria']) && $campos4['id_curso_asesoria']!=null){
      echo '
     <input type="button" class="btnEliminar" onclick="eliminar('.$campos4['id_curso_asesoria'].')" value="Eliminar">';
        } 
         ?>
    </div>

    <label for="">Dependencia: </label><select id="nivel" name="dependencia" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" required>
       <option value="" <?php if($campos['dependencia']==""){echo"selected";}?>>Selecciona</option>
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
    <label for="">Matricula </label><input name="matricula_dependencia" type="text" minlength="2" maxlength="20" pattern="[a-z A-Z 0-9 ,]{2,20}" value="<?php echo $campos['matricula'];?>"> 
   
    <label for="">Periodo </label>
    <select id="periodo_reg" name="periodo_reg" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}" required>
       <option value="" selected>Selecciona</option>
		<option value="ENERO 2021 - AGOSTO 2021">ENERO 2021 - AGOSTO 2021</option>
		<option value="ABRIL 2021 - OCTUBRE 2021">ABRIL 2021 - OCTUBRE 2021</option>
		<option value="AGOSTO 2021 - ENERO 2022">AGOSTO 2021 - ENERO 2022</option>
		<option value="OCTUBRE 2021 - ABRIL 2022">OCTUBRE 2021 - ABRIL 2022</option>
    </select>
    <br>
 
<div id="elegir_carrera">
    <label for="">Carrera</label> <select id="carrera_unach" name="carrera_unach">
       <option value="0" selected> Selecciona</option>
      <?php  
    foreach ($carreras as $i) {
    echo'<option value="'.$i['id_carrera_unach'].'" ';
   if($i['id_carrera_unach']==$carreras['id_carrera_unach'])
   {echo"selected";}
   echo ">".$i['nombre_carrera_unach']."</option>";
    }
  ?>
    </select> </div>
    <label for="">Observaciones </label><input name="observaciones_reg" id="observaciones_reg" minlength="2" maxlength="100" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}">
    <br>
    </div>


     <br> 

    <div class="btns_ins_admin">
    <!--<a href="" ><input type="submit" class="btns" value="Actualizar datos y guardar"></a>-->
    <input type="submit" class="btns" id="btn_alt" value="Inscribir"><br><br>
    </div>
    </div>
    </div>

      </div>
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


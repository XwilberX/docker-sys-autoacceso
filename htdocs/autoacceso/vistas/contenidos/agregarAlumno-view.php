<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=4){
  
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
       
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alumnoAjax.php" method="POST" data-form="save">
	<div class="formContainer4">
	<p style="font-weight: bold;">Agregar a la lista de inscritos</p>
  <p>Todos los campos marcados con un asterisco son obligatorios</p>
  <div class="g-medio1_2" id="formContainer6">
   
<label for="">*Nombre (s): </label>
  <input type="text" class="txtBox" name="nombre_nvoAlu_reg" placeholder="ej:Ana" required minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}">
  
  <label for="">*Apellido paterno:</label> 
  <input type="text" class="txtBox" required name="apellido_paterno_reg" placeholder="ej:Díaz" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}"><br>

  <label for="">*Apellido materno:</label>
  <input type="text" class="txtBox" required name="apellido_materno_reg" placeholder="ej:Ruiz" minlength="1" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}">
  
     <label for="">*CURP:</label> <input maxlength="18" minlength="18" type="text" name="curp_alumno_reg" placeholder="18 Dígitos" class="txtBox" required pattern="[a-zA-Z0-9]{18,18}"><br>
    <label for="">*Fecha de nacimiento</label> 
    <input type="date" name="fecha_nacimiento_ins_reg" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" max="  2007-12-31">   
    <label for="">*Teléfono:</label> <input maxlength="10" minlength="10" type="text" name="tel_reg" placeholder="10 Dígitos" class="txtBox" required pattern="[0-9]{10,10}"> <br>
    <label for="">*Correo personal: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_reg" placeholder="ejemplo@email.com" required>
    <label for="">Correo UNACH: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_unach_reg" placeholder="ejemplo@unach.mx"><br>
          <label for="">*Sexo:</label> 
      <select id="sex_preins_reg" name="sex_preins_reg" pattern="[a-z]{8,9}" required>
        <option value="" selected>Selecciona</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select><br>
    <label for="">*Residencia:</label> 
      <select id="residencia" name="residencia" pattern="[a-z]{8,9}" required>
        <option value="" selected>Selecciona</option>
         <option value="Nacional">Nacional</option><br>
        <option value="Extranjero">Extranjero</option>
      </select>

<br>
<div id="residencia_datos">
  <label for="">///DOMICILIO/// </label>
    <label for="">Calle: </label> <input type="text"class="txtBox" name="calle_reg" maxlength="50" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}" placeholder="ej:2a oriente">
    <label for="">Número: </label> <input type="text" class="txtBox" name="num_reg" maxlength="5" pattern="[0-9]{0,5}" placeholder="ej:182"><br>
    <label for="">*Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_ins_Reg" id="cp_ins_Reg" class="txtBox"  pattern="[0-9]{5,5}" placeholder="5 dígitos">

    <label for="">*Colonia: </label> 
    <select id="col_reg" name="col_reg" >
      <option value="" selected>Selecciona</option>
    </select>
<br>
    <label for="">*Municipio: </label> <input type="text" class="txtBox" name="municipio_ins_Reg" id="municipio_ins_Reg" minlength="2" maxlength="50"  pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" placeholder="municipio" readonly="">
    <label for="">*Estado: </label> <input type="text" class="txtBox"  name="estado_ins_Reg" id="estado_ins_Reg" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Estado" readonly=""> </div>

   

<label for="password">*Contraseña</label> 
<input id="pass1" minlength="6" maxlength="30" class="txtBox" type="password" name="pass_reg" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-zñÑ0-9$@.-]{6,30}"><img id="eye_boton1" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña1();">
<label for="">*Confirmar</label> 
<input id="pass2" minlength="6" maxlength="30" class="txtBox" type="password" name="pass2_reg" required="" pattern="[A-Za-zñÑ0-9$@.-]{6,30}" placeholder="mínimo 6 dígitos"><img id="eye_boton2" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña2();"><br>
    </div>

    <div class="g-medio2_5" id="formContainer5">

     <br> 
 
    <div class="border">

     <label for="">*Idioma 1 </label>  
<select id="idioms_reg" name="idioms_nvoAlu_reg" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}" required>
  <option value="" selected >Selecciona</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarin</option>
  <option value="6">Español</option>
</select>

    <label for="">*Tipo </label> 
<select name="tipo_preins_reg" id="tipo_preins_reg" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}" required>
  <option value="" selected >Selecciona</option>
  <option value="Inscripción" >Inscripción</option>
  <option value="Reinscripción" >Reinscripción</option>
</select>

    <label for="">*Cond.</label> <select name="condicion_uno_reg" id="condicion_uno_reg" required>
    <option value="" selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador" >Recursador</option>
      <option value="Refuerzo" >Refuerzo</option>
    </select>
    <label for="">*Nivel </label><select id="nivel1" name="nivel1" required pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select> 
     <label for="">F. término</label> <input type="date" id="fecha_termino_reg1" name="fecha_termino_reg1" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01"> 
     <label for="" >Refuerzo</label> <input name="refuerzo_uno_reg" id="refuerzo1" type="text" class="refuerzo_dis" minlength="2" maxlength="50">
  
  <label for="" >CL</label><select name="lc1" id="lc1">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>

    </div>

    <div class="border">

   <label for="">Idioma 2 </label> 
 <select  name="idioms_reg2" id="idioms_reg2" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected>Selecciona</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarin</option>
  <option value="6">Español</option>
</select>

    <label for="">Tipo</label><select name="tipo1" id="tipo1" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
</select>

  <label for="">Cond.</label> <select name="condicion_dos_reg" id="condicion_dos_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel2" name="nivel2" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected>Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select> 
    <label for="">F. término</label> <input type="date" id="fecha_termino_reg2" name="fecha_termino_reg2" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01"> 
    <label for="" >Refuerzo</label> <input name="refuerzo_dos_reg" id="refuerzo2" type="text" class="refuerzo_dis" minlength="2" maxlength="50">
    <label for="" >CL</label><select name="lc2" id="lc2">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
    </div>

 <div class="border">

    <label for="">Idioma 3 </label>  
     <select name="idioms_reg3" id="idioms_reg3" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
      <option value="" selected>Selecciona</option>
  <option value="1" >Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarin</option>
  <option value="6">Español</option>
</select>

    <label for="">Tipo </label> 
      <select name="tipo2" id="tipo2" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
</select>

    <label for="">Cond.</label> <select name="condicion_tres_reg" id="condicion_tres_reg">
    <option value=""selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel3" name="nivel3" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected>Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select> 
     <label for="">F. término</label> <input type="date" id="fecha_termino_reg3" name="fecha_termino_reg3" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01">  
     <label for="" >Refuerzo</label> <input name="refuerzo_tres_reg" id="refuerzo3" type="text" class="refuerzo_dis" minlength="2" maxlength="50">
     <label for="" >CL</label><select name="lc3" id="lc3">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
    </div>

    <div class="border">

    <label for="">Idioma 4 </label>  
 <select  name="idioms_reg4" id="idioms_reg4" class="idiom" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected>Selecciona</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarin</option>
  <option value="6">Español</option>
</select>

    <label for="">Tipo </label> 
        <select name="tipo3" id="tipo3" class="tip" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
<option value="" selected>Selecciona</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
</select>
    <label for="">Cond.</label> <select name="condicion_cuatro_reg" id="condicion_cuatro_reg">
    <option value="" selected>Selecciona</option>
      <option value="Regular">Regular</option>
      <option value="Recursador">Recursador</option>
      <option value="Refuerzo">Refuerzo</option>
    </select>
    <label for="">Nivel </label><select id="nivel4" name="nivel4" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value=""selected>Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select> 
    <label for="">F. término</label> <input type="date" id="fecha_termino_reg4" name="fecha_termino_reg4" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01"> 
    <label for="" >Refuerzo</label> <input name="refuerzo_cuatro_reg" id="refuerzo4" type="text" class="refuerzo_dis" minlength="2" maxlength="50"> 
    <label for="" >CL</label><select name="lc4" id="lc4">
        <option value="0">NO</option>
        <option value="1">SI</option>
      </select>
    </div>

    <label for="">Dependencia: </label><select id="nivel" name="dependencia" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" required>
       <option value="" selected>Selecciona</option>
      <option value="Estudiante UNACH">Estudiante UNACH</option>
      <option value="SPAUNACH">SPAUNACH</option>
      <option value="STAUNACH">STAUNACH</option>
      <option value="Particulares">Particulares</option>
      <option value="Escasos recursos">Escasos recursos</option>
      <option value="Confianza, Docentes no afiliados">Confianza, Docentes no afiliados</option>
      <option value="Conversación">Conversación Depto.</option>
      <option value="Becario">Becario</option>
    </select>
    <label for="">Matricula </label><input name="matricula_dependencia" type="text" minlength="2" maxlength="20" pattern="[a-z A-Z 0-9 ,]{2,20}"> 
    
    <label for="">Periodo </label>
    <select id="periodo_reg" name="periodo_reg" pattern="[A-Z ÁÉÍÓÚÑ 0-9]{2,30}" required>
       <option value="" selected>Selecciona</option>
      <option value="AGOSTO <?php echo date("Y")?> - ENERO <?php echo date("Y",strtotime("next Year"))?>">AGOSTO <?php echo date("Y")?> - ENERO <?php echo date("Y",strtotime("next Year"))?></option>
      <option value="OCTUBRE <?php echo date("Y")?> - ABRIL <?php echo date("Y",strtotime("next Year"))?>">OCTUBRE <?php echo date("Y")?> - ABRIL <?php echo date("Y",strtotime("next Year"))?></option>
      <option value="ENERO <?php echo date("Y",strtotime("next Year"))?> - AGOSTO <?php echo date("Y",strtotime("next Year"))?>">ENERO <?php echo date("Y",strtotime("next Year"))?> - AGOSTO <?php echo date("Y",strtotime("next Year"))?></option>
      <option value="ABRIL <?php echo date("Y",strtotime("next Year"))?> - OCTUBRE <?php echo date("Y",strtotime("next Year"))?>">ABRIL <?php echo date("Y",strtotime("next Year"))?> - OCTUBRE <?php echo date("Y",strtotime("next Year"))?></option>
    </select>
    <br>
 
<div id="elegir_carrera">
    <label for="">Carrera</label> <select id="carrera_unach" name="carrera_unach">
       <option value="0" selected> Selecciona</option>
      <?php  
       require_once "./controladores/preinscritoControlador.php";
 $ins_preinscrito2 =  new preinscritoControlador();
$datos2=$ins_preinscrito2->datos_carreras_unach_controlador();
 if($datos2->rowCount()>=1){
              $carreras=$datos2->fetchAll();
    foreach ($carreras as $i) {
    echo'<option value="'.$i['id_carrera_unach'].'" ';
   if($i['id_carrera_unach']==$carreras['id_carrera_unach'])
   {echo"selected";}
   echo ">".$i['nombre_carrera_unach']."</option>";
    }
  }
  ?>
    </select> </div>
    <label for="">Observaciones </label><input name="observaciones_reg" id="observaciones_reg" minlength="2" maxlength="100" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}">
    <br>
    </div>
    <div class="btns_ins_admin">
    <!--<a href="" ><input type="submit" class="btns" value="Actualizar datos y guardar"></a>-->
    <input type="submit" class="btns" id="btn_alt" value="Inscribir"><br><br>
    </div>

</form>

</div>


	  </div>  

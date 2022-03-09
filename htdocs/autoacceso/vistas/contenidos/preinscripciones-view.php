  <style>
  
#nF{
 display: flex;
  flex-direction: column;
  height:55vh;
  margin: 0;
  align-content: center;
  justify-content: center;
}

#nF h2{
  color:#203552;
  font-size: 3.5vmax;
}

#nF label{
  color:#203552;
  font-size: 2.5vmax;
}

</style>


 <div class="g3" id="select_idioma">
	  
	<div class="formContainer4">

<p>Selecciona tu tipo de inscripción</p>
<select name="" id="selectTipoPreins">
  <option value="0">Selecciona</option>
  <option value="1">Nuevo ingreso</option>
  <option value="2">Reinscripción</option>
</select><br>
<!-- <p class="pBold" id="anuncioReinscripcion">El proceso de REINSCRIPCIÓN estará habilitado a partir del próximo lunes.</p> -->
<div id="preinsFormGeneral">
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/preinscritoAjax.php" method="POST" data-form="save" >
	<h2>Preinscripciones</h2><p>Todos los campos marcados con un asterisco son obligatorios</p><p class="pBold">(Recuerda que cada idioma se cobra por separado)</p>

	<label for="">*Nombre (s): </label>
	<input type="text" class="txtBox" name="nombre_preins_reg" placeholder="ej:Ana" required="" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}">
	
	<label for="">*Apellido paterno:</label> 
	<input type="text" class="txtBox" required="" name="apellido_paterno_reg" placeholder="ej:Díaz" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}">

	<label for="">*Apellido materno:</label>
	<input type="text" class="txtBox" required="" name="apellido_materno_reg" placeholder="ej:Ruiz" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}">
	
	

<div id="seleccionar_idioma" class="seleccionar_idioma">
	<label for="">*Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg"  required pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>

<label for="">*Tipo</label>
<select id="idiomas" name="tipo_preins_reg"  required pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>

    <label for="">*Nivel </label><select id="nivel1" name="nivel1" required pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="Ubicación">Ubicación</option>
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
    </select> 

 	<label class="pBold">¿Deseas agregar otro idioma?</label>
	<input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar();">
	<input type="button" class="btns_preins" value="No" onclick="idioma_ocultar();"><br>

<div id="seleccionar_idioma1" class="seleccionar_idioma">
	<label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg2" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected>Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>

<label for="">Tipo</label>
<select id="idiomas" name="tipo1" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>

     <label for="">Nivel </label><select id="nivel2" name="nivel2" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="Ubicación">Ubicación</option>
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
    </select>

 	<label class="pBold">¿Deseas agregar otro idioma?</label>
	<input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar1();">
	<input type="button" class="btns_preins" value="No" onclick="idioma_ocultar1();"><br>
</div>

<div id="seleccionar_idioma2" class="seleccionar_idioma">
	<label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg3" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>
 <label for="">Tipo</label>
<select id="idiomas" name="tipo2" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>
	
    <label for="">Nivel </label><select id="nivel3" name="nivel3" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="Ubicación">Ubicación</option>
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
    </select>

	<label class="pBold">¿Deseas agregar otro idioma?</label>
	<input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar2();">
	<input type="button" class="btns_preins" value="No" onclick="idioma_ocultar2();"><br>
</div>

<div id="seleccionar_idioma3" class="seleccionar_idioma">
	<label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg4" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>
 
<label for="">Tipo</label>
<select id="idiomas" name="tipo3" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected>Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>

     <label for="">Nivel </label><select id="nivel4" name="nivel4" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
       <option value="Ubicación">Ubicación</option>
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
    </select>
	
</div>
<label for="">*Fecha de nacimiento</label> 
<input type="date" name="fecha_nacimiento_ins_reg" placeholder="dd-mm-aaaa" class="txtBox" min="1940-01-01" max="<?php echo date("Y-m-d",strtotime("Today -14 years"));?>" required>
<label for="">*CURP:</label> <input maxlength="18" minlength="18" type="text" name="curp_alumno_reg" placeholder="18 Dígitos" class="txtBox" required pattern="[a-zA-Z0-9]{18,18}">
<label for="">*Teléfono:</label> <input maxlength="10" minlength="10" type="text" name="tel_reg" placeholder="10 Dígitos" class="txtBox" required="" pattern="[0-9]{10,10}"><br>
<label for="">*Correo personal: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_reg" placeholder="ejemplo@email.com" required> 
<label for="">Correo UNACH: </label> <input type="email" class="txtBox" pattern="[a-z0-9@._/-]{5,100}" name="correo_unach_reg" placeholder="ejemplo@unach.mx"> 
<label for="">Calle: </label> <input type="text"class="txtBox" name="calle_reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}" placeholder="ej:2a oriente">
<label for="">Número: </label> <input type="text" class="txtBox" name="num_reg" pattern="[0-9]{0,5}" placeholder="ej:182"><br> 
<label for="">*Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_ins_Reg" id="cp_ins_Reg" class="txtBox" required="" pattern="[0-9]{5,5}" placeholder="5 dígitos">

<label for="">*Colonia: </label> 
<select id="col_reg" name="col_reg" required>
  <option value="" selected>Elige una opcion</option>
</select>

<label for="">*Municipio: </label> <input type="text" class="txtBox" name="municipio_ins_Reg" id="municipio_ins_Reg" required="" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" placeholder="municipio" required readonly><br>
<label for="">*Estado: </label> <input type="text" class="txtBox" required="" name="estado_ins_Reg" id="estado_ins_Reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" placeholder="Estado" required readonly>
<label for="">*Sexo:</label> 
<select id="sex_preins_reg" name="sex_preins_reg" pattern="[a-z]{8,9}" required>
  <option value="" selected>Elige una opcion</option>
  <option value="Masculino">Masculino</option>
  <option value="Femenino">Femenino</option>
</select>

<label for="">Matricula </label><input name="matricula_reg" type="text"placeholder="(Estudiantes UNACH)" pattern="[a-zA-Z0-9]{2,15}"> 
<label for="">*Dependencia: </label><select id="" name="dependencia" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}" required>
       <option value="" selected>Selecciona</option>
      <option value="Particulares">Particulares</option>
      <option value="Estudiante UNACH">Estudiante UNACH</option>
      <option value="Maestrante/Doctorante UNACH">Maestrante/Doctorante UNACH</option>
      <option value="SPAUNACH">SPAUNACH</option>
      <option value="STAUNACH">STAUNACH</option>
      <!-- <option value="Escasos recursos">Escasos recursos</option> -->
      <option value="Confianza, Docentes no afiliados">Confianza, Docentes no afiliados</option>
      <option value="Conversación">Conversación Depto</option>
    </select>
	<br>

<label for="password">*Elige una contraseña de acceso al sistema</label> 
<input id="pass_pre1" minlength="6" maxlength="30" class="txtBox" type="password" name="pass_reg" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-zñÑ0-9$@.-]{6,30}"><img id="eye_boton1" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña_pre1();">
<label for="">*Confirmar contraseña</label> 
<input id="pass_pre2" minlength="6" maxlength="30" class="txtBox" type="password" name="pass2_reg" required="" pattern="[A-Za-zñÑ0-9$@.-]{6,30}" placeholder="mínimo 6 dígitos"><img id="eye_boton2" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña_pre2();"><br>

<a href=""><button type="submit" id="btnGuardar" class="btns" >Guardar</button></a> <br><br>
</div>



</form>


	</div>
 

<div id="preinsCurp">
  <form class="" action="" method="POST" data-form="question">
  
  <label for="">Ingresa tu CURP</label> <br><input maxlength="18" minlength="18" type="text" name="buscar_curp_alumno" placeholder="18 Dígitos" class="txtBox" required pattern="[a-zA-Z0-9]{18,18}"><br>
  <button type="submit" id="btnEnviarCurp" class="btns">Buscar curp</button> <br>
</div>

</div>  
</div>  

<?php 
if(isset($_POST['buscar_curp_alumno']) && isset($_POST['buscar_curp_alumno'])){
      require_once "./controladores/preinscritoControlador.php";

      $ins_buscar_curp= new preinscritoControlador();
      echo $ins_buscar_curp->buscar_curp_reinscripcion_controlador();

  }
 ?>

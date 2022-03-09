 <?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>
 
 <div class="g3" id="select_idioma">
	  
      <div id="btnsList"><br>
         <a href="<?php echo SERVERURL; ?>agregarUsuario/"><input type="button" class="btns2" value="Agregar usuario"></a>
         <a href="<?php echo SERVERURL; ?>listaUsuarios/"><input type="button" class="btns2" value="Lista de usuarios"></a>
         <a href="<?php echo SERVERURL; ?>buscarUsuario/"><input type="button" class="btns2" value="Buscar usuario"></a> 
         </div>
     
	<div class="formContainer4">
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="save">
	<h2>Agregar nuevo usuario</h2>
<p>Todos los campos marcados con un asterisco son obligatorios</p>
  <label for="">*Nombre (s): </label>
	<input type="text" class="txtBox" required="" minlength="3" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{3,50}" placeholder="ej:Ana" name="nombre_reg">
	
	<label for="">*Apellido paterno:</label> 
	<input type="text" class="txtBox" required="" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" placeholder="ej:Díaz" name="apellido_paterno_reg">

	<label for="">*Apellido materno:</label>
	<input type="text" class="txtBox" required="" minlength="1" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}" placeholder="ej:Ruiz" name="apellido_materno_reg"><br>

<label for="" style="font-weight: bold;">///DOMICILIO/// </label>
<label for="">Calle: </label> <input type="text"class="txtBox" required="" placeholder="ej:2a oriente" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" name="calle_reg">
<label for="">*Número: </label> <input type="text" class="txtBox" required="" placeholder="ej:182" minlength="1" maxlength="5" pattern="[0-9]{1,5}" name="num_reg">
<label for="">*Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_personal_reg" id="cp_pers_reg" class="txtBox" required="" pattern="[0-9]{5,5}" placeholder="5 dígitos"><br>

<label for="">*Colonia: </label> 
<select id="col_reg" name="col_reg" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}" required>
  <option value="" selected>Seleccione</option>
</select>

<label for="">*Teléfono:</label> <input maxlength="10" minlength="10" type="text" placeholder="10 Dígitos" class="txtBox" required="" pattern="[0-9]{10,10}" name="tel_reg">
<label for="">*Email: </label> <input type="text" class="txtBox" placeholder="ejemplo@email.com" minlength="5" maxlength="100" pattern="[a-z0-9@._/-]{5,100}" name="correo_reg" required><br>
<label for="">*CURP:</label> <input maxlength="10" minlength="10" type="text" placeholder="Los primeros 10 dígitos" class="txtBox" required="" pattern="[a-zA-Z0-9]{10,10}" name="curp_personal_reg">
<label for="">Matricula </label><input type="text" placeholder="(Si cuenta con ella)" maxlength="10" pattern="[a-zA-Z0-9]{0,10}" name="matricula_reg"> 

<label for="">*Nivel de acceso</label>

<select class="form-control" id="privilegios" name="priv_reg" required>
 <option value="" selected>Seleccione</option>
  <option value="2">Administrador</option>
  <option value="3">Secretario</option>
  <option value="4">Asesor</option>
  <option value="5">Personal</option>
</select>
<br>

<div id="idioma_asesor">
  <label for="">*Idioma</label>
<select id="idiomas" name="idiom_reg" pattern="[0-9]{1,2}">
  <option value="0" selected>Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>
</div>


<label for="">*Contraseña</label> 
<input minlength="6" maxlength="30" class="txtBox" type="password" name="pass_reg" id="pass_pre1" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-zñÑ0-9$@.-]{6,30}"><img id="eye_boton1" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña_pre1();">
<label for="">*Confirmar contraseña</label>
<input minlength="6" maxlength="30" class="txtBox" type="password" name="pass2_reg" id="pass_pre2" required="" placeholder="mínimo 6 dígitos" pattern="[A-Za-zñÑ0-9$@.-]{6,30}"><img id="eye_boton2" class="eye_icon" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña_pre2();"><br><br>

<button type="submit" id="btnGuardar" class="btns">Guardar</button> <br><br><br>

</form>
</div>

	</div>
	  </div>  

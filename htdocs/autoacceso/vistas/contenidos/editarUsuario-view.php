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


              <?php 
            require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->datos_usuario_controlador("Unico",$pagina[1]);
          if($datos_usuario->rowCount()==1){
           
            $campos = $datos_usuario->fetch();
           ?>

		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="update">
      <input type="hidden" name="user_id_decrypt" value=" <?php echo $pagina[1]; ?> "> 
	<h2>Editar información usuario</h2>

 <p>Todos los campos marcados con un asterisco son obligatorios</p>
  <label for="">*Nombre (s): </label>
  <input type="text" class="txtBox" required="" minlength="3" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{3,50}" placeholder="ej:Ana" name="nombre_reg" value="<?php echo $campos['nombre']?>">
  
  <label for="">*Apellido paterno:</label> 
  <input type="text" class="txtBox" required="" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}" placeholder="ej:Díaz" name="apellido_paterno_reg" value="<?php echo $campos['apellido_paterno']?>">

  <label for="">*Apellido materno:</label>
  <input type="text" class="txtBox" required="" minlength="1" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}" placeholder="ej:Ruiz" name="apellido_materno_reg" value="<?php echo $campos['apellido_materno']?>"><br>

<label for="" style="font-weight: bold;">///DOMICILIO/// </label>
<label for="">Calle: </label> <input type="text"class="txtBox" required="" placeholder="ej:2a oriente" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}" name="calle_reg" value="<?php echo $campos['calle']?>">
<label for="">*Número: </label> <input type="text" class="txtBox" required="" placeholder="ej:182" minlength="1" maxlength="5" pattern="[0-9]{1,5}" name="num_reg" value="<?php echo $campos['numero']?>">
<label for="">*Código Postal: </label> <input minlength="5" maxlength="5" type="text" name="cp_personal_reg" id="cp_pers_reg" class="txtBox" required="" pattern="[0-9]{5,5}" placeholder="5 dígitos" value="<?php echo $campos['cp']?>"><br>

<label for="">*Colonia: </label> 
  <input type="text" id="col_reg" name="col_reg" placeholder="ej: El rosario" value="<?php echo $campos['colonia']?>" minlength="2" maxlength="100" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}" required>


<label for="">*Teléfono:</label> <input maxlength="10" minlength="10" type="text" placeholder="10 Dígitos" class="txtBox" required="" pattern="[0-9]{10,10}" name="tel_reg" value="<?php echo $campos['telefono']?>">
<label for="">*Email: </label> <input type="text" class="txtBox" placeholder="ejemplo@email.com" minlength="5" maxlength="100" pattern="[a-z0-9@._/-]{5,100}" name="correo_reg" value="<?php echo $campos['correo']?>"><br>
<label for="">*CURP:</label> <input maxlength="10" minlength="10" type="text" placeholder="Los primeros 10 dígitos" class="txtBox" required="" pattern="[a-zA-Z0-9]{10,10}" name="curp_personal_reg" value="<?php echo $campos['curp']?>">
<label for="">Matricula </label><input type="text" placeholder="(Si cuenta con ella)" minlength="0" maxlength="10" pattern="[a-zA-Z0-9]{0,10}" name="matricula_reg" value="<?php echo $campos['matricula']?>"> 

<label for="">*Nivel de acceso</label>

<select class="form-control" id="privilegios" name="priv_reg_edit" required>
 <option value="" selected>Seleccione</option>
<option value="1"<?php if($campos['id_rol']=="1"){echo"selected";}?>>Coordinador</option>
  <option value="2"<?php if($campos['id_rol']=="2"){echo"selected";}?>>Administrador</option>
  <option value="3"<?php if($campos['id_rol']=="3"){echo"selected";}?>>Secretario</option>
  <option value="4"<?php if($campos['id_rol']=="4"){echo"selected";}?>>Asesor</option>
  <option value="5"<?php if($campos['id_rol']=="5"){echo"selected";}?>>Personal</option>
</select>
<br>

<div id="idioma_asesor">
  <label for="">*Idioma</label>
<select id="idiomas" name="idiom_reg" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="0" selected <?php if($campos['idioma_asesor']==""){echo"selected";}?>>Elige una opcion</option>
  <option value="0"<?php if($campos['idioma_asesor']=="0"){echo"selected";}?>>No asignado</option>
  <option value="1"<?php if($campos['idioma_asesor']=="1"){echo"selected";}?>>Inglés</option>
  <option value="2"<?php if($campos['idioma_asesor']=="2"){echo"selected";}?>>Francés</option>
  <option value="3"<?php if($campos['idioma_asesor']=="3"){echo"selected";}?>>Alemán</option>
  <option value="4"<?php if($campos['idioma_asesor']=="4"){echo"selected";}?>>Italiano</option>
  <option value="5"<?php if($campos['idioma_asesor']=="5"){echo"selected";}?>>Chino Mandarín</option>
  <option value="6"<?php if($campos['idioma_asesor']=="6"){echo"selected";}?>>Español</option>
</select>
</div>

<!--S
<label for="">*Elige una contraseña</label> 
<input minlength="6" class="txtBox" type="password" name="pass_reg" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-z0-9$@.-]{6,20}">
<label for="">*Confirmar contraseña</label>
<input minlength="6" class="txtBox" type="password" name="pass2_reg" placeholder="mínimo 6 dígitos" required="" pattern="[A-Za-z0-9$@.-]{6,20}"><br>
-->
<button type="submit" id="btnGuardar" class="btns">Guardar</button> 
</div>
</form>
<?php }else{ ?>
<br><br>
</div>

	<div class="alert_error"><br>
  <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt="">
  <p class="errorSub1">¡Ocurrió un error inesperado!</p>
  <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

</div>
<?php } ?>
<br>
<br>

	  </div>  


<div class="formContainer2" id="fC2">
<br>
	<form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/passwordAjax.php" method="POST" data-form="update">
	<?php
		if(isset($_SESSION['logged'])&& $_SESSION['logged']){?>

     		<input type="hidden" name="pass_edit_decrypt" value=" <?php echo $lc->encryption($_SESSION['id_scaa']); ?>"> 
 <?php	} else{?>
			<input type="hidden" name="pass_edit_decrypt" value=" <?php echo $pagina[1]; ?>"> 
	 <?php	}
	 	 require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->datos_usuario_controlador("Unico",$pagina[1]);
	 	if($datos_usuario->rowCount()==1){
	  ?>
<div class="loginPanel" id="loginPanelId" >
		<h3>Reestablecer contraseña</h3>
			<div >

					<label for="">Ingrese su nueva contraseña</label> <br>
					<input  type="password" minlength="6" maxlength="30" name="pass1_edit" placeholder="Mínimo 6 caracteres" class="txtBox" id="pass1" pattern="[A-Za-zñÑ0-9$@.-]{6,30}" required>
					<?php if(isset($_SESSION['logged'])&& $_SESSION['logged']){ ?>
					<img id="eye_boton1_1" class="eye_icon2" src="../../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña1_1();">
					<?php }else{ ?>
					<img id="eye_boton1_1" class="eye_icon2" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña1_12();">
					<?php } ?>
			</div>

			<div >
					<label for="">Confirmar contraseña</label> <br>
					<input type="password" minlength="6" maxlength="30" name="pass2_edit" placeholder="Mínimo 6 caracteres" class="password" id="pass2" pattern="[A-Za-zñÑ0-9$@.-]{6,30}" required>
					<?php if(isset($_SESSION['logged'])&& $_SESSION['logged']){ ?>
					<img id="eye_boton2_1" class="eye_icon2" src="../../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña2_1();">
					<?php }else{ ?>
					<img id="eye_boton2_1" class="eye_icon2" src="../vistas/images/eye_icon.png" alt="" onclick="mostrarContraseña2_12();">
				<?php } ?>
			</div>

			<input type="submit" class="btns" id="btn_alt" value="Guardar"><br><br>
	</form>
</div><br>
	        <?php }else{ ?>
        <br><br>
        <div class="alert_error"><br>
          <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt=""><br>
          <p class="errorSub1">¡Ocurrió un error inesperado!</p><br>
          <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

        </div>
        <?php } ?>

        
</div>

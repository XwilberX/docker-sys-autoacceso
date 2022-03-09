<div class="formContainer4" id="fC2"><br><br>
	
	<form class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/passwordAjax.php" method="POST" data-form="question">
		<div class="loginPanel" id="loginPanelId" >
      
			<h2>Reestablecer contraseña</h2> <br>
			
					<label for="">Ingrese su correo electrónico</label> <br>
					
					<input type="email" class="txtBox" minlength="5" maxlength="100" pattern="[a-z0-9@._/-]{5,100}" name="correo_reestablecer_pass" id="loginUserInput" placeholder="ejemplo@email.com" required> <br>
			

				<input type="submit" class="btns" id="btn_alt" value="Enviar"><br><br><br>
		</div>
	</form>

</div>

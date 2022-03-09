<style>
	#fC2 {

		min-height: 527px;
	}
</style>

<div class="formContainer2" id="fC2">
	<br>
	<div class="loginPanel" id="loginPanelId">
		<form action="" method="POST" autocomplete="off">
			<h2>Log in</h2>
			<div class="grupoLog">
				<label for="">Ingrese sus datos de acceso</label> <br>

				<label for="nick">CURP</label> <br>
				<input minlength="10" maxlength="18" type="text" name="curp_personal_log" placeholder="Administrativos 10 dígitos. Alumnos 18 dígitos." class="txtBox" id="loginUserInput" pattern="[a-zA-Z0-9]{10,18}" required="">
			</div>


			<div class="grupoLog">
				<label for="password">Contraseña</label> <br>
				<input type="password" name="password_log" placeholder="Escriba su contraseña" class="password" id="loginUserInput" pattern="[A-Za-zñÑ0-9$@.-]{6,30}" minlength="6" maxlength="30" required=""><br>
				<a class="passForget" href="<?php echo SERVERURL; ?>reestablecerPass/">¿Ha olvidado su contraseña?</a>
			</div>

			<br>
			<!-- <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6LeF2iQUAAAAAKVrZNlcFCyTbrU4uwoDoJRimLaI"></div> -->

			<br>
			<button type="submit" id="btn2" class="btns">Iniciar sesión</button>
		</form>

		<br>
	</div>
	<br><br>

</div>


<?php

if (isset($_POST['curp_personal_log']) && isset($_POST['password_log'])) {
	require_once "./controladores/loginControlador.php";

	$ins_login = new loginControlador();
	echo $ins_login->iniciar_sesion_controlador();
}

?>
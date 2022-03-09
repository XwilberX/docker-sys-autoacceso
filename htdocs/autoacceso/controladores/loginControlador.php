<?php

if ($peticionAjax) {
	require_once "../modelos/loginModelo.php";
} else {
	require_once "./modelos/loginModelo.php";
}

class loginControlador extends loginModelo
{
	/* CONTROLADOR INICIAR SESION */
	public function iniciar_sesion_controlador()
	{

		$curp = mainModel::limpiar_cadena($_POST['curp_personal_log']);
		$password = mainModel::limpiar_cadena($_POST['password_log']);
		// $captcha = mainModel::limpiar_cadena($_POST['g-recaptcha-response']);
		// $secret = "6LeF2iQUAAAAADArEOt7i4mPqGBIX3iQY-Gvy8TA";

		// if ($captcha == "") {
		// 	return '
		// 		<script>
		// 		Swal.fire({
		// 			title: "Ocurrió un error inesperado",
		// 			text: "Por favor verifique el captcha.",
		// 			type: "error",
		// 			confirmButtonText: "Aceptar"
		// 			});
		// 		</script> 
		// 	';
		// }

		// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		if ($curp == "" || $password == "") {
			return '
			<script>
			Swal.fire({
					title: "Ocurrió un error inesperado",
					text: "No ha llenado todos los campos requeridos",
					type: "error",
					confirmButtonText: "Aceptar"
					});	
			</script> 
			';
		}

		if (mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}", $password)) {
			return '
			<script>
				Swal.fire({
					title: "Ocurrió un error inesperado",
					text: "La contraseña contiene caracteres que no son válidos. Verifíquela e intente nuevamente.",
					type: "error",
					confirmButtonText: "Aceptar"
					});
				</script> 
			';
		}

		$claveDesencriptada = mainModel::encryption($password);

		$datos_login = [
			"curp" => $curp,
			"password" => $claveDesencriptada
		];

		$datos_cuenta = loginModelo::iniciar_sesion_modelo($datos_login);

		if ($datos_cuenta->rowCount() == 1) {

			//session_set_cookie_params(60*0*0*0);
			//session_start(['name'=>'SCAA']);
			$row = $datos_cuenta->fetch();

			$idiomas = loginModelo::getIdiomas();
			while ($r = $idiomas->fetch()) {
				$_SESSION['idiomas'][] = $r;
			}

			$asesores = loginModelo::getAsesores();
			while ($r2 = $asesores->fetch()) {
				$_SESSION['asesores'][] = $r2;
			}

			$_SESSION["timeout"] = time();
			$_SESSION['id_scaa'] = $row['id_persona'];
			$_SESSION['curp_scaa'] = $row['curp'];
			$_SESSION['nombre_scaa'] = $row['nombre'];
			$_SESSION['apellidoP_scaa'] = $row['apellido_paterno'];
			$_SESSION['apellidoM_scaa'] = $row['apellido_materno'];
			$_SESSION['curso_asesor_scaa'] = $row['idioma_asesor'];
			$_SESSION['privilegio_scaa'] = $row['id_rol'];
			$_SESSION['logged'] = 1;
			$_SESSION['token_scaa'] = md5(uniqid(mt_rand(), true));

			//$_SESSION['usuario_scaa']=$row;	
			//$_SESSION['usuario_scaa']['nombre'];

			$fechaActual = date("Y-m-d", strtotime("Today"));
			$horaActual = date("H:i:s", strtotime("Now"));

			$consulta = "SELECT fecha_asesoria, hora, estatus_hora_asesoria, id_plantilla_horario FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.fecha_asesoria='" . $fechaActual . "' ORDER BY plantilla_horarios.hora ASC";

			$conexion = mainModel::conectar();
			$datos = $conexion->query($consulta);
			$datos = $datos->fetchAll();

			foreach ($datos as $rows) {

				if ($rows['fecha_asesoria'] >= $fechaActual && $rows['hora'] > $horaActual) {
					$asesoria_vencida = loginModelo::asesoria_volver_agendada_modelo($rows['id_plantilla_horario']);
				}
			}


			echo "<script> location.href='" . SERVERURL . "home/'</script>";
		} else {
			return '
				<script>
				Swal.fire({
					title: "Ocurrió un error inesperado",
					text: "El curp o la contraseña son incorrectos",
					type: "error",
					confirmButtonText: "Aceptar"
					});
				</script> 
			';
		}
	} /* FIN DEL CONTROLADOR */

	/* CONTROLADOR FORZAR CIERRE DE SESION */

	public function forzar_cierre_sesion_controlador()
	{

		session_unset();
		session_destroy();

		return "<script>  alert('¡ERROR! Usted no cuenta con los permisos para acceder a ésta página. Se cerrará la sesión.'); window.location.href='" . SERVERURL . "login/';</script>";

		/*	if(headers_sent()){
				return"<script> window.location.href='".SERVERURL."login/';</script>";
			}else{
				return header("Location: ".SERVERURL."login/");
				
			}*/
	} /* FIN DEL CONTROLADOR */


	/*  CIERRE DE SESION */

	public function cerrar_sesion_controlador()
	{
		$fechaActual = date("Y-m-d", strtotime("Today"));
		$horaActual = date("H:i:s", strtotime("Now -20 minutes"));

		$consulta = "SELECT fecha_asesoria, hora, estatus_hora_asesoria, id_plantilla_horario FROM asesorias JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario WHERE asesorias.fecha_asesoria='" . $fechaActual . "' ORDER BY plantilla_horarios.hora ASC";

		$conexion = mainModel::conectar();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		foreach ($datos as $rows) {

			if ($rows['fecha_asesoria'] <= $fechaActual && $rows['hora'] <= $horaActual) {

				$asesoria_vencida = loginModelo::asesoria_vencida_loguot_modelo($rows['id_plantilla_horario']);
			}
		}

		session_start(['name' => 'SCAA']);
		$token = mainModel::decryption($_POST['token']);
		$curp = mainModel::decryption($_POST['curp']);

		if ($token == $_SESSION['token_scaa'] && $curp == $_SESSION['curp_scaa']) {

			session_unset();
			session_destroy();
			$alerta = [
				"Alerta" => "redireccionar",
				"URL" => SERVERURL . "login/"

			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrio un error inesperado",
				"Texto" => "No se pudo cerrar la sesión",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */


	/*	public function isLog_controlador(){
			
					if(isset($_SESSION['token_scaa']) && isset($_SESSION['curp_scaa'])){
						include "./vistas/inc/head2.php";
					}else{
						include "./vistas/inc/head1.php";
					}
			}*/


	public function nombre_isLog_controlador()
	{

		if (isset($_SESSION['token_scaa']) && isset($_SESSION['curp_scaa'])) {
			return $_SESSION['nombre_scaa'];
		}
	}
}

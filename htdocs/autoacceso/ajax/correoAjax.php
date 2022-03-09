<?php
	$peticionAjax=true;
	require_once "../config/APP.php";
	if(isset($_POST['mensaje'])){

	/* INSTANCIA AL CONTROLADOR */
			require_once "../controladores/correoControlador.php";
		
			$ins_email= new correoControlador();

		if(isset($_POST['mensaje']) && isset($_POST['nombreCorreo']) && isset($_POST['emailCorreo']) && isset($_POST['asuntoCorreo'])){
			echo $ins_email->enviar_correo_controlador();
		}

	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}
<?php
	$peticionAjax=true;
	require_once "../config/APP.php";
			
	if(isset($_POST['pass_edit_decrypt']) || isset($_POST['correo_reestablecer_pass'])){

	/* INSTANCIA AL CONTROLADOR */
			require_once "../controladores/passwordControlador.php";
			$ins_pass= new passwordControlador();

		if(isset($_POST['pass1_edit']) && isset($_POST['pass2_edit']) && isset($_POST['pass_edit_decrypt'])){
			echo $ins_pass->actualizar_password_controlador();
		}

		if(isset($_POST['correo_reestablecer_pass'])){
			echo $ins_pass->correo_reestablecer_password_controlador();
		}

	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}
?>
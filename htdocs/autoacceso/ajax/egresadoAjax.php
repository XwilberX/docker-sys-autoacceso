<?php

	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['nivel_egr']) || isset($_POST['curso_egr']) || isset($_POST['nivel_egr_rev']) || isset($_POST['curso_egr_rev'])){

		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/egresadoControlador.php";
		$ins_egresado = new egresadoControlador();
		

		/* AGREGAR UN ALUMNO */

		if(isset($_POST['nivel_egr']) && isset($_POST['curso_egr'])){
			echo $ins_egresado->egresar_nivel_controlador();
		}

		if(isset($_POST['nivel_egr_rev']) && isset($_POST['curso_egr_rev'])){
			echo $ins_egresado->revertir_nivel_controlador();
		}
	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}

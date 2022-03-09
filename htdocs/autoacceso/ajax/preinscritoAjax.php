<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['curp_alumno_reg']) || isset($_POST['usuario_id_del'])|| isset($_POST['cp'])){

		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/preinscritoControlador.php";
		$ins_preinscrito = new preinscritoControlador();

		/* AGREGAR UN PREINSCRITO */

		if(isset($_POST['curp_alumno_reg']) && isset($_POST['idioms_reg'])){
			echo $ins_preinscrito->agregar_preinscrito_controlador();
		}

			/* ELIMINAR UN PREINSCRITO */
	
		if(isset($_POST['usuario_id_del'])){
			echo $ins_preinscrito->eliminar_preinscrito_controlador();
		}

		if(isset($_POST['cp'])){
			echo $ins_preinscrito->buscar_cp_controlador();
		}

	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}

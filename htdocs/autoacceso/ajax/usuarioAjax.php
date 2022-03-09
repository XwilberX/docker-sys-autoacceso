<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['curp_personal_reg']) || isset($_POST['usuario_id_del']) || isset($_POST['cp'])){

		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/usuarioControlador.php";
		$ins_usuario = new usuarioControlador();

		/* AGREGAR UN USUARIO */

		if(isset($_POST['curp_personal_reg']) && isset($_POST['priv_reg'])){
			echo $ins_usuario->agregar_usuario_controlador();
		}

				/* ELIMINAR UN USUARIO */
	
		if(isset($_POST['usuario_id_del'])){
			echo $ins_usuario->eliminar_usuario_controlador();
		}

		if(isset($_POST['curp_personal_reg']) && isset($_POST['priv_reg_edit'])){
			echo $ins_usuario->editar_usuario_controlador();
		}

		if(isset($_POST['cp'])){
			echo $ins_usuario->buscar_cp_controlador();
		}

	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}

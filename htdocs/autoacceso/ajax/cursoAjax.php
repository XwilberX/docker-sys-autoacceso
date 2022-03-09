<?php

	$peticionAjax=true;
	require_once "../config/APP.php";
//print_r($_POST['id']);


		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/alumnoControlador.php";
		$ins_alumno = new alumnoControlador();

		/* ELIMINAR UN IDIOMA DEL PREINSCRITO O DEL ALUMNO */
		if(isset($_POST['eliminarId'])){
			echo $ins_alumno->eliminar_curso_asesoria_controlador();
		}

		/* ACTIVAR O DESACTIVAR UN IDIOMA DEL ALUMNO */
		if(isset($_POST['desactivarCurso']) || isset($_POST['activarCurso'])){
			echo $ins_alumno->modificar_curso_asesoria_controlador();
		}

		
	

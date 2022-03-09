<?php

	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['curp_alumno_reg']) || isset($_POST['alumno_id_del'])|| isset($_POST['cp']) || isset($_POST['curp_alu_edit']) || isset($_POST['alumno_id_pdf']) || isset($_POST['finalizarPeriodo']) || isset($_POST['buscar_curp_alumno']) || isset($_POST['id_reinscripcion']) || isset($_POST['solicitar_reinscripcion']) || isset($_POST['solicitud_nvo_idioma']) || isset($_POST['activarAlumno'])){

		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/alumnoControlador.php";
		$ins_alumno = new alumnoControlador();
		

		/* AGREGAR UN ALUMNO */

		if(isset($_POST['nombre_nvoAlu_reg']) && isset($_POST['idioms_nvoAlu_reg'])){
			echo $ins_alumno->agregar_alumno_controlador();
		}

		/* INSCRIBIR UN ALUMNO */
		if(isset($_POST['curp_alumno_reg']) && isset($_POST['nivel1'])){
				
			echo $ins_alumno->inscribir_alumno_controlador();
			
		}

		/* EDITAR UN ALUMNO */
		if(isset($_POST['curp_alu_edit']) && isset($_POST['alu_id_decrypt'])){
			
			echo $ins_alumno->editar_alumno_controlador();
		}

		/* ELIMINAR UN ALUMNO */
		if(isset($_POST['alumno_id_del'])){
			echo $ins_alumno->eliminar_alumno_controlador();
		}

		/* FINALIZAR UN PERIODO */
		if(isset($_POST['finalizarPeriodo'])){
			echo $ins_alumno->finalizar_periodo_controlador();
		}

		
		/* Buscar CP */
		if(isset($_POST['cp'])){
			echo $ins_alumno->buscar_cp_controlador();
		}
		
		/* Buscar CURP alumno reinscripción */
		if(isset($_POST['buscar_curp_alumno'])){
			echo $ins_alumno->buscar_curp_reinscripcion_controlador();
		}

		/* MOSTRAR INTERFAZ CON LOS IDIOMAS A REINSCRIBIR */
		if(isset($_POST['id_reinscripcion'])){
			echo $ins_alumno->seleccionar_idiomas_reinscripcion();
		}

		/* SOLICITAR REINSCRIPCIÓN */
		if(isset($_POST['solicitar_reinscripcion']) && isset($_POST['reinscripcion_SS'])){
			echo $ins_alumno->solicitar_reinscripcion_controlador();
		}

		/* AGREGAR NUEVOS IDIOMAS */
		if(isset($_POST['solicitud_nvo_idioma']) && isset($_POST['id_agregar_nvo_idioma'])){
			echo $ins_alumno->solicitar_nuevos_cursos_controlador();
		}
		
		/* AGREGAR NUEVOS IDIOMAS */
		if(isset($_POST['activarAlumno'])){
			echo $ins_alumno->activar_alumno_controlador();
		}


	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}

<?php
//session_start();
//echo session_id()."**";
//print_r($_SESSION);
	$peticionAjax=true;
	require_once "../config/APP.php";
			
	if(isset($_POST['unico_rango']) || isset($_POST['eliminar_horario_id']) || isset($_POST['horario_asesoria_edit']) || isset($_POST['id']) || isset($_POST['agendar_asesoria_id']) || isset($_POST['inputLinkDispo']) || isset($_POST['act_id_pl_hr']) || isset($_POST['avance_asesoria_alumno']) || isset($_POST['estatus_asesoria_completada']) || isset($_POST['id_asesor_recargar']) || isset($_POST['id_idioma_btns_asesorias_maestros'])){

	/* INSTANCIA AL CONTROLADOR */
			require_once "../controladores/asesoriasControlador.php";
			$ins_asesorias= new asesoriasControlador();

		if(isset($_POST['unico_rango']) && isset($_POST['horarios_asesorias']) && isset($_POST['dias_semana'])){
			echo $ins_asesorias->agregar_horarios_asesor_controlador();
		}

		if(isset($_POST['eliminar_horario_id'])){
			echo $ins_asesorias->eliminar_horario_dispo_controlador();
		}

		if(isset($_POST['horario_asesoria_edit']) && isset($_POST['actualizar_horario_id'])){
			echo $ins_asesorias->actualizar_horario_dispo_controlador();
		}

		if(isset($_POST['id'])){
			echo $ins_asesorias->visualizar_horarios_asesorias_controlador();
		}

		if(isset($_POST['agendar_asesoria_id'])){
			echo $ins_asesorias->agendar_asesorias_controlador();
		}

		if(isset($_POST['inputLinkDispo'])){
			echo $ins_asesorias->actualizar_link_asesorias_controlador();
		}

		if(isset($_POST['act_id_pl_hr']) && isset($_POST['asesoria_agendada_borrar'])){
			echo $ins_asesorias->borrar_asesoria_agendada_controlador();
		}

		if(isset($_POST['avance_asesoria_alumno']) && isset($_POST['asesoria_id_decrypt'])){
			echo $ins_asesorias->avance_asesoria_controlador();
		}
		if(isset($_POST['estatus_asesoria_completada']) && isset($_POST['id_asesoria_completada'])){
			echo $ins_asesorias->completada_asesoria_controlador();
		}
		if(isset($_POST['id_idioma_btns_asesorias_maestros'])){
			echo $ins_asesorias->info_asesorias_controlador();
		}
		if(isset($_POST['id_asesor_recargar'])){
		    $_SESSION['id_asesor_cambio']=$_POST['id_asesor_recargar'];
			echo $ins_asesorias->horarios_asesorias_controlador();
		}

	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}
?>
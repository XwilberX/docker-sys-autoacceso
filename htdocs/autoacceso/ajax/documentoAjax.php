<?php
	$peticionAjax=true;
	require_once "../config/APP.php";
			
	if(isset($_POST['cargarUrl']) ||isset($_POST['acceso_archivo']) ||  isset($_POST['eliminar_archivo']) || isset($_POST['eliminar_url']) || isset($_POST['id_img_carousel_index_actualizar'])){

	/* INSTANCIA AL CONTROLADOR */
			require_once "../controladores/documentoControlador.php";
			$ins_doc= new documentoControlador();

		if($_POST['tipo_recurso_agregar']==1){

			if(isset($_POST['cargarUrl']) && isset($_POST['nombre_link'])){
				echo $ins_doc->agregar_url_controlador();
				
			}
		}

		if($_POST['tipo_recurso_agregar']==2){

			if(isset($_POST['acceso_archivo'])){
				echo $ins_doc->agregar_documento_controlador();
				
			}
		}

		if(isset($_POST['eliminar_archivo'])){
				echo $ins_doc->eliminar_documento_controlador();
				
		}

		if(isset($_POST['eliminar_url'])){
				echo $ins_doc->eliminar_url_controlador();
				
		}

		if(isset($_POST['id_img_carousel_index_actualizar'])){
				echo $ins_doc->actualizar_img_carousel_index_controlador();
				
		}


	}else{
		session_start(['name'=>'SCAA']);
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}

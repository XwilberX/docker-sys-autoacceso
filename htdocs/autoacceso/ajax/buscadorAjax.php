<?php 
	session_start(['name'=>'SCAA']);
	require_once "../config/APP.php";

		if(isset($_POST['busqueda_inicial'])){ 
		$data_url=[
			"usuario"=>"buscarUsuario",
			"alumno"=>"buscarAlumno",
			"asesorias_pasadas"=>"buscarAsesoriaPasada",
			"egresado"=>"buscarEgr",
			"exalumno"=>"buscarEx",
			"reinscripcion"=>"buscarReinscripcion",
			"proximas_asesorias"=>"listaAsesorias",
			"preinscrito"=>"buscarPreinscrito"
		];

		if(isset($_POST['modulo'])){
			$modulo=$_POST['modulo'];
			if(!isset($data_url[$modulo])){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No Podemos continuar con la búsqueda debido a un error.",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"No Podemos continuar con la búsqueda debido a un error de configuración.",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		
			$name_var="busqueda_".$modulo;

			if(isset($_POST['busqueda_inicial'])){
				if($_POST['busqueda_inicial']==""){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Por favor introduce un parámetro de búsqueda.",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

				}
				$_SESSION[$name_var]=$_POST['busqueda_inicial'];
			}
		
		$url=$data_url[$modulo];
		// REDIRECCIONAR AL USUARIO
		$alerta=[
						"Alerta"=>"redireccionar",
						"URL"=>SERVERURL.$url."/"
					];
					echo json_encode($alerta);
					exit();

	}else{
		session_unset();
		session_destroy();
		header("Location:".SERVERURL."login/");
		exit();
	}


<?php

if ($peticionAjax) {
	require_once "../modelos/alumnoModelo.php";
} else {
	require_once "./modelos/alumnoModelo.php";
}

class alumnoControlador extends alumnoModelo
{

	public function agregar_alumno_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_nvoAlu_reg']);
		$apellido_paterno = mainModel::limpiar_cadena($_POST['apellido_paterno_reg']);
		$apellido_materno = mainModel::limpiar_cadena($_POST['apellido_materno_reg']);
		$curp = mainModel::limpiar_cadena($_POST['curp_alumno_reg']);
		$sexo = mainModel::limpiar_cadena($_POST['sex_preins_reg']);
		$idioma = mainModel::limpiar_cadena($_POST['idioms_nvoAlu_reg']);
		$nivel = mainModel::limpiar_cadena($_POST['nivel1']);
		$condicion = mainModel::limpiar_cadena($_POST['condicion_uno_reg']);
		$tipo = mainModel::limpiar_cadena($_POST['tipo_preins_reg']);
		$fecha_termino = mainModel::limpiar_cadena($_POST['fecha_termino_reg1']);
		$refuerzo = mainModel::limpiar_cadena($_POST['refuerzo_uno_reg']);

		$idioma_dos = mainModel::limpiar_cadena($_POST['idioms_reg2']);
		$nivel_dos = mainModel::limpiar_cadena($_POST['nivel2']);
		$condicion_dos = mainModel::limpiar_cadena($_POST['condicion_dos_reg']);
		$tipo_dos = mainModel::limpiar_cadena($_POST['tipo1']);
		$fecha_termino_dos = mainModel::limpiar_cadena($_POST['fecha_termino_reg2']);
		$refuerzo_dos = mainModel::limpiar_cadena($_POST['refuerzo_dos_reg']);

		$idioma_tres = mainModel::limpiar_cadena($_POST['idioms_reg3']);
		$nivel_tres = mainModel::limpiar_cadena($_POST['nivel3']);
		$condicion_tres = mainModel::limpiar_cadena($_POST['condicion_tres_reg']);
		$tipo_tres = mainModel::limpiar_cadena($_POST['tipo2']);
		$fecha_termino_tres = mainModel::limpiar_cadena($_POST['fecha_termino_reg3']);
		$refuerzo_tres = mainModel::limpiar_cadena($_POST['refuerzo_tres_reg']);


		$idioma_cuatro = mainModel::limpiar_cadena($_POST['idioms_reg4']);
		$nivel_cuatro = mainModel::limpiar_cadena($_POST['nivel4']);
		$condicion_cuatro = mainModel::limpiar_cadena($_POST['condicion_cuatro_reg']);
		$tipo_cuatro = mainModel::limpiar_cadena($_POST['tipo3']);
		$fecha_termino_cuatro = mainModel::limpiar_cadena($_POST['fecha_termino_reg4']);
		$refuerzo_cuatro = mainModel::limpiar_cadena($_POST['refuerzo_cuatro_reg']);

		$fecha_nacimiento = mainModel::limpiar_cadena($_POST['fecha_nacimiento_ins_reg']);
		$residencia = mainModel::limpiar_cadena($_POST['residencia']);

		$calle = mainModel::limpiar_cadena($_POST['calle_reg']);
		$numero = mainModel::limpiar_cadena($_POST['num_reg']);
		$colonia = mainModel::limpiar_cadena($_POST['col_reg']);
		$cp = mainModel::limpiar_cadena($_POST['cp_ins_Reg']);
		$municipio = mainModel::limpiar_cadena($_POST['municipio_ins_Reg']);
		$estado = mainModel::limpiar_cadena($_POST['estado_ins_Reg']);
		$telefono = mainModel::limpiar_cadena($_POST['tel_reg']);
		$correo = mainModel::limpiar_cadena($_POST['correo_reg']);
		$correo_unach = mainModel::limpiar_cadena($_POST['correo_unach_reg']);
		$periodo = mainModel::limpiar_cadena($_POST['periodo_reg']);
		$observaciones = mainModel::limpiar_cadena($_POST['observaciones_reg']);
		$lc1 = mainModel::limpiar_cadena($_POST['lc1']);
		$lc2 = mainModel::limpiar_cadena($_POST['lc2']);
		$lc3 = mainModel::limpiar_cadena($_POST['lc3']);
		$lc4 = mainModel::limpiar_cadena($_POST['lc4']);

		$dependencia = mainModel::limpiar_cadena($_POST['dependencia']);
		$carrera_unach = mainModel::limpiar_cadena($_POST['carrera_unach']);
		$matricula = mainModel::limpiar_cadena($_POST['matricula_dependencia']);
		$password = mainModel::limpiar_cadena($_POST['pass_reg']);
		$confirmPass = mainModel::limpiar_cadena($_POST['pass2_reg']);
		$fecha_registro = date("Y-m-d", strtotime("Today"));
		$id_rol = "6";



		/* COMPROBAR CAMPOS VACIOS */

		if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $curp == "" || $sexo == "" || $tipo == "" || $idioma == "" ||  $fecha_nacimiento == "" || $telefono == "" || $correo == "" || $password == "" || $confirmPass == "" || $dependencia == "" || $periodo == "") {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No ha llenado todos los campos obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($residencia == "Nacional") {
			if ($colonia == "" || $cp == "" || $municipio == "" || $estado == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor complete los datos de su domicilio.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
		if (mainModel::verificar_datos("[a-zA-Z0-9]{18,18}", $curp)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El CURP no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $nombre)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Nombre no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $apellido_paterno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido paterno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}", $apellido_materno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido materno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($calle != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}", $calle)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo calle no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($numero != "") {
			if (mainModel::verificar_datos("[0-9]{0,5}", $numero)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo número no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($colonia != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}", $colonia)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo colonia no coincide con el formato solicitadosssss",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($cp != "") {
			if (mainModel::verificar_datos("[0-9]{5,5}", $cp)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El código postal no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($municipio != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}", $municipio)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El municipio no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($estado != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}", $estado)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El estado no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($tipo != "Inscripción" && $tipo != "Reinscripción") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de inscripción solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($sexo != "Masculino" && $sexo != "Femenino") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de sexo solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}




		if (mainModel::verificar_datos("[0-9]{10,10}", $telefono)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El teléfono no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if ($matricula != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 ,]{2,20}", $matricula)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "La matrícula no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($observaciones != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}", $observaciones)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Las observaciones no coinciden con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if (mainModel::verificar_datos("[1-6]{1,2}", $idioma)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El idioma no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}", $password) || mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}", $confirmPass)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "Las contraseñas no coinciden con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_fecha($fecha_nacimiento)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "La fecha de nacimiento no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if ($condicion == "Refuerzo") {

			if ($refuerzo == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor indique el tipo de refuerzo para el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($nivel >= "2" && $nivel <= "12") {
			if ($fecha_termino == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($idioma_dos != "") {
			if ($idioma_dos != "1" && $idioma_dos != "2" && $idioma_dos != "3" && $idioma_dos != "4" && $idioma_dos != "5" && $idioma_dos != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor elija un idioma válido.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_dos != "Inscripción" && $tipo_dos != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 2 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "Refuerzo") {

				if ($refuerzo_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_dos >= "2" && $nivel_dos <= "12") {
				if ($fecha_termino_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}

		if ($idioma_tres != "") {
			if ($idioma_tres != "1" && $idioma_tres != "2" && $idioma_tres != "3" && $idioma_tres != "4" && $idioma_tres != "5" && $idioma_tres != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 3 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_tres != "Inscripción" && $tipo_tres != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 3 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "Refuerzo") {

				if ($refuerzo_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_tres >= "2" && $nivel_tres <= "12") {
				if ($fecha_termino_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}



		if ($idioma_cuatro != "") {
			if ($idioma_cuatro != "1" && $idioma_cuatro != "2" && $idioma_cuatro != "3" && $idioma_cuatro != "4" && $idioma_cuatro != "5" && $idioma_cuatro != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 4 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_cuatro != "Inscripción" && $tipo_cuatro != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 4 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "Refuerzo") {

				if ($refuerzo_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_cuatro >= "2" && $nivel_cuatro <= "12") {
				if ($fecha_termino_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}

		/*COMPROBAR LAS CLAVES*/

		if ($password != $confirmPass) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "Las claves que acaba de ingresar no coinciden",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		} else {
			$claveEncriptada = mainModel::encryption($password);
		}

		$datos_alumno_reg = [
			"curp" => $curp,
			"nombre" => $nombre,
			"apellido_paterno" => $apellido_paterno,
			"apellido_materno" => $apellido_materno,
			"sexo" => $sexo,
			"idioma" => $idioma,
			"nivel" => $nivel,
			"condicion" => $condicion,
			"tipo" => $tipo,
			"fecha_termino" => $fecha_termino,
			"refuerzo" => $refuerzo,
			"idioma_dos" => $idioma_dos,
			"nivel_dos" => $nivel_dos,
			"condicion_dos" => $condicion_dos,
			"tipo_dos" => $tipo_dos,
			"fecha_termino_dos" => $fecha_termino_dos,
			"refuerzo_dos" => $refuerzo_dos,
			"idioma_tres" => $idioma_tres,
			"nivel_tres" => $nivel_tres,
			"condicion_tres" => $condicion_tres,
			"tipo_tres" => $tipo_tres,
			"fecha_termino_tres" => $fecha_termino_tres,
			"refuerzo_tres" => $refuerzo_tres,
			"idioma_cuatro" => $idioma_cuatro,
			"nivel_cuatro" => $nivel_cuatro,
			"condicion_cuatro" => $condicion_cuatro,
			"tipo_cuatro" => $tipo_cuatro,
			"fecha_termino_cuatro" => $fecha_termino_cuatro,
			"refuerzo_cuatro" => $refuerzo_cuatro,
			"fecha_nacimiento" => $fecha_nacimiento,
			"residencia" => $residencia,
			"calle" => $calle,
			"numero" => $numero,
			"colonia" => $colonia,
			"cp" => $cp,
			"municipio" => $municipio,
			"estado" => $estado,
			"telefono" => $telefono,
			"correo" => $correo,
			"correo_unach" => $correo_unach,
			"observaciones" => $observaciones,
			"periodo" => $periodo,
			"dependencia" => $dependencia,
			"carrera_unach" => $carrera_unach,
			"matricula" => $matricula,
			"password" => $claveEncriptada,
			"lc1" => $lc1,
			"lc2" => $lc2,
			"lc3" => $lc3,
			"lc4" => $lc4,
			"id_rol" => $id_rol,
			"fecha_registro" => $fecha_registro

		];

		$agregar_alumno = alumnoModelo::agregar_alumno_modelo($datos_alumno_reg);

		if ($agregar_alumno->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Los datos del alumno se han guardado correctamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "Los datos no se han registrado",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
		exit();
	}

	/* CONTROLADOR PAGINAR USUARIO */

	public function paginador_alumno_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda)
	{
		$pagina = mainModel::limpiar_cadena($pagina);
		$registros = mainModel::limpiar_cadena($registros);
		$privilegio = mainModel::limpiar_cadena($privilegio);
		$curp = mainModel::limpiar_cadena($curp);

		$url = mainModel::limpiar_cadena($url);
		$url = SERVERURL . $url . "/";

		$busqueda = mainModel::limpiar_cadena($busqueda);
		$tabla = "";
		$pagina = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
		$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

		if (isset($busqueda) && $busqueda != "") {

			if ($_SESSION['privilegio_scaa'] == 4) {
				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . " ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC";
			} else {

				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='6' ORDER BY persona.apellido_paterno ASC";
			}
		} else {

			if ($_SESSION['privilegio_scaa'] == 4) {
				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . " ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='6' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC";
			} else {

				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='6' ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona WHERE curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC LIMIT $inicio,$registros";

				// 		$consulta3="SELECT * FROM persona WHERE curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC";
				$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE curso_asesorias.estatus_periodo='1' AND curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC";
			}
		}



		$claveDesencriptada = mainModel::decryption($password);
		$conexion = mainModel::conectar();
		$datos2 = $conexion->query($consulta2);
		$datos2 = $datos2->fetchAll();

		$datos3 = $conexion->query($consulta3);
		$total = $datos3->rowCount();


		$t2_Array = array();
		$t3_Array = array();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		//$total= $conexion->query("SELECT FOUND_ROWS()");
		//$total= (int) $total->fetchColumn();

		$Npaginas = ceil($total / $registros);


		foreach ($datos2 as $rows2) {
			if (!in_array($rows2['id_persona'], $t2_Array)) {
				$t2_Array[] = $rows2['id_persona'];
				$t3_Array[$rows2['id_persona']] = $rows2['etiqueta_idioma'];
			} else {
				$t3_Array[$rows2['id_persona']] = $t3_Array[$rows2['id_persona']] . ', ' . $rows2['etiqueta_idioma'];
			}
		}
		$temporal_Array = array();

		$tabla .= '						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Idioma (s)</th>';
		//<th>Periodo</th>
		//  <th>Fecha de nacimiento</th>
		$tabla .= '
						    <th>Teléfono</th>
						    <th>Correo</th>';
		if ($_SESSION['privilegio_scaa'] <= 3) {

			$tabla .= '<th>Curp</th>
					        <th>Contraseña</th>
							<th>Actualizar</th>
						  
						    <th>Ficha de inscripción</th>';
		}
		if ($_SESSION['privilegio_scaa'] == 4) {
			$tabla .= '<th>Condición</th>
							<th>Ficha de inscripción</th>';
		}

		$tabla .= '	</tr >
								</thead>
						          <tbody>';

		if ($total >= 1 && $pagina <= $Npaginas) {
			$contador = $inicio + 1;
			$reg_inicio = $inicio + 1;

			foreach ($datos as $rows) {
				// if(){

				//if(!in_array($rows['id_persona'], $temporal_Array)){

				$tabla .= ' 
						<tr class="text-center" >
			                <td data-label="#">' . $contador . '</td>
			                <td data-label="Nombre">' . $rows['apellido_paterno'] . ' ' . $rows['apellido_materno'] . ' ' . $rows['nombre'] . '</td>
			                <td data-label="Idioma (s)">' . $t3_Array[$rows['id_persona']] . '</td>';
				//<td data-label="Periodo">'.$rows2['periodo'].'</td>
				// <td data-label="Fecha de nacimiento">'.date('d-m-Y',strtotime($rows['fecha_nacimiento'])).'</td>
				$tabla .= '<td data-label="Teléfono">' . $rows['telefono'] . '</td>';
				if ($rows['correo_unach'] != "") {
					$tabla .= '<td data-label="Correo">' . $rows['correo_unach'] . '</td>';
				} else {
					$tabla .= '<td data-label="Correo">' . $rows['correo'] . '</td>';
				}
				if ($_SESSION['privilegio_scaa'] <= 3) {
					$tabla .= '<td data-label="Curp">' . $rows['curp'] . '</td>
			               <td data-label="Contraseña">' . mainModel::decryption($rows['password']) . '</td>
			                <td data-label="Actualizar">
			               
			                   <a href="' . SERVERURL . 'editarAlumno/' . mainModel::encryption($rows['id_persona']) . '/"><button class="btnActualizar">Actualizar</button></a>
			                  
			                 </td>
			                 
			                  <td data-label="Ficha inscripción">
			                  <form action="' . SERVERURL . 'tcpdf/fichaInscripcion.php" method="POST">

			                  <input type="hidden" name="curp" value="' . $rows['curp'] . '">
			                   <button class="btnFicha" type="submit">Ficha inscripción</button>

			                  </form>		                 	
		                      </td>';
				}
				if ($_SESSION['privilegio_scaa'] == 4) {
					$tabla .= '<td data-label="Condición">' . $rows['condicion'] . '</td>
			                 	 <td data-label="Ficha inscripción">
			                  <form action="' . SERVERURL . 'tcpdf/fichaInscripcion.php" method="POST">

			                  <input type="hidden" name="curp" value="' . $rows['curp'] . '">
			                   <button class="btnFicha" type="submit">Ficha inscripción</button>

			                  </form>		                 	
		                      </td>';
				}
				// }

				$tabla .= '</tr>';
				$contador++;
				$temporal_Array[] = $rows['id_persona'];
				//}
			}
			$reg_final = $contador - 1;
		} else {
			if ($total >= 1) {
				$tabla .= '<tr class="text-center" ><td colspan="10">
						          	<a href="' . $url . '" class="btns4" id="whiteText">Haga clic aquí para recargar el listado </a>
						          		</td></tr>';
			} else {
				$tabla .= '<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td></tr>';
			}
		}


		$tabla .= '</tbody></table></div><br>';


		if ($total >= 1 && $pagina <= $Npaginas) {
			$tabla .= '<p class="texto_derecha">Mostrando alumnos ' . $reg_inicio . ' al ' . $reg_final . ' de un total de ' . $total . '</p>';
			$tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
		}

		return $tabla;
	}/* FIN DEL CONTROLADOR */


	/* CONTROLADOR ELIMINAR SOLICITUD DE INSCRIPCIÓN */

	public function eliminar_alumno_controlador()
	{

		$id = mainModel::decryption($_POST['alumno_id_del']);
		$id = mainModel::limpiar_cadena($id);


		/*if($id==1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"No se puede eliminar a los usuarios principales del sistema",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
				}
					
					 COMPROBANDO PRIVILEGIOS */

		session_start(['name' => 'SCAA']);
		if ($_SESSION['privilegio_scaa'] != 1) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No tienes los permisos necesarios para realizar esta operación",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}
		$eliminar_alumno = alumnoModelo::eliminar_alumno_modelo($id);


		if ($eliminar_alumno->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "El alumno seleccionado ha sido eliminado del sistema correctamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido eliminar el alumno del sistema, porfavor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}/* FIN DEL CONTROLADOR */

	/* BUSCAR CP CONTROLADOR */

	public function buscar_cp_controlador()
	{
		$cp = mainModel::limpiar_cadena($_POST['cp']);

		$municipio = "";
		$estado = "";
		$colonia = array();


		$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM sepomex WHERE cp='$cp'";


		$conexion = mainModel::conectar();

		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		$total = $conexion->query("SELECT FOUND_ROWS()");
		$total = (int) $total->fetchColumn();
		$flag = 1;

		foreach ($datos as $row) {
			if ($flag) {
				echo $row['municipio'] . "&";
				echo $row['estado'] . "&";
			}
			$flag = 0;
			echo $row['asentamiento'] . "*";
		}
	}	/* FIN DEL CONTROLADOR */


	public function inscribir_alumno_controlador()
	{

		$id = mainModel::decryption($_POST['preins_id_decrypt']);
		$id = mainModel::limpiar_cadena($id);

		$curp = mainModel::limpiar_cadena($_POST['curp_alumno_reg']);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_preins_reg']);
		$apellido_paterno = mainModel::limpiar_cadena($_POST['apellido_paterno_reg']);
		$apellido_materno = mainModel::limpiar_cadena($_POST['apellido_materno_reg']);
		$sexo = mainModel::limpiar_cadena($_POST['sexo_ins_Reg']);
		$idioma = mainModel::limpiar_cadena($_POST['idioms_reg']);
		$nivel = mainModel::limpiar_cadena($_POST['nivel1']);
		$condicion = mainModel::limpiar_cadena($_POST['condicion_uno_reg']);
		$tipo = mainModel::limpiar_cadena($_POST['tipo_preins_reg']);
		$refuerzo = mainModel::limpiar_cadena($_POST['refuerzo_uno_reg']);
		$fecha_termino = mainModel::limpiar_cadena($_POST['fecha_termino_reg1']);
		$idioma_dos = mainModel::limpiar_cadena($_POST['idioms_reg2']);
		$nivel_dos = mainModel::limpiar_cadena($_POST['nivel2']);
		$condicion_dos = mainModel::limpiar_cadena($_POST['condicion_dos_reg']);
		$tipo_dos = mainModel::limpiar_cadena($_POST['tipo1']);
		$refuerzo_dos = mainModel::limpiar_cadena($_POST['refuerzo_dos_reg']);
		$fecha_termino_dos = mainModel::limpiar_cadena($_POST['fecha_termino_reg2']);
		$idioma_tres = mainModel::limpiar_cadena($_POST['idioms_reg3']);
		$nivel_tres = mainModel::limpiar_cadena($_POST['nivel3']);
		$condicion_tres = mainModel::limpiar_cadena($_POST['condicion_tres_reg']);
		$tipo_tres = mainModel::limpiar_cadena($_POST['tipo2']);
		$refuerzo_tres = mainModel::limpiar_cadena($_POST['refuerzo_tres_reg']);
		$fecha_termino_tres = mainModel::limpiar_cadena($_POST['fecha_termino_reg3']);
		$idioma_cuatro = mainModel::limpiar_cadena($_POST['idioms_reg4']);
		$nivel_cuatro = mainModel::limpiar_cadena($_POST['nivel4']);
		$condicion_cuatro = mainModel::limpiar_cadena($_POST['condicion_cuatro_reg']);
		$tipo_cuatro = mainModel::limpiar_cadena($_POST['tipo3']);
		$refuerzo_cuatro = mainModel::limpiar_cadena($_POST['refuerzo_cuatro_reg']);
		$fecha_termino_cuatro = mainModel::limpiar_cadena($_POST['fecha_termino_reg4']);
		$fecha_nacimiento1 = mainModel::limpiar_cadena($_POST['fecha_nacimiento_ins_reg']);
		$calle = mainModel::limpiar_cadena($_POST['calle_reg']);
		$numero = mainModel::limpiar_cadena($_POST['num_reg']);
		$colonia = mainModel::limpiar_cadena($_POST['col_reg']);
		$cp = mainModel::limpiar_cadena($_POST['cp_ins_Reg']);
		$municipio = mainModel::limpiar_cadena($_POST['municipio_ins_Reg']);
		$estado = mainModel::limpiar_cadena($_POST['estado_ins_Reg']);
		$telefono = mainModel::limpiar_cadena($_POST['tel_reg']);
		$correo = mainModel::limpiar_cadena($_POST['correo_reg']);
		$correo_unach = mainModel::limpiar_cadena($_POST['correo_unach_reg']);
		$periodo = mainModel::limpiar_cadena($_POST['periodo_reg']);

		$observaciones = mainModel::limpiar_cadena($_POST['observaciones_reg']);
		$id_curso = mainModel::limpiar_cadena($_POST['id_curso']);
		$id_curso2 = mainModel::limpiar_cadena($_POST['id_curso2']);
		$id_curso3 = mainModel::limpiar_cadena($_POST['id_curso3']);
		$id_curso4 = mainModel::limpiar_cadena($_POST['id_curso4']);
		$lc1 = mainModel::limpiar_cadena($_POST['lc1']);
		$lc2 = mainModel::limpiar_cadena($_POST['lc2']);
		$lc3 = mainModel::limpiar_cadena($_POST['lc3']);
		$lc4 = mainModel::limpiar_cadena($_POST['lc4']);

		$dependencia = mainModel::limpiar_cadena($_POST['dependencia']);
		$carrera_unach = mainModel::limpiar_cadena($_POST['carrera_unach']);
		$matricula = mainModel::limpiar_cadena($_POST['matricula_dependencia']);
		//$password=mainModel::limpiar_cadena($_POST['pass_reg']);
		$id_rol = "6";

		$fecha_nacimiento = date('Y-m-d', strtotime($fecha_nacimiento1));


		if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $curp == "" || $sexo == "" || $nivel == "" || $condicion == "" || $tipo == "" || $idioma == "" ||  $fecha_nacimiento == "" || $colonia == "" || $cp == "" || $municipio == "" || $estado == ""  || $telefono == "" || $correo == "" || $periodo == "") {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No ha llenado todos los campos obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
		if (mainModel::verificar_datos("[a-zA-Z0-9]{18,18}", $curp)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El CURP no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $nombre)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Nombre no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $apellido_paterno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido paterno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}", $apellido_materno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido materno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}", $calle)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El campo calle no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[0-9]{0,5}", $numero)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El campo número no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}", $colonia)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El campo colonia no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if (mainModel::verificar_datos("[0-9]{5,5}", $cp)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El código postal no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}", $municipio)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El municipio no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}", $estado)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El estado no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if ($tipo != "Inscripción" && $tipo != "Reinscripción") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de inscripción solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($sexo != "Masculino" && $sexo != "Femenino") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de sexo solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}




		if (mainModel::verificar_datos("[0-9]{10,10}", $telefono)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El teléfono no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if ($matricula != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 ,]{2,20}", $matricula)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "La matrícula no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if (mainModel::verificar_datos("[1-6]{1,2}", $idioma)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El idioma no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		/*
						if(mainModel::verificar_datos("[A-Za-z0-9$@.-]{6,100}",$password)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"Las contraseñas no coinciden con el formato solicitado",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

						}
				*/

		if (mainModel::verificar_fecha($fecha_nacimiento)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "La fecha de nacimiento no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($dependencia == "Estudiante UNACH") {
			if ($carrera_unach == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor señale la carrera, maestría o doctorado del estudiante UNACH.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($condicion == "Refuerzo") {

			if ($refuerzo == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor indique el tipo de refuerzo para el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($observaciones != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}", $observaciones)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Las observaciones no coinciden con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($nivel >= "2" && $nivel <= "12") {
			if ($fecha_termino == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}




		if ($idioma_dos != "") {
			if ($idioma_dos != "1" && $idioma_dos != "2" && $idioma_dos != "3" && $idioma_dos != "4" && $idioma_dos != "5" && $idioma_dos != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 2 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_dos != "Inscripción" && $tipo_dos != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 2 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "Refuerzo") {

				if ($refuerzo_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_dos >= "2" && $nivel_dos <= "12") {
				if ($fecha_termino_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}


		if ($idioma_tres != "") {
			if ($idioma_tres != "1" && $idioma_tres != "2" && $idioma_tres != "3" && $idioma_tres != "4" && $idioma_tres != "5" && $idioma_tres != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 3 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_tres != "Inscripción" && $tipo_tres != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 3 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "Refuerzo") {

				if ($refuerzo_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_tres >= "2" && $nivel_tres <= "12") {
				if ($fecha_termino_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}



		if ($idioma_cuatro != "") {
			if ($idioma_cuatro != "1" && $idioma_cuatro != "2" && $idioma_cuatro != "3" && $idioma_cuatro != "4" && $idioma_cuatro != "5" && $idioma_cuatro != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 4 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_cuatro != "Inscripción" && $tipo_cuatro != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 4 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "Refuerzo") {

				if ($refuerzo_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_cuatro >= "2" && $nivel_cuatro <= "12") {
				if ($fecha_termino_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
		}


		/* COMPROBANDO CURP */

		/*					$check_curp=mainModel::ejecutar_consulta_simple("SELECT curp FROM persona WHERE curp='$curp'");
						if($check_curp->rowCount()>0){
							$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El CURP ingresado ya se encuentra registrado en el sistema. Verifique sus datos",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();


					}*/


		$datos_inscripcion = [
			"curp" => $curp,
			"nombre" => $nombre,
			"apellido_paterno" => $apellido_paterno,
			"apellido_materno" => $apellido_materno,
			"sexo" => $sexo,
			"idioma" => $idioma,
			"nivel" => $nivel,
			"condicion" => $condicion,
			"tipo" => $tipo,
			"refuerzo" => $refuerzo,
			"fecha_termino" => $fecha_termino,
			"idioma_dos" => $idioma_dos,
			"nivel_dos" => $nivel_dos,
			"condicion_dos" => $condicion_dos,
			"tipo_dos" => $tipo_dos,
			"refuerzo_dos" => $refuerzo_dos,
			"fecha_termino_dos" => $fecha_termino_dos,
			"idioma_tres" => $idioma_tres,
			"nivel_tres" => $nivel_tres,
			"condicion_tres" => $condicion_tres,
			"tipo_tres" => $tipo_tres,
			"refuerzo_tres" => $refuerzo_tres,
			"fecha_termino_tres" => $fecha_termino_tres,
			"idioma_cuatro" => $idioma_cuatro,
			"nivel_cuatro" => $nivel_cuatro,
			"condicion_cuatro" => $condicion_cuatro,
			"tipo_cuatro" => $tipo_cuatro,
			"refuerzo_cuatro" => $refuerzo_cuatro,
			"fecha_termino_cuatro" => $fecha_termino_cuatro,
			"fecha_nacimiento" => $fecha_nacimiento,
			"calle" => $calle,
			"numero" => $numero,
			"colonia" => $colonia,
			"cp" => $cp,
			"municipio" => $municipio,
			"estado" => $estado,
			"telefono" => $telefono,
			"correo" => $correo,
			"correo_unach" => $correo_unach,
			"periodo" => $periodo,
			"dependencia" => $dependencia,
			"carrera_unach" => $carrera_unach,
			"matricula" => $matricula,
			"observaciones" => $observaciones,
			"id_curso" => $id_curso,
			"id_curso2" => $id_curso2,
			"id_curso3" => $id_curso3,
			"id_curso4" => $id_curso4,
			"lc1" => $lc1,
			"lc2" => $lc2,
			"lc3" => $lc3,
			"lc4" => $lc4,
			"id" => $id,
			"id_rol" => $id_rol
		];

		$inscribir_alumno = alumnoModelo::inscribir_alumno_modelo($datos_inscripcion);



		if ($inscribir_alumno->rowCount() == 1) {

			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Los datos del alumno se han guardado y la solicitud de inscripción del mismo se ha borrado del sistema con éxito.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "Los datos no se han registrado",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	/* CONTROLADOR DATOS ALUMNO */

	public function datos_alumno_controlador($tipo, $id)
	{

		$tipo = mainModel::limpiar_cadena($tipo);
		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return alumnoModelo::datos_alumno_modelo($tipo, $id);
	} /* FIN DEL CONTROLADOR */


	/* CONTROLADOR EDITAR ALUMNO */

	public function editar_alumno_controlador()
	{

		$id = mainModel::decryption($_POST['alu_id_decrypt']);
		$id = mainModel::limpiar_cadena($id);

		$curp = mainModel::limpiar_cadena($_POST['curp_alu_edit']);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_alu_edit']);
		$apellido_paterno = mainModel::limpiar_cadena($_POST['apellido_paterno_edit']);
		$apellido_materno = mainModel::limpiar_cadena($_POST['apellido_materno_edit']);
		$sexo = mainModel::limpiar_cadena($_POST['sex_alu_edit']);
		$idioma = mainModel::limpiar_cadena($_POST['idioms_alu_edit']);
		$nivel = mainModel::limpiar_cadena($_POST['nivel1']);
		$condicion = mainModel::limpiar_cadena($_POST['condicion_uno_reg']);
		$tipo = mainModel::limpiar_cadena($_POST['tipo_preins_reg']);
		$refuerzo = mainModel::limpiar_cadena($_POST['refuerzo_uno_reg']);
		$fecha_termino = mainModel::limpiar_cadena($_POST['fecha_termino_reg1']);
		$idioma_dos = mainModel::limpiar_cadena($_POST['idioms_reg2']);
		$nivel_dos = mainModel::limpiar_cadena($_POST['nivel2']);
		$condicion_dos = mainModel::limpiar_cadena($_POST['condicion_dos_reg']);
		$tipo_dos = mainModel::limpiar_cadena($_POST['tipo1']);
		$refuerzo_dos = mainModel::limpiar_cadena($_POST['refuerzo_dos_reg']);
		$fecha_termino_dos = mainModel::limpiar_cadena($_POST['fecha_termino_reg2']);
		$idioma_tres = mainModel::limpiar_cadena($_POST['idioms_reg3']);
		$nivel_tres = mainModel::limpiar_cadena($_POST['nivel3']);
		$condicion_tres = mainModel::limpiar_cadena($_POST['condicion_tres_reg']);
		$tipo_tres = mainModel::limpiar_cadena($_POST['tipo2']);
		$refuerzo_tres = mainModel::limpiar_cadena($_POST['refuerzo_tres_reg']);
		$fecha_termino_tres = mainModel::limpiar_cadena($_POST['fecha_termino_reg3']);
		$idioma_cuatro = mainModel::limpiar_cadena($_POST['idioms_reg4']);
		$nivel_cuatro = mainModel::limpiar_cadena($_POST['nivel4']);
		$condicion_cuatro = mainModel::limpiar_cadena($_POST['condicion_cuatro_reg']);
		$tipo_cuatro = mainModel::limpiar_cadena($_POST['tipo3']);
		$refuerzo_cuatro = mainModel::limpiar_cadena($_POST['refuerzo_cuatro_reg']);
		$fecha_termino_cuatro = mainModel::limpiar_cadena($_POST['fecha_termino_reg4']);
		$fecha_nacimiento1 = mainModel::limpiar_cadena($_POST['fecha_nacimiento_alu_edit']);
		$calle = mainModel::limpiar_cadena($_POST['calle_edit']);
		$numero = mainModel::limpiar_cadena($_POST['num_edit']);
		$colonia = mainModel::limpiar_cadena($_POST['col_edit']);
		$cp = mainModel::limpiar_cadena($_POST['cp_alu_edit']);
		$municipio = mainModel::limpiar_cadena($_POST['municipio_alu_edit']);
		$estado = mainModel::limpiar_cadena($_POST['estado_alu_edit']);
		$telefono = mainModel::limpiar_cadena($_POST['tel_edit']);
		$correo = mainModel::limpiar_cadena($_POST['correo_edit']);
		$correo_unach = mainModel::limpiar_cadena($_POST['correo_unach_edit']);
		$periodo = mainModel::limpiar_cadena($_POST['periodo_reg']);
		$observaciones = mainModel::limpiar_cadena($_POST['observaciones_reg']);
		$dependencia = mainModel::limpiar_cadena($_POST['dependencia']);
		$carrera_unach = mainModel::limpiar_cadena($_POST['carrera_unach']);
		$matricula = mainModel::limpiar_cadena($_POST['matricula_dependencia']);
		$residencia = mainModel::limpiar_cadena($_POST['residencia']);
		$lc1 = mainModel::limpiar_cadena($_POST['lc1']);
		$lc2 = mainModel::limpiar_cadena($_POST['lc2']);
		$lc3 = mainModel::limpiar_cadena($_POST['lc3']);
		$lc4 = mainModel::limpiar_cadena($_POST['lc4']);
		$periodo2 = mainModel::limpiar_cadena($_POST['periodo_reg2']);
		$periodo3 = mainModel::limpiar_cadena($_POST['periodo_reg3']);
		$periodo4 = mainModel::limpiar_cadena($_POST['periodo_reg4']);

		$id_curso = mainModel::limpiar_cadena($_POST['id_curso']);
		$id_curso2 = mainModel::limpiar_cadena($_POST['id_curso2']);
		$id_curso3 = mainModel::limpiar_cadena($_POST['id_curso3']);
		$id_curso4 = mainModel::limpiar_cadena($_POST['id_curso4']);


		$fecha_nacimiento = date('Y-m-d', strtotime($fecha_nacimiento1));


		if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $curp == "" || $sexo == "" || $tipo == "" || $idioma == "" ||  $fecha_nacimiento == "" || $telefono == "" || $correo == "" ||  $dependencia == "" || $periodo == "") {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No ha llenado todos los campos obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($residencia == "Nacional") {
			if ($colonia == "" || $cp == "" || $municipio == "" || $estado == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor complete los datos de su domicilio.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		/* VERIFICAR LA INTEGRIDAD DE LOS DATOS */
		if (mainModel::verificar_datos("[a-zA-Z0-9]{18,18}", $curp)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El CURP no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $nombre)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Nombre no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}", $apellido_paterno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido paterno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{1,50}", $apellido_materno)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Apellido materno no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($calle != "") {

			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ. 0-9]{0,50}", $calle)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo calle no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($numero != "") {

			if (mainModel::verificar_datos("[0-9]{0,5}", $numero)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo número no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($colonia != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,100}", $colonia)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El campo colonia no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($cp != "") {
			if (mainModel::verificar_datos("[0-9]{5,5}", $cp)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El código postal no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($municipio != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ 0-9]{2,50}", $municipio)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El municipio no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($estado != "") {
			if (mainModel::verificar_datos("[a-z A-Z áéíóúñÁÉÍÓÚÑ]{2,50}", $estado)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El estado no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($tipo != "Inscripción" && $tipo != "Reinscripción") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de inscripción solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($sexo != "Masculino" && $sexo != "Femenino") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El tipo de sexo solicitado no es válido",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}




		if (mainModel::verificar_datos("[0-9]{10,10}", $telefono)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El teléfono no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if ($matricula != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 ,]{2,20}", $matricula)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "La matrícula no coincide con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if (mainModel::verificar_datos("[1-6]{1,2}", $idioma)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El idioma no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		if (mainModel::verificar_fecha($fecha_nacimiento)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "La fecha de nacimiento no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if ($dependencia == "Estudiante UNACH") {
			if ($carrera_unach == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor señale la carrera, maestría o doctorado del estudiante UNACH.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($observaciones != "") {
			if (mainModel::verificar_datos("[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}", $observaciones)) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Las observaciones no coinciden con el formato solicitado",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($condicion == "Refuerzo") {

			if ($refuerzo == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor indique el tipo de refuerzo para el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($nivel >= "2" && $nivel <= "12") {
			if ($fecha_termino == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 1.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}




		if ($idioma_dos != "") {
			if ($idioma_dos != "1" && $idioma_dos != "2" && $idioma_dos != "3" && $idioma_dos != "4" && $idioma_dos != "5" && $idioma_dos != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 2 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_dos != "Inscripción" && $tipo_dos != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 2 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_dos == "Refuerzo") {

				if ($refuerzo_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_dos >= "2" && $nivel_dos <= "12") {
				if ($fecha_termino_dos == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 2.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($periodo2 == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione el periodo para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($idioma_tres != "") {
			if ($idioma_tres != "1" && $idioma_tres != "2" && $idioma_tres != "3" && $idioma_tres != "4" && $idioma_tres != "5" && $idioma_tres != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 3 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_tres != "Inscripción" && $tipo_tres != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 3 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_tres == "Refuerzo") {

				if ($refuerzo_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_tres >= "2" && $nivel_tres <= "12") {
				if ($fecha_termino_tres == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 3.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($periodo3 == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione el periodo para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}



		if ($idioma_cuatro != "") {
			if ($idioma_cuatro != "1" && $idioma_cuatro != "2" && $idioma_cuatro != "3" && $idioma_cuatro != "4" && $idioma_cuatro != "5" && $idioma_cuatro != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El idioma 4 no coincide con el formato requerido. El sistema solo acepta los idiomas comenzando con letra mayúscula y con los acentos correspondientes.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_cuatro != "Inscripción" && $tipo_cuatro != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 4 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione la condición del alumno para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($condicion_cuatro == "Refuerzo") {

				if ($refuerzo_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor indique el tipo de refuerzo para el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}

			if ($nivel_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_cuatro >= "2" && $nivel_cuatro <= "12") {
				if ($fecha_termino_cuatro == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor señale la fecha de término del nivel anterior en el idioma 4.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			}
			if ($periodo4 == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione el periodo para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		$datos_edit = [
			"curp" => $curp,
			"nombre" => $nombre,
			"apellido_paterno" => $apellido_paterno,
			"apellido_materno" => $apellido_materno,
			"sexo" => $sexo,
			"idioma" => $idioma,
			"nivel" => $nivel,
			"condicion" => $condicion,
			"tipo" => $tipo,
			"refuerzo" => $refuerzo,
			"fecha_termino" => $fecha_termino,
			"idioma_dos" => $idioma_dos,
			"nivel_dos" => $nivel_dos,
			"condicion_dos" => $condicion_dos,
			"tipo_dos" => $tipo_dos,
			"refuerzo_dos" => $refuerzo_dos,
			"fecha_termino_dos" => $fecha_termino_dos,
			"idioma_tres" => $idioma_tres,
			"nivel_tres" => $nivel_tres,
			"condicion_tres" => $condicion_tres,
			"tipo_tres" => $tipo_tres,
			"refuerzo_tres" => $refuerzo_tres,
			"fecha_termino_tres" => $fecha_termino_tres,
			"idioma_cuatro" => $idioma_cuatro,
			"nivel_cuatro" => $nivel_cuatro,
			"condicion_cuatro" => $condicion_cuatro,
			"tipo_cuatro" => $tipo_cuatro,
			"refuerzo_cuatro" => $refuerzo_cuatro,
			"fecha_termino_cuatro" => $fecha_termino_cuatro,
			"fecha_nacimiento" => $fecha_nacimiento,
			"calle" => $calle,
			"numero" => $numero,
			"colonia" => $colonia,
			"cp" => $cp,
			"municipio" => $municipio,
			"estado" => $estado,
			"telefono" => $telefono,
			"correo" => $correo,
			"correo_unach" => $correo_unach,
			"periodo" => $periodo,
			"periodo2" => $periodo2,
			"periodo3" => $periodo3,
			"periodo4" => $periodo4,
			"dependencia" => $dependencia,
			"carrera_unach" => $carrera_unach,
			"matricula" => $matricula,
			"residencia" => $residencia,
			"id_curso" => $id_curso,
			"id_curso2" => $id_curso2,
			"id_curso3" => $id_curso3,
			"id_curso4" => $id_curso4,
			"lc1" => $lc1,
			"lc2" => $lc2,
			"lc3" => $lc3,
			"lc4" => $lc4,
			"observaciones" => $observaciones,
			"id" => $id
		];


		$editar_alumno = alumnoModelo::editar_alumno_modelo($datos_edit);



		if (!$editar_alumno) {

			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Los datos del alumno se han actualizado con éxito.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error 111 inesperado",
				"Texto" => "Los datos no se han actualizado, verifiquelos",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
		//print_r($variable_errores);

	} /* FIN DEL CONTROLADOR */


	public function eliminar_curso_asesoria_controlador()
	{

		$id = mainModel::limpiar_cadena($_POST['eliminarId']);


		$eliminar_curso_asesoria = alumnoModelo::eliminar_curso_asesoria_modelo($id);


		if ($eliminar_curso_asesoria->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "El curso seleccionado ha sido eliminado del sistema correctamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido eliminar el curso del sistema, porfavor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	public function finalizar_periodo_controlador()
	{

		$periodo = mainModel::limpiar_cadena($_POST['finalizarPeriodo']);

		$finalizar_periodo = alumnoModelo::finalizar_periodo_modelo($periodo);

		if ($finalizar_periodo->rowCount() != 0) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "El periodo seleccionado ha sido finalizado correctamente.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido finalizar el periodo seleccionado, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	public function lista_idiomas_inscritos($pagina)
	{
		$pagina = mainModel::decryption($pagina);
		$id = mainModel::limpiar_cadena($pagina);
		// $registros=mainModel::limpiar_cadena($registros);
		$contador = 1;

		$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.id_persona='$id' AND curso_asesorias.estatus_periodo='1' ORDER BY curso_asesorias.id_curso_asesoria ASC";
		$conexion = mainModel::conectar();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();
		$tabla = "";
		$tabla .= '						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr> <p class="pBold">Idiomas inscritos actualmente</p></tr>
						  <tr class="text-center">
						    <th style="font-size:18px;">#</th>
						    <th style="font-size:18px;">Idioma</th>
						    <th style="font-size:18px;">Nivel</th>';


		$tabla .= '	</tr >
								</thead>
						          <tbody>';

		foreach ($datos as $rows) {

			if ($rows['id_idioma'] == 1) {
				$nombre_idioma = "Inglés";
			}
			if ($rows['id_idioma'] == 2) {
				$nombre_idioma = "Francés";
			}
			if ($rows['id_idioma'] == 3) {
				$nombre_idioma = "Alemán";
			}
			if ($rows['id_idioma'] == 4) {
				$nombre_idioma = "Italiano";
			}
			if ($rows['id_idioma'] == 5) {
				$nombre_idioma = "Chino";
			}
			if ($rows['id_idioma'] == 6) {
				$nombre_idioma = "Español";
			}

			$tabla .= ' 
						<tr class="text-center" style="font-size:18px;">
			                <td data-label="#">' . $contador . '</td>
			                <td data-label="Nombre"> ' . $nombre_idioma . '</td>
			                <td data-label="Idioma (s)">' . $rows['nivel'] . '</td>';

			$tabla .= '</tr>';
			$contador++;
		}
		$tabla .= '</tbody></table></div><br>';

		return $tabla;
	} /* FIN DEL CONTROLADOR */

	public function lista_idiomas_para_inscribir($pagina)
	{
		$pagina = mainModel::decryption($pagina);
		$id = mainModel::limpiar_cadena($pagina);
		// $registros=mainModel::limpiar_cadena($registros);
		$contador = 1;

		if (!$_SESSION['logged'] || $_SESSION['privilegio_scaa'] == 6) {


			$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.id_persona='$id' AND (curso_asesorias.estatus_periodo='0' OR curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY curso_asesorias.id_curso_asesoria ASC";
		} else {

			$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE persona.id_persona='$id' AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY curso_asesorias.id_curso_asesoria ASC";
		}

		$conexion = mainModel::conectar();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();
		$tabla = "";
		if ($_SESSION['logged'] && $_SESSION['privilegio_scaa'] <= 3) {
			$tabla .= '						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr> <p class="pBold">Idiomas por inscribir</p></tr>
						  <tr class="text-center">
						    <th style="font-size:18px;">#</th>
						    <th style="font-size:18px;">Idioma</th>
						    <th style="font-size:18px;">Nivel</th>';
		} else {
			$tabla .= '						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr> <p class="pBold">Idiomas por inscribir</p></tr>
						  <tr class="text-center">
						    <th style="font-size:18px;">#</th>
						    <th style="font-size:18px;">Idioma</th>
						    <th style="font-size:18px;">Nivel</th>
						    <th style="font-size:18px;">Solicitar inscripción</th>';
		}



		$tabla .= '	</tr >
								</thead>
						          <tbody>';

		foreach ($datos as $rows) {

			if ($rows['id_idioma'] == 1) {
				$nombre_idioma = "Inglés";
			}
			if ($rows['id_idioma'] == 2) {
				$nombre_idioma = "Francés";
			}
			if ($rows['id_idioma'] == 3) {
				$nombre_idioma = "Alemán";
			}
			if ($rows['id_idioma'] == 4) {
				$nombre_idioma = "Italiano";
			}
			if ($rows['id_idioma'] == 5) {
				$nombre_idioma = "Chino";
			}
			if ($rows['id_idioma'] == 6) {
				$nombre_idioma = "Español";
			}

			$tabla .= ' 
						<tr class="text-center" style="font-size:18px;">
			                <td data-label="#">' . $contador . '</td>
			                <td data-label="Idioma"> ' . $nombre_idioma . '</td>
			                <td data-label="Nivel">' . $rows['nivel'] . '</td>';
			if ($_SESSION['logged'] && $_SESSION['privilegio_scaa'] <= 3) {

				if ($rows['estatus_periodo'] == "2") {

					$tabla .= '
				                   	<td data-label="Solicitar inscripción">
									<form class="FormularioAjax" action="' . SERVERURL . 'ajax/alumnoAjax.php" 	method="POST" data-form="question" autocomplete="off">
									<select name="periodoReinscripcion" required>
									<option value="">Periodo</option>
									<option value="ENERO 2021 - AGOSTO 2021">ENERO 2021 - AGOSTO 2021</option>
									<option value="ABRIL 2021 - OCTUBRE 2021">ABRIL 2021 - OCTUBRE 2021</option>
									<option value="AGOSTO 2021 - ENERO 2022">AGOSTO 2021 - ENERO 2022</option>
									<option value="OCTUBRE 2021 - ABRIL 2022">OCTUBRE 2021 - ABRIL 2022</option>

									<option value="ENERO 2022 - AGOSTO 2022">ENERO 2022 - AGOSTO 2022</option>
									<option value="ABRIL 2022 - OCTUBRE 2022">ABRIL 2022 - OCTUBRE 2022</option>
									<option value="AGOSTO 2022 - ENERO 2023">AGOSTO 2022 - ENERO 2023</option>
									<option value="OCTUBRE 2022 - ABRIL 2023">OCTUBRE 2022 - ABRIL 2023</option>

									<option value="ENERO 2023 - AGOSTO 2023">ENERO 2023 - AGOSTO 2023</option>
									<option value="ABRIL 2023 - OCTUBRE 2023">ABRIL 2023 - OCTUBRE 2023</option>
									<option value="AGOSTO 2023 - ENERO 2024">AGOSTO 2023 - ENERO 2024</option>
									<option value="OCTUBRE 2023 - ABRIL 2024">OCTUBRE 2023 - ABRIL 2024</option>
									</select>
									<input type="text" name="observaciones" placeholder="observaciones" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}" ></input>
									 <input type="hidden" name="reinscripcion_SS" value="' . $rows['id_curso_asesoria'] . '">
									 <input type="hidden" name="solicitar_reinscripcion" value="1">
									 <input type="hidden" name="id_persona" value="' . $id . '"> 
									
									<button type="submit" class="btnReinscribir">Reinscribir</button>
									 </form></td>';
				}

				if ($rows['estatus_periodo'] == "3") {

					$tabla .= '
				                   	<td data-label="Solicitar inscripción">

									<form class="FormularioAjax" action="' . SERVERURL . 'ajax/alumnoAjax.php" 	method="POST" data-form="question" autocomplete="off">
									
									 <input type="hidden" name="reinscripcion_SS" value="' . $rows['id_curso_asesoria'] . '">
									 <input type="hidden" name="solicitar_reinscripcion" value="1">
									 <input type="hidden" name="id_persona" value="' . $id . '"> 

									<select name="condicion" id="condicion_uno_reg">
									<option value="">Condición</option>
									<option value="Regular">Regular</option>
									<option value="Recursador">Recursador</option>
									<option value="Refuerzo">Refuerzo</option>
									</select>
									
									<select name="nivel" id="nivel1">
									<option value="">Nivel</option>
									<option value="1"';
					if ($rows['nivel'] == "1") {
						$tabla .= 'selected';
					}
					$tabla .= '>1</option>
									<option value="2"';
					if ($rows['nivel'] == "2") {
						$tabla .= 'selected';
					}
					$tabla .= '>2</option>
									<option value="3"';
					if ($rows['nivel'] == "3") {
						$tabla .= 'selected';
					}
					$tabla .= '>3</option>
									<option value="4"';
					if ($rows['nivel'] == "4") {
						$tabla .= 'selected';
					}
					$tabla .= '>4</option>
									<option value="5"';
					if ($rows['nivel'] == "5") {
						$tabla .= 'selected';
					}
					$tabla .= '>5</option>
									<option value="6"';
					if ($rows['nivel'] == "6") {
						$tabla .= 'selected';
					}
					$tabla .= '>6</option>
									<option value="7"';
					if ($rows['nivel'] == "7") {
						$tabla .= 'selected';
					}
					$tabla .= '>7</option>
									<option value="8"';
					if ($rows['nivel'] == "8") {
						$tabla .= 'selected';
					}
					$tabla .= '>8</option>
									<option value="9"';
					if ($rows['nivel'] == "9") {
						$tabla .= 'selected';
					}
					$tabla .= '>9</option>
									<option value="10"';
					if ($rows['nivel'] == "10") {
						$tabla .= 'selected';
					}
					$tabla .= '>10</option>
									<option value="11"';
					if ($rows['nivel'] == "11") {
						$tabla .= 'selected';
					}
					$tabla .= '>11</option>
									<option value="12"';
					if ($rows['nivel'] == "12") {
						$tabla .= 'selected';
					}
					$tabla .= '>12</option>
									<option value="Ubicación"';
					if ($rows['nivel'] == "Ubicación") {
						$tabla .= 'selected';
					}
					$tabla .= '>Ubicación</option>									
									</select>
									
									<input type="date" name="fecha_termino" id="fecha_termino_reg1"></input>
									
									<input type="text" name="refuerzo" id="refuerzo1" placeholder="Refuerzo" class="refuerzo_dis"></input>
									
									<select name="lc">
									<option value="0">CL</option>
									<option value="0">No</option>
									<option value="1">Sí</option>
									</select>
									
									<select name="periodoReinscripcion" required>
									<option value="">Periodo</option>
									<option value="ENERO 2021 - AGOSTO 2021">ENERO 2021 - AGOSTO 2021</option>
									<option value="ABRIL 2021 - OCTUBRE 2021">ABRIL 2021 - OCTUBRE 2021</option>
									<option value="AGOSTO 2021 - ENERO 2022">AGOSTO 2021 - ENERO 2022</option>
									<option value="OCTUBRE 2021 - ABRIL 2022">OCTUBRE 2021 - ABRIL 2022</option>

									<option value="ENERO 2022 - AGOSTO 2022">ENERO 2022 - AGOSTO 2022</option>
									<option value="ABRIL 2022 - OCTUBRE 2022">ABRIL 2022 - OCTUBRE 2022</option>
									<option value="AGOSTO 2022 - ENERO 2023">AGOSTO 2022 - ENERO 2023</option>
									<option value="OCTUBRE 2022 - ABRIL 2023">OCTUBRE 2022 - ABRIL 2023</option>

									<option value="ENERO 2023 - AGOSTO 2023">ENERO 2023 - AGOSTO 2023</option>
									<option value="ABRIL 2023 - OCTUBRE 2023">ABRIL 2023 - OCTUBRE 2023</option>
									<option value="AGOSTO 2023 - ENERO 2024">AGOSTO 2023 - ENERO 2024</option>
									<option value="OCTUBRE 2023 - ABRIL 2024">OCTUBRE 2023 - ABRIL 2024</option>
									</select>
									<input type="text" name="observaciones" placeholder="observaciones" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ ,.]{2,100}" ></input>
									
									<button type="submit" class="btnActualizar">Agregar</button>
									 </form></td>';
				}
			}
			if (!$_SESSION['logged'] || $_SESSION['privilegio_scaa'] == 6) {

				if ($rows['estatus_periodo'] == "0") {
					$tabla .= '
				             		 <td data-label="Solicitar inscripción">
									<form class="FormularioAjax" action="' . SERVERURL . 'ajax/alumnoAjax.php" 	method="POST" data-form="save" autocomplete="off">
									
									 <input type="hidden" name="reinscripcion_SS" value="' . $rows['id_curso_asesoria'] . '">
									 <input type="hidden" name="solicitar_reinscripcion" value="2">
									
									<button type="submit" class="btnAsesoriaIncompleta">Solicitar</button>
									 </form></td>';
				}

				if ($rows['estatus_periodo'] == "2") {

					$tabla .= '
				                   	<td data-label="Solicitar inscripción">
									<form class="FormularioAjax" action="' . SERVERURL . 'ajax/alumnoAjax.php" 	method="POST" data-form="question" autocomplete="off">
									
									 <input type="hidden" name="reinscripcion_SS" value="' . $rows['id_curso_asesoria'] . '">
									 <input type="hidden" name="solicitar_reinscripcion" value="0">
									
									<button type="submit" class="btnEliminar">Cancelar</button>
									 </form></td>';
				}


				if ($rows['estatus_periodo'] == "3") {

					$tabla .= '
				                   	<td data-label="Solicitar inscripción">
									<label style="font-size:18px; background-color:#D3AA2C;padding:5px;">Solicitada</label>
									</td>';
				}
			}
			$tabla .= '</tr>';
			$contador++;
		}
		$tabla .= '</tbody></table></div><br>';

		return $tabla;
	} /* FIN DEL CONTROLADOR */

	public function seleccionar_idiomas_reinscripcion()
	{

		$id_reinscripcion = mainModel::decryption($_POST['id_reinscripcion']);
		$id_persona = mainModel::limpiar_cadena($id_reinscripcion);


		if ($id_persona) {

			echo "<script> location.href='" . SERVERURL . "reinscripcion2/" . mainModel::encryption($id_persona) . "/'</script>";
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido finalizar el periodo seleccionado, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	public function solicitar_reinscripcion_controlador()
	{

		$solicitar = mainModel::limpiar_cadena($_POST['solicitar_reinscripcion']);
		$id_curso_asesoria = mainModel::limpiar_cadena($_POST['reinscripcion_SS']);
		$nivel = mainModel::limpiar_cadena($_POST['nivel']);
		$condicion = mainModel::limpiar_cadena($_POST['condicion']);
		$refuerzo = mainModel::limpiar_cadena($_POST['refuerzo']);
		$periodo = mainModel::limpiar_cadena($_POST['periodoReinscripcion']);
		$fecha_termino = mainModel::limpiar_cadena($_POST['fecha_termino']);
		$nivel = mainModel::limpiar_cadena($_POST['nivel']);
		$lc = mainModel::limpiar_cadena($_POST['lc']);
		$observaciones = mainModel::limpiar_cadena($_POST['observaciones']);
		$id_persona = mainModel::limpiar_cadena($_POST['id_persona']);
		// $fecha = new DateTime();
		$tiempo = date('Y-m-d H:i', strtotime('Now'));
		// print_r($tiempo);
		// exit();

		if ($solicitar == "1") {

			if ($periodo == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione el periodo de inscripción de éste idioma.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel != "") {

				if ($condicion == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor seleccione la condición del alumno.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}

				if ($condicion == "Refuerzo") {

					if ($refuerzo == "") {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Ocurrió un error inesperado",
							"Texto" => "Por favor indique el tipo de refuerzo.",
							"Tipo" => "error"
						];
						echo json_encode($alerta);
						exit();
					}
				}

				if ($nivel == "") {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "Por favor seleccione un nivel.",
						"Tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}

				if ($nivel >= "2" && $nivel <= "12") {
					if ($fecha_termino == "") {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Ocurrió un error inesperado",
							"Texto" => "Por favor señale la fecha de término del nivel anterior.",
							"Tipo" => "error"
						];
						echo json_encode($alerta);
						exit();
					}
				}
			}

			$datos = [
				"solicitar" => $solicitar,
				"id_curso_asesoria" => $id_curso_asesoria,
				"nivel" => $nivel,
				"condicion" => $condicion,
				"refuerzo" => $refuerzo,
				"periodo" => $periodo,
				"fecha_termino" => $fecha_termino,
				"nivel" => $nivel,
				"lc" => $lc,
				"observaciones" => $observaciones,
				"id_persona" => $id_persona
			];
		} else {

			$datos = [
				"solicitar" => $solicitar,
				"id_curso_asesoria" => $id_curso_asesoria,
				"tiempo" => $tiempo
			];
		}

		$solicitar_reinscripcion = alumnoModelo::solicitar_reinscripcion_modelo($datos);

		if ($solicitar == "2" || $solicitar == "3") {

			if ($solicitar_reinscripcion->rowCount() > 0) {

				$alerta = [
					"Alerta" => "recargar",
					"Titulo" => "Operación exitosa",
					"Texto" => "Se ha realizado correctamente su solicitud de reinscripción al idioma seleccionado. En los próximos días recibirá un correo electrónico con los datos para el pago de su ficha.",
					"Tipo" => "success"
				];
			} else {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "No se ha podido realizar su solicitud de reinscripción, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
					"Tipo" => "error"
				];
			}
		} else {
			if ($solicitar == "1") {

				if ($solicitar_reinscripcion->rowCount() > 0) {

					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Operación exitosa",
						"Texto" => "Se ha realizado correctamente la reinscripción del idioma seleccionado.",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "No se ha podido realizar la cancelación de su solicitud de reinscripción, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
						"Tipo" => "error"
					];
				}
			}
			if ($solicitar == "0") {

				if ($solicitar_reinscripcion->rowCount() > 0) {

					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Operación exitosa",
						"Texto" => "Se ha realizado correctamente la cancelación de su solicitud de reinscripción.",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado",
						"Texto" => "No se ha podido realizar la cancelación de su solicitud de reinscripción, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
						"Tipo" => "error"
					];
				}
			}
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	public function solicitar_nuevos_cursos_controlador()
	{

		$id_alumno = mainModel::decryption($_POST['id_agregar_nvo_idioma']);
		$id_persona_alumno = mainModel::limpiar_cadena($id_alumno);
		$estatus_periodo = mainModel::limpiar_cadena($_POST['solicitud_nvo_idioma']);

		$idioma_dos = mainModel::limpiar_cadena($_POST['idioms_reg2']);
		$nivel_dos = mainModel::limpiar_cadena($_POST['nivel2']);
		$tipo_dos = mainModel::limpiar_cadena($_POST['tipo1']);

		$idioma_tres = mainModel::limpiar_cadena($_POST['idioms_reg3']);
		$nivel_tres = mainModel::limpiar_cadena($_POST['nivel3']);
		$tipo_tres = mainModel::limpiar_cadena($_POST['tipo2']);

		$idioma_cuatro = mainModel::limpiar_cadena($_POST['idioms_reg4']);
		$nivel_cuatro = mainModel::limpiar_cadena($_POST['nivel4']);
		$tipo_cuatro = mainModel::limpiar_cadena($_POST['tipo3']);


		$consulta = "SELECT id_idioma FROM curso_asesorias WHERE id_persona_alumno='$id_persona_alumno'";

		$conexion = mainModel::conectar();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		foreach ($datos as $rows) {
			if ($rows['id_idioma'] == $idioma_dos || $rows['id_idioma'] == $idioma_tres || $rows['id_idioma'] == $idioma_cuatro) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "No es posible duplicar un idioma.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		if ($idioma_dos != "") {
			if ($idioma_dos != "1" && $idioma_dos != "2" && $idioma_dos != "3" && $idioma_dos != "4" && $idioma_dos != "5" && $idioma_dos != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor elija un idioma válido.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_dos != "Inscripción" && $tipo_dos != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 2 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($nivel_dos == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 2.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}


		if ($idioma_tres != "") {
			if ($idioma_tres != "1" && $idioma_tres != "2" && $idioma_tres != "3" && $idioma_tres != "4" && $idioma_tres != "5" && $idioma_tres != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor elija un idioma válido.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_tres != "Inscripción" && $tipo_tres != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 3 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}


			if ($nivel_tres == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 3.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}



		if ($idioma_cuatro != "") {
			if ($idioma_cuatro != "1" && $idioma_cuatro != "2" && $idioma_cuatro != "3" && $idioma_cuatro != "4" && $idioma_cuatro != "5" && $idioma_cuatro != "6") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor elija un idioma válido.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}

			if ($tipo_cuatro != "Inscripción" && $tipo_cuatro != "Reinscripción") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "El tipo de Inscripción 4 no coincide con el formato requerido. Por favor introduzca 'Inscripción'o 'Reinscripción'.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}


			if ($nivel_cuatro == "") {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado",
					"Texto" => "Por favor seleccione un nivel para el idioma 4.",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		$datos = [
			"estatus_periodo" => $estatus_periodo,
			"idioma_dos" => $idioma_dos,
			"nivel_dos" => $nivel_dos,
			"tipo_dos" => $tipo_dos,
			"idioma_tres" => $idioma_tres,
			"nivel_tres" => $nivel_tres,
			"tipo_tres" => $tipo_tres,
			"idioma_cuatro" => $idioma_cuatro,
			"nivel_cuatro" => $nivel_cuatro,
			"tipo_cuatro" => $tipo_cuatro,
			"id_persona_alumno" => $id_persona_alumno
		];

		$solicitar_nuevos_cursos = alumnoModelo::solicitar_nuevos_cursos_modelo($datos);

		if ($solicitar_nuevos_cursos->rowCount() > 0) {

			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Se ha realizado correctamente su solicitud de reinscripción. En los próximos días recibirá un correo electrónico con los datos para el pago de su ficha.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido finalizar el periodo seleccionado, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* FIN DEL CONTROLADOR */

	public function paginador_alumno_reinscrito_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda)
	{
		$pagina = mainModel::limpiar_cadena($pagina);
		$registros = mainModel::limpiar_cadena($registros);
		$privilegio = mainModel::limpiar_cadena($privilegio);
		$curp = mainModel::limpiar_cadena($curp);

		$url = mainModel::limpiar_cadena($url);
		$url = SERVERURL . $url . "/";

		$busqueda = mainModel::limpiar_cadena($busqueda);
		$tabla = "";

		$pagina = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
		$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

		if (isset($busqueda) && $busqueda != "") {

			$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY persona.apellido_paterno ASC";

			$consulta = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

			$consulta3 = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '%$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp'AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY persona.apellido_paterno ASC";
		} else {
			$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY curso_asesorias.tiempo ASC";

			$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY curso_asesorias.tiempo ASC LIMIT $inicio,$registros ";

			$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND (id_rol='6' OR id_rol='8') AND (curso_asesorias.estatus_periodo='2' OR curso_asesorias.estatus_periodo='3') ORDER BY curso_asesorias.tiempo ASC";
		}

		$claveDesencriptada = mainModel::decryption($password);
		$conexion = mainModel::conectar();
		$datos2 = $conexion->query($consulta2);
		$datos2 = $datos2->fetchAll();

		$datos3 = $conexion->query($consulta3);
		$total = $datos3->rowCount();


		$t2_Array = array();
		$t3_Array = array();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		//$total= $conexion->query("SELECT FOUND_ROWS()");
		//$total= (int) $total->fetchColumn();

		$Npaginas = ceil($total / $registros);

		// print_r($consulta);
		// $consulta->debugDumpParams();

		foreach ($datos2 as $rows) {
			if (!in_array($rows['id_persona'], $t2_Array)) {
				$t2_Array[] = $rows['id_persona'];
				$t3_Array[$rows['id_persona']] = $rows['etiqueta_idioma'];
			} else {
				$t3_Array[$rows['id_persona']] = $t3_Array[$rows['id_persona']] . ', ' . $rows['etiqueta_idioma'];
			}
		}
		$temporal_Array = array();
		$tabla .= '
						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Idioma (s)</th>
						    <th>Curp</th>
						    <th>Matrícula</th>
						    <th>Teléfono</th>
						    <th>Correo</th>
						    <th>Dependencia</th>
						    <th>Reinscribir</th> 
						   
								</tr >
								</thead>
						          <tbody>';

		if ($total >= 1 && $pagina <= $Npaginas) {
			$contador = $inicio + 1;
			$reg_inicio = $inicio + 1;


			foreach ($datos as $rows) {
				if (!in_array($rows['id_persona'], $temporal_Array)) {

					$tabla .= ' 
									<tr class="text-center" >
						                <td data-label="#">' . $contador . '</td>
						                <td data-label="Nombre">' . $rows['apellido_paterno'] . ' ' . $rows['apellido_materno'] . ' ' . $rows['nombre'] . '</td>
						                <td data-label="Idioma (s)">' . $t3_Array[$rows['id_persona']] . '</td>
						                <td data-label="Curp">' . $rows['curp'] . '</td>
						                <td data-label="Matrícula">' . $rows['matricula'] . '</td>
						                <td data-label="Teléfono">' . $rows['telefono'] . '</td>';
					if ($rows['correo_unach'] != "") {
						$tabla .= '<td data-label="Correo">' . $rows['correo_unach'] . '</td>';
					} else {
						$tabla .= '<td data-label="Correo">' . $rows['correo'] . '</td>';
					}
					$tabla .= '
						                <td data-label="Dependencia">' . $rows['dependencia'] . '</td>
						               
						                <td data-label="Inscribir">
						               
						                   <a href="' . SERVERURL . 'reinscribirAlumno/' . mainModel::encryption($rows['id_persona']) . '/"> <button class="btnTable"> <button class="btnReinscribir">Reinscribir</button></a>
						                  
						                 </td>

						                  </a>
						                </td>
						                
						                <td data-label="Eliminar">
						                		<form class="FormularioAjax" action="' . SERVERURL . 'ajax/preinscritoAjax.php" 	method="POST" data-form="delete" autocomplete="off">

						                		<input type="hidden" name="usuario_id_del" value="' . mainModel::encryption($rows['id_persona']) . '">


						                 <button class="btnEliminar" style="display:none;">Eliminar</button>
						                   </form>
						                 </td>
					                     
					            </tr>';
					$contador++;
					$temporal_Array[] = $rows['id_persona'];
				}
			}

			$reg_final = $contador - 1;
		} else {
			if ($total >= 1) {
				$tabla .= '<tr class="text-center" ><td colspan="10">
						          	<a href="' . $url . '" class="btns4" id="whiteText">Haga clic aquí para recargar el listado </a>
						          		</td></tr>';
			} else {
				$tabla .= '<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td></tr>';
			}
		}


		$tabla .= '</tbody></table></div><br>';


		if ($total >= 1 && $pagina <= $Npaginas) {
			$tabla .= '<p class="texto_derecha">Mostrando solicitud ' . $reg_inicio . ' al ' . $reg_final . ' de un total de ' . $total . '</p>';
			$tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
		}

		return $tabla;
	}/* FIN DEL CONTROLADOR */

	public function paginador_exalumnos_controlador($pagina, $registros, $privilegio, $curp, $url, $busqueda)
	{
		$pagina = mainModel::limpiar_cadena($pagina);
		$registros = mainModel::limpiar_cadena($registros);
		$privilegio = mainModel::limpiar_cadena($privilegio);
		$curp = mainModel::limpiar_cadena($curp);

		$url = mainModel::limpiar_cadena($url);
		$url = SERVERURL . $url . "/";

		$busqueda = mainModel::limpiar_cadena($busqueda);
		$tabla = "";
		$pagina = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
		$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

		if (isset($busqueda) && $busqueda != "") {

			if ($_SESSION['privilegio_scaa'] == 4) {
				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE(persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . " ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC";
			} else {

				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona WHERE (persona.nombre LIKE '%$busqueda%' OR persona.apellido_paterno LIKE '$busqueda%' OR persona.apellido_materno LIKE '%$busqueda%' OR persona.telefono LIKE '%$busqueda%' OR persona.curp LIKE '%$busqueda%') AND persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";
			}
		} else {

			if ($_SESSION['privilegio_scaa'] == 4) {
				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . " ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC LIMIT $inicio,$registros ";

				$consulta3 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='8' AND curso_asesorias.id_idioma=" . $_SESSION['curso_asesor_scaa'] . "  ORDER BY persona.apellido_paterno ASC";
			} else {

				$consulta2 = "SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp!='$curp' AND persona.id_rol='8' ORDER BY persona.apellido_paterno ASC";

				$consulta = "SELECT * FROM persona WHERE curp!='$curp' AND id_rol='8' ORDER BY apellido_paterno ASC LIMIT $inicio,$registros";

				$consulta3 = "SELECT * FROM persona WHERE curp!='$curp' AND id_rol='8' ORDER BY apellido_paterno ASC";
			}
			// SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno WHERE curso_asesorias.estatus_periodo='1' AND curp!='$curp' AND id_rol='6' ORDER BY apellido_paterno ASC

		}

		$conexion = mainModel::conectar();
		$datos2 = $conexion->query($consulta2);
		$datos2 = $datos2->fetchAll();

		$datos3 = $conexion->query($consulta3);
		$total = $datos3->rowCount();


		$t2_Array = array();
		$t3_Array = array();
		$datos = $conexion->query($consulta);
		$datos = $datos->fetchAll();

		//$total= $conexion->query("SELECT FOUND_ROWS()");
		//$total= (int) $total->fetchColumn();

		$Npaginas = ceil($total / $registros);


		foreach ($datos2 as $rows2) {
			if (!in_array($rows2['id_persona'], $t2_Array)) {
				$t2_Array[] = $rows2['id_persona'];
				$t3_Array[$rows2['id_persona']] = $rows2['etiqueta_idioma'];
			} else {
				$t3_Array[$rows2['id_persona']] = $t3_Array[$rows2['id_persona']] . ', ' . $rows2['etiqueta_idioma'];
			}
		}
		$temporal_Array = array();

		$tabla .= '						
						 <div class="tableAlumnos">
						<table>
						  
						  <thead>
						  <tr class="text-center">
						    <th>#</th>
						    <th>Nombre</th>
						    <th>Idioma (s)</th>
						    <th>Teléfono</th>
						    <th>Correo</th>	
						    <th>Ficha de inscripción</th>
						    <th>Historial asesorías</th>
						    <th>Activar alumno</th>';



		$tabla .= '	</tr >
								</thead>
						          <tbody>';

		if ($total >= 1 && $pagina <= $Npaginas) {
			$contador = $inicio + 1;
			$reg_inicio = $inicio + 1;

			foreach ($datos as $rows) {
				// if(){

				//if(!in_array($rows['id_persona'], $temporal_Array)){

				$tabla .= ' 
						<tr class="text-center" >
			                <td data-label="#">' . $contador . '</td>
			                <td data-label="Nombre">' . $rows['apellido_paterno'] . ' ' . $rows['apellido_materno'] . ' ' . $rows['nombre'] . '</td>
			                <td data-label="Idioma (s)">' . $t3_Array[$rows['id_persona']] . '</td>';
				//<td data-label="Periodo">'.$rows2['periodo'].'</td>
				// <td data-label="Fecha de nacimiento">'.date('d-m-Y',strtotime($rows['fecha_nacimiento'])).'</td>
				$tabla .= '<td data-label="Teléfono">' . $rows['telefono'] . '</td>';
				if ($rows['correo_unach'] != "") {
					$tabla .= '<td data-label="Correo">' . $rows['correo_unach'] . '</td>';
				} else {
					$tabla .= '<td data-label="Correo">' . $rows['correo'] . '</td>';
				}
				$tabla .= '			               
			                 
			                  <td data-label="Ficha inscripción">
			                  <form action="' . SERVERURL . 'tcpdf/fichaInscripcion.php" method="POST">

			                  <input type="hidden" name="curp" value="' . $rows['curp'] . '">
			                   <button class="btnFicha" type="submit">Ficha inscripción</button>

			                  </form>		                 	
		                      </td>

		                       <td data-label="Historial asesorías">
			                  <a href="' . SERVERURL . 'asesoriasExAlumno/' . mainModel::encryption($rows['id_persona']) . '/"><button class="btnInscribir">Asesorias</button></a>
                 	
		                      </td>
		                      
		                        <td data-label="Activar alumno">
		                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/alumnoAjax.php" 	method="POST" data-form="save" autocomplete="off">
			                   	<input type="hidden" name="activarAlumno" value="' . mainModel::encryption($rows['id_persona']) . '">
			                   	<button class="btnDesactivar" type="submit">Activar</button>
                 				</form>
		                      </td>';
				// }

				$tabla .= '</tr>';
				$contador++;
				$temporal_Array[] = $rows['id_persona'];
				//}
			}
			$reg_final = $contador - 1;
		} else {
			if ($total >= 1) {
				$tabla .= '<tr class="text-center" ><td colspan="10">
						          	<a href="' . $url . '" class="btns4" id="whiteText">Haga clic aquí para recargar el listado </a>
						          		</td></tr>';
			} else {
				$tabla .= '<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td></tr>';
			}
		}


		$tabla .= '</tbody></table></div><br>';


		if ($total >= 1 && $pagina <= $Npaginas) {
			$tabla .= '<p class="texto_derecha">Mostrando alumnos ' . $reg_inicio . ' al ' . $reg_final . ' de un total de ' . $total . '</p>';
			$tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
		}

		return $tabla;
	}/* FIN DEL CONTROLADOR */

	public function modificar_curso_asesoria_controlador()
	{

		if (isset($_POST['activarCurso'])) {

			$id_curso_asesoria = mainModel::limpiar_cadena($_POST['activarCurso']);
			$estatus_periodo = "1";
		}

		if (isset($_POST['desactivarCurso'])) {

			$id_curso_asesoria = mainModel::limpiar_cadena($_POST['desactivarCurso']);
			$estatus_periodo = "0";
		}


		$datos = [
			"id_curso_asesoria" => $id_curso_asesoria,
			"estatus_periodo" => $estatus_periodo
		];

		$modificar_curso = alumnoModelo::modificar_curso_asesoria_modelo($datos);

		if ($modificar_curso->rowCount() > 0) {

			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Se ha realizado correctamente la operación solicitada.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido realizar la operación solicitada, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
		exit();
	}/* FIN DEL CONTROLADOR */

	public function activar_alumno_controlador()
	{


		$id = mainModel::decryption($_POST['activarAlumno']);
		$id_persona = mainModel::limpiar_cadena($id);


		$activar_alumno = alumnoModelo::activar_alumno_modelo($id_persona);

		if ($activar_alumno->rowCount() > 0) {

			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Operación exitosa",
				"Texto" => "Se ha activado el alumno correctamente. Este alumno ahora solo será visible en la lista de alumnos inscritos.",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No se ha podido realizar la activación del alumno en cuestión, por favor intente nuevamente. Si el problema persiste, contacte al administrador del sistema.",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
		exit();
	}/* FIN DEL CONTROLADOR */
}

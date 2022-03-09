<?php 
		
			require_once "../reportes/conexion.php";
			require_once "../PHPEXCEL/Classes/PHPExcel.php";

			$añoActual=date("Y", strtotime("this Year"));

			$enero=date("Y-m-01", strtotime("January"));
			$febrero=date("Y-m-01", strtotime("February"));
			$marzo=date("Y-m-01", strtotime("March"));
			$abril=date("Y-m-01", strtotime("April"));
			$mayo=date("Y-m-01", strtotime("May"));
			$junio=date("Y-m-01", strtotime("June"));
			$julio=date("Y-m-01", strtotime("July"));
			$agosto=date("Y-m-01", strtotime("August"));
			$septiembre=date("Y-m-01", strtotime("September"));
			$octubre=date("Y-m-01", strtotime("October"));
			$noviembre=date("Y-m-01", strtotime("November"));
			$diciembre=date("Y-m-01", strtotime("December"));

			$enero2=date("Y-m-t", strtotime("January"));
			$febrero2=date("Y-m-t", strtotime("February"));
			$marzo2=date("Y-m-t", strtotime("March"));
			$abril2=date("Y-m-t", strtotime("April"));
			$mayo2=date("Y-m-t", strtotime("May"));
			$junio2=date("Y-m-t", strtotime("June"));
			$julio2=date("Y-m-t", strtotime("July"));
			$agosto2=date("Y-m-t", strtotime("August"));
			$septiembre2=date("Y-m-t", strtotime("September"));
			$octubre2=date("Y-m-t", strtotime("October"));
			$noviembre2=date("Y-m-t", strtotime("November"));
			$diciembre2=date("Y-m-t", strtotime("December"));

			/* --------- CONSULTAS POR MES LEI ---------- */
			$consulta=$mbd->prepare("
				SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta -> execute();
			$dato = $consulta -> fetch();

			$consulta2=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta2 -> execute();
			$dato2 = $consulta2 -> fetch();

			$consulta3=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta3 -> execute();
			$dato3 = $consulta3 -> fetch();

			$consulta4=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta4 -> execute();
			$dato4 = $consulta4 -> fetch();

			$consulta5=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta5 -> execute();
			$dato5 = $consulta5 -> fetch();

			$consulta6=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta6 -> execute();
			$dato6 = $consulta6 -> fetch();


			$consulta7=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta7 -> execute();
			$dato7 = $consulta7 -> fetch();

			$consulta8=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta8 -> execute();
			$dato8 = $consulta8 -> fetch();

			$consulta9=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta9 -> execute();
			$dato9 = $consulta9 -> fetch();

			$consulta10=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta10 -> execute();
			$dato10 = $consulta10 -> fetch();

			$consulta11=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta11 -> execute();
			$dato11 = $consulta11 -> fetch();

			$consulta12=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta12 -> execute();
			$dato12 = $consulta12 -> fetch();


			$consulta13=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta13 -> execute();
			$dato13 = $consulta13 -> fetch();

			$consulta14=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta14 -> execute();
			$dato14 = $consulta14 -> fetch();

			$consulta15=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta15 -> execute();
			$dato15 = $consulta15 -> fetch();

			$consulta16=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta16 -> execute();
			$dato16 = $consulta16 -> fetch();

			$consulta17=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta17 -> execute();
			$dato17 = $consulta17 -> fetch();

			$consulta18=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta18 -> execute();
			$dato18 = $consulta18 -> fetch();


			$consulta19=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta19 -> execute();
			$dato19 = $consulta19 -> fetch();

			$consulta20=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta20 -> execute();
			$dato20 = $consulta20 -> fetch();

			$consulta21=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta21 -> execute();
			$dato21 = $consulta21 -> fetch();

			$consulta22=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta22 -> execute();
			$dato22 = $consulta22 -> fetch();

			$consulta23=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta23 -> execute();
			$dato23 = $consulta23 -> fetch();

			$consulta24=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta24 -> execute();
			$dato24 = $consulta24 -> fetch();


			$consulta25=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta25 -> execute();
			$dato25 = $consulta25 -> fetch();

			$consulta26=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta26 -> execute();
			$dato26 = $consulta26 -> fetch();

			$consulta27=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta27 -> execute();
			$dato27 = $consulta27 -> fetch();

			$consulta28=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta28 -> execute();
			$dato28 = $consulta28 -> fetch();

			$consulta29=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta29 -> execute();
			$dato29 = $consulta29 -> fetch();

			$consulta30=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta30 -> execute();
			$dato30 = $consulta30 -> fetch();


			$consulta31=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta31 -> execute();
			$dato31 = $consulta31 -> fetch();

			$consulta32=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta32 -> execute();
			$dato32 = $consulta32 -> fetch();

			$consulta33=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta33 -> execute();
			$dato33 = $consulta33 -> fetch();

			$consulta34=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta34 -> execute();
			$dato34 = $consulta34 -> fetch();

			$consulta35=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta35 -> execute();
			$dato35 = $consulta35 -> fetch();

			$consulta36=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta36 -> execute();
			$dato36 = $consulta36 -> fetch();


			$consulta37=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta37 -> execute();
			$dato37 = $consulta37 -> fetch();

			$consulta38=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta38 -> execute();
			$dato38 = $consulta38 -> fetch();

			$consulta39=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta39 -> execute();
			$dato39 = $consulta39 -> fetch();

			$consulta40=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta40 -> execute();
			$dato40 = $consulta40 -> fetch();

			$consulta41=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta41 -> execute();
			$dato41 = $consulta41 -> fetch();

			$consulta42=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta42 -> execute();
			$dato42 = $consulta42 -> fetch();


			$consulta43=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta43 -> execute();
			$dato43 = $consulta43 -> fetch();

			$consulta44=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta44 -> execute();
			$dato44 = $consulta44 -> fetch();

			$consulta45=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta45 -> execute();
			$dato45 = $consulta45 -> fetch();

			$consulta46=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta46 -> execute();
			$dato46 = $consulta46 -> fetch();

			$consulta47=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta47 -> execute();
			$dato47 = $consulta47 -> fetch();

			$consulta48=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta48 -> execute();
			$dato48 = $consulta48 -> fetch();


			$consulta49=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta49 -> execute();
			$dato49 = $consulta49 -> fetch();

			$consulta50=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta50 -> execute();
			$dato50 = $consulta50 -> fetch();

			$consulta51=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta51 -> execute();
			$dato51 = $consulta51 -> fetch();

			$consulta52=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta52 -> execute();
			$dato52 = $consulta52 -> fetch();

			$consulta53=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta53 -> execute();
			$dato53 = $consulta53 -> fetch();

			$consulta54=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta54 -> execute();
			$dato54 = $consulta54 -> fetch();


			$consulta55=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta55 -> execute();
			$dato55 = $consulta55 -> fetch();

			$consulta56=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta56 -> execute();
			$dato56 = $consulta56 -> fetch();

			$consulta57=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta57 -> execute();
			$dato57 = $consulta57 -> fetch();

			$consulta58=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta58 -> execute();
			$dato58 = $consulta58 -> fetch();

			$consulta59=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta59 -> execute();
			$dato59 = $consulta59 -> fetch();

			$consulta60=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta60 -> execute();
			$dato60 = $consulta60 -> fetch();


			$consulta61=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta61 -> execute();
			$dato61 = $consulta61 -> fetch();

			$consulta62=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta62 -> execute();
			$dato62 = $consulta62 -> fetch();

			$consulta63=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta63 -> execute();
			$dato63 = $consulta63 -> fetch();

			$consulta64=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta64 -> execute();
			$dato64 = $consulta64 -> fetch();

			$consulta65=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta65 -> execute();
			$dato65 = $consulta65 -> fetch();

			$consulta66=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta66 -> execute();
			$dato66 = $consulta66 -> fetch();


			$consulta67=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta67 -> execute();
			$dato67 = $consulta67 -> fetch();

			$consulta68=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta68 -> execute();
			$dato68 = $consulta68 -> fetch();

			$consulta69=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta69 -> execute();
			$dato69 = $consulta69 -> fetch();

			$consulta70=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta70 -> execute();
			$dato70 = $consulta70 -> fetch();

			$consulta71=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta71 -> execute();
			$dato71 = $consulta71 -> fetch();

			$consulta72=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta72 -> execute();
			$dato72 = $consulta72 -> fetch();


						/* --------- CONSULTAS POR MES CAA ---------- */
			$consulta73=$mbd->prepare("
				SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta73 -> execute();
			$dato73 = $consulta73 -> fetch();

			$consulta74=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta74 -> execute();
			$dato74 = $consulta74 -> fetch();

			$consulta75=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta75 -> execute();
			$dato75 = $consulta75 -> fetch();

			$consulta76=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta76 -> execute();
			$dato76 = $consulta76 -> fetch();

			$consulta77=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta77 -> execute();
			$dato77 = $consulta77 -> fetch();

			$consulta78=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta78 -> execute();
			$dato78 = $consulta78 -> fetch();


			$consulta79=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta79 -> execute();
			$dato79 = $consulta79 -> fetch();

			$consulta80=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta80 -> execute();
			$dato80 = $consulta80 -> fetch();

			$consulta81=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta81 -> execute();
			$dato81 = $consulta81 -> fetch();

			$consulta82=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta82 -> execute();
			$dato82 = $consulta82 -> fetch();

			$consulta83=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta83 -> execute();
			$dato83 = $consulta83 -> fetch();

			$consulta84=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta84 -> execute();
			$dato84 = $consulta84 -> fetch();


			$consulta85=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta85 -> execute();
			$dato85 = $consulta85 -> fetch();

			$consulta86=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta86 -> execute();
			$dato86 = $consulta86 -> fetch();

			$consulta87=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta87 -> execute();
			$dato87 = $consulta87 -> fetch();

			$consulta88=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta88 -> execute();
			$dato88 = $consulta88 -> fetch();

			$consulta89=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta89 -> execute();
			$dato89 = $consulta89 -> fetch();

			$consulta90=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta90 -> execute();
			$dato90 = $consulta90 -> fetch();


			$consulta91=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta91 -> execute();
			$dato91 = $consulta91 -> fetch();

			$consulta92=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta92 -> execute();
			$dato92 = $consulta92 -> fetch();

			$consulta93=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta93 -> execute();
			$dato93 = $consulta93 -> fetch();

			$consulta94=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta94 -> execute();
			$dato94 = $consulta94 -> fetch();

			$consulta95=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta95 -> execute();
			$dato95 = $consulta95 -> fetch();

			$consulta96=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta96 -> execute();
			$dato96 = $consulta96 -> fetch();


			$consulta97=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta97 -> execute();
			$dato97 = $consulta97 -> fetch();

			$consulta98=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta98 -> execute();
			$dato98 = $consulta98 -> fetch();

			$consulta99=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta99 -> execute();
			$dato99 = $consulta99 -> fetch();

			$consulta100=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta100 -> execute();
			$dato100 = $consulta100 -> fetch();

			$consulta101=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta101 -> execute();
			$dato101 = $consulta101 -> fetch();

			$consulta102=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta102 -> execute();
			$dato102 = $consulta102 -> fetch();


			$consulta103=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta103 -> execute();
			$dato103 = $consulta103 -> fetch();

			$consulta104=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta104 -> execute();
			$dato104 = $consulta104 -> fetch();

			$consulta105=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta105 -> execute();
			$dato105 = $consulta105 -> fetch();

			$consulta106=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta106 -> execute();
			$dato106 = $consulta106 -> fetch();

			$consulta107=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta107 -> execute();
			$dato107 = $consulta107 -> fetch();

			$consulta108=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta108 -> execute();
			$dato108 = $consulta108 -> fetch();


			$consulta109=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta109 -> execute();
			$dato109 = $consulta109 -> fetch();

			$consulta110=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta110 -> execute();
			$dato110 = $consulta110 -> fetch();

			$consulta111=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta111 -> execute();
			$dato111 = $consulta111 -> fetch();

			$consulta112=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta112 -> execute();
			$dato112 = $consulta112 -> fetch();

			$consulta113=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta113 -> execute();
			$dato113 = $consulta113 -> fetch();

			$consulta114=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta114 -> execute();
			$dato114 = $consulta114 -> fetch();


			$consulta115=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta115 -> execute();
			$dato115 = $consulta115 -> fetch();

			$consulta116=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta116 -> execute();
			$dato116 = $consulta116 -> fetch();

			$consulta117=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta117 -> execute();
			$dato117 = $consulta117 -> fetch();

			$consulta118=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta118 -> execute();
			$dato118 = $consulta118 -> fetch();

			$consulta119=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta119 -> execute();
			$dato119 = $consulta119 -> fetch();

			$consulta120=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta120 -> execute();
			$dato120 = $consulta120 -> fetch();


			$consulta121=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta121 -> execute();
			$dato121 = $consulta121 -> fetch();

			$consulta122=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta122 -> execute();
			$dato122 = $consulta122 -> fetch();

			$consulta123=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta123 -> execute();
			$dato123 = $consulta123 -> fetch();

			$consulta124=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta124 -> execute();
			$dato124 = $consulta124 -> fetch();

			$consulta125=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta125 -> execute();
			$dato125 = $consulta125 -> fetch();

			$consulta126=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta126 -> execute();
			$dato126 = $consulta126 -> fetch();


			$consulta127=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta127 -> execute();
			$dato127 = $consulta127 -> fetch();

			$consulta128=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta128 -> execute();
			$dato128 = $consulta128 -> fetch();

			$consulta129=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta129 -> execute();
			$dato129 = $consulta129 -> fetch();

			$consulta130=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta130 -> execute();
			$dato130 = $consulta130 -> fetch();

			$consulta131=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta131 -> execute();
			$dato131 = $consulta131 -> fetch();

			$consulta132=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta132 -> execute();
			$dato132 = $consulta132 -> fetch();


			$consulta133=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta133 -> execute();
			$dato133 = $consulta133 -> fetch();

			$consulta134=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta134 -> execute();
			$dato134 = $consulta134 -> fetch();

			$consulta135=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta135 -> execute();
			$dato135 = $consulta135 -> fetch();

			$consulta136=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta136 -> execute();
			$dato136 = $consulta136 -> fetch();

			$consulta137=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta137 -> execute();
			$dato137 = $consulta137 -> fetch();

			$consulta138=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta138 -> execute();
			$dato138 = $consulta138 -> fetch();


			$consulta139=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta139 -> execute();
			$dato139 = $consulta139 -> fetch();

			$consulta140=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta140 -> execute();
			$dato140 = $consulta140 -> fetch();

			$consulta141=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta141 -> execute();
			$dato141 = $consulta141 -> fetch();

			$consulta142=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta142 -> execute();
			$dato142 = $consulta142 -> fetch();

			$consulta143=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta143 -> execute();
			$dato143 = $consulta143 -> fetch();

			$consulta144=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta144 -> execute();
			$dato144 = $consulta144 -> fetch();


			/* --------- TOTAL POR IDIOMA LEI ---------- */

			$consulta145=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta145 -> execute();
			$dato145 = $consulta145 -> fetch();

			$consulta146=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta146 -> execute();
			$dato146 = $consulta146 -> fetch();

			$consulta147=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta147 -> execute();
			$dato147 = $consulta147 -> fetch();

			$consulta148=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta148 -> execute();
			$dato148 = $consulta148 -> fetch();

			$consulta149=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta149 -> execute();
			$dato149 = $consulta149 -> fetch();

			$consulta150=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta150 -> execute();
			$dato150 = $consulta150 -> fetch();


			/* --------- TOTAL POR IDIOMA CAA ---------- */

			$consulta151=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta151 -> execute();
			$dato151 = $consulta151 -> fetch();

			$consulta152=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta152 -> execute();
			$dato152 = $consulta152 -> fetch();

			$consulta153=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta153 -> execute();
			$dato153 = $consulta153 -> fetch();

			$consulta154=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta154 -> execute();
			$dato154 = $consulta154 -> fetch();

			$consulta155=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta155 -> execute();
			$dato155 = $consulta155 -> fetch();

			$consulta156=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta156 -> execute();
			$dato156 = $consulta156 -> fetch();


						/* --------- SUB-TOTAL POR MES LEI ---------- */

			$consulta157=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta157 -> execute();
			$dato157 = $consulta157 -> fetch();

			$consulta158=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta158 -> execute();
			$dato158 = $consulta158 -> fetch();

			$consulta159=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta159 -> execute();
			$dato159 = $consulta159 -> fetch();

			$consulta160=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta160 -> execute();
			$dato160 = $consulta160 -> fetch();

			$consulta161=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta161 -> execute();
			$dato161 = $consulta161 -> fetch();

			$consulta162=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta162 -> execute();
			$dato162 = $consulta162 -> fetch();

			$consulta163=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta163 -> execute();
			$dato163 = $consulta163 -> fetch();

			$consulta164=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta164 -> execute();
			$dato164 = $consulta164 -> fetch();

			$consulta165=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta165 -> execute();
			$dato165 = $consulta165 -> fetch();

			$consulta166=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta166 -> execute();
			$dato166 = $consulta166 -> fetch();

			$consulta167=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta167 -> execute();
			$dato167 = $consulta167 -> fetch();

			$consulta168=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta168 -> execute();
			$dato168 = $consulta168 -> fetch();

			$consulta169=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta169 -> execute();
			$dato169 = $consulta169 -> fetch();


									/* --------- SUB-TOTAL POR MES CAA ---------- */

			$consulta170=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta170 -> execute();
			$dato170 = $consulta170 -> fetch();

			$consulta171=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta171 -> execute();
			$dato171 = $consulta171 -> fetch();

			$consulta172=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta172 -> execute();
			$dato172 = $consulta172 -> fetch();

			$consulta173=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta173 -> execute();
			$dato173 = $consulta173 -> fetch();

			$consulta174=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta174 -> execute();
			$dato174 = $consulta174 -> fetch();

			$consulta175=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta175 -> execute();
			$dato175 = $consulta175 -> fetch();

			$consulta176=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta176 -> execute();
			$dato176 = $consulta176 -> fetch();

			$consulta177=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta177 -> execute();
			$dato177 = $consulta177 -> fetch();

			$consulta178=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta178 -> execute();
			$dato178 = $consulta178 -> fetch();

			$consulta179=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta179 -> execute();
			$dato179 = $consulta179 -> fetch();

			$consulta180=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta180 -> execute();
			$dato180 = $consulta180 -> fetch();

			$consulta181=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta181 -> execute();
			$dato181 = $consulta181 -> fetch();

			$consulta182=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND persona.carrera_unach!=74 AND persona.carrera_unach!=17 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta182 -> execute();
			$dato182 = $consulta182 -> fetch();

									/* --------- TOTALES POR MES  ---------- */

			$consulta183=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta183 -> execute();
			$dato183 = $consulta183 -> fetch();

			$consulta184=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta184 -> execute();
			$dato184 = $consulta184 -> fetch();

			$consulta185=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta185 -> execute();
			$dato185 = $consulta185 -> fetch();

			$consulta186=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta186 -> execute();
			$dato186 = $consulta186 -> fetch();

			$consulta187=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta187 -> execute();
			$dato187 = $consulta187 -> fetch();

			$consulta188=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta188 -> execute();
			$dato188 = $consulta188 -> fetch();

			$consulta189=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta189 -> execute();
			$dato189 = $consulta189 -> fetch();

			$consulta190=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta190 -> execute();
			$dato190 = $consulta190 -> fetch();

			$consulta191=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta191 -> execute();
			$dato191 = $consulta191 -> fetch();

			$consulta192=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta192 -> execute();
			$dato192 = $consulta192 -> fetch();

			$consulta193=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta193 -> execute();
			$dato193 = $consulta193 -> fetch();

			$consulta194=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta194 -> execute();
			$dato194 = $consulta194 -> fetch();

			$consulta195=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN plantilla_horarios ON asesorias.id_asesoria_plantilla_horario=plantilla_horarios.id_plantilla_horario JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND plantilla_horarios.tiempo_hora_asesoria=2 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta195 -> execute();
			$dato195 = $consulta195 -> fetch();

			


				$fila=2;

				$objPHPExcel = new PHPExcel();

				function cellColor($cells,$color){
				    global $objPHPExcel;

				       $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
				           'type' => PHPExcel_Style_Fill::FILL_SOLID,
				           'startcolor' => array(
				                'rgb' => $color
				           )
				       ));
				}

				cellColor('A11:Y11', 'c8e4b4');
				cellColor('A20:Y20', 'F4D03F');
				cellColor('Z11', 'FFFF00');
				cellColor('Z20', 'FFFF00');
				
				$styleArray = array(
					    'font'  => array(
					        'bold'  => false,
					        'color' => array('rgb' => 'FF0000'),
					        'size'  => 11,
					        'name'  => 'Calibri'
					    ));

					
					$objPHPExcel->getActiveSheet()->getStyle('B19:AA19')->applyFromArray($styleArray);
					$objPHPExcel->getActiveSheet()->getStyle('A20')->applyFromArray($styleArray);
					
				
				$objPHPExcel->getProperties()->setCreator("Centro de AutoAcceso") ->setDescription("Reporte de inscritos.");

				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('Reportes');

				$objPHPExcel->getActiveSheet()->setCellValue('K5','UNIVERSIDAD AUTÓNOMA DE CHIAPAS');
				$objPHPExcel->getActiveSheet()->setCellValue('K6','FACULTAD DE LENGUAS CAMPUS TUXTLA');
				$objPHPExcel->getActiveSheet()->setCellValue('K7','CENTRO DE AUTOACCESO');
				$objPHPExcel->getActiveSheet()->setCellValue('K8','CONVERSACIÓN MENSUAL DE LOS DIFERENTES IDIOMAS '.$añoActual.'');

				$objPHPExcel->getActiveSheet()->mergeCells('B11:C11');
				$objPHPExcel->getActiveSheet()->mergeCells('D11:E11');
				$objPHPExcel->getActiveSheet()->mergeCells('F11:G11');
				$objPHPExcel->getActiveSheet()->mergeCells('H11:I11');
				$objPHPExcel->getActiveSheet()->mergeCells('J11:K11');
				$objPHPExcel->getActiveSheet()->mergeCells('L11:M11');
				$objPHPExcel->getActiveSheet()->mergeCells('N11:O11');
				$objPHPExcel->getActiveSheet()->mergeCells('P11:Q11');
				$objPHPExcel->getActiveSheet()->mergeCells('R11:S11');
				$objPHPExcel->getActiveSheet()->mergeCells('T11:U11');
				$objPHPExcel->getActiveSheet()->mergeCells('V11:W11');
				$objPHPExcel->getActiveSheet()->mergeCells('X11:Y11');
				$objPHPExcel->getActiveSheet()->mergeCells('Z11:AA11');
				

				$objPHPExcel->getActiveSheet()->mergeCells('B20:C20');
				$objPHPExcel->getActiveSheet()->mergeCells('D20:E20');
				$objPHPExcel->getActiveSheet()->mergeCells('F20:G20');
				$objPHPExcel->getActiveSheet()->mergeCells('H20:I20');
				$objPHPExcel->getActiveSheet()->mergeCells('J20:K20');
				$objPHPExcel->getActiveSheet()->mergeCells('L20:M20');
				$objPHPExcel->getActiveSheet()->mergeCells('N20:O20');
				$objPHPExcel->getActiveSheet()->mergeCells('P20:Q20');
				$objPHPExcel->getActiveSheet()->mergeCells('R20:S20');
				$objPHPExcel->getActiveSheet()->mergeCells('T20:U20');
				$objPHPExcel->getActiveSheet()->mergeCells('V20:W20');
				$objPHPExcel->getActiveSheet()->mergeCells('X20:Y20');
				$objPHPExcel->getActiveSheet()->mergeCells('Z20:AA20');
				
				

				$objPHPExcel->getActiveSheet()->mergeCells('K5:Q5');
				$objPHPExcel->getActiveSheet()->mergeCells('K6:Q6');
				$objPHPExcel->getActiveSheet()->mergeCells('K7:Q7');
				$objPHPExcel->getActiveSheet()->mergeCells('K8:Q8');
				

				$objPHPExcel->getActiveSheet()->setCellValue('A11', 'IDIOMA');
				$objPHPExcel->getActiveSheet()->setCellValue('B11', 'ENERO');
				$objPHPExcel->getActiveSheet()->setCellValue('D11', 'FEBRERO');
				$objPHPExcel->getActiveSheet()->setCellValue('F11', 'MARZO');
				$objPHPExcel->getActiveSheet()->setCellValue('H11', 'ABRIL');
				$objPHPExcel->getActiveSheet()->setCellValue('J11', 'MAYO');
				$objPHPExcel->getActiveSheet()->setCellValue('L11', 'JUNIO');
				$objPHPExcel->getActiveSheet()->setCellValue('N11', 'JULIO');
				$objPHPExcel->getActiveSheet()->setCellValue('P11', 'AGOSTO');
				$objPHPExcel->getActiveSheet()->setCellValue('R11', 'SEPTIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('T11', 'OCTUBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('V11', 'NOVIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('X11', 'DICIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('Z11', 'TOTAL');
				

				$objPHPExcel->getActiveSheet()->setCellValue('A13', 'INGLÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A14', 'FRANCÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A15', 'ALEMÁN');
				$objPHPExcel->getActiveSheet()->setCellValue('A16', 'ITALIANO');
				$objPHPExcel->getActiveSheet()->setCellValue('A17', 'CHINO');
				$objPHPExcel->getActiveSheet()->setCellValue('A18', 'ESPAÑOL');
				$objPHPExcel->getActiveSheet()->setCellValue('A19', 'SUB-TOTAL');
				$objPHPExcel->getActiveSheet()->setCellValue('A20', 'TOTAL');

				$objPHPExcel->getActiveSheet()->setCellValue('B12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('C12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('D12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('E12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('F12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('G12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('H12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('I12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('J12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('K12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('L12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('M12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('N12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('O12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('P12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('Q12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('R12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('S12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('T12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('U12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('V12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('W12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('X12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('Y12', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('Z12', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('AA12', 'CAA');

				$objPHPExcel->getActiveSheet()->setCellValue('A24', 'IDIOMAS');
				$objPHPExcel->getActiveSheet()->setCellValue('B24', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('C24', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('A25', 'INGLÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A26', 'FRANCÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A27', 'ALEMÁN');
				$objPHPExcel->getActiveSheet()->setCellValue('A28', 'ITALIANO');
				$objPHPExcel->getActiveSheet()->setCellValue('A29', 'CHINO');
				$objPHPExcel->getActiveSheet()->setCellValue('A30', 'ESPAÑOL');

				$objPHPExcel->getActiveSheet()->setCellValue('B52', 'TOTAL');
				$objPHPExcel->getActiveSheet()->setCellValue('A52', 'IDIOMAS');
				$objPHPExcel->getActiveSheet()->setCellValue('A53', 'INGLÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A54', 'FRANCÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A55', 'ALEMÁN');
				$objPHPExcel->getActiveSheet()->setCellValue('A56', 'ITALIANO');
				$objPHPExcel->getActiveSheet()->setCellValue('A57', 'CHINO');
				$objPHPExcel->getActiveSheet()->setCellValue('A58', 'ESPAÑOL');


				$objPHPExcel->getActiveSheet()->setCellValue('B13', $dato[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B14', $dato2[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B15', $dato3[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B16', $dato4[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B17', $dato5[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B18', $dato6[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('C13', $dato73[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C14', $dato74[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C15', $dato75[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C16', $dato76[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C17', $dato77[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C18', $dato78[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('D13', $dato7[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D14', $dato8[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D15', $dato9[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D16', $dato10[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D17', $dato11[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D18', $dato12[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('E13', $dato79[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E14', $dato80[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E15', $dato81[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E16', $dato82[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E17', $dato83[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E18', $dato84[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('F13', $dato13[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F14', $dato14[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F15', $dato15[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F16', $dato16[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F17', $dato17[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F18', $dato18[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('G13', $dato85[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G14', $dato86[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G15', $dato87[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G16', $dato88[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G17', $dato89[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G18', $dato90[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('H13', $dato19[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H14', $dato20[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H15', $dato21[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H16', $dato22[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H17', $dato23[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H18', $dato24[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('I13', $dato91[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I14', $dato92[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I15', $dato93[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I16', $dato94[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I17', $dato95[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I18', $dato96[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('J13', $dato25[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J14', $dato26[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J15', $dato27[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J16', $dato28[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J17', $dato29[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J18', $dato30[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('K13', $dato97[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K14', $dato98[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K15', $dato99[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K16', $dato100[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K17', $dato101[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K18', $dato102[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('L13', $dato31[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L14', $dato32[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L15', $dato33[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L16', $dato34[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L17', $dato35[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L18', $dato36[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('M13', $dato103[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M14', $dato104[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M15', $dato105[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M16', $dato106[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M17', $dato107[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M18', $dato108[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('N13', $dato37[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N14', $dato38[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N15', $dato39[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N16', $dato40[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N17', $dato41[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N18', $dato42[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('O13', $dato109[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O14', $dato110[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O15', $dato111[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O16', $dato112[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O17', $dato113[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O18', $dato114[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('P13', $dato43[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P14', $dato44[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P15', $dato45[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P16', $dato46[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P17', $dato47[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P18', $dato48[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('Q13', $dato115[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q14', $dato116[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q15', $dato117[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q16', $dato118[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q17', $dato119[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q18', $dato120[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('R13', $dato49[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R14', $dato50[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R15', $dato51[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R16', $dato52[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R17', $dato53[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R18', $dato54[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('S13', $dato121[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S14', $dato122[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S15', $dato123[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S16', $dato124[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S17', $dato125[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S18', $dato126[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('T13', $dato55[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T14', $dato56[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T15', $dato57[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T16', $dato58[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T17', $dato59[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T18', $dato60[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('U13', $dato127[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U14', $dato128[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U15', $dato129[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U16', $dato130[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U17', $dato131[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U18', $dato132[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('V13', $dato61[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V14', $dato62[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V15', $dato63[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V16', $dato64[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V17', $dato65[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V18', $dato66[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('W13', $dato133[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W14', $dato134[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W15', $dato135[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W16', $dato136[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W17', $dato137[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W18', $dato138[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('X13', $dato67[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X14', $dato68[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X15', $dato69[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X16', $dato70[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X17', $dato71[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X18', $dato72[0]);
				
				

				$objPHPExcel->getActiveSheet()->setCellValue('Y13', $dato139[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y14', $dato140[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y15', $dato141[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y16', $dato141[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y17', $dato143[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y18', $dato144[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('Z13', $dato145[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z14', $dato146[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z15', $dato147[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z16', $dato148[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z17', $dato149[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z18', $dato150[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('AA13', $dato151[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA14', $dato152[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA15', $dato153[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA16', $dato154[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA17', $dato155[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA18', $dato156[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B19', $dato157[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D19', $dato158[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F19', $dato159[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H19', $dato160[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J19', $dato161[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L19', $dato162[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N19', $dato163[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P19', $dato164[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R19', $dato165[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T19', $dato166[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V19', $dato167[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X19', $dato168[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z19', $dato169[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('C19', $dato170[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E19', $dato171[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G19', $dato172[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I19', $dato173[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K19', $dato174[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M19', $dato175[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('O19', $dato176[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Q19', $dato177[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('S19', $dato178[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('U19', $dato179[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('W19', $dato180[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Y19', $dato181[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('AA19', $dato182[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B20', $dato183[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D20', $dato184[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F20', $dato185[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H20', $dato186[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J20', $dato187[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L20', $dato188[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N20', $dato189[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('P20', $dato190[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('R20', $dato191[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('T20', $dato192[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('V20', $dato193[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('X20', $dato194[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('Z20', $dato195[0]);
				
				

				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="Reporte Conversación por Origen '.$añoActual.'.xlsx"');
				header('Cache-Control: max-age=0');

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				exit;
	

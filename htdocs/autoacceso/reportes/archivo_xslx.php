<?php 
header("Content-Type: application/vnd.ms-excel");


	require_once "../reportes/conexion.php";

	$id_archivo=$_POST['id_archivo'];

	$consulta=$mbd->prepare("SELECT tipo_archivo, contenido, nombre_archivo FROM archivos WHERE id_archivo=$id_archivo");
	$consulta -> execute();
	$dato = $consulta -> fetch();

	$tipo = $dato['tipo_archivo'];
	$contenido = $dato['contenido'];
	$nombre= basename($dato['nombre_archivo']);
	header("Content-Disposition: attachment; filename=".$nombre);

    print($contenido);	




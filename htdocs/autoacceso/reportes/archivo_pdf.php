<?php 


	header("Content-type: application/pdf");
	require_once "../reportes/descargar_archivo.php";
	
	header("Content-disposition: attachment; filename=$nombre;"); 

	readfile("$contenido");
  	echo $contenido;
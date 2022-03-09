<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['nombre_preinscrito_bus']) && isset($_POST['apellidoP_preinscrito_bus']) && isset($_POST['apellidoM_preinscrito_bus']) || isset($_POST['curp_preinscrito_bus']) ||isset($_POST['tel_preinscrito_bus'])){

		/* INSTANCIA AL CONTROLADOR */
		require_once "../controladores/preinscritoControlador.php";
		$ins_preinscrito = new preinscritoControlador();

		/* AGREGAR UN USUARIO */

		
			echo $ins_preinscrito->buscar_preinscrito_controlador();
	else{
		
		$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No ha llenado correctamente los camps de búsqueda",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
	}

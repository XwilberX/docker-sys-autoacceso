<?php 
    // header("Cache-Control: no-cache, must-revalidate");
    session_start(['name'=>'SCAA']);
    
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 23400;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            echo "<script> 
			 alert('¡SU SESIÓN HA FINALIZADO POR INACTIVIDAD!'); window.location.href='';
			 </script>";
            // header("Location:".SERVERURL."login/");
        }
    }
    
	require_once"./config/APP.php";
	require_once"./controladores/vistasControlador.php";

	$plantilla= new vistasControlador();
	$plantilla->obtener_plantilla_controlador();
	  

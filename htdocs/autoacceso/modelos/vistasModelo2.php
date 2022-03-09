<?php 

	class vistasModelo{

		/* Modelo para invocar las vistas*/

		protected static function obtener_vistas_modelo($vistas){
			$listaBlanca =["login", "preinscripciones", "infografia","enviarCorreo","actualizarPass","reestablecerPass","directorio"];
			$listaPrivada =["preinsAdmin", "preinscripciones","buscarAlumno", "agregarAlumno","listaAlumnos", "homeCoor", "agregarUsuario", "buscarUsuario" ,"listaUsuarios","editarUsuario", "listaPreinscritos", "preinsIndAdmin", "buscarPreinscrito", "infografia", "editarAlumno", "actualizarPass","enviarCorreo","directorio"];
		if(isset($_SESSION['logged'])&& $_SESSION['logged']){
		
			if(in_array($vistas, $listaPrivada)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}

			}elseif ($vistas=="index") {
				$contenido="index";
			}else{
				$contenido="404";
			}
				return $contenido;
		    
        } else{
            	if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}

			}elseif ($vistas=="index") {
				$contenido="index";
			}else{
				$contenido="404";
			}
				return $contenido;
		    }
        }
    }
?>
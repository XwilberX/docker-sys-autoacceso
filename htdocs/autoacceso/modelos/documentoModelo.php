<?php 

	require_once "mainModel.php";

	class documentoModelo extends mainModel{
		protected static function agregar_documento_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO archivos(nombre_archivo,tipo_archivo,idioma_archivo,nivel_archivo,acceso_archivo,contenido) VALUES(:nombre_archivo,:tipo_archivo,:idioma_archivo,:nivel_archivo,:acceso_archivo,:contenido)");

					$sql->bindParam(":nombre_archivo",$datos['nombreArchivo']);
					$sql->bindParam(":tipo_archivo",$datos['tipoArchivo']);
					$sql->bindParam(":idioma_archivo",$datos['idioma']);
					$sql->bindParam(":nivel_archivo",$datos['nivel']);
					$sql->bindParam(":acceso_archivo",$datos['acceso_archivo']);
					$sql->bindParam(":contenido",$datos['archivo_bin']);
					$sql->execute();
					/*$arr = $sql->errorInfo();
					print_r($arr);*/
					return $sql;
		}


		protected static function datos_documentos_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM archivos WHERE acceso_archivo=0");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_links_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM links WHERE acceso_link=0");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_documentos_asesores_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM archivos WHERE acceso_archivo=1");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_links_asesores_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM links WHERE acceso_link=1");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_documentos_secretario_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM archivos WHERE acceso_archivo=2");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_links_secretario_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM links WHERE acceso_link=2");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_documentos_personal_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM archivos WHERE acceso_archivo=3");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function datos_links_personal_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT * FROM links WHERE acceso_link=3");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function agregar_url_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO links(nombre_link,idioma_link,nivel_link,acceso_link,link) VALUES(:nombre_link,:idioma_link,:nivel_link,:acceso_link,:link)");

					$sql->bindParam(":nombre_link",$datos['nombre_link']);
					$sql->bindParam(":idioma_link",$datos['idioma']);
					$sql->bindParam(":nivel_link",$datos['nivel']);
					$sql->bindParam(":acceso_link",$datos['acceso_link']);
					$sql->bindParam(":link",$datos['url']);
					
					$sql->execute();
					/*$arr = $sql->errorInfo();
					print_r($arr);*/
					return $sql;
		}

		protected static function eliminar_documento_modelo($id_archivo){
			$sql=mainModel::conectar()->prepare("DELETE FROM archivos WHERE id_archivo=:id_archivo ");
			$sql->bindParam(":id_archivo", $id_archivo);
			$sql->execute();
					return $sql;
		}

		protected static function eliminar_url_modelo($id_link){
			$sql=mainModel::conectar()->prepare("DELETE FROM links WHERE id_link=:id_link");
			$sql->bindParam(":id_link", $id_link);
			$sql->execute();
					return $sql;
		}

		protected static function images_index_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT contenido FROM archivos WHERE acceso_archivo=5 ORDER BY id_archivo ASC" );		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function images_infografia_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT contenido FROM archivos WHERE acceso_archivo=6 ORDER BY id_archivo ASC");		 	
		 	$sql->execute();
		 	return $sql;
		}

		protected static function actualizar_img_carousel_index_modelo($datos){

			$sql=mainModel::conectar()->prepare("UPDATE archivos SET nombre_archivo=:nombre_archivo,tipo_archivo=:tipo_archivo,contenido=:contenido WHERE id_archivo=:id_archivo");
				$sql->bindParam(":nombre_archivo",$datos['nombreArchivo']);
				$sql->bindParam(":tipo_archivo",$datos['tipoArchivo']);
				$sql->bindParam(":contenido",$datos['archivo_bin']);
				$sql->bindParam(":id_archivo",$datos['id_archivo']);

				$sql->execute();

		 	return $sql;
		}

		protected static function datos_curso_alumnos_modelo(){

			$sql=mainModel::conectar()->prepare("SELECT id_idioma FROM curso_asesorias JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE persona.id_persona='".$_SESSION['id_scaa']."'");		 	
		 	$sql->execute();
		 	return $sql;
		}
	}
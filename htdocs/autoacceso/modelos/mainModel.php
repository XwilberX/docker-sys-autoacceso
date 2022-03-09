<?php 

if (isset($peticionAjax)&& $peticionAjax){
require_once"../config/SERVER.php";
}else{
require_once"./config/SERVER.php";
}

class mainModel{
	/* FUNCION PARA CONECTAR A LA BD */

	protected static function conectar(){
		 $conexion = new PDO(SGBD, USER, PASS);
		 $conexion->exec("SET CHARACTER SET utf8");
		 return $conexion;
	}

	/* FUNCION EJECUTAR CONSULTAS SIMPLES */
	protected static function ejecutar_consulta_simple($consulta){
		$sql = self::conectar()->prepare($consulta);
		$sql->execute();
		return $sql; 
	}

	/* ENCRIPTAR CADENAS */

	public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

		/* DESENCRIPTAR CADENAS */

	protected static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		/* GENERAR CÓDIGOS ALEATORIOS */

	protected static function generar_codigo_aleatorio($letra, $longitud, $numero){

			for($i=1; $i<=$longitud; $i++){
				$aleatorio = rand(0,9);
				$letra.= $aleatorio;
			}
			return $letra."-".$numero;
		}
		
		/* FUNCION PARA LIMPIAR CADENAS */

	protected static function limpiar_cadena($cadena){
			$cadena=trim($cadena); 
			$cadena=stripslashes($cadena);
			$cadena=str_ireplace("<script>", "", $cadena);
			$cadena=str_ireplace("</script>", "", $cadena);
			$cadena=str_ireplace("<script src", "", $cadena);
			$cadena=str_ireplace("<script type=", "", $cadena);
			$cadena=str_ireplace("SELECT * FROM", "", $cadena);
			$cadena=str_ireplace("DELETE FROM", "", $cadena);
			$cadena=str_ireplace("INSERT INTO", "", $cadena);
			$cadena=str_ireplace("DROP TABLE", "", $cadena);
			$cadena=str_ireplace("DROP DATABASE", "", $cadena);
			$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
			$cadena=str_ireplace("SHOW TABLE", "", $cadena);
			$cadena=str_ireplace("SHOW DATABASES", "", $cadena);
			$cadena=str_ireplace("<?php", "", $cadena);
			$cadena=str_ireplace("?>", "", $cadena);
			$cadena=str_ireplace("--", "", $cadena);
			$cadena=str_ireplace(">", "", $cadena);
			$cadena=str_ireplace("<", "", $cadena);
			$cadena=str_ireplace("[", "", $cadena);
			$cadena=str_ireplace("]", "", $cadena);
			$cadena=str_ireplace("^", "", $cadena);
			$cadena=str_ireplace("==", "", $cadena);
			$cadena=str_ireplace(";", "", $cadena);
			$cadena=str_ireplace("::", "", $cadena);
			$cadena=str_ireplace("*", "", $cadena);
			$cadena=stripslashes($cadena);
			$cadena=trim($cadena);
			return $cadena;
		}

		/* FUNCION PARA VERIFICAR DATOS */

	protected static function verificar_datos($filtro, $cadena){

		 	if(preg_match("/^".$filtro."$/", $cadena)){
		 		return false;
		 	}else{
		 		return true;
		 	}

		}

		/* FUNCION PARA VERIFICAR FECHAS */

	protected static function verificar_fecha($fecha){

			$valores=explode('-', $fecha);
			if(count($valores)==3 && checkdate($valores[1], $valores[0], $valores[2])){
				return true;
			}else{
				return false;
			}
		}

		/* FUNCION PARA PAGINAR TABLAS */

	protected static function paginador_tablas($pagina, $NPaginas, $url,$botones){
			$tabla='<nav aria-label="Page navigation" class="listNav"> <ul class="pagination justify-content-center">';

			if($pagina==1){
				$tabla.='<li> <a class="page-link"> </img></a></li>
				';
			}else{
				$tabla.='
				
				<li class="page-item"> <a class="page-link" href="'.$url.'1/"> </a></li>
				<li class="page-item"> <a class="formContainer3" href="'.$url.($pagina - 1).'/"> Anterior  </a></li>
				
				';
			}

			$ci=0;
			for($i=$pagina ; $i<=$NPaginas ; $i++){
				if($ci>=$botones){
					break;
				}
				if($pagina==$i){
					$tabla.='<li class="page-item"> <a class="page-link active" href="'.$url.$i.'/">'.$i.'</a></li>';
				}else{
					$tabla.='<li class="page-item"> <a class="page-link" href="'.$url.$i.'/">'.$i.'</a></li>';
				}
				$ci++;
			}

			if($pagina==$NPaginas){
				$tabla.='<li> <a class="page-link"></a></li>';
			}else{
				$tabla.='<li class="page-item"> <a class="formContainer3" href="'.$url.($pagina + 1).'/ "> Siguiente </a></li>
				<li class="page-item"><a class="page-link" href="'.$url.$Npaginas.'/">
				</a></li>';

			}

          $tabla.='</ul> </nav>';
          return $tabla;
      }


      /* FUNCION PARA RETORNAR ULTIMO ID */

      protected static function get_id(){
//var_dump($conn->lastInsertId());
      	$sql = self::conectar()->lastInsertId();
		//$sql->execute();
		return $sql; 

      }
}	


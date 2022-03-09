<?php 

	require_once "mainModel.php";

	class egresadoModelo extends mainModel{

		/* MODELO EGRESAR UN CURSO */

		protected static function egresar_curso_modelo($datos){
			$conn=mainModel::conectar();
try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES curso_asesorias,curso_asesorias_egresadas');
		$sql=$conn->prepare("INSERT INTO curso_asesorias_egresadas(nivel_egresado,id_curso,fecha_cambio_nivel,numero_acta,id_persona_asesor_egr) VALUES(:nivel_egresado,:id_curso,:fecha_cambio_nivel,:numero_acta,:id_persona_asesor_egr)");
		$sql->bindParam(":nivel_egresado",$datos['nivel_egresado']);
		$sql->bindParam(":id_curso",$datos['id_curso']);
		$sql->bindParam(":fecha_cambio_nivel",$datos['fecha_cambio_nivel']);
		$sql->bindParam(":numero_acta",$datos['numero_acta']);
		$sql->bindParam(":id_persona_asesor_egr",$datos['id_persona_asesor_egr']);
		$sql->execute();
		// $sql->debugDumpParams();

		$sql2=$conn->prepare("UPDATE curso_asesorias SET nivel=:nivel,fecha_termino=:fecha_cambio_nivel WHERE id_curso_asesoria=:id_curso");
		$sql2->bindParam(":nivel",$datos['nvo_nivel']);
		$sql2->bindParam(":id_curso",$datos['id_curso']);
		$sql2->bindParam(":fecha_cambio_nivel",$datos['fecha_cambio_nivel']);
		$sql2->execute();

$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!";
}
				
				return $sql;
		
		} /* FIN DEL MODELO */

			/* MODELO REVERTIR UN NIVEL */

		protected static function revertir_nivel_modelo($datos){
			$conn=mainModel::conectar();
try {
$conn->beginTransaction();
$conn->exec('LOCK TABLES curso_asesorias,curso_asesorias_egresadas');
		$sql=$conn->prepare("DELETE FROM curso_asesorias_egresadas WHERE id_curso_asesoria_egresada=:id_curso_asesoria_egresada");
		$sql->bindParam(":id_curso_asesoria_egresada",$datos['id_curso_asesoria_egresada']);
		$sql->execute();


		$sql2=$conn->prepare("UPDATE curso_asesorias SET nivel=:nivel WHERE id_curso_asesoria=:id_curso");
		$sql2->bindParam(":nivel",$datos['nvo_nivel']);
		$sql2->bindParam(":id_curso",$datos['id_curso']);
		
		$sql2->execute();

$conn->commit();
$conn->exec('UNLOCK TABLES');
} catch(PDOExecption $e) {
	$conn->rollback();
        print "Error!";
}
				
				return $sql;
		
		} /* FIN DEL MODELO */



	}
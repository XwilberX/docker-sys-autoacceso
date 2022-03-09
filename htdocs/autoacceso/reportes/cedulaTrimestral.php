<?php 
header("Content-type:  application/octet-stream");
header("Content-Disposition:  attachment; Filename=Cedula_Trimestral.doc");
require_once "../reportes/conexion.php";

			$periodo1='ENERO '.date("Y", strtotime("this Year")).' - AGOSTO '.date("Y", strtotime("this Year"));
			$periodo2='ABRIL '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
			$periodo3='AGOSTO '.date("Y", strtotime("this Year")).' - ENERO '.date("Y", strtotime("next Year"));
			$periodo4='OCTUBRE '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));

			
			$consulta=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo1'");
				$consulta->execute();
				$dato=$consulta->fetch();

				$consulta2=$mbd->prepare("SELECT contenido FROM archivos WHERE acceso_archivo=7");
				$consulta2->execute();
				$dato2=$consulta2->fetch();

 ?>

<html>
	<?php echo "<img src='data:image/png; base64,".base64_encode($dato2[0])."' style='max-width:250px;'>" ; ?>
 <h2 style="color:red;"> HOLA MUNDO</h2>
 <td value=""><?php print($dato[0]); ?></td>
</html>
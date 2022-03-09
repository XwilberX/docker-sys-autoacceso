 <?php 


require_once "./controladores/reportesControlador.php";
require_once "./controladores/reporteInscritosControlador.php";
require_once "./controladores/reporteAsistenciaControlador.php";
require_once "./controladores/reporteConversacionControlador.php";
require_once "./controladores/reporteConversacionOrigenControlador.php";
require_once "./controladores/reporteEscritosControlador.php";

 $ins_reporte =  new reportesControlador();
 $ins_reporte2 =  new reporteInscritosControlador();
 $ins_reporte3 =  new reporteAsistenciaControlador();
 $ins_reporte4 =  new reporteConversacionControlador();
 $ins_reporte5 =  new reporteConversacionOrigenControlador();
 $ins_reporte6 =  new reporteEscritosControlador();



  ?>

 <div class="g3" id="select_idioma">
	<div class="formContainer4">
		<h3>Generación de reportes</h3>

			<div class="ulReportes">
			<ul class="tabsReportes" id="tabsReportes">
				<li><a href="#rep1"><span>Inscritos</span></a></li>
				<!--<li><a href="#rep2"><span>Ins. por género</span></a></li>-->
				<li><a href="#rep3"><span>Asesorías</span></a></li>
				<li><a href="#rep4"><span>Asistencia</span></a></li>
				<li><a href="#rep5"><span>Conversación</span></a></li>
				<li><a href="#rep6"><span>Conv. por origen</span></a></li>
				<li><a href="#rep7"><span>Escritos</span></a></li>
				<!--<li><a href="#rep8"><span>Cédula trimestral</span></a></li>-->
			</ul>
			<div class="ContenidoPestañaReportes">
				<article id="rep1">
					<a id="reporteLink" href="../reportes/reporteInscritos.php">Descargar éste reporte</a>
					<h2>Concentrado de inscritos por idioma</h2>
						<form class="" action="" method="POST">
						<select name="inscritos_periodo" id="">
							<option value="">Elige</option>
							<option value="1">Ene - Ago / Abr - Oct</option>
							<option value="2">Ago - Ene / Oct - Abr</option>							
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					<?php 
					if(isset($_POST['inscritos_periodo']) && $_POST['inscritos_periodo']!=""){
    						$busqueda=$_POST['inscritos_periodo'];
					 $datos_reporte = $ins_reporte2->reporte_inscritos_periodo_controlador();
					}
					 ?>
				</article>
				<!--<article id="rep2">
					<a id="reporteLink" href="../reportes/reporteInscritosGenero.php">Descargar éste reporte</a>
					<h2>Inscritos por género</h2>
					<?php 
					 $datos_reporte = $ins_reporte->reporte_inscritos_genero_controlador();
					 ?>
				</article>-->
				<article id="rep3">
					<a id="reporteLink" href="../reportes/reporteAsesorias.php">Descargar éste reporte</a>
					<h2>Asesorías</h2>
					<form class="" action="" method="POST">
						<select name="trimestreAsesorias" id="">
							<option value="">Elige</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					 <?php 
						if(isset($_POST['trimestreAsesorias']) && $_POST['trimestreAsesorias']!=""){
    						$busqueda=$_POST['trimestreAsesorias'];

					 		$datos_reporte = $ins_reporte->reporte_asesorias_controlador($busqueda);
						}
					 ?>
				</article>
				<article id="rep4">
					<a id="reporteLink" href="../reportes/reporteAsistencia.php">Descargar éste reporte</a>
					<h2>Concentrado de asistencia mensual por idioma</h2>
					<form class="" action="" method="POST">
						<select name="asistencia_mensual" id="">
							<option value="">Elige</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					<?php 
					if(isset($_POST['asistencia_mensual']) && $_POST['asistencia_mensual']!=""){
    						$busqueda=$_POST['asistencia_mensual'];
					 $datos_reporte = $ins_reporte3->reporte_asistencia_controlador();
					}
					 ?>
				</article>
				<article id="rep5">
					<a id="reporteLink" href="../reportes/reporteConversacion.php">Descargar éste reporte</a>
					<h2>Conversación</h2>
					<form class="" action="" method="POST">
						<select name="conversacion" id="">
							<option value="">Elige</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					<?php 
					if(isset($_POST['conversacion']) && $_POST['conversacion']!=""){
    						$busqueda=$_POST['conversacion'];
					 $datos_reporte = $ins_reporte4->reporte_conversacion_controlador();
					}
					 ?>
				</article>
				<article id="rep6">
					<a id="reporteLink" href="../reportes/reporteConvOrigen.php">Descargar éste reporte</a>
					<h2>Conversación por origen</h2>
					<form class="" action="" method="POST">
						<select name="conv_origen" id="">
							<option value="">Elige</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					<?php 
					if(isset($_POST['conv_origen']) && $_POST['conv_origen']!=""){
    						$busqueda=$_POST['conv_origen'];
					 $datos_reporte = $ins_reporte5->reporte_conversacion_origen_controlador();
					}
					 ?>
				</article>
				<article id="rep7">
					<a id="reporteLink" href="../reportes/reporteEscritos.php">Descargar éste reporte</a>
					<h2>Escritos por mes</h2>
					<form class="" action="" method="POST">
						<select name="escritos" id="">
							<option value="">Elige</option>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select><br>
						<button class="btns_preins" >Ver</button><br>
					</form>
					<?php 
					if(isset($_POST['escritos']) && $_POST['escritos']!=""){
    						$busqueda=$_POST['escritos'];
					 $datos_reporte = $ins_reporte6->reporte_escritos_controlador();
					}
					 ?>
				</article>
				<article id="rep8">
					<a id="reporteLink" href="../reportes/cedulaTrimestral.php">Descargar éste reporte</a>
					<h2>Cédula trimestral</h2>
				</article>
			</div>
		</div>
	</div>
</div>
<!-- <select name="selectSemestre" id="selectSemestre">
			       		 	<option value="0">Seleccione</option>
			       		 	<option value="1">Semestre A</option>
			       		 	<option value="2">Semestre B</option>
			       		 </select><br>
						
						<div class="semestreA" id="semestreA"> 
							<h2>Semestre A</h2>
						 <?php 
						 $datos_reporte = $ins_reporte->reporte_asesorias_controlador();
						 ?>
						</div>
						<div class="semestreB" id="semestreB"> 
							<h2>Semestre B</h2>
						 <?php 
						 echo "Hola";
						 // $datos_reporte = $ins_reporte->reporte_asesorias_controlador();
						 ?>
						
					</div> -->
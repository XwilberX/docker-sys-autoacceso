<?php
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']>=5){
  
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }

        

require_once"./libreria/tcpdf.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Centro de AutoAcceso');
$pdf->SetTitle('FichaInscripcion');
$pdf->SetSubject('Ficha de inscripcion');


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/es.php')) {
    require_once(dirname(__FILE__).'/lang/es.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('helvetica', '', 10);

$curp=$_POST['curp'];

require_once "../reportes/conexion.php";

		if ($_SESSION['privilegio_scaa']!=4){

			$consulta=$mbd->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp='".$curp."'");
		}else{
			$consulta2=$mbd->prepare("SELECT * FROM persona JOIN curso_asesorias ON persona.id_persona=curso_asesorias.id_persona_alumno JOIN idioma ON curso_asesorias.id_idioma=idioma.id_idioma WHERE persona.curp='$curp' AND id_rol='6' AND curso_asesorias.id_idioma=".$_SESSION['curso_asesor_scaa']."");
			
		}

		$consulta->execute();

		$datos = $consulta->fetchAll();
		$datos2 = $consulta->fetchAll();
		$datos3 = $consulta->fetchAll();
		$datos4 = $consulta->fetchAll();     

		$img=$mbd->prepare("SELECT contenido FROM archivo WHERE nombre_archivo='caa_black.jpg'");
		$img->execute();
		$logo = $img->fetchAll();

		$img2=$mbd->prepare("SELECT contenido FROM archivo WHERE nombre_archivo='unach_black.png'");
		$img2->execute();
		$logo2 = $img2->fetchAll();

		$consulta7=$mbd->prepare("SELECT * FROM carreras_unach");
		$consulta7->execute();
		$carreras=$consulta7->fetchAll();
$pdf->AddPage();
$html ="";
$html .='

<style>

.th1{
	width:100px;
	padding-bottom-30px;
	
	
}

.th1 img{
	
}

.th2{
	width:440px;
	
}

.th2 p{
	padding-bottom-30px;
}


.th3{
	width:100px;
	
}

.th4{
	width:300px;
	text-align:left;
}

.th5{
	width:120px;
	border:solid;
}

.th6{
	width:180px;
	border:solid;
}

.th7{
	
	border:solid;
}

.th8{
	width:350px;
	text-align:left;
}

.th9{
	
	border:solid;
}

.th10{
	width:380px;
	text-align:left;
	
}

.th11{
	width:200px;
	text-align:left;
	
}

.th12{
	width:250px;
	text-align:left;
	
}

.th13{
	width:250px;
	text-align:left;
	
}

.th14{
	width:200px;
	text-align:left;
	
}

.th17{
	
	text-align:left;
	width:350px;
}

.th18{
	
	text-align:left;
	width:170px;
}

.th19{
	
	text-align:lrft;
	width:120px;
}

.th20{
	
	text-align:left;
	width:180px;
}

.th21{
	
	text-align:left;
	width:400px;
}

.th22{
	
	text-align:center;
	width:100px;
}

.th23{
	
	text-align:center;
	width:70px;
}

.th24{
	
	text-align:rigth;
	width:180px;
		
}

.th25{
	
	text-align:center;
	width:200px;
		
}
.th26{
	
	text-align:center;

		
}

.th27{
	
	text-align:center;
	width:550px;
}

.th28{
	
	text-align:left;
	width:250px;
}

.th29{
	
	text-align:left;
	width:400px;
}

.th30{
	
	text-align:center;
	width:650px;
}

.th31{
	
	text-align:left;
	width:600px;
}


.table{
	text-align:center;
	
}

.logoFicha1{
	
	width: 100;
	height:100;
	
	
}

.logoFicha2{
	
	width: 100;
	
}

.titulo_ficha{
	font-weight: bold;
	font-size: 18px;
	text-align: center;
	
}

.subT1{
	font-size: 14px;
	font-family: Roboto;
	position: relative;
	text-align: center;
}

.subT2{
	font-weight: bold;
	font-size: 13px;
	font-family: Roboto;
	text-align: center;
}

.subT3{
	font-size: 12px;
	text-align:left;
}

.inputsIzq{
	position: relative;
	float: left;
	margin-left: 10px;
	
}

.divAdmin input[type="text"]{
	border-bottom: solid 1px;
	border-top: none;
	border-right: none;
	border-left: none;
}

#carreraInput{
	width: 22.4%;
}


#refuerzoInput{
	position: relative;
	float: left;
	margin-left: 10px;
	width: 15%;
}

.recursosInput{
	position: relative;
	float: left;
	margin-left: 10px;
}

#fechaInput{
	position: relative;
	float: left;
	margin-left: 10px;
	width: 11%;
}

#direccionInput{
	width: 46.6%;
}

.name{
	font-size:10px;
}

#curpInput{
	position: relative;
	float: left;
	margin-left: 10px;
	width: 11.7%;
}

.firmaInput{
	width: 15%;
}
label{
	font-weight:bold;
	font-size:11px;
}
td{

	font-size:11px;
}

</style>';
		    

		foreach ($datos as $rows) {	

			foreach ($carreras as $i) {
   			if($i['id_carrera_unach']==$rows['carrera_unach'])
   					{$carrera=$i['nombre_carrera_unach'];}
    		}

// add a page

$html .='
<table class="table">

<tr>	
	<th class="th1"><img class="logoFicha1" src="../vistas/images/pdf/unach_black.png" alt="" ></th>
	<th class="th2"><div class="divTitulo_ficha">
		<label class="titulo_ficha" for="" >UNIVERSIDAD AUTÓNOMA DE CHIAPAS</label><br><br>
		<label class="subT1" for="" >Facultad de lenguas campus Tuxtla</label><br><br>
		<label class="subT1" for="" >Centro de AutoAcceso</label>
		</div></th>
	<th class="th3"><img class="logoFicha2" src="../vistas/images/pdf/caa_black.jpg" alt=""></th>

</tr>

<tr>
<br>	
<label class="subT2" for="">FICHA DE INSCRIPCIÓN</label><br>
<label class="subT2" for="">'.$rows['periodo'].'</label>
</tr>


<div class="divAdmin">
	<br><br><br><label class="subT3" for="">EL LLENADO DE  ESTA SECCIÓN ES POR PARTE DE LA ADMINISTRACIÓN</label><br><br><br>
	</tr>
<tr>
	<th class="th4"><label for="" class="labelIzq">Nivel:   </label> <td>'.$rows['nivel'].'</td></th>
	
	<th class="th6">
	<label for="" class="labelDerMedio1">Tipo de estudiante:   </label><td>'.$rows['condicion'].'</td></th>
</tr>
<br><br>

<tr>';
if($rows['fecha_termino']==""){
   $html .='<th class="th8"><label for="" class="labelIzq">Fecha de término:    </label></th>';
}else{
    
     $html .='<th class="th8"><label for="" class="labelIzq">Fecha de término:    </label><td>'.date('d-m-Y',strtotime($rows['fecha_termino'])).'</td></th>';
}

$html .='<th class="th9"><label for="" class="labelDerMedio2" id="labelRefuerzo">Refuerzo:      </label><td>'.$rows['refuerzo'].'</td><br><br></th>
</tr>
<tr>
	<th class="th31"><label for="" class="labelIzq">Estudiante UNACH Carrera:  </label><td>'.$carrera.'</td><br><br></th>
	
</tr>
<tr>

	<th class="th12"><label for="" class="labelIzq">Dependencia:   </label><td>'.$rows['dependencia'].'</td><br><br></th>
</tr>
<tr>
<th class="th11"><label for="" class="labelIzqMedio">Matricula:   </label><td>'.$rows['matricula'].'</td><br><br></th>

<th class="th13"><label for="" class="labelIzqMedio">Periodo:   </label><td>'.$rows['periodo'].'</td></th>

</div>
</tr>
<label>---------------------------------------------------------------------------------------------------------------------------------------------------------</label>
<div class="divAdmin">
	<label class="subT3" for="">EL LLENADO DE  ESTA SECCIÓN ES POR PARTE DEL ESTUDIANTE</label><br><br><br>
<tr>
	<th class="th17"><label for="" class="labelIzq">Tipo de solicitud: </label><td>'.$rows['tipo'].'</td> </th>
	<th class="th19"><label for="" class="labelDerMedio1">Idioma(s): </label><td>'.$rows['etiqueta_idioma'].'</td></th>
</tr>
<br><br>
<tr>	
	<th class="th21"><label for="" class="labelIzq">Nombre (sin abreviaturas):   </label><td>'.$rows['apellido_paterno'].' '.$rows['apellido_materno'].' '.$rows['nombre'].'</td></th>
	<th class="th22"><label for="" class="labelDerMedio1">Sexo:    </label><td>'.$rows['sexo'].'</td></th>
</tr>

<br><br>

<tr>	
	<th class="th10"><label for="" class="labelIzq">Fecha de nacimiento:    </label><td>'.date('d-m-Y',strtotime($rows['fecha_nacimiento'])).'</td></th>
	<th class="th11"><label for="" class="labelDerMedio2">CURP:     </label><td>'.$rows['curp'].'</td></th>
</tr>
<br><br>
<tr>
	<th class="th31"><label for="" class="labelIzq">Dirección:   </label><td>'.$rows['calle'].' #'.$rows['numero'].', '.$rows['colonia'].'. Cp: '.$rows['cp'].'. '.$rows['municipio'].', '.$rows['estado'].'.</td></th>
</tr>
</tr>


<br>
<tr>
	<th class="th28"><label for="">Tel. (local o celular):    </label><td>'.$rows['telefono'].'</td></th>
	<th class="th29"><label for="">Correo electrónico:      </label><td>'.$rows['correo'].'</td>
	</th>
</tr>
<br>
<tr>
	<th class="th31"><label for="">Observaciones:    </label><td>'.$rows['observaciones'].'</td></th>
</tr>

</div>

</table>	

';}


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

$pdf->Output('fichaInscripcion.pdf', 'I');


?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="El Centro de AutoAcceso perteneciente al Departamento de Lenguas de la Universidad Autónoma de Chiapas campus Tuxtla, es una dependencia dedicada a la enseñanza de los idiomas Inglés, Francés, Alemán, Italiano, Chino Mandarín y Español para extranjeros.">	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta property="og:title" content="Centro de AutoAcceso UNACH">
    <meta property="og:description" content="Sitio oficial del Centro de AutoAcceso de la Facultad de Lenguas de la Universidad Autónoma de Chiapas.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SERVERURL; ?>">
    <meta property="og:image" content="<?php echo SERVERURL; ?>vistas/images/pdf/caa_black.jpg">
	
	<?php include "./vistas/inc/link.php";
	if(isset($_SESSION['logged']) && $_SESSION['logged']){

	} else{		
		echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>';
	}
	?>
	<title><?php echo COMPANY; ?></title>

</head>
<body> 
		
	<div id="fb-root"></div>

	<div class="grid-container">
	  
	  <div class="g1">
<?php 
error_reporting(0);
include "./vistas/inc/head1.php"; 
 ?>
	  		  	
	  	
	  </div>

	  <div class="g2" name="menu">
	  
	  	
	  	<?php 
	  	include "./vistas/inc/navBar.php"; 
	  	
	  	?>

	</div>
	  
 <div class="g3" id="principal">
	  	
<?php 

	$peticionAjax=false;
	require_once "./controladores/vistasControlador.php"; 
	$IV= new vistasControlador();

	$vistas=$IV->obtener_vistas_controlador();
	
	if($vistas=="index"||$vistas=="404" ){
		require_once"./vistas/contenidos/".$vistas."-view.php";
	} else{
			//session_start(['name'=>'SCAA']);
			
			$pagina=explode("/", $_GET['views']);

		require_once "./controladores/loginControlador.php";
		$lc = new loginControlador();

	
	include $vistas;
	include "./vistas/inc/logOut.php";
	}
?>
</div>	  

	  <div class="g6">
	  	<?php include "./vistas/inc/foot.php"; ?>
	  </div>

	</div>

<?php
	
	include "./vistas/inc/script.php"; 
		?>

</body>
</html>





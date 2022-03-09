<?php 
    require_once "./controladores/documentoControlador.php";
    $ins_img =  new documentoControlador();
    $datos_img = $ins_img->images_infografia_controlador();
    if($datos_img->rowCount()>=1){
        $campos = $datos_img->fetchAll();
  	}
?>
<div class="formContainer2">
	<div class="slider2" id="slider2">
     <h2>Infografía</h2>
		<figure>
			<?php 
		    foreach ($campos as $rows) {?>
		        <img src="<?php echo 'data:image/png; base64,'.base64_encode($rows['contenido']).'';?>">
		<?php } ?>	
		</figure>
	</div>
	</div>  




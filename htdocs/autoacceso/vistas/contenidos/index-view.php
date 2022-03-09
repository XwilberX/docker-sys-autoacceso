<style>
	
#principal {
  display: grid;

}


.g3-5{

grid-column:1/ span 7;
grid-row: 1/6;
 

}
.g4{
	grid-column: 8/8;
	grid-row: 2;
}

.g5{
	grid-column: 8/8;
	grid-row: 4;

	 
}


@media screen and ( max-width: 768px ){

  	
		#principal {
  		display: flex;
		flex-direction: column;
		
	
		}
}

</style>
<?php 
    require_once "./controladores/documentoControlador.php";
    $ins_img =  new documentoControlador();
    $datos_img = $ins_img->images_index_controlador();
    if($datos_img->rowCount()>=1){
        $campos = $datos_img->fetchAll();
  	}
?>

<div class="g3-5">
	<div class="slider" id="slider">
		<figure>
		<?php 
		    foreach ($campos as $rows) {?>
		        <img src="<?php echo 'data:image/png; base64,'.base64_encode($rows['contenido']).'';?>">
		<?php } ?>	
		</figure>
	</div>
	</div> 

	  <div class="g4">
		 	<label class="tituloLink1" for="">Síguenos en Facebook</label>
		  		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fautoaccesounach&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		 </div>

      <div class="g5">
      	<label class="tituloLink2" for="">Canal de Youtube CAA UNACH</label>
			<iframe width="300" height="250" src="https://www.youtube.com/embed/P5oDXHyqBJM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  </div>



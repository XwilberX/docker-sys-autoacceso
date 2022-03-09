
	  	<a href="<?php echo SERVERURL;?>"><img class="logo1" src="<?php echo SERVERURL; ?>vistas/images/lenguas logo 1.jpg" alt="" ></a>
	  	
	  	<h5 class="tituloCaa">CENTRO DE AUTOACCESO <br>TUXTLA GUTIÉRREZ<br>C-I</h5>
	  	
	  	<!--<a href="">Spanish |</a> <a href="">English |</a> <a href="">French</a> -->
	  	
     <?php  if(!isset($_SESSION['logged']) && !$_SESSION['logged']){?>
	  	<a class="gi_1" href="<?php echo SERVERURL; ?>login/"><input class="btnLog" id="salirBtn" type="button" value="Inicia sesión"></a>
	  <?php }else{ ?>	

	  	<a class="gi_1" href=""><input class="btnLog2" id="salirBtn" type="button" value="Cerrar sesión"></a>
	  	<?php }?>
	  				
		<div class="cuadrado">	<a class="gi_1" href="<?php echo SERVERURL; ?>home/" id="homeCuadrado" style="display: none;"><img src="<?php echo SERVERURL; ?>vistas/images/home_icon.png" ></a></div>
		<div class="etiqueta"><label class="userTag" id="usertag"><?php echo $_SESSION[('nombre_scaa')]." ".$_SESSION[('apellidoP_scaa')]." ".$_SESSION[('apellidoM_scaa')] ?> </label></div>

<?php
	  	if(isset($_SESSION['logged']) && $_SESSION['logged']){
	  		echo"<script>document.getElementById('usertag').style.display='block'</script>";
	  		echo"<script>document.getElementById('homeCuadrado').style.display='block'</script>";
	  			}else{
	  					echo"<script>document.getElementById('homeCuadrado').style.display='none'</script>";
	  				}
	  			?>
		
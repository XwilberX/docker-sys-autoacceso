 <?php     

  require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->obtener_asesores_controlador();
        if($datos_usuario->rowCount()>=1){
                      
            $campos = $datos_usuario->fetchAll();
        }
       
  ?>

 <div class="g3">
<div class="formContainer4"><br>
	<h2 style='font-size:35px;'>Coordinador del Centro de AutoAcceso</h2>
		<?php 

					foreach ($campos as $rows) {

						if($rows['nombre']=="Cley"){
						 echo "<p style='font-weight:bold; font-size:30px;'>Mtro. ".$rows['nombre']." ".$rows['apellido_paterno']."</p>
						 <p style='font-weight:bold;'>Email:</p> <p>".$rows['correo']."</p> 
						 <p style='font-weight:bold;'>Envía mensaje a través de facebook:</p> <p><a href='https://www.facebook.com/autoaccesounach' target='_blank'>https://www.facebook.com/autoaccesounach</a></p>
						 <p style='font-weight:bold;'> Teléfono o Whatspp:</p>  <p>961 198 1004</p>";
					    }						  
					}
				?>
<!--
	<div class="loginPanel" id="loginPanelId" >
		<h3>Enviar correo</h3>
		
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/correoAjax.php" method="POST" data-form="question" >
			<label for="">Nombre: </label><input placeholder="Introduce tu nombre" class="nombreCorreo" id="nombreCorreo" name="nombreCorreo" type="text" required="" minlength="2" maxlength="50" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}"><br>
			<label for="">Correo: </label><input placeholder="Introduce tu correo electrónico" class="emailCorreo" id="emailCorreo" name="emailCorreo"  type="email" required="" minlength="5" maxlength="100" pattern="[a-z0-9@._/-]{5,100}"><br>
			<label for="">Asunto: </label><input placeholder="Ingresa el motivo del mensaje" class="asuntoCorreo" id="asuntoCorreo" name="asuntoCorreo" type="text" required="" minlength="3" maxlength="30" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{3,30}"><br>
			<textarea class="inputEnviarCorreo" name="mensaje" placeholder="Escribe aquí tu mensaje" required="" minlength="2" maxlength="500" pattern="[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ ._/-]{2,500}"></textarea><br><br>
			<input class="btns" type="submit" value="Enviar"><br><br>
		</form>
		-->
	</div>	
</div>
	

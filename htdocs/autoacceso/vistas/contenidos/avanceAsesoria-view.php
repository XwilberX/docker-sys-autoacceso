<?php 
if($_SESSION['id_scaa']!=$pagina[1]){
    if($_SESSION['privilegio_scaa']!=1 && $_SESSION['privilegio_scaa']!=2 && $_SESSION['privilegio_scaa']!=4 && $_SESSION['privilegio_scaa']!=6){
     
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  }
 ?>

<style>
	#loginPanelId{
		min-height: 420px;
	}
</style>

<div class="formContainer4"><br>

              <?php 
            require_once "./controladores/asesoriasControlador.php";
            $ins_asesoria =  new asesoriasControlador();
            $datos_asesoria = $ins_asesoria->datos_asesoria_controlador("Unico",$pagina[1]);
          if($datos_asesoria->rowCount()==1){
           
            $campos = $datos_asesoria->fetch();
           ?>

<div>
	<div class="loginPanel" id="loginPanelId" >
		<h3>Avance de la asesoria</h3>
		<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/asesoriasAjax.php" method="POST" data-form="save" >
			<label for="">Nombre: </label><input class="nombreAvance" id="nombreAvance" type="text" value="<?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno']?> " disabled><br>
			<label for="">Idioma: </label><input class="emailAvance" id="emailAvance" type="text" value="<?php echo $campos['etiqueta_idioma']?> " disabled><br>
			<label for="">Nivel: </label><input class="asuntoAvance" id="asuntoAvance" type="text" value="<?php echo $campos['nivel']?>" disabled><br>
		<?php if($_SESSION['privilegio_scaa']==6){ ?>	
		<textarea name="avance_alumno" disabled=""><?php echo $campos['progreso']?></textarea>
		<?php }else{ ?>		
			<textarea minlength="5" maxlength="500" name="avance_asesoria_alumno" placeholder="Máximo 500 caracteres" required=""><?php echo $campos['progreso']?></textarea><br><br>
			<input class="btns" type="submit" value="Guardar"><br><br>
			<input type="hidden" name="asesoria_id_decrypt" value=" <?php echo $pagina[1]; ?> "> 
		</form>
<?php
}

 	} ?>
	</div>
</div>	
</div>
	


 <style>
  #fC2{

  min-height: 527px;
  }

  label{
    font-size: 18px;
  }
</style>
 <div class="g3" id="select_idioma">
    
  <div class="formContainer4" id="fC2">

          <?php 

            require_once "./controladores/alumnoControlador.php";
            
 
            $ins_alumno =  new alumnoControlador();
            

            $datos_alumno = $ins_alumno->datos_alumno_controlador("Unico",$pagina[1]);
           
          if($datos_alumno->rowCount()>=1){
            
            $campos = $datos_alumno->fetch();
            $campos2 = $datos_alumno->fetch();
            $campos3 = $datos_alumno->fetch();
            $campos4 = $datos_alumno->fetch();
           // $des=$ins_preinscrito->desencriptar_controlador($campos['password']);

            if($campos['sexo']=="Masculino"){
           ?>

<h2>Bienvenido <?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno'];?></h2>

<?php }else{?>

<h2>Bienvenida <?php echo $campos['nombre'].' '.$campos['apellido_paterno'].' '.$campos['apellido_materno'];?></h2>

 <?php } ?>
    <p class="pBold">(Recuerda que cada idioma se cobra por separado)</p>

    <div>
      <?php 

  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->lista_idiomas_inscritos($pagina[1]);
  
 ?>
    </div>


    <div>
     <?php 

  require_once"./controladores/alumnoControlador.php";
  $ins_alumno= new alumnoControlador();
  echo $ins_alumno->lista_idiomas_para_inscribir($pagina[1]);
  
 ?>
    </div>
  <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alumnoAjax.php" method="POST" data-form="save" >
<input type="hidden" name="id_agregar_nvo_idioma" value="<?php echo $pagina[1];?> "> 
<input type="hidden" name="solicitud_nvo_idioma" value="3"> 

      <label class="pBold">¿Deseas inscribirte a un idioma diferente?</label>
  <input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar();">
  <input type="button" class="btns_preins" value="No" onclick="idioma_ocultar();"><br>


<div id="seleccionar_idioma1" class="seleccionar_idioma">
  <label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg2" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected>Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>

<label for="">Tipo</label>
<select id="idiomas" name="tipo1" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>

     <label for="">Nivel </label><select id="nivel2" name="nivel2" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select>

    <label class="pBold">¿Deseas agregar otro idioma?</label>
  <input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar1();">
  <input type="button" class="btns_preins" value="No" onclick="idioma_ocultar1();"><br>
</div>
<div id="seleccionar_idioma2" class="seleccionar_idioma">
  <label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg3" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>
 <label for="">Tipo</label>
<select id="idiomas" name="tipo2" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>
  
    <label for="">Nivel </label><select id="nivel3" name="nivel3" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select>
    

      <label class="pBold">¿Deseas agregar otro idioma?</label>
  <input type="button" class="btns_preins" value="Si" onclick="idioma_mostrar2();">
  <input type="button" class="btns_preins" value="No" onclick="idioma_ocultar2();"><br>
</div>

<div id="seleccionar_idioma3" class="seleccionar_idioma">
  <label for="">Idioma al que deseas inscribirte</label>
<select id="idiomas" name="idioms_reg4" pattern="[a-zA-Z áéíóúñÁÉÍÓÚÑ]{5,15}">
  <option value="" selected >Elige una opcion</option>
  <option value="1">Inglés</option>
  <option value="2">Francés</option>
  <option value="3">Alemán</option>
  <option value="4">Italiano</option>
  <option value="5">Chino Mandarín</option>
  <option value="6">Español</option>
</select>
 
<label for="">Tipo</label>
<select id="idiomas" name="tipo3" pattern="[a-z A-Z áéíóúñÁÉÍÓÚÑ]{10,15}">
  <option value="" selected>Elige una opcion</option>
  <option value="Inscripción">Inscripción</option>
  <option value="Reinscripción">Reinscripción</option>
 </select>

     <label for="">Nivel </label><select id="nivel4" name="nivel4" pattern="[a-z A-Z 0-9 áéíóúñÁÉÍÓÚÑ]{1,10}">
       <option value="" selected >Selecciona</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="Ubicación">Ubicación</option>
    </select>
  
</div>

<br>
<a href=""><button type="submit" id="btnGuardarIdiomas" class="btns" style="display: none;">Guardar</button></a> <br><br>


</form>

        <?php }else{ ?>
        <br><br>
        <div class="alert_error"><br>
          <img class="alert_error_icon" src="<?php echo SERVERURL; ?>vistas/images/alert_error.png" alt="">
          <p class="errorSub1">¡Ocurrió un error inesperado!</p>
          <p class="errorSub2">No ha sido posible encontrar la información solicitada</p>

        </div>
        <?php } ?>

</div>  
</div>  


<!-- 

<label for="" style="font-weight: bold; font-size:18px;">Datos personales</label><br><label class="switchBtn">
    <input type="checkbox" class="checkDatosReins" id="checkDatosReins" onclick="showCheck1()">
    <div class="slide round"></div>
</label>

<div class="datosPersonalesReins" id="datosPersonalesReins" style="display: none;">
</div> 


<label for="" style="font-weight: bold; font-size:18px;">Idiomas</label><br><label class="switchBtn2">
    <input type="checkbox" class="checkDatosReins2" id="checkDatosReins2" onclick="showCheck2()">
    <div class="slide2 round2"></div>
  </label>
  <div class="idiomasReins" id="idiomasReins" style="display: none;">

</div> 
 -->
<!--  <?php     

  require_once "./controladores/usuarioControlador.php";
            $ins_usuario =  new usuarioControlador();
            $datos_usuario = $ins_usuario->obtener_asesores_controlador();
        if($datos_usuario->rowCount()>=1){
                      
            $campos = $datos_usuario->fetchAll();
        }
       
  ?> -->

 <div class="g3" id="select_idioma">
	<div class="formContainer4"><br>
		  <div id="btnsList">
         <?php if($_SESSION['privilegio_scaa']==1){ ?>
         <a href="<?php echo SERVERURL; ?>gestionarDocumentos/"><input type="button" class="btns2" value="Gestionar documentos"></a>
         <a href="<?php echo SERVERURL; ?>gestionarImagenes/"><input type="button" class="btns2" value="Imágenes de carouseles"></a>
    </div>
 <?php } ?>
		<h3>Imágenes de carouseles</h3>
        <div class="ulReportes">
            <ul class="tabsReportes" id="tabsReportes">
                <li><a href="#rep1"><span>Carousel Index</span></a></li>
                <li><a href="#rep2"><span>Carousel Infografía</span></a></li>
            </ul>
            <div class="ContenidoPestañaReportes">
                <article id="rep1">
                   <div class="banderasDiv"><br>
                    <div>
                        <?php   
                          require_once"./controladores/documentoControlador.php";
                          $ins_doc= new documentoControlador();
                          echo $ins_doc->carousel_index_controlador($pagina[1],5,$_SESSION['privilegio_scaa'],$_SESSION['curp_scaa'],$pagina[0],"");
                        ?>
                    </div>
                    </div>
                </article>
                
                <article id="rep2">
                     <div class="banderasDiv">
                    <div>
                         <?php   
                          require_once"./controladores/documentoControlador.php";
                          $ins_doc= new documentoControlador();
                          echo $ins_doc->carousel_infografia_controlador();
                        ?>
                    </div>
                    </div>
                </article>
        </div>

        </div>

    </div>
</div>
<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if($peticionAjax){
		require_once "../modelos/passwordModelo.php";
	}else{
		require_once "./modelos/passwordModelo.php";
	}

	class passwordControlador extends passwordModelo{

	/* ACTUALIZAR CONTRASEÑA CONTROLADOR */

		public function actualizar_password_controlador(){
			$id=mainModel::decryption($_POST['pass_edit_decrypt']);
			$id=mainModel::limpiar_cadena($id);
			
			$password=mainModel::limpiar_cadena($_POST['pass1_edit']);
			$confirmPass=mainModel::limpiar_cadena($_POST['pass2_edit']);



			if($password=="" || $confirmPass==""){

					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No ha llenado todos los campos obligatorios",
						"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();

			}

			if(mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}",$password) || mainModel::verificar_datos("[A-Za-zñÑ0-9$@.-]{6,30}",$confirmPass)){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Las contraseñas no coinciden con el formato solicitado",
						"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();

						}
							/*COMPROBAR LAS CLAVES*/ 

					if($password != $confirmPass){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Las claves que acaba de ingresar no coinciden",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();

					}else{
							$claveEncriptada=mainModel::encryption($password);
						}

						$datos_edit_pass=[
							"id"=>$id,
							"password"=>$claveEncriptada

						];


						$edit_pass=passwordModelo::actualizar_password_modelo($datos_edit_pass);
						
						if($edit_pass->rowCount()==1){
							$alerta=[
							"Alerta"=>"limpiar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"La contraseña se ha actualizado correctamente.",
							"Tipo"=>"success"
							];
						}else{
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"La contraseña no se ha actualizado. Verifique sus datos e intente nuevamente",
							"Tipo"=>"error"
							];
													
						}
							echo json_encode($alerta);
							exit();
		}/* FIN DEL CONTROLADOR */

		/* CORREO PARA REESTABLECER CONTRASEÑA CONTROLADOR */
		
		public function correo_reestablecer_password_controlador(){

		$correo=mainModel::limpiar_cadena($_POST['correo_reestablecer_pass']);

		$check_email=mainModel::ejecutar_consulta_simple("SELECT correo FROM persona WHERE correo='$correo'");
					if($check_email->rowCount()<=0){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El correo ingresado no se encuentra registrado en el sistema. Verifique sus datos",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}else{
						$consulta=mainModel::conectar()->prepare("SELECT id_persona, nombre FROM persona WHERE correo='$correo'");
						$consulta->execute();
						$dato = $consulta->fetch(PDO::FETCH_ASSOC);			
					}
					
					$asunto="Restablecimiento de contraseña";
					$destinatario=$correo;
					$link=SERVERURL.'actualizarPass/'.mainModel::encryption($dato['id_persona']);
				
					require_once "../PHPMailer/Exception.php";
					require_once "../PHPMailer/PHPMailer.php";
					require_once "../PHPMailer/SMTP.php";

					$mail= new PHPMailer(true);
						
					$mail->SMTPOptions=array(
						'ssl'=>array(
							'verify_peer'=>false,
							'verify_peer_name'=>false,
							'allow_self_signed'=>true,
						)
					);

					$mail->isSMTP(true);
					$mail->Host="ssl://email-smtp.us-east-1.amazonaws.com";
					$mail->Port="465";
					$mail->SMTPSecure="ssl";
					$mail->SMTPAuth=true;
					$mail->Username="AKIATIEYV6XEL7GDVGAF"; //Accede a la cuenta que enviará el correo
					$mail->Password="BCrZNWZT6Hk4JgmhWtwJrCLySOw/SZ1dV46ZRsHA+zTt";
					$mail->CharSet = "utf-8";
					$mail->SetFrom("centrodeautoacceso.tuxtla@unach.mx", "Centro de AutoAcceso"); //Quien envía
					$mail->addAddress($destinatario);
                    $mail->isHTML(true);
					$mail->Subject=$asunto;  
					$mail->Body="
						<head>  
						  <style>       
						    body { 
						        height: 100%; width: 100%; max-width: 100%;
						        font-family: 'Tahoma', arial;  
						        background-color: #D8D8D8;
						        overflow: hidden;
						    }   

						    .wit {
						        display: block; position:relative;
						        width: 100%; max-width:80%;                             
						        background-color: #FFF;         
						        left:10%;
						    }

						    .h2Color{
						    	color:#203552;
						    	font-weigth:bold;
						    }
						    .h3Color{
						    	color:#203552;
						    	font-weight:bold;
						    	font-size:18px;
						    	
						    }
						    .pRed{
						    	color:red;
						    }
						    .pMsg{
						    	color:#203552;
								font-size:18px;
						    }
						    .btnPass{
						    	cursor:pointer;
						    	text-decoration: none;
							    padding: 10px;
							    font-weight: 600;
							    font-size: 20px;
							    color: #ffffff;
							    background-color: #1883ba;
							    border-radius: 6px;
							    border: 2px solid #0016b0;
						    }

						  </style>
						</head>
						<body>
							<div class=wit>
							<img src='".SERVERURL."vistas/images/banner_mail.png' style='min-width:100px'>
								<h2 class=h2Color>Restablecimiento de contraseña</h2>
								<p class=pRed>¡NO RESPONDA A ESTE CORREO!</p><br>
								<p class=h3Color>Apreciable ".$dato['nombre'].":</p>
								<p class=pMsg>Usted ha solicitado el restablecimiento de su clave de acesso al SCAA. Para llevar a cabo dicho procedimiento haga clic en el botón que se muestra a continuación:</p>
								<a href=".$link."><button class=btnPass>Restablecer contraseña</button></a>
								<br>
								<p class=h3Color>Gracias por utilizar https://lenguas.unach.mx/autoacceso</p>
							</div>
						</body>

					";  
					$mail->send();
					if($mail){
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Operación exitosa",
							"Texto"=>"Se ha enviado un correo electrónico a la dirección que proporcionaste. En él se detallan los pasos para restablecer tu contraseña. Si dicho correo no se encuentra en la bandeja de entrada, revisa los correos spam o no deseados.",
							"Tipo"=>"success"
						];
					
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No se ha podido enviar el correo de reestablecimiento de contraseña. Comuníquese con un administrador del sistema.",
							"Tipo"=>"error"
							];
						}
					echo json_encode($alerta);
					exit();

		}/* FIN DEL CONTROLADOR */
	}
<?php 
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;

	if($peticionAjax){
		require_once "../modelos/correoModelo.php";
	}else{
		require_once "./modelos/correoModelo.php";
	}
	
	class correoControlador extends correoModelo{

		/* CONTROLADOR PARA ENVIAR UN CORREO */

		public function enviar_correo_controlador(){
			$destinatario="autoacceso.flct@unach.mx";
		
			$nombre=mainModel::limpiar_cadena($_POST['nombreCorreo']);
			$correo=mainModel::limpiar_cadena($_POST['emailCorreo']);
			$asunto=mainModel::limpiar_cadena($_POST['asuntoCorreo']);
			$msg=mainModel::limpiar_cadena($_POST['mensaje']);
			
			if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{2,50}",$nombre)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha introducido un nombre que no es válido.",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}

			if(mainModel::verificar_datos("[a-z A-Z áéíóúüñÁÉÍÓÚÜÑ]{3,30}",$asunto)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El asunto introducido contiene caracteres que no son válidos.",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}


			require_once "../PHPMailer/Exception.php";
			require_once "../PHPMailer/PHPMailer.php";
			require_once "../PHPMailer/SMTP.php";

			$mail= new PHPMailer(true);
			
				try {
				
			
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
					$mail->msgHTML("
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

						    .blue { color: #178195; }
						    .bold { font-weight: bold; }
						    .grey { color: #585858; }
						    .padding32 { padding: 32px; }
						  </style>
						</head>
						<body>
							<div class=wit>
							<img src='".SERVERURL."vistas/images/banner_mail.png' style='min-width:100px'>
								<h2 class=h2Color>Enviado a través de la sección 'Contáctanos' de centrodeautoacceso.com</h2>
								<p class=pRed>¡NO RESPONDA A ESTE CORREO!</p><br>
								<p class=h3Color>Nombre del usuario que envía el correo: ".$nombre."</p>
								<p class=h3Color>Correo de quien envía el mansaje: ".$correo."</p>
								<p class=h3Color>Mensaje:</p>
								<p class=pMsg>".$msg."</p><br><br>
								<p class=h3Color>Gracias por utilizar https://lenguas.unach.mx/autoacceso</p>
								
							</div>
						</body>

					");
					/*'Nombre: '"\n".'Email: '.$correo."\n\n".$msg; */ 
					$mail->send();
					
				
				
				} catch (Exception $e) {
					echo $e;
					
					} finally{

						if($mail){
							$alerta=[
								"Alerta"=>"limpiar",
								"Titulo"=>"Operación exitosa",
								"Texto"=>"El correo electrónico se ha enviado con éxito.",
								"Tipo"=>"success"
							];
						}else{
					
							
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No se ha podido enviar el correo electrónico",
								"Tipo"=>"error"
							];
						}
						echo json_encode($alerta);
						exit();
				}
		}/* FIN DEL CONTROLADOR */


	}




			

			

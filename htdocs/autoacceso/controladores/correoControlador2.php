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


					$mail->isSMTP();
					$mail->Host="smtp.gmail.com";
					$mail->Port=587;
					$mail->SMTPSecure="tls";
					$mail->SMTPAuth="true";
					$mail->SMTPAuth="true";
					$mail->Username="centrodeautoacceso.tuxtla@gmail.com"; //Accede a la cuenta que enviará el correo
					$mail->Password="LBV6VvPSmhxbK7H";
                    $mail->CharSet = 'UTF-8';
					$mail->SetFrom("centrodeautoacceso.tuxtla@gmail.com"); //Quien envía
					
					$mail->addAddress($destinatario, "Centro de AutoAcceso"); //A quien se le va a enviar

					$mail->Subject=$asunto;  
					$mail->Body='Nombre: '.$nombre."\n".'Email: '.$correo."\n\n".$msg; 
					$mail->send();
					
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
				
				} catch (Exception $e) {
					echo $e;
			}
		}


	}/* FIN DEL CONTROLADOR */




			

			

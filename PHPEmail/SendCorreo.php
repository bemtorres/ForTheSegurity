<?php
  if (!isset($rootDir)) {
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
  }


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once ($rootDir . "/PHPMailer/PHPMailer.php");
require_once ($rootDir . "/PHPMailer/POP3.php");
require_once ($rootDir . "/PHPMailer/SMTP.php");
require_once ($rootDir . "/PHPMailer/Exception.php");
require_once ($rootDir . "/DAO/Correo_sistemaDAO.php");
// require_once ($rootDir . "/DAO/RegistroDAO.php");

class SendCorreo {

	public static function enviar($correoDestino,$asunto,$mensaje){
		$mail = new PHPMailer(true);
		try{

			// admin correo base de datos
			$correo = Correo_sistemaDAO::buscar(1);

			
			$mail->isSMTP(); // Set mailer to use SMTP xd
			$mail->Host = $correo->getHost();// Specify main and backup SMTP 
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = $correo->getCuenta_usuario(); // SMTP username
			$mail->Password =  $correo->getClave_usuario();  // SMTP password
			$mail->SMTPSecure = $correo->getProtocolo();
			$mail->CharSet = 'utf-8';
			$mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
			$mail->Port = $correo->getPort();; // TCP port to connect to
			$mail->setFrom($correo->getCuenta_usuario(), 'Contacto Sistema');
			$mail->Subject = $asunto;
			$mail->Body = $mensaje;     
			$mail->addAddress($correoDestino);    

			// $mail->isSMTP(); // Set mailer to use SMTP xd
			// $mail->Host = 'smtp.hostinger.com';// Specify main and backup SMTP 
			// $mail->SMTPAuth = true; // Enable SMTP authentication
			// $mail->Username = 'contacto@chileservices.cl'; // SMTP username
			// $mail->Password =  'STMszI2OgikQ';  // SMTP password
			// $mail->SMTPSecure = 'ssl';
			// $mail->CharSet = 'utf-8';
			// $mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
			// $mail->Port = 465; // TCP port to connect to
			// $mail->setFrom('contacto@chileservices.cl', 'Contacto Sistema');
			// $mail->Subject = $asunto;
			// $mail->Body = $mensaje;     
			// $mail->addAddress($correoDestino);      

			if ($mail->Send()) {
				return 1;
			} else {
				return -1;
			}			
		} catch (Exception $e) {
			return 0;
			// return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
		}
	}	

	public static function mensaje($mensaje){
		$fechaHoy = Date('d-m-Y');
		$mensaje = "<table style='width:700px;background-color:white;border-collapse:collapse' align='center'>
        <tbody>
            <tr>
                
                <td style='padding:0px 10px;width:528px;background-color:#00843D;'> &nbsp;<span style='font-family:sans-serif'></span></td>       
            </tr>
            <tr>
                <td style='padding:10px 30px'>
                    <table style='width:100%'>
                        <tbody>
                            <tr>
								<td>
									<h1></h1>                     
                                    <span style='padding:0px 10px;font-size:30px;font-family:sans-serif;color:#323232'>
                                    </span> 
                                </td>
                                <td style='text-align:right'> 10/07/2019 </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style='padding:15px 30px;font-family:Gotham, \"Helvetica Neue\" ,Helvetica,Arial,sans-serif;font-size:16px;color:#54575d'>
                    <p>Estimado(a) usuario,</p>
                    <p>Has solicitado una recuperaci&oacute;n de contrase&ntilde;a.</p>
                    <p>Tu Usuario es: <span style='font-weight:bold;font-size:18px;color:rgb(14, 14, 87)'>b.morat</span></p>
                    <p>Tu Contrase&ntilde;a es: <span style='font-weight:bold;font-size:18px;color:rgb(14, 14, 87)'>12333</span></p>
                    <p><em>Acuerdate cambiarla al entrar</em></p>
                    <p style='margin-bottom:0px'>Saludos Cordiales </p>
                    <p style='font-weight:bold;margin-top:0px'>#ForTheSecurity</p>
                </td>
            </tr>
            <tr>
                <td style='padding:0px'>
                    <table style='border-collapse:collapse;width:100%'>
                        <tbody>
                            <tr>
                                <td style='padding:0px 10px;width:528px;background-color:#EA7E1D;color:#323232'>
                                        &nbsp;
                                <span style='font-family:sans-serif'></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>";
		return $mensaje;
	}	
	
}

$correoDestino = "benja.mora.torres@gmail.com";
$asunto = "hola";
$mensaje = SendCorreo::mensaje("asdasd");
$estado = SendCorreo::enviar($correoDestino,$asunto,$mensaje);

echo $mensaje;
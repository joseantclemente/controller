
<?php
require("class.phpmailer.php");







$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->From     = "alertas@electronosis.net";
$mail->FromName = "Electronosis";
$mail->Host     = "localhost";
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true;
$mail->Username = "alertas@electronosis.net";
$mail->Password = "Aler2014.";
$mail->Subject  = "Alarma";
//$mail->SetLanguage("es", '/');

//$body.='<html><table><tr><td>Hola</td><td>Adios</td></tr></table></html>';


//$mail->Body = '<table width="500"><tr><td colspan=2><img src="http://www.electronosis.net/cabecera.jpg" ></td></tr><tr><td><strong>Suceso</strong></td><td>Texto del Suceso</td></tr><tr><td><strong>'.$suceso.'</strong></td><td>'.$texto.'</td></tr></table>';
//echo '<table width="500"><tr><td colspan=2><img src="http://www.electronosis.net/cabecera.jpg" ></td></tr><tr><td><strong>Suceso</strong></td><td>Texto del Suceso</td></tr><tr><td style=" font-size=10px; font-weight=bold;">'.$suceso.'</td><td align=justify>'.$texto.'</td></tr></table>';

$mail->Body= "<table><tr><td colspan='2'>Solicitud de demo Controller</td></tr><tr><td>Empresa</td><td>".$_POST['Empresa']."</td></tr><tr><td>Persona de contacto</td><td>".$_POST['Nombre']."</td></tr><tr><td>Telefono</td><td>".$_POST['Telefono']."</td></tr><tr><td>email</td><td>".$_POST['Email']."</td></tr></table>";

//$mail->Body    = $body;
//echo $mail->Body;
$mail->IsHTML(true);
//$mail->AltBody = $text_body;
//$mail->AddAddress("tatiana.hidalgo@electronosis.net", "Tatiana");

$mail->AddAddress("joseantclemente@gmail.com", "Sistemas");

//$mail->AddAddress($destino);
$exito=$mail->Send();
/*echo $_POST['Empresa'];
echo $_POST['Nombre'];
echo $_POST['Telefono'];
echo $_POST['Email'];

echo "<table><tr><td colspan='2'>Solicitud de demo Controller</td></tr><tr><td>Empresa</td><td>".$_POST['Empresa']."</td></tr><tr><td>Persona de contacto</td><td>".$_POST['Nombre']."</td></tr><tr><td>Telefono</td><td>".$_POST['Telefono']."</td></tr><tr><td>email</td><td>".$_POST['Email']."</td></tr></table>";
*/
//header ("Location: http://www.controllerenergetico.com/contacto.php?id=1");
?>


<?php

//include dirname(dirname(__FILE__)).'/mail.php';
header("Content-type: text/json");
$respuesta=array();

require("class.phpmailer.php");

//********** PARA LA BUENA VERSION AÑADIR PARAMETROS $NOMBRE1, $PASS1
function enviomail($mail1, $user1, $pass1)
{
	$mail = new PHPMailer();
	$mail->CharSet="utf-8";
	$mail->ContentType = "";
	$mail->From     = "info@controllerenergetico.com";
	$mail->FromName = "Controller";
	$mail->Host     = "controllerenergetico.com";
	$mail->Mailer   = "smtp";
	$mail->SMTPAuth = true;
	$mail->Username = "info@controllerenergetico.com";
	$mail->Password = "Inf2014.";
	$mail->Subject  = "Recordatorio datos usuario";
	$mail->AltBody="Recordatorio Acceso Controller 
	
	Email: ".$mail1."
	- - -
	Nombre de Usuario: ".$user1."
	Contraseña: ".$pass1."
	
	Accede a tu Controller: http://controllerenergetico.dyndns.org:8081/login.php
	

Controller Energético
http://www.controllerenergetico.com

C/General Prim, 6. Alicante
C/Primitivo Pérez, 4. Alicante
C/Maestro Puig Valera, 91. Santomera (Murcia)
"
	;
	
	$sendsubject= "=?utf-8?b?".base64_encode($subject)."?=";
  	$mail->Subject = $sendsubject;
	
	$mail->IsHTML(true);
	//$mail->Body= "<table><tr><td colspan='2'>Solicitud de Claves de Acceso</td></tr><tr><td>Email de usuario: </td><td>".$mail1."</td></tr></table>";
	
	
	$mail->Body= "<style>@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|PT+Sans:400,700);
.tleft{ text-align: left;}
.tright{ text-align: right;}

body, html{ width: 100%; height: auto; }
body { color: #666666; font-family: 'Open Sans', sans-serif; font-size: 13px; margin: 0px auto;}

table{ border-collapse:collapse; margin: 0 auto; padding: 0;}

table.t1{ margin: 0 auto; padding: 0; width:540px;}
table.t1 thead, table.t1 thead th{ height: 115px;}
table.t1 thead img{ height: 122px; width:540px;}
table.t1 tbody{ height: auto;}
table.t1 tr.t2{ border-collapse:collapse; height: auto; margin: 0 auto; padding: 0; width:498px;}
table.t1 tr.t2 td:nth-of-type(1),table.t1 tr.t2 td:nth-of-type(3){ border-collapse:collapse; margin: 0 auto; padding: 0; width:25px;}
table.t1 tr.foot td:nth-of-type(2){background-color: #BBBBBB; height: 20px;}

table.t3,table.t4{width:100%;}
table.t3 thead th{height: auto; padding-bottom: 20px; width:100%;}
table.t3 thead th:first-child{padding-left: 30px; width: 33%;}
table.t3 thead img{ display: inline-block; float: left; height: auto; margin-top: 8px; width:auto;}
table.t3 thead h1{ 
	color:#DF4C4C; 
	display: inline-block; 
	float: left; 
	font-family:'PT Sans'; font-size: 17px; font-weight:400; text-align: center;
	width: 57%;
}
table.t4 td {margin: 0 auto; width: 25px; }
table.t1 tr.t2  table.t4 td:nth-of-type(1),table.t1 tr.t2  table.t4 td:nth-of-type(3){
	border-collapse: collapse;
	margin: 0 auto;
	padding: 0 0 0 30px;
	width: 25px;
}
table.t1 tr.t2 table.t4 td:nth-of-type(3) { padding: 0 20px 0 30px;}
table.t4 tbody h2{ 
	color:#666666; 
	display: inline-block; 
	float: left; 
	font-size: 14px; font-weight:600; text-align: left;
	width: auto;
}

table.t1 tr.t2 table.t4 tr:nth-of-type(2) td:nth-of-type(1){ vertical-align: top;}
table.t1 tr.t2 table.t4 tr:nth-of-type(2) td:nth-of-type(1) p{ font-size: 12px;  margin-bottom: 0px;}
table.t1 tr.t2 table.t4 tr:nth-of-type(2) td:nth-of-type(1) p:nth-of-type(2){ margin-top: 5px;}
table.t1 tr.t2 table.t4 tr:nth-of-type(2) td:nth-of-type(3) p{ font-size: 11px; text-align: justify;}
table.t1 tr.t2 table.t4 tbody tr td:nth-of-type(1),table.t1 tr.t2 table.t4 tbody tr td:nth-of-type(3){width:170px;}
table.t1 tr.t2 table.t4 tbody tr td:nth-of-type(2){text-align: center; border-right: 1px solid #AAAAAA; width: 1px;}
table.t1 tr.t2 table.t4 tbody tr:nth-of-type(3) td:nth-of-type(2){border-right: none;}
table.t1 tr.t2 table.t4 tbody tr:nth-of-type(3) td{ padding-top: 25px;padding-bottom: 50px;}

td.relleno{ margin-top: 18px; width: 20%;}
td.relleno > a
{
  -moz-box-shadow:inset 0px 1px 0px 0px #58A6DA;
  -webkit-box-shadow:inset 0px 1px 0px 0px #58A6DA;
  box-shadow:inset 0px 1px 0px 0px #58A6DA;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3D97D3), color-stop(1, #277AB1));
  background:-moz-linear-gradient(top, #3D97D3 5%, #277AB1 100%);
  background:-webkit-linear-gradient(top, #3D97D3 5%, #277AB1 100%);
  background:-o-linear-gradient(top, #3D97D3 5%, #277AB1 100%);
  background:-ms-linear-gradient(top, #3D97D3 5%, #277AB1 100%);
  background:linear-gradient(to bottom, #3D97D3 5%, #277AB1 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#277AB1', endColorstr='#3D97D3',GradientType=0);
  background-color:#2980B9;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius: 3px;
  border: 1px solid #277AB1;
  cursor: pointer;
  color: #fff;
  padding: 7px 11px 5px 11px;
  font-size: 12px;
  text-transform: none;
  float: left;
}
td.relleno > a > span:nth-of-type(1){ width: 82%; float: left;}
td.relleno > a > span:nth-of-type(2){ float: right; width: 16%; max-height: 20px; max-width: 20px;}
td.relleno > a > span:nth-of-type(2) > img{ height: 16px; margin-top: 1px; width: 16px;}
td.relleno > a:hover
{
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #277AB1), color-stop(1, #3D97D3));
  background:-moz-linear-gradient(top, #277AB1 5%, #3D97D3 100%);
  background:-webkit-linear-gradient(top, #277AB1 5%, #3D97D3 100%);
  background:-o-linear-gradient(top, #277AB1 5%, #3D97D3 100%);
  background:-ms-linear-gradient(top, #277AB1 5%, #3D97D3 100%);
  background:linear-gradient(to bottom, #277AB1 5%, #3D97D3 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#277AB1', endColorstr='#3D97D3',GradientType=0);
  background-color:#277AB1;
}
.footcenter tr.footcenter td{ height:auto !important;}
.footcenter td:nth-of-type(2){border-right: none !important;}
.footcenter td p {font-size: 9px; margin: 0 auto; height: auto;} 
.footcenter td.title1 p {font-size: 11px;} 
.footcenter td:nth-of-type(3) p {font-size: 9.5px;} 
tr.footcenter:last-of-type td{ padding-bottom: 28px !important;}
</style>

<table class='t1'>
<thead>
    <th colspan='3'><img src='http://controllerenergetico.dyndns.org:8081/controller2/images/mail-header.png' alt='Email Controller Datos'></th>
</thead>
<tbody>
    <tr class='t2'>
        <td></td>
        <td>
            <table class='t3'>
            <thead>
                <th><h1>Recordatorio </h1></th>
                <th colspan='2'><h1>Acceso Controller</h1></th>
            </thead>
            </table>
            <table class='t4'>	
            <tbody>
                <tr>
                    <td><h2>Email</h2></td>
                    <td align='center'></td>
                    <td><h2>Datos Usuario</h2></td>
                </tr>
                <tr>
                    <td><p>".$mail1."</p></td>
                    <td align='center'></td>
                    <td><p>Nombre usuario: ".$user1."</p><p>Contraseña: ".$pass1."</p></td>
                </tr>
                <tr>
                    <td><img src='http://controllerenergetico.dyndns.org:8081/controller2/images/mail-deco.png'></td>
                    <td align='center'></td>
                    <td class='relleno'><a target='_blank' href='http://controllerenergetico.dyndns.org:8081/login.php'>
            <span>Controller</span><span><img src='http://controllerenergetico.dyndns.org:8081/controller2/images/mail-flecha.png' alt='Entrar a Controller'></span>
        </a></li></td>
                </tr>
                <tr class='footcenter'>
                    <td class='tleft'><p>C/General Prim, 6. Alicante</p></td>
                    <td align='center'></td>
                    <td class='tright title1'><p>Controller Energético</p></td>
                </tr>
                <tr class='footcenter'>
                    <td class='tleft'><p>C/Primitivo Pérez, 4. Alicante</p></td>
                    <td align='center'></td>
                    <td class='tright'><p></p></td>
                </tr>
                <tr class='footcenter'>
                    <td class='tleft'><p>C/Maestro Puig Valera, 91. Santomera (Murcia)</p></td>
                    <td align='center'></td>
                    <td class='tright'><p><a target='_blank' href='http://www.controllerenergetico.com'>www.controllerenergetico.com</a></p></td>
                </tr>
            </tbody>
            </table>
        </td>
        <td></td>
    </tr>
    <tr class='foot'><td></td><td></td><td></td></tr>
</tbody> 
</table>";
	
	
	
	
	//**********ACTIVAR PARA LA BUENA VERSION
	//$mail->AddAddress($mail, $mail);
	//Ponernos en copia a nosotros
	$mail->AddAddress("cristina.palomares@electronosis.net", "Cristina");
	//$mail->AddAddress("jose.electronosis@gmail.com", "Sistemas");
	
	$exito=$mail->Send();
	
	if($exito){ return true; } else{ return false; }
}


$post = (!empty($_POST)) ? true : false;

if($post)
{
	include 'email_validation.php';

	$email = trim($_POST['email']);

	$error = '';
	$user = '';
	$pass = '';
	$idsum = '';


	// Check email
	if(!$email)	{ $error .= 'Introduzca su email.<br />';}

	if($email && !ValidateEmail($email))
	{
		$error .= 'El email introducido no es correcto.<br />';
	}


	//Aquí haremos la comprobacion con la BD, si existe email
	//****************************************************************************************
	
	$dbname="Tiemporeal";
	$uid="sa";
	$serverName = "192.168.5.40\SQLEXPRESS";
	$pwd="Power%01";
	$constante=0;
	$connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database"=>"$dbname");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$continua = true;
	
	$sql="SELECT id_suministro from suministros where email_alarmas='".$email."'";

	$rs = sqlsrv_query( $conn, $sql);

	while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
		$idsum = $row["id_suministro"];
	}
	

	
	$sql2="SELECT usuario, pass from usuario_suministro usum, usuarios us where idsuministro=".$idsum." and usum.idusuario=us.idusuario and dom=1";

	$rs2 = sqlsrv_query( $conn, $sql2);

	while( $row2 = sqlsrv_fetch_array( $rs2, SQLSRV_FETCH_ASSOC) ) {
		$user = $row2["usuario"];
		$pass = $row2["pass"];
	}
	/****************************************************************/
	/*AQUI ACABA LA COMPROBACION DEL MAIL EN LA BD*/


	//Aquí haremos el envio de mail al usuario si ha resultado correcta la consulta
	//esto se sustituye por el if else de abajo
	//****************************************************************************************
	if(!$error){
		$bmail = enviomail($email, $user, $pass);
		
		if($bmail){
			$respuesta["resp"]="OK";
		}else{
			$respuesta["resp"]="Error al enviar la solicitud";
		}
	}
	else
	{
		$respuesta["resp"]="El usuario no existe o no es administrador";
	}
	/****************************************************************/
	
		
	echo json_encode($respuesta);

}
?>
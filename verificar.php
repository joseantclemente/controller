<?php
	header("Content-type: text/json");
	$dbname="Tiemporeal";
	$uid="sa";
	$serverName = "192.168.5.40\SQLEXPRESS";
	$pwd="Power%01";
	$constante=0;
	$connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database"=>"$dbname");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$respuesta=array();
	$correcto=true;
	$mia=false;
	$multi1=false;
	$multi2=false;
	$index=false;

	$usuario = stripslashes($_POST["user"]);
	$pass = stripslashes($_POST["pass"]);
	




	if ((($usuario=="demo")&&($pass=="demo"))||(($usuario=="Demo")&&($pass=="demo")))
	{
		
		$multi2=true;
		$respuesta["enlace"]="suministros.html?id=2";
	}
				
	
	else
	{
		$correcto=false;
		$respuesta["respuesta"]="datos";	
	}
	





	if($correcto==true)
	{
		$respuesta["correcto"]="OK";
		//envia response.enlace	
	}
	else
	{
		$respuesta["correcto"]="NO";
	}

	







	echo json_encode($respuesta);
?>

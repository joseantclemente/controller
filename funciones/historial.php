<?php
	header("Content-type: text/json");
	$dbname="Tiemporeal";
	$uid="sa";
	$serverName = "192.168.5.40\SQLEXPRESS";
	$pwd="Power%01";
	$constante=0;
	$connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database"=>"$dbname");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$salida= '';
	$fecha1 = '';
	$salida["tabla"] = '';
	

	//Todos los alias y CUPS de suministros y el ID
	$sqllistado = "SELECT TOP 10 * FROM Sucesoslog, Sucesos_Umbrales WHERE Sucesoslog.id_suministro=".$_GET["idsum"]." AND Sucesoslog.id_suministro=Sucesos_Umbrales.idsuministro order by hora desc";
	
	$rslistado = sqlsrv_query( $conn, $sqllistado);

	
	while( $rowlistado = sqlsrv_fetch_array( $rslistado, SQLSRV_FETCH_ASSOC) ) {
		$campo_umbral = $rowlistado['campo_umbral'];
		
		if($campo_umbral=="altatensionl1" || $campo_umbral=="altatensionl2" || $campo_umbral=="altatensionl3" || $campo_umbral=="sobretensionl1" || $campo_umbral=="sobretensionl2" || $campo_umbral=="sobretensionl3"){
			$umbral = $rowlistado[$campo_umbral]. " V";
		}else if($campo_umbral=="p1" || $campo_umbral=="p2" || $campo_umbral=="p3" || $campo_umbral=="p4" || $campo_umbral=="p5" || $campo_umbral=="p6"){
			$umbral = $rowlistado[$campo_umbral]. " kW";
		}else if($campo_umbral=="reactiva"){
			$umbral = $rowlistado[$campo_umbral]. " %";
		}
		
		if($campo_umbral=="funcionamiento"){
			$tiempo = $rowlistado[$campo_umbral];
			$umbral = "- - -";
		}else{
			$tiempo = $rowlistado[$campo_umbral."tiempo"];
		}
		
		
		
		
		if($fecha1 == date_format($rowlistado['hora'], 'd/m/y')){
			$salida["tabla"] = $salida["tabla"]."<li><div class='fleft'><p><span aria-hidden='true' class='icon-notification'></span>".utf8_encode($rowlistado["alarma"])."</p><p>Hora de alarma: <span>".date_format($rowlistado['hora'], 'H:i')."</span></p><p>Umbral programado a ".$umbral."</p><p>Tiempo programado para recibir alarma: después de ".$tiempo." minutos</p></div></li>";
		}else{
			$fecha1 = date_format($rowlistado['hora'], 'd/m/y');
			$salida["tabla"] = $salida["tabla"]."<li><div class='fleft'><span>".date_format($rowlistado['hora'], 'd/m/y')."</span><p><span aria-hidden='true' class='icon-notification'></span>".utf8_encode($rowlistado["alarma"])."</p><p>Hora de alarma: <span>".date_format($rowlistado['hora'], 'H:i')."</span></p><p>Umbral programado a ".$umbral."</p><p>Tiempo programado para recibir alarma después de ".$tiempo." minutos</p></div></li>";
		}
		
	}
	
	
	if($salida["tabla"]=='' || $salida["tabla"]==null){
		$salida["tabla"] = "<li><div class='fleft'><p>No hay alarmas registradas</p></div></li>";	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	echo json_encode($salida);
?>
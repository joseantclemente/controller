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

	$usuario = stripslashes($_GET["user"]);
	$pass = stripslashes($_GET["pass"]);
	


	if (($usuario=="mia")&&($pass=="mia2014."))
	{
		$mia=true;
		$respuesta["enlace"]="mia/loginmia.php";
	}
	else if (($usuario=="demo5")&&($pass=="demo"))
	{
		$multi1=true;
		$respuesta["enlace"]="multipunto/index.php?id=2";
	}
	else
	{

		if($conn)
		{
			$sql1="Select count(*) as 'cuenta', usuario from usuarios where usuario='".$usuario."' and pass='".$pass."' group by usuario";

			$rs = sqlsrv_query( $conn, $sql1);

			if  (sqlsrv_has_rows( $rs ))
			{

				$sqlusuarios="select * from usuarios where usuario='".$usuario."'";
			
				$rsusuarios=sqlsrv_query( $conn, $sqlusuarios);

				while( $rowusuarios = sqlsrv_fetch_array( $rsusuarios, SQLSRV_FETCH_ASSOC) ) {
					$sqlusuariossum="select * from usuario_suministro where idusuario=".$rowusuarios['idusuario'];
				
					$rsusuariossum=sqlsrv_query( $conn, $sqlusuariossum);
					session_unset();
					session_destroy();
					session_start();
					$_SESSION['demo']=0;
					if (($usuario=="demo")||($usuario=="demo2"))
					{
						$_SESSION['demo']=1;	
					}

					$_SESSION['empresa']=$rowusuarios['empresa'];
					$_SESSION['iduser']=$rowusuarios['idusuario'];	
						
					unset($_SESSION['SUMINISTROS']);
					while( $rowusuariossum = sqlsrv_fetch_array( $rsusuariossum, SQLSRV_FETCH_ASSOC) )
					{
						
						$_SESSION['SUMINISTROS'][]=$rowusuariossum['idsuministro'];
						
					}

					$_SESSION['CONECTADO']=1;

					for($i=0;$i<count($_SESSION['SUMINISTROS']);$i++)
	   				{
	    			//	echo $_SESSION['SUMINISTROS'][$i];
	   				}


	   				if ((($usuario=="demo")&&($pass=="demo"))||(($usuario=="Demo")&&($pass=="demo")))
					{
						//header('Location: multipunto/index.php?id='.$_SESSION['SUMINISTROS'][0]);
						$multi2=true;
						$respuesta["enlace"]="seleccion.php?id=".$_SESSION['SUMINISTROS'][0];
					}
					else
					{
						//header('Location: index.php?id='.$_SESSION['SUMINISTROS'][0]);
						$index=true;
						$respuesta["enlace"]="seleccion.php?id=".$_SESSION['SUMINISTROS'][0];
					}

				}
			}
			else
			{
				$correcto=false;
				$respuesta["respuesta"]="datos";
			}
		}
		else
		{
			$correcto=false;
			$respuesta["respuesta"]="conexion";	
		}
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

<?php 
session_start();
$correcto=0;
//$suministros=array();
$consulta="";
$x=0;
for($i=0;$i<count($_SESSION['SUMINISTROS']);$i++)
{
	if ($x==0){
		$consulta="id_suministro=".$_SESSION['SUMINISTROS'][$i];
	}
	else{
		$consulta=$consulta." or id_suministro=".$_SESSION['SUMINISTROS'][$i];
	}

	$x++;

	if ($_SESSION['SUMINISTROS'][$i]==$_GET['id'])
	{
		$correcto=1;
	}

}

if ($correcto==0)
{
	header('Location: login.php');
}

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Controller Energético</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="screen, print"/>
	
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
    <script type="text/javascript">
		var division=location.href.split("?");
		var division2=division[1].split("=");
		var ide=division2[1];
    	setInterval(function() {

			$.getJSON("conexiones/treal3inicio.php?id="+ide, function(data, textStatus) {
				document.getElementById('pactiva').innerHTML = data.API;
				document.getElementById('preactiva').innerHTML = data.IPI;
				document.getElementById('pcapacitiva').innerHTML = data.CPI;
			});

		}, 1000);
	</script>
    
    
</head>



<body>
<?php include_once("/analyticstracking.php") ?>
	<script src="funciones/graficos.js"></script>
	
    
    
    
	<header class="gen">
    	<div>
            <div class="sup">
                <div class="fleft"><span aria-hidden="true" class="icon-uniE609"></span></div>
                <div class="fleft"><p class="tcenter">Suministro: <span id="suministro">Almería</span></p></div>
                <div class="fright"><a href="seleccion.php?id=2"><span aria-hidden="true" class="icon-search"></span></a></div>
            </div>
            
            <nav id="navegador">
                <ul>
                    <li><a href="#"><span aria-hidden="true" class="icon-screen"></span></a></li>
                    <li><a href="#"><span aria-hidden="true" class="icon-gauge"></span></a></li>
                    <li><a href="#"><span aria-hidden="true" class="icon-uniE600"></span></a></li>
                </ul>
            </nav>
		</div>
   
	</header>
    
    
    
    <div class="container">
    	<h1 class="raleway fleft">Selección de Suministro</h1>
        
        <ul class="ultreal fleft">
            <li>
                <div>
                    <div class="fleft infoactiva">
                        <p>892,12 <span>kW</span></p>
                        <p>Energía Activa</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    
    

		<!--<article id="indexcontent" class="content bgindex">
			<section class="textcenter">
				
				<article>
					<section>
						<article><h4>Potencia Activa</h4></article>
						<article>
							<h5 id="pactiva">-</h5>
							<h4>kW</h4>
						</article>
					</section>
				</article>
				<article>
					<section>
						<article><h4>Potencia Reactiva</h4></article>
						<article><h5 id="preactiva">-</h5>
						<h4>kVAR</h4></article>
					</section>
				</article>
				<article>
					<section>
						<article><h4>Potencia Capacitiva</h4></article>
						<article><h5 id="pcapacitiva">-</h5>
						<h4>kVAR</h4></article>
					</section>
				</article>
			</section>
		</article>-->


	</div> <!--end container content-->

	<script>window.onload = setActive;</script>
</body>
</html>
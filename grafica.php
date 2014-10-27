
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Controller Energético</title>

	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

	
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="screen, print"/>
	
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

 	<script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>    
    <link rel="stylesheet"  href="styles/jquerymobile.css" media="screen, print"/>  



	
	<script src="//code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>


 
	




<script type="text/javascript">


function cogerDatos()
{
	//fechaini='05-04-2014';
	//fechafin='14-04-2014';
	//alert('http://192.168.2.41:8080/scada/def/funciones/excesos5.php?id='+ide+'&fechaini='+fechaini+'&fechafin='+fechafin);
	
			$.ajax({
				
        //url: 'funciones/excesosreactiva.php?id='+ide+'&fechaini='+fechaini+'&fechafin='+fechafin,
		url:'/funciones/excesosreactiva.php?id=2&fechaini=21-10-2014&fechafin=21-10-2014',
		async: false,
		
        success: function(point) {
			
			
			/*cP1=point.ConsumoP1;
			cP2=point.ConsumoP2;
			cP3=point.ConsumoP3;
			cP4=point.ConsumoP4;
			cP5=point.ConsumoP5;
			cP6=point.ConsumoP6;
			Total=cP1+cP2+cP3+cP4+cP5+cP6;
			rP1=point.ReactivaP1;
			rP2=point.ReactivaP2;
			rP3=point.ReactivaP3;
			rP4=point.ReactivaP4;
			rP5=point.ReactivaP5;
			rP6=point.ReactivaP6;
			Totalreactiva=rP1+rP2+rP3+rP4+rP5+rP6;
			PC1=point.P1C;
			PC2=point.P2C;
			PC3=point.P3C;
			PC4=point.P4C;
			PC5=point.P5C;
			PC6=point.P6C;
			PorcP1=point.PorcP1;
			PorcP2=point.PorcP2;
			PorcP3=point.PorcP3;
			PorcP4=point.PorcP4;
			PorcP5=point.PorcP5;
			PorcP6=point.PorcP6;
			
			ExcP1=point.ExcP1;
			ExcP2=point.ExcP2;
			ExcP3=point.ExcP3;
			ExcP4=point.ExcP4;
			ExcP5=point.ExcP5;
			ExcP6=point.ExcP6;
			
			cosP1=point.cosP1;
			cosP2=point.cosP2;
			cosP3=point.cosP3;
			cosP4=point.cosP4;
			cosP5=point.cosP5;
			cosP6=point.cosP6;	
			alias=point.alias;
			nombre=point.nombre;
			direccion=point.direccion;
			poblacion=point.poblacion;
			provincia=point.provincia;
			
			PenReactivaP1=point.PenReactivaP1;
			
			PenReactivaP2=point.PenReactivaP2;
			PenReactivaP3=point.PenReactivaP3;
			PenReactivaP4=point.PenReactivaP4;
			PenReactivaP5=point.PenReactivaP5;
			PenReactivaP6=point.PenReactivaP6;*/
					
			var graficas=point.grafica.split("|");
			for (i=0;i<graficas.length;i++)
			{
				var graficas2=graficas[i].split(",");
			var valores=[];

				
				valores.push(new Date(graficas2[0],graficas2[1],graficas2[2],graficas2[3],graficas2[4]));
				valores.push(parseFloat(graficas2[5]));
				valores.push(parseFloat(graficas2[6]));
				
				
			
			graficasbueno.push(valores);
				}
			
			
			//alert(point[3]);
			
			//alert(point[4]);
			
		}
		});
		
}



alert("antes de Graficas bueno");
	 graficasbueno=[];

	 cogerDatos();
	 alert("Despues de Graficas bueno: "+graficasbueno[1]);

google.load('visualization', '1.1', {packages: ['corechart', 'controls']});
alert("antes de visualizar grafico");
drawVisualization();
alert("despues de visualizar grafico");
	 google.load('visualization', '1.1', {packages: ['corechart', 'controls']});
      function drawVisualization() {
  var dashboard = new google.visualization.Dashboard(document.getElementByName('d'));

   var control = new google.visualization.ControlWrapper({
     'controlType': 'ChartRangeFilter',
     'containerId': 'control',
     'options': {
       // Filter by the date axis.
       'filterColumnIndex': 0,
       'ui': {
         'chartType': 'areaChart',
         'chartOptions': {
           'chartArea': {'width': '90%'},
           'hAxis': {'baselineColor': 'none'}
         },
         // Display a single series that shows the closing value of the stock.
         // Thus, this view has two columns: the date (axis) and the stock value (line series).
        
         // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
         'minRangeSize': 86400000
       }
     },
     // Initial range: 2012-02-09 to 2012-03-20.
     //'state': {'range': {'start': new Date(2014,4, 19), 'end': new Date(2014, 4, 20)}}
   });

   var chart = new google.visualization.ChartWrapper({
     'chartType': 'LineChart',
     'containerId': 'chart',
     'options': {
       // Use the same chart area width as the control for axis alignment.
       'chartArea': {'height': '80%', 'width': '90%'},

       'legend': {'position': 'none'}
     },
     // Convert the first column from 'date' to 'string'.
     
   });

   var data = new google.visualization.DataTable();
  			data.addColumn('datetime', 'Fecha');
			data.addColumn('number', 'E. Activa');
			data.addColumn('number', 'E. Reactiva');
			//data.addColumn({type:'string', role:'style'});

   // Create random stock values, just like it works in reality.
   
   


data.addRows(graficasbueno);

      

   dashboard.bind(control, chart);
   dashboard.draw(data);
}
      //google.setOnLoadCallback(drawVisualization);
	  //google.setOnLoadCallback(drawChart);
    </script>

</head>



<body>
		<header class="gen">
    	<div>
            <div class="sup">
                <div class="fleft"><span aria-hidden="true" class="icon-uniE609"></span></div>
                <div class="fleft"><p class="tcenter">Suministro: <span id="suministro">-</span></p></div>
                <div class="fleft"><a href="#" onClick="redirigir('sucesos.html');"><span aria-hidden="true" class="icon-search"></span></a></div>
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
    
    
    
   <!-- <div class="container">
    	<h1 class="raleway fleft">Selección de Suministro</h1>
        
      
               
                    <div id="dashboard1">
				        <div id="chart"></div>
				        <div id="control"></div>
				    </div>
                    
            
  
    </div>
    
    -->
    
 <div name="d" id="d">
				        <div id="chart"></div>
				        <div id="control"></div>
				    </div>



	</div>
</body>
</html>
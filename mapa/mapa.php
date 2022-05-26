<?php
require_once("database.php");

$db = new Database();
$tipo = $_POST['tipo'];
$poblacion = $_POST['poblacion'];
$db->query("select * from locales where tipo = '".$tipo."' and poblacion = '".$poblacion."'");
$resultado = $db->rows();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script>
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
          		center: <?php echo $resultado[0]['coordenadas'];?>,
          		zoom: 12
        	});
			
			<?php
        	$i = 0;
        	foreach($resultado as $fila){
        	?>
        	var contentString = '<?php echo $fila['nombre']; ?>';
        	var infowindow<?php echo $i;?> = new google.maps.InfoWindow({
		    		content: contentString
		  	});
		  	var marker<?php echo $i;?> = new google.maps.Marker({
		  			position: <?php echo $fila['coordenadas'];?>,
		        	map: map,
		        	title: '<?php echo $fila['nombre']; ?>'
		    });
		    marker<?php echo $i;?>.addListener('click', function() {
		    		infowindow<?php echo $i;?>.open(map, marker<?php echo $i;?>);
		    });
			<?php
				$i++;
				}
			?>	
		}
    </script>
  </head>
  <body>
    <div id="map" style="height: 50%; width: 50%"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgV9GFzHFfH7_9yzuB6ZigYjFK3bt88no&callback=initMap"></script>


<?php
$apiKey = "61226c75ee6a07840596aa08ffca58c6";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $poblacion . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>
<div class="report-container">
        <h2><?php echo "El tiempo en ".$data->name?></h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humedad: <?php echo $data->main->humidity; ?> %</div>
            <div>Viendo: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>



  </body>
</html>
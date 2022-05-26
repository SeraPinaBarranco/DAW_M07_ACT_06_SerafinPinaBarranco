 <?php
    require_once "basedatos.php";
    header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");


    /*
        OpenWeatherMap
    */
    $apiKey = "ef77df448ad117bd63dc4630288b5ef9";
    $q;
   


    $res = "";
    $titulo= "";
    $query;
    //*Si el formulario es el tipo de local
    if (isset($_GET['tipo'])) {
        
        $tipo = $_GET['tipo'];
        $query = "SELECT * FROM locales WHERE tipo= '$tipo'";
        

        // while ($f = mysqli_fetch_array($res)) {
        //     //extract($res);
        //     //echo ($f['tipo']);
        // }
        $titulo= "Locales tipo: ". $tipo . ", localizados";
        //echo "<pre>";
        //echo "</pre>";
        echo "local";
    }

    $ciudadTiempo;
    $clima;
    //*Si el formulario es la poblacion
    if (isset($_GET['poblacion'])) {
        $tipo = $_GET['poblacion'];
        $q= utf8_encode($tipo);
        $query = "SELECT * FROM locales WHERE poblacion= '$tipo'";
        $con = connDB();

        $res = mysqli_query($con, $query);

        $titulo= "Locales en ". $tipo . " localizados";
        //echo $_GET['poblacion'];

        //*OPENWEATHER
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $q . "&APPID=" . $apiKey . "&lang=es&units=metric";

        $json_file = file_get_contents($apiUrl);

        $objCity= json_decode($json_file);

        $ciudadTiempo = $objCity->name;//*Ciudad del tiempo
        $clima= strtoupper($objCity->weather[0]->description);
        $icono= $objCity->weather[0]->icon;
        $temperatura= $objCity->main->temp;
        $viento= $objCity->wind->speed;
        echo ("<span hidden>" . $ciudadTiempo . "-" . $clima . "-" . $temperatura . "</span>");
        //$coord = strval($objCity->coord);

        // echo "<pre>";
        // var_dump($objCity);
        // echo "</pre>";
        $clima= "<h2>Clima en la localidad</h2>
                <span> $clima</span>
       
                <h4>Temperatura actual</h4>
                <span> $temperatura Centígrados</span>
       
                <h4>Velocidad del viento</h4>
                <span> $viento km/h</span>
               </div>";
                         
    }
    $con = connDB();

    $res = mysqli_query($con, $query);
    mysqli_close($con);
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="styles.css">
 
 <script type="text/javascript">
     //* Mapa simple
    
     let map;

     function initMap() {
         
         const myLatLng = { lat: 40.190105, lng: -3.797714 };
         const map = new google.maps.Map(document.getElementById("map"), {
             center: myLatLng,
             zoom: 10,
         });

         let marcadores = []

         <?php
            while ($f = mysqli_fetch_array($res)) {
                extract($f);
                echo " marcadores.push(['" . $nombre . "'," . $coordenadas . ", '" . $poblacion . "','" . $tipo . "']); ";
            }

            ?>
         
         const infowindow = new google.maps.InfoWindow();

         //* Recorrer el array para poner un marcador por ciclo
         marcadores.forEach(([title, position, c, tipo], i) => {            
             const marker = new google.maps.Marker({
                 position,
                 map,
                 title,
             });
             marker.addListener("click", () => {
                 infowindow.setContent("<h3>" + tipo + "</h3><p>" + title + "</p><p>"+ c +"</p>")
                 infowindow.open({
                     anchor: marker,
                     map,
                     shouldFocus: false,
                 });
             });
         });

        }
         window.initMap = initMap;

     
 </script>
</head>
 <body>     
     <h1><?php echo $titulo ?></h1>

     <div class="contenedor">
         <div id="map"></div>
         
        <?php if(isset($clima)){
        ?>    
        <div class="tiempo"><?php echo $clima ?></div>
        <?php
        }
        ?>
     </div>
        

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGvqvIeHAsg2QjDzywtHKIMNWtM1hTOJo&callback=initMap&v=weekly" defer></script>
 </body>

 </html>
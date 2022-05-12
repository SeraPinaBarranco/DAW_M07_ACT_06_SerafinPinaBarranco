 <?php
    require_once "basedatos.php";

    //*Si el formulario es el tipo de local
    if($_GET['tipo']){
        $tipo= $_GET['tipo'];
        $query= "SELECT * FROM locales WHERE tipo= '$tipo'";
        $con = connDB();

        $res= mysqli_query($con,$query);

        while($f = mysqli_fetch_array($res)){
            //extract($res);
            echo($f['tipo']) ;

        }
        //echo "<pre>";
        //echo "</pre>";
    }

    //*Si el formulario es la poblacion
    if($_GET['poblacion']){
        echo $_GET['poblacion'];
    }

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
         
         function initMap() {
             const myLatLng = { lat: 40.195813, lng: -3.804213 }
;
             const map = new google.maps.Map(document.getElementById("map"), {
                 zoom: 10,
                 center: myLatLng,
             });

             new google.maps.Marker({
                 position: myLatLng,
                 map,
                 title: "Hello World!",
             });
         }
        
         window.initMap = initMap;

     </script>
 </head>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGvqvIeHAsg2QjDzywtHKIMNWtM1hTOJo&callback=initMap&v=weekly" defer></script>

 <div id="map"></div>
 <body>



 </body>

 </html>
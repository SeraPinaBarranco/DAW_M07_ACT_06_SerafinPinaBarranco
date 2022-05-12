<?php
    require_once "basedatos.php";
    
    function tipo_local(){
        $conn = connDB();
        $queryTipo = " SELECT tipo FROM locales GROUP BY tipo";    
        $res_tipo = mysqli_query($conn,$queryTipo);
        mysqli_close($conn);
        return $res_tipo;
    }

    function localidad(){
        $conn = connDB();
        $queryTipo = " SELECT poblacion FROM locales GROUP BY poblacion";    
        $res_tipo = mysqli_query($conn,$queryTipo);
        mysqli_close($conn);
        return $res_tipo;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mapa.php" method="get">
        <div>
            <h3>Selecciona establecimiento tipo de local</h3>
            <select name="tipo" id="tipo">
                <?php 
                    $res = tipo_local();
                    while($fila = mysqli_fetch_assoc($res)){
                        echo " <option value='" . $fila['tipo'] . "'> " .  $fila['tipo'] ." </option>";                    
                    };
                      
                ?>
            </select>
            <input type="submit" value="Consultar" name="valor">
        </div>
    </form>

    <form action="mapa.php" method="get">
        <div>
            <h3>Selecciona establecimiento por localidad</h3>
            <select name="poblacion" id="tipo">
                <?php 
                    $res = localidad();
                    while($fila = mysqli_fetch_assoc($res)){
                        echo " <option value='" . $fila['poblacion'] . "'> " . utf8_encode($fila['poblacion']) ." </option>";                    
                    };                      
                ?>
            </select>
            <input type="submit" value="Consultar" name="valor">
        </div>
    </form>
    
</body>
</html>

<!-- //AIzaSyBGvqvIeHAsg2QjDzywtHKIMNWtM1hTOJo -->
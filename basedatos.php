<?php

    function connDB()
        {
            $server= "localhost";
            $user="root";
            $pass="";
            $db="mapalocales";

            $mysqli = mysqli_connect($server,$user,$pass,$db)or die("Failed to connect to MySQL: ") ;

            return $mysqli;
        }


?>
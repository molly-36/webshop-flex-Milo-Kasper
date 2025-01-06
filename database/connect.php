<?php
    $host = "localhost";
    $username="root";
    $password= "";
    $dbname= "eerste database";
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    if ($mysqli->connect_error) {
        print($mysqli->connect_error);
        exit();
    }



?>
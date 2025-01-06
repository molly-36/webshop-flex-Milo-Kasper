<?php
    $host = "localhost";
    $username="root";
    $password= "";
    $dbname= "database_webshop";
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    if ($mysqli->connect_error) {
        print($mysqli->connect_error);
        exit();
    }



?>
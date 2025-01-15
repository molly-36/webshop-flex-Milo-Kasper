<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_homepage.css">
    <title>Nieuw Nieuws</title>
</head>
    <?php
    include("connect.php");
    session_start();
    
    if(!isset($_SESSION["user_id"])) {
        header("Location: index.php");
    }
    if($_SESSION["gebruikertype"] == "admin"){
        echo"<p>je bent een admin</p>";
    }
    ?>
<ul>
    <li><button id="log_uit_button"><a href="log_uit.php">log uit</a></button class="log_uit_button"></li>
    <li><a href="nieuws.php">nieuw nieuws</a></li>
    <li><a href="contact.php">contacteer ons</a></li>
    <li><a href="aanbod.php">ons aanbod</a></li>
</ul>
<body>
    <h1>Welkom!</h1>
    <?php
    if($_SESSION["gebruikertype"] == "admin"){
        echo"<p>je bent een admin</p>";
    }
    ?>
    
</body>
</html>
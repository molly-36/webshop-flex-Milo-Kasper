<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehome.css">
    <title>Nieuw Nieuws</title>
</head>
    <?php
    include("connect.php");
    session_start();
    
    if(!isset($_SESSION["user_id"])) {
        header("Location: index.php");
    }
    ?>
<ul>
    <li><a href="log_uit">log uit</a></li>
    <li><a href="nieuws.php">nieuw nieuws</a></li>
    <li><a href="contact.php">contacteer ons</a></li>
</ul>
<body>
    <h1>Welkom!</h1>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
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
    <li><button id="log_uit_button"><a href="log_uit.php">log uit</a></button class="log_uit_button"></li>
    <li><a href="nieuws.php">nieuw nieuws</a></li>
    <li><a href="contact.php">contacteer ons</a></li>
    <li><a href="aanbod.php">ons aanbod</a></li>
</ul>
<?php
    if($_SESSION["gebruikertype"] == "admin"){
        echo"<p>je bent een admin</p>";
    }
    ?>


<?php
    if ($_SESSION["geaccepteerd"]==false){
        echo'
            <div class="cookies">
            <p id="cookieText">Sta je cookies toe tijdens je bezoek op deze website? We verdienen bakken geld via de zwarte markt door je persoonlijke informatie te verkopen dus dit zou ons helpen.</p>
            <form id="cookieform" action="cookiecontrole.php" method="POST">
            <input class="cookieOption" name="neen" type="submit" value="sta cookies niet toe">
            <input class="cookieOption" name="ja"   type="submit" value="sta cookies toe">
            </form>
        ';
    }

?>
</div>
</html>
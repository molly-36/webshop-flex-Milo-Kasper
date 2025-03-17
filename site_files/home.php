<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homeStyle.css">
    <title>Nieuw Nieuws</title>
</head>
    <?php
    //connect------------------------------------------------------------------------------------------------------
    include("connect.php");
    session_start();
    //userid controle----------------------------------------------------------------------------------------------
    if(!isset($_SESSION["user_id"])) {
        header("Location: index.php");
    }
    ?>
    <!--navbar---------------------------------------------------------------------------------------------->
<ul>
    <li><button id="log_uit_button"><a href="log_uit.php">log uit</a></button class="log_uit_button"></li>
    <li><a href="nieuws.php">nieuw nieuws</a></li>
    <li><a href="contact.php">contacteer ons</a></li>
    <li><a href="aanbod.php">ons aanbod</a></li>
</ul>
<?php
//adminconfiguration-----------------------------------------------------------------------------------------------
    if($_SESSION["gebruikertype"] == "admin"){
        echo"<button id='admintext'><a href='invoegen.php'>admin</a></button>";
    }
    ?>


<?php
//cookies---------------------------------------------------------------------------------------------------------
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


</html>
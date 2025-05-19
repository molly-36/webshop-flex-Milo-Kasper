<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homee.css">
    <title>Nieuw Nieuws</title>
</head>
<?php
    include("connect.php");
    session_start();

    // Check of gebruiker is ingelogd
    if(!isset($_SESSION["user_id"])) {
        header("Location: index.php");
        exit;
    }
?>
<body>

    <!-- Navigatiebalk -->
    <ul>
        <li><button id="log_uit_button"><a href="log_uit.php">log uit</a></button></li>
        <li><a href="nieuws.php">nieuw nieuws</a></li>
        <li><a href="contact.php">contacteer ons</a></li>
        <li><a href="aanbod.php">ons aanbod</a></li>
    </ul>

    <!-- Adminknop -->
    <?php
        if($_SESSION["gebruikertype"] == "admin"){
            echo "<button id='admintext'><a href='invoegen.php'>admin</a></button>";
        }
    ?>

    <!-- Welkomstkaart -->
    <div class="welcome-card">
        <h1>Welkom terug, <?php echo $_SESSION["username"]; ?>!</h1>
        <p>We zijn blij je weer te zien. Bekijk het laatste nieuws en ontdek onze nieuwe functies.</p>
    </div>

    <!-- Nieuwssectie -->
    <section class="news-section">
        <h2>Laatste Nieuws</h2>
        <div class="news-grid">
            <div class="news-item">
                <h3>allen iverson is kanker oud</h3>
                <p>dezldêdze zieuhdapizuedhpaz izue ia hdiuzdeua hziuhd izphda zeu hdpzaeihd azip dpuiaz</p>
                <a href="#">Lees meer →</a>
            </div>
            <div class="news-item">
                <h3>Nieuwe technologie in 2025</h3>
                <p> magische vliegende dildos</p>
                <a href="#">Lees meer →</a>
            </div>
            <div class="news-item">
                <h3>Tips voor digitale veiligheid</h3>
                <p>zzeriofjzêoirjfz refznerofzoerfozefzeôrfôienrfze fôzeirfoznnref </p>
                <a href="#">Lees meer →</a>
            </div>
        </div>
    </section>

    <!-- Cookie melding -->
    <?php
        if ($_SESSION["geaccepteerd"] == false){
            echo '
                <div class="cookies">
                    <p id="cookieText">Sta je cookies toe tijdens je bezoek op deze website? We verdienen bakken geld via de zwarte markt door je persoonlijke informatie te verkopen dus dit zou ons helpen.</p>
                    <form id="cookieform" action="cookiecontrole.php" method="POST">
                        <input class="cookieOption" name="neen" type="submit" value="sta cookies niet toe">
                        <input class="cookieOption" name="ja" type="submit" value="sta cookies toe">
                    </form>
                </div>
            ';
        }
    ?>

</body>
</html>

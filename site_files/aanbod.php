<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aanbod.css">
    <title>Document</title>
</head>
<body>
    <div class="fotobeginaanbod"> 
    <div class="navbar">
        <ul>
            <li class="bobo"><button><a class="homebutton" href="home.php">HOME</a></li>
            <li><button><a href="log_uit.php">LOG UIT</a></button></li>
        </ul>
    </div>
    </div>
    <div class="onderkant">
    <div class="filtercontainer">
          filterbalk
    </div>

<div class="container">
    <?php
        $teller = 0;
        include ("connect.php");
        

        $sql3 = "SELECT * FROM tblautos";
        $result3 = $mysqli->query($sql3);

        while ($row = $result3->fetch_assoc()) {
            $autoNaam = $row["autoNaam"];
            $context = $row["context"];
            $prijs = $row["prijs"];
            $image = $row["image"];

            echo '
                    <div class="kid">
                            <div class="fotoauto" style="background-image: url(./fotos/' . $image . ')"></div>
                            <div class="autonaam">' . $autoNaam . '</div>
                            <div class="subtext">Prijs: €' . $prijs . '</div>
                        <form method="post" action="winkelmandje.php">    
                            <input type="hidden" value="' .$prijs. '" name="prijsAuto">
                            <input type="hidden" value="' .$autoNaam. '" name="naamAuto">
                            <div class="inspecteerknop"><button><input style="border: none; background-color: #ffa500; border-radius: 6px; padding: 5px 10px;" type="submit" name="koop" value="koop"></input></button></div>
                        </form>
                    </div>
            ';
}
?>
    </div>  
</body>
</html>
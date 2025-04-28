<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aanbbbod.css">
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
    <?php
    include ("connect.php");
    ?>
  
        <?php
        // check
        if(isset($_POST['insertauto'])&&!empty($_POST['autoNaam'])
        &&!empty($_POST['context'])
        &&!empty($_POST['prijs'])
        &&isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        //gegevens van de auto
            $auto_naamauto=$_POST['autoNaam'];
            $auto_beschrijving=$_POST['context'];
            $auto_prijs=$_POST['prijs'];
                
            $auto_productfoto =$_FILES['image']['name'];
            $auto_tmp =$_FILES['image']['tmp_name'];
            //insert
            $sql_voegauto = "INSERT INTO tblautos (autoNaam,context,prijs,image) VALUES ('$auto_naamauto','$auto_beschrijving','$auto_prijs','$auto_productfoto')";
            if($mysqli->query($sql_voegauto)){
            move_uploaded_file($auto_tmp,"./producten/$auto_productfoto");
                header("Location: aanbod.php");
                
                exit();
                
            }else{
                echo"er ging iets fout probeer nog is";
            }
                
        }?>
    <div class="container">
        <div class="kid" id="kid1">
            <div class="fotoauto" id="foto1"></div>
            <div class="autonaam">Porsche 911</div>
            <div class ="subtext">5555Watt max 911km/u</div>
            <div class="inspecteerknop"><button><a href="">inspecteer</a></button></div>
        </div>
        <div class="kid" id="kid2">kind 2</div>
        <div class="kid" id="kid3">kind 3</div>
        <div class="kid" id="kid4">kind 4</div>
        <div class="kid" id="kid5">kind 5</div>
        <div class="kid" id="kid6">kind 6</div>
        <div class="kid" id="kid7">kind 7</div>
        <div class="kid" id="kid8">kind 8</div>
        <div class="kid" id="kid9">kind 9</div>
    </div>
    </div>  
</body>
</html>
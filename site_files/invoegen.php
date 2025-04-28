<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><|admin|> auto's invoegen</title>
</head>
<body>
    <?php 
        include("connect.php");
        if(!(isset($_POST['insertauto'])&&!empty($_POST['autoNaam'])
        &&!empty($_POST['context'])
        &&!empty($_POST['prijs'])
        &&isset($_FILES['image']) && $_FILES['image']['error'] == 0)){
   echo'
        <form action="" method="post" enctype="multipart/form-data">
        <label>naam van de auto</label><input name="autoNaam" type="text" placeholder="autoNaam" required autocomplete="off"><br>
        <label>context</label><input name="context" type="text" placeholder="context" required autocomplete="off"><br>
        <label>prijs (€)</label><input type="text" name="prijs" placeholder="prijs" required autocomplete="off"><br>
        <label>foto: </label><input name="image" type="file"  required autocomplete="off"><br>
        <input name="insertauto" type="submit" value="voeg auto toe">
        </form>
        ';
    }
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


                <a href="aanbod.php">terug naar aanbod</a>    

</body>
</html>
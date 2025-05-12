<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><|admin|> auto's invoegen</title>
</head>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #e6f7f2; /* zacht lichtgroen/blauw */
    margin: 0;
    padding: 0;
}

form {
    background: #ffffff;
    padding: 20px 30px;
    margin: 20px auto;
    border-radius: 12px;
    border: 1px solid #cce0d9;
    width: fit-content;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

form input[type="text"],
form input[type="file"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #b3d9cc;
    border-radius: 6px;
    width: 100%;
    box-sizing: border-box;
}

form input[type="submit"] {
    padding: 10px 20px;
    background: linear-gradient(135deg, #5ac994, #38b6ff); /* fris groen-blauw */
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

form input[type="submit"]:hover {
    background: linear-gradient(135deg, #38b6ff, #2fa27b); /* omgekeerd bij hover */
    transform: translateY(-2px);
}

.containerBox {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.containerMiniBox {
    background: #ffffff;
    border: 1px solid #cce0d9;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.containerMiniBox:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}

table {
    border-collapse: collapse;
    width: 100%;
}

tr {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
}

td {
    padding: 8px;
    font-size: 14px;
    word-break: break-word;
}

td div {
    width: 150px;
    height: 100px;
    background-size: cover;
    background-position: center;
    border-radius: 8px;
    border: 1px solid #ddd;
}

td form input[type="submit"] {
    padding: 6px 12px;
    background: #ff6666; /* zachter rood */
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-size: 12px;
    transition: background 0.3s ease;
}

td form input[type="submit"][value="wijzigen"] {
    background: #4da6ff; /* mooi lichtblauw */
}

td form input[type="submit"]:hover {
    opacity: 0.8;
}

a {
    display: inline-block;
    margin: 20px;
    text-decoration: none;
    color: #3399ff; /* frisser blauw */
    font-weight: bold;
    transition: color 0.3s ease;
}

a:hover {
    color: #1a75ff; /* donkerder bij hover */
}

    </style>
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
            move_uploaded_file($auto_tmp,"./fotos/$auto_productfoto");
                header("Location: aanbod.php");
                
                exit();
                
            }else{
                echo"er ging iets fout probeer nog is";
            }
                
        }?>
<div class="containerBox">
            <?php
            //display de inhoud

            $teller = 0;
            include ("connect.php");
    
            $sql3 = "SELECT * FROM tblautos"; // correct zonder enkele quotes
            $result3 = $mysqli->query($sql3);
    
            while ($row = $result3->fetch_assoc()) {
                $autoNaam = $row["autoNaam"];
                $context = $row["context"];
                $prijs = $row["prijs"];
                $image = $row["image"];
                
                echo'
                <div class="containerMiniBox">
                    <table>
                        <tr>
                            <td><div style="width:150px; height:100px; background-size:cover; background-position:center; background-image: url(\'./fotos/' . $image . '\');"></div></td>
                            <td>'.$autoNaam.'</td>
                            <td>'.$context.'</td>
                            <td>'.$prijs.'</td>
                                <td><form><input type="submit" value="wijzigen" name="wijzigKnop"></input></form></td>
                                <td><form><input type="submit" value="verwijderen" name="verwijderKnop"></input></form></td>
                        </tr>
                    </table>
                </div>
                ';
            }
            ?>
            
</div>
                <a href="aanbod.php">terug naar aanbod</a>    

</body>
</html>
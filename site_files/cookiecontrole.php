<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_POST["neen"])){
            $_SESSION["cookieteller"]++;
            echo $_SESSION["cookieteller"];
            $_SESSION["geaccepteerd"] = false;
            if ($_SESSION["cookieteller"] >= 5){
                header("Location: acceptcookieshomo.php");
            }
            else{
            header("Location: home.php");
            }
        }

        if (isset($_POST["ja"])){
            $_SESSION["geaccepteerd"] = true;
            header("Location: home.php");
        }
    ?>
</body>
</html>
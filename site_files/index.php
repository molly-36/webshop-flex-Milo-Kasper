<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap" rel="stylesheet">
    <title>Database</title>
</head>
<body>
    <h1 id="log-in-titel">LOG-IN</h1>
    <div class="containerCenterBlock">
    <?php
    include("connect.php");
    session_start();


    if(isset($_POST["submit"])) {
        $password = $_POST["password"];
        $username = $_POST["username"];
        $_SESSION['username'] = $_POST["username"];


            $sql = "SELECT * FROM tabel_users WHERE username = '$username' AND password = '$password'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION["user_id"] = $row["user_id"];
                    if  (($_POST["username"] == "admin") && ($_POST["password"] == "admin")){
                        $_SESSION['gebruikertype'] = "admin";
                        header("Location:home.php");
                    }
                    header("Location:home.php");
                }

        }else{
            echo'

            <table>
            <tr><form action="index.php" method="POST">
            <input class="input" type="text" name="username" placeholder="username">
            <input class="input" type="password" name="password" placeholder="password">
            <input type="submit" value="login" name="submit">
            </form>';
            echo'Wrong password or username';
            echo'</tr></table>';
        }
    }else{
        echo'
        <table>
        <form action="index.php" method="POST">
        <tr><input class="input" type="text" name="username" placeholder="username"></tr>
        <tr><input class="input" type="password" name="password" placeholder="password"></tr>
        <tr><input type="submit" value="login" name="submit"></tr>
        </form>';
        echo'</table>';
    }

    $_SESSION["cookieteller"] = 0;
    ?>
    <button><a href="register.php">heb je nog geen account? Registreer hier</a></button>
</div>
</body>
</html>
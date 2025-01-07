<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_log-inpage.css">
    <title>Database</title>
</head>
<body>
    <?php
    include("connect.php");
    session_start();


    if(isset($_POST["submit"])) {
        $password = $_POST["password"];
        $username = $_POST["username"];


            $sql = "SELECT * FROM tabel_users WHERE username = '$username' AND password = '$password'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION["user_id"] = $row["user_id"];
                    header("Location: home.php");
                }

        }else{
            echo'<form action="index.php" method="POST">
            <label>username:</label>
            <input type="text" name="username">
            <label>password</label>
            <input type="password" name="password">
            <input type="submit" value="login" name="submit">
            </form>';
            echo'Wrong password or username';
        }
    }else{
        echo'<form action="index.php" method="POST">
            <label>username:</label>
            <input type="text" name="username">
            <label>password</label>
            <input type="password" name="password">
            <input type="submit" value="login" name="submit">
            </form>';
    }
    ?>
    <button><a href="register.php">heb je nog geen account? Registreer hier</a></button>
</body>
</html>
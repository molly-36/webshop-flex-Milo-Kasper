<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_registerpage.css">
    <title>Document</title>
</head>
<body>
        <h1>REGISTER</h1>
        <?php
            include("connect.php");
            if (isset($_POST["submit"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                //controleert of er al iemand is met dezelfde user
                $sql2 = "SELECT * FROM tabel_users WHERE username = '$username'";
                $result2 = $mysqli->query($sql2);
                if($result2->num_rows > 0) {
                    echo '
                    <form method="post" action="register.php">
                    <label>username:</label>
                    <input  type="text" name="username" placeholder="your username">
                    <label>password:</label>
                    <input type="password" name="password">
                    <input type="submit" name="submit" value="registreer">
                </form><br>
                <span style="color:red;font-size:100px;background-color:darkred;">user al in gebruik</span>
                ';
                

                }else{
                $sql = "INSERT into tabel_users (username, password) VALUES ('$username', '$password')";
                $result = $mysqli->query($sql);
                if ($result) {
                    header("Location: index.php");
                }
                else {
                    echo '
                    <form method="post" action="register.php">
                    <label>username:</label>
                    <input  type="text" name="username" placeholder="your username">
                    <label>password:</label>
                    <input type="password" name="password">
                    <input type="submit" name="submit" value="registreer">
                </form><br>
                
                <span style="color:red;font-size:100px;background-color:darkred;">er is iets fout gegaan: error 4</span>
                ';
                }
                }
            }
            else {
                echo '
                <form method="post" action="register.php">
                <label>username:</label>
                <input  type="text" name="username" placeholder="your username">
                <label>password:</label>
                <input type="password" name="password">
                <input type="submit" name="submit" value="registreer">
            </form><br>
            ';
            }
        ?>
       
</body>
</html>
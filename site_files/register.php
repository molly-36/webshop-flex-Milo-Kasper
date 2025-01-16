<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_registerpage.css">
    <title>register</title>
</head>
<button><a href="index.php"><--- terug</a></button>
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
                    <h1 id="h1A">account aanmaken</h1>
<form method="post" action="register.php">
<i id="slot" class="fa-solid fa-lock"></i>
<i id="logo" class="fa-solid fa-user"></i>
    
                <input  id="invoer" type="text" name="username" placeholder="            your username"><br>
                
                <input id="invoer" type="password" name="password" placeholder="            wachtwoord"><br>
                <input id="knop" type="submit" name="submit" value="registreer"> 
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
                    <h1 id="h1A">account aanmaken</h1>
<form method="post" action="register.php">
<i id="slot" class="fa-solid fa-lock"></i>
<i id="logo" class="fa-solid fa-user"></i>
    
               
                <input  id="invoer" type="text" name="username" placeholder="            your username"><br>
                
                <input id="invoer" type="password" name="password" placeholder="            wachtwoord"><br>
                <input id="knop" type="submit" name="submit" value="registreer"> 
            </form><br>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Winkelmandje</title>
</head>
<button><a href="aanbod.php"> <-- terug naar aanbod</a></button>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        padding: 2rem;
        color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 2rem;
        color: #2c3e50;
    }

    form {
        max-width: 500px;
        margin: 0 auto 2rem auto;
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    input, button {
        display: block;
        width: 100%;
        margin-top: 1rem;
        padding: 0.75rem;
        font-size: 1rem;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #3498db;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2rem;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    tr:hover {
        background-color: #f9f9f9;
    }
</style>
<?php
session_start();

if (isset($_POST["verwijder"]) && isset($_POST["index"])) {
    $index = (int)$_POST["index"];

    if (isset($_SESSION["autoLijst"][$index]) && isset($_SESSION["autoPrijzen"][$index])) {
        unset($_SESSION["autoLijst"][$index]);
        unset($_SESSION["autoPrijzen"][$index]);

        // Herindexeer de arrays zodat ze netjes dezelfde keys houden
        $_SESSION["autoLijst"] = array_values($_SESSION["autoLijst"]);
        $_SESSION["autoPrijzen"] = array_values($_SESSION["autoPrijzen"]);
    }
}

if (isset($_POST["koop"], $_POST["prijsAuto"], $_POST["naamAuto"])) {
    $auto = $_POST["naamAuto"];
    $prijs = $_POST["prijsAuto"];

    if (!isset($_SESSION["autoLijst"]) || !is_array($_SESSION["autoLijst"])) {
        $_SESSION["autoLijst"] = array();
    }
    if (!isset($_SESSION["autoPrijzen"]) || !is_array($_SESSION["autoPrijzen"])) {
        $_SESSION["autoPrijzen"] = array();
    }

    $_SESSION["autoLijst"][] = $auto;
    $_SESSION["autoPrijzen"][] = $prijs;
}
?>
<body>
    <?php if (!empty($_SESSION["autoLijst"])): ?>
        <table>
            <tr>
                <th>Auto</th>
                <th>Prijs</th>
                <th></th>
            </tr>
            <?php for ($i = 0; $i < count($_SESSION["autoLijst"]); $i++): ?>
                <?php 
                    $autoNaam = $_SESSION["autoLijst"][$i];
                    $autoPrijs = $_SESSION["autoPrijzen"][$i] ?? 0;
                ?>
                <tr>
                    <td><?= htmlspecialchars($autoNaam) ?></td>
                    <td>€ <?= number_format($autoPrijs, 2, ',', '.') ?></td>
                    <td>
                        <form method="post" style="margin:0;">
                            <input type="hidden" name="index" value="<?= $i ?>" />
                            <button type="submit" name="verwijder">Verwijder</button>
                        </form>
                    </td>
                </tr>
            <?php endfor; ?>
            <tr><form method="post"> <input type="submit" style="cursor: pointer" name="alles" value="verwijder heel winkelmandje"></form></tr>
        </table>
    <?php else: ?>
        <p>Je winkelmandje is leeg.</p>
    <?php endif; ?>
         <?php if (isset($_POST["alles"])){session_destroy();}?>
</body>
</html>

<?php 

require "./bdd.php";

$req = $bdd->prepare("INSERT INTO logs (msg) VALUES (?)");

$user = $_SESSION["username"];

$msg = $user." à modifié ".$product["productname"]."de ".$product["quantity"]." !";

$req->execute(array($msg));


?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logs | StockMyGeek</title>
    </head>
    <body>
    <?php
        $req = $bdd->query("SELECT * FROM logs ");
        while ($logs = $req->fetch()) { 
            ?>
    <p> <?php echo $msg; ?>
    </p>
    <?php } ?>
    <div>
    </body>
    </div>
</html>
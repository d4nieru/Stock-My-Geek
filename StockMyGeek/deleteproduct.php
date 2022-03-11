<?php
    
require './bdd.php';

if (!empty($_GET['id'])) {
    echo "J'ai bien reçu les données";

    $id = htmlspecialchars($_GET['id']);

    $delete = $bdd->prepare('DELETE FROM product WHERE id = :id');
    $delete->execute(['id' => $id]);
    $delete->closeCursor();

    header("Location: index.php");
}    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
    </body>
</html>
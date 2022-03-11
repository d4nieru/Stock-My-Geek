<?php

require './bdd.php';

if (isset($_POST['sub'])) {
    if (!empty($_POST['quantity']))
    {
        $id = $_GET['id'];
        $quantity = htmlspecialchars($_POST['quantity']);

        $req = $bdd->prepare("UPDATE product SET quantity = ? WHERE id = ?");
        $req->execute([$quantity, $id]);
        $req->closeCursor();

        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification d'un Produit | StockMyGeek</title>
    </head>
    <body>
        <?php
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $product = $bdd->query("SELECT * FROM product WHERE id = $id")->fetch();
        ?>
        <form action="" method='POST'>
            <label for='quantity'>Renseignez la quantité :</label>
            <input type="text" name="quantity" Value="<?php echo $product['quantity']; ?>">
            <input type="submit" name="sub" Value="Effectuer le changement">
        </form>
        <?php } ?>
    </body>
</html>
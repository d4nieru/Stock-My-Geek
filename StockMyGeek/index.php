<?php 

require './bdd.php';

if (isset($_POST['sub'])) {
    if (
            !empty($_POST['productname']) && 
            !empty($_POST['urlimage']) && 
            !empty($_POST['quantity'])
        )    
    {
        $productname = htmlspecialchars($_POST['productname']);
        $urlimage = htmlspecialchars($_POST['urlimage']);
        $quantity = htmlspecialchars($_POST['quantity']); 

        $req = $bdd->prepare('INSERT INTO product SET productname = ?, urlimage = ?, quantity = ?');
        $req->execute([$productname, $urlimage, $quantity]);
        $req->closeCursor();

        header("Location: index.php");
    } else {
        echo "Vous n'avez pas rempli tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des stocks | StockMyGeek</title>
    </head>
    <body>
    <?php
        $req = $bdd->query("SELECT * FROM product ");
        while ($product = $req->fetch()) { 
            ?>
    <p> <?php echo $product['productname']; ?>
    <img src=<?php echo $product["urlimage"]; ?> width="10%">
        <a href='deleteproduct.php?id=<?php echo $product['id']; ?>'>Supprimer</a>
        ou
        <a href='editproduct.php?id=<?php echo $product['id']; ?>'>Editer</a>
    </p>
    <?php } ?>
    <div>
    <form action="" method='POST'>
            <label for='productname'>Nom du produit :</label>
            <input type="text" name="productname">
            <label for='urlimage'>L'URL de l'image du produit :</label>
            <input type="text" name="urlimage">
            <label for='quantity'>Quantité(s) :</label>
            <input type="text" name="quantity">
            <input type="submit" name='sub'>
        </form>
    <a href='logs.php'>Accéder aux logs</a>
    </body>
    </div>
</html>
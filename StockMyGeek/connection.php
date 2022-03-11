<?php
    session_start();
    require "./bdd.php";

    if(isset($_POST["login"])) {
        if (!empty($_POST["username"]) and !empty($_POST["passw"])) {

            $username = htmlspecialchars($_POST["username"]);
            $passw = htmlspecialchars($_POST["passw"]);

            $get_user = $bdd->prepare("SELECT * FROM `users` WHERE username = ? and passw = ?");
            $get_user->execute(array($username,$passw));

            if ($get_user->rowCount() > 0) {

                $_SESSION ["username"] = $get_user->fetch();

                header("Location: index.php");

            }
        } else {
            echo "Les informations sont vides !";
        }
    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | StockMyGeek</title>
</head>
<body>
    <form action="" method='POST'>
        <div>
            <label for='username'>Votre Nom d'Utilisateur :</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for='passw'>Votre mot de passe :</label>
            <input type="password" name="passw">
        </div>
        <input type="submit" name="login" Value="Se connecter">
    </form>
</body>
</html>
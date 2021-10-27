<!DOCTYPE html>
<html>

<head>
        <title>Supprimer</title>
        <meta charset="utf-8" />
        <link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
        <?php require "header.php"; ?>
        <h1>Supprimer</h1>

        <p>Disque supprimé</p>

        <?php

        try {
                // Connexion à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=discotheque;charset=utf8', 'votreLogin', 'votrePassword');
        } catch (Exception $e) {
                // En cas d'erreur, affichage d'un message et arrêt
                die('Erreur : ' . $e->getMessage());
        }

        // Suppression de la table liste
        $reponse = $bdd->query("DELETE FROM liste WHERE id='$_GET[id]'");

        // Fin du traitement de la requête  
        $reponse->closeCursor();

        ?>

</body>

</html>
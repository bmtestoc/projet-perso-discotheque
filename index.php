<!DOCTYPE html>
<html>

<head>
  <title>Discothèque</title>
  <meta charset="utf-8" />
  <?php require "header.php"; ?>
</head>

<body>

  <div class="container">
    <h1>Discothèque</h1>

    <table id="liste" BORDER="1" class="table table-dark table-striped">
      <tr>
        <th> Artiste </th>
        <th> Titre </th>
        <th> Format </th>
        <th> Modifier</th>
        <th> Supprimer</th>
      </tr>

      <?php

      try {
        // Connexion à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=discotheque;charset=utf8', 'votreLogin', 'votrePassword');
      } catch (Exception $e) {
        // En cas d'erreur, affichage d'un message et arrêt
        die('Erreur : ' . $e->getMessage());
      }

      // Récupération du contenu de la table liste
      $reponse = $bdd->query('SELECT * FROM liste ORDER BY artist');

      // Affichage de chaque entrée
      while ($donnees = $reponse->fetch()) {

      ?>

        <?php

        echo "<tr>";
        echo "<td> $donnees[artist] </td>";
        echo "<td> $donnees[title] </td>";
        echo "<td> $donnees[format] </td>";
        echo "<td> <a href=update.php?id=$donnees[id]><i class='bi bi-pencil'></i></a> </td>";
        echo "<td> <a href=delete.php?id=$donnees[id]><i class='bi bi-trash'></i>
    </a> </td>";
        echo "</tr>";

        ?>

      <?php

      }
      // Fin du traitement de la requête
      $reponse->closeCursor();

      ?>

    </table>
  </div>
</body>

</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Modifier</title>
        <meta charset="utf-8" />
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php require "header.php"; ?> 
        <h1>Modifier un disque</h1>


        <?php 
 if(!empty($_POST)) {       
   
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=discotheque;charset=utf8', 'votreLogin', 'votrePassword');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '. $e->getMessage());
    }
    $id = $_POST['id'];
    $artist = $_POST['artist'];
    $title = $_POST['title'];
    $format = $_POST['format'];
    // On update la table liste
    $reponse = $bdd->query("UPDATE liste SET artist = '$artist', title = '$title', format = '$format' WHERE id='$id'");
    
    echo("Disque modifié");
 } 
?>


        <?php
        try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=discotheque;charset=utf8', 'votreLogin', 'votrePassword');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '. $e->getMessage());
    }
    
    // On récupère tout le contenu de la table liste
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
      } else {
        $id = $_POST['id'];
      }
    $reponse = $bdd->query("SELECT artist, title, format FROM liste WHERE id=$id");    
    $ligne = $reponse -> fetch(); 
    $reponse->closeCursor();   
    ?> 




       
<div class="updFormulaire">
<form action='update.php' method='post'>
<label><input type="hidden" name = "id" value = "<?php echo $id ?>"></label><br>
  <div>
    <label>Artiste</label>
    <input type='text' name='artist' value="<?php echo $ligne['artist'] ?>"/>
  </div>
  <div>
    <label>Titre</label>
    <input type='text' name='title' value="<?php echo $ligne['title'] ?>"/>
  </div>
  <div>
    <label>Format</label>
    <input type='text' name='format' value="<?php echo $ligne['format'] ?>"/>
  </div>
  <div>
    <input type='submit' value='Modifier ce disque' />
  </div>
</form>    
</div>


       


</body>
</html>


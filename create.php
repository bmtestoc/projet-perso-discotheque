<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter</title>
        <meta charset="utf-8" />
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php require "header.php"; ?> 
        <h1>Ajouter un disque</h1>

        <div class="crtFormulaire">
<form action='create.php' method='post'>
  <div>
    <label>Artiste</label>
    <input type='text' name='artist' />
  </div>
  <div>
    <label>Titre</label>
    <input type='text' name='title' />
  </div>
  <div>
    <label>Format</label>
    <input type='text' name='format' />
  </div>
  <div>
    <input type='submit' value='Ajouter ce disque' />
  </div>
</form>    
</div>


        <?php 
        
    
if (!empty ($_POST)) {
    $artist = $_POST['artist'];
    $title = $_POST['title'];
    $format = $_POST['format'];
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
    $reponse = $bdd->query("INSERT INTO liste (artist, title, format) VALUES ('$artist', '$title', '$format')");

    echo("Disque ajouté");

} else {
    $reponse = NULL;
}
        ?>


</body>
</html>


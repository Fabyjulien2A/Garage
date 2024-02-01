<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');


if (isset($_POST['envoi'])){
    if (!empty($_POST['nom']) AND !empty($_POST['commentaire']) AND !empty($_POST['note'])){
    $name = htmlspecialchars($_POST['nom']);
    $comment = nl2br(htmlspecialchars($_POST['commentaire']));
    $note = nl2br(htmlspecialchars($_POST['note']));

    $insererCommentaire = $bdd->prepare('INSERT IGNORE INTO avis_clients(nom, commentaire, note)VALUES(?, ?, ?)');
    $insererCommentaire->execute(array($name, $comment, $note));

    echo "Le commentaire a bien été envoyé";
    }else{
    echo "Veuillez completer tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Commentaires clients</title>
</head>
<body id="body-commentaire">
    <div class="container-fluid text-center">
        <h1>Publier commentaire</h1>
        <form method="POST" action="publierCommentaire.php" class="mt-4">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du client :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="temoignage" class="form-label">Commentaire :</label>
                <textarea class="form-control" id="temoignage" name="commentaire" required></textarea>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note (sur 10) :</label>
                <input type="text" class="form-control" id="note" name="note">
            </div>
            <button type="submit" class="btn btn-primary" name="envoi">Publier</button>
        </form>
        <a href="../Page-Accueil/accueil.php" class="btn btn-primary btn-block mt-3">Retour site</a>
    </div>
    <style>
        
    </style>
</body>
</html>


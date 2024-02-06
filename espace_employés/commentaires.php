<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Commentaires</title>
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body id="body-recup-commentaire">
    <div class="container">
        <h1 class="text-center mt-4">Commentaires</h1>  
    </div>

    <div class="container">
        <?php
        $bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
        $recupCommentaire = $bdd->query('SELECT * FROM avis_clients');
        while ($comment = $recupCommentaire->fetch()) {
        ?>
            <div class="commentaires card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $comment['nom']; ?></h5>
                    <p class="card-text"><?= $comment['commentaire']; ?></p>
                    <p class="card-text"><?= $comment['note']; ?></p>
                    <a href="supprimerCommentaire.php?id=<?= $comment['id']; ?>" class="btn btn-danger">Supprimer le commentaire</a>
                </div>
            </div>
        <?php
        }
        ?>
        <a href="espaceModerateur.php" class="btn btn-primary">Retour espace modérateur</a>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

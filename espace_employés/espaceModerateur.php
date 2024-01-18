<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['mdp'])) {
   header('location: ../Administrateur/connexion.php');
    exit();
}
// Vérifiez si l'utilisateur est un modérateur
if ($_SESSION['role'] !== 'moderateur') {
    // redirection vers page connexion si l'utilisateur n'est pas un moderateur
    header('location: ../Administrateur/connexion.php');
    exit();
}

$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <title>Espace moderateur</title>
</head>
<body class="body-moderateur">
    <div class="container">
        <h1 class="text-center mt-4">Espace Moderateur</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="commentaires.php" class="btn btn-primary btn-block mb-3">Afficher tous les commentaires</a>
                <a href="ajouterVehicules.php" class="btn btn-primary btn-block mb-3">Ajouter un nouveau véhicule</a>
                <a href="publierCommentaire.php" class="btn btn-primary btn-block mb-3">Publier un commentaire</a>
                <a href="../Administrateur/deconnexionEspaces.php" class="btn btn-danger btn-block mb-3">Déconnexion</a>  
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>


                
             






























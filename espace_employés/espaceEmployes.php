<?php
session_start();
if (!$_SESSION['mdp']){
header('location: ../Administrateur/connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/espaceEmployes.css">
    <title>Espace employés</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4">Espace employés</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="publierCommentaire.php" class="btn btn-primary btn-block mb-3">Publier un commentaire</a>
                <a href="ajouterVehicules.php" class="btn btn-primary btn-block mb-3">Ajouter un nouveau véhicule</a>
                <a href="supprimerVehicules.php" class="btn btn-primary btn-block mb-3">Supprimer un véhicule</a>
                <a href="../contact/recupInfosFormulaire.php" class="btn btn-primary btn-block mb-3">Afficher demandes clients</a>
                <a href="../Administrateur/deconnexionEspaces.php" class="btn btn-danger btn-block mb-3">Déconnexion</a>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>






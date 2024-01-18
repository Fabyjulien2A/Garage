<?php
session_start();
if (!$_SESSION['mdp']){
header('location: ../Administrateur/connexion.php');
}
// Affiche le message de confirmation s'il est présent dans la session
if (isset($_SESSION['message_confirmation_delete'])) {
    echo '<div class="alert alert-success mt-4" role="alert">' . $_SESSION['message_confirmation_delete'] . '</div>';

    // Supprime le message de confirmation de la session après l'avoir affiché
    unset($_SESSION['message_confirmation_delete']);
}

if (isset($_SESSION['message_confirmation_add'])) {
    echo '<div class="alert alert-success mt-4" role="alert">' . $_SESSION['message_confirmation_add'] . '</div>';

    // Supprime le message de confirmation de la session après l'avoir affiché
    unset($_SESSION['message_confirmation_add']);
}


// Affiche le message d'erreur s'il est présent dans la session
if (isset($_SESSION['message_erreur'])) {
    echo '<div class="alert alert-danger mt-4" role="alert">' . $_SESSION['message_erreur'] . '</div>';

    // Supprime le message d'erreur de la session après l'avoir affiché
    unset($_SESSION['message_erreur']);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <title>Espace employés</title>
</head>
<body id="body-employés">
    <div class="container">
        <h1 class="text-center mt-4">Espace employés</h1>
        <br>
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
<?php
session_start();
if (!$_SESSION['mdp']){
    header('location: connexion.php');
}

if (isset($_SESSION['message_confirmation_add_time'])) {
    echo '<div class="alert alert-success mt-4" role="alert">' . $_SESSION['message_confirmation_add_time'] . '</div>';

    // Supprime le message de confirmation de la session après l'avoir affiché
    unset($_SESSION['message_confirmation_add_time']);
}


// Affiche le message d'erreur s'il est présent dans la session
if (isset($_SESSION['message_erreur'])) {
    echo '<div class="alert alert-danger mt-4" role="alert">' . $_SESSION['message_erreur'] . '</div>';

    // Supprime le message d'erreur de la session après l'avoir affiché
    unset($_SESSION['message_erreur']);
}




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Espace administrateur</title>
</head>
<body class="body-admin">
    <div class="container-fluid">
    <h1 class="text-center mt-4">Espace administrateur</h1>
    <br><br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="ajouterServiceReparations.php" class="btn btn-primary btn-block mb-3">Ajouter service réparation</a>
                <a href="supprimerServiceReparation.php" class="btn btn-primary btn-block mb-3">Supprimer un service de réparation</a>
                <a href="../contact/recupInfosFormulaire.php" class="btn btn-primary btn-block mb-3">Afficher demandes clients</a>
                <a href="inscriptions.php" class="btn btn-primary btn-block mb-3">Inscription Administrateur/Employé/Moderateur</a>
                <a href="../Page-Accueil\formulaireFooter.php" class="btn btn-primary btn-block mb-3">Modifier horaires du garage</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="mettreAjourEtat.php" method="post">
                    <div class="form-group">
                        <label for="etat">État du garage :</label>
                        <select class="form-control" name="etat" id="etat">
                            <option value="Ouvert">Ouvert</option>
                            <option value="Fermé">Fermé</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <a href="deconnexionEspaces.php" class="btn btn-danger btn-block">Déconnexion</a>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

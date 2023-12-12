<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

if (!isset($_SESSION['mdp'])) {
    header('location:../Administrateur/connexion.php');
    exit;
}

if (isset($_POST['supprimer'])) {
    // Récupération de l'ID du véhicule à supprimer depuis le formulaire
    $vehiculeId = $_POST['vehicule'];

    $supprimerVehicule = $bdd->prepare("DELETE FROM vehicules WHERE id = ?");
    $supprimerVehicule->execute(array($vehiculeId));

    // Redirection de l'utilisateur vers la page de confirmation 
    header('location: ../espace_employés/traitementSuppression.php');
    exit;
}

// Récupération de la liste des véhicules depuis la base de données
$listeVehicules = $bdd->query("SELECT id, modele FROM vehicules")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Supprimer un véhicule</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4">Supprimer un véhicule</h1>
        <form method="POST" action="traitementSuppression.php" class="mt-4">
            <div class="form-group">
                <label for="vehicule">Sélectionnez le véhicule à supprimer :</label>
                <select id="vehicule" name="vehicule" class="form-control">
                    <?php foreach ($listeVehicules as $vehicule): ?>
                        <option value="<?= $vehicule['id'] ?>"><?= $vehicule['modele'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="supprimer" class="btn btn-danger btn-block mt-3">Supprimer</button>
        </form>

        <a href="espaceEmployes.php" class="btn btn-primary btn-block mt-3">Retour espace employés</a>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

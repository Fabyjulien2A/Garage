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
                    <option value="0">Véhicule 0</option>
                    <option value="1">Peugeot 2008</option>
                    <option value="2">Peugeot 208</option>
                    <option value="3">Peugeot 208 Bleu</option>
                    <option value="4">Peugeot 3008</option>
                    <option value="5">Volkswagen Polo</option>
                    <option value="6">Volkswagen Golf</option>
                    <option value="7">Volkswagen Aerton</option>
                    <option value="8">Volkswagen Procab</option>
                    <option value="9">Volkswagen ID-5</option>
                    <option value="10">Ford Fiesta</option>
                    <option value="11">Ford Kuga</option>
                    <option value="12">Ford Focus</option>
                    <option value="13">Ford Puma</option>
                    <option value="14">Ford Ranger</option>
                    <option value="15">Bmw serie 3</option>
                    <option value="16">Bmw X2</option>
                    <option value="17">Citroen c-3</option>
                    <option value="18">Citroen c-4</option>
                    <option value="19">Opel Corsa</option>
                    <option value="20">Dacia Spring</option>
                    <option value="21">Dacia Duster</option>
                    <option value="22">Dacia Sandero</option>
                    <option value="23">Dacia Logan</option>
                    <option value="24">Alpha Romeo</option>
                    <option value="25">Véhicule 25</option>
                    <option value="26">Véhicule 26</option>
                    <option value="27">Véhicule 27</option>
                    <option value="28">Véhicule 28</option>
                    <option value="29">Véhicule 29</option>
                    <option value="30">Véhicule 30</option>
            
                   
                </select>
            </div>
            <button type="submit" name="supprimer" class="btn btn-danger btn-block mt-3">Supprimer</button>
        </form>

        <a href="espaceEmployes.php" class="btn btn-primary btn-block mt-3">Retour espace employés</a>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

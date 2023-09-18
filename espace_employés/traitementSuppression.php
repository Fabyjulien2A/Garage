<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

if (!isset($_SESSION['mdp'])) {
    header('location: connexion_employes.php');
    exit;
}

if (isset($_POST['supprimer'])) {
    // Récupération de l'ID du véhicule à supprimer depuis le formulaire
    $vehiculeId = $_POST['vehicule'];

   
    $supprimerVehicule = $bdd->prepare("DELETE FROM vehicules WHERE id = ?");
    $supprimerVehicule->execute(array($vehiculeId));

    // Affichage message de confirmation
    echo "Le véhicule a été supprimé avec succès.";

    header('location: ../espace_employés/espaceEmployes.php');
    exit;
} else {

}


?>
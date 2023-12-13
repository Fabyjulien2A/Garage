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

    // Stocke le message de confirmation dans la session
    $_SESSION['message_confirmation_delete'] = "Le véhicule a été supprimé avec succès.";

    // Redirection de l'utilisateur vers la page de confirmation 
    header('location: ../espace_employés/espaceEmployes.php');
    exit;
} else {
    // Gérer le cas où $_POST['supprimer'] n'est pas défini si nécessaire
}
?>
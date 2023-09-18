<?php

try {
    $bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activation de la gestion des erreurs
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Assurez-vous que l'ID est un entier pour des raisons de sécurité
    $id = intval($_POST['id']);

    try {
        // Établissez la connexion à la base de données ici (similaire à votre code existant)

        // Assurez-vous de déterminer la table appropriée pour les demandes en fonction de votre application
        $table = 'demandes_sav'; // Remplacez 'votre_table_demandes' par le nom de votre table

        $requete = $bdd->prepare("DELETE FROM $table WHERE id = ?");
        $requete->execute(array($id));

        // Redirection vers la page actuelle pour afficher la liste mise à jour
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de la demande : " . $e->getMessage();
    }
} else {
    echo "Mauvaise utilisation de la page.";
}
?>
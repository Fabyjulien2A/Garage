<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nom"];
    $firstName = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $subject = $_POST["sujet"];
    $message = $_POST["message"];
    

    // Validation des données (ajoutez la validation nécessaire)

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activation de la gestion des erreurs
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Préparer la requête SQL d'insertion en fonction du sujet
    try {
        if ($subject === "support") {
            // Insertion dans la table des demandes de support technique
            $insererTicketSupport = $bdd->prepare("INSERT INTO tickets_support (nom, prenom, email, telephone, message) VALUES (?, ?, ?, ?, ?)");
            $insererTicketSupport->execute(array($name, $firstName, $email, $telephone, $message));
        } elseif ($subject === "sav") {
            // Insertion dans la table des demandes de service après vente
            $insererDemandeSAV = $bdd->prepare("INSERT INTO demandes_sav (nom, prenom, email, telephone, message) VALUES (?, ?, ?, ?, ?)");
            $insererDemandeSAV->execute(array($name, $firstName, $email, $telephone, $message));
        } elseif ($subject === "demande") {
            // Insertion dans la table des demandes d'informations
            $insererDemandeInfo = $bdd->prepare("INSERT INTO demandes_informations (nom, prenom, email, telephone, message) VALUES (?, ?, ?, ?, ?)");
            $insererDemandeInfo->execute(array($name, $firstName, $email, $telephone, $message));
        }

        echo "Merci pour votre message ! Nous vous répondrons bientôt.";
       

    } catch (PDOException $e) {
        die("Erreur lors de l'insertion des données : " . $e->getMessage());
    }
     header("Location: confirmationFormulaire.php");exit;
}

?>
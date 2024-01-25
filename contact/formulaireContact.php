<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');


if (isset($_POST['envoyer'])){
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone']) AND !empty($_POST['sujet']) AND !empty($_POST['message']) ) {
    $name = htmlspecialchars($_POST['nom']);
    $firstName = nl2br(htmlspecialchars($_POST['prenom']));
    $email = nl2br(htmlspecialchars($_POST['email']));
    $telephone= nl2br(htmlspecialchars($_POST['telephone']));
    $subject = htmlspecialchars($_POST['sujet']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    $insererContactForm = $bdd->prepare('INSERT IGNORE INTO données_formulaire (nom, prenom, email, telephone, sujet, message)VALUES(?, ?, ?, ?, ?, ?)');
    $insererContactForm->execute(array($name, $firstName, $email, $telephone, $subject, $message));

    echo "Votre demande a bien été envoyée";
    }else{
    echo "Veuillez completer tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Contactez-nous</title>
</head>
<body>
    <main>
        <div class="container">
            <h1 class="text-center mt-4">Contactez-nous</h1>
            <form method="POST" action="traitementFormulaireContact.php" class="mt-4">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom :</label>
                    <input type="text" id="firstName" name="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="tel" id="telephone" name="telephone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sujet">Sujet :</label>
                    <select id="sujet" name="sujet" class="form-control" required>
                        <option value="demande">Demande d'information</option>
                        <option value="support">Support technique</option>
                        <option value="sav">Service après vente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <a href="../Page-nos-vehicules/nosVehicules.php" class="btn btn-primary btn-block mt-3">Retour site</a>

        </div>
    </main>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

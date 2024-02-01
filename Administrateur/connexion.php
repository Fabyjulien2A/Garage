<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

if (isset($_POST['connexion'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['mdp'];

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $recupUser->execute([$email]);

        if ($recupUser->rowCount() > 0) {
            $utilisateur = $recupUser->fetch();

            if (hash('sha256', $password) === $utilisateur['mdp']) {
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $utilisateur['mdp'];
                $_SESSION['id'] = $utilisateur['id'];
                $_SESSION['role'] = $utilisateur['role'];

                
                if ($utilisateur['role'] == 'moderateur') {
                    header('location: ../espace_employés/espaceModerateur.php');
                } elseif ($utilisateur['role'] == 'employé') {
                    header('location: ../espace_employés/espaceEmployes.php');
                } elseif ($utilisateur['role'] == 'administrateur') {
                    header('location: espaceAdmin.php');
                }
            } else {
                $error = "Mot de passe incorrect.";
            }
        } else {
            $error = "Adresse email non trouvée.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Connexion</title>
</head>
<body>
    <div class="container-fluid">
        <div>
            <form method="post" action="">
                <h2>Connexion</h2>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="connexion" value="Se connecter">
                </div>
                <?php
                
                if (isset($error)) {
                    echo "<p class='text-danger'>$error</p>";
                }
                ?>
            </form>
            <a href="../Page-Accueil/accueil.php" class="btn btn-secondary">Retour site</a>
        </div>
    </div>
</body>
</html>






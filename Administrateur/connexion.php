<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

if (isset($_POST['connexion'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['mdp']);
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND mdp = ?');
        $recupUser->execute(array($email, $mdp));

        if ($recupUser->rowCount() > 0) {
            $utilisateur = $recupUser->fetch();
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['role'] = $utilisateur['role'];

            // Permettre la connexion en tant que modérateur
            if ($utilisateur['role'] == 'moderateur') {
                header('location: ../espace_employés/espaceModerateur.php');
            } elseif ($utilisateur['role'] == 'employé') {
                header('location: ../espace_employés/espaceEmployes.php');
            } elseif ($utilisateur['role'] == 'administrateur') {
                header('location: espaceAdmin.php');
            }
        } else {
            $error = "Votre email ou mot de passe est incorrect.";
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
                <h2>Connexion Employés/Administrateur</h2>
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






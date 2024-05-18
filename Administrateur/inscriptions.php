<?php
session_start();

if (!$_SESSION['mdp']) {
    header('location: connexion.php');
}

$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');

if (isset($_POST['envoi'])) {
    $name = htmlspecialchars($_POST['nom']);
    $firstname = htmlspecialchars($_POST['prenom']);
    $job = htmlspecialchars($_POST['poste']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = hash('sha256', $_POST['mdp']);
    $role = htmlspecialchars($_POST['role']);

    $errors = array();

    if (empty($name)) {
        $errors[] = "Le champ Nom est vide.";
    }

    if (empty($firstname)) {
        $errors[] = "Le champ Prénom est vide.";
    }

    if (empty($job)) {
        $errors[] = "Le champ Poste est vide.";
    }

    if (empty($email)) {
        $errors[] = "Le champ Email est vide.";
    }

    if (empty($_POST['mdp'])) {
        $errors[] = "Le champ Mot de passe est vide.";
    }

    if (empty($role)) {
        $errors[] = "Le champ Rôle est vide.";
    }

    if (empty($errors)) {
        $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, poste, email, mdp, role) VALUES (?, ?, ?, ?, ?, ?)');
        $insertUser->execute([$name, $firstname, $job, $email, $mdp, $role]);

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE nom = ? AND prenom = ? AND poste = ? AND email = ? AND mdp = ? AND role = ?');
        $recupUser->execute([$name, $firstname, $job, $email, $mdp, $role]);

        if ($recupUser->rowCount() > 0) {
            $userData = $recupUser->fetch();
            $_SESSION['nom'] = $userData['nom'];
            $_SESSION['prenom'] = $userData['prenom'];
            $_SESSION['poste'] = $userData['poste'];
            $_SESSION['email'] = $userData['email'];
            $_SESSION['mdp'] = $userData['mdp'];
            $_SESSION['role'] = $userData['role'];
            $_SESSION['id'] = $userData['id'];

            echo "Inscription réussie !";

        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-employes-moderateur.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Inscription administrateur/employés/moderateur</title>
</head>

<body id="body-inscription">
    <div class="container-fluid text-center">
        <h1 class="mt-5">Inscription utilisateur</h1>
        <form method="post" action="inscriptions.php" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" id="name">
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="firstName">
            </div>
            <div class="mb-3">
                <label for="job" class="form-label">Poste :</label>
                <input type="text" class="form-control" name="poste" id="job">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" name="mdp" id="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select class="form-control text-center" name="role" id="role" required>
                    <option value="administrateur">Administrateur</option>
                    <option value="employé">Employé</option>
                    <option value="moderateur">Moderateur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="envoi">Envoyer</button>
        </form>
        <a href="../Administrateur/espaceAdmin.php" class="btn btn-secondary mt-3">Retour espace administrateur</a>
    </div>
</body>

</html>
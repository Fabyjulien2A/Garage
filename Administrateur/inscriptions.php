<?php
session_start();
$bdd = new PDO('mysql:host=mysql-fabyjulien.alwaysdata.net;dbname=fabyjulien_ecf_garage', '319891_faby', 'alwaysdatastudi');
if (isset($_POST['envoi'])){
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) AND !empty($_POST['poste']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['role'])){
    $name = htmlspecialchars($_POST['nom']);
    $firstname = htmlspecialchars($_POST['prenom']);
    $job = htmlspecialchars($_POST['poste']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $role = htmlspecialchars($_POST['role']);
    $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, poste, email, mdp, role ) VALUES (?, ?, ?, ?, ?, ?)');
    $insertUser->execute(array($name, $firstname, $job, $email, $mdp, $role));


    $recupUser = $bdd->prepare('SELECT * FROM users WHERE nom = ? AND prenom = ? AND poste = ? AND email = ? AND mdp = ? AND role = ?');
    $recupUser->execute(array($name, $firstname, $job, $email, $mdp, $role));
    if($recupUser->rowCount() > 0){
        $_SESSION['nom'] = $name;
        $_SESSION['prenom'] = $firstname;
        $_SESSION['poste'] = $job;
        $_SESSION['email'] = $email;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $recupUser->fetch()['id'];

    }





}else{
    echo "veuillez compléter tous les champs";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Inscription administrateur/employés/moderateur</title>
</head>
<body>
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
                <input type="text" class="form-control" name="role" id="role" required>
            </div>
            <button type="submit" class="btn btn-primary" name="envoi">Envoyer</button>
        </form>
        <a href="../Administrateur/espaceAdmin.php" class="btn btn-secondary mt-3">Retour espace administrateur</a>
    </div>
</body>
</html>
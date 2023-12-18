<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Formulaire Admin</title>
</head>
<body>
    <div class="container-fluid text-center">
        <h2>Modifications des horaires</h2>
        <br>
        <form action="footerInfos.php" method="post">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="lundi" class="form-label"> LUNDI :</label>
                    <input type="text" name="lundi" class="form-control">
                </div>
                <div class="col-6 mb-3">
                    <label for="mardi" class="form-label"> MARDI :</label>
                    <input type="text" name="mardi" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="mercredi" class="form-label"> Mercredi :</label>
                    <input type="text" name="mercredi" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="jeudi" class="form-label"> Jeudi :</label>
                    <input type="text" name="jeudi" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="vendredi" class="form-label"> Vendredi :</label>
                    <input type="text" name="vendredi" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="samedi" class="form-label"> SAMEDI :</label>
                    <input type="text" name="samedi" class="form-control">
                </div>

                <div class="col-6 mb-3">
                    <label for="dimanche" class="form-label"> DIMANCHE :</label>
                    <input type="text" name="dimanche" class="form-control">
                </div>
            </div>

            <input type="submit" value="Ajouter" class="btn btn-primary">
        </form>
        <a href="../Administrateur/espaceAdmin.php" class="btn btn-secondary mt-3">Retour espace administrateur</a>
    </div>
</body>
</html>
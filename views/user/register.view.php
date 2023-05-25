<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur - Modification</title>
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index2.css">
</head>
<body>
<header>
    <button class="header-btn"><a href="<?= URL ?>user-home">Accueil</a></button>
    <button class="header-btn"><a href="">Connexion</a></button>
</header>
<button class="display-return"><a href="<?= URL ?>user-profile">Retour</a></button>
    <h3>Inscription</h3>

    <div class="form">

        <form enctype="multipart/form-data" method="post" action="<?= URL ?>user-profile/ev">
            <div class="form-group">
                <label for="lastname">Nom (de famille):</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>

<footer>
<ul>
    <li>contacts</li>
    <li>service client</li>
    <li>newsletter</li>
    <li>résaux</li>
</ul>
</footer>
</body>
</html>
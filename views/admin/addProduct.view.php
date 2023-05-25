<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - Ajout</title>
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index2.css">
</head>
<body>
<header>
    <button class="header-round-btn"><a href="<?= URL ?>admin-products">TECHNO</a></button>
    <button class="header-btn"><a href="">Inscription</a></button>
    <button class="header-btn"><a href="">Connexion</a></button>
    <button class="header-btn"><a href="<?= URL ?>admin/home">Accueil</a></button>
</header>
<button class="display-return"><a href="<?= URL ?>admin-products">Retour</a></button>
    <h3>Ajout d'un produit</h3>
    
    <div class="form">

    <form enctype="multipart/form-data" method="post" action="<?= URL ?>admin-products/av">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="image" class="label-image">Image :</label>
            <input type="file" class="form-control-file" id="image" name="image">
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
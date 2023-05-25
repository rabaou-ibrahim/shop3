<?php
    require_once "models/Product/ProductManager.class.php";
    $productManager = new ProductManager;
    $productManager->loadProducts();
    if(!empty($_SESSION['alert'])) :
?>

<div id="alert" class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <p class="msg-alert" id="msg-alert"> <?= $_SESSION['alert']['msg'] ?> </p>
    <button class="close-alert" id="close-alert"> Fermer </button> 
</div>

<?php
    unset($_SESSION['alert']);
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index.css">
    <title>Admin - Produits</title>
</head>
<body>
    <header>
        <button class="header-round-btn"><a href="admin-products">TECHNO</a></button>
        <button class="header-btn"><a href="">Inscription</a></button>
        <button class="header-btn"><a href="">Connexion</a></button>
    </header>
    <div class="container">
        <aside>
            <div class="admin">
                <div class="admin-title">
                    <img class="user-img" src="http://localhost/boutique2/webfiles/img/export.png" height="100px">
                    <h3>Admin username</h3>
                </div>
                <div class="button-icons">
                    <button><img src="http://localhost/boutique2/webfiles/img/gear-solid.svg" height="30px" width="40px"></a></button>
                    <button><img src="http://localhost/boutique2/webfiles/img/bell-solid.svg" height="30px" width="40px"></a></button>
                </div>    
            </div>
            <div class="admin-buttons">
                <button class="dashboard-btn">Dashboard</button>
                <button class="profile-btn">Profil</button>
                <button class="email-btn">Email</button>
            </div>    
        </aside>

        <section>
            <div class="items">
                <h3 class="items-number-shirt">T-shirts </h3>
                <h3 class="items-number-jean">Jeans <?= $productManager->loadOccurences("Jean"); ?> </h3>
                <h3 class="items-number-veste">Vestes </h3>
            </div>
            <div class="bar">
                <p>Data Set</p>
                <input type="text" placeholder="Recherche...">
                <!-- <button class="export-btn"><p>Exporter</p></button> -->
                <a href="<?= URL ?>admin-products/a"><button class="add-btn"><p>Ajouter</p></button></a>
            </div>
            <?php 
            $products = $productManager->getProducts();
            for($i=0; $i < count($products); $i++) : ?>
            <table class="table">
                <tr class="table-content">
                    <div class="table-content-text">
                    <td><img src = 'http://localhost/boutique2/webfiles/img/shop/<?= $products[$i]->getImage() ?>' width="80px"></td>
                    <td><?= $products[$i]->getName() ?></td>
                    <td><?= $products[$i]->getPrice() ?>€</td>
                    </div>
                    <div class="table-options">
                        <td><a href="<?= URL ?>admin-products/v/<?= $products[$i]->getId() ?>"><button class="view-btn">Voir</button></td></a>
                        <td><a href="<?= URL ?>admin-products/e/<?= $products[$i]->getId();?>"><button class="edit-btn">Modifier</button></a></td>
                        <td><form method="POST" action="<?= URL ?>admin-products/d/<?= $products[$i]->getId();?>" onSubmit = "return confirm('Confirmer suppression ?');">
                                <button class="delete-btn" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </div>
                </tr>
                <?php endfor; ?>
            </table>
            <!-- <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="" class="active">1</a>
                <a href="">2</a>
                <a href="#">&raquo;</a>
            </div> -->
        </section>
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
<script src="Js/admin/app.js"></script>
</html>
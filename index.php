<?php
session_start(); 
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/ProductsController.controller.php";
$productController = new ProductsController;

try{
    if(empty($_GET['page'])){
        require "views/home.view.php";
    }
        else {
            $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
      
            switch($url[0]){
                case "home" : require "views/home.view.php";
                break;
                case "user" : require "views/home.view.php";
                    if($url[1] === "r"){
                        $userController->register();
                    } else if($url[1] === "l") {
                        $userController->logIn();                        
                    } else if($url[1] === "p") {
                        $userController->editUser();
                    } else if($url[1] === "s") {
                        $userController->shop();
                    }
                    else {
                        echo("La page n'existe pas");
                    }
                break;
                case "admin" : require "views/admin/products.view.php";
                break;
                case "admin-products" :
                    if(empty($url[1])){
                        $productController->displayProducts();
                    } else if($url[1] === "v"){
                        $productController->displayProduct($url[2]);
                    } else if($url[1] === "a"){
                        $productController->addProduct();
                    } else if($url[1] === "e"){
                        $productController->editProduct($url[2]);
                    } else if($url[1] === "d"){
                        $productController->deleteProduct($url[2]);
                    } else if($url[1] === "av"){
                       $productController->addProductValidation();
                    } else if($url[1] === "ev"){
                        $productController->editProductValidation();
                    } else {
                       echo("La page n'existe pas");
                    }
                break;
                default: echo("La page n'existe pas");
            }
        }
}  
catch(Exception $e){
    $e->getMessage();
}
    
?>
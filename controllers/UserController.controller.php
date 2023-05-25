<?php
require_once "models/User/UserManager.class.php";

class UserController {
    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager;
        $this->userManager->loadUsers();
    }
    public function register(){
        require "views/user/register.view.php";
    }
    public function registerValidation(){
        $this->userManager->registerDb($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Utilisateur inscrit",
        ];
        
        header('Location: '.URL.'user');
    }
    public function logIn(){
        require "views/user/login.view.php";
    }
    public function logInValidation(){
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Utilisateur inscrit",
        ];
        
        header('Location: '.URL.'user');
    }

    public function editUser($id){
        $user = $this->userManager->getUserbyId($id);
        require "views/user/editUser.view.php";
    }

    public function editUserValidation(){
        $this->userManager->editUserDb($_POST["identifier"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]);
        header('Location: '.URL.'user/p');
    }
    public function shop(){
        require "views/user/shop.view.php";
    }
}
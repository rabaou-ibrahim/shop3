<?php 

require_once "../boutique2/models/User.class.php";

require_once "User.class.php";

class UserManager extends Model{
    private $users;

    public function addUser($user){
        $this->users[] = $user;
    }

    public function getUsers(){
        return $this->users;
    }

    public function loadUsers(){
        $query = $this->getDb()->prepare("SELECT * FROM utilisateurs ORDER BY id DESC");
        $query->execute();
        $myusers = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myusers as $user){
            $u = new User($user['id'],  $user['nom'], $user['prenom'], $user['email'], $user['password']);
            $this->addUser($u);
        }
    }
    public function getUserbyId($id){
        for($i=0; count($this->users); $i++){
            if($this->users[$i]->getId() === $id){
                return $this->users[$i];
            }
        }
    }
    public function registerDb($lastname, $firstname, $email, $password){
        $query = "INSERT INTO utilisateurs (id, nom, prenom, email, password) values (:nom, :prenom, :email, :password)";
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->getDb()->prepare($query); 
        $stmt->bindValue(":nom", $lastname, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $firstname, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordhash, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result > 0){
            $user = new User($this->getDb()->lastInsertId(), $lastname, $firstname, $email, $passwordhash);
            $this->addUser($user);
        }
    }
    public function editUserDb($id, $lastname, $firstname, $email, $password){
        $query = "UPDATE utilisateurs SET nom = :lastname, nom = :firstname, email = :email, password = :password WHERE id = :id";
        
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->getDb()->prepare($query);
        $stmt->bindValue(":id", $id,PDO::PARAM_INT);
        $stmt->bindValue(":nom", $lastname,PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $firstname,PDO::PARAM_STR);
        $stmt->bindValue(":email", $email,PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordhash,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result > 0) {
            $this->getUserbyId($id)->setLastname($lastname);
            $this->getUserbyId($id)->setFirstname($firstname);
            $this->getUserbyId($id)->setEmail($email);
            $this->getUserbyId($id)->setPassword($passwordhash);
        }
    } 
}
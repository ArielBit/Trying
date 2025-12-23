<?php
//Coordonnée du serveur sql
$dbname="db_try";
$host='127.0.0.10';
$username="root";
$password="Ariel&007";
$port=3309;

//Connexion au serveur sql
try{
$connect= new PDO('mysql:host=$host; dbname=$dbname; port=$port; charset=utf8mb4', $username, $password);
$connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Verification par la méthode POST
  if($_SERVER["REQUEST_METHOD"] ==="POST") {
    $user= filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
    $email= filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $mdp = $_POST["mdp"]?? '';

    //Verification de l'existence des données
    if(empty($user) || empty($email) || empty($mdp) ) {

      if(!filter_var($email, FILTER_VALIDATE_EMAIL){
         die('Email invalide');
      }
    
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
      
      $stmt = $connect->prepare('SELECT COUNT(*) FROM tri WHERE user =:user OR email =:email');
      $stmt->bindParam(":user", $user);
      $stmt->bindParam(":email", $email);
      $stmt->execute();
      $count = $stmt->fetchColumn();
      
      if($count >0) {

        echo "Ce Compte existe déjà.";
      }else{

        //Insertion ou création du compte
        $stmt = $connect->prepare('INSERT INTO tri (user, email, mot_de_passe) VALUES(:user, :email, :mdp');
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mdp", $mdpHash);

        if($stmt->execute()) {
          header('Location: Confirmation.html');
          exit();
          
        }else{
          echo "Erreur lors de l'insertion des donnés.";
        }
      }
    }else{
      echo "Veuillez insérer des données.";
    }
  }
    

  
}catch(PDOException $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
}
?>

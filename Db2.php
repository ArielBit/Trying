<?php
//Coordonnée du serveur sql
$Dbname="db_try";
$Username="root";
$Password="Ariel&007";
$Port=3309;

//Connexion au serveur sql
try{
$Connect= new PDO('mysql:host= dbname=$Dbname, port=$Port', $Username, $Password);
$Connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECPTION);

//Verification par la méthode POST
  if($_SERVER["REQUEST METHOD"] =="POST") {
    $user= filter_input(INPUT POST, 'user', FILTER_SANITAZE_SPECIAL_CHAR);
    $email= filter_input(INPUT POST,'email', FILTER_SANITAZE_EMAIL);
    $mdp = filter_input(INPUT POST, 'mdp', FILTER_SANITAZE_SPECIAL_CHAR);

    //Verification de l'existence des données
    if($user && $email && $mdp) {

      $stmt = $Connect->prepare('SELECT COUNT(*) FROM tri WHERE user =:user, email =:email, mot_de_passe =:mdp');
      $stmt->bindParam(":user", $user);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":mdp", $mdp);
      $stmt->execute();
      $Count = $stmt->fethColumn();
      
      if($Count >0) {

        echo "Ce Compte existe déjà.";
      }else{

        //Insertion ou création du compte
        $stmt = $Connect->prepare('INSERT INTO tri (user, email, mot_de_passe) VALUES(:user, :email, :mdp');
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mdp", $mdp);
        $stmt->execute();

        if($stmt->execute) {
          echo "Données enregistrés avec succès.";
          header('Location : Confirmation.html');
        }else{
          echo "Erreur lors de l'insertion des donnés.";
        }
      }
    }else{
      echo "Veuillez insérer des données.";
    }
  }
    

  
}catch(PDO EXECPTION $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
}
?>

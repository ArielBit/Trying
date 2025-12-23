<?php
//Coordonnée du serveur sql
$dbname="db_try";
$host='127.0.0.9';
$username="root";
$password="Ariel&007";
$port=3309;

//Connexion au serveur php
try{
$connect= new PDO("mysql:host=$host; dbname=$dbname; port=$port; charset=utf8mb4", $username, $password);
$connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Vérification par la Méthode POST.
    if($_SERVER["REQUEST_METHOD"] === "POST"){
    $ue = filter_input(INPUT_POST, 'ue', FILTER_SANITIZE_SPECIAL_CHARS);
    $mdp = $_POST["mdp"]?? '';

      //VÉRIFICATIONS de l'existence des données.
      if(empty($ue) || empty($mdp)){
        die('Tous les champs sont obligatoires.');
      }

      $stmt=$connect->prepare('SELECT mot_de_passe FROM tri WHERE email =:ue OR user =:ue');
      $stmt->execute([ ':ue' => $ue]);
      $result =$stmt->fetch(PDO::FETCH_ASSOC);

      if($result){
        if(password_verify($mdp, $result['mot_de_passe'])){
          echo "Connexion reussie, Bienvenue $ue";
          header('Location: Confirmation.html');
        }else{
          echo "Mot de passe incorrect.";
        }
      } else{
        echo "Utilisateur non trouver.";
      }
      

  } else{
      echo " Tout les champs sont obligatoires.";
    }
  
}catch(PDOException $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
}
?>

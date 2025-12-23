<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="" content="">
  </head>
  <body>

    <?php
//Coordonnée du serveur sql
$dbname="db_try";
$host='127.0.0.9';
$username="root";
$password="Ariel&007";
$port=3309;

//Connexion au serveur sql
try{
$connect= new PDO('mysql:host=$host; dbname=$dbname; port=$port; charset=utf8mb4', $username, $password);
$connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
  exit();
}
//Récupéreration des données.
  $stmt=$connect->prepare('SELECT id, user, email FROM tri');
  $stmt->execute();
//Recuperation de toute les lignes. 
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    
    <?php if(!empty($data)){
foreach ($data as $row): ?>
<p>
  <?php echo htmlspecialchars($row["id"]); ?>
  User: <?php echo htmlspecialchars($row["user"]); ?>
</p>

  <p>
  <?php echo htmlspecialchars($row["id"]); ?>
  Email: <?php echo htmlspecialchars($row["email"]); ?>
</p>

    <?php endforeach; ?>
    <?php
} else{
    echo "Aucun utilisateur.";
}
endif; ?>
  
  

    
  </body>
</html>

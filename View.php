<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="uft-8">
    <meta name="" content="">
  </head>
  <body>
    
    <?php foreach ($data as $row): ?>
<p>
  <?php echo htmlspecialchars($row["id"]); ?>
  User: <?php echo htmlspecialchars($row["user"]); ?>
</p>

  <p>
  <?php echo htmlspecialchars($row["id"]); ?>
  Email: <?php echo htmlspecialchars($row["email"]); ?>
</p>

  <p>
  <?php echo htmlspecialchars($row["id"]); ?>
  Mot de passe: <?php echo htmlspecialchars($row["mdp"]); ?>
</p>

    
  </body>
</html>

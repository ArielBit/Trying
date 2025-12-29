<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="Site d'essaye" content="E-trying">
  <title>Connexion</title>
</head>
  
<body>
  <header>
    <h1>Connexion à la page </h1>
  </header>

  <main>
    <form action="Db3.php" method="post">

      <fieldset>
       <!--Utilisateur/Email-->
      <label for="ue">Nom d'utilisateur ou Email</label>
      <input type="text" id="ue" name="ue" placeholder="Nom d'utilisateur ou Email" requiered>

      <!--Mot de passe-->
      <label for="mdp">Mot de passe</label>
      <input type="password" id="mdp" name="mdp" placeholder="8 Chiffres" requiered>

      <input type="submit" value="Soumettre">
    </fielset>
      
    </form>
  </main>
</body>

</html>

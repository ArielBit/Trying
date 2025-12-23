<?php
//Coordonnée du serveur sql
$Dbname="db_try";
$Host='127.0.0.9';
$Username="root";
$Password="Ariel&007";
$Port=3309;

//Connexion au serveur sql
try{
$Connect= new PDO('mysql:host=$Host, dbname=$Dbname, port=$Port', $Username, $Password);
$Connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDO EXCEPTION $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
}
?>

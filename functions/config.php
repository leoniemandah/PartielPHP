<?php

// Création et test de la connexion

try {
 
$pdo = new PDO('mysql:host=localhost;dbname=partiel','partiel','Bu5zqPyDUZRPEhyJ'
);

}
catch (PDOException $exception) {
 
 
 exit('Erreur de connexion à la base de données');
 
}

// Requête pour tester la connexion

$query = $pdo->query("SELECT * FROM `users` WHERE `id_groupe` LIKE '1'");

$resultat = $query->fetchAll();

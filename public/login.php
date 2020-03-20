<?php
require_once '../layout/header.php';
?>

<form>
<div class="form-group">
    <label for="exampleInputPassword1">login</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">connexion</button>
</form>

<?php 
require_once '../functions/config.php';

//  Récupération de l'utilisateur et de son pass hashé
$req = $pdo->prepare('SELECT login, password FROM users WHERE login = :login');
$req->execute(array(
    'login' => $login));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $login;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}

if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['login'];

}

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();


 
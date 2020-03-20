<?php
require_once '../layout/header.php';


?>

<h1>Inscription à la newsletter</h1>

<label for="exampleInputPassword1">email</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">validé</button>
</form>

<?php
$servername = "localhost";
$username = "partiel";
$password = "Bu5zqPyDUZRPEhyJ";
$dbname = "partiel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // pour la gestion des exeptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO newsletter (email)
    VALUES ( 'loulou@example.com')";
    // utilisation de exec dans le cas où il y a pas de retour
    $conn->exec($sql);
    echo "succès";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
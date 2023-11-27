<?php
// Configuration de la connexion à la base de données MySQL
$servername = "mysql_listedecourse";
$port = "3306";
$username = "root";
$password = ".etml-";
$dbname = "db_listedecourse";

try {
    // Créez une connexion PDO à la base de données MySQL
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT eleElement FROM t_element");

    // Exécuter la requête SQL
    $stmt->execute();
    
    // Récupérer les résultats de la requête SQL sous forme de tableau associatif
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Afficher les résultats
    http_response_code(200);
    foreach ($results as $row) {
        echo $row['eleElement'] . '<br>';
    }

    // Fermez la connexion à la base de données MySQL
    $conn = null;

    //redirige vers la page d'origine
    header('Location: ' . '../../index.php');
    exit;
}
catch(PDOException $e) 
{
  http_response_code(500);
  echo "Erreur lors de l'accès : " . $e->getMessage();
}

?>
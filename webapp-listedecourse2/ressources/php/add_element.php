<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupérez la valeur du groupe envoyée par un POST
  $eleElement = $_POST['eleElement'];
  
  
  // Configuration de la connexion à la base de données MySQL
  $servername = "127.0.0.1";
  $port = "3333";
  $username = "root";
  $password = ".etml-";
  $dbname = "db_listedecourse";
  
  try 
  {
    // Créez une connexion PDO à la base de données MySQL
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    
    // Configurez PDO pour renvoyer les erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ajoutez la valeur à une table MySQL et le binding est mis en place
    // pour proteger la requête contre une injection.
    $stmt = $conn->prepare("INSERT INTO t_element (eleElement) VALUES (:eleElement);");
    $stmt->bindParam(':eleElement', $eleElement);
    $stmt->execute();
    
    //Envoie des messages suivant si la requête a réussi (200) ou non (404)
    http_response_code(200);
    echo "La valeur a été ajoutée à la base de données";

    foreach ($results as $row) {
        echo $row['eleElement'] . '<br>';
    }

    //redirige vers la page d'origine
    header('Location: ' . '../../index.php');
    exit;

  } 
  catch(PDOException $e) 
  {
    http_response_code(500);
    echo "Erreur lors de l'ajout de la valeur : " . $e->getMessage();
  }
  
  // Fermez la connexion à la base de données MySQL
  $conn = null;

  // header('Location: ' . '../../src/html/artists/index.php');
  // exit();
  
  // //Attend un petit moment pour que l'on puisse voir le message qui dit si le transfert a fonctionné
  // sleep(5);
  
  // // Redirection vers la même page, mais en utilisant la méthode GET Permet de réactualiser la page sans problème
  // header('Location: ' . $_SERVER['PHP_SELF']);
  // exit();
  
}
?>
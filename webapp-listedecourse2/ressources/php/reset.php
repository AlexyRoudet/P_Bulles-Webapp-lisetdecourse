<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configuration de la connexion à la base de données MySQL
    $servername = "127.0.0.1";
    $port = "3333";
    $username = "root";
    $password = "root";
    $dbname = "db_listedecourse";

    try {
        // Créez une connexion PDO à la base de données MySQL
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Préparer la requête SQL
        $stmt = $conn->prepare("TRUNCATE t_element");

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
}
?>
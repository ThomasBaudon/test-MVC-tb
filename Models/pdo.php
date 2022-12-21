<?php 

    try
        {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=hotello", "root", "root",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
                // var_dump($pdo);
        }
    catch(PDOexception $e)
        {
            echo "Erreur de connexion à la bdd" . $e->getMessage();
        }

    // define('URL', 'http://localhost:8888/test-MVC-tb/');
    // define('RACINE', $_SERVER['DOCUMENT_ROOT'] . '/test-MVC-tb/');

?>


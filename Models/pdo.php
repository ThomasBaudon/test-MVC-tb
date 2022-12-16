<?php 

    try
        {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=hotello", "root", "root",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
                var_dump($pdo);
        }
    catch(PDOexception $e)
        {
            echo "Erreur de connexion à la bdd" . $e->getMessage();
        }
    // return $pdo;



?>


<?php
try {
    //Se connecter à la base de données
    $bdd = new PDO("mysql:host=localhost;dbname=gl2symfo2020", 'root', '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        )
    );
    // Gérer l'erreur
} catch (PDOException $error) {
    echo $error->getMessage();
}
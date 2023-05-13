<?php
    $host = "localhost"; // l'adresse de la base de données
    $dbname = "vacation"; // le nom de la base de données
    $bd_username = "root"; // le nom d'utilisateur pour accéder à la base de données
    $bd_password = ""; // le mot de passe pour accéder à la base de données

    // Connexion à la base de données avec PDO
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $bd_username, $bd_password);
        // Configuration des options de PDO
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Connexion échouée : " . $e->getMessage());
    }
?>

<?php
// Vérifie si l'utilisateur est connecté
session_start();


// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recup des informations
    $classe = htmlspecialchars($_POST['classe']);

    // Connexion a la base de donnees
    require_once 'bd.php';

    try{
        // Requete pour ajouter un enseignant
        $sql = "INSERT INTO classe (LIB_CLASSE) VALUES (:classe)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':classe', $classe);
        $stmt->execute();

        header('Location: ../front/classe/index.php');
        exit();
    } catch (PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}
?>
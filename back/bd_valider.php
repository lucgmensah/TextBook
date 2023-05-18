<?php
    // Connexion à la base de données
    require_once 'bd.php';

    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $utilisateur = $_POST['user'];

        try {
            // Requête SQL pour récupérer l'utilisateur avec le pseudo donné
            $sql = "UPDATE utilisateur SET actif = 1 WHERE id_utilisateur = :utilisateur";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':utilisateur', $utilisateur);
            $stmt->execute();

            // Redirige l'utilisateur vers la page d'accueil
            $message = "L'inscription a été validée avec succès.";
            $_SESSION['message'] = $message;
            header('Location: ../front/enseignant/valider.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>
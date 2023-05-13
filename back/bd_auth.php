<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    // Connexion à la base de données
    require_once 'bd.php';

    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupère les données du formulaire
        $pseudo = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        try {
            // Requête SQL pour récupérer l'utilisateur avec le pseudo donné
            $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = :pseudo";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->execute();

            // Récupère l'utilisateur
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifie si l'utilisateur existe et si le mot de passe correspond
            if ($utilisateur['actif'] && password_verify($password, $utilisateur['mot_de_passe'])) {
                // Démarre la session
                session_start();

                // Stocke l'ID de l'utilisateur dans la variable de session
                $_SESSION['utilisateur'] = $utilisateur['nom_utilisateur'];

                // Redirige l'utilisateur vers la page d'accueil
                header('Location: ../front/accueil.php');
                exit();
            } else {
                // Affiche un message d'erreur si les informations de connexion sont invalides
                $message_erreur = "Le pseudo ou le mot de passe est incorrect.";
                header("Location: ../index.php?erreur=".urlencode($message_erreur));
                exit();
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>

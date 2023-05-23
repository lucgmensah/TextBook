<?php
// Vérifie si l'utilisateur est connecté
session_start();
if (isset($_SESSION['utilisateur'])) {
    $username = $_SESSION['utilisateur'];
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recup des informations
    $classe = htmlspecialchars($_POST['classe']);
    $ue = htmlspecialchars($_POST['ue']);
    $date_ens = htmlspecialchars($_POST['date_ens']);
    $debut_ens = htmlspecialchars($_POST['debut_ens']);
    $fin_ens = htmlspecialchars($_POST['fin_ens']);
    $contenu = htmlspecialchars($_POST['contenu']);

    // Connexion a la base de donnees
    require_once 'bd.php';

    // Recuperation de l'ID de l'enseignant
    $sql = "SELECT enseignant.ID_ENSEIGNANT FROM enseignant INNER JOIN utilisateur ON enseignant.ID_ENSEIGNANT = utilisateur.id_enseignant WHERE utilisateur.nom_utilisateur = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_enseignant = $result['ID_ENSEIGNANT'];

    try{
        $vol_ens = $fin_ens - $debut_ens;
        // Requete pour ajouter un enseignement
        $sql = "INSERT INTO enseigner (ID_CLASSE, ID_UE, ID_ENSEIGNANT, DATE_ENS, DEBUT_ENS, FIN_ENS, VOL_ENS, CONTENU) VALUES (:classe, :ue, :enseignant, :date_ens, :debut_ens, :fin_ens, :vol_ens, :contenu)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':ue', $ue);
        $stmt->bindParam(':enseignant', $id_enseignant);
        $stmt->bindParam(':date_ens', $date_ens);
        $stmt->bindParam(':debut_ens', $debut_ens);
        $stmt->bindParam(':fin_ens', $fin_ens);
        $stmt->bindParam(':vol_ens', $vol_ens);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        // Redirige l'utilisateur vers la page des enseignements
        header('Location: ../front/accueil.php');
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}
?>
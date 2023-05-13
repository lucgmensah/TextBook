<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupère les données du formulaire
    $pseudo = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenoms = htmlspecialchars($_POST['prenoms']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $ue = htmlspecialchars($_POST['ue']);
    $contact = htmlspecialchars($_POST['contact']);
    $num_cpte = htmlspecialchars($_POST['num_cpte']);

    // Crypte le mot de passe
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    require_once 'bd.php';

    try {
        // Requête pour ajouter un enseignant 
        $sql = "INSERT INTO enseignant (NOM, PRENOM, ID_SEXE, ID_SPECIALITE, CONTACT, NUM_CPTE) VALUES (:nom, :prenoms, :sexe, :ue, :contact, :num_cpte)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenoms', $prenoms);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':num_cpte', $num_cpte);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':ue', $ue);
        $stmt->execute();
        // Récupère l'ID de l'enseignant
        $id_enseignant = $db->lastInsertId();

        // Requête SQL pour insérer l'utilisateur dans la table
        $sql2 = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, role, id_enseignant, actif) VALUES (:pseudo, :password_hash, 'enseignant', :id_enseignant, 0)";
        $stmt = $db->prepare($sql2);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':id_enseignant', $id_enseignant);
        $stmt->execute();

        // Redirige l'utilisateur vers la page de connexion
        header('Location: ../index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

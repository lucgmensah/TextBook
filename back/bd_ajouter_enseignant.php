<?php
// Vérifie si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $admin = false;
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recup des informations
    $nom = htmlspecialchars($_POST['nom']);
    $prenoms = htmlspecialchars($_POST['prenoms']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $contact = htmlspecialchars($_POST['contact']);
    $num_cpte = htmlspecialchars($_POST['num_cpte']);
    $grade = htmlspecialchars($_POST['grade']);
    $specialite = htmlspecialchars($_POST['specialite']);
    $pseudo = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Hash le mot de passe
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Connexion a la base de donnees
    require_once 'bd.php';

    try{
        // Requete pour ajouter un enseignant
        $sql = "INSERT INTO enseignant (NOM, PRENOM, ID_SEXE, ID_SPECIALITE, CONTACT, NUM_CPTE, ID_GRADE) VALUES (:nom, :prenoms, :sexe, :specialite, :contact, :num_cpte, :grade)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenoms', $prenoms);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':num_cpte', $num_cpte);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':specialite', $specialite);
        $stmt->bindParam(':grade', $grade);
        $stmt->execute();

        // Recupere l'ID de l'enseignant
        $id_enseignant = $db->lastInsertId();

        // Requête SQL pour insérer l'utilisateur dans la table
        if ($admin == false){
            $sql2 = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, role, id_enseignant, actif) VALUES (:pseudo, :password_hash, 'enseignant', :id_enseignant, 0)";
        }else{
            $sql2 = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, role, id_enseignant, actif) VALUES (:pseudo, :password_hash, 'enseignant', :id_enseignant, 1)";
        }
        $stmt = $db->prepare($sql2);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':id_enseignant', $id_enseignant);
        $stmt->execute();

        // Redirige l'utilisateur vers la page des enseignants
        if ($admin == false){
            header('Location: ../index.php');
        }else{
            header('Location: ../front/enseignant/index.php');
        }
        exit();
    } catch (PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<?php
    // Démarre la session
    session_start();

    if (!isset($_SESSION['utilisateur'])) {
        header('Location: ../../index.php');
        exit();
    }

    require_once '../../back/bd.php'; // inclure le fichier connexion.php

    // Jointure entre les tables enseignant, specialité et utilisateur
    $sql = "SELECT * FROM enseignant INNER JOIN specialite ON enseignant.ID_SPECIALITE = specialite.ID_SPECIALITE INNER JOIN utilisateur ON enseignant.ID_ENSEIGNANT = utilisateur.id_enseignant WHERE utilisateur.actif = 1 ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $enseignants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/accueil.css">
        <title>TextBook - Enseignants</title>
    </head>
    <body>
        <?php include("header.php") ?>

        <main>
            <div class="accueil">
                <h2>Enseignants</h2>
                <p>
                    Gérer efficacement les enseignements de votre établissement. <br>
                    Ajouter, modifier ou supprimer des enseignants. Voyez le travail qu'il effectue.
                </p>
                <br>
                <div class="actions">
                    <div class="action border-end">
                        <a href="ajouter.php">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter un enseignant</span>
                        </a>
                    </div>
                    <div class="action">
                        <a href="valider.php">
                            <i class="fas fa-plus"></i>
                            <span>Valider une inscription</span>
                        </a>
                    </div>
                </div>
                <br> <br> <br>
                <div class="tableau">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom & Prénoms</th>
                                <th>Spécialité</th>
                                <th>Contact</th>
                                <th>
                                    <i class="fas fa-bars"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enseignants as $enseignant): ?>
                                <tr>
                                    <td><?= $enseignant['NOM'] . ' ' . $enseignant['PRENOM'] ?></td>
                                    <td><?= $enseignant['LIB_SPECIALITE'] ?></td>
                                    <td><?= $enseignant['CONTACT'] ?></td>
                                    <td>
                                        <i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer>
            <p>TextBook - 2023</p>
            <br>
            <small><i class="fas fa-code"></i> with ❤ by Sangohan</small>
        </footer>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.4.0/js/all.js" crossorigin="anonymous"></script>
        <script>
            
        </script>
    </body>
</html>
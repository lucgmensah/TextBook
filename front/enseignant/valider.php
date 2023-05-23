<?php
    // Démarre la session
    session_start();

    if (!isset($_SESSION['utilisateur'])) {
        header('Location: ../../index.php');
        exit();
    }

    // Recuperation d'un eventuel message
    if (isset($_SESSION['message'])) {
        $message_erreur = $_SESSION['message'];
        unset($_SESSION['message']);
    }

    require_once '../../back/bd.php'; // inclure le fichier connexion.php

    // Jointure entre les tables enseignant, specialité et utilisateur
    $sql = "SELECT * FROM enseignant INNER JOIN specialite ON enseignant.ID_SPECIALITE = specialite.ID_SPECIALITE INNER JOIN utilisateur ON enseignant.ID_ENSEIGNANT = utilisateur.id_enseignant WHERE utilisateur.actif = 0 ";
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
        <title>TextBook - Valider une inscription</title>
    </head>
    <body>
        <?php include("header.php") ?>
        <?php
            if(isset($message_erreur)){
                ?><script>
                    alert(<?php $message_erreur ?>)
                </script>?><?php
            }
        ?>
        <main>
            <style>
                button{
                    border: none;
                    background: none;
                }
                .fa-check:hover{
                    color: #0fae1a;
                    cursor: pointer;
                }
            </style>
            <div class="accueil">
                <h2>Valider une inscription</h2>
                <p>
                    Autoriser un enseignant à se connecter à TextBook. <br>
                </p>
                <br> 
                <br>
                <div class="tableau">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom & Prénoms</th>
                                <th>Spécialité</th>
                                <th>Contact</th>
                                <th>Numéro de compte</th>
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
                                    <td><?= $enseignant['NUM_CPTE'] ?></td>
                                    <td>
                                        <form action="../../back/bd_valider.php" method="post">
                                            <button name="user" value="<?php echo $enseignant['id_utilisateur'] ?>">
                                                <i class="fa-solid fa-check fa-xl"></i>
                                            </button>
                                        </form>
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
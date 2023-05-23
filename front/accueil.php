<?php
    // Démarre la session
    session_start();

    if (!isset($_SESSION['utilisateur'])) {
        header('Location: ../index.php');
        exit();
    }

    require_once '../back/bd.php'; // inclure le fichier connexion.php

    // Requete pour voir les enseignements en jointure avec les classes, les ue et les enseignants
    $sql = "SELECT * FROM enseigner INNER JOIN classe ON enseigner.ID_CLASSE = classe.ID_CLASSE INNER JOIN ue ON enseigner.ID_UE = ue.ID_UE INNER JOIN enseignant ON enseigner.ID_ENSEIGNANT = enseignant.ID_ENSEIGNANT";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/accueil.css">
        <title>TextBook - Accueil</title>
    </head>
    <body>
        <?php include("header.php") ?>

        <main>
            <div class="accueil">
                <h2>Accueil</h2>
                <p>
                    Bienvenue sur la plateforme <strong>TextBook</strong>. <br>
                    Ici vous pouvez remplir rapidement et facilement les cours que vous avez eu en classe. <br>
                </p>
                <br>
                <div class="actions">
                    <div class="action">
                        <a href="ajouter_enseignement.php">
                            <i class="fas fa-plus"></i>
                            Ajouter un cours effectués
                        </a>
                    </div>
                </div>
                <br> <br> <br>
                <div class="tableau">
                    <table>
                        <thead>
                            <tr>
                                <th>Classe</th>
                                <th>UE</th>
                                <th>Enseignant</th>
                                <th>Date</th>
                                <th>Heure début</th>
                                <th>Heure fin</th>
                                <th>Volume enseignement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($result as $row){
                                    echo "<tr>";
                                    echo "<td>".$row['LIB_CLASSE']."</td>";
                                    echo "<td>".$row['LIB_UE']."</td>";
                                    echo "<td>".$row['NOM']." ".$row['PRENOM']."</td>";
                                    echo "<td>".$row['DATE_ENS']."</td>";
                                    echo "<td>".$row['DEBUT_ENS']."</td>";
                                    echo "<td>".$row['FIN_ENS']."</td>";
                                    echo "<td>".$row['VOL_ENS']."</td>";
                                    echo "</tr>";
                                }
                            ?>
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
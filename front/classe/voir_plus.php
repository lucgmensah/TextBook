<?php 
    session_start();

    if(!isset($_SESSION['utilisateur'])){
        header("Location: ../../index.php");
        exit();
    }

    require_once '../../back/bd.php'; // inclure le fichier connexion.php

    // Recuperer les informations sur la classe
    $classe_id = $_GET['classe'];
    $sql = "SELECT * FROM classe WHERE ID_CLASSE = :classe_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classe_id', $classe_id);
    $stmt->execute();
    $classe = $stmt->fetch(PDO::FETCH_ASSOC);

    // Recuperer les informations sur les enseignements
    $sql = "SELECT * FROM enseigner INNER JOIN classe ON enseigner.ID_CLASSE = classe.ID_CLASSE INNER JOIN ue ON enseigner.ID_UE = ue.ID_UE INNER JOIN enseignant ON enseigner.ID_ENSEIGNANT = enseignant.ID_ENSEIGNANT WHERE enseigner.ID_CLASSE = :classe_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classe_id', $classe_id);
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
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/accueil.css">
        <title>TextBook - Classe</title>
    </head>
    <body>
        <?php include("header.php") ?>

        <main>
            <div class="accueil">
                <h2>Classe</h2>
                <p>
                    <strong>
                    <?php
                        echo $classe['LIB_CLASSE'];
                    ?>
                    </strong>
                </p>
                <br>
                <div class="actions">
                    <div class="action">
                        <a href="../ajouter_enseignement.php?classe=<?php echo $classe['ID_CLASSE'] ?>">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter un cours effectué</span>
                        </a>
                    </div>
                </div>
                <br> <br> <br>
                <div class="tableau">
                    <table>
                        <thead>
                            <tr>
                                <th>UE</th>
                                <th>Enseignant</th>
                                <th>Date</th>
                                <th>Heure début</th>
                                <th>Heure fin</th>
                                <th>Volume enseignement</th>
                                <th>Contenu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($result as $enseignement){
                                echo "<tr>";
                                echo "<td>".$enseignement['LIB_UE']."</td>";
                                echo "<td>".$enseignement['NOM']." ".$enseignement['PRENOM']."</td>";
                                echo "<td>".$enseignement['DATE_ENS']."</td>";
                                echo "<td>".$enseignement['DEBUT_ENS']."</td>";
                                echo "<td>".$enseignement['FIN_ENS']."</td>";
                                echo "<td>".$enseignement['VOL_ENS']."</td>";
                                echo "<td>".$enseignement['CONTENU']."</td>";
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
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script>

        </script>
    </body>
</html>
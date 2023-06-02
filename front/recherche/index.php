<?php
    // Démarre la session
    session_start();

    if (!isset($_SESSION['utilisateur'])) {
        header('Location: ../../index.php');
        exit();
    }

    require_once '../../back/bd.php'; // inclure le fichier connexion.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/forms.css">
    <link rel="stylesheet" href="../../css/accueil.css">
    <title>TextBook - Enseignants</title>
</head>
<body>
    <?php include("header.php") ?>
    
    <main>
        <div class="accueil">
            <h2>Recherche</h2>
            <p>
                Gérer efficacement les enseignements de votre établissement. <br>
                Ajouter, modifier ou supprimer des enseignants. Voyez le travail qu'il effectue.
            </p>
            <br><br><br>

            <!-- Formulaire de recherche -->
            <div class="formulaire">
                <form method="GET" action="index.php" style="">
                    <div>
                        De : <input class="form-input" type="date" name="date_debut" id="periode" placeholder="De" >
                        à : <input class="form-input" type="date" name="date_fin" id="periode" placeholder="à" >
                    </div>
                    <select name="ue" id="specialite" class="form-select" value="<?php echo $_GET['ue']; ?>">
                        <option value="" selected>Selectionnez l'UE</option>
                        <?php
                            $stmt = $db->prepare("SELECT * FROM ue");
                            $stmt->execute();
                            $ues = $stmt->fetchAll();

                            foreach($ues as $ue){
                                echo "<option value='".$ue['ID_UE']."'>".$ue['LIB_UE']."</option>";
                            }
                        ?>
                    </select>
                    <select name="classe" id="classe" class="form-select" value="<?php echo $_GET['classe']; ?>">
                        <option value="" selected>Selectionnez la classe</option>
                        <?php
                            $stmt = $db->prepare("SELECT * FROM classe");
                            $stmt->execute();
                            $classes = $stmt->fetchAll();

                            foreach($classes as $classe){
                                echo "<option value='".$classe['ID_CLASSE']."'>".$classe['LIB_CLASSE']."</option>";
                            }
                        ?>
                    </select>
                    <select name="enseignant" id="enseignant" class="form-select" value="<?php echo $_GET['enseignant']; ?>">
                        <option value="" selected>Selectionnez l'enseignant</option>
                        <?php
                            $stmt = $db->prepare("SELECT * FROM enseignant");
                            $stmt->execute();
                            $enseignants = $stmt->fetchAll();

                            foreach($enseignants as $enseignant){
                                echo "<option value='".$enseignant['ID_ENSEIGNANT']."'>".$enseignant['NOM']." ".$enseignant['PRENOM']."</option>";
                            }
                        ?>
                    </select>

                    <input type="submit" value="Rechercher">
                </form>
            </div>
            
            <br><br><br>

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
                        $dateDebut = $_GET['date_debut'] ?? '';
                        $dateFin = $_GET['date_fin'] ?? '';
                        $ue = $_GET['ue'] ?? '';
                        $enseignant = $_GET['enseignant'] ?? '';
                        $classe = $_GET['classe'] ?? '';
                        
                        // Créez votre requête en fonction des filtres
                        $query = "SELECT * FROM enseigner INNER JOIN classe ON enseigner.ID_CLASSE = classe.ID_CLASSE INNER JOIN ue ON enseigner.ID_UE = ue.ID_UE INNER JOIN enseignant ON enseigner.ID_ENSEIGNANT = enseignant.ID_ENSEIGNANT";
                        
                        if (!empty($dateDebut) && !empty($dateFin)) {
                            $query .= " AND DATE_ENS BETWEEN '$dateDebut' AND '$dateFin'";
                        }
                        
                        if (!empty($ue)) {
                            $query .= " AND enseigner.ID_UE = '$ue'";
                        }
                        
                        if (!empty($enseignant)) {
                            $query .= " AND enseigner.ID_ENSEIGNANT = '$enseignant'";
                        }

                        if (!empty($classe)) {
                            $query .= " AND enseigner.ID_CLASSE = '$classe'";
                        }

                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
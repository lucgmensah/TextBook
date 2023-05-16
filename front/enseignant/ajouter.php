<?php 
    session_start();

    if(!isset($_SESSION['utilisateur'])){
        header("Location: ../index.php");
        exit();
    }

    require_once '../../back/bd.php';

    $stmt = $db->prepare("SELECT * FROM grade");
    $stmt->execute();
    $grades = $stmt->fetchAll();

    $stmt = $db->prepare("SELECT * FROM specialite");
    $stmt->execute();
    $specialites = $stmt->fetchAll();
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
        <title>TextBook - Ajouter enseignant</title>
    </head>
    <body>
        <?php include("../header.php") ?>

        <main>
            <div class="formulaire">
                <h2>Ajouter enseignant</h2>
                <form action="../../back/bd_ajouter_enseignant.php">
                    <div class="champs">
                        <select name="grade" id="grade" class="form-select">
                            <option value="" selected>Selectionnez le grade</option>
                            <?php
                                foreach($grades as $grade){
                                    echo "<option value='".$grade['ID_GRADE']."'>".$grade['LIB_GRADE']."</option>";
                                }
                            ?>
                        </select>
                        <select name="specialite" id="specialite" class="form-select">
                            <option value="" selected>Selectionnez la spécialité</option>
                            <?php
                                foreach($specialites as $specialite){
                                    echo "<option value='".$specialite['ID_SPECIALITE']."'>".$specialite['LIB_SPECIALITE']."</option>";
                                }
                            ?>
                        </select>
                        <input class="form-input" type="text" name="nom" id="nom" placeholder="Nom">
                        <input class="form-input" type="text" name="prenoms" id="prenoms" placeholder="Prénoms">
                        <div class="form-radio">
                            <label for="homme">
                                <input type="radio" name="sexe" id="homme" value="0">
                                Homme
                            </label>
                            <label for="homme">
                                <input type="radio" name="sexe" id="femme" value="1">
                                Femme
                            </label>
                        </div>
                        <input class="form-input" type="text" name="contact" id="contact" placeholder="Contact">
                        <input class="form-input" type="text" name="num_cpte" id="num_cpte" placeholder="Numéro de compte">
                        <hr>
                        <p>Définissez ses accès</p>
                        <input class="form-input" type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                        <input class="form-input" type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>

                    <input class="form-bouton" type="submit" value="Enregistrer">
                </form>
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
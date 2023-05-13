<?php
    require_once 'back/bd.php'; // inclure le fichier connexion.php

    // Utilisation de la connexion à la base de données
    $stmt = $db->prepare("SELECT * FROM specialite");
    $stmt->execute();
    $specialite = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <title>TextBook - Inscription</title>
    </head>
    <body>
        <header>
            <h1>TextBook</h1>
        </header>

        <main>
            <div class="formulaire">
                <h2>Inscription</h2>
                <form action="back/bd_inscription.php" method="post">
                    <div class="champs">
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
                        <select name="ue" id="ue" class="form-select">
                            <option value="" selected>Selectionnez votre UE</option>
                            <?php
                                foreach ($specialite as $spe) {
                                    echo '<option value="' . $spe['ID_SPECIALITE'] . '">' . $spe['LIB_SPECIALITE'] . '</option>';
                                }
                            ?>
                        </select>
                        <input class="form-input" type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                        <input class="form-input" type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>

                    <a class="pas-inscrit" href="index.php">Déjà un compte ? Connectez vous !</a>
                    <input class="form-bouton" type="submit" value="S'enregistrer">
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
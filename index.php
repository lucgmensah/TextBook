<?php
    // Démarre la session
    session_start();

    require_once 'back/bd.php'; // inclure le fichier connexion.php

    // Recuperation d'un eventuel message
    if (isset($_GET['erreur'])) {
        $message_erreur = $_GET['erreur'];
    }

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
        <title>TextBook - Connexion</title>
    </head>
    <body>
        <header>
            <h1>TextBook</h1>
        </header>

        <main>
            <div class="formulaire">
                <h2>Connexion</h2>
                <form action="back/bd_auth.php" method="post">
                    <div class="champs">
                        <input class="form-input" type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                        <input class="form-input" type="password" name="password" id="password" placeholder="Mot de passe">
                        <div class="erreur_message">
                            <?php
                                if (isset($message_erreur)) {
                                    echo '<p style="color: red; font-size: 11px; text-align: start; margin: 0;">' . $message_erreur . '</p>';
                                }
                            ?>
                        </div>
                    </div>

                    <a class="pas-inscrit" href="inscription.php">Pas encore inscrit ? Inscrivez vous !</a>
                    <input class="form-bouton" type="submit" value="Connexion">
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
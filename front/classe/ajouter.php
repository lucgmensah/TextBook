<?php 
    session_start();

    if(!isset($_SESSION['utilisateur'])){
        header("Location: ../index.php");
        exit();
    }
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
        <title>TextBook - Ajouter classe</title>
    </head>
    <body>
        <?php include("../header.php") ?>

        <main>
            <div class="formulaire">
                <h2>Ajouter classe</h2>
                <form action="../../back/bd_ajouter_classe.php" method="post">
                    <div class="champs">
                        <input class="form-input" type="text" name="classe" id="classe" placeholder="Libellé de la classe">
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
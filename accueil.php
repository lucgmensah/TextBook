<?php
    // Démarre la session
    session_start();

    if (!isset($_SESSION['id_utilisateur'])) {
        header('Location: index.php');
        exit();
    }

    require_once 'back/bd.php'; // inclure le fichier connexion.php

    // Utilisation de la connexion à la base de données
    $stmt = $db->prepare("SELECT * FROM enseigner");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/accueil.css">
        <title>TextBook - Accueil</title>
    </head>
    <body>
        <header>
            <h1>TextBook</h1>
        </header>

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
                        <a href="ajouter_enseignement.html">
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
                                <th>Volume enseignement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum</td>
                                <td>Lorem ipsum</td>
                                <td>Lorem ipsum</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum</td>
                                <td>Lorem ipsum</td>
                                <td>Lorem ipsum</td>
                            </tr>
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
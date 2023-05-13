<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
        <title>TextBook - Ajouter enseignement</title>
    </head>
    <body>
        <?php include("header.php") ?>

        <main>
            <div class="formulaire">
                <h2>Ajouter enseignement</h2>
                <form action="">
                    <div class="champs">
                        <select name="classe" id="classe" class="form-select">
                            <option value="" selected>Selectionnez la classe</option>
                            <option value="classe">Lorem</option>
                            <option value="classe">Lorem</option>
                            <option value="classe">Ipsum</option>
                        </select>
                        <select name="ue" id="ue" class="form-select">
                            <option value="" selected>Selectionnez l'UE</option>
                            <option value="">Lorem</option>
                            <option value="">Lorem</option>
                            <option value="">Ipsum</option>
                        </select>
                        
                        <input class="form-input" type="date" name="date_ens" id="date_ens" placeholder="Date du cours">
                        <input class="form-input" type="time" name="debut_ens" id="debut_ens" placeholder="Heure de début">
                        <input class="form-input" type="time" name="fin_ens" id="fin_ens" placeholder="Heure de fin">
                        <textarea class="form-textarea" name="contenu" id="contenu" cols="30" rows="10" placeholder="Contenu du cours"></textarea>
                    </div>

                    <input class="form-bouton" type="submit" value="Enregistrer">
                    <a href="accueil.php">OK</a>
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
<header>
    <h1>TextBook</h1>
    <?php
        if (isset($_SESSION['utilisateur'])) {
    ?>

    <nav>
        <ul>
            <li>
                <a href="../accueil.php">
                    <i class="fa-solid fa-house"></i>
                    Accueil
                </a>
            </li>
            <li>
                <a href="../enseignant/index.php">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Enseignants
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-school"></i>
                    Classes
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Recherche
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    Paramètre
                </a>
            </li>
            <li>
                <a href="../../back/deconnexion.php">
                    <i class="fa-solid fa-power-off"></i>
                    Déconnexion
                </a>
            </li>
        </ul>
    </nav>
    
    <?php
        }
    ?>
</header>
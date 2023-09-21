<header>
    <div id="nav1">
        <ul id="menu-nav">
            <li><a href="../index.php">Accueil</a></li>
            <?php if (empty($_SESSION['login'])): ?>
            <li><a href="../viewer/signup.php">signup</a></li>
            <?php else: ?>
            <li><a href="../viewer/profil.php">profil</a></li>
            <li><a href="../controller/logout.php">Déconnexion</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>

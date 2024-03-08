<body id="main-page">
<header>
    <a href=".?control=home"><img src="../logo/logoLypso.png" alt="Logo Lypso" class="logo"></a>
    <nav>
        <ul>
            <li><?php echo $_SESSION['user']['firstname'],' ', $_SESSION['user']['lastname']?></li>
            <li><a href="../www/index.php?control=user&action=show">Profil</a></li>
            <li><a href="../www/index.php?control=connexion&action=disconnect">Deconnecter</a></li>
        </ul>
    </nav>
</header>
<section>
    <nav>
        <ul>
            <li><a href="../www/index.php?control=home">Accueil</a></li>
            <?php
            echo '<li><a href="../www/index.php?control=dayOff&action=daysOffIndex&user_id='.$_SESSION['user']['id'].'">Vos congés</a></li>';
            echo '<li><a href="../www/index.php?control=dayOff&action=create">Prendre congés</a></li>';
            echo '<li><a href="../www/index.php?control=user&action=board&user_id='.$_SESSION['user']['id'].'">Tableau de bord</a></li>';
            if (userData_getNameRoleFromId() == 'manager'){
                echo '<br><br>';
                    echo '<li><a href="../www/index.php?control=dayOff&action=managerIndex">Manage</a></li>';
                    echo '<li><a href="../www/index.php?control=dayOff&action=managerUserSummary">Récap Utilisateur</a></li>';

                }
            ?>

        </ul>
    </nav>


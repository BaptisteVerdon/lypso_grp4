<body id="main-page">
<header>
    <a href=".?control=home"><img src="../logo/logoLypso.png" alt="Logo Lypso" class="logo"></a>
    <nav>
        <ul>
            <li><?php echo $_SESSION['user']['lastname'],' ', $_SESSION['user']['firstname']?></li>
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
                if (userData_getNameRoleFromId() == 'employee'){
                    echo '<li><a href="../www/index.php?control=dayOff&action=index&user_id='.$_SESSION['user']['id'].'">Congés</a></li>';
                    echo '<li><a href="../www/index.php?control=dayOff&action=create">Prendre congés</a></li>';
                    echo '<li><a href="../www/index.php?control=user&action=board&user_id='.$_SESSION['user']['id'].'">Tableau de bord</a></li>';
                }
            ?>

        </ul>
    </nav>


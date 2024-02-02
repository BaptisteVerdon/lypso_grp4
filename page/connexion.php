<?php include('template/head.php'); ?>

<body class="bg-dark">
<div id="main-connexion">
    <header><?php echo $titrePage; ?></header>
    <form method="POST" action="index.php?action=connecter">
        <label for="email" >Adresse email</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse mail" value="test@test.com">
        <label for="mdp" >Mot de passe</label>
        <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" value="123456">
        <input type="submit" value="Connexion">
    </form>
    <small><?php echo $alerte; ?></small>
</div>
</body>
</html>

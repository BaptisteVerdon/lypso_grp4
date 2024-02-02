<?php


function connexionControle($action) {
	// Sélecteur d'actions
	switch ($action) {
		case 'connecter' :
			connexionControle_connecterAction();
		break;
        case 'deconnecter' :
            connexionControle_deconnecterAction();
            break;
		default : 
			connexionControle_formAction();
		break;
	}
}


// Voir la notion de paramètres par défaut dans une fonction PHP !
function connexionControle_formAction($message=null) {
    $titreOnglet="M2L-Connexion";
    $titrePage='Se connecter à '.AppConfig::APPLI_NAME;
    $alerte = $message;
	require '../page/connexion.php';
}

function connexionControle_connecterAction() {
	$user = userData_getFromEmail($_POST['email']);
	if (null !== $user && $user['password'] == sha1($_POST['mdp'])){
        $_SESSION['user'] = $user;
        accueilControle_defaultAction();
	}
	else
	{
		connexionControle_formAction("Identifiants inconnus !");
	}
}

function connexionControle_deconnecterAction()
{
    $_SESSION['user'] = null;
    connexionControle_formAction();
}

function connexionControle_userConnecte() :?array
{
    return $_SESSION['user'];
}


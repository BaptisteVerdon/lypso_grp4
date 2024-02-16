<?php


function connexionControl($action) {
	// Sélecteur d'actions
	switch ($action) {
		case 'connecter' :
			connexionControl_connecterAction();
		break;
        case 'disconnect' :
            connexionControl_disconnectAction();
            break;
		default : 
			connexionControl_formAction();
		break;
	}
}


// Voir la notion de paramètres par défaut dans une fonction PHP !
function connexionControl_formAction($message=null) {
    $titreOnglet="Lypso - Connexion";
    $titrePage='Se connecter à '.AppConfig::APPLI_NAME;
    $alerte = $message;
	require '../page/connexion.php';
}

function connexionControl_connecterAction() {
	$user = userData_getFromEmail($_POST['email']);
	if (null !== $user && $user['password'] == sha1($_POST['mdp']) && $user['active'] >= 1){
        $_SESSION['user'] = $user;
        homeControl_defaultAction();
	}
	else
	{
        connexionControl_formAction("Identifiants inconnus !");
	}
}

function connexionControl_disconnectAction()
{
    $_SESSION['user'] = null;
    connexionControl_formAction();
}


function connexionControl_userConnect() :?array

{
    return $_SESSION['user'];
}


<?php

// Penser à mettre un index.php dans www qui redirige vers cet index là !
include('../config/AppConfig.php');
include('../config/DbConfig.php');
include('../kernel/Connexion.php');
include ('../kernel/date_time.php');

//controleurs
include('../controle/connexionControle.php');
include('../controle/accueilControle.php');


//data
include ('../data/userData.php');

session_start();

// Vérifier les paramètres du GET

$controle='';
if (isset($_GET['controle']))
{
    $controle=$_GET['controle'];
}
	
$action='';
if (isset($_GET['action']))
{
    $action=$_GET['action'];
}

/*
 * L'action demandée est envoyée vers le controle associé à la page demandée
 * Cette action est orientée métier : ce que souhaite le client comme fonctionalités, indépendament de la notion de tables!
 */
switch ($controle) {
	case 'accueil' :
        if (null == connexionControle_userConnecte()) {
            connexionControle('');
        }else{
            accueilControle($action);
        }
	break;
	default : // A défaut par sécurité, c'est direct retour à l'authentification
		connexionControle($action);
	break;
}


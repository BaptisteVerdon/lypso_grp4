<?php

// Penser à mettre un validate.php dans www qui redirige vers cet index là !
include('../config/AppConfig.php');
include('../config/DbConfig.php');
include('../kernel/Connexion.php');
include ('../kernel/date_time.php');

//controleurs
include('../control/connexionControl.php');
include('../control/homeControl.php');
include('../control/dayOffControl.php');
include('../control/userControl.php');


//data
include ('../data/userData.php');
include('../data/dayOffData.php');
include ('../data/reasonData.php');
include ('../data/statusData.php');

session_start();

// Vérifier les paramètres du GET

$control='';
if (isset($_GET['control']))
{
    $control=$_GET['control'];
}
	
$action='';
if (isset($_GET['action']))
{
    $action=$_GET['action'];
}

/*
 * L'action demandée est envoyée vers le control associé à la page demandée
 * Cette action est orientée métier : ce que souhaite le client comme fonctionalités, indépendament de la notion de tables!
 */
switch ($control) {
	case 'home' :

        if (null == connexionControl_userConnect()) {
            connexionControl('');
        }else{
            homeControl($action);
        }
	break;
    case 'dayOff' :
        if (null == connexionControl_userConnect()) {
            connexionControl('');
        }else{
            dayOffControl($action);
        }
        break;
    case 'user' :
        if (null == connexionControl_userConnect()) {
            connexionControl('');
        }else{
            userControl($action);
        }
        break;
	default : // A défaut par sécurité, c'est direct retour à l'authentification
		connexionControl($action);
	break;
}


<?php


function homeControl($action) {
	// Sélecteur d'actions pour la page d'authentification. Défini les actions à faire en fonction du click précédent puis la page à afficher ensuite
	switch ($action) {
		default : 
			homeControl_defaultAction();
		break;
	}
}

function homeControl_defaultAction() {
	$titreOnglet="Lypso - Accueil";
    $titrePage="Accueil";
    if (userData_getNameRoleFromId() == 'employee'){
        $daysOff = daysOffData_getValidateFromUserId();
    }
    if (userData_getNameRoleFromId() == 'manager'){
        $daysOff = daysOffData_getValidateFromUserDepartementId();
    }else{
        $daysOff = [];
    }
	require '../page/home.php';
}

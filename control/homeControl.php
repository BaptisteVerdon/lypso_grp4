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
//    if (userData_getNameRoleFromSessionUserId() == 'employee'){
//        $daysOff = daysOffData_getValidateFromUserIdThisMonth();
//    }
    if (userData_getNameRoleFromSessionUserId() == 'manager'){
        $daysOff = daysOffData_getValidateFromUserDepartementIdThisMonth();
    }
    elseif (userData_getNameRoleFromSessionUserId() == 'director'){
        $daysOff = daysOffData_getAllValidateThisMonth();
    }
    else{
        $daysOff = [];
    }
    $daysOffUser = daysOffData_getValidateFromUserIdThisMonth();
	require '../page/home.php';
}

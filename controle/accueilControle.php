<?php


function accueilControle($action) {
	// Sélecteur d'actions pour la page d'authentification. Défini les actions à faire en fonction du click précédent puis la page à afficher ensuite
	switch ($action) {
		default : 
			accueilControle_defaultAction();
		break;
	}
}

function accueilControle_defaultAction() {
	$titreOnglet="Lypso - Accueil";
    $titrePage="Accueil";
	require '../page/accueil.php';
}

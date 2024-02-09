<?php


function userControl($action) {
    // Sélecteur d'actions
    switch ($action) {
        case 'show' :
            userControl_showAction();
            break;
        case 'board' :
            userControl_boardAction($_GET['user_id']);
            break;
        default :
            connexionControl_formAction();
            break;
    }
}

function userControl_showAction(){
    $titreOnglet = "Lypso - Profil";
    $titrePage = "Profil";
    require ('../page/user/show.php');
}

function userControl_boardAction($userId){
    $titreOnglet = "Lypso - Tableau de bord";
    $titrePage = "Tableau de bord";
    $years = dayOffData_getDistinctYearsOnUser();
    $status = statusData_getAll();
    $user_id = $userId;
    require ('../page/user/board.php');
}

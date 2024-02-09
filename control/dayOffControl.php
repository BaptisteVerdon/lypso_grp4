<?php


function dayOffControl($action) {
    switch ($action) {
        case 'create' :
            dayOffControl_createAction();
            break;
        case 'store' :
            dayOffControl_storeAction();
            break;
        case 'index' :
            dayOffControl_indexAction($_GET['user_id']);
            break;
        case 'show' :
            dayOffControl_showAction($_GET['dayOff_id']);
            break;
        case 'delete':
            dayOffControl_deleteAction($_GET['dayOff_id']);
            break;
        case 'deleteConfirm':
            dayOffControl_deleteConfirmAction($_GET['dayOff_id']);
            break;
        case 'askDelete':
            dayOffControl_askDeleteAction($_GET['dayOff_id']);
            break;
        default :
            connexionControl_formAction();
            break;
    }
}

function dayOffControl_createAction(){

    $titreOnglet="Lypso - Accueil";
    $titrePage="Ajouter un congé";
    $reasons = reasonData_getAll();
    require '../page/dayOff/create.php';
}

function dayOffControl_storeAction(){

    $titreOnglet="Lypso - Accueil";
    $titrePage="Accueil";
    $start = $_POST['start'];
    $end = $_POST['end'];
    $reason_id = $_POST['reason_id'];
    $user_id = $_SESSION['user']['id'];

    $dayOff = dayOffData_insert($start,$end,$reason_id,$user_id);

    header('Location:.?control=dayOff&action=show&dayOff_id='.$dayOff['id']);

}

function dayOffControl_showAction($dayOff_id){

    $titreOnglet="Lypso - Congé";
    $titrePage="Congé";
    $dayOff = dayOffData_find($dayOff_id);
    require '../page/dayOff/show.php';
}

function dayOffControl_deleteAction($dayOff_id){

    dayOffData_delete($dayOff_id);
    header('Location:.?control=home');

}

function dayOffControl_indexAction($user_id){
    $titreOnglet="Lypso - Congés";
    $titrePage = "Congés : Tous";
    $status = statusData_getAll();
    if (isset($_POST['status_id'])){
        if ($_POST['status_id'] == 'all'){
            $titrePage = "Congés : Tous";
            $daysOff = dayOffData_getAllFromUserId($user_id);
        }else{
            $titrePage="Congés"." : ".statusData_getFromId($_POST['status_id'])['name'];
            $id = $_POST['status_id'];
            $daysOff = dayOffData_getFromStatusIdAndFromUserId($id,$user_id);
        }
    }else{
        $daysOff = dayOffData_getAllFromUserId($user_id);
    }

    require ('../page/dayOff/index.php');
}

function dayOffControl_deleteConfirmAction($dayOff_id){
    $titreOnglet="Lypso - Supprimer congé";
    $titrePage="Supprimer congé";
    $dayOff = dayOffData_find($dayOff_id);
    require ('../page/dayOff/deleteConfirm.php');
}

function dayOffControl_askDeleteAction($dayOff_id){
    $titreOnglet="Lypso - Accueil";
    $titrePage="Accueil";
    dayOffData_updateStatusAskDelete($dayOff_id);
    $daysOff = daysOffData_getValidateFromUserId();
    require('../page/home.php');
}
<?php


function dayOffControl($action) {
    switch ($action) {
        case 'create' :
            dayOffControl_createAction();
            break;
        case 'store' :
            dayOffControl_storeAction();
            break;
        case 'daysOffIndex' :
            dayOffControl_daysOffIndexAction($_GET['user_id']);
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
        case 'edit':
            dayOffControl_editAction($_GET['dayOff_id']);
            break;
        case 'update':
            dayOffControl_updateAction($_GET['dayOff_id']);
            break;
        case 'askDelete':
            dayOffControl_askDeleteAction($_GET['dayOff_id']);
            break;
        case 'createIsValidate':
            dayOffControl_createIsValidateAction();
            break;
        case 'editIsValidate':
            dayOffControl_editIsValidateAction($_GET['dayOff_id']);
            break;
        case 'managerIndex' :
            dayOffControl_managerIndexAction();
            break;
        case 'managerUserSummary' :
            dayOffControl_managerUserSummaryAction();
            break;
        case 'validateConfirm' :
            dayOffControl_validateConfirmAction($_GET['dayOff_id']);
            break;
        case 'refusal' :
            dayOffControl_refusalAction($_GET['dayOff_id']);
            break;
        case 'directorIndex' :
            dayOffControl_directorIndexAction();
            break;
        case 'directorUserSummary' :
            dayOffControl_directorUserSummaryAction();
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
function dayOffControl_daysOffIndexAction($user_id){
    $titreOnglet="Lypso - Congés";
    $titrePage = "Vos congés : Tous";
    $status = statusData_getAll();
    if (isset($_POST['status_id'])){
        if ($_POST['status_id'] == 'all'){
            $titrePage = "Vos congés : Tous";
            $daysOff = dayOffData_getAllFromUserId($user_id);
        }else{
            $titrePage="Vos congés : ".statusData_getFromId($_POST['status_id'])['name'];
            $id = $_POST['status_id'];
            $daysOff = dayOffData_getFromStatusIdAndFromUserId($id,$user_id);
        }
    }else{
        $daysOff = dayOffData_getAllFromUserId($user_id);
    }

    require ('../page/dayOff/daysOffIndex.php');
}

function dayOffControl_showAction($dayOff_id){

    $titreOnglet="Lypso - Congé";
    $titrePage="Congé";
    $dayOff = dayOffData_getFromId($dayOff_id);
    require '../page/dayOff/show.php';
}

function dayOffControl_deleteAction($dayOff_id){

    dayOffData_delete($dayOff_id);
    header('Location:.?control=home');

}
function dayOffControl_deleteConfirmAction($dayOff_id){
    $titreOnglet="Lypso - Supprimer congé";
    $titrePage="Supprimer congé";
    $dayOff = dayOffData_getFromId($dayOff_id);
    require ('../page/dayOff/deleteConfirm.php');
}

function dayOffControl_editAction($dayOff_id)
{
    $titreOnglet="Lypso - Modifier";
    $titrePage="Modifier le congé";
    $reasons = reasonData_getAll();
    $dayOff = dayOffData_getFromId($dayOff_id);
    require '../page/dayOff/edit.php';
}

function dayOffControl_updateAction($dayOff_id)
{
    $dayOff = dayOffData_getFromId($dayOff_id);
    $start = $_POST['start'];
    $end = $_POST['end'];
    $reason_id = $_POST['reason_id'];
    $user_id = $_SESSION['user']['id'];

    dayOffData_update($dayOff_id, $start, $end, $reason_id, $user_id);

    header('Location:.?control=dayOff&action=show&dayOff_id='.$dayOff['id']);
}
function dayOffControl_askDeleteAction($dayOff_id){
    dayOffData_updateStatusAskDelete($dayOff_id);
    header('Location:.?control=home');

}

function dayOffControl_createIsValidateAction(){
    $start = $_POST['start'];
    $end = $_POST['end'];
    if ($end > $start and $start != '' and $end != ''){
        $titreOnglet="Lypso - Valider";
        $titrePage="Valider un congé";
        $temp = 0;
        $reason_id = $_POST['reason_id'];
        $reason = reasonData_getFromId($reason_id);
    }else{
        $titreOnglet="Lypso - Prendre";
        $titrePage="Prendre un congé";
        $start = '';
        $end = '';
        $reasons = reasonData_getAll();
    }
    require('../page/dayOff/create.php');
}
function dayOffControl_editIsValidateAction($dayOff_id){
    $start = $_POST['start'];
    $end = $_POST['end'];
    $reason_id = $_POST['reason_id'];
    if ($end > $start and $start != '' and $end != ''){
        $titreOnglet="Lypso - Valider modification";
        $titrePage="Valider la modification";
        $temp = 0;
        $reason = reasonData_getFromId($reason_id);
    }else
    {
        $dayOff = dayOffData_getFromId($dayOff_id);
        $titreOnglet="Lypso - Prendre";
        $titrePage="Prendre un congé";
        $start = $_POST['start'];
        $end = $_POST['end'];
        $reason_id = $_POST['reason_id'];
        $reasons = reasonData_getAll();
    }
    require('../page/dayOff/edit.php');
}
function dayOffControl_managerIndexAction(){
    $titreOnglet="Lypso - Validation congés";
    $titrePage = "Congés des employés : Tous";
    $status = statusData_getAll();
    $chosenStatusId = "all";
    if (isset($_POST['status_id'])){
        if ($_POST['status_id'] == 'all'){
            $titrePage = "Congés : Tous";
            $daysOff = dayOffData_getAll();
        }else{
            $titrePage="Congés : ".statusData_getFromId($_POST['status_id'])['name'];
            $chosenStatusId = $_POST['status_id'];
            $daysOff = dayOffData_getAll();
        }
    }else{
        $daysOff = dayOffData_getAll();
    }

    require ('../page/dayOff/managerIndex.php');
}
function dayOffControl_managerUserSummaryAction(){
    $titreOnglet="Lypso - Recap";
    $titrePage = "Utilisateurs de votre département : Tous";
    $users = userData_getAllFromDepartementId($_SESSION['user']['departement_id']);
    $chosenUserId = "all";
    if (isset($_POST['user_id'])){
        if ($_POST['user_id'] == 'all'){
            $titrePage = "Utilisateurs de votre département : Tous";
            $daysOff = dayOffData_getAll();
        }else{
            $titrePage="Utilisateur de votre département : ".userData_getNamesFromId($_POST['user_id'])['lastname']." ".userData_getNamesFromId($_POST['user_id'])['firstname'];
            $chosenUserId = $_POST['user_id'];
            $daysOff = dayOffData_getAll();
        }
    }else{
        $daysOff = dayOffData_getAll();
    }


    require ('../page/dayOff/managerUserSummary.php');
}
function dayOffControl_validateConfirmAction($dayOff_id)
{
    $dayOff = dayOffData_getFromId($dayOff_id);
    $status = statusData_getFromId($dayOff['status_id']);
    if($status['name'] == "Demande de suppression"){
        $newStatus = statusData_getFromName("Annulé");
    }elseif ($status['name'] == "En attente"){
        $newStatus = statusData_getFromName("Validé");
    }
    dayOffData_updateStatus($dayOff_id,$newStatus['id']);

    header('Location:.?control=dayOff&action=show&dayOff_id='.$dayOff['id']);
}
function dayOffControl_refusalAction($dayOff_id)
{
    $dayOff = dayOffData_getFromId($dayOff_id);
    $status = statusData_getFromId($dayOff['status_id']);
    if($status['name'] == "Demande de suppression"){
        $newStatus = statusData_getFromName("En attente");
    }elseif ($status['name'] == "En attente"){
        $newStatus = statusData_getFromName("Refusé");
    }
    dayOffData_updateStatus($dayOff_id,$newStatus['id']);

    header('Location:.?control=dayOff&action=show&dayOff_id='.$dayOff['id']);

}
function dayOffControl_directorIndexAction()
{
    $titreOnglet="Lypso - Validation congés";
    $titrePage = "Congés des managers et directeurs : Tous";
    $status = statusData_getAll();
    $chosenStatusId = "all";
    if (isset($_POST['status_id'])){
        if ($_POST['status_id'] == 'all'){
            $titrePage = "Congés des managers et directeurs : Tous";
            $daysOff = dayOffData_getAll();
        }else{
            $titrePage="Congés des managers et directeurs : ".statusData_getFromId($_POST['status_id'])['name'];
            $chosenStatusId = $_POST['status_id'];
            $daysOff = dayOffData_getAll();
        }
    }else{
        $daysOff = dayOffData_getAll();
    }
    require ('../page/dayOff/directorIndex.php');
}
function dayOffControl_directorUserSummaryAction()
{
    $titreOnglet="Lypso - Recap";
    $titrePage = "Utilisateurs de l'entreprise : Tous";
    $users = userData_getAll();
    $chosenUserId = "all";
    if (isset($_POST['user_id'])){
        if ($_POST['user_id'] == 'all'){
            $titrePage = "Utilisateurs de l'entreprise : Tous";
            $daysOff = dayOffData_getAll();
        }else{
            $titrePage="Utilisateur de l'entreprise : ".userData_getNamesFromId($_POST['user_id'])['lastname']." ".userData_getNamesFromId($_POST['user_id'])['firstname'];
            $chosenUserId = $_POST['user_id'];
            $daysOff = dayOffData_getAll();
        }
    }else{
        $daysOff = dayOffData_getAll();
    }


    require ('../page/dayOff/directorUserSummary.php');
}

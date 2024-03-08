<?php

function userData_getFromEmail(string $email) :?array
{
    $requete = 'SELECT * FROM user WHERE email = :email';

    $liste = Connexion::query($requete,['email'=> $email]);

    if(isset($liste[0])){
        return $liste[0];
    }else{
        return null;
    }
}

function userData_getNameRoleFromId()
{
    $requete = 'SELECT role.name FROM user JOIN role ON user.role_id = role.id WHERE user.id =:user_id';

    $liste = Connexion::query($requete,['user_id'=> $_SESSION['user']['id']]);

    return $liste[0]['name'];
}

function userData_getNameDepartementFromId()
{
    $requete = 'SELECT departement.name FROM user JOIN departement ON user.departement_id = departement.id WHERE user.id =:user_id';

    $liste = Connexion::query($requete,['user_id'=> $_SESSION['user']['id']]);

    return $liste[0]['name'];
}

function userData_getIdDepartementFromId($id)
{
    $requete = 'SELECT departement_id FROM user WHERE user.id =:id';

    $liste = Connexion::query($requete,['id'=> $id]);

    return $liste;
}

function userData_getAllFromId($user_id)
{
    $requete = 'SELECT * FROM user WHERE id =:id';

    $liste = Connexion::query($requete,['id'=> $user_id]);

    if(isset($liste[0])){
        return $liste[0];
    }else{
        return null;
    }
}

function userData_getAllFromDepartementId($departement_id)
{
    $requete = 'SELECT * FROM user WHERE departement_id =:departement_id';

    $liste = Connexion::query($requete,['departement_id'=> $departement_id]);
    return $liste;
}

function userData_getNamesFromId($user_id)
{
    $requete = 'SELECT lastname, firstname FROM user WHERE user.id =:user_id';

    $liste = Connexion::query($requete,['user_id'=> $user_id]);

    return $liste[0];
}
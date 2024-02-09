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

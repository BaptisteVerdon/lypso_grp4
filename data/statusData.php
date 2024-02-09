<?php

function statusData_getFromId($id)
{
    $requete = 'SELECT * FROM status WHERE id =:id';

    $liste = Connexion::query($requete,['id'=> $id]);

    return $liste[0];
}

function statusData_getAll(){
    $requete = 'SELECT * FROM status ORDER BY id';

    return $liste = Connexion::query($requete);
}
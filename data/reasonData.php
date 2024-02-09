<?php

function reasonData_getFromId($id)
{
    $requete = 'SELECT * FROM reason WHERE id =:id';

    $liste = Connexion::query($requete,['id'=> $id]);

    return $liste[0];
}

function reasonData_getAll()
{
    $requete = 'SELECT * FROM reason ORDER BY name';

    $liste = Connexion::query($requete);

    return $liste;
}
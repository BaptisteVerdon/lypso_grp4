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

function userData_getAll():?array{

    $requete='SELECT * FROM user ORDER BY id';

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    return $liste=Connexion::query($requete);


}

function userData_insert($email,$password,$role, $ligue_id):?array
{
    $requete='INSERT INTO user(email,password,role,ligue_id)
        VALUES (:email,:password,:role,:ligue_id)';
    return Connexion::query($requete,['email'=>$email,'password'=>$password, 'role'=>$role, 'ligue_id'=>$ligue_id]);
}

function userData_find($id):?array
{
    #1
    // $liste : liste mixte (classique + associative) de type [numéro de la ligne]['champ de la table']
    // $requete  : string
    #2
    // Mettre la requête dans une variable : aide au debug
    $requete='SELECT * FROM user WHERE id=:id';

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    $liste=Connexion::query($requete,['id'=>$id]);

    #3
    if(isset($liste[0])){
        return $liste[0];
    }else{
        return null;
    }
}

function userData_update($user_id,$email,$password,$role, $ligue_id):array{

    $requete = 'UPDATE user
        SET email=:email, password=:password, role=:role, ligue_id=:ligue_id
        WHERE id=:id';

    return Connexion::query($requete,['id'=>$user_id,'email'=>$email,'password'=>$password,'role'=>$role, 'ligue_id'=>$ligue_id]);

}


function userData_getRoles():?array{

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    return ['Administrateur','Ligue'];


}
function userData_delete($user_id):bool{

    $requete='DELETE FROM user WHERE id=:id';

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    return Connexion::exec($requete,['id'=>$user_id]);
}

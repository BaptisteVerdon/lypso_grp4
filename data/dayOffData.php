<?php

function dayOffData_getFromStatusIdAndFromUserId($status_id,$user_id){
    $requete = 'SELECT * FROM dayOff WHERE status_id=:status_id AND user_id=:user_id';

    return $liste = Connexion::query($requete,['status_id'=>$status_id,'user_id'=>$user_id]);
}
function daysOffData_getValidateFromUserId()
{
    $requete = 'SELECT dayOff.id, dayOff.start, dayOff.end, dayOff.reason_id, dayOff.status_id FROM dayOff JOIN user ON dayOff.user_id = user.id WHERE user_id =:user_id AND status_id = 1 AND NOW() < start ORDER BY start;';

    $liste = Connexion::query($requete,['user_id'=> $_SESSION['user']['id']]);

    return $liste;
}

function dayOffData_insert($start,$end,$reason_id,$user_id):?array
{
    $requete = 'INSERT INTO dayOff(start,end,reason_id,user_id)
        VALUES (:start,:end,:reason_id,:user_id)';
    $return = Connexion::exec($requete, ['start' => $start, 'end' => $end, 'reason_id' => $reason_id, 'user_id' => $user_id]);

    if($return){
        $requete = 'SELECT * FROM dayOff ORDER BY id DESC LIMIT 0,1';
        $liste = Connexion::query($requete);
        if(isset($liste[0])){
            return $liste[0];
        }else{
            return null;
        }
    }else{
        return null;
    }
}

function dayOffData_getFromId($dayOff_id)
{
    $requete = 'SELECT * FROM dayOff WHERE id=:dayOff_id';

    $liste = Connexion::query($requete,['dayOff_id'=> $dayOff_id]);

    return $liste[0];
}

function dayOffData_updateStatusAskDelete($dayOff_id){

    $requete = 'UPDATE dayOff SET status_id=5 WHERE user_id =:user_id and id =:dayOff_id';

    $return = Connexion::exec($requete,['dayOff_id' => $dayOff_id, 'user_id' => $_SESSION['user']['id']]);
}

function dayOffData_delete($dayOff_id):bool{

    $requete='DELETE FROM dayOff WHERE id=:id';

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    return Connexion::exec($requete,['id'=>$dayOff_id]);
}

function dayOffData_getAllFromUserId($user_id):?array{

    $requete='SELECT * FROM dayOff WHERE user_id =:user_id ORDER BY start';

    // Execute la requete sur la base m2l grâce à la méthode query() prévu dans la classe Connexion
    return $liste=Connexion::query($requete,['user_id'=>$user_id]);
}

function dayOffData_getDistinctYearsOnUser()
{
    $requete = 'SELECT DISTINCT YEAR(start) AS year FROM dayOff WHERE user_id =:user_id; ';

    $liste = Connexion::query($requete,['user_id'=> $_SESSION['user']['id']]);

    return $liste;
}

function dayOffData_countStatuFromYear($status,$year,$user_id){
    $requete = 'SELECT COUNT(*) FROM dayOff JOIN status ON dayOff.status_id = status.id WHERE year(start) =:year AND user_id =:user_id AND status.name =:status; ';

    $liste = Connexion::query($requete,['user_id'=>$user_id, 'year'=>$year, 'status'=>$status]);

    return $liste[0]['COUNT(*)'];
}

function dayOffData_countStatu($status,$user_id){
    $requete = 'SELECT COUNT(*) FROM dayOff JOIN status ON dayOff.status_id = status.id WHERE user_id =:user_id AND status.name =:status; ';

    $liste = Connexion::query($requete,['user_id'=>$user_id, 'status'=>$status]);

    return $liste[0]['COUNT(*)'];
}

function dayOffData_countAllStatuFromYear($year,$user_id){
    $requete = 'SELECT COUNT(*) FROM dayOff JOIN status ON dayOff.status_id = status.id WHERE year(start) =:year AND user_id =:user_id ';

    $liste = Connexion::query($requete,['user_id'=>$user_id, 'year'=>$year]);

    return $liste[0]['COUNT(*)'];
}

function dayOffData_countAll($user_id){
    $requete = 'SELECT COUNT(*) FROM dayOff JOIN status ON dayOff.status_id = status.id WHERE user_id =:user_id ';

    $liste = Connexion::query($requete,['user_id'=>$user_id]);

    return $liste[0]['COUNT(*)'];
}

function dayOffData_update($dayOff_id,$start,$end,$reasons,$user_id):array
{
    $requete = 'UPDATE dayOff
        SET start=:start, end=:end,reason_id=:reasons,user_id=:user_id
        WHERE id=:id';
    Connexion::exec($requete,['id'=>$dayOff_id,'start'=>$start,'end'=>$end,'reasons'=>$reasons,'user_id'=>$user_id]);
    return dayOffData_getFromId($dayOff_id);

}

function dayOffData_updateStatus($dayOff_id,$status_id):array
{
    $requete = 'UPDATE dayOff
        SET status_id=:status_id
        WHERE id=:id';
    Connexion::exec($requete,['id'=>$dayOff_id,'status_id'=>$status_id]);
    return dayOffData_getFromId($dayOff_id);

}

function dayOffData_getAll()
{
    $requete = 'SELECT * FROM dayOff';
    $liste = Connexion::query($requete);
    return $liste;
}

function daysOffData_getValidateFromUserDepartementId(){
//    $requete = 'SELECT * FROM dayOff
//                JOIN user ON dayOff.user_id = user.id
//                WHERE status_id=:status_id
//                AND user.departement_id=:departement_id';
//
//    $liste = Connexion::query($requete,['status_id'=>$status_id, 'departement_id'=>$departement_id]);
//    var_dump($liste); exit;

    $requete = 'SELECT *
                FROM dayOff
                JOIN user ON dayOff.user_id = user.id
                WHERE user.departement_id=:departement_id
                AND status_id = 1
                AND NOW() < start ORDER BY start;';

    $liste = Connexion::query($requete,['departement_id'=> $_SESSION['user']['departement_id']]);
    return $liste;
}
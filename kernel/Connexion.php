<?php

/*
 * Deux fonctions sont crées pour lancer une requéte SQL. Un exmple d'appel de ces fonctions dans du code :
 *  - $tableauDeResultats = Connexion::query("SELECT * FROM nom_table");
 *    Le résultat de la requète est enregistré dans la variable $tableauDeResultats 
 *  - $succes = Connexion::exec("INSERT..."); marche aussi pour UPDATE et DELETE
 *    Le résultat de la requete est placé dans la variable $succes : si 0 alors la requète n'a pas
 *    fonctionnée, sinon $succes contiendra le nombre d'enregistrement affectés
 */

class Connexion {


    private static $_pdo = null;

    private function __construct() {
    }
    private static function _get() {;
        if(null==self::$_pdo) {
            $dsn = 'mysql:dbname=' . DbConfig::BDD_NAME . ';host=' . DbConfig::BDD_HOST;
            $user = DbConfig::BDD_USER;
            $password = DbConfig::BDD_PASSWORD;
            try {
                self::$_pdo = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
            self::$_pdo->exec('SET NAMES \'utf8\'');
        }
        return self::$_pdo;
    }


    public function prepare($query){
        return self::_get()->prepare($query);
    }


    public static function query($query,$params=[]) {
        $statement = self::_get()->prepare($query);
        $statement->execute($params);
        if(!$statement){
            throw new Exception('Erreur de requête : '.$query);
        }
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function exec($query,$params=[]) {
        $statement = self::_get()->prepare($query);
        return $statement->execute($params);

    }

}


<?php
include('../config/DbConfig.php');
include('../kernel/Connexion.php');
include('../data/reservationData.php');

Connexion::exec('truncate reservation');

$date = date('Y-m-d');
$nbJoursAvant = 180;
$nbJoursApres = 180;
$nbReservations = 20000;
$salles = ['Amphithéatre','Daum','Corbin','Baccarat','Longwy','Multimédia','Lamour','Grüber','Majorelle','Galerie','Salle informatique','Salle de restauration','Hall d\'accueil'];
$nbSalles = count($salles);
$ligues = ['Escrime','Handball','Échecs','Aéromodélisme','Aéronautique','Aérostation','Aïkido','ASPTT','Badminton','Ball trap',''];
$nbLigues = count($ligues);
for($i=0;$i<$nbReservations;$i++){
    $newDate = date('Y-m-d',strtotime($date)-random_int(-$nbJoursAvant,$nbJoursApres)*3600*24);
    $heureDebut = random_int(9,19).':'.random_int(1,5)*10;
    $heureFin =date('H:i', strtotime($heureDebut)+600*random_int(3,6));
    reservationData_insert($newDate,$heureDebut,$heureFin,$salles[random_int(0,$nbSalles-1)],$ligues[random_int(0,$nbLigues-1)]);
}

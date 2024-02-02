<?php

/**
 * retourne une date au format français pour l'affichage
 * @param string $dateUs
 * @return string
 */
function dateUs2fr(string $dateUs) : string

{
    $dateFr = '';
    $anneeMoisJour = explode('-', $dateUs);
    $dateFr = $anneeMoisJour[2].'/'.$anneeMoisJour[1].'/'.$anneeMoisJour[0];
    return  $dateFr;
}

/**
 * retourne une heure au format françcais
 * @param string $timeUs
 * @return string
 */

function timeUs2Fr(string $timeUs) : string
{
    $timeFr = '';
    $heuresMinutes = explode(':', $timeUs);
    $timeFr = $heuresMinutes[0].'h'.$heuresMinutes[1];
    return $timeFr;
}
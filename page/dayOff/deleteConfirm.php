<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
    <article>
        <header><?php echo $titrePage;?></header>
        <br>
        Date Début : <?= dateUs2Fr($dayOff['start'])?> <br>
        Date Fin : <?= dateUs2Fr($dayOff['end'])?> <br>
        Raison : <?= reasonData_getFromId($dayOff['reason_id'])['name']?> <br>
        Etat : <?= statusData_getFromId($dayOff['status_id'])['name']?> <br>
        <br>
        <hr>
        <br>
        <button style="background-color: silver" onclick="window.location.href = '.?control=home'">Accueil</button>
        <button style="background-color: #d94a4a" onclick="window.location.href = '.?control=dayOff&action=askDelete&dayOff_id=<?= $dayOff['id']?>'">Demande de Suppression</button>
    </article>
<?php
include ('../page/template/footer.php');
?>
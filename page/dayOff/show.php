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
        <button style="background-color: #37c210" onclick="window.location.href = '.?control=home'">Accueil</button>
        <!--        <button style="background-color: gray" onclick="window.location.href = '.?control=dayOff&action=delete&dayOff_id=<?= $dayOff['id']?>'">Modifier</button>-->
<!--        TODO changer le lien pour la modif quans fonctionnalité sera prête-->
    </article>
<?php
include ('../page/template/footer.php');
?>
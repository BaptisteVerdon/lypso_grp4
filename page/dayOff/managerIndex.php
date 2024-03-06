<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header><br>

    <form method="POST" action=".?control=dayOff&action=managerIndex&user_id=<?= $_SESSION['user']['id'] ?>">
        <label>
            Veuillez sélectionner un statut de congé :
        </label>
        <select name="status_id" id="status_id-selector" onchange="console.log(this)">
            <option value="all">Tous</option>
            <?php
            foreach ($status as $statu){
//                echo'<option value="'.$statu[0]['id'].'">'.$statu[0]['name'].'</option>';
                //TODO choisir entre tous les status possible pour manager v ou seulement certains ^
                echo'<option value="'.$statu['id'].'">'.$statu['name'].'</option>';
            }
            ?>
        </select>
        <button>Recherche </button>
    </form>
    <br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Raison</th>
            <th>Statut</th>
            <th>Validation</th>
            <th>Refus</th>
<!--PAS DE MODIF POSSIBLE CAR UNIQUEMENT POSSIBLE PAR EMPLOYE LUI MEME-->
            <th></th>
        </tr>
        </thead>
        <?php
        foreach($daysOff as $dayOff){
            if(userData_getIdDepartementFromId($dayOff['user_id'])==userData_getIdDepartementFromId($_SESSION['user']['id']) AND $chosenStatusId == "all" ){
                echo '<tr>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['lastname'].'</td>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['firstname'].'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
                echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
                echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
                if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente' or statusData_getFromId($dayOff['status_id'])['name'] == 'Demande de suppression'){
                    echo '<td class="text-center">'.'<a href=".?control=dayOff&action=validateConfirm&dayOff_id='.$dayOff['id'].'">Valider</a>'.'</td>';
                    echo '<td class="text-center">'.'<a href=".?control=dayOff&action=refusal&dayOff_id='.$dayOff['id'].'">Refus</a>'.'</td>';
                }
                echo '</tr>';
            }
            elseif(userData_getIdDepartementFromId($dayOff['user_id'])==userData_getIdDepartementFromId($_SESSION['user']['id']) AND  $dayOff['status_id'] == $chosenStatusId){
                echo '<tr>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['lastname'].'</td>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['firstname'].'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
                echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
                echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
                if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente' or statusData_getFromId($dayOff['status_id'])['name'] == 'Demande de suppression'){
                    echo '<td class="text-center">'.'<a href=".?control=dayOff&action=validateConfirm&dayOff_id='.$dayOff['id'].'">Valider</a>'.'</td>';
                    echo '<td class="text-center">'.'<a href=".?control=dayOff&action=refusal&dayOff_id='.$dayOff['id'].'">Refus</a>'.'</td>';
                }
                echo '</tr>';
            }

        }
        ?>
    </table>
</article>
<?php
include('../page/template/footer.php');
?>
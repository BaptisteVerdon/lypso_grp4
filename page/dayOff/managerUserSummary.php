<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header><br>

    <form method="POST" action=".?control=dayOff&action=managerUserSummary">
        <label>
            Veuillez sélectionner un utilisateur de votre département :
        </label>
        <select name="user_id" id="user_id-selector" onchange="console.log(this)">
            <option value="all">Tous</option>
            <?php
            foreach ($users as $user){
                echo'<option value="'.$user['id'].'">'.$user['firstname'].'</option>';
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
            <th></th>
        </tr>
        </thead>
        <?php
        foreach($daysOff as $dayOff){
            if(userData_getIdDepartementFromId($dayOff['user_id'])==userData_getIdDepartementFromId($_SESSION['user']['id']) AND $chosenUserId == "all" ){
                echo '<tr>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['lastname'].'</td>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['firstname'].'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
                echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
                echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
                if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente' or statusData_getFromId($dayOff['status_id'])['name'] == 'Demande de suppression'){
                    if (! ($dayOff['user_id']==$_SESSION['user']['id'])){
                        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=validateConfirm&dayOff_id='.$dayOff['id'].'">Valider</a>'.'</td>';
                        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=refusal&dayOff_id='.$dayOff['id'].'">Refus</a>'.'</td>';
                    }
                }
                echo '</tr>';
            }
            elseif($dayOff['user_id'] == $chosenUserId){
                echo '<tr>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['lastname'].'</td>';
                echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['firstname'].'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
                echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
                echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
                if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente' or statusData_getFromId($dayOff['status_id'])['name'] == 'Demande de suppression'){
                    if (! ($dayOff['user_id']==$_SESSION['user']['id'])){
                        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=validateConfirm&dayOff_id='.$dayOff['id'].'">Valider</a>'.'</td>';
                        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=refusal&dayOff_id='.$dayOff['id'].'">Refus</a>'.'</td>';
                    }
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
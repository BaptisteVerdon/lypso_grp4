<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header><br>

    <form method="POST" action=".?control=dayOff&action=employeeIndex&user_id=<?= $user_id ?>">
        <label>
            Veuillez sélectionner un statut de congé :
        </label>
        <select name="status_id" id="status_id-selector" onchange="console.log(this)">
            <option value="all">Tous</option>
            <?php
            foreach ($status as $statu){
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
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Raison</th>
            <th>Statut</th>
            <th></th>
        </tr>
        </thead>
        <?php
        foreach($daysOff as $dayOff){
            echo '<tr>';
            echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
            echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
            echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
            echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
            if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente' or statusData_getFromId($dayOff['status_id'])['name'] == 'Validé'){
                echo '<td class="text-center">'.'<a href=".?control=dayOff&action=deleteConfirm&dayOff_id='.$dayOff['id'].'">Annulation</a>'.'</td>';
            }
            if (statusData_getFromId($dayOff['status_id'])['name'] == 'En attente'){
                echo '<td class="text-center">'.'<a href=".?control=dayOff&action=edit&dayOff_id='.$dayOff['id'].'">Modifier</a>'.'</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</article>
<?php
include('../page/template/footer.php');
?>
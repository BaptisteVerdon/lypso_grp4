<table class="table table-bordered">
    <thead>
    <tr>
        <?php
        if (userData_getNameRoleFromId() == 'manager'){
            echo '<th>Nom</th>';
            echo '<th>Prénom</th>';
        }
        ?>
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
        if (userData_getNameRoleFromId() == 'manager'){
            echo '<td class="text-center">'.userData_getAllFromId($dayOff['id'])['lastname'].'</td>';
            echo '<td class="text-center">'.userData_getAllFromId($dayOff['id'])['firstname'].'</td>';
        }
        echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
        echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
        echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
        echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=deleteConfirm&dayOff_id='.$dayOff['id'].'">Annulation</a>'.'</td>';
        echo '</tr>';
    }
    ?>
</table>
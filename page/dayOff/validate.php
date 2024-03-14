<table class="table table-bordered">
    <thead>
    <tr>
        <?php
        if (userData_getNameRoleFromSessionUserId() == 'manager' or userData_getNameRoleFromSessionUserId() == 'director' ){
            echo '<th>Nom</th>';
            echo '<th>Prénom</th>';
        }
        if (userData_getNameRoleFromSessionUserId() == 'director'){
            echo '<th>Rôle</th>';
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
        if (userData_getNameRoleFromSessionUserId() == 'manager' or userData_getNameRoleFromSessionUserId() == 'director'){
            echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['lastname'].'</td>';
            echo '<td class="text-center">'.userData_getAllFromId($dayOff['user_id'])['firstname'].'</td>';
        }
        if (userData_getNameRoleFromSessionUserId() == 'director'){
            if (userData_getNameRoleFromUserId($dayOff['user_id']) == 'director' ){
                echo '<td class="text-center">Directeur</td>';
            }elseif (userData_getNameRoleFromUserId($dayOff['user_id']) == 'manager' ){
                echo '<td class="text-center">Manager</td>';
            }elseif (userData_getNameRoleFromUserId($dayOff['user_id']) == 'employee' ){
                echo '<td class="text-center">Employé</td>';
            }
        }
        echo '<td class="text-center">'.dateUs2fr($dayOff['start']).'</td>';
        echo '<td class="text-center">'.dateUs2fr($dayOff['end']).'</td>';
        echo '<td class="text-center">'.reasonData_getFromId($dayOff['reason_id'])['name'].'</td>';
        echo '<td class="text-center">'.statusData_getFromId($dayOff['status_id'])['name'].'</td>';
        if (userData_getNameRoleFromSessionUserId() == 'employee'){
            echo '<td class="text-center">'.'<a href=".?control=dayOff&action=deleteConfirm&dayOff_id='.$dayOff['id'].'">Annulation</a>'.'</td>';
        }
        echo '</tr>';
    }
    ?>
</table>
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
        echo '<td class="text-center">'.'<a href=".?control=dayOff&action=deleteConfirm&dayOff_id='.$dayOff['id'].'">Annulation</a>'.'</td>';
        echo '</tr>';
    }
    ?>
</table>
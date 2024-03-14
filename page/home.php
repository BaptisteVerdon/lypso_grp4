<?php
include('template/head.php');
include('template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header>
    <div>
        <?php
        if (userData_getNameRoleFromSessionUserId() == 'manager' or (userData_getNameRoleFromSessionUserId() == 'director')){
            if (userData_getNameRoleFromSessionUserId() == 'manager'){
                echo '<h2>Congés validés à venir du mois en cours dans votre département </h2>';
            }
            if (userData_getNameRoleFromSessionUserId() == 'director'){
                echo "<h2>Congés validés à venir  du mois en cours dans l'entreprise</h2>";
            }

            echo '<table class="table table-bordered">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Nom</th>';
                    echo '<th>Prénom</th>';
                    if (userData_getNameRoleFromSessionUserId() == 'director'){
                        echo '<th>Rôle</th>';
                    }
                    echo '<th>Date Début</th>';
                    echo '<th>Date Fin</th>';
                    echo '<th>Raison</th>';
                    echo '<th>Statut</th>';
                echo '<th></th>';
                echo '</tr>';
            echo '</thead>';

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
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
        <br>
        <br>
        <br>

        <h2>Vos congés validés à venir du mois en cours</h2>
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
            foreach($daysOffUser as $dayOffuser){
                echo '<tr>';
                echo '<td class="text-center">'.dateUs2fr($dayOffuser['start']).'</td>';
                echo '<td class="text-center">'.dateUs2fr($dayOffuser['end']).'</td>';
                echo '<td class="text-center">'.reasonData_getFromId($dayOffuser['reason_id'])['name'].'</td>';
                echo '<td class="text-center">'.statusData_getFromId($dayOffuser['status_id'])['name'].'</td>';
                echo '</tr>';
            }
            ?>
        </table>

    </div>
</article>
<?php
include('template/footer.php');
?>

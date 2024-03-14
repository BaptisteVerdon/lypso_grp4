<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>

<article>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Années</th>
            <?php
            foreach ($status as $statu){
                echo '<td class="text-center"><strong>'.$statu['name'].'</strong></td>';
            }
            ?>
            <td class="text-center"><strong><h1>Total</h1></strong></td>
        </tr>
        </thead>
        <?php
        foreach($years as $year){
            echo '<tr>';
            echo '<td class="text-center">'.$year['year'].'</td>';
            foreach ($status as $statu){
                echo '<td class="text-center">'. dayOffData_countStatusFromYear($statu['name'],$year['year'],$user_id).'</td>';
            }
            echo '<td class="text-center"><strong>'.dayOffData_countAllStatusFromYear($year['year'],$user_id).'</strong></td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td class="text-center"><strong><h1>Total</h1></strong></td>
            <?php
            foreach ($status as $statu){
                echo'<td class="text-center"><strong><h1>'.dayOffData_countStatus($statu['name'],$user_id).'</strong></h1></td>';
            }
            echo '<td class="text-center"><strong><h1>'.dayOffData_countAll($user_id).'</strong></h1></td>';
            ?>

        </tr>
    </table>
</article>

<?php
include ('../page/template/footer.php');
?>
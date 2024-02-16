<?php
    if(isset($dayOff)){
        echo '<form method="POST" action=".?control=dayOff&action=update&dayOff_id='.$dayOff['id'].'">';
    }else{
        echo '<form method="POST" action=".?control=dayOff&action=store">';
    }
?>
<article>
    <form method="POST" action=".?control=dayOff&action=store">
        <br>
        Date Début : <input type="date" name="start" autocomplete="off" value="<?= $dayOff['start']?>">
        <br>
        Date Fin : <input type="date" name="end" value="<?= $dayOff['end']?>">
        <br>
        <?php
        echo 'Raison : ';
        echo '<select name="reason_id" >';
        foreach ($reasons as $reason){
            if (isset($reasons) && $dayOff['reason_id'] == $reason['id']){
                echo '<option value="' . $reason['id'] . '" selected>' . $reason['name'] . '</option>';
            }else
            {
                echo '<option value="' . $reason['id'] . '">' . $reason['name'] . '</option>';
            }

        }
        echo '</select><br>';
        ?>
        <br>
        <input type="submit" value="Demander">
    </form>
</article>

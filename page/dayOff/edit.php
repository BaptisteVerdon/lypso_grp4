<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?></header>
     <?php
        if(isset($temp)){
            echo '<form method="POST" action=".?control=dayOff&action=update&dayOff_id='.$dayOff_id.'">';
        }else
        {
            echo '<form method="POST" action=".?control=dayOff&action=editIsValidate&dayOff_id=' . $dayOff['id'] . '">';
        }
        ?>
        <br>
        Date Début : <input type="date" name="start" autocomplete="off" value="<?= $dayOff['start'] ?? $start ?>"<?php if(isset($temp)) {echo'readonly="readonly"';} ?>>
        <br>
        Date Fin : <input type="date" name="end" value="<?= $dayOff['end'] ?? $end ?>"<?php if(isset($temp)) {echo'readonly="readonly"';} ?>>
        <br>
        <?php
        echo 'Raison : ';
        echo '<select name="reason_id" >';
        if (isset($temp))
        {
            echo '<option value="' . $reason['id'] . '" selected>' . $reason['name'] . '</option>';
        }else {
            foreach ($reasons as $reason) {
                echo '<option value="' . $reason['id'] . '" selected>' . $reason['name'] . '</option>';
            }
        }
        echo '</select><br><br>';
        if (isset($temp)){
            echo '<input type="submit" value="Valider">';
        }else{
            echo '<input type="submit" value="Demander">';
        }
        ?>
        </form>
</article>
<?php
include('../page/template/footer.php');
?>

<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
<article>
    <?php
    if(isset($temp)){
        echo '<form method="POST" action=".?control=dayOff&action=store">';
    }else{
        echo '<form method="POST" action=".?control=dayOff&action=createIsValidate">';
    }
    ?>
        <header><?php echo $titrePage;?></header>
        <br>
        Date Début : <input type="date" name="start" autocomplete="off" value="<?= $start ?? ''?>" <?php if(isset($temp)) {echo'readonly="readonly"';} ?>>
        <br>
        Date Fin : <input type="date" name="end" value="<?= $end ?? ''?>" <?php if(isset($temp)) {echo'readonly="readonly"';} ?>>
        <br>
        <?php
            echo 'Raison : ';
            echo '<select name="reason_id">';

            if (isset($temp)){
                echo '<option value="' . $reason['id'] . '"selected>' . $reason['name'] . '</option>';
            }

            foreach ($reasons as $reason){
                echo '<option value="' . $reason['id'] . '">' . $reason['name'] . '</option>';
            }
            echo '</select><br>';
        echo '<br>';
        if (isset($temp)){
            echo '<input type="submit" value="Valider">';
        }else{
            echo '<input type="submit" value="Demander">';
        }

        ?>
    </form>
</article>

<?php
include ('../page/template/footer.php');
?>
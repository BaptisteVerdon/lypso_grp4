<?php
include('../page/template/head.php');
include('../page/template/menu.php');

?>
<article>
    <form method="POST" action=".?control=dayOff&action=store">
        <header><?php echo $titrePage;?></header>
        <br>
        Date Début : <input type="date" name="start" autocomplete="off">
        <br>
        Date Fin : <input type="date" name="end">
        <br>
        <?php
            echo 'Raison : ';
            echo '<select name="reason_id">';
            foreach ($reasons as $reason){
                echo '<option value="' . $reason['id'] . '">' . $reason['name'] . '</option>';
            }
            echo '</select><br>';
        ?>
        <br>
        <input type="submit" value="Demander">
    </form>
</article>

<?php
include ('../page/template/footer.php');
?>
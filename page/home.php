<?php
include('template/head.php');
include('template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header>
    <div>
        <?php
        echo '<h2>'.'Congés validés à venir'.'</h2>';
        include('dayOff/validate.php');
        ?>


    </div>
</article>
<?php
include('template/footer.php');
?>

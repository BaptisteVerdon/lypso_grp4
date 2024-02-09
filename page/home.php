<?php
include('template/head.php');
include('template/menu.php');
?>
<article>
    <header><?php echo $titrePage;?> </header>
    <div>
        <?php
            if (userData_getNameRoleFromId() == 'employee'){
                echo '<h2>'.'Congés validés à venir'.'</h2>';
                if ($daysOff == 'null'){
                    include('dayOff/daysOffEmpty');
                }else{
                    include('dayOff/validate.php');
                }
            }
        ?>
    </div>
</article>
<?php
include('template/footer.php');
?>

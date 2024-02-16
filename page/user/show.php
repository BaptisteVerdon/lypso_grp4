<?php
include('../page/template/head.php');
include('../page/template/menu.php');
?>
    <article>
        <header><?php echo $titrePage;?></header>
        <br>
        Prénom : <?= $_SESSION['user']['firstname']?> <br>
        Nom : <?= $_SESSION['user']['lastname']?> <br>
        Email : <?= $_SESSION['user']['email']?> <br>
        Département : <?= userData_getNameDepartementFromId()?> <br>
        <?php
        if (userData_getNameRoleFromId() == 'employee'){
            echo 'Employé';
        }
        if (userData_getNameRoleFromId() == 'admin'){
            echo 'Administrateur';
        }
        if (userData_getNameRoleFromId() == 'manager'){
            echo 'Manager';
        }else{
            echo ' ';
        }
        ?>
        <br>
        <hr>
        <br>
    </article>
<?php
include ('../page/template/footer.php');
?>
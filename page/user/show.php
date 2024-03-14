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

        <?php
        if ( ! (userData_getNameRoleFromSessionUserId() == 'admin' )){
            if ( ! (userData_getNameRoleFromSessionUserId() == 'director' )){
                echo 'Département : '.userData_getNameDepartementFromId($_SESSION['user']['id']);
            }
        }
        echo '<br>';
        echo 'Rôle : ';
        if (userData_getNameRoleFromSessionUserId() == 'employee'){
            echo 'Employé';
        }
        if (userData_getNameRoleFromSessionUserId() == 'admin'){
            echo 'Administrateur';
        }
        if (userData_getNameRoleFromSessionUserId() == 'manager'){
            echo 'Manager';
        }
        if (userData_getNameRoleFromSessionUserId() == 'director'){
            echo 'Directeur';
        }
        ?>
        <br>
        <hr>
        <br>
    </article>
<?php
include ('../page/template/footer.php');
?>
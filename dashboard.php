<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>

    </head>
    <body>
        <a href="dashboard.php?f=deslogar">deslogar</a>
        <?php
            session_start();
            if(isset($_GET['f'])){

                session_unset();
                session_destroy();
                var_dump($_SESSION);
                header('location: index.php');
            }

        ?>
    </body>
</html>
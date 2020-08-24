<?php
session_start();

require_once 'class/AutoLoad.php';

$user =  new User();
$user->readLogin();
$user->logout('index.php');


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="css/panel.css">


    </head>
    <body>
        <div id="container">
            <div id="menu-lateral">
                <?php include 'dashboard/panel-dashboard.php' ?>
            </div>

            <section id="content">
                    <?php
                        if(isset($_GET['r']) && $_GET['r'] == 'perfil'){
                            include 'dashboard/form-perfil.php';
                        }
                        if(isset($_GET['r']) && $_GET['r'] == 'add-cliente'){
                            include 'dashboard/form-add.php';
                        }
                        if(isset($_GET['r']) && $_GET['r'] == 'consulta'){
                            include 'dashboard/form-consult.php';
                        }
                    ?>

            </section>

        </div>
        <script src="js/script.js"></script>
    </body>
</html>







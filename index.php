<?php
    require_once 'class/AutoLoad.php';
    session_start();

    if(isset($_SESSION['id'])){
        header('location: dashboard.php');
    }

?>

<!DOCTYPE html>
    <head>
        <title>Crud - Estagiando</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script></script>
    </head>
    <body>
        <div id="container">
            <section id="login-panel">
                <h1 id="logo"><span></span>Estagiando</h1>

                <?php if(isset($_GET['r']) && $_GET['r'] == 'register'){
                     include 'dashboard/form-register.php';

                }else{
                    include 'dashboard/form-login.php';

                }
                ?>
            </section>
        </div>
    </body>
</html>
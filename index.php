<?php
    session_start();

    if(isset($_SESSION['id'])){
        header('location: user-panel.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
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
                     include 'form/form-register.php';

                }else{
                    include 'form/form-login.php';

                }
                ?>
            </section>
        </div>
    </body>
</html>
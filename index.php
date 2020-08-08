<?php
    session_start();

    if(isset($_SESSION['login']) && isset($_SESSION['password'])){
        header('location: dashboard.php');
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
                <form action="controller/login.php" method="POST">
                    <div id="input-group">
                        <input type="email" placeholder="Email Address" id="login-email" name="login-email">
                        <input type="password" placeholder="Password" name="login-password">
                        <div id="button-group">
                            <a href="" class="b-red-b">Register</a>
                            <button name="submit" class="b-red">Sign in</button>
                        </div>
                    </div><br>
                    <p><?php  if(isset($_SESSION['error']['login'])){
                            foreach ($_SESSION['error']['login'] as $value){
                                echo "{$value}"."<br>";
                            }
                            unset($_SESSION['error']);
                        } ?> </p>

                    </form>
            </section>
        </div>
    </body>
</html>
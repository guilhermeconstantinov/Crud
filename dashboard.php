<?php
    session_start();
    require_once 'class/UserDao.php';
    require_once 'class/CustomersDao.php';
    require_once 'class/User.php';


    if(!isset($_SESSION['id'])){
        header('location: index.php');
    }else{
        $userDao = new UserDao();
        $user = $userDao->readUser($_SESSION['id']);


    }


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
                <?php include 'panel-dashboard.php'?>
            </div>

            <section id="content">
                    <?php

                        if(isset($_GET['f'])){
                            switch ($_GET['f']){
                                case 'add_acesso':
                                    if($user->getAdmin()){
                                        include 'form/form-add.php';
                                    }else{
                                        header('location: dashboard.php');
                                    }

                                    break;
                                case 'consultar':
                                    include 'form/form-consult.php';
                                    break;
                                case 'perfil':
                                    include 'form/form-perfil.php';
                                    break;
                                case 'deslogar':
                                    session_unset();
                                    session_destroy();
                                    header('location: index.php');
                                    break;
                            }
                        }
                    ?>

            </section>

        </div>
<!--
        <script>
            var btn =  document.getElementById('btn-resp');
            var menu = document.getElementById('menu');
            var JWidth = window.innerWidth;
            window.addEventListener('resize',()=>{
                JWidth = window.innerWidth;

                if(JWidth>800){
                    menu.style.display = "block";
                }else{
                    menu.style.display = "none";
                }
            });

            btn.addEventListener('click',()=>{

                if(menu.style.display == 'block'){
                    menu.style.display = "none";

                }else{
                    menu.style.display = "block";


                }
            });
        </script>-->
    </body>
</html>







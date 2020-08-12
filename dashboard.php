<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">

    </head>
    <body>
        <div id="container">
            <section id="panel-dashboard">
                <header>
                    <h1 id="logo"><span></span>Estagiando</h1>
                    <div id="avatar"></div>
                    <div id="group-header">
                        <p>Guilherme Viola Constantinov</p>
                        <p>Admin</p>
                        <button id="btn-resp"></button>
                    </div>
                </header>

                <nav id="menu">
                    <ul>
                        <li id="btn-add"><a href="dashboard.php?f=add_acesso">Adicionar acesso</a></li>
                        <li><span class="profile-icon"></span><a href="dashboard.php?f=perfil">Meu Perfil</a></li>
                        <li><span class="consult-icon"></span><a href="dashboard.php?f=consultar">Consultar acesso</a></li>
                        <li><span class="logout-icon"></span><a href="dashboard.php?f=deslogar">Deslogar</a></li>

                    </ul>
                </nav>
            </section>

            <section id="content">
                    <?php
                        if(isset($_GET['f'])){
                            switch ($_GET['f']){
                                case 'add_acesso':
                                    include 'form/form-add.php';
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
                <p></p>
            </section>

        </div>
        <script>
            var btn =  document.getElementById('btn-resp');
            var menu = document.getElementById('menu');
            var JWidth = window.innerWidth;
            window.addEventListener('resize',()=>{
                JWidth = window.innerWidth;

                if(JWidth>600){
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
        </script>
    </body>
</html>







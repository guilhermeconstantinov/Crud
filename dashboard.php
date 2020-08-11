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
                    <p>Guilherme Viola Constantinov</p>
                    <p>Admin</p>
                    <button id="btn-resp"></button>
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
                <p>teste</p>
            </section>

        </div>
        <script>
            var btn =  document.getElementById('btn-resp');
            var menu = document.getElementById('menu');

            window.addEventListener('resize',()=>{
                var JWidth = window.innerWidth;

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




<!--<a href="dashboard.php?f=deslogar">deslogar</a>

session_start();
if(isset($_GET['f'])){

   session_unset();
  session_destroy();
    var_dump($_SESSION);
    #header('location: index.php');
}


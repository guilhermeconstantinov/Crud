<?php
    session_start();

    require_once '../class/UserDao.php';
    require_once '../class/CustomersDao.php';
    require_once '../class/User.php';

    $user =  new UserDao();

    if(isset($_GET['f']) && $_GET['f'] == 'deslogar'){
        $user->logout();

    }
    if(!isset($_SESSION['id'])){
        header('location: ../index.php');
    }else{
        $userDao = new UserDao();
        $user = $userDao->readUser($_SESSION['id']);


    }

?>
<section id="panel-dashboard">
    <header>
        <h1 id="logo"><span></span>Estagiando</h1>
        <div id="avatar"></div>
        <div id="group-header">
            <p><?php echo $user->getName();?></p>
            <p><?php echo (!$user->getAdmin())?"Comum":"Admin";?></p>
            <button class="btn-resp"></button>

        </div>
    </header>

    <nav id="menu">
        <ul>
            <li id="btn-add"><a href="form-add.php">Adicionar acesso</a></li>
            <li><span class="profile-icon"></span><a href="form-perfil.php">Meu Perfil</a></li>
            <li><span class="consult-icon"></span><a href="form-consult.php">Consultar acesso</a></li>
            <li><span class="logout-icon"></span><a href="?f=deslogar">Deslogar</a></li>


        </ul>
    </nav>
</section>
<script>
    var btn =  document.querySelector("#group-header button");
    var menu = document.querySelector("#menu");
    btn.addEventListener('click', e=>{
       if(menu.style.display == 'block'){
           menu.style.display = 'none';
       }else{
           menu.style.display = 'block';
       }
    });
    window.onresize = function(){
        var w = window.outerWidth;
        if(w < 780){
            menu.style.display = 'none';
        }else{
            menu.style.display = 'block'
        }
    }
</script>
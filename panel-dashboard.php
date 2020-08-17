
<section id="panel-dashboard">
    <header>
        <h1 id="logo"><span></span>Estagiando</h1>
        <div id="avatar"></div>
        <div id="group-header">
            <p>Guilherme<?php /*echo $user->getName();*/?></p>
            <p>Admin<?php /*echo (!$user->getAdmin())?"Comum":"Admin";*/?></p>

        </div>
    </header>

    <nav id="menu">
        <ul>
            <?php $basename =  basename(__DIR__);
                if($basename == "form"){
                    $dirname = '../form/';
                }else{
                    $dirname = 'form/';
                }
            ?>
            <li id="btn-add"><a href="<?php echo $dirname;?>form-add.php">Adicionar acesso</a></li>
            <li><span class="profile-icon"></span><a href="<?php echo $dirname;?>form/form-perfil.php">Meu Perfil</a></li>
            <li><span class="consult-icon"></span><a href="<?php echo $dirname;?>form/form-consult.php">Consultar acesso</a></li>
            <li><span class="logout-icon"></span><a href="dashboard.php?f=deslogar">Deslogar</a></li>


        </ul>
    </nav>
</section>
<script src="js/script.js"></script>
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
            <li id="btn-add"><a href="?r=add-cliente">Adicionar acesso</a></li>
            <li><span class="profile-icon"></span><a href="?r=perfil">Meu Perfil</a></li>
            <li><span class="consult-icon"></span><a href="?r=consulta">Consultar acesso</a></li>
            <li><span class="logout-icon"></span><a href="?f=deslogar">Deslogar</a></li>


        </ul>
    </nav>
</section>
<script>

</script>
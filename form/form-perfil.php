<?php


?>

<section class="form-group">
    <h1>Informações do seu perfil</h1>

    <form action="controller/user-panel.php" method="post">
        <label>Nome de usuário</label>
        <input type="text" name="login-name" placeholder="Nome de usuário" value="<?php echo $user->getName();?>">
        <label>E-mail</label>
        <input type="email" name="login-email" placeholder="E-mail" value="<?php echo $user->getLogin();?>">
        <hr>
        <h2>Configurações de senhas</h2>
        <p>Caso haja necessidade de alteração de senha</p>
        <input type="password" placeholder="Digite a senha atual" name="login-senha"><br>
        <input type="password" placeholder="Nova senha" name="login-confirma">
        <div class="btn-group btn-right">
            <button name="submit-profile" class="btn-default btn-save">Salvar alterações</button>
        </div>
        <p style="text-align:center">
            <?php
                if(isset($_SESSION['error']['profile'])){
                    foreach ($_SESSION['error']['profile'] as $value){
                        echo $value."<br>";
                    }
                    unset($_SESSION['error']);
                }else if(isset($_SESSION['profile'])){
                    echo $_SESSION['profile'];
                    unset($_SESSION['profile']);
                }

            ?>
        </p>



</section>

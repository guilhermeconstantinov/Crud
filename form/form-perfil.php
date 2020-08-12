<section class="form-group">
    <h1>Informações do seu perfil</h1>

    <form>
        <label>Nome de usuário</label>
        <input type="text" name="login-name" value="<?php echo $date[0]['nome'];?>">
        <label>E-mail</label>
        <input type="email" name="login-email" value="<?php echo $date[0]['login'];?>">
        <hr>
        <h2>Configurações de senhas</h2>
        <p>Caso haja necessidade de alteração de senha</p>
        <input type="password" placeholder="Digite a senha antiga" name="login-senha"><br>
        <input type="password" placeholder="Nova senha" name="login-confirm">
        <div class="btn-group btn-right">
            <button class="btn-default btn-save">Salvar alterações</button>
        </div>
    </form>

</section>

 <form action="controller/user_op.php" method="POST">

    <div id="input-group">

        <input type="text" name="register-name" placeholder="Nome completo" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" id="register-name"  required>
        <input type="email" placeholder="Endereço de e-mail" id="register-email" name="register-email" required>
        <input name="register-password" placeholder="Senha" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" type="password" required>
        <input type="password" placeholder="Confirmar senha" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" name="register-confirm" required>
        <div class="button-group space-b">
            <a class="b-red-b" href="index.php">Voltar</a>
            <button class="b-red" name="submit-register">Cadastrar</button>

        </div>
    </div><br>
    <p>
        <?php
        echo (isset($_SESSION['register'])) ? $_SESSION['register'] : '';
        unset($_SESSION['register']); ?>

        ?>
    </p>

</form>


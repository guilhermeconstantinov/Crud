 <form action="controller/register.php" method="POST">

    <div id="input-group">

        <input type="text" placeholder="Nome completo" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" id="register-name" name="register-name" required>
        <input type="email" placeholder="Endereço de e-mail" id="register-email" name="register-email" required>
        <input name="register-password" placeholder="Senha" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" type="password" required>
        <input type="password" placeholder="Confirmar senha" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" name="register-confirm" required>
        <div class="button-group right">
            <button class="b-red" name="submit">Cadastrar</button>

        </div>
    </div><br>
    <p> <?php  if(isset($_SESSION['error']['register'])){
            echo $_SESSION['error']['register'];
            unset($_SESSION['error']);
        } ?></p>

</form>


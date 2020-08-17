
<form action="controller/login.php" method="POST">
    <div id="input-group">
        <input type="email" placeholder="Endereço de e-mail" id="login-email" name="login-email" required>
        <input type="password" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" placeholder="Senha" name="login-password" required>
        <div class="button-group space-b">
            <a href="index.php?r=register" class="b-red-b">Cadastrar</a>
            <button name="submit" class="b-red">Entrar</button>
        </div>
    </div><br>
    <p>
        <?php  if(isset($_SESSION['error']['login'])){
            echo $_SESSION['error']['login'];
            unset($_SESSION['error']);
        } ?> </p>

</form>




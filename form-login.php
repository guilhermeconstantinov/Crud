
<form action="controller/login.php" method="POST">
    <div id="input-group">
        <input type="email" placeholder="Endereço de e-mail" id="login-email" name="login-email">
        <input type="password" placeholder="Senha" name="login-password">
        <div class="button-group space-b">
            <a href="index.php?r=register" class="b-red-b">Cadastrar</a>
            <button name="submit" class="b-red">Entrar</button>
        </div>
    </div><br>
    <p>
        <?php  if(isset($_SESSION['error']['login'])){
            foreach ($_SESSION['error']['login'] as $value){
                echo "{$value}"."<br>";
            }
            unset($_SESSION['error']);
        } ?> </p>

</form>

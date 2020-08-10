 <form action="controller/register.php" method="POST">

    <div id="input-group">

        <input type="text" placeholder="Nome completo" id="register-name" name="register-name">
        <input type="email" placeholder="Endereço de e-mail" id="register-email" name="register-email">
        <input name="register-password" placeholder="Senha" type="password">
        <input type="password" placeholder="Confirmar senha" name="register-confirm">
        <div class="button-group right">
            <button class="b-red" name="submit">Cadastrar</button>

        </div>
    </div><br>
    <p> <?php  if(isset($_SESSION['error']['register'])){
            foreach ($_SESSION['error']['register'] as $value){
                echo "{$value}"."<br>";
            }
            unset($_SESSION['error']);
        } ?></p>

</form>


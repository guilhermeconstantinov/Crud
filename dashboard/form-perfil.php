        <section class="form-group">
            <h1>Informações do seu perfil</h1>

            <form action="controller/user_op.php" method="post">
                <label>Nome de usuário</label>
                <input type="text" name="login-name"  pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" placeholder="Nome de usuário" value="<?php echo $user->getName();?>" required>
                <label>E-mail</label>
                <input type="email" name="login-email" placeholder="E-mail" value="<?php echo $user->getEmail();?>" required>
                <hr>

                <p>Caso haja necessidade de alteração de senha</p>
                <input type="password" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" placeholder="Digite a senha atual" name="login-password"><br>
                <input type="password" pattern="[a-zA-Z0-9\u00C0-\u017F]{0,}" title="Senha somente letras e números" placeholder="Nova senha" name="login-confirm">
                <div class="btn-group btn-right">
                    <button name="submit-update" value="submit" class="btn-default btn-save">Salvar alterações</button>
                </div>
            </form>
                <p style="text-align:center">
                        <?php echo (isset($_SESSION['profile']))? $_SESSION['profile']: '';
                        unset($_SESSION['profile']);?>
                </p>
            </section>












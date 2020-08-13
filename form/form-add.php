<section class="form-group">
    <h1>Adicionar novo acesso</h1>

    <form  action="controller/user-panel.php" method="post">
        <div class="row">
            <label class="col col-12">Nome Completo
                <input type="text" name="register-name" pattern="[a-zA-Z\u00C0-\u00FF\s]" title="Nome" placeholder="Digite seu nome e sobrenome" value="">
            </label>
        </div>
        <div class="row">
            <label class="col ">CPF
                <input type="text" name="register-cpf" pattern="(\d{3})\.?(\d{3})\.?(\d{3})-?(\d{2})" title="CPF deve conter esse formato 000.000.000-00" placeholder="000.000.000-00"  value="">
            </label>
            <label class=" col ">CNH
                <input type="text" name="register-cnh" placeholder="Nº de Registro"  value="">
            </label>
            <label class="">Tipo
                <select>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                </select>
            </label>
        </div>
        <div class="row">
            <label class="col ">Telefone
                <input type="text" name="register-tel" placeholder="+55 (DD) 00000-0000"  value="">
            </label>

            <label class="col">Cidade
                <input type="text" name="register-cidade" placeholder="Em qual cidade você mora?"  value="">
            </label>
            <label class="">Estado

                <select>
                    <option>SP</option>
                    <option>RJ</option>
                    <option>PR</option>

                </select>
            </label>
        </div>
        <div class="row">
            <label class="col col-6">Rua
                <input type="text" name="register-rua" placeholder="Nome da rua/av"  value="">
            </label>
            <label class="col col-1">Nº
                <input type="text" name="register-no" placeholder="Nº"  value="">
            </label>
            <label class="col">Bairro
                <input type="text" name="register-uf" placeholder="Bairro..."  value="">
            </label>
        </div>

        <h2>Dados da empresa</h2>

        <div class="row">
            <label class="col col-12">Nome da empresa
                <input type="text" name="company-name" placeholder="Nome da empresa">
            </label>
        </div>
        <div class="row">
            <label class="col col-12">Nome Fantasia
                <input type="text" name="company-name" placeholder="Nome fantansia da empresa">
            </label>
        </div>
        <div class="btn-group btn-right">
            <button name="submit-customers" class="btn-default btn-save">Salvar alterações</button>
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
<?php if(!$user->getAdmin()): header('location: dashboard.php'); endif;?>
<section class="form-group">

    <h1>Adicionar novo acesso</h1>
    <form id="form-cadastro" action="controller/customers_op.php" method="post">
        <h2>Dados do usuário</h2>

        <div class="row">
            <label class="col col-12">Nome Completo
                <input type="text" name="register-nome" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" placeholder="Nome e sobrenome" value="" required>
            </label>
        </div>
        <div class="row">
            <label class="col ">CPF
                <input type="text" class="cpf" name="register-cpf" pattern="(\d{3})\.?(\d{3})\.?(\d{3})-?(\d{2})" title="CPF deve conter esse formato 000.000.000-00"  placeholder="000.000.000-00" required>
            </label>
            <label class="col ">CNH
                <input type="text" name="register-cnh" pattern="^[0-9]{11}$" title="CNH deve conter 11 digitos" placeholder="Nº de Registro (11 digitos)" required>
            </label>
            <label class="">Tipo
                <select name="register-tipo">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </label>
        </div>
        <div class="row">
            <label class="col ">Telefone
                <input type="text" name="register-tel" pattern="(\()(\d{2})(\))\s(\d{4,5})-(\d{4})" title="Telefone deve ser no seguinte formato (DD) 00000-0000" placeholder="(DD) 00000-0000"  value=""required>
            </label>

            <label class="col">Cidade
                        <input type="text" name="register-cidade" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite somente letras [a-z]" placeholder="Em qual cidade você mora?"  value="" required>
            </label>
            <label class="col col-1">Estado

                <input type="text" name="register-estado" placeholder="UF" pattern="[a-zA-Z]{2}" title="Sigla do seu Estado deve conter 2 letras ex 'SP' " required>
            </label>
        </div>
        <div class="row">
            <label class="col col-6">Rua
                <input type="text" name="register-rua" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Nome da rua/av"  value="" required>
            </label>
            <label class="col col-1">Nº
                <input type="text" name="register-num" pattern="\d{0,}" title="Nº digite somente números" name="register-no" placeholder="Nº"  value="">
            </label>
            <label class="col">Bairro
                <input type="text" name="register-bairro" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" name="register-uf" placeholder="Bairro..."  value="" required>
            </label>
        </div>
        <h2>Dados do veículo</h2>
        <div class="row">
            <label class="col col-4">Marca
                <input type="text" name="register-marca" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Fabricante do veículo"  value="" required>
            </label>
            <label class="col col-4">Modelo
                <input type="text" name="register-modelo" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Modelo do veículo"  value="" required>
            </label>
            <label class="col col-1">Ano
                <input type="text" name="register-ano" pattern="^[0-9]{4}$" title="Ano do carro apenas números ex: 2018" placeholder="Ano"  value="" required>
            </label>
                </div>
        <div class="row">
            <label class="col col-2">Cor
                <input type="text" name="register-cor" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras" placeholder="Cor do veiculo"  value="" required>
            </label>
            <label class="col col-2">Placa
                <input type="text" name="register-placa" pattern="^([a-zA-Z0-9]{7}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Placa do veículo"  value="" required>
            </label>

        </div>
        <hr>
        <h2>Dados da empresa</h2>
        <div class="row">
            <label class="col">CNPJ
                <input  type="text" id="cnpj" name="company-cnpj" onchange="FormData(this.value)" pattern="(\d{3})\.(\d{3})\.(\d{3})\/(\d{4})-(\d{2})" title="CNPJ formato 000.000.000/0000-00"  placeholder="000.000.000/0000-00" value="" required>
            </label>
        </div>
        <div class="row">
            <label class="col col-12">Nome da empresa
                <input type="text" id="company-nome" name="company-nome" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite o nome completo da empresa contendo letras e números" placeholder="Nome da empresa" required>
            </label>
        </div>
        <div class="row">
            <label class="col col-12">Nome Fantasia
                <input type="text" id="company-nomef" name="company-nomef"   pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite o nome fantasia da empresa contendo letras e números" placeholder="Nome fantansia da empresa" required>
            </label>
        </div>
        <div class="row">
            <label class="col col-12">Responsável
                <input type="text" id="company-resp" name="company-resp"   pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite o nome fantasia da empresa contendo letras e números" placeholder="Nome fantansia da empresa" required>
            </label>
        </div>

        <div class="row">
            <label class="col ">Telefone
                <input type="text" id="company-tel" name="company-tel" pattern="(\()(\d{2})(\))\s(\d{4,5})-(\d{4})" title="Telefone deve ser no seguinte formato (DD) 00000-0000" placeholder="(DD) 00000-0000"  value="" required>
            </label>
            <label class="col">Cidade
                <input type="text" id="company-cidade" name="company-cidade" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite somente letras [a-z]" placeholder="Em qual cidade você mora?"  value="" required>
            </label>
            <label class="col col-1">Estado
                 <input type="text" id="company-estado" name="company-estado"  placeholder="UF" pattern="[a-zA-Z]{2}" title="Sigla do seu Estado deve conter 2 letras ex 'SP' " required>
            </label>
        </div>
        <div class="row">
            <label class="col col-6">Rua
                <input type="text" id="company-rua" name="company-rua" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Nome da rua/av"  value="" required>
            </label>
            <label class="col col-1">Nº
                <input type="text" id="company-no" name="company-no" pattern="\d{0,}" title="Nº digite somente números" name="company-register-no" placeholder="Nº"  value="" required>
            </label>
            <label class="col">Bairro
                <input type="text" id="company-bairro" name="company-bairro"pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" name="company-uf" placeholder="Bairro..."  value="" required>
            </label>
        </div>

        <div class="btn-group btn-right">
            <button name="submit-customers" class="btn-default btn-save">Salvar alterações</button>
        </div>

    </form>
    <p style="text-align:center">
        <?php echo (isset($_SESSION['register-company']))? $_SESSION['register-company']: '';
        unset($_SESSION['register-company']);?>
    </p>


    </section>
</section>









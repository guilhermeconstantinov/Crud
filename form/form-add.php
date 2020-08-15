<script>

            function cnpj(str){

                var http = new XMLHttpRequest();
                http.responseType = "json";
                http.onreadystatechange = function(){
                    if(this.readyState === 4 && this.status === 200){

                        var result = this.response[0];
                        document.getElementById('company-name').value = result['nome_emp'];

                    }
                }
                http.open("POST", "controller/user-panel.php", true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send("company-cnpj="+str);

            }

</script>
<section class="form-group">

    <h1>Adicionar novo acesso</h1>
    <form  id="form-cadastro" action="controller/user-panel.php" method="post">
        <div class="row">
            <label class="col col-12">Nome Completo
                <input type="text" name="register-name" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" placeholder="Nome e sobrenome" value="" required>
            </label>
        </div>
        <div class="row">
            <label class="col ">CPF
                <input type="text" class="cpf" name="register-cpf" pattern="(\d{3})\.?(\d{3})\.?(\d{3})-?(\d{2})" title="CPF deve conter esse formato 000.000.000-00"  placeholder="000.000.000-00">
            </label>
            <label class=" col ">CNH
                <input type="text" name="register-cnh" pattern="^[0-9]{11}$" title="CNH deve conter 11 digitos" placeholder="Nº de Registro" >
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
                <input type="text" name="register-tel" pattern="(\()(\d{2})(\))\s(\d{4,5})-(\d{4})" title="Telefone deve ser no seguinte formato (DD) 00000-0000" placeholder="(DD) 00000-0000"  value="">
            </label>

            <label class="col">Cidade
                <input type="text" name="register-cidade" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite somente letras [a-z]" placeholder="Em qual cidade você mora?"  value="">
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
                <input type="text" name="register-rua" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Nome da rua/av"  value="">
            </label>
            <label class="col col-1">Nº
                <input type="text" pattern="\d{0,}" title="Nº digite somente números" name="register-no" placeholder="Nº"  value="">
            </label>
            <label class="col">Bairro
                <input type="text" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" name="register-uf" placeholder="Bairro..."  value="">
            </label>
        </div>

        <h2>Dados da empresa</h2>

        <div class="row">
            <label class="col col-12">Nome da empresa
                <input type="text" id="company-name" name="company-name" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite o nome completo da empresa contendo letras e números" placeholder="Nome da empresa">
            </label>
        </div>
        <div class="row">
            <label class="col col-12">Nome Fantasia
                <input type="text" name="company-namef" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite o nome fantasia da empresa contendo letras e números" placeholder="Nome fantansia da empresa">
            </label>
        </div>
        <div class="row">
            <label class="col">CNPJ
                <input  type="text" id="cnpj" name="company-cnpj" pattern="(\d{3})\.?(\d{3})\.?(\d{3})\/?(\d{4})-?(\d{2})" title="CNPJ formato 000.000.000/0000-00"  placeholder="000.000.000/0000-00" value="">
            </label>
        </div>
        <div class="row">
            <label class="col">teste
                <input  type="text" id="cnpj" name="company-cnpj" onchange="cnpj(this.value)"  placeholder="000.000.000/0000-00" value="">
            </label>
        </div>
        <div class="row">
            <label class="col ">Telefone
                <input type="text" name="company-tel" pattern="(\()(\d{2})(\))\s(\d{4,5})-(\d{4})" title="Telefone deve ser no seguinte formato (DD) 00000-0000" placeholder="(DD) 00000-0000"  value="">
            </label>

            <label class="col">Cidade
                <input type="text" name="company-cidade" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite somente letras [a-z]" placeholder="Em qual cidade você mora?"  value="">
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
                <input type="text" name="company-rua" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Nome da rua/av"  value="">
            </label>
            <label class="col col-1">Nº
                <input type="text" pattern="\d{0,}" title="Nº digite somente números" name="company-register-no" placeholder="Nº"  value="">
            </label>
            <label class="col">Bairro
                <input type="text" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" name="company-uf" placeholder="Bairro..."  value="">
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
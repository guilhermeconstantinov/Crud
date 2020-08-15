<?php

?>
<script>

    window.onload = function () {
        const form = document.getElementById('form-cnpj').addEventListener('submit',e=>{
            e.preventDefault();

            str = document.getElementById('company-cpf');
            var http = new XMLHttpRequest();
            http.responseType = "json";
            http.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){

                    var result = this.response[0];
                    var ta = document.getElementById('tab-result');
                    console.log(result);

                }
            };
            http.open("POST", "controller/user-panel.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.send("company-cpf="+str.value);
        });
    }


</script>
    <section class="form-group">

        <h1>Selecione uma empresa ou cadastre uma nova</h1>
        <form id="form-cnpj" action="" method="post">

            <div class="row">
                <label class="col col-12">Consulte pelo CNPJ da empresa
                    <input type="text" id="company-cpf" name="company-cnpj" pattern="(\d{3})\.(\d{3})\.(\d{3})\/(\d{4})-(\d{2})" title="Permitido somente letras e espaços" placeholder="Busque pelo CPNJ da empresa" value="" required>

                </label>
            </div>
            <div class="row">
                <div class="btn-group btn-right">
                    <button id="btn-consult" name="buscar" value="buscar" class="btn-default btn-save">Procurar</button>

                </div>
            </div>
        </form>
    </section>

    <table>
        <thead id="tab-result">
            <tr>
                <th>#</th>
                <th>Nome da empresa</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Qtd usuários</th>
            </tr>
        </thead>
    </table>

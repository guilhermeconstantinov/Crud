<?php


if(isset($_GET['consulta-placa'])){
    $customers =  new Customers();
    $resultado = $customers->readCustomers($_GET['consulta-placa'])[0];

    if($resultado) {
        echo "<table>" .
            "<tr>" .
            "<th>Nome do usuário</th>" .
            "<th>CPF</th>" .
            "<th>Placa do carro</th>".
            "<th>Modelo</th>" .
            "<th>Empresa</th>" .
            "<th>Ações</th>" .
            "</tr>" .
            "<tr>" .
            "<td>{$resultado['nome_c']}</td>" .
            "<td>{$resultado['cpf_c']}</td>" .
            "<td>{$resultado['placa']}</td>" .
            "<td>{$resultado['modelo']}</td>" .
            "<td>{$resultado['nome_emp']}</td>" .
            "<td class='td-flex'>";
        if ($user->getAdmin()) {

            echo "<a class='btn-default btn-edit' href='?id={$resultado['id_c']}&consulta-placa={$_GET['consulta-placa']}&f=update'><a class='btn-default btn-visu' href='?id={$resultado['id_c']}&consulta-placa={$_GET['consulta-placa']}&f=ver'><a class='btn-default btn-del' href='?id={$resultado['id_c']}&consulta-placa={$_GET['consulta-placa']}&f=del'>";

        } else {

            echo "<a class='btn-default btn-visu' href='?id={$resultado['id_c']}&consulta-placa={$_GET['consulta-placa']}&f=ver'>";

        }

        echo "</td></tr>" .
            "</table>";


    }else{
        echo "<p style='text-align: center'>Não foi possivel acessar os dados dessa placa, tente outra</p>";
    }
    unset($_GET['buscar-consulta']);



    if($resultado && isset($_GET['f']) && $_GET['f'] == "update"){
        echo "<section class=\"form-group form-group-100\">".


            "<form id=\"form-cadastro\" action=\"../controller/user-panel.php\" method=\"post\">".
                "<h2>Dados do usuário</h2>".

                "<div class=\"row\">".
                    "<label class=\"col col-12\">Nome Completo".
                        "<input type=\"text\" name=\"register-nome\" pattern=\"^([a-zA-Z\\u00C0-\\u017F']{0,}(\\s?)){0,}$\" title=\"Permitido somente letras e espaços\" placeholder=\"Nome e sobrenome\" value=\"{$resultado['nome_c']}\" required>".
                    "</label>".
                "</div>".
                "<div class=\"row\">".
                    "<label class=\"col \">CPF".
                        "<input type=\"text\" class=\"cpf\" name=\"register-cpf\" pattern=\"(\\d{3})\\.?(\\d{3})\\.?(\\d{3})-?(\\d{2})\" title=\"CPF deve conter esse formato 000.000.000-00\"  placeholder=\"000.000.000-00\" value=\"{$resultado['cpf_c']}\" required>".
                    "</label>".
                    "<label class=\"col \">CNH".
                        "<input type=\"text\" name=\"register-cnh\" pattern=\"^[0-9]{11}$\" title=\"CNH deve conter 11 digitos\" placeholder=\"Nº de Registro (11 digitos)\" value=\"{$resultado['nome_c']}\" required>".
                    "</label>".
                    "<label>Tipo";?>
                        <select name=\"register-tipo\">

                            <option value=\"A\" <?php echo ($resultado['tipo_c'] == 'A')? 'selected':'' ?>>A</option>
                            <option value=\"B\" <?php echo ($resultado['tipo_c'] == 'B')? 'selected':'' ?>>B</option>
                            <option value=\"C\" <?php echo ($resultado['tipo_c'] == 'C')? 'selected':'' ?>>C</option>
                            <option value=\"D\" <?php echo ($resultado['tipo_c'] == 'D')? 'selected':'' ?>>D
                            <option value=\"E\" <?php echo ($resultado['tipo_c'] == 'E')? 'selected':'' ?>>D</option>

                        </select>
<?php
                  echo "</label>".
                "</div>".
                "<div class=\"row\">".
                    "<label class=\"col \">Telefone".
                        "<input type=\"text\" name=\"register-tel\" pattern=\"(\\()(\\d{2})(\\))\\s(\\d{4,5})-(\\d{4})\" title=\"Telefone deve ser no seguinte formato (DD) 00000-0000\" placeholder=\"(DD) 00000-0000\"  value=\"\"required>".
                    "</label>".

                    "<label class=\"col\">Cidade".
                        "<input type=\"text\" name=\"register-cidade\" pattern=\"^([a-zA-Z\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Digite somente letras [a-z]\" placeholder=\"Em qual cidade você mora?\"  value=\"\" required>".

                    "</label>".
                    "<label class=\"col col-1\">Estado".

                        "<input type=\"text\" name=\"register-estado\" placeholder=\"UF\" pattern=\"[a-zA-Z]{2}\" title=\"Sigla do seu Estado deve conter 2 letras ex 'SP' \" required>".
                    "</label>".
                "</div>".
                "<div class=\"row\">".
                    "<label class=\"col col-6\">Rua".
                        "<input type=\"text\" name=\"register-rua\" pattern=\"^([a-zA-Z0-9\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Essse campo só pode conter letras e números [a-z0-9]\" placeholder=\"Nome da rua/av\"  value=\"\" required>".
                    "</label>".
                    "<label class=\"col col-1\">Nº".
                        "<input type=\"text\" name=\"register-num\" pattern=\"\\d{0,}\" title=\"Nº digite somente números\" name=\"register-no\" placeholder=\"Nº\"  value=\"\">".
                    "</label>".
                    "<label class=\"col\">Bairro".
                        "<input type=\"text\" name=\"register-bairro\" pattern=\"^([a-zA-Z0-9\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Essse campo só pode conter letras e números [a-z0-9]\" name=\"register-uf\" placeholder=\"Bairro...\"  value=\"\" required>".
                    "</label>".
                "</div>".
                "<h2>Dados do veículo</h2>".
                "<div class=\"row\">".
                    "<label class=\"col col-4\">Marca".
                    "<input type=\"text\" name=\"register-marca\" pattern=\"^([a-zA-Z0-9\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Essse campo só pode conter letras e números [a-z0-9]\" placeholder=\"Fabricante do veículo\"  value=\"\" required>".
                    "</label>".
                    "<label class=\"col col-4\">Modelo".
                        "<input type=\"text\" name=\"register-modelo\" pattern=\"^([a-zA-Z0-9\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Essse campo só pode conter letras e números [a-z0-9]\" placeholder=\"Modelo do veículo\"  value=\"\" required>".
                    "</label>".
                    "<label class=\"col col-1\">Ano".
                        "<input type=\"text\" name=\"register-ano\" pattern=\"^[0-9]{4}$\" title=\"Ano do carro apenas números ex: 2018\" placeholder=\"Ano\"  value=\"\" required>".
                    "</label>".
                "</div>".
                "<div class=\"row\">".
                    "<label class=\"col col-2\">Cor".
                        "<input type=\"text\" name=\"register-cor\" pattern=\"^([a-zA-Z\\u00C0-\\u017F\']{0,}(\\s?)){0,}$\" title=\"Essse campo só pode conter letras\" placeholder=\"Cor do veiculo\"  value=\"\" required>".
                    "</label>".
                    "<label class=\"col col-2\">Placa".
                        "<input type=\"text\" name=\"register-placa\" pattern=\"^([a-zA-Z0-9]{7}$\" title=\"Essse campo só pode conter letras e números [a-z0-9]\" placeholder=\"Placa do veículo\"  value=\"\" required>".
                    "</label>".

                "</div>".
                "<div class=\"row btn-right\">".
                    "<button class=\"btn-default btn-save\">Atualizar</button>".
                "</div>";
                "</form>".
            "</section>";
    }
}

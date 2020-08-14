<?php

?>

    <section class="form-group">

        <h1>Selecione uma empresa ou cadastre uma nova</h1>
        <form  action="" method="post">

            <div class="row">
                <label class="col col-12">Consulte pelo CNPJ da empresa
                    <input type="text" name="company-cnpj" pattern="(\d{3})\.(\d{3})\.(\d{3})\/(\d{4})-(\d{2})" title="Permitido somente letras e espaços" placeholder="Busque pelo CPNJ da empresa" value="" required>

                </label>
            </div>
            <div class="row">
                <div class="btn-group btn-right">
                    <button name="buscar" value="buscar" class="btn-default btn-save">Procurar</button>

                </div>
            </div>
        </form>
    </section>

    <?php
        if(isset($_POST['buscar'])){

            $customers =  new CustomersDao();
            $date = $customers->readCustomers($_POST['company-cnpj']);

            if($date){
                echo"<table border=\"1\">
                        <tr>
                            <td>id</td>
                            <td>Nome da empresa</td>
                            <td>CNPJ</td>
                            <td>Telefone</td>
                        </tr>";
                foreach ($date as $value){
                    echo "<tr>";
                    echo "<td><input type='checkbox' value='{$value['id_emp']}'></td>";
                    echo "<td>{$value['nome_emp']}</td>";
                    echo "<td>{$value['cnpj_emp']}</td>";
                    echo "<td>{$value['tel_emp']}</td>";
                    echo "</tr>";
                }
            }else{
                echo "<p>Nenhuma empresa encontrada</p>";
            }
        }else{
            $customers =  new CustomersDao();
            $date = $customers->readAll();
            echo"<table border=\"1\">
                        <tr>
                            <td>id</td>
                            <td>Nome da empresa</td>
                            <td>CNPJ</td>
                            <td>Telefone</td>
                        </tr>";
            if($date){
                foreach ($date as $value){
                    echo "<tr>";
                    echo "<td><input type='checkbox' value='{$value['id_emp']}'></td>";
                    echo "<td>{$value['nome_emp']}</td>";
                    echo "<td>{$value['cnpj_emp']}</td>";
                    echo "<td>{$value['tel_emp']}</td>";
                    echo "</tr>";
                }
            }
        }

        ?>
    </table>

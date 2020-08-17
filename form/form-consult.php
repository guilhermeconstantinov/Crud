<script>

    window.onload = function () {
        const form = document.getElementById('form-cnpj').addEventListener('submit',e=>{


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
            http.send("placa="+str.value);
        });
    }


</script>
<section class="form-group">

    <h1>Consultar acesso</h1>
    <form id="form-cnpj" action="#" method="get">

        <div class="row">
            <label class="col">
                <input type="text" id="placa" name="placa" placeholder="Digite a placa do carro"  required>

            </label>
            <label>
                <button type="submit" id="btn-consult" name="buscar" value="buscar" class="btn-default btn-save">Procurar</button>

            </label>

        </div>
    </form>

        <?php
            if(isset($_GET['placa'])){
                    $customers = new CustomersDao();
                    if($date = $customers->readCar($_GET['placa'])){
                        echo"<table>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Placa </th>
                                    <th>Modelo</th>
                                    <th>Cor</th>
                                    <th>Empresa</th>
                                    <th>Ações</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>{$date[0]['nome_C']}</td>
                                    <td>{$date[0]['placa']}</td>
                                    <td>Ford</td>
                                    <td>Branco</td>
                                    <td>Overdrive</td>
                                    <td class=\"td-flex\"><a class=\"btn-default btn-edit\" href=\"dashboard.php?f=consultar&a=edit\"></a><a class=\"btn-default btn-del\" href=\"#\"></a></td>
                            </table>
                        </form>";
                    }
            }

        ?>


</section>
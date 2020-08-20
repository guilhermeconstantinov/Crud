<?php require_once 'class/AutoLoad.php';?>
<section class="form-group">

    <h1>Consultar acesso</h1>
    <form id="form-consulta" action="" method="GET">

        <div class="row">
            <label class="col col-1">
                <input type="text" id="input-consulta" pattern="[a-zA-Z0-9]{7}" title="formato esperado 000.000.000/0000-00" name="consulta-placa" placeholder="Digite o Placa"  required>
            </label>
            <label>
                <button type="submit" id="btn-consulta" name="buscar-consulta" value="buscar" class="btn-default btn-save">Procurar</button>
            </label>
        </div>

    </form>
    <div id="resultado">

        <?php if(!isset($_GET['id']) || (isset($_GET['id']) && $_GET['id']!="")):
            $customers =  new Customers();
            $numRow = $customers->countCustomersAll();

            if(isset($_GET['pag'])) {

                $result = $customers->readCustomersAll($_GET['pag']);
            }else {
                $result = $customers->readCustomersAll(1);
            }
        ?>

        <?php if($result):?>
        <table>
            <tr>
                <th>Nome do usuário</th>
                <th>CPF</th>
                <th>Placa do carro</th>
                <th>Modelo</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($result as $value): ?>

            <tr>
                <td><?php echo $value['nome_c'];?></td>
                <td><?php echo $value['cpf_c'];?></td>
                <td><?php echo $value['placa'];?></td>
                <td><?php echo $value['modelo'];?></td>
                <td><?php echo $value['nome_emp'];?></td>
                <td class='td-flex'>
            <?php if ($user->getAdmin()):?>

                    <a  class='btn-default btn-edit update' href='?r=consulta&id=<?php echo$value['id_c'];?>&f=update'></a><a class='btn-default btn-visu' href='?id=<?php echo $value['id_c'];?>&f=ver'><a class='btn-default btn-del' href='?id=<?php echo $value['id_c'];?>&f=del'></a>
            <?php  else: ?>
                    <a class='btn-default btn-visu' href='?id=<?php echo $value['id_c'];?>&f=ver'></a>";

            <?php endif; ?>
                        </td>
                    </tr>
            <?php endforeach;?>

        </table>
            <div class="pag">
                <div class="pag-group">
                <?php  for($i=1;$i<=ceil(($numRow/10));$i++):?>

                <a href="?r=consulta&pag=<?php echo $i;?>"><?php echo $i?></a>

                <?php endfor;?>
                </div>
            </div>
        <?php endif;?>

    <?php endif;?>
        <div class="modal">

            <div class="modal-content">
                <?php if(isset($_GET['f']) && $_GET['f']== 'update'&& $_GET['id']):
                $result = $customers->readCustomerId($_GET['id']);

                ?>

                <form id="form-cadastro" action="controller/customers_op.php" method="post">
                    <h2>Dados do usuário</h2>
                    <input type="hidden" name="register-id" value="<?php echo $result['id_c'];?>">
                    <div class="row">
                        <label class="col col-12">Nome Completo
                            <input type="text" name="register-nome" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Permitido somente letras e espaços" placeholder="Nome e sobrenome" value="<?php echo $result['nome_c']; ?>" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col ">CPF
                            <input type="text" class="cpf" name="register-cpf" pattern="(\d{3})\.?(\d{3})\.?(\d{3})-?(\d{2})" title="CPF deve conter esse formato 000.000.000-00"  placeholder="000.000.000-00" value="<?php echo $result['cpf_c']; ?>" required>
                        </label>
                        <label class="col ">CNH
                            <input type="text" name="register-cnh" pattern="^[0-9]{11}$" title="CNH deve conter 11 digitos" placeholder="Nº de Registro (11 digitos)" value="<?php echo $result['cnh_c']; ?>" required>
                        </label>
                        <label class="">Tipo
                            <select name="register-tipo">
                                <option value="A"<?php echo ($result['tipo_c']=='A')? 'selected':''?>>A</option>
                                <option value="B"<?php echo ($result['tipo_c']=='B')? 'selected':''?>>B</option>
                                <option value="C"<?php echo ($result['tipo_c']=='C')? 'selected':''?>>C</option>
                                <option value="D"<?php echo ($result['tipo_c']=='D')? 'selected':''?>>D</option>
                                <option value="E"<?php echo ($result['tipo_c']=='E')? 'selected':''?>>E</option>
                            </select>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col ">Telefone
                            <input type="text" name="register-tel" pattern="(\()(\d{2})(\))\s(\d{4,5})-(\d{4})" title="Telefone deve ser no seguinte formato (DD) 00000-0000" placeholder="(DD) 00000-0000"  value="<?php echo $result['tel']; ?>" required>
                        </label>

                        <label class="col">Cidade
                            <input type="text" name="register-cidade" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Digite somente letras [a-z]" placeholder="Em qual cidade você mora?"  value="<?php echo $result['cidade_c']; ?>" required>
                        </label>
                        <label class="col col-1">Estado

                            <input type="text" name="register-estado" placeholder="UF" pattern="[a-zA-Z]{2}" title="Sigla do seu Estado deve conter 2 letras ex 'SP'" value="<?php echo $result['estado_c']; ?>" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col col-6">Rua
                            <input type="text" name="register-rua" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Nome da rua/av"  value="<?php echo $result['rua_c']; ?>" required>
                        </label>
                        <label class="col col-1">Nº
                            <input type="text" name="register-num" pattern="\d{0,}" title="Nº digite somente números" name="register-no" placeholder="Nº"  value="<?php echo $result['num_c']; ?>">
                        </label>
                        <label class="col">Bairro
                            <input type="text" name="register-bairro" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" name="register-uf" placeholder="Bairro..."  value="<?php echo $result['bairro_c']; ?>" required>
                        </label>
                    </div>
                    <h2>Dados do veículo</h2>
                    <div class="row">
                        <label class="col col-4">Marca
                            <input type="text" name="register-marca" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Fabricante do veículo"  value="<?php echo $result['marca']; ?>" required>
                        </label>
                        <label class="col col-4">Modelo
                            <input type="text" name="register-modelo" pattern="^([a-zA-Z0-9\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Modelo do veículo"  value="<?php echo $result['modelo']; ?>" required>
                        </label>
                        <label class="col col-1">Ano
                            <input type="text" name="register-ano" pattern="^[0-9]{4}$" title="Ano do carro apenas números ex: 2018" placeholder="Ano"  value="<?php echo $result['ano']; ?>" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col col-2">Cor
                            <input type="text" name="register-cor" pattern="^([a-zA-Z\u00C0-\u017F']{0,}(\s?)){0,}$" title="Essse campo só pode conter letras" placeholder="Cor do veiculo"  value="<?php echo $result['cor']; ?>" required>
                        </label>
                        <label class="col col-2">Placa
                            <input type="text" name="register-placa" pattern="^([a-zA-Z0-9]{7}$" title="Essse campo só pode conter letras e números [a-z0-9]" placeholder="Placa do veículo"  value="<?php echo $result['placa']; ?>" required>
                        </label>

                    </div>
                    <div class="row">
                        <div class="btn-group btn-right">
                            <a class="closeModal btn-default btn-default-u  btn-save-b" href="?r=consulta">Voltar</a>
                            <button name="submit-update" class="btn-default btn-default-u btn-save">Salvar</button>
                        </div>

                    </div>

            </div>
    <?php endif;?>
    </div>

</section>

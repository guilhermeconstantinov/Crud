
<?php
session_start();
require_once '../class/UserDao.php';
require_once '../class/CustomersDao.php';
require_once '../class/User.php';


if(!isset($_SESSION['id'])){
    header('location: index.php');
}else{
    $userDao = new UserDao();
    $user = $userDao->readUser($_SESSION['id']);


}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/panel.css">
    <script src="../js/script.js"></script>

</head>
<body>
<div id="container">
    <div id="menu-lateral">
        <?php include '../panel-dashboard.php'?>
    </div>

    <section id="content">
        <section class="form-group">

            <h1>Consultar acesso</h1>
            <form id="form-consulta" action="#" method="get">

                <div class="row">
                    <label class="col col-1">
                        <input type="text" id="input-consulta" name="consulta-cnpj" placeholder="Digite o CNPJ"  required>
                    </label>
                    <label>
                        <button type="submit" id="btn-consulta" name="buscar-consulta" value="buscar" class="btn-default btn-save">Procurar</button>

                    </label>
                </div>
                <div class="row">
                    <label><input type="radio" onchange="pesquisar();" value="1" name="tipo-entrada" checked>Porcurar por empresa</label>
                    <label><input type="radio" onchange="pesquisar();" value="2" name="tipo-entrada">Porcurar placa</label>

                </div>



            </form>

                <?php
                    if(isset($_POST['btn-consulta'])){

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

                ?>
        </section>

</section>
</div>
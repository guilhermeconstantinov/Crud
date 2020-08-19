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
        <?php include 'panel-dashboard.php' ?>
    </div>

    <section id="content">
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
                <?php include 'consult.php'?>


        </section>

</section>
</div>
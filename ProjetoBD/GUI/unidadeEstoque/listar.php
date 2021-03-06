<?php

require_once "../../DAO/UnidadeEstoqueDAO.php";
$unidades = UnidadeEstoqueDAO::getUnidades();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projeto FBD</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/projetofbd.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <style type="text/css">  @media (min-width: 768px) {.navbar-nav {  display: none !important;  }}  </style>

    <script>
        function editar(codUnidade){
            document.hiddenForm.codUnidade.value = codUnidade;
            document.hiddenForm.action = "editarForm.php";
            document.hiddenForm.submit();
        }
        function remover(codUnidade){
            swal({
                    title: "Tem certeza ?",
                    text: "Você não terá acesso a esse registro novamente!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, remova-o!",
                    closeOnConfirm: false
                },
                function(){
                    document.hiddenForm.codUnidade.value = codUnidade;
                    document.hiddenForm.action = "remover.php";
                    document.hiddenForm.submit();
                });
        }
    </script>

</head>

<body cz-shortcut-listen="true">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">Projeto FBD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../cliente/listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="../item/listar.php">Listar itens</a></li>
                <li><a href="../pedido/listar.php">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li><a href="#">Listar unidades de estoque</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../cliente/listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="../item/listar.php">Listar itens</a></li>
                <li><a href="../pedido/listar.php">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li class="active"><a href="#">Listar unidades de estoque</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Unidades de estoque</h1>

            <a href="cadastrarForm.php" >
                <button type="button" class="btn btn-default">Cadastrar nova unidade</button>
            </a>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-8 cabecalho">Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($unidadeTemp = array_shift($unidades)){
                        ?>
                        <tr align="center">
                            <td class="col-md-8"><?=$unidadeTemp->getDescricao()?></td>
                            <td class="col-md-1"><button class="btn btn-primary" onclick="editar(<?=$unidadeTemp->getCodUnidade();?>);">Editar</button>
                            <td class="col-md-1"><button class="btn btn-danger" onclick="remover(<?=$unidadeTemp->getCodUnidade();?>);">Remover</button>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form name="hiddenForm" method="post">
    <input type="hidden" name="codUnidade"/>
</form>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>

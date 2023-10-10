<?php
// Lucas 06102023 padrao novo
include_once('../header.php');
include_once('../database/servicos.php');

$idServico = $_GET['idServico'];
$servico = buscaServicos($idServico);
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>


<body>

    <div class="container-fluid">
        <div class="row">
            <BR> <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR> <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3" style="text-align:left">
                <!-- TITULO -->
                <h2 class="tituloTabela">Excluir Serviço</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2" style="text-align: end;">
                <a href="servicos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/servicos.php?operacao=excluir" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12" style="margin-top: 10px">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Serviço</label>
                        <input type="text" name="nomeServico" class="form-control" value="<?php echo $servico['nomeServico'] ?>" disabled>
                        <input type="text" class="form-control" name="idServico" value="<?php echo $servico['idServico'] ?>" style="display: none">
                        <input type="text" class="form-control" name="imgServico" value="<?php echo $servico['imgServico'] ?>" style="display: none">
                    </div>
                </div>
            </div>

            <div style="text-align:right; margin-top:20px">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>
        </form>
    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
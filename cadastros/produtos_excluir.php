<?php
// Lucas 06102023 padrao novo
include_once('../header.php');
include_once('../database/produtos.php');

$idProduto = $_GET['idProduto'];
$produto = buscaProdutos($idProduto);
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
            <div class="col-3">
                <!-- TITULO -->
                <h2 class="ts-tituloPrincipal">Excluir Produto</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <a href="produtos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/produtos.php?operacao=excluir" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="nomeProduto" class="form-control" value="<?php echo $produto['nomeProduto'] ?>" disabled>
                        <input type="hidden" class="form-control" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                        <input type="hidden" class="form-control" name="imgProduto" value="<?php echo $produto['imgProduto'] ?>">
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>
        </form>
    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
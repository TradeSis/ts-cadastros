<?php
include_once('../head.php');
include_once('../database/produtos.php');

$idProduto = $_GET['idProduto']; 
$produto = buscaProdutos($idProduto);
?>


<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Produto</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="produtos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

            <form action="../database/produtos.php?operacao=excluir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Produto*</label>
                            <input type="text" name="nomeProduto" class="form-control" value="<?php echo $produto['nomeProduto'] ?>" disabled>
                            <input type="text" class="form-control" name="idProduto" value="<?php echo $produto['idProduto'] ?>" style="display: none">
                            <input type="text" class="form-control" name="imgProduto" value="<?php echo $produto['imgProduto'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

        <div style="text-align:right; margin-top:20px">
            <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
        </div>
        </form>
    </div>

    </div>
</body>

</html>
<?php
include_once('../head.php');
include_once('../database/servicos.php');

$idServico = $_GET['idServico']; 
$servico = buscaServicos($idServico);
?>


<body class="bg-transparent">

    <div class="container p-4" style="margin-top:10px">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Excluir Serviço</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="servicos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

            <form class="mb-4" action="../database/servicos.php?operacao=excluir" method="post" enctype="multipart/form-data">

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

    </div>
</body>

</html>
<?php
include_once('../head.php');
include_once('../database/servicos.php');

$idServico = $_GET['idServico']; 
$servico = buscaServicos($idServico);
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Excluir Serviço</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="servicos.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

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

                

        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </div>
        </form>
    </div>

    </div>
</body>

</html>
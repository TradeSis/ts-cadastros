<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/clientes.php');

$clientes = buscaClientes($_GET['idCliente']);

?>

<body class="bg-transparent">

    <div class="container formContainer">
        <div class="row">
            <div class="col-sm-8" >
                <h2 class="tituloTabela">Excluir Cliente</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=clientes" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/clientes.php?operacao=excluir" method="post">
            <div class="col-md-12 form-group mb-4">

                <label class='control-label' for='inputNormal'></label>
                <div class="for-group">
                    <input type="text" class="form-control" name="nomeCliente" value="<?php echo $clientes['nomeCliente'] ?>">
                    <input type="text" class="form-control" name="idCliente" value="<?php echo $clientes['idCliente'] ?>" style="display: none">
                </div>
            </div>
            <div style="text-align:right">
                <button type="submit" id="botao" class="btn btn-sm btn-danger"><i class="bi bi-x-octagon"></i>&#32;Excluir</button>
            </div>
        </form>

    </div>


</body>

</html>
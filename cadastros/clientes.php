<?php
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/clientes.php');


$clientes = buscaClientes();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h2 class="tituloTabela">Clientes</h2>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="clientes_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
                    </div>
          
            </div>
        <div class="card mt-2 text-center">
            <table class="table">
                <thead class="cabecalhoTabela">
                    <tr>
                        <th>Cliente</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($clientes as $cliente) {
                ?>
                    <tr>
                        <td><?php echo $cliente['nomeCliente'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="clientes_alterar.php?idCliente=<?php echo $cliente['idCliente'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="clientes_excluir.php?idCliente=<?php echo $cliente['idCliente'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
<?php
//Lucas 09032023 - adicionado um segundo parametro no buscaUsuario 
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/usuario.php');
include_once(__DIR__ . '/../database/clientes.php');


$usuarios = buscaUsuarios();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:10px">


        <div class="row mt-4">
            <div class="col-sm-8">

                <h2 class="tituloTabela">Usuário</h2>
            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="usuario_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>

        </div>
        <div class="card mt-2 text-center">
            <div class="table scrollbar-tabela">
                <table class="table">
                    <thead class="cabecalhoTabela">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cliente</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($usuarios as $usuario) {

                        $nomeCliente = "Interno";
                        if ($usuario["idCliente"]) {
                            $clientes = buscaClientes($usuario["idCliente"]);
                            $nomeCliente = $clientes["nomeCliente"];
                        }
                    ?>
                        <tr>
                            <td><?php echo $usuario['nomeUsuario'] ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                            <td><?php echo $nomeCliente ?></td>
                            <td><?php echo $usuario['statusUsuario'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="usuario_alterar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="usuario_excluir.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button"><i class="bi bi-trash3"></i></a>


                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
<?php
// Lucas 06102023 padrao novo
//Lucas 09032023 - adicionado um segundo parametro no buscaUsuario 
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/usuario.php');
include_once(__DIR__ . '/../database/clientes.php');

$usuarios = buscaUsuarios();
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
        <div class="row align-items-center"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3 text-start">
                <!-- TITULO -->
                <h2 class="tituloTabela">Usuário</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
                <div class="input-group">
                    <input type="text" class="form-control" id="buscaDemanda" placeholder="Buscar por id ou titulo">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" id="buscar" type="button">
                            <span style="font-size: 20px;font-family: 'Material Symbols Outlined'!important;" class="material-symbols-outlined">search</span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-2 text-end">
                <a href="usuario_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>
        </div>

        <div class="table mt-2" style="width: 100%; height: 76vh; overflow-y:scroll; overflow-x:auto;">
            <table class="table table-hover table-sm align-middle">
                <thead class="cabecalhoTabela">
                    <tr id="titulodetabelafixo">
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

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
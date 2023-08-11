<?php
// Lucas 29032023 - alterado link do botão voltar, para redirecionar para o index.php
// helio 01022023 altereado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/usuario.php');
include_once('../database/clientes.php');

$idUsuario = $_GET['idUsuario'];
$usuario = buscaUsuarios($idUsuario);
$clientes = buscaClientes();

?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Alterar Usuário</spam>
        </div>

        <div class="container" style="margin-top: 30px">
            <form action="../database/usuario.php?operacao=alterar" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="labelForm">Nome</label>
                            <input type="text" class="form-control" name="nomeUsuario" value="<?php echo $usuario['nomeUsuario'] ?>">
                            <input type="text" class="form-control" name="idUsuario" value="<?php echo $usuario['idUsuario'] ?>" style="display: none">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class="labelForm">E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $usuario['email'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -15px;">Nivel</label>
                            <select class="form-control" style="padding-right: 50px;" name="statusUsuario">
                                <option <?php if ($usuario['statusUsuario'] == "0") { echo "selected"; } ?> value="0">Inativo</option>
                                <option <?php if ($usuario['statusUsuario'] == "1") { echo "selected"; } ?> value="1">Ativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -15px;">Cliente</label>
                            <select class="form-control" style="padding-right: 50px;" name="idCliente">
                                <option value="">Interno</option>
                                <?php
                                foreach ($clientes as $cliente) {
                                ?>
                                <option <?php if ($cliente['idCliente'] == $usuario['idCliente']) { echo "selected"; } ?> value="<?php echo $cliente['idCliente'] ?>"><?php echo $cliente['nomeCliente'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div  style="text-align:right">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
        </div>
    </div>

   
</body>

</html>
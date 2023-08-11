<?php
// helio 01022023 criado option null para empresa
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../head.php');
include_once '../database/clientes.php';

$clientes = buscaClientes();

?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

            <div class="col-sm mt-4" style="text-align:right">
            <a href="../configuracao/?tab=configuracao&stab=usuarios" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Cadastrar Usuário</spam>
        </div>

            <div class="container" style="margin-top: 10px">
                <form action="../database/usuario.php?operacao=inserir" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Usuário</label>
                                <input type="text" name="nomeUsuario" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">E-mail</label>
                                <input type="email" name="email" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group-select">
                                <label class="labelForm">Cliente</label>
                                <select class="select form-control" style="padding-right: 100px;" name="idCliente">
                                    <option value="">Interno</option>
                                    <?php
                                    foreach ($clientes as $cliente) {
                                    ?>
                                        <option value="<?php echo $cliente['idCliente'] ?>"><?php echo $cliente['nomeCliente'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:right; margin-top: 30px">
                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
                    </div>
                    </div>
                </form>

            </div>
        
    </div>


    
    <script>
        function validaSenha(input) {
            if (input.value != document.getElementById('txtSenha').value) {
                input.setCustomValidity('Repita a senha corretamente');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>


</body>

</html>
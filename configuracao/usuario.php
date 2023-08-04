<?php
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/usuario.php');


$usuarios = buscaUsuarios();
//echo json_encode($usuarios);

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Usuário</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="usuario_inserir.php" role="button" class="btn btn-primary">Adicionar Usuário</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($usuarios as $usuario) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $usuario['nomeUsuario'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="usuario_alterar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="usuario_excluir.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
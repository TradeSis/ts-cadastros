<?php
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/marcas.php');

$marcas = buscaMarcas();
?>
<style>
    .ativo_0 p {
        background-color: #D9534F;
        border-radius: 5px;
        border-bottom: 2px solid;
        color: transparent;
        margin: 10px 30px 0px 30px;
        height: 15px;
    }

    .ativo_1 p {
        background-color: #4ddd87;
        border-radius: 5px;
        border-bottom: 2px solid;
        color: transparent;
        margin: 10px 30px 0px 30px;
        height: 15px;
    }


    .ativoMarca_0 p .emojiNaoAtivo {
        font-size: 30px;
        color: #D9534F;

    }

    .ativoMarca_0 p .emojiAtivo {
        display: none;

    }

    .ativoMarca_1 p .emojiAtivo {
        font-size: 30px;
        color: #4ddd87;

    }

    .ativoMarca_1 p .emojiNaoAtivo {
        display: none;

    }
</style>

<body class="bg-transparent">
    <div class="container" style="margin-bottom: 30px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Marcas</h2>

            </div>

            <div class="col-sm-4" style="text-align:right">
                <a href="marcas_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>

        </div>
        <div class="card mt-2 text-center">
            <div class="table scrollbar-tabela">
                <table class="table">
                    <thead class="cabecalhoTabela">
                        <tr>
                            <th style="width:10%">Ativa</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th style="width:10%">Especializada</th>
                            <th>Ação</th>

                        </tr>
                    </thead>

                    <?php
                    foreach ($marcas as $marca) {
                    ?>
                        <tr>
                            <td class="ativoMarca_<?php echo $marca['ativoMarca'] ?>">
                                <p><i class="emojiAtivo bi bi-emoji-smile-fill"></i><i class="emojiNaoAtivo bi bi-emoji-frown-fill"></i></i></p>
                            </td>
                            <td><img src="<?php echo URLROOT ?>/img/<?php echo $marca['imgMarca'] ?>" width="60px" height="60px" alt=""></td>
                            <td><?php echo $marca['nomeMarca'] ?></td>
                            <td class="ativo_<?php echo $marca['lojasEspecializadas'] ?>">
                                <p></p>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?php echo URLROOT ?>/marcas/<?php echo $marca['slug'] ?>" target="_blank" role="button"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-warning btn-sm" href="marcas_alterar.php?idMarca=<?php echo $marca['idMarca'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="marcas_excluir.php?idMarca=<?php echo $marca['idMarca'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>


</body>

</html>
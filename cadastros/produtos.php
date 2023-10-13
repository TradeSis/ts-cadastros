<?php
// Lucas 06102023 padrao novo
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/produtos.php');

$produtos = buscaProdutos();
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>
    <link rel="stylesheet" href="../css/emoji.css">
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
                <h2 class="ts-tituloPrincipal">Catalogo</h2>
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
                <a href="produtos_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
            </div>
        </div>

        <div class="table mt-2 ts-divTabela">
            <table class="table table-hover table-sm align-middle">
                <thead class="ts-headertabelafixo">
                    <tr>
                        <th>Ativo</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th style="width:5px">Propaganda</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($produtos as $produto) {
                ?>
                    <tr>
                        <td class="ativoEmoji_<?php echo $produto['ativoProduto'] ?>">
                            <p><i class="emojiAtivo bi bi-emoji-smile-fill"></i><i class="emojiNaoAtivo bi bi-emoji-frown-fill"></i></i></p>
                        </td>
                        <td><img src="<?php echo $produto['imgProduto'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $produto['nomeProduto'] ?></td>
                        <td class="ativo_<?php echo $produto['propagandaProduto'] ?>">
                            <p><?php echo $produto['propagandaProduto'] ?></p>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="produtos_alterar.php?idProduto=<?php echo $produto['idProduto'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="produtos_excluir.php?idProduto=<?php echo $produto['idProduto'] ?>" role="button"><i class="bi bi-trash3"></i></a>
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
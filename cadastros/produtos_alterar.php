<?php
// Lucas 06102023 padrao novo
include_once('../header.php');
include_once('../database/marcas.php');
include_once('../database/produtos.php');
$marcas = buscaMarcas();
$idProduto = $_GET['idProduto'];
$produto = buscaProdutos($idProduto);

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
        <div class="row"> <!-- LINHA SUPERIOR A TABLE -->
            <div class="col-3">
                <!-- TITULO -->
                <h2 class="ts-tituloPrincipal">Editar Produto</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <a href="produtos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form action="../database/produtos.php?operacao=alterar" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Nome do Produto*</label>
                        <input type="text" name="nomeProduto" class="form-control" value="<?php echo $produto['nomeProduto'] ?>">
                        <input type="hidden" class="form-control" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6" style="margin-top: 50px">
                    <div class="col-sm-6" style="margin-top: -20px">
                        <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem do Produto*</label>
                        <label class="picture" for="foto" tabIndex="0">
                            <img src="<?php echo $produto["imgProduto"] ?>" width="100%" height="100%" alt="">
                        </label>
                        <input type="file" name="imgProduto" id="foto">
                    </div>
                </div>
            </div>

            <div class="row mt-3">

                <div class="col-sm-6 mt-1">
                    <div class="select-form-group">

                        <label class="labelForm">Marcas*</label>
                        <select class="select form-control" name="idMarca">
                            <option value="<?php echo $produto['idMarca'] ?>"><?php echo $produto['nomeMarca']  ?></option>
                            <?php
                            foreach ($marcas as $marca) {
                            ?>
                                <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                            <?php  } ?>
                        </select>

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal'>Preço*</label>
                        <input type="number" name="precoProduto" class="form-control" value="<?php echo $produto['precoProduto'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 ml-4 mt-2">
                    <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Ativo</label>
                        <label for="ativoProduto">Inativo</label>
                        <input type="range" id="ativoProduto" name="ativoProduto" min="0" max="1" value="<?php echo $produto['ativoProduto'] ?>" style="width: 15%;">
                        <label for="ativoProduto">Ativo</label>
                    </div>
                </div>

                <div class="col-sm-5 mt-2">
                    <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Propaganda</label>
                        <label for="propagandaProduto">Não</label>
                        <input type="range" id="propagandaProduto" name="propagandaProduto" min="0" max="1" value="<?php echo $produto['propagandaProduto'] ?>" style="width: 15%;">
                        <label for="propagandaProduto">Sim</label>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-0">
                <div class="col">
                    <span class="tituloEditor">Descrição</span>
                </div>
                <div class="quill-textarea"><?php echo $produto['descricaoProduto'] ?></div>
                <textarea style="display: none" id="detail" name="descricaoProduto"><?php echo $produto['descricaoProduto'] ?></textarea>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
            </div>
        </form>
    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script src="<?php echo URLROOT ?>/sistema/js/quilljs.js"></script>
    <script>
        //Carregar a FOTO na tela
        const inputFile = document.querySelector("#foto");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Carregar imagem";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
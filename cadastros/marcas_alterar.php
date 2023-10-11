<?php
// Lucas 06102023 padrao novo
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ .  '/../database/marcas.php');

$idMarca = $_GET['idMarca'];
$marca = buscaMarcas($idMarca);
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
                <h2 class="tituloTabela">Alterar Marca</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <a href="marcas.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

        <form class="mb-4" action="../database/marcas.php?operacao=alterar" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">nome da marca*</label>
                        <input type="text" name="nomeMarca" class="form-control" value="<?php echo $marca['nomeMarca'] ?>">
                        <input type="hidden" class="form-control" name="idMarca" value="<?php echo $marca['idMarca'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6" style="margin-top: 50px">
                    <div class="col-sm-6" style="margin-top: -20px">
                        <label class='control-label' for='inputNormal' style="margin-top: -50px;">imagem 150x150px</label>
                        <label class="picture" for="foto" tabIndex="0">
                            <img src="<?php echo $marca["imgMarca"] ?>" width="100%" height="100%" alt="">
                        </label>
                        <input type="file" name="imgMarca" id="foto">
                    </div>
                </div>

                <div class="col-sm-6" style="margin-top: 50px">
                    <div class="col-sm-6" style="margin-top: -20px">
                        <label class='control-label' for='inputNormal' style="margin-top: -50px;">banner</label>
                        <label class="picture" for="banner" tabIndex="0">
                            <img src="<?php echo $marca["bannerMarca"] ?>" width="100%" height="100%" alt="">
                        </label>
                        <input type="file" name="bannerMarca" id="banner">
                    </div>
                </div>
            </div>

            <div class="container-fluid p-0">
                <div class="col">
                    <span class="tituloEditor">Descrição</span>
                </div>
                <div class="quill-textarea"><?php echo $marca['descricaoMarca'] ?></div>
                <textarea style="display: none" id="detail" name="descricaoMarca"><?php echo $marca['descricaoMarca'] ?></textarea>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">cidade</label>
                        <input type="text" name="cidadeMarca" class="form-control" autocomplete="off" value="<?php echo $marca['cidadeMarca'] ?>">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="select-form-group">

                        <label class="labelForm">estado</label>
                        <select class="select form-control" name="estado">
                            <option value="<?php echo $marca['estado'] ?>"><?php echo $marca['estado'] ?></option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">url marca</label>
                        <input type="text" name="urlMarca" class="form-control" autocomplete="off" value="<?php echo $marca['urlMarca'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mt-4" >
                    <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Ativo*</label>
                        <label for="ativoMarca">inativo</label>
                        <input type="range" id="ativoMarca" name="ativoMarca" min="0" max="1" value="<?php echo $marca['ativoMarca'] ?>" style="width: 15%;">
                        <label for="ativoMarca">ativo</label>
                    </div>
                </div>

                <div class="col-sm-4 mt-4" >
                    <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Catalogo</label>
                        <label for="catalogo">Não</label>
                        <input type="range" id="catalogo" name="catalogo" min="0" max="1" value="<?php echo $marca['catalogo'] ?>" style="width: 15%;">
                        <label for="catalogo">Sim</label>
                    </div>
                </div>

                <div class="col-sm-4 mt-4" >
                    <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Loja Especializada</label>
                        <label for="lojasEspecializadas">Não</label>
                        <input type="range" id="lojasEspecializadas" name="lojasEspecializadas" min="0" max="1" value="<?php echo $marca['lojasEspecializadas'] ?>" style="width: 15%;">
                        <label for="lojasEspecializadas">Sim</label>
                    </div>
                </div>
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

        //Carregar a BANNER na tela
        const inputFile2 = document.querySelector("#banner");
        const pictureImage2 = document.querySelector(".picture__image2");
        const pictureImageTxt2 = "Carregar imagem2";
        pictureImage2.innerHTML = pictureImageTxt2;

        inputFile.addEventListener("change", function(e) {
            const inputTarget2 = e.target;
            const file2 = inputTarget2.files2[0];

            if (file2) {
                const reader2 = new FileReader2();

                reader2.addEventListener("load", function(e) {
                    const readerTarget2 = e.target;

                    const img2 = document.createElement("img2");
                    img2.src = readerTarget.result;
                    img2.classList.add("picture__img2");

                    pictureImage2.innerHTML = "";
                    pictureImage2.appendChild(img2);
                });

                reader2.readAsDataURL(file2);
            } else {
                pictureImage2.innerHTML = pictureImageTxt2;
            }
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
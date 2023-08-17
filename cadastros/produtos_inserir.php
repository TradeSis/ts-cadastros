<?php
include_once('../head.php');
include_once('../database/marcas.php');

$marcas = buscaMarcas();
?>


<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Adicionar Produto</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="produtos.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

            <form action="../database/produtos.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Produto*</label>
                            <input type="text" name="nomeProduto" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem do Produto*</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <input type="file" name="imgProduto" id="foto" required>
                        </div>
                    </div>
                </div>

                <div class="row">
    
                        <div class="col-sm-6" style="margin-top: 10px">
                            <div class="select-form-group">

                                <label class="labelForm">Marcas*</label>
                                <select class="select form-control" name="idMarca">
                                    <?php
                                    foreach ($marcas as $marca) {
                                    ?>
                                        <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                    <?php  } ?>
                                </select>

                            </div>
                        </div>
                
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Preço*</label>
                            <input type="number" name="precoProduto" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 ml-4" style="margin-top: 30px">
                        <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Ativo</label>
                            <label for="ativoProduto">Inativo</label>
                            <input type="range" id="ativoProduto" name="ativoProduto" min="0" max="1" style="width: 15%;">
                            <label for="ativoProduto">Ativo</label>
                        </div>
                    </div>

                    <div class="col-sm-5" style="margin-top: 30px">
                        <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Propaganda</label>
                            <label for="propagandaProduto">Não</label>
                            <input type="range" id="propagandaProduto" name="propagandaProduto" min="0" max="1" style="width: 15%;">
                            <label for="propagandaProduto">Sim</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Descrição</label>
                            <textarea name="descricaoProduto" id="" cols="120" rows="5"></textarea>
                        </div>
                    </div>
                </div>

            <div style="text-align:right; margin-top:20px">
                <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>
        </form>
    </div>

    </div>

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

</body>

</html>
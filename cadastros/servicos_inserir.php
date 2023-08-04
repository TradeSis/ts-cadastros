<?php
include_once('../head.php');

?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Serviço</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="servicos.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/servicos.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Serviço</label>
                            <input type="text" name="nomeServico" class="form-control" required autocomplete="off">
                            <input type="text" class="form-control" name="idEmpresa" value="<?php echo $_SESSION['idEmpresa'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Imagem do Serviço</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <input type="file" name="imgServico" id="foto" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Descrição</label>
                            <textarea name="descricaoServico" id="" cols="135" rows="10"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-8">
                        <div class="select-form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Link Serviço</label>
                            <input type="text" name="linkServico" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-4" style="margin-top: 30px">
                        <div class="select-form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -45px;">Destaque</label>
                            <label for="destaque">Não</label>
                            <input type="range" id="destaque" name="destaque" min="0" max="1" style="width: 15%;">
                            <label for="destaque">Sim</label>
                        </div>
                    </div>
                </div>


        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
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
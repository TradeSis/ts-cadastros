<?php
//Helio 05102023 padrao novo
//Lucas 04042023 criado
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/pessoas.php');

$pessoas = buscarPessoa();
//echo json_encode($pessoas);
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
                <h2 class="ts-tituloPrincipal">Pessoas</h2>
            </div>
            <div class="col-7">
                <!-- FILTROS -->
            </div>

            <div class="col-2 text-end">
                <button type="button" class="btn btn-success mr-4" data-bs-toggle="modal" data-bs-target="#inserirModal"><i class="bi bi-plus-square"></i>&nbsp Novo</button>
            </div>
        </div>

        <div class="table mt-2 ts-divTabela">
            <table class="table table-hover table-sm align-middle">
                <thead class="ts-headertabelafixo">
                    <tr>
                        <th>Foto</th>
                        <th>Cpf/Cnpj</th>
                        <th>Nome</th>
                        <th>IE</th>
                        <th>Mun</th>
                        <th>UF</th>
                        <th>País</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <?php
                foreach ($pessoas as $pessoa) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $pessoa['imgPerfil'] ?>" width="60px" height="60px" alt=""></td>
                        <td> <?php echo $pessoa['cpfCnpj'] ?> </td>
                        <td> <?php echo $pessoa['nomePessoa'] ?> </td>
                        <td> <?php echo $pessoa['IE'] ?> </td>
                        <td> <?php echo $pessoa['municipio'] ?> </td>
                        <td> <?php echo $pessoa['UF'] ?> </td>
                        <td> <?php echo $pessoa['pais'] ?> </td>
                        <td> <?php echo $pessoa['endereco'] ?> </td>

                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#alterarmodal" data-idPessoa="<?php echo $pessoa['idPessoa'] ?>"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirmodal" data-idPessoa="<?php echo $pessoa['idPessoa'] ?>"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>


    </div>

        <!--------- INSERIR --------->
        <div class="modal" id="inserirModal" tabindex="-1" aria-labelledby="inserirModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inserir Pessoa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="inserirForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Tipo de Pessoa</label>
                                            <select class="form-select ts-input" name="tipoPessoa">
                                                <option value="J">Jurídica</option>
                                                <option value="F">Física</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" name="cpfCnpj">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomePessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">CEP</label>
                                            <input type="text" class="form-control ts-input" name="cep">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Bairro</label>
                                            <input type="text" class="form-control ts-input" name="bairro">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" name="endereco">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Numero</label>
                                            <input type="text" class="form-control ts-input" name="endNumero">
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Município</label>
                                            <input type="text" class="form-control ts-input" name="municipio">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">IE</label>
                                            <input type="text" class="form-control ts-input" name="IE">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">UF</label>
                                            <input type="text" class="form-control ts-input" name="UF">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">País</label>
                                            <input type="text" class="form-control ts-input" name="pais">
                                        </div>
                                    </div><!--fim row 3-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Email</label>
                                            <input type="text" class="form-control ts-input" name="email">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Telefone</label>
                                            <input type="text" class="form-control ts-input" name="telefone">
                                        </div>
                                    </div><!--fim row 4-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Facebook</label>
                                            <input type="text" class="form-control ts-input" name="facebook">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Instagram</label>
                                            <input type="text" class="form-control ts-input" name="instagram">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Twitter</label>
                                            <input type="text" class="form-control ts-input" name="twitter">
                                        </div>
                                    </div><!--fim row 5-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class='form-label ts-label'>Imagem do Perfil</label>
                                            <label class="picture" for="fotoInserir" tabIndex="0">
                                                <span class="picture__image" id="inserir"></span>
                                            </label>
                                            <input type="file" name="imgPerfilInserir" class="fotoInput" id="fotoInserir" hidden>
                                        </div>
                                    </div><!--fim row 6-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--------- ALTERAR --------->
        <div class="modal" id="alterarmodal" tabindex="-1" aria-labelledby="alterarmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Pessoa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="alterarForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Tipo de Pessoa</label>
                                            <select class="form-select ts-input" name="tipoPessoa" id="tipoPessoa">
                                                <option value="J">Jurídica</option>
                                                <option value="F">Física</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" id="cpfCnpj" name="cpfCnpj">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomePessoa" id="nomePessoa">
                                            <input type="hidden" class="form-control ts-input" name="idPessoa" id="idPessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">CEP</label>
                                            <input type="text" class="form-control ts-input" id="cep" name="cep">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Bairro</label>
                                            <input type="text" class="form-control ts-input" id="bairro" name="bairro">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" id="endereco" name="endereco">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Numero</label>
                                            <input type="text" class="form-control ts-input" id="endNumero" name="endNumero">
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Município</label>
                                            <input type="text" class="form-control ts-input" id="municipio" name="municipio">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">IE</label>
                                            <input type="text" class="form-control ts-input" id="IE" name="IE">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">UF</label>
                                            <input type="text" class="form-control ts-input" id="UF" name="UF">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">País</label>
                                            <input type="text" class="form-control ts-input" id="pais" name="pais">
                                        </div>
                                    </div><!--fim row 3-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Email</label>
                                            <input type="text" class="form-control ts-input" id="email" name="email">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Telefone</label>
                                            <input type="text" class="form-control ts-input" id="telefone" name="telefone">
                                        </div>
                                    </div><!--fim row 4-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Facebook</label>
                                            <input type="text" class="form-control ts-input" id="facebook" name="facebook">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Instagram</label>
                                            <input type="text" class="form-control ts-input" id="instagram" name="instagram">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Twitter</label>
                                            <input type="text" class="form-control ts-input" id="twitter" name="twitter">
                                        </div>
                                    </div><!--fim row 5-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class='form-label ts-label'>Imagem do Perfil</label>
                                            <label class="picture" for="fotoAlterar" tabIndex="0">
                                                <span class="picture__image" id="alterar"></span>
                                            </label>
                                            <input type="file" name="imgPerfilAlterar" class="fotoInput" id="fotoAlterar" hidden>
                                        </div>
                                    </div><!--fim row 6-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--------- EXCLUIR --------->
        <div class="modal" id="excluirmodal" tabindex="-1" aria-labelledby="excluirmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Pessoa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="excluirForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Tipo de Pessoa</label>
                                            <select class="form-select ts-input" name="tipoPessoa" id="EXCtipoPessoa">
                                                <option value="J">Jurídica</option>
                                                <option value="F">Física</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" id="EXCcpfCnpj" name="cpfCnpj" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomePessoa" id="EXCnomePessoa" readonly>
                                            <input type="hidden" class="form-control ts-input" name="idPessoa" id="EXCidPessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">CEP</label>
                                            <input type="text" class="form-control ts-input" id="EXCcep" name="cep" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Bairro</label>
                                            <input type="text" class="form-control ts-input" id="EXCbairro" name="bairro" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" id="EXCendereco" name="endereco" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ts-label">Numero</label>
                                            <input type="text" class="form-control ts-input" id="EXCendNumero" name="endNumero" readonly>
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Município</label>
                                            <input type="text" class="form-control ts-input" id="EXCmunicipio" name="municipio" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">IE</label>
                                            <input type="text" class="form-control ts-input" id="EXCIE" name="IE" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">UF</label>
                                            <input type="text" class="form-control ts-input" id="EXCUF" name="UF" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">País</label>
                                            <input type="text" class="form-control ts-input" id="EXCpais" name="pais" readonly>
                                        </div>
                                    </div><!--fim row 3-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Email</label>
                                            <input type="text" class="form-control ts-input" id="EXCemail" name="email" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Telefone</label>
                                            <input type="text" class="form-control ts-input" id="EXCtelefone" name="telefone" readonly>
                                        </div>
                                    </div><!--fim row 4-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Facebook</label>
                                            <input type="text" class="form-control ts-input" id="EXCfacebook" name="facebook" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Instagram</label>
                                            <input type="text" class="form-control ts-input" id="EXCinstagram" name="instagram" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Twitter</label>
                                            <input type="text" class="form-control ts-input" id="EXCtwitter" name="twitter" readonly>
                                        </div>
                                    </div><!--fim row 5-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> 
    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        
        $(document).ready(function() {

            $(document).on('click', 'button[data-bs-target="#alterarmodal"]', function() {
                var idPessoa = $(this).attr("data-idPessoa");
                //alert(idPessoa)
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/pessoas.php?operacao=buscar',
                    data: {
                        idPessoa: idPessoa
                    },
                    success: function(data) {
                        $('#idPessoa').val(data.idPessoa);
                        $('#tipoPessoa').val(data.tipoPessoa);
                        $('#cpfCnpj').val(data.cpfCnpj);
                        $('#nomePessoa').val(data.nomePessoa);
                        $('#IE').val(data.IE);
                        $('#municipio').val(data.municipio);
                        $('#UF').val(data.UF);
                        $('#pais').val(data.pais);
                        $('#bairro').val(data.bairro);
                        $('#endereco').val(data.endereco);
                        $('#endNumero').val(data.endNumero);
                        $('#cep').val(data.cep);
                        $('#email').val(data.email);
                        $('#telefone').val(data.telefone);
                        $('#facebook').val(data.facebook);
                        $('#instagram').val(data.instagram);
                        $('#twitter').val(data.twitter);
                        $('#imgPerfil').val(data.imgPerfil);
                        $('#alterarmodal').modal('show');
                    }
                });
            });

            $(document).on('click', 'button[data-bs-target="#excluirmodal"]', function() {
                var idPessoa = $(this).attr("data-idPessoa");
                //alert(idPessoa)
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/pessoas.php?operacao=buscar',
                    data: {
                        idPessoa: idPessoa
                    },
                    success: function(data) {
                        $('#EXCidPessoa').val(data.idPessoa);
                        $('#EXCtipoPessoa').val(data.tipoPessoa);
                        $('#EXCcpfCnpj').val(data.cpfCnpj);
                        $('#EXCnomePessoa').val(data.nomePessoa);
                        $('#EXCIE').val(data.IE);
                        $('#EXCmunicipio').val(data.municipio);
                        $('#EXCUF').val(data.UF);
                        $('#EXCpais').val(data.pais);
                        $('#EXCbairro').val(data.bairro);
                        $('#EXCendereco').val(data.endereco);
                        $('#EXCendNumero').val(data.endNumero);
                        $('#EXCcep').val(data.cep);
                        $('#EXCemail').val(data.email);
                        $('#EXCtelefone').val(data.telefone);
                        $('#EXCfacebook').val(data.facebook);
                        $('#EXCinstagram').val(data.instagram);
                        $('#EXCtwitter').val(data.twitter);
                        $('#EXCimgPerfil').val(data.imgPerfil);
                        $('#excluirmodal').modal('show');
                    }
                });
            });

            $("#inserirForm").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/pessoas.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#alterarForm").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/pessoas.php?operacao=alterar",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#excluirForm").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/pessoas.php?operacao=excluir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            function refreshPage() {
                window.location.reload();
            }

            function preencherCamposCEP(cep) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/pessoas.php?operacao=buscaCEP',
                    data: {
                        cep: cep
                    },
                    success: function (data) {
                        $("input[name='UF']").val(data.uf);
                        $("input[name='municipio']").val(data.municipio);
                        $("input[name='endereco']").val(data.logradouro);
                        $("input[name='bairro']").val(data.bairro);
                    }
                });
            }
            function preencherCamposCNPJ(cnpj) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/pessoas.php?operacao=buscaCNPJ',
                    data: {
                        cnpj: cnpj
                    },
                    success: function (data) {
                        $("input[name='cep']").val(data.endereco.cep);
                        $("input[name='nomePessoa']").val(data.nome_fantasia);
                        $("input[name='UF']").val(data.endereco.uf);
                        $("input[name='municipio']").val(data.endereco.municipio.descricao);
                        $("input[name='endereco']").val(`${data.endereco.tipo_logradouro} ${data.endereco.logradouro}`);
                        $("input[name='endNumero']").val(data.endereco.numero);
                        $("input[name='bairro']").val(data.endereco.bairro);
                        $("input[name='email']").val(data.email);
                    }
                });
            }

            $("input[name='cep']").on("input", function () {
                var cep = $(this).val();
                if (cep.length === 8) {
                    preencherCamposCEP(cep);
                }
            });
            $("input[name='cpfCnpj']").on("input", function () {
                var cnpj = $(this).val();
                if (cnpj.length === 14) {
                    preencherCamposCNPJ(cnpj);
                }
            }); 
        });

        $('input[name="cpfCnpj"], input[name="cep"]').on('input', function() {
            var c = this.selectionStart,
                r = /[^0-9]/g,
                v = $(this).val();
            if (r.test(v)) {
                $(this).val(v.replace(r, ''));
                c--;
            }
            this.setSelectionRange(c, c);
        });

          //Carregar a FOTO na tela
          const fotoInputs = document.querySelectorAll(".fotoInput");

            fotoInputs.forEach((input, index) => {
                const pictureImage = document.querySelectorAll(".picture__image")[index];
                const pictureImageTxt = "Carregar imagem";
                pictureImage.innerHTML = pictureImageTxt;

                input.addEventListener("change", function (e) {
                    const inputTarget = e.target;
                    const file = inputTarget.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.addEventListener("load", function (e) {
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
            });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
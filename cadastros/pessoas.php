<?php
//Helio 05102023 padrao novo
//Lucas 04042023 criado
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/pessoa.php');

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
                        <td> <?php echo $pessoa['cpfCnpj'] ?> </td>
                        <td> <?php echo $pessoa['nome'] ?> </td>
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
                                        <div class="col-md">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" name="cpfCnpj">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nome">
                                            <input type="hidden" class="form-control ts-input" name="idPessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" name="endereco">
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
                                        <div class="col-md">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" id="cpfCnpj" name="cpfCnpj">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nome" id="nome">
                                            <input type="hidden" class="form-control ts-input" name="idPessoa" id="idPessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" id="endereco" name="endereco">
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
                                        <div class="col-md">
                                            <label class="form-label ts-label">Cpf/Cnpj</label>
                                            <input type="text" class="form-control ts-input" id="EXCcpfCnpj" name="cpfCnpj" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nome" id="EXCnome" readonly>
                                            <input type="hidden" class="form-control ts-input" name="idPessoa" id="EXCidPessoa">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">Endereço</label>
                                            <input type="text" class="form-control ts-input" id="EXCendereco" name="endereco" readonly>
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
                    url: '../database/pessoa.php?operacao=buscar',
                    data: {
                        idPessoa: idPessoa
                    },
                    success: function(data) {
                        $('#idPessoa').val(data.idPessoa);
                        $('#cpfCnpj').val(data.cpfCnpj);
                        $('#nome').val(data.nome);
                        $('#IE').val(data.IE);
                        $('#municipio').val(data.municipio);
                        $('#UF').val(data.UF);
                        $('#pais').val(data.pais);
                        $('#endereco').val(data.endereco);
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
                    url: '../database/pessoa.php?operacao=buscar',
                    data: {
                        idPessoa: idPessoa
                    },
                    success: function(data) {
                        $('#EXCidPessoa').val(data.idPessoa);
                        $('#EXCcpfCnpj').val(data.cpfCnpj);
                        $('#EXCnome').val(data.nome);
                        $('#EXCIE').val(data.IE);
                        $('#EXCmunicipio').val(data.municipio);
                        $('#EXCUF').val(data.UF);
                        $('#EXCpais').val(data.pais);
                        $('#EXCendereco').val(data.endereco);
                        $('#excluirmodal').modal('show');
                    }
                });
            });

            $("#inserirForm").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/pessoa.php?operacao=inserir",
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
                    url: "../database/pessoa.php?operacao=alterar",
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
                    url: "../database/pessoa.php?operacao=excluir",
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
        });
    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
<?php
//Helio 05102023 padrao novo
//Lucas 04042023 criado
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/fisproduto.php');

$produtos = buscarProdutos();
//echo json_encode($produtos);
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
                <h2 class="ts-tituloPrincipal">Produtos</h2>
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
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Un. Comercial</th>
                        <th>vlUnidade</th>
                        <th>vlTotal</th>
                        <th>cfop</th>
                        <th>ncm</th>
                        <th>cest</th>
                        <th>chaveNFe</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <?php
                foreach ($produtos as $produto) {
                    ?>
                    <tr>
                        <td> <?php echo $produto['codigoProduto'] ?> </td>
                        <td> <?php echo $produto['nomeProduto'] ?> </td>
                        <td> <?php echo $produto['quantidade'] ?> </td>
                        <td> <?php echo $produto['unidCom'] ?> </td>
                        <td> <?php echo $produto['valorUnidade'] ?> </td>
                        <td> <?php echo $produto['valorTotal'] ?> </td>
                        <td> <?php echo $produto['cfop'] ?> </td>
                        <td> <?php echo $produto['ncm'] ?> </td>
                        <td> <?php echo $produto['cest'] ?> </td>
                        <td> <?php echo $produto['chaveNFe'] ?> </td>

                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#alterarmodal" data-idProduto="<?php echo $produto['idProduto'] ?>"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirmodal" data-idProduto="<?php echo $produto['idProduto'] ?>"><i class="bi bi-trash3"></i></button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Inserir Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="inserirForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="form-label ts-label">codigoProduto</label>
                                            <input type="text" class="form-control ts-input" name="codigoProduto">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomeProduto">
                                            <input type="hidden" class="form-control ts-input" name="idProduto">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">chaveNFe</label>
                                            <input type="text" class="form-control ts-input" name="chaveNFe">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">unidCom</label>
                                            <input type="text" class="form-control ts-input" name="unidCom">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">quantidade</label>
                                            <input type="text" class="form-control ts-input" name="quantidade">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorUnidade</label>
                                            <input type="text" class="form-control ts-input" name="valorUnidade">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorTotal</label>
                                            <input type="text" class="form-control ts-input" name="valorTotal">
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">cfop</label>
                                            <input type="text" class="form-control ts-input" name="cfop">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">ncm</label>
                                            <input type="text" class="form-control ts-input" name="ncm">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">cest</label>
                                            <input type="text" class="form-control ts-input" name="cest">
                                        </div>
                                    </div><!--fim row 3-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <div class="card-footer bg-transparent text-end">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="alterarForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">codigoProduto</label>
                                            <input type="text" class="form-control ts-input" id="codigoProduto" name="codigoProduto">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomeProduto" id="nomeProduto">
                                            <input type="hidden" class="form-control ts-input" name="idProduto" id="idProduto">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">chaveNFe</label>
                                            <input type="text" class="form-control ts-input" id="chaveNFe" name="chaveNFe">
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">unidCom</label>
                                            <input type="text" class="form-control ts-input" id="unidCom" name="unidCom">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">quantidade</label>
                                            <input type="text" class="form-control ts-input" id="quantidade" name="quantidade">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorUnidade</label>
                                            <input type="text" class="form-control ts-input" id="valorUnidade" name="valorUnidade">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorTotal</label>
                                            <input type="text" class="form-control ts-input" id="valorTotal" name="valorTotal">
                                        </div>
                                    </div><!--fim row 3-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">cfop</label>
                                            <input type="text" class="form-control ts-input" id="cfop" name="cfop">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">ncm</label>
                                            <input type="text" class="form-control ts-input" id="ncm" name="ncm">
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">cest</label>
                                            <input type="text" class="form-control ts-input" id="cest" name="cest">
                                        </div>
                                    </div><!--fim row 4-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <div class="card-footer bg-transparent text-end">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="excluirForm">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">codigoProduto</label>
                                            <input type="text" class="form-control ts-input" id="EXCcodigoProduto" name="codigoProduto" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">Nome</label>
                                            <input type="text" class="form-control ts-input" name="nomeProduto" id="EXCnomeProduto" readonly>
                                            <input type="hidden" class="form-control ts-input" name="idProduto" id="EXCidProduto">
                                        </div>
                                    </div><!--fim row 1-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">chaveNFe</label>
                                            <input type="text" class="form-control ts-input" id="EXCchaveNFe" name="chaveNFe" readonly>
                                        </div>
                                    </div><!--fim row 2-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">unidCom</label>
                                            <input type="text" class="form-control ts-input" id="EXCunidCom" name="unidCom" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">quantidade</label>
                                            <input type="text" class="form-control ts-input" id="EXCquantidade" name="quantidade" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorUnidade</label>
                                            <input type="text" class="form-control ts-input" id="EXCvalorUnidade" name="valorUnidade" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">valorTotal</label>
                                            <input type="text" class="form-control ts-input" id="EXCvalorTotal" name="valorTotal" readonly>
                                        </div>
                                    </div><!--fim row 3-->
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <label class="form-label ts-label">cfop</label>
                                            <input type="text" class="form-control ts-input" id="EXCcfop" name="cfop" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">ncm</label>
                                            <input type="text" class="form-control ts-input" id="EXCncm" name="ncm" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label class="form-label ts-label">cest</label>
                                            <input type="text" class="form-control ts-input" id="EXCcest" name="cest" readonly>
                                        </div>
                                    </div><!--fim row 4-->
                                </div>
                            </div>
                    </div><!--body-->
                    <div class="modal-footer">
                        <div class="card-footer bg-transparent text-end">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>
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
                var idProduto = $(this).attr("data-idProduto");
                //alert(idProduto)
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/fisproduto.php?operacao=buscar',
                    data: {
                        idProduto: idProduto
                    },
                    success: function(data) {
                        $('#idProduto').val(data.idProduto);
                        $('#codigoProduto').val(data.codigoProduto);
                        $('#nomeProduto').val(data.nomeProduto);
                        $('#quantidade').val(data.quantidade);
                        $('#unidCom').val(data.unidCom);
                        $('#valorUnidade').val(data.valorUnidade);
                        $('#valorTotal').val(data.valorTotal);
                        $('#cfop').val(data.cfop);
                        $('#ncm').val(data.ncm);
                        $('#cest').val(data.cest);
                        $('#chaveNFe').val(data.chaveNFe);
                        $('#alterarmodal').modal('show');
                    }
                });
            });

            $(document).on('click', 'button[data-bs-target="#excluirmodal"]', function() {
                var idProduto = $(this).attr("data-idProduto");
                //alert(idProduto)
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/fisproduto.php?operacao=buscar',
                    data: {
                        idProduto: idProduto
                    },
                    success: function(data) {
                        $('#EXCidProduto').val(data.idProduto);
                        $('#EXCcodigoProduto').val(data.codigoProduto);
                        $('#EXCnomeProduto').val(data.nomeProduto);
                        $('#EXCquantidade').val(data.quantidade);
                        $('#EXCunidCom').val(data.unidCom);
                        $('#EXCvalorUnidade').val(data.valorUnidade);
                        $('#EXCvalorTotal').val(data.valorTotal);
                        $('#EXCcfop').val(data.cfop);
                        $('#EXCncm').val(data.ncm);
                        $('#EXCcest').val(data.cest);
                        $('#EXCchaveNFe').val(data.chaveNFe);
                        $('#excluirmodal').modal('show');
                    }
                });
            });

            $("#inserirForm").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/fisproduto.php?operacao=inserir",
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
                    url: "../database/fisproduto.php?operacao=alterar",
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
                    url: "../database/fisproduto.php?operacao=excluir",
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
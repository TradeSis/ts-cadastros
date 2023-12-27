<?php
//Lucas 27122023 - id747 cadastros, alterado estrutura do programa
//Helio 05102023 padrao novo
//Lucas 04042023 criado
include_once(__DIR__ . '/../header.php');
include_once(__DIR__ . '/../database/marcas.php');
$marcas = buscaMarcas();
//echo json_encode($marcas);

?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body>
    <div class="container-fluid">

        <div class="row ">
            <BR>
            <!-- MENSAGENS/ALERTAS -->
        </div>
        <div class="row">
            <BR> <!-- BOTOES AUXILIARES -->
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-1 pt-1 ">

            <div class="col-6 col-lg-6">
                <h2 class="ts-tituloPrincipal">Produtos</h2>
            </div>

            <div class="col-6 col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control ts-input" id="buscaProduto" placeholder="Buscar por nome ou eanProduto">
                    <button class="btn btn-primary rounded" type="button" id="buscar"><i class="bi bi-search"></i></button>
                    <button type="button" class="ms-4 btn btn-success" data-bs-toggle="modal" data-bs-target="#inserirPessoaModal"><i class="bi bi-plus-square"></i>&nbsp Novo</button>
                </div>
            </div>

        </div>

        <div class="table mt-2 ts-divTabela ts-tableFiltros text-center">
            <table class="table table-sm table-hover">
                <thead class="ts-headertabelafixo">
                    <tr class="ts-headerTabelaLinhaCima">
                        <th>imgProduto</th>
                        <th>eanProduto</th>
                        <th>nomeProduto</th>
                        <th>precoProduto</th>
                        <th>idMarca</th>
                        <th>ativoProduto</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>

                <tbody id='dados' class="fonteCorpo">

                </tbody>
            </table>
        </div>


        <!--------- INSERIR --------->
        <div class="modal fade bd-example-modal-lg" id="inserirPessoaModal" tabindex="-1" aria-labelledby="inserirPessoaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inserir Produtos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-inserirProdutos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label ts-label">eanProduto</label>
                                    <input type="text" class="form-control ts-input" name="eanProduto">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label ts-label">nomeProduto</label>
                                    <input type="text" class="form-control ts-input" name="nomeProduto">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label ts-label">valorCompra</label>
                                    <input type="text" class="form-control ts-input" name="valorCompra">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label ts-label">precoProduto</label>
                                    <input type="text" class="form-control ts-input" name="precoProduto">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoNcm</label>
                                    <input type="text" class="form-control ts-input" name="codigoNcm">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoCest</label>
                                    <input type="text" class="form-control ts-input" name="codigoCest">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">imgProduto</label>
                                    <input type="text" class="form-control ts-input" name="imgProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">Marca</label>
                                    <select class="form-select ts-input" name="idMarca">
                                        <?php
                                        foreach ($marcas as $marca) {
                                        ?>
                                            <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">ativoProduto</label>
                                    <input type="text" class="form-control ts-input" name="ativoProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">propagandaProduto</label>
                                    <input type="text" class="form-control ts-input" name="propagandaProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">descricaoProduto</label>
                                    <input type="text" class="form-control ts-input" name="descricaoProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">idPessoaFornecedor</label>
                                    <input type="text" class="form-control ts-input" name="idPessoaFornecedor">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">refProduto</label>
                                    <input type="text" class="form-control ts-input" name="refProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">dataAtualizacaoTributaria</label>
                                    <input type="datetime-local" class="form-control ts-input" name="dataAtualizacaoTributaria">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codImendes</label>
                                    <input type="text" class="form-control ts-input" name="codImendes">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoGrupo</label>
                                    <input type="text" class="form-control ts-input" name="codigoGrupo">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">substICMSempresa</label>
                                    <input type="text" class="form-control ts-input" name="substICMSempresa">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">substICMSFornecedor</label>
                                    <input type="text" class="form-control ts-input" name="substICMSFornecedor">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">prodZFM</label>
                                    <input type="text" class="form-control ts-input" name="prodZFM">
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
        <div class="modal fade bd-example-modal-lg" id="alterarProdutoModal" tabindex="-1" aria-labelledby="alterarProdutoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-alterarProdutos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label ts-label">eanProduto</label>
                                    <input type="text" class="form-control ts-input" name="eanProduto" id="eanProduto">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label ts-label">nomeProduto</label>
                                    <input type="text" class="form-control ts-input" name="nomeProduto" id="nomeProduto">
                                    <input type="hidden" class="form-control ts-input" name="idProduto" id="idProduto">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label ts-label">valorCompra</label>
                                    <input type="text" class="form-control ts-input" name="valorCompra" id="valorCompra">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label ts-label">precoProduto</label>
                                    <input type="text" class="form-control ts-input" name="precoProduto" id="precoProduto">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoNcm</label>
                                    <input type="text" class="form-control ts-input" name="codigoNcm" id="codigoNcm">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoCest</label>
                                    <input type="text" class="form-control ts-input" name="codigoCest" id="codigoCest">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">imgProduto</label>
                                    <input type="text" class="form-control ts-input" name="imgProduto" id="imgProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">Marca</label>
                                    <select class="form-select ts-input" name="idMarca" id="idMarca">
                                        <?php
                                        foreach ($marcas as $marca) {
                                        ?>
                                            <option value="<?php echo $marca['idMarca'] ?>"><?php echo $marca['nomeMarca']  ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">ativoProduto</label>
                                    <input type="text" class="form-control ts-input" name="ativoProduto" id="ativoProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">propagandaProduto</label>
                                    <input type="text" class="form-control ts-input" name="propagandaProduto" id="propagandaProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">descricaoProduto</label>
                                    <input type="text" class="form-control ts-input" name="descricaoProduto" id="descricaoProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">idPessoaFornecedor</label>
                                    <input type="text" class="form-control ts-input" name="idPessoaFornecedor" id="idPessoaFornecedor">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">refProduto</label>
                                    <input type="text" class="form-control ts-input" name="refProduto" id="refProduto">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">dataAtualizacaoTributaria</label>
                                    <input type="datetime-local" class="form-control ts-input" name="dataAtualizacaoTributaria" id="dataAtualizacaoTributaria">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codImendes</label>
                                    <input type="text" class="form-control ts-input" name="codImendes" id="codImendes">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">codigoGrupo</label>
                                    <input type="text" class="form-control ts-input" name="codigoGrupo" id="codigoGrupo">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md">
                                    <label class="form-label ts-label">substICMSempresa</label>
                                    <input type="text" class="form-control ts-input" name="substICMSempresa" id="substICMSempresa">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">substICMSFornecedor</label>
                                    <input type="text" class="form-control ts-input" name="substICMSFornecedor" id="substICMSFornecedor">
                                </div>
                                <div class="col-md">
                                    <label class="form-label ts-label">prodZFM</label>
                                    <input type="text" class="form-control ts-input" name="prodZFM" id="prodZFM">
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
        <div class="modal fade bd-example-modal-lg" id="excluirProdutoModal" tabindex="-1" aria-labelledby="excluirProdutoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form-excluirProdutos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label ts-label">eanProduto</label>
                                    <input type="text" class="form-control ts-input" name="eanProduto" id="EXCeanProduto" readonly>
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label ts-label">nomeProduto</label>
                                    <input type="text" class="form-control ts-input" name="nomeProduto" id="EXCnomeProduto" readonly>
                                    <input type="hidden" class="form-control ts-input" name="idProduto" id="EXCidProduto">
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

    </div><!--container-fluid-->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        buscar($("#buscaProduto").val());

        function limpar() {
            buscar(null, null, null, null);
            window.location.reload();
        }

        function buscar(buscaProduto) {
            //alert(buscaProduto);
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo URLROOT ?>/cadastros/database/produtos.php?operacao=filtrar',
                beforeSend: function() {
                    $("#dados").html("Carregando...");
                },
                data: {
                    buscaProduto: buscaProduto
                },
                success: function(msg) {
                    //alert("segundo alert: " + msg);
                    var json = JSON.parse(msg);

                    var linha = "";
                    for (var $i = 0; $i < json.length; $i++) {
                        var object = json[$i];

                        linha = linha + "<tr>";
                        linha = linha + "<td>" + object.imgProduto + "</td>";
                        linha = linha + "<td>" + object.eanProduto + "</td>";
                        linha = linha + "<td>" + object.nomeProduto + "</td>";
                        linha = linha + "<td>" + object.precoProduto + "</td>";
                        linha = linha + "<td>" + object.idMarca + "</td>";
                        linha = linha + "<td>" + object.ativoProduto + "</td>";

                        linha = linha + "<td>" + "<button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#alterarProdutoModal' data-idProduto='" + object.idProduto + "'><i class='bi bi-pencil-square'></i></button> " +
                            "<button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#excluirProdutoModal' data-idProduto='" + object.idProduto + "'><i class='bi bi-trash3'></i></button>"
                        linha = linha + "</tr>";
                    }
                    $("#dados").html(linha);
                }
            });
        }

        $("#buscar").click(function() {
            buscar($("#buscaProduto").val());
        })

        document.addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                buscar($("#buscaProduto").val());
            }
        });

        $(document).on('click', 'button[data-bs-target="#alterarProdutoModal"]', function() {
            var idProduto = $(this).attr("data-idProduto");
            //alert(idProduto)
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../database/produtos.php?operacao=buscar',
                data: {
                    idProduto: idProduto
                },
                success: function(data) {
                    $('#idProduto').val(data.idProduto);
                    $('#eanProduto').val(data.eanProduto);
                    $('#nomeProduto').val(data.nomeProduto);
                    $('#valorCompra').val(data.valorCompra);
                    $('#precoProduto').val(data.precoProduto);
                    $('#codigoNcm').val(data.codigoNcm);
                    $('#codigoCest').val(data.codigoCest);
                    $('#imgProduto').val(data.imgProduto);
                    $('#idMarca').val(data.idMarca);
                    $('#ativoProduto').val(data.ativoProduto);
                    $('#propagandaProduto').val(data.propagandaProduto);
                    $('#descricaoProduto').val(data.descricaoProduto);
                    $('#idPessoaFornecedor').val(data.idPessoaFornecedor);
                    $('#refProduto').val(data.refProduto);
                    $('#dataAtualizacaoTributaria').val(data.dataAtualizacaoTributaria);
                    $('#codImendes').val(data.codImendes);
                    $('#codigoGrupo').val(data.codigoGrupo);
                    $('#substICMSempresa').val(data.substICMSempresa);
                    $('#substICMSFornecedor').val(data.substICMSFornecedor);
                    $('#prodZFM').val(data.prodZFM);

                    $('#alterarProdutoModal').modal('show');
                }
            });
        });

        $(document).on('click', 'button[data-bs-target="#excluirProdutoModal"]', function() {
            var idProduto = $(this).attr("data-idProduto");
            //alert(idProduto)
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../database/produtos.php?operacao=buscar',
                data: {
                    idProduto: idProduto
                },
                success: function(data) {
                    $('#EXCidProduto').val(data.idProduto);
                    $('#EXCeanProduto').val(data.eanProduto);
                    $('#EXCnomeProduto').val(data.nomeProduto);

                    $('#excluirProdutoModal').modal('show');
                }
            });
        });

        $(document).ready(function() {
            $("#form-inserirProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/produtos.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#form-alterarProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/produtos.php?operacao=alterar",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            $("#form-excluirProdutos").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/produtos.php?operacao=excluir",
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

            $("input[name='eanProduto']").on("input", function() {
                var eanProduto = $(this).val();
                if (eanProduto.length === 13) {
                    verificaCampoEanProduto(eanProduto);
                }
            });


            function verificaCampoEanProduto(eanProduto) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../database/produtos.php?operacao=verificaEanProduto',
                    data: {
                        eanProduto: eanProduto
                    },
                    success: function(data) {
                        //alert(data)
                        if (data == 'LIBERADO') {} else {
                            alert('eanProduto já cadastrado!');
                        }
                    }
                });
            }
        });

    </script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
<div class="modal fade bd-example-modal-lg" id="visualizarGrupoProdutoModal" tabindex="-1" aria-labelledby="visualizarGrupoProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Grupo - </h5>&nbsp;<h5 class="modal-title" id="textoCodigoGrupo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="tabs" role="tablist" style="margin-top: -10px;">
                    <li class="nav-item">
                        <a class="nav-link ts-tabModal active" id="basic-tab" data-bs-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">Grupos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ts-tabModal" id="advanced-tab" data-bs-toggle="tab" href="#advanced" role="tab" aria-controls="advanced" aria-selected="false">Regras</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabsContent">
                    <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label ts-label">codigoGrupo</label>
                                <input type="text" class="form-control ts-input" name="codigoGrupo" id="codigoGrupo" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">nomeGrupo</label>
                                <input type="text" class="form-control ts-input" name="nomeGrupo" id="nomeGrupo" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label ts-label">codigoNcm</label>
                                <input type="text" class="form-control ts-input" name="codigoNcm" id="codigoNcm" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md">
                                <label class="form-label ts-label">codigoCest</label>
                                <input type="text" class="form-control ts-input" name="codigoCest" id="codigoCest" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">impostoImportacao</label>
                                <input type="text" class="form-control ts-input" name="impostoImportacao" id="impostoImportacao" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">piscofinscstEnt</label>
                                <input type="text" class="form-control ts-input" name="piscofinscstEnt" id="piscofinscstEnt" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md">
                                <label class="form-label ts-label">piscofinscstSai</label>
                                <input type="text" class="form-control ts-input" name="piscofinscstSai" id="piscofinscstSai" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">aliqPis</label>
                                <input type="text" class="form-control ts-input" name="aliqPis" id="aliqPis" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">aliqCofins</label>
                                <input type="text" class="form-control ts-input" name="aliqCofins" id="aliqCofins" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md">
                                <label class="form-label ts-label">nri</label>
                                <input type="text" class="form-control ts-input" name="nri" id="nri" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">ampLegal</label>
                                <input type="text" class="form-control ts-input" name="ampLegal" id="ampLegal" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">redPIS</label>
                                <input type="text" class="form-control ts-input" name="redPIS" id="redPIS" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md">
                                <label class="form-label ts-label">redCofins</label>
                                <input type="text" class="form-control ts-input" name="redCofins" id="redCofins" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">ipicstEnt</label>
                                <input type="text" class="form-control ts-input" name="ipicstEnt" id="ipicstEnt" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">ipicstSai</label>
                                <input type="text" class="form-control ts-input" name="ipicstSai" id="ipicstSai" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md">
                                <label class="form-label ts-label">aliqipi</label>
                                <input type="text" class="form-control ts-input" name="aliqipi" id="aliqipi" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">codenq</label>
                                <input type="text" class="form-control ts-input" name="codenq" id="codenq" readonly>
                            </div>
                            <div class="col-md">
                                <label class="form-label ts-label">ipiex</label>
                                <input type="text" class="form-control ts-input" name="ipiex" id="ipiex" readonly>
                            </div>
                        </div>

                    </div><!-- aba1 -->

                    <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">

                        <div class="table ts-divTabela ts-tableFiltros text-center">
                            <table class="table table-sm table-hover">
                                <thead class="ts-headertabelafixo">
                                    <tr class="ts-headerTabelaLinhaCima">
                                        <th>codigoGrupo</th>
                                        <th>nomeGrupo</th>
                                        <th>codigoNcm</th>
                                        <th>codigoCest</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id='tabela_regrafiscal' class="fonteCorpo">

                                </tbody>
                            </table>
                        </div>
                        
                    </div><!-- aba2 -->
                </div>
            </div><!--body-->

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRegraFiscal" tabindex="-1" aria-labelledby="modalRegraFiscalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Regra Fiscal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <label class="form-label ts-label">codigoGrupo</label>
                        <input type="text" class="form-control ts-input" name="codigoGrupo" id="codigoGrupo_regrafiscal" readonly>     
                    </div>
                    
                    <div class="col-md">
                        <label class="form-label ts-label">codigoEstado</label>
                        <input type="text" class="form-control ts-input" name="codigoEstado" id="codigoEstado_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">cFOP</label>
                        <input type="text" class="form-control ts-input" name="cFOP" id="cFOP_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">codigoCaracTrib</label>
                        <input type="text" class="form-control ts-input" name="codigoCaracTrib" id="codigoCaracTrib_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">finalidade</label>
                        <input type="text" class="form-control ts-input" name="finalidade" id="finalidade_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">codRegra</label>
                        <input type="text" class="form-control ts-input" name="codRegra" id="codRegra_regrafiscal" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md">
                        <label class="form-label ts-label">codExcecao</label>
                        <input type="text" class="form-control ts-input" name="codExcecao" id="codExcecao_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">dtVigIni</label>
                        <input type="text" class="form-control ts-input" name="dtVigIni" id="dtVigIni_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">dtVigFin</label>
                        <input type="text" class="form-control ts-input" name="dtVigFin" id="dtVigFin_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">cFOPCaracTrib</label>
                        <input type="text" class="form-control ts-input" name="cFOPCaracTrib" id="cFOPCaracTrib_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">cST</label>
                        <input type="text" class="form-control ts-input" name="cST" id="cST_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">cSOSN</label>
                        <input type="text" class="form-control ts-input" name="cSOSN" id="cSOSN_regrafiscal" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md">
                        <label class="form-label ts-label">aliqIcmsInterna</label>
                        <input type="text" class="form-control ts-input" name="aliqIcmsInterna" id="aliqIcmsInterna_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">aliqIcmsInterestadual</label>
                        <input type="text" class="form-control ts-input" name="aliqIcmsInterestadual" id="aliqIcmsInterestadual_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">reducaoBcIcms</label>
                        <input type="text" class="form-control ts-input" name="reducaoBcIcms" id="reducaoBcIcms_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">reducaoBcIcmsSt</label>
                        <input type="text" class="form-control ts-input" name="reducaoBcIcmsSt" id="reducaoBcIcmsSt_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">redBcICMsInterestadual</label>
                        <input type="text" class="form-control ts-input" name="redBcICMsInterestadual" id="redBcICMsInterestadual_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">aliqIcmsSt</label>
                        <input type="text" class="form-control ts-input" name="aliqIcmsSt" id="aliqIcmsSt_regrafiscal" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md">
                        <label class="form-label ts-label">iVA</label>
                        <input type="text" class="form-control ts-input" name="iVA" id="iVA_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">iVAAjust</label>
                        <input type="text" class="form-control ts-input" name="iVAAjust" id="iVAAjust_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">fCP</label>
                        <input type="text" class="form-control ts-input" name="fCP" id="fCP_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">codBenef</label>
                        <input type="text" class="form-control ts-input" name="codBenef" id="codBenef_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">pDifer</label>
                        <input type="text" class="form-control ts-input" name="pDifer" id="pDifer_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">pIsencao</label>
                        <input type="text" class="form-control ts-input" name="pIsencao" id="pIsencao_regrafiscal" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md">
                        <label class="form-label ts-label">antecipado</label>
                        <input type="text" class="form-control ts-input" name="antecipado" id="antecipado_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">desonerado</label>
                        <input type="text" class="form-control ts-input" name="desonerado" id="desonerado_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">pICMSDeson</label>
                        <input type="text" class="form-control ts-input" name="pICMSDeson" id="pICMSDeson_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">isento</label>
                        <input type="text" class="form-control ts-input" name="isento" id="isento_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">tpCalcDifal</label>
                        <input type="text" class="form-control ts-input" name="tpCalcDifal" id="tpCalcDifal_regrafiscal" readonly>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label ts-label">ampLegal</label>
                        <input type="text" class="form-control ts-input" name="ampLegal" id="ampLegal_regrafiscal_regrafiscal" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md">
                        <label class="form-label ts-label">Protocolo</label>
                        <input type="text" class="form-control ts-input" name="Protocolo" id="Protocolo_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">Convenio</label>
                        <input type="text" class="form-control ts-input" name="Convenio" id="Convenio_regrafiscal" readonly>
                    </div>
                    <div class="col-md">
                        <label class="form-label ts-label">regraGeral</label>
                        <input type="text" class="form-control ts-input" name="regraGeral" id="regraGeral_regrafiscal" readonly>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

<!-- LOCAL PARA COLOCAR OS JS -->

<?php include_once ROOT . "/vendor/footer_js.php"; ?>

<script>
    //alert(codigoGrupo_tabelaRegrafiscal);

    //alert(buscaGrupoProduto);
    $(document).on('click', 'button[data-bs-target="#modalRegraFiscal"]', function() {
        var idRegraFiscal = $(this).attr("data-idRegraFiscal");
        //alert(idRegraFiscal)
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo URLROOT ?>/impostos/database/regrafiscal.php?operacao=buscar',
            data: {
                idRegraFiscal: idRegraFiscal
            },
            success: function(data) {
                //alert(json.stringfy(data))
                $('#idRegraFiscal').val(data.idRegraFiscal);

                $('#codigoGrupo_regrafiscal').val(data.codigoGrupo);
                $('#codigoEstado_regrafiscal').val(data.codigoEstado);
                $('#cFOP_regrafiscal').val(data.cFOP);
                $('#codigoCaracTrib_regrafiscal').val(data.codigoCaracTrib);
                $('#finalidade_regrafiscal').val(data.finalidade);
                $('#codRegra_regrafiscal').val(data.codRegra);
                $('#codExcecao_regrafiscal').val(data.codExcecao);
                $('#dtVigIni_regrafiscal').val(data.dtVigIniFormatada);
                $('#dtVigFin_regrafiscal').val(data.dtVigFinFormatada);
                $('#cFOPCaracTrib_regrafiscal').val(data.cFOPCaracTrib);
                $('#cST_regrafiscal').val(data.cST);
                $('#cSOSN_regrafiscal').val(data.cSOSN);
                $('#aliqIcmsInterna_regrafiscal').val(data.aliqIcmsInterna);
                $('#aliqIcmsInterestadual_regrafiscal').val(data.aliqIcmsInterestadual);
                $('#reducaoBcIcms_regrafiscal').val(data.reducaoBcIcms);
                $('#reducaoBcIcmsSt_regrafiscal').val(data.reducaoBcIcmsSt);
                $('#redBcICMsInterestadual_regrafiscal').val(data.redBcICMsInterestadual);
                $('#aliqIcmsSt_regrafiscal').val(data.aliqIcmsSt);
                $('#iVA_regrafiscal').val(data.iVA);
                $('#iVAAjust_regrafiscal').val(data.iVAAjust);
                $('#fCP_regrafiscal').val(data.fCP);
                $('#codBenef_regrafiscal').val(data.codBenef);
                $('#pDifer_regrafiscal').val(data.pDifer);
                $('#pIsencao_regrafiscal').val(data.pIsencao);
                $('#antecipado_regrafiscal').val(data.antecipado);
                $('#desonerado_regrafiscal').val(data.desonerado);
                $('#pICMSDeson_regrafiscal').val(data.pICMSDeson);
                $('#isento_regrafiscal').val(data.isento);
                $('#tpCalcDifal_regrafiscal').val(data.tpCalcDifal);
                $('#ampLegal_regrafiscal_regrafiscal').val(data.ampLegal);
                $('#Protocolo_regrafiscal').val(data.Protocolo);
                $('#Convenio_regrafiscal').val(data.Convenio);
                $('#regraGeral_regrafiscal').val(data.regraGeral);


                $('#modalRegraFiscal').modal('show');
            },
            error: function(xhr, status, error) {
                    alert("ERRO="+JSON.stringify(error));
                }

        });
    });
</script>
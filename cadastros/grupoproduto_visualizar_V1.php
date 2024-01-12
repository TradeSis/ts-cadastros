<div class="modal fade bd-example-modal-lg" id="visualizarGrupoProdutoModal" tabindex="-1" aria-labelledby="visualizarGrupoProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Grupo Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs mt-2" id="tabs" role="tablist" style="margin-top: -10px;">
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
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codigoGrupo: </strong> <span id="codigoGrupo_regrafiscal"></span></span>
                        </div>    
                    </div>
                    
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codigoEstado: </strong> <span id="codigoEstado_regrafiscal"></span></span>
                        </div> 
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>cFOP: </strong> <span id="cFOP_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codigoCaracTrib: </strong> <span id="codigoCaracTrib_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>finalidade: </strong> <span id="finalidade_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codRegra: </strong> <span id="codRegra_regrafiscal"></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codExcecao: </strong> <span id="codExcecao_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>dtVigIni: </strong> <span id="dtVigIni_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>dtVigFin: </strong> <span id="dtVigFin_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>cFOPCaracTrib: </strong> <span id="cFOPCaracTrib_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>cST: </strong> <span id="cST_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>cSOSN: </strong> <span id="cSOSN_regrafiscal"></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>aliqIcmsInterna: </strong> <span id="aliqIcmsInterna_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>aliqIcmsInterestadual: </strong> <span id="aliqIcmsInterestadual_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>reducaoBcIcms: </strong> <span id="reducaoBcIcms_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>reducaoBcIcmsSt: </strong> <span id="reducaoBcIcmsSt_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>redBcICMsInterestadual: </strong> <span id="redBcICMsInterestadual_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>aliqIcmsSt: </strong> <span id="aliqIcmsSt_regrafiscal"></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>iVA: </strong> <span id="iVA_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>iVAAjust: </strong> <span id="iVAAjust_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>fCP: </strong> <span id="fCP_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>codBenef: </strong> <span id="codBenef_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>pDifer: </strong> <span id="pDifer_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>pIsencao: </strong> <span id="pIsencao_regrafiscal"></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>antecipado: </strong> <span id="antecipado_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>desonerado: </strong> <span id="desonerado_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>pICMSDeson: </strong> <span id="pICMSDeson_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>isento: </strong> <span id="isento_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>tpCalcDifal: </strong> <span id="tpCalcDifal_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>ampLegal: </strong> <span id="ampLegal_regrafiscal"></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>Protocolo: </strong> <span id="Protocolo_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>Convenio: </strong> <span id="Convenio_regrafiscal"></span></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md d-flex">
                            <span class="ts-subTitulo"><strong>regraGeral: </strong> <span id="regraGeral_regrafiscal"></span></span>
                        </div>
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
                $('#idRegraFiscal').val(data.idRegraFiscal);

                $codigoGrupo_regrafiscal = data.codigoGrupo;
                var vtitulo = $("#codigoGrupo_regrafiscal");
                vtitulo.html($codigoGrupo_regrafiscal);

                $codigoEstado_regrafiscal = data.codigoEstado;
                var vtitulo = $("#codigoEstado_regrafiscal");
                vtitulo.html($codigoEstado_regrafiscal);

                $cFOP_regrafiscal = data.cFOP;
                var vtitulo = $("#cFOP_regrafiscal");
                vtitulo.html($cFOP_regrafiscal);

                $codigoCaracTrib_regrafiscal = data.codigoCaracTrib;
                var vtitulo = $("#codigoCaracTrib_regrafiscal");
                vtitulo.html($codigoCaracTrib_regrafiscal);

                $finalidade_regrafiscal = data.finalidade;
                var vtitulo = $("#finalidade_regrafiscal");
                vtitulo.html($finalidade_regrafiscal);

                $codRegra_regrafiscal = data.codRegra;
                var vtitulo = $("#codRegra_regrafiscal");
                vtitulo.html($codRegra_regrafiscal);

                $codExcecao_regrafiscal = data.codExcecao;
                var vtitulo = $("#codExcecao_regrafiscal");
                vtitulo.html($codExcecao_regrafiscal);

                $dtVigIni_regrafiscal = data.dtVigIni;
                var vtitulo = $("#dtVigIni_regrafiscal");
                vtitulo.html($dtVigIni_regrafiscal);

                $dtVigFin_regrafiscal = data.dtVigFin;
                var vtitulo = $("#dtVigFin_regrafiscal");
                vtitulo.html($dtVigFin_regrafiscal);

                $cFOPCaracTrib_regrafiscal = data.cFOPCaracTrib;
                var vtitulo = $("#cFOPCaracTrib_regrafiscal");
                vtitulo.html($cFOPCaracTrib_regrafiscal);

                $cST_regrafiscal = data.cST;
                var vtitulo = $("#cST_regrafiscal");
                vtitulo.html($cST_regrafiscal);

                $cSOSN_regrafiscal = data.cSOSN;
                var vtitulo = $("#cSOSN_regrafiscal");
                vtitulo.html($cSOSN_regrafiscal);

                $aliqIcmsInterna_regrafiscal = data.aliqIcmsInterna;
                var vtitulo = $("#aliqIcmsInterna_regrafiscal");
                vtitulo.html($aliqIcmsInterna_regrafiscal);

                $aliqIcmsInterestadual_regrafiscal = data.aliqIcmsInterestadual;
                var vtitulo = $("#aliqIcmsInterestadual_regrafiscal");
                vtitulo.html($aliqIcmsInterestadual_regrafiscal);

                $reducaoBcIcms_regrafiscal = data.reducaoBcIcms;
                var vtitulo = $("#reducaoBcIcms_regrafiscal");
                vtitulo.html($reducaoBcIcms_regrafiscal);

                $reducaoBcIcmsSt_regrafiscal = data.reducaoBcIcmsSt;
                var vtitulo = $("#reducaoBcIcmsSt_regrafiscal");
                vtitulo.html($reducaoBcIcmsSt_regrafiscal);

                $redBcICMsInterestadual_regrafiscal = data.redBcICMsInterestadual;
                var vtitulo = $("#redBcICMsInterestadual_regrafiscal");
                vtitulo.html($redBcICMsInterestadual_regrafiscal);

                $aliqIcmsSt_regrafiscal = data.aliqIcmsSt;
                var vtitulo = $("#aliqIcmsSt_regrafiscal");
                vtitulo.html($aliqIcmsSt_regrafiscal);

                $iVA_regrafiscal = data.iVA;
                var vtitulo = $("#iVA_regrafiscal");
                vtitulo.html($iVA_regrafiscal);

                $iVAAjust_regrafiscal = data.iVAAjust;
                var vtitulo = $("#iVAAjust_regrafiscal");
                vtitulo.html($iVAAjust_regrafiscal);

                $fCP_regrafiscal = data.fCP;
                var vtitulo = $("#fCP_regrafiscal");
                vtitulo.html($fCP_regrafiscal);

                $codBenef_regrafiscal = data.codBenef;
                var vtitulo = $("#codBenef_regrafiscal");
                vtitulo.html($codBenef_regrafiscal);

                $pDifer_regrafiscal = data.pDifer;
                var vtitulo = $("#pDifer_regrafiscal");
                vtitulo.html($pDifer_regrafiscal);

                $pIsencao_regrafiscal = data.pIsencao;
                var vtitulo = $("#pIsencao_regrafiscal");
                vtitulo.html($pIsencao_regrafiscal);
              
                $antecipado_regrafiscal = data.antecipado;
                var vtitulo = $("#antecipado_regrafiscal");
                vtitulo.html($antecipado_regrafiscal);

                $desonerado_regrafiscal = data.desonerado;
                var vtitulo = $("#desonerado_regrafiscal");
                vtitulo.html($desonerado_regrafiscal);

                $pICMSDeson_regrafiscal = data.pICMSDeson;
                var vtitulo = $("#pICMSDeson_regrafiscal");
                vtitulo.html($pICMSDeson_regrafiscal);

                $isento_regrafiscal = data.isento;
                var vtitulo = $("#isento_regrafiscal");
                vtitulo.html($isento_regrafiscal);

                $tpCalcDifal_regrafiscal = data.tpCalcDifal;
                var vtitulo = $("#tpCalcDifal_regrafiscal");
                vtitulo.html($tpCalcDifal_regrafiscal);

                $ampLegal_regrafiscal = data.ampLegal;
                var vtitulo = $("#ampLegal_regrafiscal");
                vtitulo.html($ampLegal_regrafiscal);

                $Protocolo_regrafiscal = data.Protocolo;
                var vtitulo = $("#Protocolo_regrafiscal");
                vtitulo.html($Protocolo_regrafiscal);

                $Convenio_regrafiscal = data.Convenio;
                var vtitulo = $("#Convenio_regrafiscal");
                vtitulo.html($Convenio_regrafiscal);

                $regraGeral_regrafiscal = data.regraGeral;
                var vtitulo = $("#regraGeral_regrafiscal");
                vtitulo.html($regraGeral_regrafiscal);

                $('#modalRegraFiscal').modal('show');
            }

        });
    });
</script>
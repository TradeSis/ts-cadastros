<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "produtos_inserir";
    if (isset($LOG_NIVEL)) {
        if ($LOG_NIVEL >= 1) {
            $arquivo = fopen(defineCaminhoLog() . "cadastros_" . date("dmY") . ".log", "a");
        }
    }
}
if (isset($LOG_NIVEL)) {
    if ($LOG_NIVEL == 1) {
        fwrite($arquivo, $identificacao . "\n");
    }
    if ($LOG_NIVEL >= 2) {
        fwrite($arquivo, $identificacao . "-ENTRADA->" . json_encode($jsonEntrada) . "\n");
    }
}
//LOG

$idEmpresa = null;
if (isset($jsonEntrada["idEmpresa"])) {
    $idEmpresa = $jsonEntrada["idEmpresa"];
}
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['eanProduto'])) {

    $eanProduto = isset($jsonEntrada['eanProduto']) && $jsonEntrada['eanProduto'] !== "" ? "'" . $jsonEntrada['eanProduto'] . "'" : "NULL";
    $nomeProduto = isset($jsonEntrada['nomeProduto']) && $jsonEntrada['nomeProduto'] !== "" ? "'" . $jsonEntrada['nomeProduto'] . "'" : "NULL";
    $valorCompra = isset($jsonEntrada['valorCompra']) && $jsonEntrada['valorCompra'] !== "" ? "'" . $jsonEntrada['valorCompra'] . "'" : "NULL";
    $precoProduto = isset($jsonEntrada['precoProduto']) && $jsonEntrada['precoProduto'] !== "" ? "'" . $jsonEntrada['precoProduto'] . "'" : "NULL";
    $codigoNcm = isset($jsonEntrada['codigoNcm']) && $jsonEntrada['codigoNcm'] !== "" ? "'" . $jsonEntrada['codigoNcm'] . "'" : "NULL";
    $codigoCest = isset($jsonEntrada['codigoCest']) && $jsonEntrada['codigoCest'] !== "" ? "'" . $jsonEntrada['codigoCest'] . "'" : "NULL";
    $imgProduto = isset($jsonEntrada['imgProduto']) && $jsonEntrada['imgProduto'] !== "" ? "'" . $jsonEntrada['imgProduto'] . "'" : "NULL";
    $idMarca = isset($jsonEntrada['idMarca']) && $jsonEntrada['idMarca'] !== "" ? "'" . $jsonEntrada['idMarca'] . "'" : "NULL";
    $ativoProduto = isset($jsonEntrada['ativoProduto']) && $jsonEntrada['ativoProduto'] !== "" ? "'" . $jsonEntrada['ativoProduto'] . "'" : "NULL";
    $propagandaProduto = isset($jsonEntrada['propagandaProduto']) && $jsonEntrada['propagandaProduto'] !== "" ? "'" . $jsonEntrada['propagandaProduto'] . "'" : "NULL";
    $descricaoProduto = isset($jsonEntrada['descricaoProduto']) && $jsonEntrada['descricaoProduto'] !== "" ? "'" . $jsonEntrada['descricaoProduto'] . "'" : "NULL";
    $idPessoaFornecedor = isset($jsonEntrada['idPessoaFornecedor']) && $jsonEntrada['idPessoaFornecedor'] !== "" ? "'" . $jsonEntrada['idPessoaFornecedor'] . "'" : "NULL";
    $refProduto = isset($jsonEntrada['refProduto']) && $jsonEntrada['refProduto'] !== "" ? "'" . $jsonEntrada['refProduto'] . "'" : "NULL";
    $dataAtualizacaoTributaria = isset($jsonEntrada['dataAtualizacaoTributaria']) && $jsonEntrada['dataAtualizacaoTributaria'] !== "" ? "'" . $jsonEntrada['dataAtualizacaoTributaria'] . "'" : "NULL";
    $codImendes = isset($jsonEntrada['codImendes']) && $jsonEntrada['codImendes'] !== "" ? "'" . $jsonEntrada['codImendes'] . "'" : "NULL";
    $codigoGrupo = isset($jsonEntrada['codigoGrupo']) && $jsonEntrada['codigoGrupo'] !== "" ? "'" . $jsonEntrada['codigoGrupo'] . "'" : "NULL";
    $substICMSempresa = isset($jsonEntrada['substICMSempresa']) && $jsonEntrada['substICMSempresa'] !== "" ? "'" . $jsonEntrada['substICMSempresa'] . "'" : "'N'";
    $substICMSFornecedor = isset($jsonEntrada['substICMSFornecedor']) && $jsonEntrada['substICMSFornecedor'] !== "" ? "'" . $jsonEntrada['substICMSFornecedor'] . "'" : "'N'";
    $prodZFM = isset($jsonEntrada['prodZFM']) && $jsonEntrada['prodZFM'] !== "" ? "'" . $jsonEntrada['prodZFM'] . "'" : "'N'";
   
    $sql = "INSERT INTO produtos (eanProduto, nomeProduto, valorCompra, precoProduto, codigoNcm, 
    codigoCest, imgProduto, idMarca, ativoProduto, propagandaProduto, descricaoProduto, idPessoaFornecedor, 
    refProduto, dataAtualizacaoTributaria, codImendes, codigoGrupo, substICMSempresa, substICMSFornecedor, prodZFM) 
    VALUES ($eanProduto, $nomeProduto, $valorCompra, $precoProduto, $codigoNcm,
    $codigoCest, $imgProduto, $idMarca, $ativoProduto, $propagandaProduto, $descricaoProduto, $idPessoaFornecedor,
    $refProduto, $dataAtualizacaoTributaria, $codImendes, $codigoGrupo, $substICMSempresa, $substICMSFornecedor, $prodZFM)";

    //echo "-ENTRADA->".json_encode($sql)."\n";

    //LOG
    if (isset($LOG_NIVEL)) {
        if ($LOG_NIVEL >= 3) {
            fwrite($arquivo, $identificacao . "-SQL->" . $sql . "\n");
        }
    }
    //LOG

    //TRY-CATCH
    try {

        $atualizar = mysqli_query($conexao, $sql);
        if (!$atualizar)
            throw new Exception(mysqli_error($conexao));

        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } catch (Exception $e) {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => $e->getMessage()
        );
        if ($LOG_NIVEL >= 1) {
            fwrite($arquivo, $identificacao . "-ERRO->" . $e->getMessage() . "\n");
        }
    } finally {
        // ACAO EM CASO DE ERRO (CATCH), que mesmo assim precise
    }
    //TRY-CATCH


} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );
}

//LOG
if (isset($LOG_NIVEL)) {
    if ($LOG_NIVEL >= 2) {
        fwrite($arquivo, $identificacao . "-SAIDA->" . json_encode($jsonSaida) . "\n\n");
    }
}
//LOG

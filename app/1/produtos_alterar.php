<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "produtos_alterar";
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

if (isset($jsonEntrada['idProduto'])) {

    $idProduto = isset($jsonEntrada['idProduto']) && $jsonEntrada['idProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idProduto']) . "'" : "NULL";
    $eanProduto = isset($jsonEntrada['eanProduto']) && $jsonEntrada['eanProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['eanProduto']) . "'" : "NULL";
    $nomeProduto = isset($jsonEntrada['nomeProduto']) && $jsonEntrada['nomeProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['nomeProduto']) . "'" : "NULL";
    $valorCompra = isset($jsonEntrada['valorCompra']) && $jsonEntrada['valorCompra'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['valorCompra']) . "'" : "NULL";
    $precoProduto = isset($jsonEntrada['precoProduto']) && $jsonEntrada['precoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['precoProduto']) . "'" : "NULL";
    $codigoNcm = isset($jsonEntrada['codigoNcm']) && $jsonEntrada['codigoNcm'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoNcm']) . "'" : "NULL";
    $codigoCest = isset($jsonEntrada['codigoCest']) && $jsonEntrada['codigoCest'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoCest']) . "'" : "NULL";
    $imgProduto = isset($jsonEntrada['imgProduto']) && $jsonEntrada['imgProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['imgProduto']) . "'" : "NULL";
    $idMarca = isset($jsonEntrada['idMarca']) && $jsonEntrada['idMarca'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idMarca']) . "'" : "NULL";
    $ativoProduto = isset($jsonEntrada['ativoProduto']) && $jsonEntrada['ativoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['ativoProduto']) . "'" : "NULL";
    $propagandaProduto = isset($jsonEntrada['propagandaProduto']) && $jsonEntrada['propagandaProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['propagandaProduto']) . "'" : "NULL";
    $descricaoProduto = isset($jsonEntrada['descricaoProduto']) && $jsonEntrada['descricaoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['descricaoProduto']) . "'" : "NULL";
    $idPessoaFornecedor = isset($jsonEntrada['idPessoaFornecedor']) && $jsonEntrada['idPessoaFornecedor'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idPessoaFornecedor']) . "'" : "NULL";
    $refProduto = isset($jsonEntrada['refProduto']) && $jsonEntrada['refProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['refProduto']) . "'" : "NULL";
    $dataAtualizacaoTributaria = isset($jsonEntrada['dataAtualizacaoTributaria']) && $jsonEntrada['dataAtualizacaoTributaria'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['dataAtualizacaoTributaria']) . "'" : "NULL";
    $codImendes = isset($jsonEntrada['codImendes']) && $jsonEntrada['codImendes'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codImendes']) . "'" : "NULL";
    $codigoGrupo = isset($jsonEntrada['codigoGrupo']) && $jsonEntrada['codigoGrupo'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoGrupo']) . "'" : "NULL";
    $substICMSempresa = isset($jsonEntrada['substICMSempresa']) && $jsonEntrada['substICMSempresa'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['substICMSempresa']) . "'" : "NULL";
    $substICMSFornecedor = isset($jsonEntrada['substICMSFornecedor']) && $jsonEntrada['substICMSFornecedor'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['substICMSFornecedor']) . "'" : "NULL";
    $prodZFM = isset($jsonEntrada['prodZFM']) && $jsonEntrada['prodZFM'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['prodZFM']) . "'" : "NULL";
   

    $sql = "UPDATE produtos SET eanProduto=$eanProduto, nomeProduto=$nomeProduto, valorCompra=$valorCompra,
    precoProduto=$precoProduto, codigoNcm=$codigoNcm, codigoCest=$codigoCest, imgProduto=$imgProduto,
    idMarca=$idMarca, ativoProduto=$ativoProduto, propagandaProduto=$propagandaProduto,descricaoProduto=$descricaoProduto,
    idPessoaFornecedor=$idPessoaFornecedor, refProduto=$refProduto, dataAtualizacaoTributaria=$dataAtualizacaoTributaria,
    codImendes=$codImendes,codigoGrupo=$codigoGrupo, substICMSempresa=$substICMSempresa, substICMSFornecedor=$substICMSFornecedor,
    prodZFM=$prodZFM WHERE idProduto = $idProduto";

   
    //echo $sql;

    //LOG
    if (isset($LOG_NIVEL)) {
        if ($LOG_NIVEL >= 3) {
            fwrite($arquivo, $identificacao . "-imgProduto->" . $imgProduto . "\n");
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

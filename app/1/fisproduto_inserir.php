<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "servicos_inserir";
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
if (isset($jsonEntrada['codigoProduto'])) {

    $codigoProduto = isset($jsonEntrada['codigoProduto']) && $jsonEntrada['codigoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoProduto']) . "'" : "NULL";
    $nomeProduto = isset($jsonEntrada['nomeProduto']) && $jsonEntrada['nomeProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['nomeProduto']) . "'" : "NULL";
    $quantidade = isset($jsonEntrada['quantidade']) && $jsonEntrada['quantidade'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['quantidade']) . "'" : "NULL";
    $unidCom = isset($jsonEntrada['unidCom']) && $jsonEntrada['unidCom'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['unidCom']) . "'" : "NULL";
    $valorUnidade = isset($jsonEntrada['valorUnidade']) && $jsonEntrada['valorUnidade'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['valorUnidade']) . "'" : "NULL";
    $valorTotal = isset($jsonEntrada['valorTotal']) && $jsonEntrada['valorTotal'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['valorTotal']) . "'" : "NULL";
    $cfop = isset($jsonEntrada['cfop']) && $jsonEntrada['cfop'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['cfop']) . "'" : "NULL";
    $ncm = isset($jsonEntrada['ncm']) && $jsonEntrada['ncm'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['ncm']) . "'" : "NULL";
    $cest = isset($jsonEntrada['cest']) && $jsonEntrada['cest'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['cest']) . "'" : "NULL";
    $chaveNFe = isset($jsonEntrada['chaveNFe']) && $jsonEntrada['chaveNFe'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['chaveNFe']) . "'" : "NULL";

    $sql = "INSERT INTO fisproduto(codigoProduto, nomeProduto, quantidade, unidCom, valorUnidade, valorTotal, cfop, ncm, cest, chaveNFe) VALUES ($codigoProduto, $nomeProduto, $quantidade, $unidCom, $valorUnidade, $valorTotal, $cfop, $ncm, $cest, $chaveNFe)";

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

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
if (isset($jsonEntrada['nomeProduto'])) {

    $idMarca = isset($jsonEntrada['idMarca']) && $jsonEntrada['idMarca'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idMarca']) . "'" : "NULL";
    $precoProduto = isset($jsonEntrada['precoProduto']) && $jsonEntrada['precoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['precoProduto']) . "'" : "NULL";
    $ativoProduto = isset($jsonEntrada['ativoProduto']) && $jsonEntrada['ativoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['ativoProduto']) . "'" : "NULL";
    $propagandaProduto = isset($jsonEntrada['propagandaProduto']) && $jsonEntrada['propagandaProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['propagandaProduto']) . "'" : "NULL";
    $nomeProduto = isset($jsonEntrada['nomeProduto']) && $jsonEntrada['nomeProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['nomeProduto']) . "'" : "NULL";
    $refProduto = isset($jsonEntrada['refProduto']) && $jsonEntrada['refProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['refProduto']) . "'" : "NULL";
    $idPessoaEmitente = isset($jsonEntrada['idPessoaEmitente']) && $jsonEntrada['idPessoaEmitente'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idPessoaEmitente']) . "'" : "NULL";
    $valorCompra = isset($jsonEntrada['valorCompra']) && $jsonEntrada['valorCompra'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['valorCompra']) . "'" : "NULL";
    $codigoNcm = isset($jsonEntrada['codigoNcm']) && $jsonEntrada['codigoNcm'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoNcm']) . "'" : "NULL";
    $codigoCest = isset($jsonEntrada['codigoCest']) && $jsonEntrada['codigoCest'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['codigoCest']) . "'" : "NULL";
    $descricaoProduto = isset($jsonEntrada['descricaoProduto']) && $jsonEntrada['descricaoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['descricaoProduto']) . "'" : "NULL";
    $imgProduto = isset($jsonEntrada['imgProduto']) && $jsonEntrada['imgProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['imgProduto']) . "'" : "NULL";


    $sql = "INSERT INTO produtos (idPessoaEmitente, refProduto, nomeProduto, valorCompra, precoProduto, codigoNcm, codigoCest, imgProduto, idMarca, ativoProduto, propagandaProduto, descricaoProduto) 
            VALUES ($idPessoaEmitente, $refProduto, $nomeProduto, $valorCompra, $precoProduto, $codigoNcm, $codigoCest, $imgProduto, $idMarca, $ativoProduto, $propagandaProduto, $descricaoProduto)";
echo "-ENTRADA->".json_encode($sql)."\n";

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

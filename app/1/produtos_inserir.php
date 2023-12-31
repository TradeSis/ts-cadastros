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

    $nomeProduto = $jsonEntrada['nomeProduto'];
    $imgProduto = $jsonEntrada['imgProduto'];

    $idMarca = isset($jsonEntrada['idMarca']) && $jsonEntrada['idMarca'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['idMarca']) . "'" : "NULL";
    $precoProduto = isset($jsonEntrada['precoProduto']) && $jsonEntrada['precoProduto'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['precoProduto']) . "'" : "NULL";
    $ativoProduto = $jsonEntrada['ativoProduto'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];


    $sql = "INSERT INTO produtos (`nomeProduto`,`imgProduto`,`idMarca`,`precoProduto`,`ativoProduto`,`propagandaProduto`,`descricaoProduto`) VALUES ('$nomeProduto','$imgProduto',$idMarca,$precoProduto,'$ativoProduto','$propagandaProduto','$descricaoProduto')";

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

<?php
// helio 31012023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "pessoa_alterar";
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

$idEmpresa = $jsonEntrada["idEmpresa"];
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['idPessoa'])) {
    $idPessoa = $jsonEntrada['idPessoa'];
    $cpfCnpj = isset($jsonEntrada['cpfCnpj']) && $jsonEntrada['cpfCnpj'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['cpfCnpj']) . "'" : "NULL";
    $nome = isset($jsonEntrada['nome']) && $jsonEntrada['nome'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['nome']) . "'" : "NULL";
    $IE = isset($jsonEntrada['IE']) && $jsonEntrada['IE'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['IE']) . "'" : "NULL";
    $municipio = isset($jsonEntrada['municipio']) && $jsonEntrada['municipio'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['municipio']) . "'" : "NULL";
    $UF = isset($jsonEntrada['UF']) && $jsonEntrada['UF'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['UF']) . "'" : "NULL";
    $pais = isset($jsonEntrada['pais']) && $jsonEntrada['pais'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['pais']) . "'" : "NULL";
    $endereco = isset($jsonEntrada['endereco']) && $jsonEntrada['endereco'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['endereco']) . "'" : "NULL";

    $sql = "UPDATE pessoa SET cpfCnpj=$cpfCnpj, nome=$nome, IE=$IE, municipio=$municipio, UF=$UF, pais=$pais, endereco=$endereco WHERE idPessoa = $idPessoa";

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

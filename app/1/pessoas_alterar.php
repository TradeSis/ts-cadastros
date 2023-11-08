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
    $nomePessoa = isset($jsonEntrada['nomePessoa']) && $jsonEntrada['nomePessoa'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['nomePessoa']) . "'" : "NULL";
    $IE = isset($jsonEntrada['IE']) && $jsonEntrada['IE'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['IE']) . "'" : "NULL";
    $municipio = isset($jsonEntrada['municipio']) && $jsonEntrada['municipio'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['municipio']) . "'" : "NULL";
    $UF = isset($jsonEntrada['UF']) && $jsonEntrada['UF'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['UF']) . "'" : "NULL";
    $pais = isset($jsonEntrada['pais']) && $jsonEntrada['pais'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['pais']) . "'" : "NULL";
    $bairro = isset($jsonEntrada['bairro']) && $jsonEntrada['bairro'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['bairro']) . "'" : "NULL";
    $endereco = isset($jsonEntrada['endereco']) && $jsonEntrada['endereco'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['endereco']) . "'" : "NULL";
    $endNumero = isset($jsonEntrada['endNumero']) && $jsonEntrada['endNumero'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['endNumero']) . "'" : "NULL";
    $cep = isset($jsonEntrada['cep']) && $jsonEntrada['cep'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['cep']) . "'" : "NULL";
    $email = isset($jsonEntrada['email']) && $jsonEntrada['email'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['email']) . "'" : "NULL";
    $telefone = isset($jsonEntrada['telefone']) && $jsonEntrada['telefone'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['telefone']) . "'" : "NULL";
    $facebook = isset($jsonEntrada['facebook']) && $jsonEntrada['facebook'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['facebook']) . "'" : "NULL";
    $instagram = isset($jsonEntrada['instagram']) && $jsonEntrada['instagram'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['instagram']) . "'" : "NULL";
    $twitter = isset($jsonEntrada['twitter']) && $jsonEntrada['twitter'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['twitter']) . "'" : "NULL";
    $imgPerfil = isset($jsonEntrada['imgPerfil']) && $jsonEntrada['imgPerfil'] !== "" ? "'" . mysqli_real_escape_string($conexao, $jsonEntrada['imgPerfil']) . "'" : "NULL";

    $sql = "UPDATE pessoas SET cpfCnpj=$cpfCnpj, nomePessoa=$nomePessoa, IE=$IE, municipio=$municipio, UF=$UF, pais=$pais, bairro=$bairro, endereco=$endereco,
           endNumero=$endNumero, cep=$cep, email=$email, telefone=$telefone, facebook=$facebook, instagram=$instagram, twitter=$twitter, imgPerfil=$imgPerfil WHERE idPessoa = $idPessoa";

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

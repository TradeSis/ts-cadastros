<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
    $LOG_NIVEL = defineNivelLog();
    $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "pessoa_inserir";
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
if (isset($jsonEntrada['cpfCnpj'])) {

    $cpfCnpj = isset($jsonEntrada['cpfCnpj']) && $jsonEntrada['cpfCnpj'] !== "" ? "'" . $jsonEntrada['cpfCnpj'] . "'" : "NULL";
    $tipoPessoa = isset($jsonEntrada['tipoPessoa']) && $jsonEntrada['tipoPessoa'] !== "" ? "'" . $jsonEntrada['tipoPessoa'] . "'" : "NULL";
    $nomePessoa = isset($jsonEntrada['nomePessoa']) && $jsonEntrada['nomePessoa'] !== "" ? "'" . $jsonEntrada['nomePessoa'] . "'" : "NULL";
	$IE = isset($jsonEntrada['IE']) && $jsonEntrada['IE'] !== "" ? "'" . $jsonEntrada['IE'] . "'" : "NULL";
	$municipio = isset($jsonEntrada['municipio']) && $jsonEntrada['municipio'] !== "" ? "'" . $jsonEntrada['municipio'] . "'" : "NULL";
    $codigoCidade = isset($jsonEntrada['codigoCidade']) && $jsonEntrada['codigoCidade'] !== "" ? "'" . $jsonEntrada['codigoCidade'] . "'" : "NULL";
    $codigoEstado = isset($jsonEntrada['codigoEstado']) && $jsonEntrada['codigoEstado'] !== "" ? "'" . $jsonEntrada['codigoEstado'] . "'" : "NULL";
	$pais = isset($jsonEntrada['pais']) && $jsonEntrada['pais'] !== "" ? "'" . $jsonEntrada['pais'] . "'" : "NULL";
    $bairro = isset($jsonEntrada['bairro']) && $jsonEntrada['bairro'] !== "" ? "'" . $jsonEntrada['bairro'] . "'" : "NULL";
    $endereco = isset($jsonEntrada['endereco']) && $jsonEntrada['endereco'] !== "" ? "'" . $jsonEntrada['endereco'] . "'" : "NULL";
	$endNumero = isset($jsonEntrada['endNumero']) && $jsonEntrada['endNumero'] !== "" ? "'" . $jsonEntrada['endNumero'] . "'" : "NULL";
    $cep = isset($jsonEntrada['cep']) && $jsonEntrada['cep'] !== "" ? "'" . $jsonEntrada['cep'] . "'" : "NULL";
    $email = isset($jsonEntrada['email']) && $jsonEntrada['email'] !== "" ? "'" . $jsonEntrada['email'] . "'" : "NULL";
	$imgPerfil = isset($jsonEntrada['imgPerfil']) && $jsonEntrada['imgPerfil'] !== "" ? "'" . $jsonEntrada['imgPerfil'] . "'" : "NULL";
	$telefone = isset($jsonEntrada['telefone']) && $jsonEntrada['telefone'] !== "" ? "'" . $jsonEntrada['telefone'] . "'" : "NULL";
    $facebook = isset($jsonEntrada['facebook']) && $jsonEntrada['facebook'] !== "" ? "'" . $jsonEntrada['facebook'] . "'" : "NULL";
    $instagram = isset($jsonEntrada['instagram']) && $jsonEntrada['instagram'] !== "" ? "'" . $jsonEntrada['instagram'] . "'" : "NULL";
    $twitter = isset($jsonEntrada['twitter']) && $jsonEntrada['twitter'] !== "" ? "'" . $jsonEntrada['twitter'] . "'" : "NULL";
    $crt = isset($jsonEntrada['crt']) && $jsonEntrada['crt'] !== "" ? "'" . $jsonEntrada['crt'] . "'" : "NULL";
    $regimeTrib = isset($jsonEntrada['regimeTrib']) && $jsonEntrada['regimeTrib'] !== "" ? "'" . $jsonEntrada['regimeTrib'] . "'" : "NULL";
    $cnae = isset($jsonEntrada['cnae']) && $jsonEntrada['cnae'] !== "" ? "'" . $jsonEntrada['cnae'] . "'" : "NULL";
    $regimeEspecial = isset($jsonEntrada['regimeEspecial']) && $jsonEntrada['regimeEspecial'] !== "" ? "'" . $jsonEntrada['regimeEspecial'] . "'" : "NULL";
    $caracTrib = isset($jsonEntrada['caracTrib']) && $jsonEntrada['caracTrib'] !== "" ? "'" . $jsonEntrada['caracTrib'] . "'" : "NULL";
    $origem = isset($jsonEntrada['origem']) && $jsonEntrada['origem'] !== "" ? "'" . $jsonEntrada['origem'] . "'" : "NULL";

    $sql = "INSERT INTO pessoas(cpfCnpj, tipoPessoa, nomePessoa, IE, municipio, codigoCidade, codigoEstado, pais, bairro, endereco, endNumero,
        cep, email, imgPerfil, telefone, facebook, instagram, twitter, crt, regimeTrib, cnae, regimeEspecial, caracTrib, origem) 
    VALUES ($cpfCnpj, $tipoPessoa, $nomePessoa, $IE, $municipio, $codigoCidade, $codigoEstado, $pais, $bairro, $endereco, $endNumero, 
        $cep, $email, $imgPerfil, $telefone, $facebook, $instagram, $twitter, $crt, $regimeTrib, $cnae, $regimeEspecial, $caracTrib, $origem)";
    

    //echo $sql;

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
        
        $idPessoaInserido = mysqli_insert_id($conexao);
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok",
            "idPessoa" => $idPessoaInserido
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

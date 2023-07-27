<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idServico']) && ($jsonEntrada['imgServico'])) {

    $idServico = $jsonEntrada['idServico'];
    $nomeServico = $jsonEntrada['nomeServico'];
    $imgServico = $jsonEntrada['imgServico'];
    $descricaoServico = $jsonEntrada['descricaoServico'];
    $linkServico = $jsonEntrada['linkServico'];
    $destaque = $jsonEntrada['destaque'];

    $sql = "UPDATE  servicos  SET nomeServico ='$nomeServico', imgServico ='$imgServico', descricaoServico ='$descricaoServico', linkServico ='$linkServico', destaque ='$destaque' WHERE idServico = $idServico ";

    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

if (isset($jsonEntrada['idServico'])) {

    $idServico = $jsonEntrada['idServico'];
    $nomeServico = $jsonEntrada['nomeServico'];
    $imgServico = $jsonEntrada['imgServico'];
    $descricaoServico = $jsonEntrada['descricaoServico'];
    $linkServico = $jsonEntrada['linkServico'];
    $destaque = $jsonEntrada['destaque'];

    $sql = "UPDATE  servicos  SET nomeServico ='$nomeServico', descricaoServico ='$descricaoServico', linkServico ='$linkServico', destaque ='$destaque' WHERE idServico = $idServico ";

    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>
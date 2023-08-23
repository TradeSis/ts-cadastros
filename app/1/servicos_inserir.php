<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['nomeServico'])) {

    $nomeServico = $jsonEntrada['nomeServico'];
    $descricaoServico = $jsonEntrada['descricaoServico'];
    $linkServico = $jsonEntrada['linkServico'];
    $imgServico = $jsonEntrada['imgServico'];
    $destaque = $jsonEntrada['destaque'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];

    
    $sql = "INSERT INTO servicos (`nomeServico`,`descricaoServico`,`linkServico`,`imgServico`,`destaque`) VALUES ('$nomeServico','$descricaoServico','$linkServico','$imgServico','$destaque')";
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
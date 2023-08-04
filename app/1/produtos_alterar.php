<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$idEmpresa = $jsonEntrada["idEmpresa"];
$conexao = conectaMysql($idEmpresa);

if (isset($jsonEntrada['idProduto'])) {

    $idProduto = $jsonEntrada['idProduto'];
    $nomeProduto = $jsonEntrada['nomeProduto'];
    //$imgProduto = $jsonEntrada['imgProduto'];
    $idMarca = $jsonEntrada['idMarca'];
    $precoProduto = $jsonEntrada['precoProduto'];
    $ativoProduto = $jsonEntrada['ativoProduto'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];

    if($imgProduto != ""){
        $sql = "UPDATE  produtos  SET nomeProduto ='$nomeProduto', imgProduto ='$imgProduto', idMarca ='$idMarca', precoProduto ='$precoProduto', ativoProduto ='$ativoProduto',    propagandaProduto ='$propagandaProduto', descricaoProduto ='$descricaoProduto' WHERE idProduto = $idProduto ";
    }else{
        
        $sql = "UPDATE  produtos  SET nomeProduto ='$nomeProduto', idMarca ='$idMarca', precoProduto ='$precoProduto', ativoProduto ='$ativoProduto',    propagandaProduto ='$propagandaProduto', descricaoProduto ='$descricaoProduto' WHERE idProduto = $idProduto ";
    }
  
//echo $sql;
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
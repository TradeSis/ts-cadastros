<?php
// Lucas 03032023 - criação 
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
if (isset($jsonEntrada["idEmpresa"])) {
    $idEmpresa = $jsonEntrada["idEmpresa"];
}

$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $email = $jsonEntrada['email'];
    $statusUsuario = $jsonEntrada['statusUsuario'];
    $idCliente = $jsonEntrada['idCliente'];

    $sql = "UPDATE `usuario` SET `nomeUsuario`='$nomeUsuario', `email`='$email', `idCliente`=$idCliente, `statusUsuario` = $statusUsuario WHERE idUsuario = $idUsuario";
    // echo "-ENTRADA->".$sql."\n"; 

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
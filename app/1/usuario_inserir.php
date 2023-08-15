<?php
//gabriel 06022023 16:52
/* echo "-ENTRADA->".json_encode($jsonEntrada)."\n"; */

/* não gera mais secret */
$idEmpresa = null;
    if (isset($jsonEntrada["idEmpresa"])) {
        $idEmpresa = $jsonEntrada["idEmpresa"];
    }
$conexao = conectaMysql($idEmpresa);
if (isset($jsonEntrada['nomeUsuario'])) {
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];


    $sql = "INSERT INTO `usuario`( `nomeUsuario`, `idCliente`, `email`) VALUES ('$nomeUsuario', $idCliente, '$email')";

    if ($idCliente == "") { // sem id , tira do insert para deixar NULL
        $sql = "INSERT INTO `usuario`( `nomeUsuario`, `email`) VALUES ('$nomeUsuario', '$email')";
    }
    ;


    //echo "-SQL->".$sql."\n"; 

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
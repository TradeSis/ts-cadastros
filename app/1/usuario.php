<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}

$conexao = conectaMysql($idEmpresa);
$usuario = array();

$sql = "SELECT usuario.*, cliente.nomeCliente FROM usuario
        LEFT JOIN cliente on  cliente.idCliente = usuario.idCliente ";
if (isset($jsonEntrada["idUsuario"])) {
  $idUsuario = $jsonEntrada["idUsuario"];
  $sql = $sql . " where usuario.idUsuario = '$idUsuario'";
} 


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($usuario, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idUsuario"]) && $rows==1) {
  $usuario = $usuario[0];
}


$jsonSaida = $usuario;
//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>
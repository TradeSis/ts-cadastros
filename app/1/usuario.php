<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}

$conexao = conectaMysql($idEmpresa);
$usuario = array();

$sql = "SELECT usuario.*, cliente.nomeCliente FROM usuario
        LEFT JOIN cliente on  cliente.idCliente = usuario.idCliente";
$where = " WHERE ";
if (isset($jsonEntrada["idUsuario"])) {
  $sql = $sql . $where . " usuario.idUsuario = " . $jsonEntrada["idUsuario"];
  $where = " AND ";
} 
if (isset($jsonEntrada["idLogin"])) {
  $sql = $sql . $where . " usuario.idLogin = " . $jsonEntrada["idLogin"];
  $where = " AND ";
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

if (isset($jsonEntrada["idLogin"]) && $rows==1) {
  $usuario = $usuario[0];
}


$jsonSaida = $usuario;
//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>
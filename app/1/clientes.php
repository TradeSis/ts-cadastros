<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$idEmpresa = null;
	if (isset($jsonEntrada["idEmpresa"])) {
    	$idEmpresa = $jsonEntrada["idEmpresa"];
	}

$conexao = conectaMysql($idEmpresa);
$clientes = array();

$sql = "SELECT * FROM cliente ";
if (isset($jsonEntrada["idCliente"])) {
  $sql = $sql . " where cliente.idCliente = " . $jsonEntrada["idCliente"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($clientes, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idCliente"]) && $rows==1) {
  $clientes = $clientes[0];
}
$jsonSaida = $clientes;




?>
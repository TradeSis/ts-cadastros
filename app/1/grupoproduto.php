<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//LOG
$LOG_CAMINHO = defineCaminhoLog();
if (isset($LOG_CAMINHO)) {
  $LOG_NIVEL = defineNivelLog();
  $identificacao = date("dmYHis") . "-PID" . getmypid() . "-" . "grupoproduto";
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
$grupoproduto = array();

$sql = "SELECT * FROM grupoproduto ";
if (isset($jsonEntrada["codigoGrupo"])) {
  $sql = $sql . " where grupoproduto.codigoGrupo = " . $jsonEntrada["codigoGrupo"];
}
$where = " where ";
if (isset($jsonEntrada["buscaGrupoProduto"])) {
  $sql = $sql . $where . " grupoproduto.codigoGrupo like " . "'%" . $jsonEntrada["buscaGrupoProduto"] . "%'
    OR grupoproduto.nomeGrupo like " . "'%" . $jsonEntrada["buscaGrupoProduto"] . "%' " ;
  $where = " and ";
}

//LOG
if (isset($LOG_NIVEL)) {
  if ($LOG_NIVEL >= 3) {
    fwrite($arquivo, $identificacao . "-SQL->" . $sql . "\n");
  }
}
//LOG

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($grupoproduto, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["codigoGrupo"]) && $rows == 1) {
  $grupoproduto = $grupoproduto[0];
}
$jsonSaida = $grupoproduto;


//LOG
if (isset($LOG_NIVEL)) {
  if ($LOG_NIVEL >= 2) {
    fwrite($arquivo, $identificacao . "-SAIDA->" . json_encode($jsonSaida) . "\n\n");
  }
}
//LOG

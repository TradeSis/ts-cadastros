<?php
// Helio 26042023 - conexao agora pega dados do ../config.php, e vai para versao
// helio 01022023 criado funcao defineConexao API e MySQl com aprametros locais
// helio 01022023 altereado para include_once
// helio 31012023 - include database/api
// helio 26012023 16:16

include_once __DIR__."/../config.php";



include_once(ROOT.'/painel/database/mysql.php');
include_once(ROOT.'/painel/database/api.php');
// helio 26042023
include_once(ROOT.'/painel/database/functions.php');
include_once(ROOT.'/painel/database/email.php');

?>

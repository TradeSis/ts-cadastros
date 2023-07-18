<?php
include_once __DIR__."/../../config.php";
include_once (ROOT.'/cadastros/conexao.php');
//Lucas 25052023 - modificado para Api
function buscaServicosCards()
{
    $servicos = array();
	//echo json_encode($servicos);
	//return;
	$apiEntrada = array(
		
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$servicos = chamaAPI(null, '/cadastros/servicos_card', json_encode($apiEntrada), 'GET');
	//echo json_encode($servicos);
	return $servicos;
}

function buscaServicos($idServico=null)
{
    $servicos = array();
	//echo json_encode($servicos);
	//return;
	$apiEntrada = array(
		'idServico' => $idServico,
	);
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */
	$servicos = chamaAPI(null, '/cadastros/servicos', json_encode($apiEntrada), 'GET');
	//echo json_encode($servicos);
	return $servicos;
}

function buscaSlugServicos($slugServicos)
{
    $servicos = array();
	$apiEntrada = array(
		'slugServicos' => $slugServicos,
	);
	$servicos = chamaAPI(null, '/cadastros/servicos_slug', json_encode($apiEntrada), 'GET');
	//echo json_encode($servicos);
	return $servicos;
}





?>


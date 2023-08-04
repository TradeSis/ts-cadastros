<?php
include_once __DIR__ . "/../conexao.php";
//Lucas 25052023 - modificado para Api
function buscaServicosCards()
{
    $servicos = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
    	$idEmpresa = $_SESSION['idEmpresa'];
	}

	$apiEntrada = array(
		'idEmpresa' => $idEmpresa
	);

	$servicos = chamaAPI(null, '/cadastros/servicos_card', json_encode($apiEntrada), 'GET');

	return $servicos;
}

function buscaServicos($idServico=null)
{
    $servicos = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
    	$idEmpresa = $_SESSION['idEmpresa'];
	}

	$apiEntrada = array(
		'idServico' => $idServico,
		'idEmpresa' => $idEmpresa
	);

	$servicos = chamaAPI(null, '/cadastros/servicos', json_encode($apiEntrada), 'GET');

	return $servicos;
}

function buscaSlugServicos($slugServicos)
{
    $servicos = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
    	$idEmpresa = $_SESSION['idEmpresa'];
	}
	
	$apiEntrada = array(
		'slugServicos' => $slugServicos,
		'idEmpresa' => $idEmpresa
	);
	$servicos = chamaAPI(null, '/cadastros/servicos_slug', json_encode($apiEntrada), 'GET');

	return $servicos;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

    if ($operacao=="inserir") {

		$imgServico = $_FILES['imgServico'];

		if($imgServico !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgServico["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeServico']. "_" .$imgServico["name"];
				
				move_uploaded_file($imgServico['tmp_name'], $pasta.$novoNomeImg);
		
			}else{
				$novoNomeImg = "Sem_imagem";
			}
	
		}

		$apiEntrada = array(
			'idEmpresa' =>  $_POST['idEmpresa'],
			'nomeServico' => $_POST['nomeServico'],
            'imgServico' => $novoNomeImg,
			'descricaoServico' => $_POST['descricaoServico'],
			'linkServico' => $_POST['linkServico'],
			'destaque' => $_POST['destaque'],
			
		);

		$servicos = chamaAPI(null, '/cadastros/servicos', json_encode($apiEntrada), 'PUT');
		
	}

	$operacao = $_GET['operacao'];

    if ($operacao=="alterar") {

		$imgServico = $_FILES['imgServico'];

		if($imgServico !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgServico["name"],$ext);
		
			if($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeServico']. "_" .$imgServico["name"];
				
				move_uploaded_file($imgServico['tmp_name'], $pasta.$novoNomeImg);
		
			}
			$apiEntrada = array(
			'idEmpresa' =>  $_POST['idEmpresa'],
			'idServico' => $_POST['idServico'],
			'nomeServico' => $_POST['nomeServico'],
            'imgServico' => $novoNomeImg,
			'descricaoServico' => $_POST['descricaoServico'],
			'linkServico' => $_POST['linkServico'],
			'destaque' => $_POST['destaque'],
		);
	
		}else{
			$apiEntrada = array(
				'idEmpresa' =>  $_POST['idEmpresa'],
				'idServico' => $_POST['idServico'],
				'nomeServico' => $_POST['nomeServico'],
				'descricaoServico' => $_POST['descricaoServico'],
				'linkServico' => $_POST['linkServico'],
				'destaque' => $_POST['destaque'],
			);
		}

		$servicos = chamaAPI(null, '/cadastros/servicos', json_encode($apiEntrada), 'POST');
		
	}

	

	
	if ($operacao=="excluir") {

		$apiEntrada = array(
			'idEmpresa' =>  $_POST['idEmpresa'],
			'idServico' => $_POST['idServico'],
		);
		if(!empty($_POST['imgServico'])){
			$pasta = ROOT . "/img/";
			$imagem = $pasta . $_POST['imgServico'];
			
			if(file_exists($imagem)){
				unlink($imagem);
			}

		}

		$servicos = chamaAPI(null, '/cadastros/servicos', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/servicos.php');	
	
}



?>


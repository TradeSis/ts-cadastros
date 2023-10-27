<?php
// gabriel 060623 15:06

include_once __DIR__ . "/../conexao.php";

function buscarProdutos($idProduto=null, $chaveNFe=null)
{

	$produto = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
		$idEmpresa = $_SESSION['idEmpresa'];
	}

	$apiEntrada = array(
		'idProduto' => $idProduto,
		'chaveNFe' => $chaveNFe,
		'idEmpresa' => $idEmpresa
	);
	$produto = chamaAPI(null, '/cadastros/fisproduto', json_encode($apiEntrada), 'GET');
	return $produto;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
            'codigoProduto' => $_POST['codigoProduto'],
            'nomeProduto' => $_POST['nomeProduto'],
            'quantidade' => $_POST['quantidade'], 
            'unidCom' => $_POST['unidCom'],
            'valorUnidade' => $_POST['valorUnidade'],
            'valorTotal' => $_POST['valorTotal'], 
            'cfop' => $_POST['cfop'], 
            'ncm' => $_POST['ncm'],
            'cest' => $_POST['cest'],
            'chaveNFe' => $_POST['chaveNFe'],
			'idEmpresa' => $_SESSION['idEmpresa']
		);
		$produto = chamaAPI(null, '/cadastros/fisproduto', json_encode($apiEntrada), 'PUT');
		return $produto;

	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
            'idProduto' => $_POST['idProduto'],
            'codigoProduto' => $_POST['codigoProduto'],
            'nomeProduto' => $_POST['nomeProduto'],
            'quantidade' => $_POST['quantidade'], 
            'unidCom' => $_POST['unidCom'],
            'valorUnidade' => $_POST['valorUnidade'],
            'valorTotal' => $_POST['valorTotal'], 
            'cfop' => $_POST['cfop'], 
            'ncm' => $_POST['ncm'],
            'cest' => $_POST['cest'],
            'chaveNFe' => $_POST['chaveNFe'],
			'idEmpresa' => $_SESSION['idEmpresa']
		);
		$produto = chamaAPI(null, '/cadastros/fisproduto', json_encode($apiEntrada), 'POST');
		return $produto;

	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
			'idEmpresa' => $_SESSION['idEmpresa']
		);
		$produto = chamaAPI(null, '/cadastros/fisproduto', json_encode($apiEntrada), 'DELETE');
		return $produto;

	}

	if ($operacao == "buscar") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'idProduto' => $_POST['idProduto']
		);
		$produto = chamaAPI(null, '/cadastros/fisproduto', json_encode($apiEntrada), 'GET');

		echo json_encode($produto);
		return $produto;
	}

	
}

?>


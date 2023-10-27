<?php
// gabriel 060623 15:06

include_once __DIR__ . "/../conexao.php";

function buscarPessoa($idPessoa=null)
{

	$pessoa = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
		$idEmpresa = $_SESSION['idEmpresa'];
	}

	$apiEntrada = array(
		'idPessoa' => $idPessoa,
		'idEmpresa' => $idEmpresa
	);
	$pessoa = chamaAPI(null, '/cadastros/pessoa', json_encode($apiEntrada), 'GET');
	return $pessoa;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'cpfCnpj' => $_POST['cpfCnpj'],
			'nome' => $_POST['nome'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'UF' => $_POST['UF'],
			'pais' => $_POST['pais'],
			'endereco' => $_POST['endereco'],
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoa = chamaAPI(null, '/cadastros/pessoa', json_encode($apiEntrada), 'PUT');
		return $pessoa;

	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
			'idPessoa' => $_POST['idPessoa'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'nome' => $_POST['nome'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'UF' => $_POST['UF'],
			'pais' => $_POST['pais'],
			'endereco' => $_POST['endereco'],
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoa = chamaAPI(null, '/cadastros/pessoa', json_encode($apiEntrada), 'POST');
		return $pessoa;

	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idPessoa' => $_POST['idPessoa'],
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoa = chamaAPI(null, '/cadastros/pessoa', json_encode($apiEntrada), 'DELETE');
		return $pessoa;

	}

	if ($operacao == "buscar") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'idPessoa' => $_POST['idPessoa']
		);
		$pessoa = chamaAPI(null, '/cadastros/pessoa', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoa);
		return $pessoa;
	}

	
}

?>


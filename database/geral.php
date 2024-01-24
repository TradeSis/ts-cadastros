<?php
include_once __DIR__ . "/../conexao.php";

function buscarGeralProduto($eanProduto = null)
{
	$produtos = array();

	$apiEntrada = array(
		'eanProduto' => $eanProduto
	);

	$produtos = chamaAPI(null, '/cadastros/geralprodutos', json_encode($apiEntrada), 'GET');
	return $produtos;
}
function buscarGeralPessoas($cpfCnpj = null)
{
	$pessoas = array();

	$apiEntrada = array(
		'cpfCnpj' => $cpfCnpj
	);

	$pessoas = chamaAPI(null, '/cadastros/geralpessoas', json_encode($apiEntrada), 'GET');
	return $pessoas;
}
function buscarGeralFornecimento($eanProduto = null, $cpfCnpj = null)
{
	$fornecedor = array();

	$apiEntrada = array(
		'eanProduto' => $eanProduto,
		'cpfCnpj' => $cpfCnpj
	);

	$fornecedor = chamaAPI(null, '/cadastros/geralfornecimento', json_encode($apiEntrada), 'GET');
	return $fornecedor;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "buscarGeralPessoas") {
		
		$cpfCnpj = $_POST["cpfCnpj"];

		if ($cpfCnpj == "") {
			$cpfCnpj = null;
		}

		$apiEntrada = array(
			'cpfCnpj' => $cpfCnpj
		);

		$pessoa = chamaAPI(null, '/cadastros/geralpessoas', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoa);
		return $pessoa;
	}
	if ($operacao=="geralpessoasInserir") {

		$apiEntrada = array(
			'cpfCnpj' => $_POST['cpfCnpj'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'codigoCidade' => $_POST['codigoCidade'],
			'codigoEstado' => $_POST['codigoEstado'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
			'origem' => $_POST['origem'],
		);
		$pessoas = chamaAPI(null, '/cadastros/geralpessoas', json_encode($apiEntrada), 'PUT');
		return $pessoas;

	}

	if ($operacao=="geralpessoasAlterar") {

		$apiEntrada = array(
			'cpfCnpj' => $_POST['cpfCnpj'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'codigoCidade' => $_POST['codigoCidade'],
			'codigoEstado' => $_POST['codigoEstado'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
			'origem' => $_POST['origem'],
		);
		$pessoas = chamaAPI(null, '/cadastros/geralpessoas', json_encode($apiEntrada), 'POST');
		return $pessoas;

	}

	if ($operacao == "buscarGeralProduto") {

		$eanProduto = $_POST["eanProduto"];

		if ($eanProduto == "") {
			$eanProduto = null;
		}

		$apiEntrada = array(
			'eanProduto' => $eanProduto
		);

		$produto = chamaAPI(null, '/cadastros/geralprodutos', json_encode($apiEntrada), 'GET');

		echo json_encode($produto);
		return $produto;
	}
	if ($operacao == "buscarGeralFornecimento") {

		$eanProduto = $_POST["eanProduto"];
		$cpfCnpj = $_POST["cpfCnpj"];

		if ($eanProduto == "") {
			$eanProduto = null;
		}
		if ($cpfCnpj == "") {
			$cpfCnpj = null;
		}

		$apiEntrada = array(
			'eanProduto' => $eanProduto,
			'cpfCnpj' => $cpfCnpj
		);

		$fornecedor = chamaAPI(null, '/cadastros/geralfornecimento', json_encode($apiEntrada), 'GET');

		echo json_encode($fornecedor);
		return $fornecedor;
	}
	
}

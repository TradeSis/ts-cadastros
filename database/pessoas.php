<?php
// gabriel 060623 15:06

include_once __DIR__ . "/../conexao.php";
require_once(__DIR__ . '/../vendor/autoload.php');

function buscarPessoa($idPessoa=null)
{

	$pessoas = array();

	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
		$idEmpresa = $_SESSION['idEmpresa'];
	}

	$apiEntrada = array(
		'idPessoa' => $idPessoa,
		'idEmpresa' => $idEmpresa
	);
	$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'GET');
	return $pessoas;
}
function buscarCidades($idCidade=null)
{
	$cidades = array();
	
	$idEmpresa = null;
	if (isset($_SESSION['idEmpresa'])) {
    	$idEmpresa = $_SESSION['idEmpresa'];
	}
	

	$apiEntrada = array(
		'idCidade' => $idCidade,
		'idEmpresa' => $idEmpresa
	);
	
	$cidades = chamaAPI(null, '/cadastros/cidades', json_encode($apiEntrada), 'GET');

	return $cidades;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {

		$imgPerfil = $_FILES['imgPerfilInserir'];

		if ($imgPerfil !== null) {
			preg_match("/\.(png|jpg|jpeg|txt|xlsx|pdf|csv|doc|docx|zip){1}$/i", $imgPerfil["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";

				$novoNomeAnexo = $_POST['refProduto'] . "_" . $imgPerfil["name"];
				$path = 'http://' . $_SERVER["HTTP_HOST"] . '/img/' . $novoNomeAnexo;
				move_uploaded_file($imgPerfil['tmp_name'], $pasta . $novoNomeAnexo);


			} else {
				$path = null;
			}

		} 

		$apiEntrada = array(
			'tipoPessoa' => $_POST['tipoPessoa'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'UF' => $_POST['UF'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
			'twitter' => $_POST['twitter'],
			'imgPerfil' => $path,
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'PUT');
		echo json_encode($apiEntrada);
		return $pessoas;

	}

	if ($operacao=="alterar") {

		$imgPerfil = $_FILES['imgPerfilAlterar'];

		if ($imgPerfil !== null) {
			preg_match("/\.(png|jpg|jpeg|txt|xlsx|pdf|csv|doc|docx|zip){1}$/i", $imgPerfil["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";

				$novoNomeAnexo = $_POST['refProduto'] . "_" . $imgPerfil["name"];
				$path = 'http://' . $_SERVER["HTTP_HOST"] . '/img/' . $novoNomeAnexo;
				move_uploaded_file($imgPerfil['tmp_name'], $pasta . $novoNomeAnexo);


			} else {
				$path = null;
			}

		} 

		$apiEntrada = array(
			'idPessoa' => $_POST['idPessoa'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'cpfCnpj' => $_POST['cpfCnpj'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'UF' => $_POST['UF'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
			'twitter' => $_POST['twitter'],
			'imgPerfil' => $path,
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'POST');
		return $pessoas;

	}
	
	if ($operacao=="excluir") {
		$apiEntrada = array(
			'idPessoa' => $_POST['idPessoa'],
			'idEmpresa' => $_SESSION['idEmpresa']

		);
		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'DELETE');
		return $pessoas;

	}

	if ($operacao == "buscar") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'idPessoa' => $_POST['idPessoa']
		);
		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoas);
		return $pessoas;
	}

	if ($operacao == "buscaCEP") {

		$config = NuvemFiscal\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'Bearer');
		$config = NuvemFiscal\Configuration::getDefaultConfiguration()->setAccessToken('eyJ0eXAiOiJKV1QiLCJraWQiOiIwMWIwNDFkMWQ2MTU0NjA0NzNkMWI1NGFhOGRlNGQ1NyIsImFsZyI6IlJTMjU2In0.eyJzY29wZSI6ImVtcHJlc2EgY2VwIGNucGogbmZlIG5mY2UgbmZzZSBjdGUgbWRmZSIsImp0aSI6ImI0NGQxMmQwLTY5ZjEtNDJlMy05ZDIzLTllZDExM2E0NjY0MyIsImh0dHBzOlwvXC9udXZlbWZpc2NhbC5jb20uYnJcL3RlbmFudF9pZCI6IjNhMGYwOThmLTNiMmItNGU0YS04OWEzLWRkN2EyZjAzYzViZCIsImlzcyI6Imh0dHBzOlwvXC9hdXRoLm51dmVtZmlzY2FsLmNvbS5iciIsImF1ZCI6Imh0dHBzOlwvXC9hcGkuc2FuZGJveC5udXZlbWZpc2NhbC5jb20uYnJcLyIsImV4cCI6MTcwMzI2MTc2NSwiaWF0IjoxNzAwNjY5NzY1LCJjbGllbnRfaWQiOiJBNFExd0pzTnYxV2tWNTZCVGx4TiJ9.SubCFFtIfl0yVUT_E8zOBlZWzM4N1IG3J8GOMoW8F-F-1iw7UL4HnnniPPiRVZD0-AukwNV_coJ_mIN9toIJfl-JF5URlWLQS5N2foLKlhogRXbZDnn4mKYtBJ2mqpw6CKt3UifF4oEZmC3IX9nroHIcy3Vyxy9-da6Alch-0iEvDRGKLaUrL09_CIlEqB76CdFY1FZ4qAmiBT__oPPrDZ0FknWLXlE0a9nGz8rXFuaCJQG9gza9bkZcClepjfiJiMqSPdrIql90sg2y6YOKlADWbVr0OrjbLx7wSTg5h-DHlmtlkZVXp3YjrsEjIm5sewcb2NWDBoPwvCxr2yiqTA');
		$apiInstance = new NuvemFiscal\Api\CepApi(
			new GuzzleHttp\Client(),
			$config
		);
		$cep = $_POST['cep'];
		$dados = $apiInstance->consultarCep($cep);
		echo json_encode($dados);

		return $dados;
	}

	if ($operacao == "buscaCNPJ") {

		$config = NuvemFiscal\Configuration::getDefaultConfiguration()
   			->setApiKey('Authorization', 'Bearer')
    		->setAccessToken('eyJ0eXAiOiJKV1QiLCJraWQiOiIwMWIwNDFkMWQ2MTU0NjA0NzNkMWI1NGFhOGRlNGQ1NyIsImFsZyI6IlJTMjU2In0.eyJzY29wZSI6ImVtcHJlc2EgY2VwIGNucGogbmZlIG5mY2UgbmZzZSBjdGUgbWRmZSIsImp0aSI6ImI0NGQxMmQwLTY5ZjEtNDJlMy05ZDIzLTllZDExM2E0NjY0MyIsImh0dHBzOlwvXC9udXZlbWZpc2NhbC5jb20uYnJcL3RlbmFudF9pZCI6IjNhMGYwOThmLTNiMmItNGU0YS04OWEzLWRkN2EyZjAzYzViZCIsImlzcyI6Imh0dHBzOlwvXC9hdXRoLm51dmVtZmlzY2FsLmNvbS5iciIsImF1ZCI6Imh0dHBzOlwvXC9hcGkuc2FuZGJveC5udXZlbWZpc2NhbC5jb20uYnJcLyIsImV4cCI6MTcwMzI2MTc2NSwiaWF0IjoxNzAwNjY5NzY1LCJjbGllbnRfaWQiOiJBNFExd0pzTnYxV2tWNTZCVGx4TiJ9.SubCFFtIfl0yVUT_E8zOBlZWzM4N1IG3J8GOMoW8F-F-1iw7UL4HnnniPPiRVZD0-AukwNV_coJ_mIN9toIJfl-JF5URlWLQS5N2foLKlhogRXbZDnn4mKYtBJ2mqpw6CKt3UifF4oEZmC3IX9nroHIcy3Vyxy9-da6Alch-0iEvDRGKLaUrL09_CIlEqB76CdFY1FZ4qAmiBT__oPPrDZ0FknWLXlE0a9nGz8rXFuaCJQG9gza9bkZcClepjfiJiMqSPdrIql90sg2y6YOKlADWbVr0OrjbLx7wSTg5h-DHlmtlkZVXp3YjrsEjIm5sewcb2NWDBoPwvCxr2yiqTA');
		$apiInstance = new NuvemFiscal\Api\CnpjApi(
			new GuzzleHttp\Client(),
			$config
		);
		$cnpj = $_POST['cnpj'];
		$dados = $apiInstance->consultarCnpj($cnpj);
		echo json_encode($dados);

		return $dados;
	}

	
}

?>


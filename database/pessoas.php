<?php
// gabriel 060623 15:06

include_once __DIR__ . "/../conexao.php";

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
				$novoNomeAnexo = " ";
			}

		} 

		$apiEntrada = array(
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
				$novoNomeAnexo = " ";
			}

		} 

		$apiEntrada = array(
			'idPessoa' => $_POST['idPessoa'],
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

	
}

?>


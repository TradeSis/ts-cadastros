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

		$imgPerfil = null;
		if(isset($_FILES['imgPerfilInserir'])){
			$imgPerfil = $_FILES['imgPerfilInserir'];
		}

		if ($imgPerfil !== null) {
			preg_match("/\.(png|jpg|jpeg|txt|xlsx|pdf|csv|doc|docx|zip){1}$/i", $imgPerfil["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";

				$novoNomeAnexo = $_POST['refProduto'] . "_" . $imgPerfil["name"];
				$imgPerfil = 'http://' . $_SERVER["HTTP_HOST"] . '/img/' . $novoNomeAnexo;
				move_uploaded_file($imgPerfil['tmp_name'], $pasta . $novoNomeAnexo);


			} else {
				$imgPerfil = null;
			}

		} 

		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
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
			'imgPerfil' => $imgPerfil,
			'telefone' => $_POST['telefone'],
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
			'twitter' => $_POST['twitter'],
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
		);
		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'PUT');
		//echo json_encode($apiEntrada);
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
			'idEmpresa' => $_SESSION['idEmpresa'],
			'idPessoa' => $_POST['idPessoa'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'cpfCnpj' => $_POST['cpfCnpj'],
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
			'facebook' => $_POST['facebook'],
			'instagram' => $_POST['instagram'],
			'twitter' => $_POST['twitter'],
			'imgPerfil' => $path,
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
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


	if ($operacao == "buscaCNPJ") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'cnpj' => $_POST['cnpj']
		);
		$cnpj = chamaAPI(null, '/cadastros/cnpj', json_encode($apiEntrada), 'GET');

		echo json_encode($cnpj);
		return $cnpj;
	}
	if ($operacao == "buscaCEP") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'cep' => $_POST['cep']
		);
		$cep = chamaAPI(null, '/cadastros/cep', json_encode($apiEntrada), 'GET');

		echo json_encode($cep);
		return $cep;
	}
	if ($operacao == "verificaCNPJ") {
		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'cpfCnpj' => $_POST['cpfCnpj']
		);
		$pessoas = chamaAPI(null, '/cadastros/cnpj_verifica', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoas);
		return $pessoas;
	}

	if ($operacao == "filtrar") {

		$buscaPessoa = $_POST["buscaPessoa"];

		if ($buscaPessoa == "") {
			$buscaPessoa = null;
		}

		$apiEntrada = array(
			'idEmpresa' => $_SESSION['idEmpresa'],
			'idPessoa' => null,
			'buscaPessoa' => $buscaPessoa
		);

		$pessoas = chamaAPI(null, '/cadastros/pessoas', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoas);
		return $pessoas;
	}
}

?>


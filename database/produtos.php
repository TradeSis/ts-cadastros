<?php
include_once __DIR__ . "/../conexao.php";


function buscaProdutos($idProduto = null, $idMarca = null)
{

	$produtos = array();

	$apiEntrada = array(
		'idProduto' => $idProduto,
		'idMarca' => $idMarca,
	);

	$produtos = chamaAPI(null, '/cadastros/produtos', json_encode($apiEntrada), 'GET');
	return $produtos;
}

function buscaCardProdutos($idProduto = null)
{

	$produtos = array();
	
	$apiEntrada = array(
		'idProduto' => $idProduto,
	);

	$produtos = chamaAPI(null, '/cadastros/produtos_card', json_encode($apiEntrada), 'GET');
	return $produtos;
}

function buscaListaProdutosSemCatalogo($idProduto = null)
{

	$produtos = array();

	$apiEntrada = array(
		'idProduto' => $idProduto,
	);

	$produtos = chamaAPI(null, '/cadastros/produtos_listaSemCatalogo', json_encode($apiEntrada), 'GET');
	return $produtos;
}

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {

		$imgProduto = $_FILES['imgProduto'];

		if ($imgProduto !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgProduto["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeProduto'] . "_" . $imgProduto["name"];
				$path= 'http://' . $_SERVER["HTTP_HOST"] .'/img/' . $novoNomeImg;
				move_uploaded_file($imgProduto['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$novoNomeImg = "Sem_imagem";
			}
		}

		$apiEntrada = array(
			'nomeProduto' => $_POST['nomeProduto'],
			'imgProduto' => $path,
			'idMarca' => $_POST['idMarca'],
			'precoProduto' => $_POST['precoProduto'],
			'ativoProduto' => $_POST['ativoProduto'],
			'propagandaProduto' => $_POST['propagandaProduto'],
			'descricaoProduto' => $_POST['descricaoProduto'],

		);

		

		$produtos = chamaAPI(null, '/cadastros/produtos', json_encode($apiEntrada), 'PUT');
	}

	$operacao = $_GET['operacao'];

	if ($operacao == "alterar") {

		$imgProduto = $_FILES['imgProduto'];

		if ($imgProduto !== null) {
			preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgProduto["name"], $ext);

			if ($ext == true) {
				$pasta = ROOT . "/img/";
				$novoNomeImg = $_POST['nomeProduto'] . "_" . $imgProduto["name"];
				$path= 'http://' . $_SERVER["HTTP_HOST"] .'/img/' . $novoNomeImg;
				move_uploaded_file($imgProduto['tmp_name'], $pasta . $novoNomeImg);
			} else {
				$path = "null";
			}
		}
	

		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
			'nomeProduto' => $_POST['nomeProduto'],
			'imgProduto' => $path,
			'idMarca' => $_POST['idMarca'],
			'precoProduto' => $_POST['precoProduto'],
			'ativoProduto' => $_POST['ativoProduto'],
			'propagandaProduto' => $_POST['propagandaProduto'],
			'descricaoProduto' => $_POST['descricaoProduto'],

		);

		
		$produtos = chamaAPI(null, '/cadastros/produtos', json_encode($apiEntrada), 'POST');
	}




	if ($operacao == "excluir") {

		$apiEntrada = array(
			'idProduto' => $_POST['idProduto'],
		);
		if (!empty($_POST['imgProduto'])) {
			$pasta = ROOT . "/img/";
			$imagem = $pasta . $_POST['imgProduto'];

			if (file_exists($imagem)) {
				unlink($imagem);
			}
		}

		$produtos = chamaAPI(null, '/cadastros/produtos', json_encode($apiEntrada), 'DELETE');
	}


	header('Location: ../cadastros/produtos.php');
}

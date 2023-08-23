<?php
include_once __DIR__ . "/../config.php";
include_once ROOT . "/sistema/painel.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";

$nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], 'Cadastros');

$nivelMenu = $nivelMenuLogin['nivelMenu'];



?>


<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <ul class="nav a" id="myTabs">


                <?php
                $tab = '';

                if (isset($_GET['tab'])) {
                    $tab = $_GET['tab'];
                }

                ?>


                <?php if ($nivelMenu >= 2) {
                    if ($tab == '') {
                        $tab = 'clientes';
                    } ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "clientes") {
                            echo " active ";
                        } ?>" href="?tab=clientes"
                            role="tab">Clientes</a>
                    </li>
                <?php }
                if ($nivelMenu >= 2) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "produtos") {
                            echo " active ";
                        } ?>" href="?tab=produtos"
                            role="tab">Produtos</a>
                    </li>
                <?php }
                if ($nivelMenu >= 2) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "marcas") {
                            echo " active ";
                        } ?>" href="?tab=marcas"
                            role="tab">Marcas</a>
                    </li>
                <?php }
                if ($nivelMenu >= 2) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "servicos") {
                            echo " active ";
                        } ?>" href="?tab=servicos"
                            role="tab">Serviços</a>
                    </li>
                <?php }
                if ($nivelMenu >= 4) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "configuracao") {
                            echo " active ";
                        } ?>"
                            href="?tab=configuracao" role="tab" data-toggle="tooltip" data-placement="top"
                            title="Configurações"><i class="bi bi-gear"></i> Configurações</a>
                    </li>
                <?php } ?>
            </ul>

        </div>

    </div>

</div>

<?php
$src = "";

if ($tab == "clientes") {
    $src = "cadastros/clientes.php";
}
if ($tab == "produtos") {
    $src = "cadastros/produtos.php";
}
if ($tab == "marcas") {
    $src = "cadastros/marcas.php";
}
if ($tab == "servicos") {
    $src = "cadastros/servicos.php";
}
if ($tab == "configuracao") {
    $src = "configuracao/";
    if (isset($_GET['stab'])) {
        $src = $src . "?stab=" . $_GET['stab'];
    }
}

if ($src !== "") {
    //echo URLROOT ."/cadastros/". $src;
    ?>
    <div class="diviFrame">
        <iframe class="iFrame container-fluid " id="iFrameTab"
            src="<?php echo URLROOT ?>/cadastros/<?php echo $src ?>"></iframe>
    </div>
    <?php
}
?>

</body>

</html>
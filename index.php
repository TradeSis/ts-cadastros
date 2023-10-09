<?php
include_once __DIR__ . "/../config.php";
include_once "header.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";

$nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], 'Cadastros');

$nivelMenu = $nivelMenuLogin['nivelMenu'];
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>
    <title>Sistema</title>

</head>

<body>
    <?php include_once  ROOT . "/sistema/painelmobile.php"; ?>

    <div class="d-flex">

        <?php include_once  ROOT . "/sistema/novopainel.php"; ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 d-none d-md-none d-lg-block pr-0 pl-0" style="background-color: #13216A;">
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
                                <a class="nav-link1 nav-link 
                                <?php if ($tab == "clientes") {echo " active ";} ?>" 
                                href="?tab=clientes" role="tab">Clientes</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "produtos") {echo " active ";} ?>"
                                href="?tab=produtos" role="tab">Produtos</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "marcas") {echo " active ";} ?>" 
                                href="?tab=marcas" role="tab">Marcas</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "servicos") {echo " active ";} ?>" 
                                href="?tab=servicos" role="tab">Serviços</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 4) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link1 nav-link <?php if ($tab == "configuracao") {echo " active ";} ?>" 
                                href="?tab=configuracao" role="tab" data-toggle="tooltip" data-placement="top" title="Configurações"><i class="bi bi-gear"></i> Configurações</a>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
                <!--Essa coluna só vai aparecer em dispositivo mobile-->
                <div class="col-7 col-md-9 d-md-block d-lg-none" style="background-color: #13216A;">
                    <!--atraves do GET testa o valor para selecionar um option no select-->
                    <?php if (isset($_GET['tab'])) {
                        $getTab = $_GET['tab'];
                    } else {
                        $getTab = '';
                    } ?>
                    <select class="form-select mt-2" id="subtabCadastros" style="color:#000; width:160px;text-align:center;">
                        <option value="<?php echo URLROOT ?>/cadastros/index.php?tab=clientes" 
                        <?php if ($getTab == "clientes") {echo " selected ";} ?>>Clientes</option>

                        <option value="<?php echo URLROOT ?>/cadastros/index.php?tab=produtos" 
                        <?php if ($getTab == "produtos") {echo " selected ";} ?>>Produtos</option>

                        <option value="<?php echo URLROOT ?>/cadastros/index.php?tab=marcas" 
                        <?php if ($getTab == "marcas") {echo " selected ";} ?>>Marcas</option>

                        <option value="<?php echo URLROOT ?>/cadastros/index.php?tab=servicos" 
                        <?php if ($getTab == "servicos") {echo " selected ";} ?>>Serviços</option>

                        <option value="<?php echo URLROOT ?>/cadastros/index.php?tab=configuracao" 
                        <?php if ($getTab == "configuracao") {echo " selected ";} ?>>Configurações</option>
                    </select>
                </div>

                <?php include_once  ROOT . "/sistema/novoperfil.php"; ?>

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
                    <iframe class="iFrame container-fluid " id="iFrameTab" src="<?php echo URLROOT ?>/cadastros/<?php echo $src ?>"></iframe>
                </div>
            <?php
            }
            ?>
        </div><!-- div container -->
    </div><!-- div class="d-flex" -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script src="<?php echo URLROOT ?>/sistema/js/mobileSelectTabs.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>
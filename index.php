<?php
//Lucas 14042023 - modificado estrutura da navbar
//Lucas 05042023 - adicionado foreach para menuLateral.
//gabriel 220323 11:19 - adicionado IF para usuario cliente
//Lucas 13032023 - criado versão 2 do menu.
echo "<HR>antes<HR>";
include_once __DIR__ . "/../config.php";
include_once ROOT . "/painel/index.php";
echo "<HR>depois<HR>";
//include_once 'head.php';
//include_once 'database/montaMenu.php';
include_once ROOT . "/sistema/database/montaMenu.php";
$montamenu = buscaMontaMenu('Cadastros', $_SESSION['idUsuario']);
//echo json_encode($montamenu);

$menus = $montamenu['menu'];
if (!empty($montamenu['menuAtalho'])) {
    $menusAtalho = $montamenu['menuAtalho'];
}
if (!empty($montamenu['menuHeader'])) {
    $menuHeader = $montamenu['menuHeader'][0];
}
?>
<style>
    .line {
        width: 100%;
        border-bottom: 1px solid #707070;
    }

    #tabs .tab {
        display: inline-block;
        padding: 5px 10px;
        cursor: pointer;
        position: relative;
        z-index: 5;
        color: #1B4D60;
    }

    #tabs .whiteborder {
        border-bottom: 3px solid lightblue;
        border-radius: 3px 3px 0 0;
        color: #1B4D60;
    }

    #tabs .tabContent {
        position: relative;
        top: -1px;
        z-index: 1;
        padding: 10px;
        border-radius: 0 0 3px 3px;
        color: #1B4D60;
    }

    #tabs .hide {
        display: none;
    }

    #tabs .show {
        display: block;
    }
</style>

<body>


    <div id="tabs" class="mt-1 text-center">

        <?php if (!empty($montamenu['menuAtalho'])) {
            if (isset($menuAtalho['progrNome'])) { ?>
                <li>
                    <a src="<?php echo $menuAtalho[0]['progrLink'] ?>" href="#" class="nav-link" role="button">
                        <span class="fs-5 text">
                            <?php echo $menuAtalho[0]['progrNome'] ?>
                        </span>
                    </a>
                </li>
            <?php } else { ?>

                <div id="tabs" class="mt-1 text-center">
                    <?php foreach ($menusAtalho as $menuAtalho) { ?>
                        <div class="tab"><?php echo $menuAtalho['progrNome'] ?></div>

                    <?php }
                     if (isset($menuHeader['nomeMenu'])) { ?>
                        <div id="tabs" class="mt-1 text-center">
                            <div class="tab"> <?php echo $menuHeader['nomeMenu'] ?></div>
                        </div>
                        </li>
                    <?php }

                     foreach ($menusAtalho as $menuAtalho) { ?>
                        <div class="tabContent">
                            <?php
                            include $menuAtalho['progrLink']; ?>
                        </div>
                    <?php } ?>

            <?php  } }  ?>
                </div>



                <nav id="menuLateral" class="menuLateral">
                    <div class="titulo"><span></span></div>
                    <ul id="novoMenu2">
                        <?php
                        $contador = 1;
                        foreach ($menus as $menu) {
                        ?>
                            <li><a href="#" class="secao<?php echo $contador ?>"><?php echo $menu['nomeMenu'] ?><span class="material-symbols-outlined seta<?php echo $contador ?>">arrow_right</span></a>


                                <ul class="itensSecao<?php echo $contador ?>">
                                    <?php
                                    foreach ($menu['menuPrograma'] as $menuPrograma) {
                                    ?>
                                        <li><a href="#" src="<?php echo $menuPrograma['progrLink'] ?>"><?php echo $menuPrograma['progrNome'] ?></a></li>
                                    <?php } ?>


                                </ul>
                            </li>
                        <?php
                            $contador = $contador + 1;
                            // echo $contador;
                        } ?>
                    </ul>
                </nav>



                <nav id="menusecundario" class="menusecundario">
                    <div class="titulo"><span>
                            <?php if (isset($menuHeader['nomeMenu'])) {
                                echo $menuHeader['nomeMenu'] ?>
                        </span></div>
                    <li>
                        <ul class="itenscadastro" id="novoMenu2">
                            <?php
                                foreach ($menuHeader['headerPrograma'] as $headerPrograma) {
                            ?>
                                <li><a href="#" src="<?php echo $headerPrograma['progrLink'] ?>"><?php echo $headerPrograma['progrNome'] ?></a></li>
                        <?php }
                            } ?>
                        </ul>
                    </li>
                </nav>

                <!-- Modal sair -->
                <div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Selecione "Logout" abaixo se você deseja encerrar sua sessão.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary logout" href="<?php echo URLROOT ?>/painel/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--   <div class="diviFrame" style="overflow:hidden;">
        <iframe class="iFrame container-fluid " id="myIframe" src=""></iframe>
    </div> -->
                <script type="text/javascript" src="menu.js"></script>

                <script>
                    var tab;
                    var tabContent;

                    window.onload = function() {
                        tabContent = document.getElementsByClassName('tabContent');
                        tab = document.getElementsByClassName('tab');
                        hideTabsContent(1);
                    }

                    document.getElementById('tabs').onclick = function(event) {
                        var target = event.target;
                        if (target.className == 'tab') {
                            for (var i = 0; i < tab.length; i++) {
                                if (target == tab[i]) {
                                    showTabsContent(i);
                                    break;
                                }
                            }
                        }
                    }

                    function hideTabsContent(a) {
                        for (var i = a; i < tabContent.length; i++) {
                            tabContent[i].classList.remove('show');
                            tabContent[i].classList.add("hide");
                            tab[i].classList.remove('whiteborder');
                        }
                    }

                    function showTabsContent(b) {
                        if (tabContent[b].classList.contains('hide')) {
                            hideTabsContent(0);
                            tab[b].classList.add('whiteborder');
                            tabContent[b].classList.remove('hide');
                            tabContent[b].classList.add('show');
                        }
                    }
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {

                        // SELECT MENU
                        $("#novoMenu a").click(function() {

                            var value = $(this).text();
                            value = $(this).attr('id');

                            //IFRAME TAG

                            $("#myIframe").attr('src', value);
                        })
                        // SELECT MENU
                        $("#novoMenu2 a").click(function() {

                            var value = $(this).text();
                            value = $(this).attr('src');

                            //IFRAME TAG
                            if (value) {

                                $("#myIframe").attr('src', value);
                                $('.menuLateral').removeClass('mostra');
                                $('.menusecundario').removeClass('mostra');
                                $('.diviFrame').removeClass('mostra');


                            }

                        })

                        // SELECT MENU
                        $("#menuCadastros a").click(function() {

                            var value = $(this).text();
                            value = $(this).attr('id');

                            //IFRAME TAG
                            if (value != '') {
                                $("#myIframe").attr('src', value);
                            }

                        })


                    });
                </script>
</body>

</html>
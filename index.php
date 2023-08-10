<?php
include_once __DIR__ . "/../config.php";
include_once ROOT . "/sistema/painel.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";

$nivelMenuLogin =  buscaLoginAplicativo($_SESSION['idLogin'],'Cadastros');

$nivelMenu   =   $nivelMenuLogin['nivelMenu'];



?>

<style>
    .nav-link.active {
        border-bottom: 3px solid #2E59D9;
        border-radius: 3px 3px 0 0;
        color: #1B4D60;
        background-color: transparent;
    }

</style>

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <ul class="nav a" id="myTabs">


                <?php
                    $tab = 'pessoas';

                    if (isset($_GET['tab'])) {$tab = $_GET['tab'];}
               
                ?>    


            <?php if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="pessoas") {echo " active ";} ?>" 
                        href="?tab=pessoas" 
                        role="tab"                        
                        style="color:black">Pessoas</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="produtos") {echo " active ";} ?>" 
                        href="?tab=produtos" 
                        role="tab"                        
                        style="color:black">Produtos</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="marcas") {echo " active ";} ?>" 
                        href="?tab=marcas" 
                        role="tab"                        
                        style="color:black">Marcas</a>
                </li>
            <?php } if ($nivelMenu>3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="servicos") {echo " active ";} ?>" 
                        href="?tab=servicos" 
                        role="tab"                        
                        style="color:black">Serviços</a>
                </li>
            <?php } if ($nivelMenu>=4) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="configuracao") {echo " active ";} ?>" 
                        href="?tab=configuracao" 
                        role="tab"     
                        data-toggle="tooltip" data-placement="top" title="Configurações"                   
                        style="color:black"><i class="bi bi-gear" style="font-size: 18px;"></i></a>
                </li>
            <?php } ?>     
            </ul>

        </div>

    </div>

</div>

<?php
    $src="";

    if ($tab=="pessoas") {$src="cadastros/pessoas.php";}
    if ($tab=="produtos") {$src="cadastros/produtos.php";}
    if ($tab=="marcas") {$src="cadastros/marcas.php";}
    if ($tab=="servicos") {$src="cadastros/servicos.php";}
    if ($tab=="configuracao") {
            $src="configuracao/";
            if (isset($_GET['stab'])) {
                $src = $src . "?stab=".$_GET['stab'];
            }      
    }
    
if ($src!=="") {
    //echo URLROOT ."/cadastros/". $src;
?>
    <div class="diviFrame" style="overflow:hidden; height: 85vh">
        <iframe class="iFrame container-fluid " id="iFrameTab" src="<?php echo URLROOT ?>/cadastros/<?php echo $src ?>"></iframe>
    </div>
<?php
}
?>

</body>

</html>
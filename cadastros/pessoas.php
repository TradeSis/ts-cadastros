<?php
include_once(__DIR__ . '/../head.php');
include_once(__DIR__ . '/../database/servicos.php');

$servicos = buscaServicos();
?>
<style>
    .ativo_0 p{
        background-color: #D9534F;
        border-radius: 5px;
        border-bottom: 2px solid;
        color: transparent;
        margin: 10px 30px 0px 30px;
        height: 15px;
    }

    .ativo_1 p{
        background-color: #4ddd87;
        border-radius: 5px;
        border-bottom: 2px solid;
        color: transparent;
        margin: 10px 30px 0px 30px;
        height: 15px;
    }

</style>
<body class="bg-transparent">
    <div class="container" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h2 class="tituloTabela">*PESSOAS*</h2>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="servicos_inserir.php" role="button" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp Novo</a>
                    </div>
          
            </div>
        <div class="card mt-2 text-center">
            <table class="table">
                <thead class="cabecalhoTabela">
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th style="width:5px">Destaque</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($servicos as $servico) {
                ?>
                    <tr>
                        <td><img src="<?php echo URLROOT ?>/img/<?php echo $servico['imgServico'] ?>" width="60px" height="60px" alt=""></td>
                        <td><?php echo $servico['nomeServico'] ?></td>
                        <td class="ativo_<?php echo $servico['destaque'] ?>"><p><?php echo $servico['destaque'] ?></p></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#" role="button"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning btn-sm" href="servicos_alterar.php?idServico=<?php echo $servico['idServico'] ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="servicos_excluir.php?idServico=<?php echo $servico['idServico'] ?>" role="button"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>


</body>

</html>
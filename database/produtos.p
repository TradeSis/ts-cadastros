
// Programa especializado em CRAR a tabela produtos
def temp-table ttentrada no-undo serialize-name "produtos"   /* JSON ENTRADA */
    LIKE produtos
    field eanProduto like geralprodutos.eanProduto.

  
def input param vAcao as char.
DEF INPUT PARAM TABLE FOR ttentrada.
def output param vidProduto as INT.
def output param vmensagem as char.

vidProduto = ?.
vmensagem = ?.

find first ttentrada no-error.
if not avail ttentrada then do:
    vmensagem = "Dados de Entrada nao encontrados".
    return.    
end.


if vAcao = "PUT"
THEN DO:
    if ttentrada.nomeProduto = ?
    then do:
        vmensagem = "Dados de Entrada Invalidos".
        return.
    end.

    if ttentrada.eanProduto = 0
    then do:
        ttentrada.eanProduto = ?.
    end.

    find geralprodutos where geralprodutos.nomeProduto = ttentrada.nomeProduto no-lock no-error.
        if avail geralprodutos
        THEN DO:
            ttentrada.idGeralProduto = geralprodutos.idGeralProduto.
        END.
    ELSE DO:
        CREATE geralprodutos.
        geralprodutos.eanProduto   = ttentrada.eanProduto.
        geralprodutos.nomeProduto  = ttentrada.nomeProduto.
        
        find last geralprodutos no-lock.
        ttentrada.idGeralProduto = geralprodutos.idGeralProduto.
    END.
    
    find produtos where 
        produtos.idGeralProduto = ttentrada.idGeralProduto AND 
        produtos.idPessoaFornecedor = ttentrada.idPessoaFornecedor 
        no-lock no-error.
    if avail produtos
    then do:
        vmensagem = "Produto ja cadastrado".
        return.
    end.
    do on error undo:
        create produtos.
        vidProduto = produtos.idProduto.
        produtos.idGeralProduto   = ttentrada.idGeralProduto.
        produtos.idPessoaFornecedor   = ttentrada.idPessoaFornecedor.
        produtos.refProduto   = ttentrada.refProduto.
        produtos.nomeProduto   = ttentrada.nomeProduto.
        produtos.valorCompra   = ttentrada.valorCompra.
        produtos.substICMSempresa   = ttentrada.substICMSempresa.
        produtos.substICMSFornecedor   = ttentrada.substICMSFornecedor.
        produtos.codigoNcm   = ttentrada.codigoNcm.
        produtos.codigoCest   = ttentrada.codigoCest.
    end.
    
END.
IF vAcao = "POST" 
THEN DO:
    if ttentrada.idProduto = ?
    then do:
        vmensagem = "Dados de Entrada Invalidos".
        return.
    end.

    find produtos where produtos.idProduto = ttentrada.idProduto no-lock no-error.
    if not avail produtos
    then do:
        vmensagem = "Produto nao cadastrado".
        return.
    end.

    do on error undo:   
        find produtos where produtos.idProduto = ttentrada.idProduto exclusive no-error.
        BUFFER-COPY ttentrada TO produtos .
    end.

    
END.
   

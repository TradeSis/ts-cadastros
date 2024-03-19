def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "produtos"   /* JSON ENTRADA */
    field eanProduto                     like geralprodutos.eanProduto
    field idPessoaFornecedor             like produtos.idPessoaFornecedor 
    field refProduto                     like produtos.refProduto
    field nomeProduto                    like produtos.nomeProduto
    field valorCompra                    like produtos.valorCompra
    field substICMSempresa               like produtos.substICMSempresa
    field substICMSFornecedor            like produtos.substICMSFornecedor
    field codigoNcm                      like produtos.codigoNcm
    field codigoCest                     like produtos.codigoCest.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field idProduto        as int serialize-name "idProduto"
    field descricaoStatus      as char.

DEF VAR idGeralProduto like produtos.idGeralProduto.

hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.


if not avail ttentrada
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada nao encontrados".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

if ttentrada.nomeProduto = ?
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Dados de Entrada Invalidos".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

find geralprodutos where geralprodutos.nomeProduto = ttentrada.nomeProduto no-lock no-error.
if avail geralprodutos
THEN DO:
    idGeralProduto = geralprodutos.idGeralProduto.
END.
ELSE DO:
    CREATE geralprodutos.
    geralprodutos.eanProduto   = ttentrada.eanProduto.
    geralprodutos.nomeProduto  = ttentrada.nomeProduto.
    
    find last geralprodutos no-lock.
    idGeralProduto = geralprodutos.idGeralProduto.
END.

find produtos where 
produtos.idGeralProduto = idGeralProduto AND 
produtos.idPessoaFornecedor = ttentrada.idPessoaFornecedor 
no-lock no-error.
if avail produtos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.idProduto = produtos.idProduto.
    ttsaida.descricaoStatus = "Produto ja cadastrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.


do on error undo:
    create produtos.
    produtos.idGeralProduto   = idGeralProduto.
    produtos.idPessoaFornecedor   = ttentrada.idPessoaFornecedor.
    produtos.refProduto   = ttentrada.refProduto.
    produtos.nomeProduto   = ttentrada.nomeProduto.
    produtos.valorCompra   = ttentrada.valorCompra.
    produtos.substICMSempresa   = ttentrada.substICMSempresa.
    produtos.substICMSFornecedor   = ttentrada.substICMSFornecedor.
    produtos.codigoNcm   = ttentrada.codigoNcm.
    produtos.codigoCest   = ttentrada.codigoCest.
end.

create ttsaida.
find last produtos no-lock.
ttsaida.tstatus = 200.
ttsaida.idProduto = produtos.idProduto.
ttsaida.descricaoStatus = "Produto cadastrado com sucesso".

hsaida  = temp-table ttsaida:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).

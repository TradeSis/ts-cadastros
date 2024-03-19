def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "dadosEntrada"   /* JSON ENTRADA */
    field buscaProduto  AS CHAR
    field idProduto  like produtos.idProduto.

def temp-table ttprodutos  no-undo serialize-name "produtos"  /* JSON SAIDA */
    like produtos.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vidProduto like ttentrada.idProduto.


hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vidProduto = 0.
if avail ttentrada
then do:
    vidProduto = ttentrada.idProduto.
    if vidProduto = ? then vidProduto = 0.
end.
if ttentrada.buscaProduto = ""
then do:
    ttentrada.buscaProduto = ?.
end.
if ttentrada.idProduto = 0
then do:
    ttentrada.idProduto = ?.
end.

IF ttentrada.idProduto <> ? OR (ttentrada.idProduto = ? AND ttentrada.buscaProduto = ?)
THEN DO:
    for each produtos where
        (if vidProduto = 0
        then true /* TODOS */
        ELSE produtos.idProduto = vidProduto)
        no-lock.

        create ttprodutos.
        BUFFER-COPY produtos TO ttprodutos.

    end.
END.

IF ttentrada.buscaProduto <> ?
THEN DO:
    find produtos where 
        produtos.nomeProduto MATCHES "*" + ttentrada.buscaProduto + "*"
        NO-LOCK no-error.
        
        if avail produtos
        then do:
            create ttprodutos.
            BUFFER-COPY produtos TO ttprodutos.
        end.
END.
    

  

find first ttprodutos no-error.

if not avail ttprodutos
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Produto nao encontrado".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttprodutos:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).

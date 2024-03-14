def input param vlcentrada as longchar. /* JSON ENTRADA */
def input param vtmp       as char.     /* CAMINHO PROGRESS_TMP */

def var vlcsaida   as longchar.         /* JSON SAIDA */

def var lokjson as log.                 /* LOGICAL DE APOIO */
def var hentrada as handle.             /* HANDLE ENTRADA */
def var hsaida   as handle.             /* HANDLE SAIDA */

def temp-table ttentrada no-undo serialize-name "dadosEntrada"   /* JSON ENTRADA */
    field cpfCnpj  like pessoas.cpfCnpj initial ?
    field idPessoa  like pessoas.idPessoa initial ?.

def temp-table ttpessoas  no-undo serialize-name "pessoas"  /* JSON SAIDA */
    like pessoas.

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"  /* JSON SAIDA CASO ERRO */
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.

def VAR vidPessoa like ttentrada.idPessoa.


hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY") no-error.
find first ttentrada no-error.

vidPessoa = 0.
if avail ttentrada
then do:
    vidPessoa = ttentrada.idPessoa.
    if vidPessoa = ? then vidPessoa = 0.
end.

IF ttentrada.idPessoa <> ? OR (ttentrada.idPessoa = ? AND ttentrada.cpfCnpj = ?)
THEN DO:
    for each pessoas where
        (if vidPessoa = 0
        then true /* TODOS */
        ELSE pessoas.idPessoa = vidPessoa)
        no-lock.

        create ttpessoas.
        BUFFER-COPY pessoas TO ttpessoas.

    end.
END.

IF ttentrada.cpfCnpj <> ?
THEN DO:
    find pessoas where 
        pessoas.cpfCnpj =  ttentrada.cpfCnpj 
        NO-LOCK.
           
        create ttpessoas.
        BUFFER-COPY pessoas TO ttpessoas.
END.
    

  

find first ttpessoas no-error.

if not avail ttpessoas
then do:
    create ttsaida.
    ttsaida.tstatus = 400.
    ttsaida.descricaoStatus = "Pessoa nao encontrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.

hsaida  = TEMP-TABLE ttpessoas:handle.


lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
put unformatted string(vlcSaida).

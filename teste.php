<?php
include_once(__DIR__ . '/conexao.php');
require_once(__DIR__ . '/vendor/autoload.php');


$config = NuvemFiscal\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'Bearer');
$config = NuvemFiscal\Configuration::getDefaultConfiguration()->setAccessToken('eyJ0eXAiOiJKV1QiLCJraWQiOiIwMWIwNDFkMWQ2MTU0NjA0NzNkMWI1NGFhOGRlNGQ1NyIsImFsZyI6IlJTMjU2In0.eyJzY29wZSI6ImVtcHJlc2EgY2VwIGNucGogbmZlIG5mY2UgbmZzZSBjdGUgbWRmZSIsImp0aSI6ImI0NGQxMmQwLTY5ZjEtNDJlMy05ZDIzLTllZDExM2E0NjY0MyIsImh0dHBzOlwvXC9udXZlbWZpc2NhbC5jb20uYnJcL3RlbmFudF9pZCI6IjNhMGYwOThmLTNiMmItNGU0YS04OWEzLWRkN2EyZjAzYzViZCIsImlzcyI6Imh0dHBzOlwvXC9hdXRoLm51dmVtZmlzY2FsLmNvbS5iciIsImF1ZCI6Imh0dHBzOlwvXC9hcGkuc2FuZGJveC5udXZlbWZpc2NhbC5jb20uYnJcLyIsImV4cCI6MTcwMzI2MTc2NSwiaWF0IjoxNzAwNjY5NzY1LCJjbGllbnRfaWQiOiJBNFExd0pzTnYxV2tWNTZCVGx4TiJ9.SubCFFtIfl0yVUT_E8zOBlZWzM4N1IG3J8GOMoW8F-F-1iw7UL4HnnniPPiRVZD0-AukwNV_coJ_mIN9toIJfl-JF5URlWLQS5N2foLKlhogRXbZDnn4mKYtBJ2mqpw6CKt3UifF4oEZmC3IX9nroHIcy3Vyxy9-da6Alch-0iEvDRGKLaUrL09_CIlEqB76CdFY1FZ4qAmiBT__oPPrDZ0FknWLXlE0a9nGz8rXFuaCJQG9gza9bkZcClepjfiJiMqSPdrIql90sg2y6YOKlADWbVr0OrjbLx7wSTg5h-DHlmtlkZVXp3YjrsEjIm5sewcb2NWDBoPwvCxr2yiqTA');



$apiInstance = new NuvemFiscal\Api\CepApi(
    new GuzzleHttp\Client(),
    $config
);
$cep = '91750740';
$result = $apiInstance->consultarCep($cep);
echo json_encode($result);

echo "<HR>";

$apiInstance = new NuvemFiscal\Api\CnpjApi(
    new GuzzleHttp\Client(),
    $config
);
$cnpj = '17571337000151'; 
$result = $apiInstance->consultarCnpj($cnpj);
echo json_encode($result);

echo "<HR>"; 



<?php

//INCLUINDO O AUTOLOAD E A CONEXAO COM O BANCO
require './vendor/autoload.php';
include_once ('../../model/Conexao.php');

//USANDO O DOMPDF
use Dompdf\Dompdf;

//INSTANCIANDO O DOMPDF
$dompdf = new Dompdf();

//HORARIO E FUSIO HORARIO
$timezone = new DateTimeZone ('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);


//CONECTANDO E SELECT DO BANCO DE DADOS
$conectar = Conexao::conectar();

$query_instituicoes = "SELECT codInstituicao, nomeInstituicao, logInstituicao, numLogInstituicao, cepInstituicao, bairroInstituicao, cnpjInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao 
FROM tbInstituicao";

$resultado_instituicoes = $conectar->prepare ($query_instituicoes);

$resultado_instituicoes->execute();



//CODIGO HTML

$html = <<<'ENDHTML'
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gerarPdf.css">
    <title>Relatorio</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            border: 1px solid #000;
            color: #000;
            padding: 10px;
            text-align: center;
            
        }

        hr{
            color: #000
        }

        .titulos{
            text-align: center;
            font-weight: bold;
        }

        .text-titulos{
            font-size: 13px;
            font-weight: bold;
        }

        h1 {
            margin: 0;
        }

        .conteudo{
            padding: 20px;
            border: 1px solid #CCC;
        }

        footer{
            display: flex;
            height: 35px;
            margin-top: 15px;
            justify-content: center;
            align-items: center;
            text-align: center;
            border: 2px solid #000;
        }
    </style>

    
</head>
 <body>
    <div class="header">
        <h2> CONECTA </h2>
ENDHTML;

        $html .= "<p>EMITIDO EM " . $agora-> format('d/m/Y H:i'). "<p>";

$html .= <<<'ENDHTML'
    </div>

    <div class="titulos">
        <h4>RELATÓRIO DAS INSTITUIÇÕES CADASTRADAS </h4>
        <hr>
        <font>Relatório de Intituições Cadastradas</font>
        <hr>
    </div>

    <div class="conteudo">
        <font class="text-titulos">Dados das Instituições</font><br>
        <hr>
ENDHTML;
 

    while ($row_instituicao = $resultado_instituicoes->fetch(PDO::FETCH_ASSOC)) {
        extract($row_instituicao);
        $html.= "<b>Numero do cadastro: </b> $codInstituicao <br>";
        $html.= "<b>Nome: </b> $nomeInstituicao <br>";
        $html.= "<b>Cnpj: </b> $cnpjInstituicao <br>";
        $html.= "<b>E-mail: </b> $emailInstituicao <br>";
        $html.= "<b>Endereço: </b> $logInstituicao, $numLogInstituicao - $bairroInstituicao / <b>Cidade: </b> $cidadeInstituicao <b>Estado: </b> $estadoInstituicao <b>País: </b> $paisInstituicao  <br>";
        $html.= "<hr>";
    }

$html .= <<<'ENDHTML'
    </div>

    <footer>
    <p>
        CONECTA | AION - Rua Feliciano de Mendonça, 290 - Guaianases, São Paulo - SP
        , 08460-365 - Telefone: (11) 2551-9484
    </p>
    </footer>
    </body>
</html>
ENDHTML;



//CARREAGANDO O CODIGO HTLM;  ESCOLHANDO OPÇOES DO PDF;  RENDERIZANDO CODIGO;  EXIBINDO NO PDF
$dompdf -> loadHtml($html);

$dompdf-> setPaper('A4', 'portrait');

$dompdf-> render();

$dompdf-> stream('Relatório das Instituições');

?>
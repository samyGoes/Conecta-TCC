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

$query_vagas = "SELECT codServico, nomeServico, horarioServico, periodoServico, nomeInstituicao, tipoServico, descServico  
FROM tbServico
INNER JOIN tbInstituicao
ON tbServico.codInstituicao = tbInstituicao.codInstituicao";

$resultado_vagas = $conectar->prepare ($query_vagas);

$resultado_vagas->execute();



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
        <h4>RELATÓRIO DE VAGAS CADASTRADOS </h4>
        <hr>
        <font>Relatório de Vagas Cadastrados</font>
        <hr>
    </div>

    <div class="conteudo">
        <font class="text-titulos">Dados das vagas</font><br>
        <hr>
ENDHTML;
 

    while ($row_vaga = $resultado_vagas->fetch(PDO::FETCH_ASSOC)) {
        extract($row_vaga);
        $html.= "<b>Numero do cadastro: </b> $codServico <br>";
        $html.= "<b>Nome: </b> $nomeServico <br>";
        $html.= "<b>Instituição: $nomeInstituicao <br>";
        $html.= "<b>Tipo de Serviço:</b> $tipoServico - <b>Horario: </b> $horarioServico - <b>Periodo:</b> $periodoServico<br> ";
        $html.= "<b> Descrição da vaga: </b> <br>";
        $html.= "$descServico <br>";
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

$dompdf-> stream('Relatorio de Vagas');

?>
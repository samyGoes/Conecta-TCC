<?php

//INCLUINDO O AUTOLOAD E A CONEXAO COM O BANCO
require './vendor/autoload.php';
include_once ('../model/Conexao.php');

//USANDO O DOMPDF
use Dompdf\Dompdf;

//INSTANCIANDO O DOMPDF
$dompdf = new Dompdf();



//CONECTANDO E SELECT DO BANCO DE DADOS
$conectar = Conexao::conectar();

$query_voluntarios = "SELECT nomeVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario FROM tbVoluntario";

$resultado_voluntarios = $conectar->prepare ($query_voluntarios);

$resultado_voluntarios->execute();



//CODIGO HTML

$html = <<<'ENDHTML'
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
</head>
 <body>
  <h1> Relatorio Voluntario Cadastrados </h1>
 
ENDHTML;

    while ($row_voluntario = $resultado_voluntarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_voluntario);
        $html.= "NOME: $nomeVoluntario <br>";
        $html.= "E-MAIL: $emailVoluntario <br>";
        $html.= "CIDADE: $cidadeVoluntario <br>";
        $html.= "ESTADO: $estadoVoluntario <br>";
        $html.= "PAIS: $paisVoluntario <br>";
        $html.= "<hr>";
    }

$html .= <<<'ENDHTML'
    </body>
</html>
ENDHTML;


//CARREAGANDO O CODIGO HTLM;  ESCOLHANDO OPÇOES DO PDF;  RENDERIZANDO CODIGO;  EXIBINDO NO PDF
$dompdf -> loadHtml($html);

$dompdf-> setPaper('A4', 'portrait');

$dompdf-> render();

$dompdf-> stream('Relatorio');

?>
<?php
//Incluir a conexão com banco de dados
include_once 'model/Conexao.php';

$voluntarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
FROM tbCandidatura
INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
WHERE tbInstituicao.codInstituicao = ? AND tbServico.codServico = ? AND tbCandidatura.statusCandidatura = 'pendente'";;
$resultado_user = mysqli_query($conexao, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
		echo "<li>".$row_user['nomeVoluntario ']."</li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}
?>
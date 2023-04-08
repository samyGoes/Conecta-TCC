<?php

require_once 'global.php';
include_once('Conexao.php');
session_start();

$conectar = Conexao::conectar();

// Verifica se a sessão 'user' foi iniciada
if (!isset($_SESSION['user_inst'])) {
    // Redireciona o usuário para a página de login ou exibe uma mensagem de erro
    header("Location: login.php");
    exit;
}

$user_inst = $_SESSION['user_inst'];

$id_instituicao_query = "SELECT codInstituicao FROM tbInstituicao WHERE emailInstituicao= '$user_inst'";
$id_instituicao_result = $conectar->query($id_instituicao_query);

// Verifica se a consulta SQL retornou algum resultado
if ($id_instituicao_result->rowCount() > 0) {
    $id_instituicao_row = $id_instituicao_result->fetch();
    $id_instituicao = $id_instituicao_row['codInstituicao'];

    // Armazena o id_user na sessão
    $_SESSION['id_instituicao'] = $id_instituicao;

    $foneInstituicao_query = "SELECT codInstituicao FROM tbFoneInstituicao WHERE codInstituicao = '$id_instituicao'";
    $foneInstituicao_result = $conectar->query($foneIncodInstituicaostituicao_query);

    // Verifica se a consulta SQL retornou algum resultado
    if ($foneInstituicao_result->rowCount() > 0) {
        $foneInstituicao_row = $foneInstituicao_result->fetch();
        $foneInstituicao = $foneInstituicao_row['codInstituicao'];

        // Armazena o foneInstituicao na sessão
        $_SESSION['foneInstituicao'] = $foneInstituicao;

        $query_fone = "DELETE FROM tbfoneInstituicao WHERE codInstituicao = '$id_instituicao'";
        $delete_fone = $conectar->prepare($query_fone);

        if ($delete_fone->execute()) {

            // Exclui o usuário
            $query_instituicao = "DELETE FROM tbInstituicao WHERE emailInstituicao = '$user_inst'";
            $delete_instituicao = $conectar->prepare($query_instituicao);

            if ($delete_instituicao->execute()) {
                echo "Usuário excluído com sucesso";
            } else {
                echo "Erro ao excluir usuário";
            }
        } else {
            echo "Erro ao excluir telefone";
        }
    } else {
        echo "Não foi encontrado nenhum telefone para o usuário";
    }
} else {
    echo "Usuário não encontrado";
}


?>
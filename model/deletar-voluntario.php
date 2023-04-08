<?php

require_once 'global.php';
include_once('Conexao.php');
session_start();

$conectar = Conexao::conectar();

// Verifica se a sessão 'user' foi iniciada
if (!isset($_SESSION['user_vol'])) {
    // Redireciona o usuário para a página de login ou exibe uma mensagem de erro
    header("Location: login.php");
    exit;
}

$user_vol = $_SESSION['user_vol'];

$id_voluntario_query = "SELECT codVoluntario FROM tbVoluntario WHERE emailVoluntario= '$user_vol'";
$id_voluntario_result = $conectar->query($id_voluntario_query);

// Verifica se a consulta SQL retornou algum resultado
if ($id_voluntario_result->rowCount() > 0) {
    $id_voluntario_row = $id_voluntario_result->fetch();
    $id_voluntario = $id_voluntario_row['codVoluntario'];

    // Armazena o id_user na sessão
    $_SESSION['id_voluntario'] = $id_voluntario;

    $foneVoluntario_query = "SELECT codVoluntario FROM tbFoneVoluntario WHERE codVoluntario = '$id_voluntario'";
    $foneVoluntario_result = $conectar->query($foneVoluntario_query);

    // Verifica se a consulta SQL retornou algum resultado
    if ($foneVoluntario_result->rowCount() > 0) {
        $foneVoluntario_row = $foneVoluntario_result->fetch();
        $foneVoluntario = $foneVoluntario_row['codVoluntario'];

        // Armazena o foneVoluntario na sessão
        $_SESSION['foneVoluntario'] = $foneVoluntario;

        $query_fone = "DELETE FROM tbfonevoluntario WHERE codVoluntario = '$id_voluntario'";
        $delete_fone = $conectar->prepare($query_fone);

        if ($delete_fone->execute()) {

            // Exclui o usuário
            $query_voluntario = "DELETE FROM tbVoluntario WHERE emailVoluntario = '$user_vol'";
            $delete_voluntario = $conectar->prepare($query_voluntario);

            if ($delete_voluntario->execute()) {
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
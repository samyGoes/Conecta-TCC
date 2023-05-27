<?php
    // pesquisar_voluntarios.php

    require_once 'global.php';

    // Receber os parâmetros da solicitação AJAX
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $causas = $_POST['causas'];

    $conexao = Conexao::conectar();


    // Construir a consulta SQL com base nos parâmetros
    $sql = "SELECT * FROM tbvoluntario WHERE";

    if ($estado) {
        $sql .= "estado = :estado";
    }

    if ($cidade) {
        $sql .= "cidade = :cidade";
    }

    if ($causas) {
        $causasArray = explode(',', $causas);
        $placeholders = implode(',', array_fill(0, count($causasArray), '?'));

        $sql .= "idVoluntario IN (
            SELECT idVoluntario FROM tbvoluntariocategoriaservico WHERE idCategoriaServico IN (
                SELECT idCategoriaServico FROM tbcategoriaservico WHERE idCategoriaServico IN ($placeholders)
            )
        )";
    }

    // Executar a consulta e obter os resultados
    try {
        $stmt = $conexao->prepare($sql);

        if ($estado) {
            $stmt->bindValue(':estado', $estado);
        }

        if ($cidade) {
            $stmt->bindValue(':cidade', $cidade);
        }

        if ($causas) {
            $stmt->execute($causasArray);
        } else {
            $stmt->execute();
        }

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os resultados como resposta à solicitação AJAX
        echo json_encode($resultados);
    } catch (PDOException $e) {
        // Tratar erros de consulta
        echo json_encode(['error' => $e->getMessage()]);
}
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o ID da imagem foi recebido
        if (isset($_POST['imagemId'])) {
            $imagemId = $_POST['imagemId'];

            // Lógica para excluir a imagem no banco de dados ou no sistema de arquivos
            // Substitua esta parte pelo seu código para excluir a imagem
        
            // Exemplo: Excluir a imagem do diretório de imagens
            $caminhoImagem = 'galeriaintituicao/' . $imagemId . '.jpg';
            if (file_exists($caminhoImagem)) {
                unlink($caminhoImagem); // Exclui o arquivo de imagem
            }

            // Retorna uma resposta JSON indicando que a exclusão foi bem-sucedida
            echo json_encode(['success' => true]);
        } else {
            // Caso o ID da imagem não seja recebido
            // Retorna uma resposta JSON indicando erro
            echo json_encode(['success' => false, 'message' => 'ID da imagem não fornecido']);
        }
    } else {
        // Caso a solicitação não seja uma requisição POST válida
        // Retorna uma resposta JSON indicando erro
        echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    }
?>

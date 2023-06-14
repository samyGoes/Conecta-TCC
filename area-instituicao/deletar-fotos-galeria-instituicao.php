<?php
require_once 'global.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idFoto'])) {
    $idFoto = $_POST['idFoto'];
    
    try {
        $foto = GaleriaInstituicaoDao::consultarPorId($idFoto); // Consulta a foto pelo ID
        
        if ($foto) {
            $fotoCaminho = $foto->getFotoGaleria(); // Obtém o caminho do arquivo da foto
            
            if (unlink($fotoCaminho)) { // Deleta o arquivo da foto no servidor
                GaleriaInstituicaoDao::excluir($idFoto); // Exclui a foto do banco de dados
                echo "Foto deletada com sucesso!";
            } else {
                echo "Erro ao excluir o arquivo da foto.";
            }
        } else {
            echo "Foto não encontrada!";
        }
    } catch (Exception $e) {
        echo "Erro ao deletar a foto: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>





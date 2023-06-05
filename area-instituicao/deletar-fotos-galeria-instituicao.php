<?php
    require_once 'global.php';


   //IMCOMPLETO. PAREI PARA FAZER OUTRA COISA MAIS URGENTE... JÁ VOLTO PARA ARRUMAR TENHA PACIENCIA

    function deletarFoto($idFoto) {
        try {
            $galeria = GaleriaInstituicaoDao::consultarPorId($idFoto); // Supondo que exista uma função para consultar uma foto pelo ID

            if ($galeria) {
                $foto = $galeria->getFotoGaleria();
                unlink($foto); // Deleta o arquivo da foto no servidor

                GaleriaInstituicaoDao::excluir($idFoto); // Chama a função excluir() na classe GaleriaInstituicaoDao para deletar a foto pelo ID

                echo "Foto deletada com sucesso!";
            } else {
                echo "Foto não encontrada!";
            }
        } catch (Exception $e) {
            echo "Erro ao deletar a foto: " . $e ->getMessage();
        }
    }
    deletarFoto($idFoto);

?>







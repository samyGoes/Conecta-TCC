<?php
// Inicialize a sessão
session_start();

// Obtém os parâmetros do cookie de sessão
$params = session_get_cookie_params();

// Define o diretório de armazenamento dos arquivos de sessão
$sessionDir = $params['path'];

// Obtém uma lista de todos os arquivos de sessão no diretório
$sessionFiles = glob($sessionDir . '/sess_*');

// Exibe as informações de cada sessão
foreach ($sessionFiles as $file) {
    // Obtém o ID da sessão do nome do arquivo
    $sessionId = str_replace($sessionDir . '/sess_', '', $file);

    // Define o ID da sessão para recuperar os dados
    session_id($sessionId);

    // Inicia a sessão para recuperar os dados
    session_start();

    // Obtém os dados da sessão
    $sessionData = $_SESSION;

    // Exibe as informações da sessão
    echo "ID da Sessão: " . $sessionId . "<br>";
    echo "Dados da Sessão: ";
    print_r($sessionData);
    echo "<br><br>";

    // Encerra a sessão atual
    session_abort();
}
?>

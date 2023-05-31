$(document).ready(function() {
    $('#form-pesquisa').submit(function(event) {
        event.preventDefault(); // Evita o envio do formulário e o refresh da página
        
        var pesquisa = $('#pesquisar').val(); // Obtém o valor da pesquisa do campo de entrada
        
        // Envia a solicitação AJAX ao servidor
        $.ajax({
            url: '../instituicoes/instituicoes.php', // Substitua pelo nome do arquivo PHP que contém a função 'listar'
            type: 'POST',
            data: { pesquisar: pesquisa }, // Envia o valor da pesquisa como parâmetro
            success: function(data) {
                // Atualiza a parte da página com os resultados da pesquisa
                $('#resultado-pesquisa').html(data);
            }
        });
    });
});


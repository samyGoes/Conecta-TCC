<script>
    $(document).ready(function() {
        $('.table-btn-chamar, .table-btn-recusar').click(function(e) {
            e.preventDefault(); // Evita o comportamento padrão do botão (enviar o formulário)

            var btn = $(this);
            var codSolicitacao = btn.val();
            var url = 'tabela-solicitacao-habilidade.php'; // Substitua pelo caminho correto para o arquivo PHP que contém o código atualizado

            // Enviar solicitação AJAX
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    btnChamar: codSolicitacao // Pode ser 'btnRecusar' se o botão for de recusar
                },
                dataType: 'json',
                success: function(response) {
                    // Verificar se a solicitação foi bem-sucedida
                    if (response.success) {
                        // Atualizar a tela aqui, se necessário
                        // Por exemplo, você pode remover a linha da tabela correspondente ao botão clicado
                        btn.closest('tr').remove();
                    } else {
                        // Lidar com possíveis erros
                        console.log('Ocorreu um erro ao processar a solicitação.');
                    }
                },
                error: function(xhr, status, error) {
                    // Lidar com erros de requisição
                    console.log('Ocorreu um erro na requisição AJAX: ' + error);
                }
            });
        })
    })
</script>

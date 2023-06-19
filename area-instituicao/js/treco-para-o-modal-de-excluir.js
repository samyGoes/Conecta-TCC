// document.getElementById('btnExcluir').addEventListener('click', function() {
//     var codFoto = this.value;
//     excluirImagem(codFoto);
// });

 async function excluirImagem() {

    // Crie uma instância do objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configure a solicitação AJAX
    xhr.open('POST', 'form-adicionar-fotos-instituicao.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Defina a função de callback para o evento "onreadystatechange"
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {

                var resposta = JSON.parse(xhr.responseText);
                console.log(resposta);
                // A solicitação foi bem-sucedida, faça algo aqui se necessário
                //window.location.href = 'tabela-voluntarios-instituicao.php?candidatura=true';
            } else {
                // Houve um erro na solicitação, lide com o erro aqui
                console.error('Erro na solicitação AJAX');
            }
        }
    };

    // Envie a solicitação AJAX com os dados necessários
    xhr.send();
}


// Função para acionar a filtragem
function filtrar() {
    // Obtenha os valores dos filtros selecionados
    const causas = Array.from(document.querySelectorAll('.checkbox-causas:checked')).map(checkbox => checkbox.value);
    const estado = document.querySelector('#estados').value;
    const cidade = document.querySelector('#cidades').value;
  
    // Crie um objeto FormData para enviar os filtros via AJAX
    const formData = new FormData();
    formData.append('causas', causas);
    formData.append('estado', estado);
    formData.append('cidade', cidade);
  
    // Crie uma requisição AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'voluntarios.php');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Atualize a tabela ou os resultados na página com a resposta do servidor
        document.getElementById('resultado-lista-voluntario').innerHTML = xhr.responseText;
      }
    };
  
    // Envie a requisição AJAX com os filtros
    xhr.send(formData);
  }
  
  // Adicione eventos de mudança aos elementos de filtro
  document.querySelectorAll('.checkbox-causas').forEach(checkbox => {
    checkbox.addEventListener('change', filtrar);
  });
  
  document.querySelector('#estados').addEventListener('change', filtrar);
  document.querySelector('#cidades').addEventListener('change', filtrar);
  

const input_cep = document.getElementById('cep')
const input_numero = document.getElementById('numeroCasa')
const input_bairro = document.getElementById('bairro')
const input_cidade = document.getElementById('cidade')
const input_logradouro = document.getElementById('logradouro')
const input_uf = document.getElementById('uf')

input_cep.addEventListener('blur', () => {
    let cep = input_cep.value;

    if (cep.length !== 9) {
        window.alert('Digite um cep válido')
    }

    fetch (`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(json => {
            input_bairro.value = json.bairro;
            input_cidade.value = json.localidade;
            input_logradouro.value = json.logradouro
            input_uf.value = json.uf;

            input_numero.focus();
        })
})

// API DO PÁIS //

// Definir a URL da API
const url = 'https://restcountries.com/v3.1/all';

// Selecionar o campo de seleção
const select = document.getElementById('pais');

// Fazer uma requisição HTTP GET para a API
fetch(url)
  .then(response => response.json())
  .then(data => {
    // Processar a resposta da API
    const countries = data.map(country => country.name.common);

    // Preencher o campo de seleção com os nomes dos países
    countries.forEach(country => {
      const option = document.createElement('option');
      option.text = country;
      select.add(option);
    });
  })
  .catch(error => console.error(error));

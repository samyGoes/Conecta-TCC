

// SELECTS ESTADOS E CIDADES
const urlEstados = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/';
const estados = document.querySelector("#estados");
const cidades = document.querySelector("#cidades");

// FUNÇÃO PARA LISTAR AS CIDADES DE ACORDO COM O ESTADO SELECIONADO
estados.addEventListener('change', async function () {
    const urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estados.value + '/municipios/';
    const request = await fetch(urlCidades);
    const response = await request.json();

    let options = '';
    response.forEach(function (cidades) {
        options += '<option class="select-option">' + cidades.nome + '</option>';
    });

    cidades.innerHTML = options;
});

// FUNÇÃO PARA LISTAR OS ESTADOS
window.addEventListener('load', async () => {
    const request = await fetch(urlEstados);
    const response = await request.json();

    const options = document.createElement('optgroup');
    // options.setAttribute('label', 'Estados');

    response.forEach(function (estados) {
        options.innerHTML += '<option class="select-option">' + estados.sigla + '</option>';
    });

    estados.append(options);
});
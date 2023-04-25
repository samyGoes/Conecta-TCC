// DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
const botaoCausas = document.querySelector(".filtro-causas-i");
const boxCausas = document.querySelector(".box-causas-i");
const dropCausas = document.querySelector('.clique-fora');

botaoCausas.addEventListener("click", function() 
{
    if (boxCausas.style.display == "none" || boxCausas.style.display === "") 
    {
       boxCausas.style.display = "flex";
       botaoCausas.style.backgroundColor = "#4567a5";
       botaoCausas.style.color = "#fff";
       botaoCausas.style.borderColor = "#4567a5";
    } 
    else 
    {
       boxCausas.style.display = "none";
       botaoCausas.style.backgroundColor = "#d6ebfd";
       botaoCausas.style.color = "#000";
       botaoCausas.style.borderColor = "#000";
    }
});

document.addEventListener('click', function(event) 
{
    const target = event.target;
    if (!dropCausas.contains(target)) 
    {
        boxCausas.style.display = "none";
        botaoCausas.style.backgroundColor = "#d6ebfd";
        botaoCausas.style.color = "#000";
        botaoCausas.style.borderColor = "#000";
    }
});








// SELECTS ESTADOS E CIDADES
const urlEstados = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/';
const estados = document.querySelector("#estados");
const cidades = document.querySelector("#cidades");

// FUNÇÃO PARA LISTAR AS CIDADES DE ACORDO COM O ESTADO SELECIONADO
estados.addEventListener('change', async function()
{
    const urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+ estados.value +'/municipios/';
    const request = await fetch(urlCidades);
    const response = await request.json();

    let options = '';
    response.forEach(function(cidades)
    {
        options += '<option class="select-option">'+ cidades.nome +'</option>';
    });

    cidades.innerHTML = options;
});

// FUNÇÃO PARA LISTAR OS ESTADOS
window.addEventListener('load', async ()=>
{
    const request = await fetch(urlEstados);
    const response = await request.json();

    const options = document.createElement('optgroup');
    // options.setAttribute('label', 'Estados');

    response.forEach(function(estados)
    {
        options.innerHTML += '<option class="select-option">' + estados.sigla + '</option>'; 
    });

    estados.append(options);
});


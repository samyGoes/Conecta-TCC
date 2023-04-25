
// OCULTANDO SESSÕES

// DADOS PESSOAIS 
const ocultarSessao = document.querySelector(".ocultar-sessao");
const setaOcultar = document.querySelector(".seta-ocultar");

setaOcultar.addEventListener("click", function setaOcultar()
{
    ocultarSessao.classList.toggle("fechado");
});


// DESCRIÇÃO
const ocultarSessaoDesc = document.querySelector(".ocultar-sessao-desc");
const setaOcultarDesc = document.querySelector(".seta-ocultar-desc");

setaOcultarDesc.addEventListener("click", function setaOcultarDesc()
{
    ocultarSessaoDesc.classList.toggle("fechado");
});


// CAUSAS
const ocultarSessaoCausa = document.querySelector(".ocultar-sessao-causa");
const setaOcultarCausa = document.querySelector(".seta-ocultar-causa");

setaOcultarCausa.addEventListener("click", function setaOcultarCausa()
{
    ocultarSessaoCausa.classList.toggle("fechado");
});



// SERVIÇOS PRESTADOS
const ocultarSessaoVaga = document.querySelector(".ocultar-sessao-vaga");
const setaOcultarVaga = document.querySelector(".seta-ocultar-vaga");

setaOcultarVaga.addEventListener("click", function setaOcultarVaga()
{
    ocultarSessaoVaga.classList.toggle("fechado");
});


// INSTITUIÇÕES TRABALHADAS
const ocultarSessaoFoto = document.querySelector(".ocultar-sessao-foto");
const setaOcultarFoto = document.querySelector(".seta-ocultar-foto");

setaOcultarFoto.addEventListener("click", function setaOcultarFoto()
{
    ocultarSessaoFoto.classList.toggle("fechado");
});











            // FAZER OS ICONES DE MAPS GIRAREM QUANDO PASSA O MOUSE POR CIMA DO CARD
            
const iconMapsFlip = document.querySelectorAll("#icon-maps-flip");
const iconMaps = document.querySelectorAll("#icon-maps");
const cardIT = document.querySelectorAll(".card-carrossel-dois");

// O método querySelector seleciona apenas o primeiro elemento correspondente ao seletor 
// CSS especificado. Para aplicar o mesmo comportamento a todos os cards que correspondem 
// à classe .card-carrossel-dois, usar o método querySelectorAll.
// tem q fzr um laço pra ele poder percorrer pela quantidade de cards existentes
for (let i = 0; i < cardIT.length; i++)
{
    cardIT[i].addEventListener("mouseover", function()
    {
        iconMaps[i].style.display = "none";
        iconMapsFlip[i].style.display = "block";
    });

    cardIT[i].addEventListener("mouseout", function()
    {
        iconMaps[i].style.display = "block";
        iconMapsFlip[i].style.display = "none";
    });
}



            // DROP DOWN NAV BAR 
const navSetaDrop = document.querySelector("#nav-seta-sub-topicos");
const navSubTopicos = document.querySelector(".sub-topicos");

navSetaDrop.addEventListener("click", function dropDown()
{
    if (navSubTopicos.style.display == "none")
    {
        navSubTopicos.style.display = "block";
    }
    else
    {
        navSubTopicos.style.display = "none";
    }
});

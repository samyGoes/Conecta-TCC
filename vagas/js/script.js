// DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
const botaoCausas = document.querySelector(".filtro-causas");
const boxCausas = document.querySelector(".box-causas");
const cliqueFora = document.querySelector('.clique-fora');

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
    const target2 = event.target;
    if (!cliqueFora.contains(target2)) 
    {
        boxCausas.style.display = "none";
        botaoCausas.style.backgroundColor = "#d6ebfd";
        botaoCausas.style.color = "#000";
        botaoCausas.style.borderColor = "#000";
    }
});



const botaoHabilidade = document.querySelector(".filtro-habilidade");
const boxHabilidade = document.querySelector(".box-habilidade");
const cliqueForaH = document.querySelector('.clique-fora-h');

botaoHabilidade.addEventListener("click", function() 
{
    if (boxHabilidade.style.display == "none" || boxHabilidade.style.display === "") 
    {
       boxHabilidade.style.display = "flex";
       botaoHabilidade.style.backgroundColor = "#4567a5";
       botaoHabilidade.style.color = "#fff";
       botaoHabilidade.style.borderColor = "#4567a5";
    } 
    else 
    {
       boxHabilidade.style.display = "none";
       botaoHabilidade.style.backgroundColor = "#d6ebfd";
       botaoHabilidade.style.color = "#000";
       botaoHabilidade.style.borderColor = "#000";
    }
});

document.addEventListener('click', function(event) 
{
    const target3 = event.target;
    if (!cliqueForaH.contains(target3)) 
    {
        boxHabilidade.style.display = "none";
        botaoHabilidade.style.backgroundColor = "#d6ebfd";
        botaoHabilidade.style.color = "#000";
        botaoHabilidade.style.borderColor = "#000";
    }
});


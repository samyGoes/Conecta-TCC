
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
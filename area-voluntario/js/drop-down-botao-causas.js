// DROP DOWN DO BOTÃO DAS CAUSAS + MUDANDO BOTÃO DE COR
const botaoCausas = document.querySelector(".filtro-causas");
const boxCausas = document.querySelector(".box-causas");
const dropCausas = document.querySelector('.box-filtro-causas');

botaoCausas.addEventListener("click", function()
{
    if(boxCausas.style.display === "none" || boxCausas.style.display === "")
    {
        boxCausas.style.display = "flex";
    }
    else
    {
        boxCausas.style.display = "none";
    }
});

document.addEventListener('click', function(event) 
{
    const target = event.target;
    if (!dropCausas.contains(target)) 
    {
        boxCausas.style.display = "none";
    }
});






// DROP DOWN DO BOTÃO DAS CAUSAS + MUDANDO BOTÃO DE COR
const botaoCausas = document.querySelector(".filtro-causas");
const boxCausas = document.querySelector(".box-causas");

botaoCausas.addEventListener("click", function()
{
    if(boxCausas.style.display == "none")
    {
        boxCausas.style.display = "flex";
    }
    else
    {
        boxCausas.style.display = "none";
    }
});

// document.addEventListener("click", function(event) 
// {
//     // verifica se o elemento clicado é o elemento que se quer monitorar ou um de seus descendentes
//     if (!botaoCausas.contains(event.target)) 
//     {
//         // o usuário clicou fora do elemento, faça algo aqui
//         boxCausas.style.display = "none";
//         botaoCausas.style.backgroundColor = "#fbf7c7";
//         botaoCausas.style.color = "#000";
//         botaoCausas.style.borderColor = "#000";
//     }
// });




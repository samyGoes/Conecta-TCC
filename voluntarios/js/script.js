// DROP DOWN DO BOTÃO DAS CAUSAS
const botaoCausas = document.querySelector(".filtro-causas");
const boxCausas = document.querySelector(".box-causas");

botaoCausas.addEventListener("click", function()
{
    if( boxCausas.style.display == "flex")
    {
        boxCausas.style.display = "none";
        botaoCausas.style.backgroundColor = "#fbf7c7";
        botaoCausas.style.color = "#000";
        botaoCausas.style.borderColor = "#000";
    }
    else
    {
        boxCausas.style.display = "flex";
        botaoCausas.style.backgroundColor = "#cf8a3f";
        botaoCausas.style.color = "#fff";
        botaoCausas.style.borderColor = "#cf8a3f";
    }
});




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
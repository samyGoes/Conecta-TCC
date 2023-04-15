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



// NAV LATERAL
const botaoNavLateral = document.querySelector("#nav-lateral-icon-lista");
const navLateral = document.querySelector(".nav-lateral");
const topicosNavLateral = document.querySelectorAll(".nav-lateral-topico");
const mainConteudo = document.querySelector(".main-conteudo");


/* RESPONSIVIDADE NAV LATERAL E CONTEUDO */
let telaUm = window.matchMedia("(min-width: 1049px)");
let telaDois = window.matchMedia("(max-width: 455px)");

botaoNavLateral.addEventListener("click", function()
{
    if(navLateral.style.width == "17rem")
    {       
        if(!telaDois.matches)
        {
            navLateral.style.width = "5rem";
            navLateral.style.paddingLeft = "1.5rem";
            mainConteudo.style.marginLeft = "5rem";
        }
        else
        {
            navLateral.style.width = "4rem";
            navLateral.style.paddingLeft = "1.2rem";
        }

        
        
        // SUMINDO COM OS TÓPICOS QUANDO A NAV FOR FECHADA
        topicosNavLateral.forEach(function(topicoNavLateral)
        {
            topicoNavLateral.style.opacity = "0";
        });
    }
    else
    {
        navLateral.style.width = "17rem";
        if(!telaDois.matches)
        {
            navLateral.style.paddingLeft = "2rem";
        }
        else
        {
            navLateral.style.paddingLeft = "1.2rem";
        }

        if(telaUm.matches)
        {
            mainConteudo.style.marginLeft = "17rem";
        }

        // SUMINDO COM OS TÓPICOS QUANDO A NAV FOR FECHADA
        topicosNavLateral.forEach(function(topicoNavLateral) 
        {
            topicoNavLateral.style.opacity = "1";
        });
    }
});